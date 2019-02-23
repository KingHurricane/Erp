<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Privilege */

$this->title = '修改权限: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Privileges', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="privilege-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'controller_methods' => $controller_methods,
        'method_checked_ids' => $method_checked_ids,
    ]) ?>

</div>
