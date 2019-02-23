<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("用户名") ?>

                <?= $form->field($model, 'email')->label("邮箱")?>

                <?= $form->field($model, 'password')->passwordInput()->label("密码") ?>

                <?= $form->field($model, 'password_repeat')->passwordInput()->label("重复密码") ?>

                <?= $form->field($model, 'name')->label("真实姓名")?>

                <?= $form->field($model, 'gender')->inline(true)->radioList(["1" => "男", "0" => "女"])->label("性别")?>

                <?= $form->field($model, 'tele')->label("电话")?>

                <?= $form->field($model, 'address')->label("地址")?>

                <?= $form->field($model, 'birthday')->input('date')->label("生日")?>

                <?= $form->field($model, 'dep_id')->inline(true)->radioList(\backend\models\Dep::depList())->label("所属部门")?>

                <div class="form-group">
                    <?= Html::submitButton('提交', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
