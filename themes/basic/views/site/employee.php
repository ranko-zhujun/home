<?php

use yii\helpers\Markdown;
use yii\widgets\LinkPager;

$this->title = '加入我们';
$this->context->data['active'] = 'employee';
$postlist = \app\controllers\models\Post::queryList('employee', 10);
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2>加入我们</h2>
            <a href="index.html"><i class="lni-home"></i> 首页</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current">加入我们</span>
        </div>
    </div>
</div>

<div id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                foreach ($postlist['list'] as $post) {
                    ?>
                    <div class="blog-post">
                        <div class="content">
                            <h2>
                                <a href="article_item-<?php echo $post['id']; ?>.html"><?php echo $post['title']; ?></a>
                            </h2>
                            <ul class="post-meta">
                                <li><?php echo date("Y-m-d", strtotime($post['createtime'])); ?></li>
                            </ul>
                            <?php echo Markdown::process($post['content']); ?>
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