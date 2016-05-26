
$(function(){
	var $lis = $('.product-small-img li');
	var $imgs = $('.product-img > img');
	$imgs.hide().eq(0).show();
	$lis.on('click', function(){
		var index = $(this).index();
		if(!$(this).is('.selected')){
			$(this).addClass('selected').siblings().removeClass('selected');
			$imgs.eq(index).show().siblings('img').hide();
		}
	});
	var $sizes = $('.product-detal-size input');
	var $colors = $('.product-detal-color input');
	$sizes.on('click', function(){
		if(!$(this).is('.selected')){
			$(this).addClass('selected').siblings('input').removeClass('selected');
		}
	});
	$colors.on('click', function(){
		if(!$(this).is('.selected')){
			$(this).addClass('selected').siblings('input').removeClass('selected');
		}
	});
	//var $ali = $('.detal-pinglun .detal-list li');
	//var $divs = $('.detal-pinglun > div');
	//$divs.hide().eq(0).show();
	//$ali.on('click', function(){
	//	var index = $(this).index();
	//	if(!$(this).is('.selected')){
	//		$(this).addClass('selected').siblings().removeClass('selected');
	//		$divs.eq(index).show().siblings('div').hide();
	//	}
	//});
	$('.num-add').on('click', function(){
		var num = $('.cake-num-val').html();
		var $num = parseInt(num);
		$num++;
		$('.cake-num-val').html($num);
	});
	$('.num-reduce').on('click', function(){
		if(parseInt($('.cake-num-val').html())>1){
			var num = $('.cake-num-val').html();
			var $num = parseInt(num);
			$num--;
			$('.cake-num-val').html($num);
		}
	});
	$('.add-tolly').on('click', function(){
		if($(this).data('state')){
			var $categorySize = $('.product-detal-size .selected').data('category');
			var $categoryColor = $('.product-detal-color .selected').data('category');
			$.get('user/add_to_tollery',{id:$(this).data('id'),size:$categorySize,color:$categoryColor,num:$('.cake-num-val').html()},'text');
			alert("已加入购物车");
		}else{
			$('#header .login-btn').trigger('click');
		}
	});
	$('.buy-now').on('click', function(){
		if($(this).data('state')){
			var $id = $(this).data('id');
			var $categorySize = $('.product-detal-size .selected').data('category');
			var $categoryColor = $('.product-detal-color .selected').data('category');
			var $num = parseInt($('.cake-num-val').html());
			console.log($categorySize);
			console.log($categoryColor);
			location.href="user/order_up?id="+$id+"&size="+$categorySize+"&color="+$categoryColor+"&num="+$num;
		}else{
			$('#header .login-btn').trigger('click');
		}
	});
});
	