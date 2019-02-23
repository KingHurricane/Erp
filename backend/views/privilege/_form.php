<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Privilege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="privilege-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(\backend\models\Privilege::ToplistMap())->label("所属分组") ?>

    <label>选择控制器</label>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="btn-group">
                <?php foreach(\backend\models\Controller_class::listMap() as $key => $value):?>
                <button class="btn btn-default" type="button" data-class-id="<?=$key?>"><?=$value?></button>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div id="methods_container" class="col-md-12 column" data-method-checked='<?=$method_checked_ids?>'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        方法列表...
                    </h3>
                </div>
            </div>

            <?php foreach($controller_methods as $key => $value):?>
            <div id="class-id-<?=$key?>" class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="page-header">
                            <h3>
                                <small>选择方法</small><br/>
                                <input class="method-check-all" type="checkbox">
                                <small>全选</small>
                            </h3>
                            <div class="method-list" data-class-id="<?=$key?>">
                                <?php
                                    echo Html::checkboxList("Privilege[class_id_method_id][$key]", '', ArrayHelper::map($value, 'id', 'name'));
                                ?>
                            </div>
                        </div>

                    </h3>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>



    <div class="row clearfix">
        <div id="auth-code-container" class="col-md-12 column">
            <label>权限码</label>
            <div class="list-group">
                <div class="list-group-item">
                </div>
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>








