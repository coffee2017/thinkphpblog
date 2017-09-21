<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo C('title');?></title>
    <meta name="keywords" content="<?php echo C('keywords');?>"/>
    <meta name="description" content="<?php echo C('description');?>"/>
    <link href="<?php echo (ADMIN_PUBLIC); ?>/img/favicon.ico" rel="shortcut icon">
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo (ADMIN_PUBLIC); ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?php echo (ADMIN_PUBLIC); ?>/assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="<?php echo (ADMIN_PUBLIC); ?>/assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="<?php echo (ADMIN_PUBLIC); ?>/assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><?php echo C(sitename);?></a>
        </div>
        <div class="header-right">
            <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
            <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
            <a href="<?php echo U('Login/logout');?>" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
        </div>
</nav>
    <!-- /. NAV TOP  -->
    <!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li>
        <div class="user-img-div">
          <img src="<?php echo (ADMIN_PUBLIC); ?>/assets/img/user.png" class="img-thumbnail"/>

          <div class="inner-text">
            <?php echo ($value = session(username)); ?>
            <br/>
            <small>Last Login : 3 Weeks Ago</small>
          </div>
        </div>

      </li>
      <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
          <a href="<?php echo U(Admin/$v['url']);?>"><i class="fa <?php echo ($v["ico"]); ?>"></i><?php echo ($v["naviname"]); ?> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php if(is_array($navp)): foreach($navp as $key=>$vp): if($v["id"] == $vp['pid']): ?><li>
                  <a href="<?php echo U($vp['url']);?>"><i class="fa <?php echo ($vp["ico"]); ?>"></i><?php echo ($vp["naviname"]); ?></a>
                </li><?php endif; endforeach; endif; ?>
          </ul>
        </li><?php endforeach; endif; ?>


      <li>
        <a class="active-menu" href="index.html"><i class="fa fa-dashboard "></i>控制台</a>
      </li>


      <li>
        <a href="#"><i class="fa fa-yelp "></i>系统设置 <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a href="<?php echo U('Variable/Index');?>"><i class="fa fa-coffee"></i>自定义变量</a>
          </li>
          <li>
            <a href="<?php echo U('Variable/Setting');?>"><i class="fa fa-flash "></i>网站设置</a>
          </li>
          <li>
            <a href="component.html"><i class="fa fa-key "></i>后台菜单</a>
          </li>
          <li>
            <a href="social.html"><i class="fa fa-send "></i>新增菜单</a>
          </li>

          <li>
            <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
          </li>


        </ul>
      </li>
      <li>
        <a href="table.html"><i class="fa fa-flash "></i>Data Tables </a>

      </li>
      <li>
        <a href="#"><i class="fa fa-bicycle "></i>Forms <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">

          <li>
            <a href="form.html"><i class="fa fa-desktop "></i>Basic </a>
          </li>
          <li>
            <a href="form-advance.html"><i class="fa fa-code "></i>Advance</a>
          </li>


        </ul>
      </li>
      <li>
        <a href="gallery.html"><i class="fa fa-anchor "></i>Gallery</a>
      </li>
      <li>
        <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
      </li>
      <li>
        <a href="login.html"><i class="fa fa-sign-in "></i>Login Page</a>
      </li>
      <li>
        <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
        <ul class="nav nav-second-level">
          <li>
            <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
          </li>
          <li>
            <a href="#">Second Level Link<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
              <li>
                <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
              </li>
              <li>
                <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
              </li>

            </ul>

          </li>
        </ul>
      </li>

      <li>
        <a href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
      </li>
    </ul>

  </div>

</nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">新增变量</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <form class="form-horizontal" id="form" method="post" action="/blog/index.php/Admin/Variable/edit/k/coffeeff.html">
                        <input name="varname" type="hidden" value="<?php echo ($data[0]["k"]); ?>">
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 变量说明 </label>
                            <div class="col-sm-9">
                                <input type="text" name="name" id="name" placeholder="<?php echo ($data[0]["name"]); ?>"
                                       class="col-xs-10 col-sm-5" value="<?php echo ($data[0]["name"]); ?>">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 变量名称 </label>
                            <div class="col-sm-9">
                                <input type="text" name="k" id="k" placeholder="<?php echo ($data[0]["k"]); ?>"  class="col-xs-10 col-sm-5"
                                value="<?php echo ($data[0]["k"]); ?>" >
                                <span class="help-inline col-xs-12 col-sm-7">
                                    <span class="middle">注意需符合PHP变量名条件，前台调用：{:C('变量名称')}</span>
											</span>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 变量值 </label>
                            <div class="col-sm-9">
                                <input type="text" name="v" id="v" placeholder="<?php echo ($data[0]["v"]); ?>" class="col-xs-10 col-sm-5"
                                       value="<?php echo ($data[0]["v"]); ?>">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="col-md-offset-2 col-md-9">
                            <input type="submit" value="提交">
                        </div>
                    </form>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->

<!-- /. FOOTER  -->
<div id="footer-sec">
    &copy;  <a href="、" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="、" title="网页模板" target="_blank">网页模板</a>
</div>
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo (ADMIN_PUBLIC); ?>/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo (ADMIN_PUBLIC); ?>/assets/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo (ADMIN_PUBLIC); ?>/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo (ADMIN_PUBLIC); ?>/assets/js/custom.js"></script>



</body>
</html>