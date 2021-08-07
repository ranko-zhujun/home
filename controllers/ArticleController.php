<?php


namespace app\controllers;


use app\models\CatalogDao;
use app\models\PostDao;
use app\starter\controllers\FrontendController;

class ArticleController  extends FrontendController
{

    public function actionList($catalogkey=null){

        $this->data['active'] = 'article';
        if($catalogkey!=null){
            $this->data['catalog'] = CatalogDao::getCatalogByKey($catalogkey,$this->theme);
        }else{
            $this->data['catalog'] = null;
        }

        $this->data['postlist'] = PostDao::queryList($this->theme,'article',10,$this->data['catalog']);

        return $this->view('list');
    }

    public function actionItem($id){

        $this->data['post'] = PostDao::findOne($id);

        return $this->view('item');
    }

}
