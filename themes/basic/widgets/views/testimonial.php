<?php
$bg = $config['bg'];
?>
<section class="<?php echo $bg==false?'':'featured-bg'; ?> section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="testimonials" class="owl-carousel">

                    <?php
                    foreach ($data as $item){
                        ?>
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="content">
                                    <p class="description"><?php echo $item['content']; ?></p>
                                </div>
                            </div>
                            <div class="client-info">
                                <div class="img-thumb">
                                    <img src="<?php echo $item['image']; ?>" alt="">
                                </div>
                                <div class="info-text">
                                    <h2><a href="#"><?php echo $item['name']; ?></a></h2>
                                    <h4><a href="#"><?php echo $item['title']; ?></a></h4>
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