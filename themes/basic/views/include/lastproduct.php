<?php
$lastProduct = \app\controllers\models\Post::queryLast('product',6);
?>
<section class=" section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title">最新产品</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($lastProduct as $product){
                $metavalues = $product['metavalues'];
                $meta = \app\helpers\ToolsHelper::getKeyValue($metavalues);
                ?>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="property-main">
                        <div class="property-wrap">
                            <div class="property-item">
                                <div class="item-thumb">
                                    <a class="hover-effect" href="productitem-<?php echo $product['id']; ?>.html">
                                        <img class="img-fluid" src="<?php echo $meta==null?'':$meta['image']; ?>" alt="">
                                    </a>
                                    <div class="label-inner">
                                        <span class="label-status label bg-red">新上架</span>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <h3 class="property-title"><a href="javascript:return false;"><?php echo $product['title']; ?></a></h3>
                                    <div class="pricin-list">
                                        <div class="property-price">
                                            <span>¥&nbsp;<?php echo $meta==null?'':$meta['price']; ?></span>
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
            <div class="col-12">
                <div class="text-center">
                    <a href="product.html" class="btn btn-common">浏 览</a>
                </div>
            </div>
        </div>
    </div>
</section>