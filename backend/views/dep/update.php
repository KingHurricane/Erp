<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Dep */

$this->title = '修改部门: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Deps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dep-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
