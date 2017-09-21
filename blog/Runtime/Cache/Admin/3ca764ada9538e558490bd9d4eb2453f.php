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
                    <h1 class="page-head-line">修改菜单</h1>
                </div>
            </div>
            <!-- /. ROW  -->
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <?php if(is_array($data)): foreach($data as $key=>$vv): ?><form class="form-horizontal" id="form" method="post" action="<?php echo U("Edit");?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-10">上级菜单 </label>
                            <input name="id" value="<?php echo ($vv["id"]); ?>" type="hidden">
                            <div class="col-sm-9">
                                <select id="pid" name="pid" class="rcol-xs-10 col-sm-5">
                                    <option value="0" selected="selected">顶级菜单</option>
                                    <?php if(is_array($navs)): foreach($navs as $key=>$v): if(strtoupper($v['id']) != strtoupper($vv['pid'])): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["naviname"]); ?></option>
                                            <?php else: ?>
                                            <option value="<?php echo ($v["id"]); ?>" selected="selected"><?php echo ($v["naviname"]); ?></option><?php endif; ?>
                                        <?php if(is_array($navp)): foreach($navp as $key=>$vp): if($v["id"] == $vp['pid']): ?><option value="<?php echo ($vp["id"]); ?>">┗━<?php echo ($vp["naviname"]); ?></option><?php endif; endforeach; endif; endforeach; endif; ?>
                                    <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                                </select>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 菜单名称 </label>
                            <div class="col-sm-9">
                                <input type="text" name="naviname" id="title" class="rcol-xs-10 col-sm-5" value="<?php echo ($vv["naviname"]); ?>">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-2"> 链接 </label>
                            <div class="col-sm-9">
                                <input type="text" name="url" id="name" placeholder="链接，如：Index/index" class="col-xs-10 col-sm-5" value="<?php echo ($vv["url"]); ?>">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>

                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-2">
                                ICON图标 </label>
                            <div class="col-sm-9">
                                <input type="text" name="ico" id="icon" placeholder="ICON图标" class="col-xs-10 col-sm-5" value="<?php echo ($vv["ico"]); ?>">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
                            </div>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-2"> 显示状态 </label>
                            <div class="control-label no-padding-left col-sm-1">
                                <label>
                                    <input name="islink" id="islink" value="1" class="ace ace-switch ace-switch-2" type="checkbox">
                                    <span class="lbl"></span>
                                </label>
                            </div>
                            <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
										</span>
                        </div>
                        <div class="space-4"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label no-padding-right" for="form-field-2"> 排序 </label>
                            <div class="col-sm-9">
                                <input type="text" name="o" id="o" placeholder="" class="col-xs-10 col-sm-5" value="">
                                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">越小越靠前</span>
											</span>
                            </div>
                        </div>
                    </div>
                    <div class="space-4"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                        </button>
                        <button type="submit" class="btn btn-primary">
                            提交更改
                        </button>
                    </div>
                    </form><?php endforeach; endif; ?>
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