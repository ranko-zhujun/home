<?php
namespace app\modules\backend\controllers\forms;

use app\modules\backend\controllers\models\User;

class FormUser extends User
{

    public $loginname;
    public $loginpassword;
    public $id = 0;

    public function rules()
    {
        return [
            [['loginname','loginpassword'], 'required', 'message' => '必填项'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'loginname' => '登入名称',
            'loginpassword' => '登入密码'
        ];
    }

}