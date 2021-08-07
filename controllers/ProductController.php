<?php


namespace app\controllers;


use app\models\CatalogDao;
use app\models\PostDao;
use app\starter\controllers\FrontendController;

class ProductController  extends FrontendController
{

    public function actionList($catalogkey=null){

        $this->data['active'] = 'product';

        if($catalogkey!=null){
            $this->data['catalog'] = CatalogDao::getCatalogByKey($catalogkey,$this->theme);
        }else{
            $this->data['catalog'] = null;
        }

        $this->data['postlist'] = PostDao::queryListInfo($this->theme,'product',10,$this->data['catalog']);

        return $this->view('list');
    }

    public function actionItem($id){

        $this->data['active'] = 'product';

        $this->data['post'] = PostDao::findOne($id);

        return $this->view('item');
    }

}