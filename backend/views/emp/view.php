<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Emp */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Emps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="emp-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'status',
//            'created_at',
//            'updated_at',
            'name',
            [
                'attribute' => 'gender',
                'value' => function($model){
                    return $model->gender ? '女' : '男';
                }
            ],
            'tele',
            'address',
            [
                'attribute' => 'birthday',
                'value' => function($model){
                    return date("Y-m-d", $model->birthday);
                }
            ],
            [
                'attribute' => 'dep_id',
                'value' => function($model){
                    return \backend\models\Dep::findOne($model->dep_id)->name;
                }
            ]
        ],
    ]) ?>

</div>
