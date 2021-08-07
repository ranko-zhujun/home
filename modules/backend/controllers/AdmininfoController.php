<?php


namespace app\modules\backend\controllers;


use app\forms\FormAdmin;
use app\models\BackendCmsAdmin;
use app\models\WebUser;
use app\starter\constants\Msgtype;
use app\starter\controllers\BackendController;
use Yii;
use yii\helpers\FileHelper;

class AdmininfoController extends BackendController
{

    public function actionProfile()
    {

        $model = new FormAdmin();
        $model->id = $this->userId;
        $this->data['model'] = $model;

        return $this->render('profile', $this->data);
    }


    public function actionUpdatepwd()
    {
        $model = new FormAdmin();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $userId = Yii::$app->user->id;
                $user = BackendCmsAdmin::findById($userId);
                if (md5($model->adminpassword) == $user->password) {
                    $newPwd = md5($model->newpassword);
                    BackendCmsAdmin::changePwd($userId,$newPwd);
                    $this->data['message'] = $this->message(Msgtype::SUCCESS,"密码修改成功");
                } else {
                    $model->addError('tips', '原密码错误');
                }
            }
        }

        $model->adminpassword = "";
        $model->newpassword = "";

        $this->data['model'] = $model;
        return $this->render('profile', $this->data);
    }

}
