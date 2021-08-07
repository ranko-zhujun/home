<?php

namespace app\controllers\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "cms_post".
 *
 * @property int $id 主题ID
 * @property string|null $title 标题
 * @property string|null $content 内容
 * @property string|null $keywords 关键字
 * @property string|null $createtime 创建时间
 * @property string $updatetime 修改时间
 * @property string $posttype 内容类型
 * @property string|null $status 状态
 * @property int $catalogId 目录ID
 * @property string|null $themeId 主题ID
 */
class Post extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'post';
    }

    public static function queryList($catalogtype, $pagesize)
    {
        $result = array();

        $count = self::getDb()->createCommand('SELECT
	count(*) 
FROM
	post
	LEFT JOIN catalog ON post.catalogId = catalog.id 
where catalog.catalogtype = :catalogtype')
            ->bindParam(':catalogtype',$catalogtype)
            ->queryScalar();
        $pagination = new Pagination(['totalCount' => $count]);

        $pagination->pageSize = $pagesize;
        $list = self::getDb()->createCommand('SELECT
	post.*,catalog.catalogtype,catalog.catalogname 
FROM
	post
	LEFT JOIN catalog ON post.catalogId = catalog.id 
where catalog.catalogtype = :catalogtype order by post.createtime desc limit :offset,:limit')
            ->bindParam(':catalogtype',$catalogtype)
            ->bindParam(':offset',$pagination->offset)
            ->bindParam(':limit',$pagination->limit)
            ->queryAll();

        $result['pagination'] = $pagination;
        $result['list'] = $list;
        return $result;
    }

    public static function queryLast($catalogtype, $pagesize)
    {
        $list = self::getDb()->createCommand('SELECT
	post.*,catalog.catalogtype,catalog.catalogname 
FROM
	post
	LEFT JOIN catalog ON post.catalogId = catalog.id 
where catalog.catalogtype = :catalogtype order by post.createtime desc limit 0,:limit')
            ->bindParam(':catalogtype',$catalogtype)
            ->bindParam(':limit',$pagesize)
            ->queryAll();
        return $list;
    }

    public function rules()
    {
        return [
            [['content'], 'string'],
            [['createtime', 'updatetime'], 'safe'],
            [['catalogId'], 'integer'],
            [['title', 'keywords', 'posttype', 'status', 'themeId'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => '主题ID',
            'title' => '标题',
            'content' => '内容',
            'keywords' => '关键字',
            'createtime' => '创建时间',
            'updatetime' => '修改时间',
            'posttype' => '内容类型',
            'status' => '状态',
            'catalogId' => '目录ID',
            'themeId' => '主题ID',
        ];
    }

    public function getCatalog()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'catalogId']);
    }

}
