<div class="row">
    <?php
    foreach ($fileinfos as $key => $fileinfo) {
        if ($fileinfo['filetype'] != 'text/plain') {
            ?>
            <div class="col-2 mb-2 align-middle ">
                <div class="img-list " data-toggle="lightbox"
                     href="themes/<?php echo $theme; ?>/upload<?php echo '/' . $key; ?>">
                    <img class="img-fluid img-thumbnail" title="<?php echo $fileinfo['filename']; ?>"
                         src="themes/<?php echo $theme; ?>/upload<?php echo '/' . $key; ?>">
                </div>
                <button type="button"
                        class="btn btn-block btn-default  btn-flat btn-xs"><?php echo $key; ?></button>
            </div>
            <?php
        }
    }
    ?>
</div>
