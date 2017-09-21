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
          <h1 class="page-head-line">新增分类</h1>
        </div>
      </div>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <!-- PAGE CONTENT BEGINS -->
          <form class="form-horizontal" role="form" id="form" method="post" action="">
            <input name="id" id="id" value="<?php echo ($navid["id"]); ?>" type="hidden">
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="pid"> 父类 </label>
              <div class="col-sm-9">
                <select id="pid" name="pid" class="col-xs-10 col-sm-5">
                  <option value="0">顶级分类</option>
                  <?php echo ($category); ?>
                </select>

                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">选择所属分类。</span>
											</span>
              </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="name"> 分类名称 </label>
              <div class="col-sm-9">
                <input type="text" name="naviname" id="name" placeholder="分类名称"
                       class="col-xs-10 col-sm-5" value="<?php echo ($navid["naviname"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">分类名称，不能为空。</span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="name"> 英文名称 </label>
              <div class="col-sm-9">
                <input type="text" name="en_name" id="name" placeholder="分类英文名称"
                       class="col-xs-10 col-sm-5" value="<?php echo ($navid["en_name"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle"></span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-2">
                SEO标题 </label>
              <div class="col-sm-9">
                <input type="text" name="seotitle" id="seotitle" placeholder="SEO标题"
                       class="col-xs-10 col-sm-5" value="<?php echo ($navid["seotitle"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">请填写SEO标题利于SEO优化</span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="keywords"> 关键词 </label>
              <div class="col-sm-9">
                <input type="text" name="seokey" id="keywords" placeholder="关键词"
                       class="col-xs-10 col-sm-5" value="<?php echo ($navid["seokey"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">SEO关键词，建议用“,”隔开。</span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="description"> 栏目描述 </label>
              <div class="col-sm-9">
                <textarea name="seodes" id="description" placeholder="栏目描述" class="col-xs-10 col-sm-5"
                          rows="5"><?php echo ($navid["seodes"]); ?></textarea>
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">栏目描述。</span>
											</span>
              </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="o"> 排序 </label>
              <div class="col-sm-9">
                <input type="number" name="sort" id="o" placeholder="排序" class="col-xs-10 col-sm-5"
                       value="<?php echo ($navid["sort"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">越小越靠前。</span>
											</span>
              </div>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="o"> 是否显示 </label>
              <div class="col-sm-9">
                <input type="radio" name="hide" id="o" placeholder="排序" class="col-xs-10 col-sm-1" value="y" <?php if($navid["hide"] == y): ?>checked="checked"<?php endif; ?>>
                <input type="radio" name="hide" id="o" placeholder="排序" class="col-xs-10 col-sm-1" value="n"<?php if($navid["hide"] == n): ?>checked="checked"<?php endif; ?>>
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">是否在前台显示</span>
											</span>
              </div>
            </div>

            <div class="col-md-offset-2 col-md-9">
              <input value="提交" type="submit">

              &nbsp; &nbsp; &nbsp;
              <button class="btn" type="reset">
                <i class="icon-undo bigger-110"></i>
                重置
              </button>
            </div>
          </form>
          <!-- PAGE CONTENT ENDS -->
        </div>


      </div><!-- /.col -->
    </div><!-- /.row -->
  </div>
  <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- 新增变量 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-horizontal" id="form" method="post" action="<?php echo U(" Add
      ");?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
          &times;
        </button>
        <h4 class="modal-title" id="myModalLabel">
          添加菜单
        </h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-right" for="form-field-10">上级菜单 </label>
          <input name="id" value="" type="hidden">
          <div class="col-sm-9">
            <select id="pid" name="pid" class="rcol-xs-10 col-sm-5">
              <option value="0" selected="selected">顶级菜单</option>
              <?php if(is_array($navs)): foreach($navs as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["naviname"]); ?></option>
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
            <input type="text" name="naviname" id="title" class="rcol-xs-10 col-sm-5" value="">
            <span class="help-inline col-xs-12 col-sm-7">
              <span class="middle"></span>
            </span>
          </div>
        </div>

        <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-2 control-label no-padding-right" for="form-field-2"> 链接 </label>
          <div class="col-sm-9">
            <input type="text" name="url" id="name" placeholder="链接，如：Index/index" class="col-xs-10 col-sm-5" value="">
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
            <input type="text" name="ico" id="icon" placeholder="ICON图标" class="col-xs-10 col-sm-5" value="">
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
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
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