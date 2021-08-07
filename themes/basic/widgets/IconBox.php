<?php


namespace app\widgets\template;


class IconBox extends \yii\bootstrap\Widget
{

    public $iconbox = array();
    public $config = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('iconbox', array('iconbox'=>$this->iconbox,'config'=>$this->config));
    }


}