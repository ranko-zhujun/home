<?php


namespace app\modules\backend\controllers;


use app\modules\backend\controllers\forms\FormUser;
use app\modules\backend\controllers\models\User;
use app\starter\controllers\BackendController;
use Yii;

class UserController extends BackendController
{

    public function actionIndex()
    {
        $this->data['users'] = User::selectAll();
        return $this->view('index');
    }

    public function actionDisable($userId)
    {

        $user = User::findOne($userId);
        if ($user->getAttribute('super') == 1) {
            $this->flashError(['超级管理员不允许禁用']);
        } else {
            $result = User::disabledUser($userId);
            if ($result) {
                $this->flashSuccess(['用户禁用成功']);
            } else {
                $this->flashError(['用户禁用失败']);
            }
        }

        return $this->actionIndex();
    }

    public function actionEdit($userId)
    {

        $user = User::findOne($userId);

        $model = new FormUser();
        $model->setAttributes($user->getAttributes(), false);
        $this->data['model'] = $model;

        return $this->view('edit');
    }

    public function actionSave()
    {

        $model = new FormUser();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {

                $model->id = $_POST['FormUser']['id'];

                if ($model->id == 0) {
                    $object = new User();
                    $object->setAttributes($model->getAttributes(),false);
                    $object->loginpassword = md5($object->loginpassword);
                    $object->status = 'active';
                    $object->save();
                } else {
                    $object = User::findOne($model->id);
                    $object->setAttributes($model->getAttributes());
                    $object->loginpassword = md5($model->loginpassword);
                    $object->update();
                }

                $this->flashSuccess(['会员编辑成功']);
                return $this->redirect('index.php?r=backend/user/index');
            }
        }

        return $this->view('edit');

    }

}