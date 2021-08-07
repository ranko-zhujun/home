<?php

namespace app\modules\backend\controllers\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

class Catalog extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'catalog';
    }

    public static function selectOptions()
    {
        $options = array();
        $list = self::find()->where([])->all();
        foreach($list as $item){
            $options[$item['id']] = $item['catalogname'];
        }
        return $options;
    }

    public static function selectAll()
    {
        return self::find()->where([])->all();
    }

    public static function countPost($catalogId)
    {
        return self::getDb()->createCommand('select count(1) from post where catalogId = :catalogId')
            ->bindParam(':catalogId',$catalogId)->queryScalar();
    }

    public function rules()
    {
        return [
            [['createtime', 'updatetime'], 'safe'],
            [['catalogname', 'id'], 'string', 'max' => 255],
            [['catalogname', 'id','catalogtype'], 'required','message' => '必填项'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'catalogname' => '目录描述',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
            'themepath' => '主题',
            'catalogtype'=>'目录类型'
        ];
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
