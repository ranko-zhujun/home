<?php
$lastArticle = \app\controllers\models\Post::queryLast('article',6);
?>
<section id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <div class="section-title-header text-center">
                        <h2 class="section-title">最新资讯</h2>
                        <p>Latest news and information</p>
                    </div>
                </div>
            </div>
            <?php
            foreach ($lastArticle as $post){
                ?>
                <div class="col-lg-4 col-md-6 col-xs-12 mb-5">
                    <div class="blog-item text-center">
                        <div class="date"><?php echo $post['createtime']; ?></div>
                        <div class="descr">
                            <h3 class="title">
                                <a href="articleitem-<?php echo $post['id']; ?>.html">
                                    <?php echo $post['title']; ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>