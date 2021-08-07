<?php

namespace app\controllers\models;

use Yii;

class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    public static function getActive()
    {
        $theme = self::find()->where(['status'=>'active'])->one();
        if($theme){
            return $theme['path'];
        }else{
            return 'basic';
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'path', 'updatetime'], 'required'],
            [['createtime', 'updatetime'], 'safe'],
            [['title', 'path', 'status'], 'string', 'max' => 255],
            [['path'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'title' => '主题名称',
            'path' => '主题路径',
            'status' => '主题状态',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
        ];
    }
}
