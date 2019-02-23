<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<div class="container">
<?= $content ?>
<div>
<?php $this->endBody() ?>


    <script>
        $('#methods_container>div').hide();
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

        $('#methods_container').find('input').each(function(k,v){
//            console.log($(v).parent().parent().parent().data('class-id') + '-' + $(v).val());
            if($.inArray($(v).parent().parent().parent().data('class-id') + '-' + $(v).val(), method_checked_array) > 0){
                $('.btn-group button').each(function(key,value){
                    if($(value).data('class-id') == $(v).parent().parent().parent().data('class-id')){
                        add_data_to_checkbox(value);
                    }
                })
                $(v).trigger('click');
            }
        })
    </script>
</body>
</html>
<?php $this->endPage() ?>

