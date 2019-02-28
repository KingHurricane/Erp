<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>管理面板</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-param" content="<?=$csrfParam?>">
    <meta name="csrf-token" content="<?=$csrfToken?>">

    <!-- Bootstrap 3.3.4 -->
    <link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- FontAwesome 4.3.0 -->
    <link href="/Public/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Ionicons 2.0.0 --
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="/Public/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css">
    <!-- iCheck -->
    <link href="/Public/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery 2.1.4 -->
    <script src="/Public/plugins/jQuery/jQuery-2.1.4.min.js"></script>


    <style type="text/css">
        #riframe{min-height:inherit !important}
    </style>
    <meta name="__hash__" content="40390ff8c1de6e5b5f80bd80d3196959_3ad95fc99834a5c8675bd16db23d57da"></head>
<body class="skin-green-light sidebar-mini" style="overflow-y:hidden;">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/index.php/Admin/Index/index" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b></b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img src="/Public/images/logo.png" width="40" height="30">&nbsp;&nbsp;<b>Manager</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/index.php" target="_blank">
                            <i class="glyphicon glyphicon-home"></i>
                            <span>网站前台</span>
                        </a>
                    </li>
<!--                    <li>-->
<!--                        <a target="rightContent" href="/index.php/Admin/System/cleanCache">-->
<!--                            <i class="glyphicon glyphicon glyphicon-refresh"></i>-->
<!--                            <span>清除缓存</span>-->
<!--                        </a>-->
<!--                    </li>-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="hidden-xs">欢迎：<?=\Yii::$app->user->identity['name'];?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="<?=\yii\helpers\Url::to(["site/index"])?>" data-url="" class="btn btn-default btn-flat model-map">后台首页</a>
                                    <a href="<?=\yii\helpers\Url::to(["emp/update", "id" => \Yii::$app->user->id])?>" target="rightContent" class="btn btn-default btn-flat">修改信息</a>
                                    <?php
                                    echo \yii\helpers\Html::a('安全退出', \yii\helpers\Url::to(["site/logout"]),
                                        [
                                            'class' => 'btn btn-default btn-flat',
                                            'data' => ['method' => 'post'],
                                            ])
                                    ?>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar" style="overflow-y: auto; height: 177px;">
        <section class="sidebar" style="height: auto;">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
                </div>
                <input type="hidden" name="__hash__" value="40390ff8c1de6e5b5f80bd80d3196959_3ad95fc99834a5c8675bd16db23d57da"></form>
            <!-- /.search form -->
            <ul class="sidebar-menu">
                <?php foreach($menu as $key => $value):?>
                <?php if(!empty($value['child'])):?>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-circle-o"></i><span><?=$value['name']?></span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php foreach($value['child'] as $k => $v):?>
                        <li  data-id="role_Admin">
                            <a href="<?=\yii\helpers\Url::to([$v['auth_key']])?>" target="rightContent"><i class="fa fa-circle-o"></i><?=$v['name']?></a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <?php endif;?>
                <?php endforeach; ?>
            </ul>
        </section>
    </aside>

    <section class="content-wrapper right-side" id="riframe" style="margin: 0px 0px 0px 230px; padding: 0px; min-height: 706px; height: 77px;">
        <iframe id="rightContent" name="rightContent" src="" width="100%" frameborder="0" style="height: 77px;"></iframe>
    </section>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            感谢使用此系统<b></b>
        </div>
        <strong>Copyright © 2015-2025 <a href="/">管理系统</a>.</strong>。
    </footer>


</div>

<script src="/Public/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/Public/dist/js/app.js" type="text/javascript"></script>
<script src="/yii.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#riframe").height($(window).height()-100);//浏览器当前窗口可视区域高度
        $("#rightContent").height($(window).height()-100);
        $('.main-sidebar').height($(window).height()-50);
    });
</script>

</body></html>