<?php


namespace app\controllers;
use app\controllers\forms\FormAdmin;
use app\starter\controllers\BackendController;
use Yii;

class AdminController extends BackendController
{

    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            $this->layout = "//backend-login";
            $model = new FormAdmin();
            $this->data['model'] = $model;
            return $this->render('index', $this->data);
        } else {
            return $this->redirect("index.php?r=backend/default/index");
        }
    }

    public function actionLogin()
    {
        $model = new FormAdmin();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $result = $model->login();
                if ($result) {
                    return $this->redirect("index.php?r=backend/default/index");
                } else {
                    Yii::$app->session->setFlash(\app\starter\constants\Msgtype::SUCCESS, ['用户名或者密码错误']);
                }

            } else {
                Yii::$app->session->setFlash(\app\starter\constants\Msgtype::SUCCESS, ['用户名或者密码不能为空']);
            }
        }

        $this->data['model'] = $model;
        $this->layout = "//backend-login";
        return $this->render('index', $this->data);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->actionIndex();
    }


}
