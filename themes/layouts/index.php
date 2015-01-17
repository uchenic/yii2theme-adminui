<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<?php $this->beginContent('@yii/adminUi/themes/layouts/main.php'); ?>
    <div class="box">
        <div class="box-header">
            <h1 class="box-title"><?= Html::encode($this->title) ?></h1>
            <?= Html::a("Add New", ["create"], ['class' => "btn btn-success btn-sm pull-right"]) ?>
        </div>
        <div class="box-body no-padding">
            <?= $content ?>
        </div>
    </div>
<?php $this->endContent();