<?php


namespace app\widgets\template;


class PageBanner  extends \yii\bootstrap\Widget
{
    public $data = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('pagebanner', array('data'=>$this->data));
    }

}