// function checkname(str) {
// 	if (str.length > 20 || str.length < 6) {
// 		document.getElementById("usernameErr").innerHTML = "<font color='red'>用户名必须大于3位小于20位</font> ";
// 		form.name.focus();
// 	}else{
// 		document.getElementById("usernameErr").innerHTML = "<font>用户名必须大于3位小于20位</font> ";
// 	}
// }
$(function(){
	$('#login_in').on('click', function(){
		$('#loginandreg').show();
		$('#login_container').show();
	});
	$('#reg_in').on('click', function(){
		$('#loginandreg').show();
		$('#reg_container').show();
	});
	$('#loginandreg').not($('#login_container')).not($('#reg_container')).click(function(){
		$('#loginandreg').hide();
		$('#login_container').hide();
		$('#reg_container').hide();
	});

	$(':input').focus(function(){
            if(this.value == this.defaultValue){
              this.value = "";
               $(this).removeClass = 'focus';
            }
          }).blur(function(){
            if(this.value == ''){
              this.value = this.defaultValue;
               $(this).addClass('focus');
             }else{
              $(this).removeClass('focus');
            }
          });

     $('#returntop').on('click',function(){
     	$(window).scrollTop(0);
     })
   
})
