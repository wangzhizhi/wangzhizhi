<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <base href="<?php echo site_url()?>">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/personal.css">
</head>
<body>
<?php include "hearder.php";?>
<div id="container">
    <div class="wrap">
        <ul class="nav">
            <span><img src="img/product.jpg" alt=""></span>
            <a href="user/personal"><li>个人资料</li></a>
            <a href="user/tollery"><li>购物车</li></a>
            <a href="user/order"><li class="selected hover">订单列表</li></a>
            <a href="user/contact"><li>联系我们</li></a>
        </ul>
        <div class="order">
            <table class="order-list">
                <!-- 商品表头 -->
                <tr class="order-list-head">
                    <td style="text-align:right; width:218px;">商品信息</td>
                    <td style="text-align:center; width:132px;"></td>
                    <td style="text-align:center; width:108px;">单价(元)</td>
                    <td style="text-align:center; width:116px;">数量</td>
                    <td style="text-align:center; width:110px;">实付款</td>
                    <td style="text-align:center; width:144px;">操作</td>
                </tr>
                <?php
                $j = 0;
                    foreach($results as $result){
                        $j++;
                ?>
                    <tr class="order-num">
                        <td colspan="6" style="text-indent:20px;">
                            <?php echo $result->order_date;?> &nbsp;&nbsp;&nbsp;订单号：1544152121212<?php echo $j;?>
                        </td>
                    </tr>
                    <?php
                        $i = 0;
                        foreach($result->items as $item){
                            $i++;
                            if($i == 1){
                    ?>
                            <tr class="cake-order">
                                <td colspan="2" style="text-indent:10px;">
                                    <span class="cake-img"><img src="<?php echo $item->product_picture;?>" alt=""></span>
                                    <p class="cake-order-style"><?php echo $item->product_introduce;?></p>
                                    <p class="cake-order-style">种类：<?php echo $item->product_kind;?></p>
                                    <p class="cake-order-style">颜色：<?php echo $item->product_color;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尺寸：<?php echo $item->product_size;?></p>
                                    <p class="cake-kind cake-order-style">品牌：<?php echo $item->product_pinpai;?></p>
                                </td>
                                <td><p><?php echo $item->product_price;?></p></td>
                                <td style="text-align: center;font-family: '微软雅黑';"><?php echo $item->amount;?></td>
                                <td style=" border-left:1px solid #f3fbff;">
                                    <p><?php echo ($item->amount * $item->product_price);?></p>
                                </td>
                                <td  rowspan="<?php echo count($result->items)?>" style=" border-left:1px solid #f3fbff;">
                                    <p>总价格：<?php echo ($result->price_count * $item->discount);?>元</p>
                                    <?php
                                        if($result->order_state == 0){
                                    ?>
                                        <p>未发货</p>
                                        <p>等待卖家发货</p>
                                    <?php
                                        }else if($result->order_state == 1){
                                    ?>
                                        <p class="contact-seller"><a href="user/update_state?id=<?php echo $result->order_id;?>">确认收货</a></p>
                                    <?php
                                        }else{
                                    ?>
                                        <p>交易完成</p>
                                    <?php
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php
                            }else{
                    ?>
                            <tr class="cake-order">
                                <td colspan="2" style="text-indent:10px;">
                                    <span class="cake-img"><img src="<?php echo $item->product_picture;?>" alt=""></span>
                                    <p class="cake-order-style"><?php echo $item->product_introduce;?></p>
                                    <p class="cake-order-style">种类：<?php echo $item->product_kind;?></p>
                                    <p class="cake-order-style">颜色：<?php echo $item->product_color;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;尺寸：<?php echo $item->product_size;?></p>
                                    <p class="cake-kind cake-order-style">品牌：<?php echo $item->product_pinpai;?></p>
                                </td>
                                <td><p><?php echo $item->product_price;?></p></td>
                                <td style="text-align: center;font-family: '微软雅黑';"><?php echo $item->amount;?></td>
                                <td style=" border-left:1px solid #f3fbff;">
                                    <p><?php echo ($item->amount * $item->product_price);?></p>
                                </td>
                            </tr>
                    <?php
                            }
                        }
                    ?>
                <?php
                    }
                ?>

            </table>
        </div>
    </div>
</div>
<div id="block"></div>
<div id="footer">
    <div class="wrap">
        <div class="focus">
            <div id="phone"></div>
            关注楚融金融
            <div id="focus-img"></div>
        </div>
        <div id="contact">
            <ul>
                <li>楚融金融</li>
                <li>关于楚融</li>
                <li>楚融动态</li>
                <li>理财顾问</li>
                <li>产品服务</li>
                <li>服务合作</li>
                <li>联系我们</li>
            </ul>
            <p>公司地址：上海市普陀区真南路</p>
            <p>全国服务电话：400-xxx-5469</p>
            <span class="china">版权所有：北京  京ICP备13024761号  技术支持：中国万网</span>
            <span class="sina"></span>
            <span class="weibo"></span>
        </div>
    </div>
</div>
</body>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/personal.js"></script>
<script src="js/common.js"></script>
</html>
