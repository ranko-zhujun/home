<?php

use yii\helpers\StringHelper;
use yii\widgets\LinkPager;

$this->title = '资料下载';
$this->context->data['active'] = 'download';
$postlist = \app\controllers\models\Post::queryList('download', 10);
?>

<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>资料下载</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">资料下载</span>
        </div>
    </div>
</div>
<div id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <?php
            foreach ($postlist['list'] as $post) {
                $metavalues = $post['metavalues'];
                $meta = \app\helpers\ToolsHelper::getKeyValue($metavalues);
                ?>
                <div class="col-4">
                    <div class="blog-post">
                        <div class="content text-center">
                            <h2>
                                <a href="javascript:return false;"><?php echo $post['title']; ?></a>
                            </h2>
                            <ul>
                                <li><?php echo date("Y-m-d", strtotime($post['createtime'])); ?></li>
                            </ul>
                            <a href="<?php echo $meta['download']; ?>" class="btn btn-common read-more">下 载 &nbsp;<i class="lni-download"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="pagination-container">
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
                                'class' => 'page-link disabled'
                            ]
                        ]);
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>