$(function(){
    var $divs =  $('.dialog-login div');
    $divs.hide().eq(0).show();
    $('#header .login-btn').on('click', function(){
        $('.dialog-container').show();
        $('.dialog-login').animate({
            top: '50%'
        }, 500);
    });
    $('.dialog-close').on('click', function(){
        $('.dialog-login').animate({
            top: '-150'
        }, 500, function(){
            $('.dialog-container').hide();
        });
    });
    $('.dialog-title li').on('click', function(){
        var index = $(this).index();
        if(!$(this).is('.selected')){
            $(this).addClass('selected').siblings().removeClass('selected');
            $divs.eq(index).show().siblings('div').hide();
        }
    });
    $('.personal').on('click', function(){
        if($(this).data('state')){
            location.href="user/personal";
        }else{
            $('#header .login-btn').trigger('click');
        }
    })
    $('.shopping-tolley').on('click', function(){
        if($(this).data('state')){
            location.href="user/tollery";
        }else{
            $('#header .login-btn').trigger('click');
        }
    })
    $('.contact').on('click', function(){
        if($(this).data('state')){
            location.href="user/order";
        }else{
            $('#header .login-btn').trigger('click');
        }
    })
    $('#username').blur(function(){
        $.get('user/check_username',{name:$('#username').val()},function(data){
            if(data == 'file'){
                alert('用户名重复！');
            }
        },'text');
    });
    $('#tel').blur(function(){
        var re = /^1\d{10}$/;
        if (re.test($('#tel').val())) {
        } else {
            alert("电话号码格式错误");
        }
    });
    $('#password').blur(function(){
        var re = /^[0-9A-Za-z]{6,}$/;
        if(re.test($('#password').val())){

        }else{
            alert("密码不得少于6位且必须由数字和字母组成");
        }
    });
});