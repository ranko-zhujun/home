<?php


namespace app\widgets\template;


class Testimonial extends \yii\bootstrap\Widget
{
    public $data = array();
    public $config = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('testimonial', array('data'=>$this->data,'config'=>$this->config));
    }


}