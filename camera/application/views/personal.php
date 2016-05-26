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
				<a href="user/personal"><li class="selected hover">个人资料</li></a>
				<a href="user/tollery"><li>购物车</li></a>
				<a href="user/order"><li>订单列表</li></a>
				<a href="user/contact"><li>联系我们</li></a>
			</ul>
			<div class="personal">
				<p>用户名：<?php echo $result->username;?></p>
				<p>地址：<?php echo $result->address;?></p>
				<p>联系电话：<?php echo $result->phone;?></p>
				<?php
					if($result->is_huiyuan == 0){
				?>
					<p>会员等级：无会员</p>
				<?php
					}else if($result->is_huiyuan == 1){
				?>
					<p>会员等级：VIP(会员用户可享受8折优惠！！)</p>
				<?php
					}
				?>
				<?php
					if($result->is_huiyuan == 0) {
				?>
					<p class="huiyuan" style="cursor: pointer">点击开通会员</p>
				<?php
					}
				?>

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
