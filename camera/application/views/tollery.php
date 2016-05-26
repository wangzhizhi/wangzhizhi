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
            <a href="user/tollery"><li class="selected hover">购物车</li></a>
            <a href="user/order"><li>订单列表</li></a>
            <a href="user/contact"><li>联系我们</li></a>
        </ul>
        <div class="tolley">
            <div class="shopping-trolley">
                <table class="order-list">
                    <!-- 商品表头 -->
                    <tr class="order-list-head">
                        <td style="text-align:right; width:218px;">商品信息</td>
                        <td style="text-align:center; width:132px;"></td>
                        <td style="text-align:center; width:108px;">单价(元)</td>
                        <td style="text-align:center; width:116px;">数量</td>
                        <td style="text-align:center; width:110px;">金额</td>
                        <td style="text-align:center; width:144px;">操作</td>
                    </tr>
                    <?php
                    foreach($products as $product){

                    ?>
                        <tr class="cake-order" data-id="<?php echo $product->product_id?>" data-cart="<?php echo $product->cart_id?>">
                            <td colspan="2" style="text-indent:10px;">
                                <input type="checkbox" name="operate">
                                <span class="cake-img"><img src="<?php echo $product->product_picture;?>" alt=""></span>
                                <p class="cake-order-style1"><?php echo $product->product_introduce?></p>
                                <p class="cake-order-style1">种类：<?php echo $product->product_kind?></p>
                                <p class="cake-order-style1">颜色:<?php echo $product->product_color?>&nbsp;&nbsp;&nbsp; 尺寸:<?php echo $product->product_size?></p>
                                <p class="cake-kind cake-order-style1">品牌：<?php echo $product->product_pinpai?></p>
                            </td>
                            <td><p class="product-price"><?php echo $product->product_price?></p></td>
                            <td>
                                <div class="cake-num">
                                    <span class="num-reduce">-</span>
                                    <span class="cake-num-val" style="font-family: 微软雅黑"><?php echo $product->cart_amount?></span>
                                    <span class="num-add">+</span>
                                </div>
                            </td>
                            <td style=" border-left:1px solid #f3fbff;">
                                <p class="amount-price"><?php echo $product->amount_price?></p>
                            </td>
                            <td style=" border-left:1px solid #f3fbff;">
                                <p class="delete">删除</p>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </table>
            </div>
            <ul class="accounts">
                <li style="width: 100px;">
                    <input class="all-check2" type="checkbox"> 全选
                </li>
                <li class="delete" style="width: 328px;">删除</li>
<!--                <li style="width: 268px;">加入收藏夹</li>-->
                <li style="width: 104px;">已选商品<span class="check-amount">0</span>件</li>
                <li style="width: 218px">合计:￥<span class="amount-price">0</span></li>
                <li class="pay" style="width: 81px;cursor: pointer">结算</li>
            </ul>
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
