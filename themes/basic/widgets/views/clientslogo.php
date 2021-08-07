<section id="clients-logo" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title-header text-center">
                    <h2 class="section-title"><?php echo $headerinfo['title']; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($clientslogo as $logo){
                ?>
                <div class="col-lg-2 col-md-4 col-xs-12">
                    <div class="client-logo">
                        <a href="<?php echo $logo['href']; ?>" title="<?php echo $logo['title']; ?>"><img class="img-fluid" src="<?php echo $logo['src']; ?>" alt="<?php echo $logo['title']; ?>"></a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>