$(function(){
	$searchBox = $(".search-con input");
	$searchBox.focus(function(){
		$(this).addClass('focus');
		if($(this).val() == this.defaultValue){
			this.value = "";
		}
	}).blur(function(){
		$(this).removeClass('focus').val(this.value == ""?this.defaultValue:this.value);
	});
	$('.sousuo').on('click', function(){
		var $val = $(".search-con input").val();
		$.get('user/check_product',{data:$val},function(data){
			if(data.length != 0){
				$('#container .wrap').html('');
				for(var i=0; i<data.length; i++){
					var html = '<div class="product">'
							+'<a href="user/order_detal?id='+data[i].product_id+'">'
							+'<img src="'+data[i].product_picture+'" alt="">'
							+'<p>￥'+data[i].product_price+'</p>'
							+'<p>'+data[i].product_introduce+'</p>'
							+'<p>种类：'+data[i].product_kind+'</p>'
							+'<p>品牌：'+data[i].product_pinpai+'</p>'
							+'<p>卖家：XX数码</p>'
							+'</a>'
							+'</div>';
					$('#container .wrap').append(html);
				}
			}
		},'json');
	});
});