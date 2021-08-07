<?php

namespace app\modules\backend\controllers;

use app\modules\backend\controllers\forms\FormCatalog;
use app\modules\backend\controllers\models\Catalog;
use app\modules\backend\controllers\models\Theme;
use app\structure\controllers\AdminController;
use app\starter\controllers\BackendController;
use Yii;

class CatalogController extends BackendController
{

    public function actionIndex()
    {

        $this->data['list'] = Catalog::selectAll();

        return $this->view('index');
    }

    public function actionEdit($id)
    {

        $model = new FormCatalog();
        if ($id != 0) {
            $post = Catalog::findOne($id);
            $model->setAttributes($post->attributes, false);
            $this->data['model'] = $model;
        } else {
            $model->id = 0;
            $this->data['model'] = $model;
        }

        return $this->view('edit');
    }

    public function actionSave()
    {

        $model = new FormCatalog();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                if ($model->id == 0) {
                    $object = new Catalog();
                    $object->setAttributes($model->getAttributes());
                    $object->save();
                } else {
                    $object = Catalog::findOne($model->id);
                    $object->setAttributes($model->getAttributes());
                    $object->update();
                }

                $this->flashSuccess(['目录编辑成功']);

                return $this->actionIndex();
            }
        }

        $this->flashError($this->getErrorMessage($model));

        $this->data['model'] = $model;
        return $this->redirect('index.php?r=backend/catalog/edit&postid=' . $model->id);

    }

    public function actionDelete($catalogId)
    {

        //判断是否有内容尚未删除
        $countOfPost = Catalog::countPost($catalogId);
        if ($countOfPost && $countOfPost > 0) {
            $this->flashError(['该目录下存在内容，不允许删除']);
            return $this->actionIndex();
        } else {
            $affect = Catalog::deleteAll(['id' => $catalogId]);
            if ($affect == 1) {
                $this->flashSuccess(['目录删除成功']);
            } else {
                $this->flashError(['目录删除失败']);
            }
            return $this->actionIndex();
        }

    }

}
