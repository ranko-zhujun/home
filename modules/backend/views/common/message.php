<?php
if(isset($message)){
    ?>
    <div class="row ">
        <div class="col-lg-12">
            <?php
            if($message['code']=='success'){
                ?>
                <div class="alert alert-dismissible alert-success">
                    <?php echo $message['message']; ?>
                </div>
                <?php
            }else{
                ?>
                <div class="alert alert-dismissible alert-danger">
                    <?php echo $message['message']; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>

    <?php
}
?>
