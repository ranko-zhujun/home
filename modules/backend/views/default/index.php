<?php
$this->title = '控制面板';
?>
<div class="page-header flex-wrap">
    <div class="header-left">
        <button class="btn btn-primary mb-2 mb-md-0 mr-2">创建内容</button>
    </div>
    <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
        <div class="d-flex align-items-center">
            <a href="index.php?r=backend/default/index">
                <p class="m-0 pr-3">控制面板</p>
            </a>
            <a class="pl-3 mr-4" href="http://www.ranko.cn">
                <p class="m-0">应用中心</p>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 grid-margin">
        <div class="card card-statistics">
            <div class="row">
                <div class="card-col col-6 border-right">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                            <i class="mdi mdi-account-multiple-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                            <div class="wrapper text-center text-sm-left">
                                <p class="card-text mb-0">今日来访IP</p>
                                <div class="fluid-container">
                                    <h3 class="mb-0 font-weight-semibold"><?php echo $statistic['todayIp']; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-col col-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                            <i class="mdi mdi-checkbox-marked-circle-outline text-primary mr-0 mr-sm-4 icon-lg"></i>
                            <div class="wrapper text-center text-sm-left">
                                <p class="card-text mb-0">今日页面访问次数</p>
                                <div class="fluid-container">
                                    <h3 class="mb-0 font-weight-semibold"><?php echo $statistic['todayPv']; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>