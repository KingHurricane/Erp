<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\Privilege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="privilege-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(\backend\models\Privilege::ToplistMap())->label("所属分组") ?>

    <label>选择控制器</label>
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="btn-group">
                <?php foreach(\backend\models\Controller_class::listMap() as $key => $value):?>
                <button class="btn btn-default" type="button" data-class-id="<?=$key?>"><?=$value?></button>
                <?php endforeach;?>
            </div>
        </div>
    </div>

    <div class="row clearfix">
        <div id="methods_container" class="col-md-12 column" data-method-checked='<?=$method_checked_ids?>'>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        方法列表...
                    </h3>
                </div>
            </div>

            <?php foreach($controller_methods as $key => $value):?>
            <div id="class-id-<?=$key?>" class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <div class="page-header">
                            <h3>
                                <small>选择方法</small><br/>
                                <input class="method-check-all" type="checkbox">
                                <small>全选</small>
                            </h3>
                            <div class="method-list" data-class-id="<?=$key?>">
                                <?php
                                    echo Html::checkboxList("Privilege[class_id_method_id][$key]", '', ArrayHelper::map($value, 'id', 'name'));
                                ?>
                            </div>
                        </div>

                    </h3>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>



    <div class="row clearfix">
        <div id="auth-code-container" class="col-md-12 column">
            <label>权限码</label>
            <div class="list-group">
                <div class="list-group-item">
                </div>
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<?php
    $this->registerJs("$('#methods_container>div').hide();
        $('#methods_container>div').first().show();
        $('.btn-group').find('button').click(function(){
            $(this).addClass('active').siblings().removeClass('active');
            $('#methods_container>div').hide();
            add_data_to_checkbox(this);
            $('#class-id-' + $(this).data('class-id')).show();
//            console.log($('#class-id-' + $(this).data('class-id')).find('input').data('class-name'));

        });
        function add_data_to_checkbox(btn_group_this){
            $('#class-id-' + $(btn_group_this).data('class-id')).find('input').data('class-name', $(btn_group_this).text());
        }

        $('.method-check-all').click(function(){

            if($(this).prop('checked') == true){

//                $(this).parent().parent().find('input').prop('checked', $(this).prop('checked'));
                $(this).parent().next().find('input').each(function(k, v){
                    if($(v).prop('checked') == false){
                        $(v).trigger('click');
                    }
                })
            }else{
                $(this).parent().next().find('input').each(function(k, v){
                    if($(v).prop('checked') == true){
                        $(v).trigger('click');
                    }
                })
            }
        });

        $('.method-list input').click(function(){
            if($(this).prop('checked') == true){
                if(!key_exists(this)){
                    $('<input name=Privilege[key][] value=' +
                        $(this).data('class-name') + '@' + $(this).parent().text().trim() + '_' + $(this).parent().parent().parent().data('class-id') + '-' + $(this).val() +
                        ' class=form-control style=width:30%; ' +
                        'id=' + $(this).parent().parent().parent().data('class-id') + '-' + $(this).val() +
                        '>'
                    ).
                    appendTo($('.list-group-item'));
                }
            }else {
                if(key_exists(this)){
                    $('#' + $(this).parent().parent().parent().data('class-id') + '-' + $(this).val()).remove();
                }
                $(this).parent().parent().parent().prev().find('input').prop('checked', false);
            }

            function key_exists(code_key){
                return $('#' + $(code_key).parent().parent().parent().data('class-id') + '-' + $(code_key).val()).length > 0
            }
        });

        var method_checked_array = $('#methods_container').data('method-checked').split(',');
        console.log(method_checked_array);

        $('#methods_container').find('input').each(function(k,v){
            console.log($(v).parent().parent().parent().data('class-id') + '-' + $(v).val());
            if($.inArray($(v).parent().parent().parent().data('class-id') + '-' + $(v).val(), method_checked_array) >= 0){

                $('.btn-group button').each(function(key,value){
                    if($(value).data('class-id') == $(v).parent().parent().parent().data('class-id')){
                        add_data_to_checkbox(value);
                    }
                })
                $(v).trigger('click');
            }
        })")
?>








