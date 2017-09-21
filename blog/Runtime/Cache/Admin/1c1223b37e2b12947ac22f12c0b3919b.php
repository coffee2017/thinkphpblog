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
            <a class="navbar-brand" href="<?php echo U('Index/Index');?>"><?php echo C(sitename);?></a>
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
      <li>
        <a  href="<?php echo U('Index/Index');?>"><i class="fa fa-dashboard "></i>控制台</a>
      </li>
      </li>
      <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><li>
          <a href="<?php echo U($v['url']);?>"><i class="fa <?php echo ($v["ico"]); ?>"></i><?php echo ($v["naviname"]); ?> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <?php if(is_array($navp)): foreach($navp as $key=>$vp): if($v["id"] == $vp['pid']): ?><li>
                  <a  href="<?php echo U($vp['url']);?>" <?php if($active == $vp['url']): ?>class='active-menu'<?php endif; ?>><i class="fa <?php echo ($vp["ico"]); ?>"></i><?php echo ($vp["naviname"]); ?></a>
                </li><?php endif; endforeach; endif; ?>
          </ul>
        </li><?php endforeach; endif; ?>
    </ul>

  </div>

</nav>
  <!-- /. NAV SIDE  -->
  <div id="page-wrapper">
    <div id="page-inner">
      <div class="row">
        <div class="col-md-12">
          <h1 class="page-head-line">网站设置</h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form class="form-horizontal" id="form" role="form" method="post" action="/index.php/Admin/Variable/Setting.html">
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                网站名称 </label>
              <div class="col-sm-9">
                <input type="text" name="sitename" id="sitename" placeholder="网站SEO标题"
                       class="col-xs-10 col-sm-5" value="<?php echo C('sitename');?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">前台调用：{:C('sitename')}</span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-1"> 网站标题 </label>
              <div class="col-sm-9">
                <input type="text" name="title" id="title" placeholder="网站标题" class="col-xs-10 col-sm-5" value="<?php echo C('title');?>">
                <span class="help-inline col-xs-12 col-sm-7">
                  <span class="middle">网站标题，前台调用：{:C('title')}
                  </span>
                </span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 关键词 </label>
              <div class="col-sm-9">
                <input type="text" name="keywords" id="keywords" placeholder="关键词"
                       class="col-xs-10 col-sm-5" value="<?php echo C('keywords');?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">网站关键词，前台调用：{:C('keywords')}</span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 网站描述 </label>
              <div class="col-sm-9">
                <textarea name="description" id="description" placeholder="网站描述" class="col-xs-10 col-sm-5" rows="5"><?php echo C('description');?></textarea>
                <span class="help-inline col-xs-12 col-sm-7">
                  <span class="middle">网站描述，前台调用：{:C('description')}</span>
                </span>
              </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-2"> 底部内容 </label>
              <div class="col-sm-9">
                <textarea name="footer" id="footer" placeholder="底部内容" class="col-xs-10 col-sm-5" rows="5"><?php echo C('footer');?></textarea>
                <span class="help-inline col-xs-12 col-sm-7">
                  <span class="middle">
                    网站的版权、统计代码等，支持HTML代码，请谨慎使用，前台调用：{:C('footer')}
                  </span>
                </span>
              </div>
            </div>
            <?php if(is_array($var)): foreach($var as $key=>$v): ?><div class="form-group">
                <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                  <?php echo ($v["k"]); ?></label>
                <div class="col-sm-9">
                  <input type="text" name="<?php echo ($v["k"]); ?>" id="test" placeholder="<?php echo ($v["v"]); ?>"
                         class="col-xs-10 col-sm-5" value="<?php echo ($v["v"]); ?>">
                  <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">自定义变量，前台调用：{:C('<?php echo ($v["k"]); ?>')}</span>
											</span>
                </div>
              </div>
              <div class="space-4"></div><?php endforeach; endif; ?>

            <div class="col-md-offset-2 col-md-9">
              <input class="btn btn-info submit" type="submit" value="提交">
              <!--
              <button class="btn btn-info submit" type="button">
                <i class="icon-ok bigger-110"></i>
                提交
              </button>

              &nbsp; &nbsp; &nbsp;
              <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                重置
              </button>
              -->
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