{use class="yii\helpers\Html"}
<div class="box">
    <div class="box-header">
        <h1 class="box-title">{block name=box_title}{/block}</h1>
        {Html::a("Add New", ["create"], ['class' => "btn btn-success btn-sm pull-right"])}
    </div>
    <div class="box-body no-padding">
        {block name=content}{/block}
    </div>
</div>