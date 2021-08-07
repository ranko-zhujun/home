<?php


namespace app\modules\backend\controllers;

use app\models\BackendCmsTheme;
use app\modules\backend\controllers\models\Theme;
use app\starter\constants\MessageType;
use app\starter\constants\Msgtype;
use app\starter\controllers\BackendController;
use RuntimeException;
use Yii;
use yii\helpers\FileHelper;

class AttachmentController extends BackendController
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        $this->getFileInfos();
        return $this->view('index');
    }

    public function actionImage(){
        $this->layout = '/content';
        $this->getFileInfos();
        return $this->view('image');
    }

    public function actionTable(){
        $this->layout = '/content';
        $this->getFileInfos();
        return $this->view('table');
    }

    public function actionDownload(){
        $this->layout = '/content';
        $this->getDownload();
        return $this->view('download');
    }

    private function getFileInfos(){

        $searchdir = FileHelper::normalizePath(\Yii::$app->basePath.'/web/upload/');
        if(!file_exists($searchdir)){
            mkdir($searchdir);
        }

        $files = scandir($searchdir);

        $fileinfos = array();
        foreach ($files as $file){
            if($file!='.'&& $file!='..'&&$file!='.htaccess'){
                $filePath = FileHelper::normalizePath($searchdir.'/'.$file);
                $fileinfos[$file] = array(
                    'filename'=>basename($file),
                    'filetype'=>FileHelper::getMimeType($filePath),
                    'updatetime'=>filemtime($filePath)
                );
            }
        }
        $this->data['fileinfos'] = $fileinfos;
    }

    private function getDownload(){
        $theme = Theme::getActive();

        $searchdir = FileHelper::normalizePath(\Yii::$app->basePath.'/web/upload/');
        if(!file_exists($searchdir)){
            mkdir($searchdir);
        }

        $files = scandir($searchdir);

        $fileinfos = array();
        foreach ($files as $file){
            if($file!='.'&& $file!='..'&&$file!='.htaccess'){
                $filePath = FileHelper::normalizePath($searchdir.'/'.$file);
                $filePrefix = '';
                $fileinfos[$filePrefix.$file] = array(
                    'filename'=>basename($file),
                    'filetype'=>FileHelper::getMimeType($filePath),
                    'updatetime'=>filemtime($filePath)
                );
            }
        }
        $this->data['theme'] = $theme;
        $this->data['fileinfos'] = $fileinfos;
    }

    public function actionRemove($filepath){

        $filepath =  FileHelper::normalizePath(\Yii::$app->basePath.'/web/upload/'.$filepath);
        $mimeType = FileHelper::getMimeType($filepath);

        if($mimeType == 'directory'){
            FileHelper::removeDirectory($filepath);
        }else{
            FileHelper::unlink($filepath);
        }

        echo json_encode($this->message(MessageType::SUCCESS,'文件删除成功'));
        exit();
    }

    public function actionUpload(){
        $response = null;

        try{

            $theme = Theme::getActive();

            $extension = $this->get_extension($_FILES['editormd-image-file']['name']);
            $fileName = date('YmdHis').'_'.rand(1000,9999).rand(1000,9999).'.'.$extension;
            $imageUrl = 'upload/'.$theme.'/'.$fileName;

            $saveFolder = FileHelper::normalizePath(\Yii::$app->getBasePath().'/web/upload/');
            if(!file_exists($saveFolder)){
                mkdir($saveFolder);
            }
            $uploadfile = FileHelper::normalizePath($saveFolder.'/'.$fileName);

            if (move_uploaded_file($_FILES['editormd-image-file']['tmp_name'], $uploadfile)) {
                $response = array(
                    'success'=>1,
                    'message'=>'文件上传成功.',
                    'url'=>$imageUrl
                );

            } else {
                $response = array(
                    'success'=>0,
                    'message'=>'文件上传失败.',
                    'url'=>''
                );
            }

            return json_encode($response);

        } catch(OssException $e) {

            $response = array(
                'success'=>0,
                'message'=>'文件上传失败.',
                'url'=>''
            );

            return json_encode($response);
        }
    }

    public function actionUploadlist()
    {
        header('Content-type:application/json;charset=utf-8');

        try {

            $bathPath = Yii::$app->getBasePath() .'/web/upload/';

            if (
                !isset($_FILES['file']['error']) ||
                is_array($_FILES['file']['error'])
            ) {
                throw new RuntimeException('Invalid parameters.');
            }

            switch ($_FILES['file']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file sent.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded filesize limit.');
                default:
                    throw new RuntimeException('Unknown errors.');
            }

            $extension = $this->get_extension($_FILES['file']['name']);
            $filepath = sprintf($bathPath . '/%s_%s', date('YmdHis'),rand(1000,9999).rand(1000,9999).'.'.$extension);

            if (!move_uploaded_file(
                $_FILES['file']['tmp_name'],
                $filepath
            )) {
                throw new RuntimeException('Failed to move uploaded file.');
            }

            // All good, send the response
            echo json_encode([
                'status' => 'ok',
                'path' => $filepath
            ]);

        } catch (RuntimeException $e) {
            // Something went wrong, send the err message as JSON
            http_response_code(400);

            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }

    private function get_extension($file)
    {
        return substr(strrchr($file, '.'), 1);
    }

}
