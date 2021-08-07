<?php


namespace app\themes\basic\widgets;

use app\controllers\models\Catalog;
use app\controllers\models\Post;

class Gallery extends \yii\bootstrap\Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $size = $this->options['size'];
        $catalogtype = $this->options['catalogtype'];

        $catalogs = Catalog::getDb()->createCommand('select * from catalog where catalogtype = :catalogtype')
            ->bindParam(':catalogtype',$catalogtype)
            ->queryAll();

        $posts = Post::getDb()->createCommand('select * from post where themepath = :themepath and posttype =:posttype order by id asc limit 0,:size ')
            ->bindParam(':themepath',$themepath)
            ->bindParam(':posttype',$posttype)
            ->bindParam(':size',$size)
            ->queryAll();

        return $this->render('gallery', array('catalogs' => $catalogs, 'posts' => $posts));
    }

}