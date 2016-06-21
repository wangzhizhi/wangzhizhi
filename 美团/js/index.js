$(document).ready(function () {
	$(".small-header").mouseover(function(){
		$('#site-mast').css('display','block');
	});
	$('#site-mast').mouseleave(function(){
		$('#site-mast').css('display','none');
	});
	$('#menuUl li a').on('click', function(){
		$('#menuUl li a').removeClass('menuactive');
		$(this).addClass('menuactive');
	});
});