<?php
$this->title = '企业网站 - 企业网站模板 ';
$this->context->data['active'] = 'home';
$theme = Yii::$app->params['theme'];
?>
<?php echo \Yii::$app->view->renderFile('@app/themes/'.$theme.'/views/include/revslider.php'); ?>
<?php echo \Yii::$app->view->renderFile('@app/themes/'.$theme.'/views/include/lastproduct.php'); ?>
<?php echo \Yii::$app->view->renderFile('@app/themes/'.$theme.'/views/include/aboutus.php'); ?>
<?php echo \Yii::$app->view->renderFile('@app/themes/'.$theme.'/views/include/lastarticle.php'); ?>
<?php echo \Yii::$app->view->renderFile('@app/themes/'.$theme.'/views/include/lastcase.php'); ?>

