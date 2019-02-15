<?php

/* @var $this \yii\web\View */
/* @var $content string */
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use backend\assets\AppAsset;
$this->title = '登陆';

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="templatemo-bg-gray">
<?php $this->beginBody() ?>


<div class="container">
    <div class="col-md-12">
        <h3 class="margin-bottom-15">登陆</h3>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder' => '用户名'])->label(false) ?>

        <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码'])->label(false) ?>

        <?= $form->field($model, 'rememberMe')->checkbox()->label("保持登陆状态") ?>

        <div class="form-group">
            <?= Html::submitButton('登陆', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>







