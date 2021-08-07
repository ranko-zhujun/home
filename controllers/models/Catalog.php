<?php

namespace app\controllers\models;

use Yii;

class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    public static function getCatalogByKey($catalogkey,$theme)
    {
        return self::find()->where(['catalogKey'=>$catalogkey,'themepath'=>$theme])->one();
    }

    public static function getCatalogAll($theme)
    {
        return self::find()->where(['themepath'=>$theme])->all();
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sequenceNumber', 'deleted'], 'integer'],
            [['createtime', 'updatetime'], 'safe'],
            [['catalogName', 'themeId'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主键',
            'catalogName' => '目录名称',
            'sequenceNumber' => '排序',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
            'deleted' => '删除标识',
            'themeId' => '主题ID',
        ];
    }
}
