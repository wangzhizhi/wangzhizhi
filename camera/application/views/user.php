<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="backend/index">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <li><a href="javascript:;">管理员</a></li>
                <li><a href="javascript:;"><?php echo $username;?></a></li>
                <li><a href="backend/logout">退出</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="javascript:;"><i class="icon-font">&#xe003;</i>信息统计</a>
                    <ul class="sub-menu">
                        <li><a href="backend/index"><i class="icon-font">&#xe008;</i>用户信息</a></li>
                        <li><a href="backend/product"><i class="icon-font">&#xe012;</i>商品信息</a></li>
                        <li><a href="backend/order"><i class="icon-font">&#xe005;</i>全部订单</a></li>
                        <li><a href="backend/order_no"><i class="icon-font">&#xe006;</i>未发货订单</a></li>
                        <li><a href="backend/order_mid"><i class="icon-font">&#xe006;</i>待确认收货</a></li>
                        <li><a href="backend/order_over"><i class="icon-font">&#xe004;</i>已完成订单</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i></span><span class="crumb-name">用户信息</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th style="text-align: center">ID</th>
                            <th style="text-align: center">姓名</th>
                            <th style="text-align: center">地址</th>
                            <th style="text-align: center">电话</th>
                            <th style="text-align: center">会员</th>
                        </tr>
                        <?php
                            foreach($users as $user){
                        ?>
                            <tr>
                                <td style="text-align: center"><?php echo $user->user_id;?></td>
                                <td style="text-align: center"><?php echo $user->username;?></td>
                                <td style="text-align: center"><?php echo $user->address;?></td>
                                <td style="text-align: center"><?php echo $user->phone;?></td>
                                <td style="text-align: center"><?php if($user->is_huiyuan == 0){echo "无会员";}else{echo "会员";}?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <!--/main-->
</div>
</body>
</html>