<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tele')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transport')->dropDownList([
            0 => '自行运输',
            1 => '供应方快递',
            2 => '供应方物流',
    ]) ?>

    <label>供应商品类别</label>

    <div class="col-md-12 column">
        <div class="panel-group" id="panel-914153">
            <?php foreach(\backend\models\Category::listMap() as $key => $value):?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="panel-title collapsed" data-toggle="collapse" data-parent="#panel-914153" href="#panel-element-<?=$key?>">拼音首字母开头:<?=$key?></a>
                </div>
                <div id="panel-element-<?=$key?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <?= Html::checkboxList('Supplier[category]', \backend\models\Supplier::getCategoryBySupplierID($model->id), $value)?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
