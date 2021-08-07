<?php

namespace app\modules\backend\controllers;

use app\modules\backend\controllers\models\Post;
use app\modules\backend\controllers\models\Theme;
use app\starter\constants\Application;
use app\starter\controllers\BackendController;

class DefaultController extends BackendController
{

    public function actionIndex()
    {

        $this->data['statistic'] = $this->getStatisticData();

        return $this->render('index', $this->data);
    }

    private function getStatisticData(){
        $todayIp =  $this->cache->get(Application::TODAY_IP);
        $todayPv = $this->cache->get(Application::TODAY_PV);

        return array(
            'todayIp'=>$todayIp==null?0:sizeof($todayIp),
            'todayPv'=>$todayPv==null?0:$todayPv
        );
    }


}
