<?php
use yii\helpers\Html;
?>
<?php $this->beginContent('@yii/adminUi/themes/layouts/main.php'); ?>
<?php
$flashes = Yii::$app->getSession()->getAllFlashes();
if(count($flashes)) {
    foreach($flashes as $type => $message) {
        echo '<div class="bg-'.$type.' has-padding widget-inner">'.$message.'</div>';
    }
    Yii::$app->getSession()->removeAllFlashes();
}
?>
    <div class="box">
        <div class="box-header">
            <h6 class="box-title"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="box-body table-responsive">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent();