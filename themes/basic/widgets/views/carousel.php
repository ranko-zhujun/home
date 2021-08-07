<section class=" section-padding">
    <div class="container">
        <?php
        if($headerinfo!=null){
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title"><?php echo $headerinfo['title']; ?></h2>
                        <p><?php echo $headerinfo['subtitle']; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="row">
            <div class="col-md-12 wow fadeIn" data-wow-delay="0.8s">
                <div id="latest-property" class="owl-carousel">

                    <?php
                    foreach ($list as $item){
                        ?>
                        <div class="item">
                            <div class="property-main">
                                <div class="property-wrap">
                                    <div class="property-item">
                                        <div class="item-thumb">
                                            <a class="hover-effect " href="#">
                                                <img class="img-fluid" src="<?php echo $item['post']['mainimage']; ?>" alt="">
                                            </a>
                                            <?php
                                            if($item['post']->catalog['catalogName']!=null){
                                                ?>

                                                <div class="label-inner">
                                                    <span class="label-status label bg-red"><?php echo $item['post']->catalog['catalogName']; ?></span>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="item-body">
                                            <h3 class="property-title text-center"><a href="#"><?php echo $item['post']['title']; ?></a></h3>
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
