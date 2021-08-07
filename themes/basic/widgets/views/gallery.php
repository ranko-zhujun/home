<section id="portfolio-section" class=" featured-bg  section-padding">
    <div class="container">
        <div class="row">
            <?php
            if (isset($headerinfo['title'])) {
                ?>
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title"><?php echo $headerinfo['title']; ?></h2>
                        <p><?php echo $headerinfo['subtitle']; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="col-12">
                <!-- Portfolio Controller/Buttons -->
                <div class="controls text-center">
                    <a class="filter btn btn-common" data-filter="all">
                        所有
                    </a>
                    <?php
                    foreach ($catalogs as $catalog) {
                        ?>
                        <a class="filter btn btn-common "
                           data-filter=".catalog-<?php echo $catalog['id']; ?>">
                            <?php echo $catalog['catalogName']; ?>
                        </a>
                        <?php
                    }

                    ?>
                </div>
                <!-- Portfolio Controller/Buttons Ends-->
            </div>
            <?php
            ?>
        </div>
        <div id="portfolio" class="row wow fadeInDown">
            <?php
            foreach ($posts as $post) {
                ?>
                <div class=" col-lg-4 mix catalog-<?php echo $post['catalogId']; ?>">
                    <div class="portfolio-box">
                        <div class="img-thumb">
                            <img class="img-fluid" src="<?php echo $post['mainimage']; ?>"
                                 alt="<?php echo $post['title']; ?>">
                        </div>
                        <div class="overlay-box text-center">
                            <a class="lightbox" href="<?php echo $post['mainimage']; ?>">
                                <i class="lni-zoom-in"></i>
                            </a>
                            <h3><?php echo $post['title']; ?></h3>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>