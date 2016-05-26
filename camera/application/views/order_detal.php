<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>商品详情</title>
	<base href="<?php echo site_url()?>">
	<link rel="stylesheet" href="css/common.css">
	<link rel="stylesheet" href="css/order_detal.css">
</head>
<body>
	<?php include "hearder.php";?>
	<div id="container">
		<div class="wrap">
			<div class="product-img">
				<img class="product-big-img1" src="<?php echo $result->product_picture;?>">
				<ul class="product-small-img">
					<li class="selected"><img style="width: 90px;height: 90px;margin-left: 1px;margin-top: 1px;" src="<?php echo $result->product_picture;?>" alt=""></li>
				</ul>
			</div>
			<div class="product-detal">
				<div class="product-detal-title"><?php echo $result->product_introduce?></div>
				<div class="product-detal-maijia">
					卖家：xx数码 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>种类：<?php echo $result->product_kind?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>品牌：<?php echo $result->product_pinpai?></span>
				</div>
				<div class="product-detal-price">
					<span class="jiage">价格：</span><span class="jiage-num">￥<?php echo $result->product_price?></span>
				</div>
				<br><br>
				<?php
					if($result->product_kind == "数码相机"){
				?>
					<div class="product-detal-size">
						尺寸：<input class="selected" type="button" value="3英寸" data-category="1">
						<input type="button" value="4英寸" data-category="2">
						<input type="button" value="5英寸" data-category="3">
					</div>
				<?php
					}else if($result->product_kind == "手机"){
				?>
					<div class="product-detal-size">
						尺寸：<input class="selected" type="button" value="7英寸" data-category="4">
						<input type="button" value="8英寸" data-category="5">
						<input type="button" value="9英寸" data-category="6">
					</div>
				<?php
					}else if($result->product_kind == "笔记本电脑"){
				?>
					<div class="product-detal-size">
						尺寸：<input class="selected" type="button" value="15英寸" data-category="7">
						<input type="button" value="16英寸" data-category="8">
						<input type="button" value="17英寸" data-category="9">
					</div>
				<?php
					}
				?>

				<br>
				<div class="product-detal-color">
					颜色：<input class="selected" type="button" value="白" data-category="1">
					<input type="button" value="黑" data-category="2">
					<input type="button" value="灰" data-category="3">
				</div>
				<br>
				<div class="product-detal-num">
					<span class="num">数量：&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<div class="cake-num">
						<span class="num-reduce">-</span>
						<span class="cake-num-val">1</span>
						<span class="num-add">+</span>
					</div>
					<br>
				</div>
				<div class="add-to-tolly">
					<div class="buy-now" data-id="<?php echo $result->product_id?>" data-state="<?php  $user = $this->session->userdata('login_user');if($user){echo $user->username;}else{echo "";}?>">立即购买</div>
					<div class="add-tolly" data-id="<?php echo $result->product_id?>" data-state="<?php  $user = $this->session->userdata('login_user');if($user){echo $user->username;}else{echo "";}?>">加入购物车</div>
				</div>
			</div>
			<!-- <div class="detal-pinglun">
				<ul class="detal-list">
					<li class="selected">商品详情</li>
					<li>评论</li>
				</ul>
				<div class="detal">
					<table>
						<tr>
							<td>xx数码相机</td>
						</tr>
						<tr>
							<td>型号</td>
						</tr>
						<tr>
							<td>生产日期</td>
						</tr>
						<tr>
							<td>镜头参数</td>
						</tr>
						<tr>
							<td>机身参数</td>
						</tr>
					</table>
				</div>
				<div class="pinglun">
					<table>
						<tr>
							<td>评价</td>
							<td>第三次困难的事</td>
							<td>xx号</td>
							<td>小明</td>
						</tr>
						<tr>
							<td>评价</td>
							<td>第三次困难的事</td>
							<td>xx号</td>
							<td>小明</td>
						</tr>
						<tr>
							<td>评价</td>
							<td>第三次困难的事</td>
							<td>xx号</td>
							<td>小明</td>
						</tr>
					</table>
				</div>
			</div> -->
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
<script src="js/order_detal.js"></script>
<script src="js/common.js"></script>
</html>