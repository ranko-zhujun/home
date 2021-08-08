<?php

use yii\helpers\Html;

\app\themes\basic\assets\BasicAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="themes/basic/css/colors.php?color=0066FF" rel="stylesheet">
    </head>
    <body>
    <?php $this->beginBody() ?>
    <header id="header-wrap">
        <nav class="navbar navbar-expand-lg navbar-light bg-white" data-toggle="sticky-onscroll">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar"
                            aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lin-menu"></span>
                    </button>
                    <a class="navbar-brand" href="index.html" title="无锡市蓝科创想科技有限公司">
                        <img src="upload/logo.png">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item <?php echo $this->context->data['active'] == 'home' ? 'active' : ''; ?>">
                            <a class="nav-link " href="index.html">
                                首 页
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'aboutus' ? 'active' : ''; ?>">
                            <a class="nav-link " href="aboutus.html">
                                关于我们
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'product' ? 'active' : ''; ?>">
                            <a class="nav-link " href="product.html">
                                产品展示
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'article' ? 'active' : ''; ?>">
                            <a class="nav-link " href="article.html">
                                新闻动态
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'download' ? 'active' : ''; ?>">
                            <a class="nav-link " href="download.html">
                                资料下载
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'case' ? 'active' : ''; ?>">
                            <a class="nav-link " href="case.html">
                                客户案例
                            </a>
                        </li>
                        <li class="nav-item <?php echo $this->context->data['active'] == 'employee' ? 'active' : ''; ?>">
                            <a class="nav-link " href="employee.html">
                                加入我们
                            </a>
                        </li>
                    </ul>
                    <div class="search-add float-right">

                    </div>
                </div>
            </div>

        </nav>
        <div class="clearfix"></div>
    </header>
    <?= $content ?>
    <footer id="footer" class="footer-area section-padding">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h3 class="footer-titel">关于 <span>我们</span></h3>
                        <ul class="footer-link">
                            <li><a href="aboutus.html">公司介绍</a></li>
                            <li><a href="http://www.ranko.cn">帮助文档</a></li>
                            <li><a href="index.php?r=site/login">后台登录</a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h3 class="footer-titel">常用<span> 链接</span></h3>
                        <ul class="footer-link">
                            <li><a href="product.html">产品展示</a></li>
                            <li><a href="article.html">新闻动态</a></li>
                            <li><a href="download.html">资料下载</a></li>
                            <li><a href="case.html">客户案例</a></li>
                            <li><a href="employee.html">加入我们</a></li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h3 class="footer-titel">联系 <span>信息</span></h3>
                        <ul class="address">
                            <li>
                                <a href="http://www.ranko.cn"><i class="lni-map-marker"></i>无锡市蓝科创想科技有限公司</a>
                            </li>
                            <li>
                                <a href="tel:18068252703"><i class="lni-phone-handset"></i>18068252703</a>
                            </li>
                            <li>
                                <a href="mailto:zhujun@ranko.cn"><i class="lni-envelope"></i>zhujun@ranko.cn</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-3">
                        <h3 class="footer-titel">赞助我</h3>
                        <img src="https://ranko-cn-static-1251786476.cos.ap-shanghai.myqcloud.com/alipay.jpg" width="61%">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <section id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>版权所有 © <?php echo date('Y'); ?> <a rel="nofollow" href="#">公司名称（演示数据）</a> All Right Reserved</p>
                </div>
            </div>
        </div>
    </section>
    <a href="#" class="back-to-top">
        <i class="lni-chevron-up"></i>
    </a>
    <div id="preloader">
        <div class="loader" id="loader-1"></div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>