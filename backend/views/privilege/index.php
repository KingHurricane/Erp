<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PrivilegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Privileges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="privilege-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建权限', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
