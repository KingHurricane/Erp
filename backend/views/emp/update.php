<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Emp */

$this->title = '修改员工: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => Yii::$app->getRequest()->get('id')]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
