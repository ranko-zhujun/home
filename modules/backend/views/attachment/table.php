<div class="row ">
    <?php
    $index = 0 ;
    foreach ($fileinfos as $key => $fileinfo) {
        ?>
        <div class="col-1 mb-3 align-middle ">
            <?php
            if ($fileinfo['filetype'] != 'text/plain') {
                ?>
                <div class="img-list " data-toggle="lightbox"
                     href="upload<?php echo '/' . $key; ?>">
                    <img class="img-fluid img-thumbnail " title="<?php echo $fileinfo['filename']; ?>"
                         src="upload<?php echo '/' . $key; ?>">
                    <input type="hidden" name="item-<?php echo $index ?>" value="upload<?php echo '/' . $key; ?>"/>
                </div>
                <div class="btn-group btn-block" >
                    <button type="button" class="btn btn-danger btn-sm" onclick="delAttach('<?php echo $key; ?>')"><i class="fa fa-trash"></i></button>
                </div>
                <?php
            } else {
                ?>
                <div class="img-list text-center align-middle" data-toggle="lightbox"
                     href="upload<?php echo '/' . $key; ?>">
                    <div class="img-fluid img-thumbnail item  pt-3">
                        <H6 class=""><?php echo $fileinfo['filetype']; ?></H6>
                        <p>文件类型</p>
                        <input type="hidden" name="item-<?php echo $index ?>" value="upload<?php echo '/' . $key; ?>"/>
                    </div>
                    <div class="btn-group btn-block">
                        <button type="button" class="btn btn-danger btn-sm" onclick="delAttach('<?php echo $key; ?>')" ><i class="fa fa-trash"></i></button>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
        $index ++;
    }
    ?>
</div>
