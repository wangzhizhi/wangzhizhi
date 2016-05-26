$(function(){

	// t = setInterval(function(){
	// 	$("#jujiao_list").mouseover(function(){
	// 		$("#jujiao").slideDown();//事件冒泡
	// 	});
	// },300)
	// clearInterval(t);
	// 	$("#jujiao").slideUp();

	$("#jujiao_list").mouseover(function(){
			$("#jujiao").show();
	 	}).mouseout(function(){
	 		$("#jujiao").hide();
	 	});

	$('#wdly img').mouseover(function(){
		$(this).siblings('span').css("display","block");
	}).mouseout(function(){
		$(this).siblings('span').css("display","none");
	});
//页内跳转
	$('#header_zixun').on('click',function(){
		$(window).scrollTop($('#information').offset().top);
	});
	$('.icon-align-justify').on('click',function(){
		$(window).scrollTop($('#nba').offset().top);
	});
	$('#header_zhibojian').on('click',function(){
		$(window).scrollTop($('#zhibo').offset().top);
	});
	$('#header_shequ').on('click',function(){
		$(window).scrollTop($('#photos').offset().top);
	});
	$('#header_aboutme').on('click',function(){
		$(window).scrollTop($('#footer').offset().top);
	});

	$('#cba_t').on('click',function(){
		$(window).scrollTop($('#cba').offset().top);
	});
	$('#nba_t').on('click',function(){
		$(window).scrollTop($('#nba').offset().top);
	});
	$('#zgz_t').on('click',function(){
		$(window).scrollTop($('#zgz').offset().top);
	});
	$('#gjz_t').on('click',function(){
		$(window).scrollTop($('#gjz').offset().top);
	});


//视频集锦
	$('#shipin li').mouseover(function(){
		$(this).children('p').show();
		$(this).children('span').hide();
		// alert(this);
	}).mouseout(function(){
		$(this).children('p').css("display","none");
		$(this).children('span').show();
	});

	$('#photos img').mouseover(function(){

	});

	
	
	
})