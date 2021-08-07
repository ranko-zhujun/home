<?php


namespace app\widgets\template;


use app\controllers\models\Post;
use app\models\PostDao;

class Carousel extends \yii\bootstrap\Widget
{

    public $theme = '';
    public $headerinfo = array();
    public $catalogtype = '';
    public $size = 9;

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $list = Post::getLastPostInfos($this->catalogtype, $this->size, $this->theme);

        return $this->render('carousel', array('headerinfo' => $this->headerinfo, 'list' => $list));
    }

}