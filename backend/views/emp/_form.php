<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Emp */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("用户名") ?>

    <?= $form->field($model, 'email')->label("邮箱")?>

    <?= $form->field($model, 'password')->passwordInput()->label("密码") ?>

    <?= $form->field($model, 'password_repeat')->passwordInput()->label("重复密码") ?>

    <?= $form->field($model, 'name')->label("真实姓名")?>

    <?= $form->field($model, 'gender')->radioList(["1" => "男", "0" => "女"])->label("性别")?>

    <?= $form->field($model, 'tele')->label("电话")?>

    <?= $form->field($model, 'address')->label("地址")?>

    <?= $form->field($model, 'birthday')->input('date')->label("生日")?>

    <?= $form->field($model, 'dep_id')->radioList(\backend\models\Dep::depArray())->label("所属部门")?>

    <div class="form-group">
        <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
