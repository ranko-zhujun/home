<?php

namespace app\controllers\models;

use Yii;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $loginname;
    public $loginpassword;
    public $rememberMe = false;
    public $_user = false;

    public function rules()
    {
        return [
            [['loginname'], 'required', 'message' => '登入名称不能为空'],
            [['loginpassword'], 'required', 'message' => '登入密码不能为空']
        ];
    }

    public static function findIdentity($id)
    {
        $user = User::find()->where(['id' => $id])->one();
        return isset($user) ? new static(array(
            'id' => $user['id'],
            'loginname' => $user->getOldAttributes()['loginname'],
            'loginpassword' => $user->getOldAttributes()['loginpassword'],
            'super'=>$user->getOldAttributes()['super']
        )) : null;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function validatePassword()
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if ($user && $user->getAttribute('loginpassword') == md5($this->loginpassword)) {
                return true;
            }
        }
        return false;
    }

    public function attributeLabels()
    {
        return [
            'loginname' => '登入名称',
            'loginpassword' => '登入密码'
        ];
    }

    public function login()
    {
        if ($this->validatePassword()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 3600);
        }
        return false;

    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::find()->where(['loginname' => $this->loginname])->one();;
        }

        return $this->_user;
    }

}