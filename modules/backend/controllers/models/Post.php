<?php

namespace app\modules\backend\controllers\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Expression;

class Post extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }

    public static function queryList($pagesize,$catalogId)
    {
        $result = array();
        $condition = [];
        if($catalogId!=0){
            $condition = ['catalogId'=>$catalogId];
        }
        $query = self::find()->where($condition);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count]);
        $pagination->pageSize = $pagesize;
        $list = $query ->orderBy('catalogid asc')->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        $result['pagination'] = $pagination;
        $result['list'] = $list;
        return $result;
    }

    public static function copyObject(BackendCmsPost $post)
    {
        $object = new BackendCmsPost();
        $object->setAttributes($post->getAttributes(null,['id']),false);
        $object->setAttribute('id',0);
        $object->save();

        $metas = BackendCmsMeta::getMetas($post['id'],$post['themepath']);
        foreach ($metas as $meta){
            $newmeta = new BackendCmsMeta();
            $newmeta->setAttributes($meta->getAttributes(null,['postId']));
            $newmeta->setAttribute('postId',$object->id);
            $newmeta->save();
        }
    }


    public function rules()
    {
        return [
            [['content','metavalues'], 'string'],
            [['createtime', 'updatetime'], 'safe'],
            [['catalogId'], 'integer'],
            [['title', 'status'], 'string', 'max' => 255],
            [['id','title', 'status', 'content','catalogId'], 'required', 'message' => '必填项']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '主题ID',
            'title' => '内容标题',
            'content' => '内容',
            'keywords' => '关键字',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
            'status' => '状态',
            'catalogId' => '目录',
            'metavalues'=>'属性值'
        ];
    }

    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalogId']);
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
