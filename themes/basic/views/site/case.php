<?php

use yii\helpers\StringHelper;
use yii\widgets\LinkPager;

$this->title = '客户案例';
$this->context->data['active'] = 'case';
$postlist = \app\controllers\models\Post::queryList('case', 100);
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>客户案例</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">客户案例</span>
        </div>
    </div>
</div>
<div class="main-container section-padding">
    <div class="container">
        <div class="row">
            <?php
            foreach ($postlist['list'] as $product) {
                $metavalues = $product['metavalues'];
                $meta = \app\helpers\ToolsHelper::getKeyValue($metavalues);
                ?>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="property-main">
                        <div class="property-wrap">
                            <div class="property-item">
                                <div class="item-thumb">
                                    <a class="hover-effect" href="javascript:return false;">
                                        <img class="img-fluid" src="<?php echo $meta == null ? '' : $meta['image']; ?>"
                                             alt="">
                                    </a>
                                    <div class="label-inner">
                                    </div>
                                </div>
                                <div class="item-body">
                                    <h3 class="property-title text-center"><a
                                                href="javascript:return false;"><?php echo $product['title']; ?></a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
