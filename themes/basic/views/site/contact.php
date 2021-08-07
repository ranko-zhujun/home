<?php

use yii\helpers\StringHelper;
use yii\widgets\LinkPager;
$this->title = '联系我们';
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>联系我们</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">联系我们</span>
        </div>
    </div>
</div>

<section id="contact-section" class="section-padding">
    <div class="container">
        <div class="row">
            <div class=" col-lg-3">
                <div class="contact-right-area">
                    <h2 class="title-">联系我们</h2>
                    <div class="contact-right">
                        <address>
                            <strong>地址：</strong><br>
                            无锡市梁溪区金山北科技产业园,<br>C区1-8-456<br>
                        </address>
                        <abbr title="电话"><strong>电话：</strong></abbr> 18068252703<br>
                        <abbr title="邮件"><strong>邮件：</strong></abbr> email@email.com
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <img src="themes/<?php echo $this->context->theme; ?>/upload/map.jpg" class="img-thumbnail ">
            </div>
        </div>
    </div>
</section>
