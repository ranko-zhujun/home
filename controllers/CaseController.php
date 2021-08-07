<?php


namespace app\controllers;


use app\models\CatalogDao;
use app\models\PostDao;
use app\starter\controllers\FrontendController;

class CaseController extends FrontendController
{
    public function actionList($catalogkey=null){

        $this->data['active'] = 'case';
        if($catalogkey!=null){
            $this->data['catalog'] = CatalogDao::getCatalogByKey($catalogkey,$this->theme);
        }else{
            $this->data['catalog'] = null;
        }

        $this->data['postlist'] = PostDao::queryListInfo($this->theme,'case',10,$this->data['catalog']);

        return $this->view('list');
    }

    public function actionItem(){
        return $this->view('item');
    }

}
