<?php

use yii\helpers\StringHelper;
use yii\widgets\LinkPager;

$this->title = '新闻动态';
$this->context->data['active'] = 'article';
$postlist = \app\controllers\models\Post::queryList('article', 10);
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>新闻动态</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">新闻动态</span>
        </div>
    </div>
</div>
<div id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <?php
                foreach ($postlist['list'] as $post) {
                    $content = strip_tags($post['content']);
                    ?>
                    <div class="blog-post">
                        <div class="content">
                            <h2>
                                <a href="articleitem-<?php echo $post['id']; ?>.html"><?php echo $post['title']; ?></a>
                            </h2>
                            <ul class="post-meta">
                                <li><?php echo date("Y-m-d", strtotime($post['createtime'])); ?></li>
                            </ul>
                            <p>
                                <?php
                                echo strlen($content) >= 100 ? StringHelper::truncate($content, 100) : $content;
                                ?>
                            </p>
                            <a href="articleitem-<?php echo $post['id']; ?>.html" class="btn btn-common read-more">详 情
                                <i class="lni-chevron-right"></i></a>
                        </div>
                    </div>
                    <?php
                }
                ?>


            </div>
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