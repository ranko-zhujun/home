<?php
$bg = $config['bg'];
$col = isset($config['col'])?$config['col']:3;
?>
<section class="iconbox-section section-padding <?php echo $bg ? '' : 'featured-bg'; ?> " style="">
    <div class="container">
        <div class="row">
            <?php
            foreach ($iconbox as $item) {
                ?>
                <div class="col-lg-<?php echo $col; ?> text-center">
                    <div class="iconbox">
                        <div class="icon"><i class="<?php echo $item['cls']; ?>"></i></div>
                        <div class="title"><?php echo $item['title']; ?></div>
                        <p><?php echo $item['description']; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>