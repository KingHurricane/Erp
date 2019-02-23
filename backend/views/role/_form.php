<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Role */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="list-group">
                <a href="#" class="list-group-item"><b>选择权限</b></a>
                <?php foreach($privileges as $key => $value): ?>
                <div class="list-group-item">

                    <div class="page-header">
                        <div>
                            <label>
                                <input type="checkbox" > <?=$value['name']?>
                            </label>
                        </div>
                    </div>

                    <div>
                        <?php foreach($value['child'] as $k => $v):?>
                        <label>
                            <input name="Role[privilege][]" type="checkbox" value="<?=$v['id']?>" <?php if(in_array($v['id'], $privilege_checked)){echo "checked=checked";} ?>> <?=$v['name']?>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    $this->registerJs("$('.page-header input').click(function (e) {
            $(this).parent().parent().parent().next().find('input').prop('checked',$(this).prop('checked'));
        });")
?>
