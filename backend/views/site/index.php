<!DOCTYPE html>
<html><head>
    <meta charset="UTF-8">
    <title>管理面板</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <li>
                        <a target="rightContent" href="/index.php/Admin/System/cleanCache">
                            <i class="glyphicon glyphicon glyphicon-refresh"></i>
                            <span>清除缓存</span>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                            <span class="hidden-xs">欢迎：admin</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="/index.php/Admin/Index/index" data-url="" class="btn btn-default btn-flat model-map">后台首页</a>
                                    <a href="/index.php/Admin/Admin/admin_info/admin_id/1" target="rightContent" class="btn btn-default btn-flat">修改密码</a>
                                    <a href="/index.php/Admin/Admin/logout" class="btn btn-default btn-flat">安全退出</a>
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
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-cog"></i><span>系统设置</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_System">
                            <a href="/index.php/Admin/System/index" target="rightContent"><i class="fa fa-circle-o"></i>网站设置</a>
                        </li><li  data-id="linkList_Article">
                            <a href="/index.php/Admin/Article/linkList" target="rightContent"><i class="fa fa-circle-o"></i>友情链接</a>
                        </li><li  data-id="navigationList_System">
                            <a href="/index.php/Admin/System/navigationList" target="rightContent"><i class="fa fa-circle-o"></i>自定义导航</a>
                        </li><li  data-id="region_Tools">
                            <a href="/index.php/Admin/Tools/region" target="rightContent"><i class="fa fa-circle-o"></i>区域管理</a>
                        </li><li  data-id="right_list_System">
                            <a href="/index.php/Admin/System/right_list" target="rightContent"><i class="fa fa-circle-o"></i>权限资源列表</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-gears"></i><span>权限管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Admin">
                            <a href="/index.php/Admin/Admin/index" target="rightContent"><i class="fa fa-circle-o"></i>管理员列表</a>
                        </li><li  data-id="role_Admin">
                            <a href="/index.php/Admin/Admin/role" target="rightContent"><i class="fa fa-circle-o"></i>角色管理</a>
                        </li><li  data-id="supplier_Admin">
                            <a href="/index.php/Admin/Admin/supplier" target="rightContent"><i class="fa fa-circle-o"></i>供应商管理</a>
                        </li><li  data-id="log_Admin">
                            <a href="/index.php/Admin/Admin/log" target="rightContent"><i class="fa fa-circle-o"></i>管理员日志</a>
                        </li>             </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-user"></i><span>员工管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_User">
                            <a href="<?=\yii\helpers\Url::to(["emp/index"])?>" target="rightContent"><i class="fa fa-circle-o"></i>会员列表</a>
                        </li>
                        <li  data-id="levelList_User">
                            <a href="<?=\yii\helpers\Url::to(["emp/create"])?>" target="rightContent"><i class="fa fa-circle-o"></i>创建会员</a>
                        </li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-book"></i><span>部门管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="<?=\yii\helpers\Url::to(["dep/index"])?>" target="rightContent"><i class="fa fa-circle-o"></i>部门列表</a>
                        </li>
                        <li>
                            <a href="<?=\yii\helpers\Url::to(["dep/create"])?>" target="rightContent"><i class="fa fa-circle-o"></i>新建部门</a>
                        </li>
                    </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-money"></i><span>订单管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Order">
                            <a href="/index.php/Admin/Order/index" target="rightContent"><i class="fa fa-circle-o"></i>订单列表</a>
                        </li><li  data-id="delivery_list_Order">
                            <a href="/index.php/Admin/Order/delivery_list" target="rightContent"><i class="fa fa-circle-o"></i>发货单</a>
                        </li><li  data-id="return_list_Order">
                            <a href="/index.php/Admin/Order/return_list" target="rightContent"><i class="fa fa-circle-o"></i>退货单</a>
                        </li><li  data-id="add_order_Order">
                            <a href="/index.php/Admin/Order/add_order" target="rightContent"><i class="fa fa-circle-o"></i>添加订单</a>
                        </li><li  data-id="order_log_Order">
                            <a href="/index.php/Admin/Order/order_log" target="rightContent"><i class="fa fa-circle-o"></i>订单日志</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-bell"></i><span>促销管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="flash_sale_Promotion">
                            <a href="/index.php/Admin/Promotion/flash_sale" target="rightContent"><i class="fa fa-circle-o"></i>抢购管理</a>
                        </li><li  data-id="group_buy_list_Promotion">
                            <a href="/index.php/Admin/Promotion/group_buy_list" target="rightContent"><i class="fa fa-circle-o"></i>团购管理</a>
                        </li><li  data-id="prom_goods_list_Promotion">
                            <a href="/index.php/Admin/Promotion/prom_goods_list" target="rightContent"><i class="fa fa-circle-o"></i>商品促销</a>
                        </li><li  data-id="prom_order_list_Promotion">
                            <a href="/index.php/Admin/Promotion/prom_order_list" target="rightContent"><i class="fa fa-circle-o"></i>订单促销</a>
                        </li><li  data-id="index_Coupon">
                            <a href="/index.php/Admin/Coupon/index" target="rightContent"><i class="fa fa-circle-o"></i>代金券管理</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-flag"></i><span>广告管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="adList_Ad">
                            <a href="/index.php/Admin/Ad/adList" target="rightContent"><i class="fa fa-circle-o"></i>广告列表</a>
                        </li><li  data-id="positionList_Ad">
                            <a href="/index.php/Admin/Ad/positionList" target="rightContent"><i class="fa fa-circle-o"></i>广告位置</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-comments"></i><span>内容管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="articleList_Article">
                            <a href="/index.php/Admin/Article/articleList" target="rightContent"><i class="fa fa-circle-o"></i>文章列表</a>
                        </li><li  data-id="categoryList_Article">
                            <a href="/index.php/Admin/Article/categoryList" target="rightContent"><i class="fa fa-circle-o"></i>文章分类</a>
                        </li><li  data-id="topicList_Topic">
                            <a href="/index.php/Admin/Topic/topicList" target="rightContent"><i class="fa fa-circle-o"></i>专题列表</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-weixin"></i><span>微信管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Wechat">
                            <a href="/index.php/Admin/Wechat/index" target="rightContent"><i class="fa fa-circle-o"></i>公众号管理</a>
                        </li><li  data-id="menu_Wechat">
                            <a href="/index.php/Admin/Wechat/menu" target="rightContent"><i class="fa fa-circle-o"></i>微信菜单管理</a>
                        </li><li  data-id="text_Wechat">
                            <a href="/index.php/Admin/Wechat/text" target="rightContent"><i class="fa fa-circle-o"></i>文本回复</a>
                        </li><li  data-id="img_Wechat">
                            <a href="/index.php/Admin/Wechat/img" target="rightContent"><i class="fa fa-circle-o"></i>图文回复</a>
                        </li><li  data-id="nes_Wechat">
                            <a href="/index.php/Admin/Wechat/nes" target="rightContent"><i class="fa fa-circle-o"></i>组合回复</a>
                        </li><li  data-id="news_Wechat">
                            <a href="/index.php/Admin/Wechat/news" target="rightContent"><i class="fa fa-circle-o"></i>消息推送</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-adjust"></i><span>模板管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="templateList?t=pc_Template">
                            <a href="/index.php/Admin/Template/templateList/t/pc" target="rightContent"><i class="fa fa-circle-o"></i>PC端模板</a>
                        </li><li  data-id="templateList?t=mobile_Template">
                            <a href="/index.php/Admin/Template/templateList/t/mobile" target="rightContent"><i class="fa fa-circle-o"></i>手机端模板</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-plug"></i><span>插件工具</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Plugin">
                            <a href="/index.php/Admin/Plugin/index" target="rightContent"><i class="fa fa-circle-o"></i>插件列表</a>
                        </li><li  data-id="index_Tools">
                            <a href="/index.php/Admin/Tools/index" target="rightContent"><i class="fa fa-circle-o"></i>数据备份</a>
                        </li><li  data-id="restore_Tools">
                            <a href="/index.php/Admin/Tools/restore" target="rightContent"><i class="fa fa-circle-o"></i>数据还原</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-signal"></i><span>统计报表</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Report">
                            <a href="/index.php/Admin/Report/index" target="rightContent"><i class="fa fa-circle-o"></i>销售概况</a>
                        </li><li  data-id="saleTop_Report">
                            <a href="/index.php/Admin/Report/saleTop" target="rightContent"><i class="fa fa-circle-o"></i>销售排行</a>
                        </li><li  data-id="userTop_Report">
                            <a href="/index.php/Admin/Report/userTop" target="rightContent"><i class="fa fa-circle-o"></i>会员排行</a>
                        </li><li  data-id="saleList_Report">
                            <a href="/index.php/Admin/Report/saleList" target="rightContent"><i class="fa fa-circle-o"></i>销售明细</a>
                        </li><li  data-id="user_Report">
                            <a href="/index.php/Admin/Report/user" target="rightContent"><i class="fa fa-circle-o"></i>会员统计</a>
                        </li><li  data-id="finance_Report">
                            <a href="/index.php/Admin/Report/finance" target="rightContent"><i class="fa fa-circle-o"></i>财务统计</a>
                        </li>             </ul>
                </li><li class="treeview">
                    <a href="javascript:void(0)">
                        <i class="fa fa-anchor"></i><span>自提点管理</span><i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li  data-id="index_Pickup">
                            <a href="/index.php/Admin/Pickup/index" target="rightContent"><i class="fa fa-circle-o"></i>自提点列表</a>
                        </li><li  data-id="add_Pickup">
                            <a href="/index.php/Admin/Pickup/add" target="rightContent"><i class="fa fa-circle-o"></i>添加自提点</a>
                        </li>             </ul>
                </li>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#riframe").height($(window).height()-100);//浏览器当前窗口可视区域高度
        $("#rightContent").height($(window).height()-100);
        $('.main-sidebar').height($(window).height()-50);
    });
</script>

</body></html>