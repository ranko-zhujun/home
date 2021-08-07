<section class="featured-bg section-padding">
    <div class="container">
        <?php
        if(isset($header['title'])){
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="section-title-header text-center">
                        <h2 class="section-title"><?php echo $header['title']; ?></h2>
                        <p><?php echo $header['subtitle']; ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="row">

            <?php
            if($config['imagePos']=='left'){
                ?>
                <div class="col-6">
                    <img class="img-fluid" src="<?php echo $config['imageUrl']; ?>" alt="">
                </div>
                <?php
            }
            ?>
            <div class="col-6">
                <h1 class="intro-title"><strong><?php echo $config['introTitle']; ?></strong></h1>
                <h2 class="title-sub"><?php echo $config['titleSub']; ?></h2>
                <p class="intro-desc"><?php echo $config['introDesc']; ?></p>
            </div>

            <?php
            if($config['imagePos']=='right'){
                ?>
                <div class="col-6">
                    <img class="img-fluid" src="<?php echo $config['imageUrl']; ?>" alt="">
                </div>
                <?php
            }
            ?>



        </div>
    </div>
</section>