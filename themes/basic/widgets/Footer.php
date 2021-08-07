<?php


namespace app\widgets\template;


class Footer extends \yii\bootstrap\Widget
{
    public $aboutus = array(), $links = array(), $contact = array();


    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('footer', array('aboutus' => $this->aboutus, 'links' => $this->links, 'contact' => $this->contact));
    }
}