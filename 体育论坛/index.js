$(document).ready(function(){

        $("#title .left").animate({
            left:0
        },1000,function(){
        $("#title .top").animate({
            top:0,
            left:100
        },1000,function(){
        $("#title .right").animate({
            right:100
        },1000,function(){
        $("#title .down").animate({
            right:0,
            bottom:0
        },1000)
        });
        });
    });
        $("#do .left").click(function(){
            $("#mask1").css({
                display:'block'
            });
        });
        $("#do .right").click(function(){
            $("#mask2").css({
                display:'block'
            });
        });
        var $keyword=$("#keyword"),
            $keyword1=$("#keyword1"),
            $value1=0,
            $value2=0;
        $('#mask1 form input').each(function(){
        }).blur(function(){
            if($(this).is("#email")){
                $emailValue=this.value;
                $that=$(this);
                if( this.value=="" || ( this.value!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(this.value) ) ){
                    var errorMsg = '*请输入正确的E-Mail地址.*';
                    $(this).after('<span class="high">'+errorMsg+'</span>');
                }else{2
                    var errorMsg = '*您的邮箱已经注册过.*';

                    var errorMsg1='*您的邮箱可以注册.*';
                    $.post("user/getEmail", { email:$emailValue },
                        //需要在getemail的方法中用$this->input->post
                        function(data) {
                            if(data=="success"){

                                $that.after('<span class="email">'+errorMsg+'</span>');
                            }else{
                                $that.after('<span class="yeah">'+errorMsg1+'</span>');
                            }
                        },
                        "text"
                    );
                }

            }
            if($(this).is("#keyword")){
                $value1=this.value;
                if(this.value.length<6||this.value.length>20){
                    var errorMsg = '*请输入6-20位.*';
                    $(this).after('<span class="key">'+errorMsg+'</span>');
                }
            }
            if($(this).is("#keyword1")){
                $value2=this.value;
                if(this.value.length<6||this.value.length>20){
                    var errorMsg = '*请输入6-20位.*';
                    $(this).after('<span class="key1">'+errorMsg+'</span>');
                }
            }
            if($value1!=$value2){
                if($value1.length>=6&&$value1.length<=20||($value2.length>=6&&$value2.length<=20)){

                    var errorMsg = '*两次输入的密码不同*';
                    $keyword.after('<span class="keys">'+errorMsg+'</span>');
                    $keyword1.after('<span class="keys">'+errorMsg+'</span>');
                }
            }
            if($value1==$value2) {

                if (($value1 != "" && $value2 != "")&&$value1.length>=6&&$value1.length<=20&&($value2.length>=6&&$value2.length<=20)&&$("#email").next().attr('class')!="email") {

                $("#sub").prop("disabled",false);

                }

            }
        }).keyup(function(){
            if($(this).next().is(".high")){
                $(this).next().remove();
            }
            if($(this).next().is(".yeah")){
                $(this).next().remove();
            }
            if($(this).next().is(".email")){
                $(this).next().remove();
            }

            if($(this).next().is(".key")){
                $(this).next().remove();
            }
            if($(this).next().is(".key1")){
                $(this).next().remove();
            }

        }).focus(function(){
            if($(this).next().is(".high")){
                $(this).next().remove();
            }
            if($(this).next().is(".yeah")){
                $(this).next().remove();
            }
            if($(this).next().is(".email")){
                $(this).next().remove();
            }
            if($(this).next().is(".key")){

                $(this).next().remove();

            }

            if($(this).next().is(".key1")){

                $(this).next().remove();
            }
            if($(this).is("#keyword")){
                if($(this).next().attr("class")=="keys"&&$keyword1.next().attr("class")=="keys"){

                    $(this).next().remove();
                    $keyword1.next().remove();
                }else{
                    if($(this).next().attr("class")=="keys"){

                        $(this).next().remove();
                    }
                }
            }
            if($(this).is("#keyword1")){
                if($(this).next().attr("class")=="keys"&&$keyword.next().attr("class")=="keys"){
                    $(this).next().remove();
                    $keyword.next().remove();
                }else{
                    if($(this).next().attr("class")=="keys"){
                        $(this).next().remove();
                    }
                }
            }


        })


})