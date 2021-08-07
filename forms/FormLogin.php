<?php

namespace app\forms;

use app\models\BackendCmsAdmin;
use Yii;

class FormLogin extends \yii\base\Model
{

    public $username;
    public $password;
    public $rememberMe = true;
    public $_user = false;

    public function rules()
    {
        return [
            [['username'], 'required', 'message' => '登入名称不能为空'],
            [['password'], 'required', 'message' => '登入密码不能为空'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword(md5($this->password))) {
                $this->addError($attribute, '用户名或者密码错误.');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'username' => '登入名称',
            'password' => '登入密码'
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 3600);
        }
        return false;

    }

    public function getUser()
    {
        if ($this->_user === false) {
           $this->_user = BackendCmsAdmin::findByUsername($this->username);
        }

        return $this->_user;
    }


}