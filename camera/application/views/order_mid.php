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
                <li><a href="http://www.jscss.me">管理员</a></li>
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
            <div class="crumb-list"><i class="icon-font"></i></span><span class="crumb-name">未发货订单</span></div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <?php
                        foreach($orders as $order){
                            ?>
                            <tr>
                                <th style="text-align: center"><?php echo $order->order_id;?></th>
                                <th style="text-align: center" colspan="2" ><?php echo $order->name;?></th>
                                <th style="text-align: center"><?php if($order->order_state == 0){echo "待发货 <a href='backend/update_state?id=$order->order_id'>点击发货</a>";}else if($order->order_state == 1){echo "已发货，待买家确认收货";}else{echo "交易完成";}?></th>
                                <th style="text-align: center"><?php echo $order->price_count;?></th>
                            </tr>
                            <?php
                            foreach($order->items as $item){
                                ?>
                                <tr>
                                    <td>
                                        <p><?php echo $item->product_introduce;?></p>
                                        <p>品牌：<?php echo $item->product_pinpai;?> 种类：<?php echo $item->product_kind;?></p>
                                        <p>尺寸：<?php echo $item->product_size;?> 颜色：<?php echo $item->product_color;?></p>
                                    </td>
                                    <td colspan="2" style="text-align: center"><?php echo $item->amount;?></td>
                                    <td style="text-align: center"><?php echo $item->product_price;?></td>
                                    <td style="text-align: center"><?php echo ($item->amount * $item->product_price);?></td>
                                </tr>
                                <?php
                            }
                            ?>
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