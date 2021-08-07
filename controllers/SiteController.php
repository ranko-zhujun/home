<?php


namespace app\controllers;


use app\controllers\forms\FormAdmin;
use app\forms\FormFeedback;
use app\starter\controllers\FrontendController;
use Yii;

class SiteController extends FrontendController
{

    public function actionIndex()
    {
        $view = $_REQUEST['view'];
        if($view!=null){
            return $this->view($view);
        }else{
            return $this->view('index');
        }
    }

    public function actionError()
    {
        $this->layout = "//content";
        return $this->render('//site/error');
    }

    public function actionLogin()
    {
        $model = new FormAdmin();
        $model->rememberMe = isset($_POST['rememberMe'])?true:false;
        if ($model->load(Yii::$app->request->post(),'')) {
            if ($model->validate()) {
                $result = $model->login();
                if ($result) {
                    return $this->redirect("index.php?r=backend/default/index");
                } else {
                    $this->flashError(['用户名或者密码错误']);
                }

            } else {
                $this->flashError(['用户名或者密码不能为空']);
            }
        }

        $this->data['model'] = $model;
        $this->layout = "//backend-login";
        return $this->render('login', $this->data);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect('index.php?r=site/login');
    }

}
