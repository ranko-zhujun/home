<?php


namespace app\modules\backend\controllers;


use app\modules\backend\controllers\forms\FormPost;
use app\modules\backend\controllers\models\Catalog;
use app\modules\backend\controllers\models\Post;
use app\modules\backend\controllers\models\Theme;
use app\structure\constants\Msgtype;
use app\starter\controllers\BackendController;
use Yii;

class PostController extends BackendController
{
    public function actionIndex($catalogId=0)
    {

        $this->data['select_catalog'] = Catalog::selectOptions();
        if($catalogId==0){
            $catalogId = key($this->data['select_catalog']);
        }

        $this->data['catalogId'] = $catalogId;
        $this->data['postlist'] = Post::queryList( 20,$catalogId);


        return $this->view('index');
    }

    public function actionEdit($id = 0)
    {

        $model = new FormPost();
        if ($id != 0) {
            $post = Post::findOne($id);
            $model->setAttributes($post->attributes, false);
            $this->data['model'] = $model;
        } else {
            $model->id = 0;
            $this->data['model'] = $model;
        }

        $this->data['select_catalog'] = Catalog::selectOptions();

        return $this->view('edit');
    }

    public function actionCopy($postid = 0, $posttype = 'article')
    {

        $post = Post::findOne($postid);

        Post::copyObject($post);

        $this->flashSuccess(['内容复制成功']);

        return $this->redirect('index.php?r=backend/post/index&posttype=' . $posttype);

    }

    public function actionSave()
    {

        $model = new FormPost();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->id == 0) {
                    $object = new Post();
                    $object->setAttributes($model->getAttributes());
                    $object->save();
                } else {
                    $object = Post::findOne($model->id);
                    $object->setAttributes($model->getAttributes());
                    $object->update();
                }

                $this->flashSuccess(['内容编辑成功']);

                return $this->actionIndex();
            }
        }


        $this->flashError($this->getErrorMessage($model));

        $this->data['model'] = $model;
        return $this->redirect('index.php?r=backend/post/edit&postid=' . $model->id);

    }

    public function actionDelete($id)
    {

        $affect = Post::deleteAll(['id' => $id]);
        if ($affect == 1) {
            $this->flashSuccess(['内容删除成功']);
        } else {
            $this->flashError(['内容删除失败']);
        }

        return $this->redirect('index.php?r=backend/post/index');
    }

}
