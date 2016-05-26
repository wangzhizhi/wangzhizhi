<div id="header">
    <div class="wrap">
        <span class="logo"><a href="user/index" style="color: #fff;">XXX数码商城</a></span>
        <span class="home"><a href="user/index" style="color:#fba1a1;">主页</a></span>
        <span class="personal" data-state="<?php  $user = $this->session->userdata('login_user');if($user){echo $user->username;}else{echo "";}?>">个人中心</span>
        <span class="shopping-tolley" data-state="<?php  $user = $this->session->userdata('login_user');if($user){echo $user->username;}else{echo "";}?>">购物车</span>
        <span class="contact" data-state="<?php  $user = $this->session->userdata('login_user');if($user){echo $user->username;}else{echo "";}?>">订单列表</span>
        <?php
            $login_user = $this->session->userdata("login_user");
            if($login_user){
        ?>
            <span class="logout-btn"><?php echo $login_user->username;?> 已登陆 [<a href="user/logout">注销</a>]</span>
        <?php
            }else{
        ?>
                <span class="login-btn">登 录 / 注 册</span>
        <?php
            }
        ?>
    </div>
</div>
<div id="banner"></div>
<div class="dialog-container">
    <div class="dialog-mask"></div>
    <div class="dialog-login">
        <ul class="dialog-title">
            <li class="selected">登录</li>
            <li>注册</li>
            <span class="dialog-close">x</span>
        </ul>
        <div class="login-container">
            <form action="user/check_login" method="post">
                用户名：<input type="text" name="username"><br>
                密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br>
                <input type="submit" name="sub" value="登录" style="margin-left:100px;">
            </form>
        </div>
        <div class="regist-container">
            <form action="user/do_reg" method="post">
                用户名：<input type="text" name="username" id="username"><br>
                密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password" id="password"><br>
                手机号：<input type="text" name="phone" id="tel"><br>
                地&nbsp;&nbsp;&nbsp;&nbsp;址：<input type="text" name="address"><br>
                <input type="submit" name="sub" value="注册" style="margin-left:100px;">
            </form>
        </div>
    </div>
</div>