<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
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
          <h1 class="page-head-line">用户列表</h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <div class="cf">
            <a href="<?php echo U('Add');?>" title="新增">新增</a>
          </div>
        </div>
        <div class="space-4"></div>
        <form class="form-horizontal" id="form" method="post" action="">
        <table class="table table-striped table-bordered">
          <thead>
          <tr>
          <thead>
          <tr>
            <th class="center"><input class="check-all" type="checkbox" value="" id="all"></th>
            <th>用户名</th>
            <th>用户组</th>
            <th>邮箱</th>
            <th class="center">操作</th>
          </tr>
          </thead>
          </tr>
          </thead>
          <tbody>
          <?php if(is_array($user)): foreach($user as $key=>$v): ?><tr>
              <?php if(($v['uid'] == 1) ): ?><td>--</td>
                <?php else: ?>
                <td><input type="checkbox" class="items" name="<?php echo ($v["uid"]); ?>" value='<?php echo ($v["k"]); ?>'/></td><?php endif; ?>

              <td><?php echo ($v["username"]); ?></td>
              <td><?php echo ($v["groupname"]); ?></td>
              <td><?php echo ($v["email"]); ?></td>
              <td>

                  <?php if(in_array(56,$uid)|| session(roleid) == 1): ?><a href="<?php echo U('User/edit',array('uid'=>$v['uid']));?>">
                      <i class="ace-icon fa fa-pencil bigger-100"></i>
                      修改
                    </a>&nbsp&nbsp;
                    <?php if(($v['uid'] != 1) ): ?><a href="javascript:;" val="<?php echo U('User/del',array('uid'=>$v['uid']));?>" class="dellink">
                      <i class="ace-icon fa fa-trash-o bigger-100 red"></i>
                      删除
                    </a><?php endif; endif; ?>
              </td>
            </tr><?php endforeach; endif; ?>
          </tbody>
        </table>
        <input type="submit" id="all" value="删除所选"></br>
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
<script src="<?php echo (ADMIN_PUBLIC); ?>/js/bootbox.js"></script>
<script src="http://code.jquery.com/jquery-1.4.4.min.js" type="text/javascript"></script>
<!-- inline scripts related to this page -->
<script>
    $(".dellink").click(function () {
        var url = $(this).attr('val');
        bootbox.confirm({
            title: "系统提示",
            message: "是否要删除该记录？",
            callback: function (result) {
                if (result) {
                    window.location.href = url;
                }
            },
            buttons: {
                "cancel": {"label": "取消"},
                "confirm": {
                    "label": "确定",
                    "className": "btn-danger"
                }
            }
        });
    });
    $("#checkall").click(
        function () {
            if (this.checked) {
                $("input[name='checkname']").attr('checked', true)
            } else {
                $("input[name='checkname']").attr('checked', false)
            }
        }
    );


    $(function () {

//全选/全不选
        $("#all").click(function () {
            $("[class=items]:checkbox").attr("checked", this.checked);
        });
        $("[class=items]:checkbox").click(function () {
            var flag = true;
            $("[class=items]:checkbox").each(function () {
                if (!this.checked) {
                    flag = false;
                }
            });
            $("#all").attr("checked", flag);
        })
    })
</script>

</body>
</html>