<section id="blog" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <div class="section-title-header text-center">
                        <h2 class="section-title"><?php echo $headerinfo['title']; ?></h2>
                        <p><?php echo $headerinfo['subtitle']; ?></p>
                    </div>
                </div>
            </div>
            <?php
            foreach ($list as $item){
                ?>
                <div class="col-lg-4 col-md-6 col-xs-12 mb-5">
                    <div class="blog-item text-center">
                        <div class="date"><?php echo $item['post']['createtime']; ?></div>
                        <div class="descr">
                            <h3 class="title">
                                <a href="<?= $posttype ?>_item-<?php echo $item['post']['id']; ?>.html">
                                    <?php echo $item['post']['title']; ?>
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