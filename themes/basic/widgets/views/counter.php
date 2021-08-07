<section class="counter-section counter-section-blank section-padding" data-stellar-background-ratio="0.5" style="background-position: 0% -33.4844px;">
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
            <?php
            $colwidth = 12/sizeof($data);
            foreach ($data as $item){
                ?>
                <div class="col-lg-<?php echo $colwidth; ?> work-counter-widget text-center">
                    <div class="counter">
                        <div class="icon "><i class="<?php echo $item['icon']; ?>"></i></div>
                        <div class="counterUp "><?php echo $item['counter']; ?></div>
                        <p class=""><?php echo $item['summary']; ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>