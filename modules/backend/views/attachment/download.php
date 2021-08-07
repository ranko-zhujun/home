<table class="table ">
    <tbody>
    <?php
    foreach ($fileinfos as $key => $fileinfo){
        ?>
        <tr class="tr-file">
            <td downloadurl="upload/<?php echo $theme; ?><?php echo '/'.$key; ?>" ><?php echo $key; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
