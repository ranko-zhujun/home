<?php


namespace app\modules\backend\controllers;


use app\forms\cms\FormFileImage;
use app\structure\controllers\AdminController;
use app\starter\controllers\BackendController;
use Yii;
use yii\web\UploadedFile;

class UploadController extends BackendController
{

    public function actionIndex()
    {
        $model = new FormFileImage();
        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                $location = $model->imageUrl;
                echo json_encode(array('location'=>$location));
            }
        }
    }

}