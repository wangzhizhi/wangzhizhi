



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>提交订单</title>
	<base href="<?php echo site_url()?>">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/order_up.css">
</head>
<body>
	<?php include "hearder.php";?>
	<div id="container">
		<div class="wrap">
			<p class="confirm-address">确定收货地址</p>
			<div class="address">邮寄地址 : <?php echo $user->address;?>    <?php echo $user->username?>收     <?php echo $user->phone?></div>
			<p class="confirm-order">确认订单信息</p>
			<table class="order">
				<tr>
					<td style="width:600px; text-align:center;">店铺宝贝</td>
					<td style="width:200px; text-align:center;">单价</td>
					<td style="width:200px; text-align:center;">数量</td>
					<td style="width:200px; text-align:center;">小计</td>
				</tr>
				<?php
				if($products != null){
					foreach($products as $product){
				?>
					<tr>
						<td>
							<img src="img/product.jpg" alt="" data-id="<?php echo $product->product_id?>">
							<p><?php echo $product->product_introduce?></p>
							<p>品牌：<?php echo $product->product_pinpai?></p>
							<p>种类：<?php echo $product->product_kind?></p>
							<p>颜色：<?php echo $product->product_color?></p>
							<p>尺寸：<?php echo $product->product_size?></p>
						</td>
						<td style="text-align:center;"><?php echo $product->product_price?></td>
						<td style="text-align:center;"><?php echo $product->cart_amount?></td>
						<td style="text-align:center;"><?php echo $product->amount_price?></td>
					</tr>
				<?php
					}
				}else{
				?>
					<tr>
						<td>
							<img src="img/product.jpg" alt="">
							<p><?php echo $result->product_introduce?></p>
							<p>品牌：<?php echo $result->product_pinpai?></p>
							<p>种类：<?php echo $result->product_kind?></p>
							<p>颜色：<?php echo $color?></p>
							<p>尺寸：<?php echo $size?></p>
						</td>
						<td style="text-align:center;"><?php echo $result->product_price?></td>
						<td style="text-align:center;"><?php echo $num?></td>
						<td style="text-align:center;"><?php echo $num_price?></td>
					</tr>
				<?php
				}
				?>

			</table>
			<?php
				if($products != null){
			?>
				<p style="text-align:right; font-family: '微软雅黑';">总价：<?php echo $amount_prices?></p>
				<div class="pay">
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">实付款：￥<?php echo $amount_prices?></p>
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">寄送地址：<?php echo $user->address;?></p>
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">收货人：<?php echo $user->username?>     <?php echo $user->phone?></p>
				</div><br><br><br><br><br><br><br><br><br>
				<div class="sub">提交订单</div>
			<?php
				}else{
			?>
				<p style="text-align:right; font-family: '微软雅黑';">总价：<?php echo $num_price?></p>
				<div class="pay">
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">实付款：￥<?php echo $num_price?></p>
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">寄送地址：<?php echo $user->address;?></p>
					<p style="text-align:right; font-family: '微软雅黑'; line-height: 35px;">收货人：<?php echo $user->username?>     <?php echo $user->phone?></p>
				</div><br><br><br><br><br><br><br><br><br>
				<div class="sub"><a href="user/pay?size=<?php echo $size?>&color=<?php echo $color?>&id=<?php echo $result->product_id?>&num=<?php echo $num?>&price="<?php echo $result->product_price?> style="color: #fff;">提交订单</a></div>
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
<script src="js/order_up.js"></script>
<script src="js/common.js"></script>
</html>