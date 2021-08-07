<?php


namespace app\themes\basic\widgets;


class TextPic extends \yii\bootstrap\Widget
{

    public $config = array();
    public $header = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('textpic', array('config' => $this->config,'header'=>$this->header));
    }

}