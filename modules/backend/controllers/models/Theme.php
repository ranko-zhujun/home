<?php

namespace app\modules\backend\controllers\models;

use app\helpers\JsonToXmlHelper;
use app\helpers\XmlHelper;
use Spatie\ArrayToXml\ArrayToXml;
use Yii;

class Theme extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'theme';
    }

    public static function getActiveTheme()
    {
        $theme = self::find()->where(['status' => 'active'])->one();
        return $theme;
    }

    public static function setActive($themepath)
    {
        $affect = 0;
        $affect += self::getDb()->createCommand("update cms_theme set status = 'waiting' where path != :path and status = 'active' ")
            ->bindParam(":path", $themepath)->execute();
        $affect += self::getDb()->createCommand("update cms_theme set status = 'active' where path = :path ")
            ->bindParam(":path", $themepath)->execute();
        return $affect;
    }

    public static function getThemeXml($themeid)
    {
        $theme = array();
        $themeconfig = BackendCmsTheme::findOne($themeid)->toArray(['*']);
        $theme['config'] = $themeconfig;
        $theme['catalog'] = self::getDb()->createCommand('select * from cms_catalog where themepath = :path')
            ->bindParam(':path',$themeconfig['path'])->queryAll();
        $theme['meta'] = self::getDb()->createCommand('select * from cms_meta where themepath = :path')
            ->bindParam(':path',$themeconfig['path'])->queryAll();
        $theme['post'] = self::getDb()->createCommand('select * from cms_post where themepath = :path')
            ->bindParam(':path',$themeconfig['path'])->queryAll();
        $theme['postmeta'] = self::getDb()->createCommand('select * from cms_post_meta where themepath = :path')
            ->bindParam(':path',$themeconfig['path'])->queryAll();
        $result = ArrayToXml::convert($theme);
        return $result;
    }

    public static function import($themeObject)
    {
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        try {

            if($themeObject['config']!=null){
                $db->createCommand('insert into cms_theme (title,path,status,createtime) values (:title,:path,:status,now())')
                    ->bindParam(':title',$themeObject['config']['title'])
                    ->bindParam(':path',$themeObject['config']['path'])
                    ->bindParam(':status',$themeObject['config']['status'])
                    ->execute();
            }


            $catalogMap = array();
            if($themeObject['catalog']!=null){
                foreach ($themeObject['catalog'] as $catalog){
                    $db->createCommand('INSERT INTO `cms_catalog`(`catalogName`, `sequenceNumber`, `createtime`,
`themepath`, `catalogtype`, `catalogKey`) VALUES (:catalogName , :sequenceNumber , now() , :themepath ,  :catalogtype ,
:catalogKey )')
                        ->bindParam('catalogName',$catalog['catalogName'])
                        ->bindParam('sequenceNumber',$catalog['sequenceNumber'])
                        ->bindParam('themepath',$catalog['themepath'])
                        ->bindParam('catalogtype',$catalog['catalogtype'])
                        ->bindParam('catalogKey',$catalog['catalogKey'])
                        ->execute();
                    $catalogMap[$catalog['id']]= $db->getLastInsertID();
                }
            }

            if($themeObject['meta']!=null){
                foreach ($themeObject['meta'] as $meta){
                    $db->createCommand('INSERT INTO  `cms_meta`( `metaname`, `sequence`, `themepath`, `createtime`, 
 `posttype`, `metakey`) VALUES ( :metaname ,  :sequence ,  :themepath ,  now() ,   :posttype ,  :metakey )')
                        ->bindParam(':metaname',$meta['metaname'])
                        ->bindParam(':sequence',$meta['sequence'])
                        ->bindParam(':themepath',$meta['themepath'])
                        ->bindParam(':posttype',$meta['posttype'])
                        ->bindParam(':metakey',$meta['metakey'])
                        ->execute();
                }
            }

            $postMap = array();
            if($themeObject['post']!=null){
                foreach ($themeObject['post'] as $post){
                    $catalogId = $post['catalogId']==0?0:$catalogMap[$post['catalogId']];
                    $mainimage = is_array($post['mainimage'])?'':$post['mainimage'];
                    $downloadurl = is_array($post['downloadurl'])=='Array'?'':$post['downloadurl'];
                    $db->createCommand('INSERT INTO  `cms_post`( `title`, `content`, `keywords`, `createtime`,`posttype`,
 `status`, `catalogId`, `themepath`, `mainimage`, `downloadurl`) VALUES ( :title,:content,:keywords, now(),:posttype,
 :status,:catalogId,:themepath,:mainimage,:downloadurl)')
                        ->bindParam(':title',$post['title'])
                        ->bindParam(':content',$post['content'])
                        ->bindParam(':keywords',$post['keywords'])
                        ->bindParam(':posttype',$post['posttype'])
                        ->bindParam(':status',$post['status'])
                        ->bindParam(':catalogId',$catalogId)
                        ->bindParam(':themepath',$post['themepath'])
                        ->bindParam(':mainimage',$mainimage)
                        ->bindParam(':downloadurl',$downloadurl)
                        ->execute();
                    $postMap[$post['id']]= $db->getLastInsertID();
                }
            }

            if($themeObject['postmeta']!=null){
                foreach ($themeObject['postmeta'] as $postmeta){
                    $db->createCommand('INSERT INTO `cms_post_meta` 
(`postId`, `ppKey`, `ppValue`, `themepath`) 
VALUES (:postId,:ppKey, :ppValue, :themepath);
')
                        ->bindParam(':postId',$postMap[$postmeta['postId']])
                        ->bindParam(':ppKey',$postmeta['ppKey'])
                        ->bindParam(':ppValue',$postmeta['ppValue'])
                        ->bindParam(':themepath',$postmeta['themepath'])
                        ->execute();
                }
            }


            $transaction->commit();
        } catch(\Exception $e) {
            $transaction->rollBack();
            throw $e;
            return null;
        } catch(\Throwable $e) {
            $transaction->rollBack();
            throw $e;
            return null;
        }
    }

    public function rules()
    {
        return [
            [['title', 'path', 'updatetime', 'id'], 'required'],
            [['createtime', 'updatetime'], 'safe'],
            [['title', 'path', 'status'], 'string', 'max' => 255],
            [['path'], 'unique'],
        ];
    }

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

    public static function getActive()
    {
        $theme = self::find()->where(['status' => 'active'])->one();
        if ($theme) {
            return $theme['path'];
        } else {
            return 'basic';
        }
    }

}
