<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="http://www.17sucai.com/preview/668095/2017-07-19/perfect/css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="http://www.17sucai.com/preview/668095/2017-07-19/perfect/css/demo.css" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href="http://www.17sucai.com/preview/668095/2017-07-19/perfect/css/component.css" />
    <!--[if IE]>
    <script src="http://www.17sucai.com/preview/668095/2017-07-19/perfect/js/html5.js"></script>
    <![endif]-->
    <style>
        .verify {
            width: 25px;
            height: 25px;
            background-image: url(http://www.17sucai.com/preview/668095/2017-07-19/perfect/img/login_ico.png);
            background-position: -85px -154px;
            position: absolute;
            margin: 10px 13px;
        }
        .mb2 {
            margin-bottom: 20px;
            width: 100%;
            float: left;
        }
        .verifyimg {
            float: right;
            width: 140px;
        }
    </style>
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <div class="logo_box">
                <h3>欢迎你</h3>
                <form action="/index.php/Admin/Login/index.html" name="f" method="post">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="username" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="password" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
                    </div>
                    <div class="input_outer" style="width: 180px;    float: left;">
                        <span class="verify"></span>
                        <input type="text" name="verify" class="text" style="width: 130px;color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入验证码">
                    </div>
                    <div class="verifyimg">
                        <img src="<?php echo U('Login/verify');?>"  title="看不清?点击刷新" onClick="this.src=this.src+'?'+Math.random()"/>
                    </div>
                    <div class="mb2">
                        <input class="act-but submit" style="color: #FFFFFF;    width: 100%;" type="submit" value="登入">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="http://www.17sucai.com/preview/668095/2017-07-19/perfect/js/demo-1.js"></script>
</body>
</html>