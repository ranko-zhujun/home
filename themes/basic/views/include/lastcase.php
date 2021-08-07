<?php
$lastCase = \app\controllers\models\Post::queryLast('case',6);
?>
<section class="featured-bg section-padding ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title">最新案例</h2>
                    <p>Success stories and customer shows</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.8s">
                <div id="latest-property" class="owl-carousel">

                    <?php
                    foreach ($lastCase as $case){
                        $metavalues = $case['metavalues'];
                        $meta = \app\helpers\ToolsHelper::getKeyValue($metavalues);
                        ?>
                        <div class="item">
                            <div class="property-main">
                                <div class="property-wrap">
                                    <div class="property-item">
                                        <div class="item-thumb">
                                            <a class="hover-effect " href="#">
                                                <img class="img-fluid" src="<?php echo $meta['image']; ?>" alt="<?php echo $case['title']; ?>">
                                            </a>
                                            <div class="label-inner">
                                                <span class="label-status label bg-red">最近更新</span>
                                            </div>
                                        </div>
                                        <div class="item-body">
                                            <h3 class="property-title text-center"><a href="#"><?php echo $case['title']; ?></a></h3>
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
    </div>
</section>
