$(function(){
	var $lis = $('.nav li');
	var $divs = $('#container .wrap>div');
	$divs.hide().eq(0).show();
	$lis.hover(function(){
		if(!$(this).is('.hover')){
			$(this).addClass('hover').siblings().removeClass('hover');
		}
	},function(){
		$(this).removeClass('hover');
	});
	var priceSum = 0;
	$('.num-add').hover(function(){
		$(this).on('click', function(){
			var num = $(this).siblings('.cake-num-val').html();
			var price = $(this).parent().parent().prev().children('.product-price').html();
			var $num = parseInt(num);
			$num++;
			$(this).siblings('.cake-num-val').html($num);
			var amountPrice = parseInt($num) * price;
			$(this).parent().parent().next().children('.amount-price').html(amountPrice);
			//$('.amount-price').html(amountPrice);
			if($(this).parent().parent().prev().prev().children('input')[0].checked){
				priceSum += parseInt(price);
				$('.accounts .amount-price').html(priceSum);
			}
		});
	}, function(){
		$(this).unbind('click');
	});
	$('.num-reduce').hover(function(){
		$(this).on('click', function(){
			if(parseInt($(this).siblings('.cake-num-val').html())>1) {
				var num = $(this).siblings('.cake-num-val').html();
				var price = $(this).parent().parent().prev().children('.product-price').html();
				var $num = parseInt(num);
				$num--;
				$(this).siblings('.cake-num-val').html($num);
				var amountPrice = parseInt($num) * price;
				$(this).parent().parent().next().children('.amount-price').html(amountPrice);
				if($(this).parent().parent().prev().prev().children('input')[0].checked){
					priceSum -= parseInt(price);
					$('.accounts .amount-price').html(priceSum);
				}
			}
		});
	}, function(){
		$(this).unbind('click');
	});
	var checkBox = $('input[type=checkbox][name=operate]');
	$(".all-check2").on('click', function(){
		var arr = new Array();
		if(this.checked){				 //如果当前点击的多选框被选中
			checkBox.prop("checked", true );
			$('.all-check1').prop("checked", true );
			var checkedBox = $('input:checked[type=checkbox][name=operate]');
			checkedBox.each(function(i){
				var price = checkedBox.eq(i).parent().next().next().next().children('.amount-price').html();
				priceSum += parseInt(price);
			});
			$('.accounts .amount-price').html(priceSum);
			$('.check-amount').html(checkedBox.length);
		}else{
			checkBox.prop("checked", false );
			$('.all-check1').prop("checked", false );
			var checkedBox = $('input:checked[type=checkbox][name=operate]');
			$('.check-amount').html(checkedBox.length);
			$('.accounts .amount-price').html(0);
			priceSum = 0;
		}
	});
	checkBox.on('click', function(){
		var price = $(this).parent().next().next().next().children('.amount-price').html();
		if(this.checked){
			var checkedBox = $('input:checked[type=checkbox][name=operate]');
			priceSum += parseInt(price);
			$('.accounts .amount-price').html(priceSum);
			$('.check-amount').html(checkedBox.length);
		}else{
			var checkedBox = $('input:checked[type=checkbox][name=operate]');
			priceSum -= parseInt(price);
			$('.accounts .amount-price').html(priceSum);
			$('.check-amount').html(checkedBox.length);
		}
	});
	$('.cake-order .delete').on('click', function(){
		if(confirm('将永久删除 是否继续')){
			$(this).parent().parent().remove();
			var $id = $(this).parent().parent().data('cart');
			$.get('user/del_product',{id:$id});
		}
	});
	$('.accounts .delete').on('click', function(){
		if($('input:checked[type=checkbox][name=operate]').length){
			if(confirm('将全部删除 是否继续')) {
				$('input:checked[type=checkbox][name=operate]').parent().parent().remove();
				var $orders = $('input:checked[type=checkbox][name=operate]').parent().parent();
				var arr = new Array();
				for(var i=0;i<$orders.length;i++){
					arr.push($orders.eq(i).data('cart'));
				}
				$.get('user/del_products',{id:arr});
			}
		}else{
			alert("请选择订单再继续操作");
		}
	});
	$('.accounts .pay').on('click', function(){
		var arr = new Array();
		var arr1 = new Array();
		var $orders = $('input:checked[type=checkbox][name=operate]').parent().parent();
		var $val = $('input:checked[type=checkbox][name=operate]').parent().next().next().children().children('.cake-num-val');
		console.log($val);
		for(var i=0;i<$orders.length;i++){
			arr.push($orders.eq(i).data('id'));
			arr1.push(parseInt($val.eq(i).html()));
		}
		console.log(arr);
		if(arr.length == 0){
			alert("请选择订单后再试");
		}else{
			location.href="user/order_up_all?prod="+arr+"&num="+arr1;
		}
	});
	$('.personal .huiyuan').on('click', function(){
		if(confirm("是否支付100元开通会员？")){
			location.href='user/open_huiyuan';
		}
	});

});
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
});