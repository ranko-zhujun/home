<?php

namespace app\widgets\template;


class Counter extends \yii\bootstrap\Widget
{
    public $data;
    public $headerinfo;

    public function init()
    {
        parent::init();
        if ($this->data === null) {
            $this->data = array();
        }
    }

    public function run()
    {
        return $this->render('counter',array('data'=>$this->data,'headerinfo'=>$this->headerinfo));
    }
}