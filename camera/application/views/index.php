<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<base href="<?php echo site_url()?>">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<?php include "hearder.php";?>
	<div id="search">
		<div class="wrap">
			<span class="search-shop">XX数码商城：</span>
			<div class="search-con">
				<span class="search-tip"></span>
				<input type="text" value="搜索您想要的商品">
				<span class="sousuo">搜索</span>
			</div>
		</div>
	</div>
	<div id="container">
		<div class="wrap">
			<?php
				foreach($result as $product){
			?>
				<div class="product">
					<a href="user/order_detal?id=<?php echo $product->product_id?>">
						<img src="<?php echo $product->product_picture;?>" alt="">
						<p>￥<?php echo $product->product_price;?></p>
						<p><?php echo $product->product_introduce;?></p>
						<p>种类：<?php echo $product->product_kind;?></p>
						<p>品牌：<?php echo $product->product_pinpai;?></p>
						<p>卖家：XX数码</p>
					</a>
				</div>
			<?php
				}
			?>
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
<script src="js/index.js"></script>
<script src="js/common.js"></script>
</html>