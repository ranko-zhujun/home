<?php


namespace app\controllers;


use app\models\CatalogDao;
use app\models\PostDao;
use app\starter\controllers\FrontendController;

class DownloadController  extends FrontendController
{

    public function actionList(){
        $this->data['active'] = 'download';
        $this->data['postlist'] = PostDao::queryList($this->theme,'download',10,$this->data['catalog']);
        return $this->view('list');
    }

}