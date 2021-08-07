<?php

use yii\widgets\LinkPager;

$this->title = '产品中心';
$this->context->data['active'] = 'product';
$postlist = \app\controllers\models\Post::queryList('product', 9);
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>产品中心</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">产品中心</span>
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
                                    <h3 class="property-title"><a
                                                href="javascript:return false;"><?php echo $product['title']; ?></a>
                                    </h3>
                                    <div class="pricin-list">
                                        <div class="property-price">
                                            <span>¥&nbsp;<?php echo $meta == null ? '' : $meta['price']; ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-12 pagination-container">
                <nav>
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $postlist['pagination'],
                        'options' => [
                            'class' => 'pagination m-0 ms-auto'
                        ],
                        'linkOptions' => [
                            'class' => 'page-link'
                        ],
                        'linkContainerOptions' => [
                            'class' => 'page-item'
                        ],
                        'disabledPageCssClass' => [
                            'class' => ' btn btn-common'
                        ]
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </div>
</div>
