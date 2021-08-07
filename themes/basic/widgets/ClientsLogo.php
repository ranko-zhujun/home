<?php


namespace app\widgets\template;

class ClientsLogo extends \yii\bootstrap\Widget
{

    public $clientslogo = array();
    public $headerinfo = array();

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('clientslogo', array('clientslogo' => $this->clientslogo,'headerinfo'=>$this->headerinfo));
    }

}