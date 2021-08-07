<?php
use yii\helpers\Markdown;
$id = $_REQUEST['id'];
$this->context->data['active'] = 'article';
$post = \app\controllers\models\Post::findOne($id);
$this->title = $post['title'];
?>
<div id="page-banner-area" class="page-banner">
    <div class="page-banner-title">
        <div class="text-center">
            <h2><?php echo $post['title']; ?></h2>
            <a href=""><i class="lni-home"></i> 新闻动态</a>
            <span class="crumbs-spacer"><i class="lni-chevron-right"></i></span>
            <span class="current"><?php echo $post['title']; ?></span>
        </div>
    </div>
</div>

<div id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Blog Post -->
                <div class="blog-post single-post">
                    <div class="content">
                        <h2>
                            <a href="-<?php echo $post['id']; ?>.html"><?php echo $post['title']; ?></a>
                        </h2>
                        <ul class="post-meta">
                            <li><?php echo date("Y-m-d", strtotime($post['createtime'])); ?></li>
                        </ul>
                        <?php echo Markdown::process($post['content']); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>