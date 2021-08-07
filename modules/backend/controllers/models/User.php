<?php

namespace app\modules\backend\controllers\models;

use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\IdentityInterface;

class User extends \yii\db\ActiveRecord
{

    public $super = 0;

    public static function tableName()
    {
        return 'user';
    }

    public static function disabledUser($userId)
    {
        $user = User::find()->where(['id' => $userId])->one();
        $user->status = 'disabled';
        return $user->update();
    }

    public function changePwd($userId, $newPwd)
    {
        $user = User::find()->where(['id' => $userId])->one();
        $user->loginpassword = $newPwd;
        return $user->update();
    }

    public static function selectAll(){
        return User::find()->all();
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'createtime',
                'updatedAtAttribute' => 'updatetime',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
