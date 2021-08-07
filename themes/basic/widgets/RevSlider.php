<?php
namespace app\themes\basic\widgets;

class RevSlider extends \yii\bootstrap\Widget
{
    public $data;

    public function init()
    {
        parent::init();
        if ($this->data === null) {
            $this->data = array();
        }
    }

    public function run()
    {
        return $this->render('revslider',array('data'=>$this->data));
    }

}