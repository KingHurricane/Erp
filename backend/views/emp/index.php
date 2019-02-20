<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EmpSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '员工';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新建员工', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'username',
                'label' => '用户名'
            ],
            'email:email',
            [
                'attribute' => 'status',
                'label' => '状态',
                'value' => function($model){
                    return $model->status ? "开启" : "关闭";
                },
                'filter' => ["10" => "开启", "0" => "关闭"]
            ],
            //'created_at',
            //'updated_at',
            'name',
            [
                'attribute' => 'gender',
                'label' => '性别',
            ],
            [
                'attribute' => 'tele',
                'label' => '电话号码'
            ],
            [
                'attribute' => 'address',
                'label' => '地址',
            ],
            [
                'attribute' => 'birthday',
                'value' => function($model){
                    return date("Y/m/d", $model->birthday);
                },
                'label' => '出生日期',
                'filter' => "<h5 style='text-align:center;'>晚于</h5>".Html::Input('date', 'EmpSearch[birthday]', '', ['class' => 'form-control']),
            ],
            [
                'attribute' => 'dep_id',
                'value' => function($model){
                    return \backend\models\Dep::findOne($model->dep_id)->name;
                },
                'filter' => \backend\models\Dep::depArray(),
                'label' => '部门ID',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
