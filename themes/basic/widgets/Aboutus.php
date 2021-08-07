<?php


namespace app\widgets\template;


use app\models\PostDao;

class Aboutus extends \yii\bootstrap\Widget
{

    public $aboutus = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('aboutus', array('aboutus' => $this->aboutus));
    }

}