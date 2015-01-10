<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginContent('@yii/adminUi/themes/layouts/main.php'); ?>
    <div class="box">
        <div class="box-header">
            <h6 class="box-title"><?= Html::encode($this->title) ?></h6>
        </div>
        <div class="box-body table-responsive">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent();