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
          <h1 class="page-head-line">修改用户权限</h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->

        </div>
        <div class="space-4"></div>
        <form class="form-horizontal" id="form" method="post" action="">
          <input type="hidden" name="id" value="<?php echo ($roleinfo["id"]); ?>">
          <div class="modal-body">
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 用户组 </label>
              <div class="col-sm-9">
                <input type="text" name="groupname" id="title" class="rcol-xs-10 col-sm-5"
                       value="<?php echo ($roleinfo["groupname"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
              </div>
            </div>
            <?php if($roleinfo['id'] != 1): ?><table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                  <th class="center"><input id="all" class="check-all" type="checkbox" value=""></th>
                  <th>菜单名称</th>
                  <th>链接</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><tr>
                    <td class="center">
                      <input class="items" type="checkbox" name="menu[]"  <?php if(in_array($v['id'],$menuid)): ?>checked="checked"<?php endif; ?> value="<?php echo ($v["id"]); ?>">
                    </td>
                    <td><?php echo ($v["naviname"]); ?></td>
                    <td><?php echo ($v["url"]); ?></td>
                  </tr>
                  <?php if(is_array($navp)): foreach($navp as $key=>$vp): if($v["id"] == $vp['pid']): ?><tr>
                        <td class="center">
                          <input class="items" type="checkbox" name="menu[]" <?php if(in_array($vp['id'],$menuid)): ?>checked="checked"<?php endif; ?> value="<?php echo ($vp["id"]); ?>">
                        </td>
                        <td>┗━<?php echo ($vp["naviname"]); ?></td>
                        <td><?php echo ($vp["url"]); ?></td>
                      </tr>
                      <?php if(is_array($navp)): foreach($navp as $key=>$vpp): if($vp["id"] == $vpp['pid']): ?><tr>
                            <td class="center">
                              <input class="items" type="checkbox" name="menu[]" <?php if(in_array($vpp['id'],$menuid)): ?>checked="checked"<?php endif; ?> value="<?php echo ($vpp["id"]); ?>">
                            </td>
                            <td>┗━━<?php echo ($vpp["naviname"]); ?></td>
                            <td><?php echo ($vpp["url"]); ?></td>
                          </tr><?php endif; endforeach; endif; endif; endforeach; endif; endforeach; endif; ?>
                </tbody>
              </table><?php endif; ?>


            <div class="space-4"></div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">
                提交
              </button>
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
    $(".children").click(function () {
        $(this).parent().parent().parent().parent().find(".father").prop("checked", true);
    })
    $(".father").click(function () {
        if (this.checked) {
            $(this).parent().parent().parent().parent().find(".children").prop("checked", true);
        } else {
            $(this).parent().parent().parent().parent().find(".children").prop("checked", false);
        }
    })
</script>

</body>
</html>