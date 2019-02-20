<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Emp */

$this->title = '新建员工';
$this->params['breadcrumbs'][] = ['label' => 'Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
