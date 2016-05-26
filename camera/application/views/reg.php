<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <base href="<?php echo site_url()?>">
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <div class="adming_login_border" style="width: 350px;">
        <div class="admin_input">
            <form action="backend/do_reg" method="post">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="user" size="35" class="admin_input_style" />
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" id="pwd" size="35" class="admin_input_style" />
                    </li>
                    <br>
                    <li>
                        <input type="submit" tabindex="3" value="注册" class="btn btn-primary" />
                    </li>
                    <li>
                        已有帐号？ <a href="backend/login">点击登录</a>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
</body>
</html>