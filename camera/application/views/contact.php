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
            <a href="user/order"><li>订单列表</li></a>
            <a href="user/contact"><li class="selected hover">联系我们</li></a>
        </ul>
        <div class="contact">
            <p>公司名称：xx数码</p>
            <p>公司地址：xx省xx市xx街xx号</p>
            <p>公司电话：15555555555</p>
            <p>公司邮箱：xxshuma@163.com</p>
            <p>如果您有什么意见或者不满意的地方，请在下面留言或者发邮件到我公司邮箱</p>
            您的电话：<input type="text"><br>
            您的QQ：<input type="text"><br>
            您的邮箱：<input type="text"><br>
            您的意见：<br><textarea name="" id="" cols="50" rows="5"></textarea><br>
            <input type="button" value="留言"><br>
            <p>非常感谢您的光临 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;xx数码</p>
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
