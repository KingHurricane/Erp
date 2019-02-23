<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Privilege */

$this->title = '新建权限';
$this->params['breadcrumbs'][] = ['label' => 'Privileges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="privilege-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'controller_methods' => $controller_methods,
        'method_checked_ids' => ''
    ]) ?>

</div>
