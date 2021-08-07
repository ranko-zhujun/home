<?php


namespace app\widgets\template;


use app\controllers\models\Post;
use app\models\PostDao;

class Blog extends \yii\bootstrap\Widget
{
    public $theme = '';
    public $headerinfo = array();
    public $posttype = 'article';

    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $lastinfos = Post::getLastPostInfos($this->posttype,6,$this->theme);

        return $this->render('blog', array('headerinfo' => $this->headerinfo,'list' => $lastinfos,'posttype'=>$this->posttype));
    }
}