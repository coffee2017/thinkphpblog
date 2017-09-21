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
          <?php if($_GET['gid']): ?><h1 class="page-head-line">修改文章</h1>
            <?php else: ?>
            <h1 class="page-head-line">添加文章</h1><?php endif; ?>

        </div>
      </div>
      <link rel="stylesheet" href="<?php echo (UPLOAD); ?>/kindeditor/themes/default/default.css"/>
      <link rel="stylesheet" href="<?php echo (UPLOAD); ?>/kindeditor/plugins/code/prettify.css"/>
      <script charset="utf-8" src="<?php echo (UPLOAD); ?>/kindeditor/kindeditor.js"></script>
      <script charset="utf-8" src="<?php echo (UPLOAD); ?>/kindeditor/lang/zh-CN.js"></script>
      <script charset="utf-8" src="<?php echo (UPLOAD); ?>/kindeditor/plugins/code/prettify.js"></script>
      <script>
          KindEditor.ready(function (K) {
              var editor1 = K.create('textarea[name="content"]', {
                  cssPath: '<?php echo (UPLOAD); ?>/kindeditor/plugins/code/prettify.css',
                  uploadJson: '<?php echo (UPLOAD); ?>/kindeditor/php/upload_json.php',
                  fileManagerJson: '<?php echo (UPLOAD); ?>/kindeditor/php/file_manager_json.php',
                  allowFileManager: true,
                  afterCreate: function () {
                      var self = this;
                      K.ctrl(document, 13, function () {
                          self.sync();
                          K('form[name=article]')[0].submit();
                      });
                      K.ctrl(self.edit.doc, 13, function () {
                          self.sync();
                          K('form[name=article]')[0].submit();
                      });
                  }
              });
              prettyPrint();
          });
      </script>
      <!-- /. ROW  -->
      <div class="row">
        <div class="col-xs-12">
          <!-- PAGE CONTENT BEGINS -->
          <form class="form-horizontal" name="article" id="form" method="post" action="">
            <input type="hidden" value="<?php echo ($blog["gid"]); ?>">

            <!-- PAGE CONTENT BEGINS -->
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-0">
                文章分类 </label>
              <div class="col-sm-9">
                <select id="sid" name="navid" class="col-xs-10 col-sm-5">
                  <option value="0">--分类--</option>
                  <?php echo ($category); ?>
                </select>

                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">选择所属分类。</span>
											</span>
              </div>
            </div>

            <div class="space-4"></div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                文章标题 </label>
              <div class="col-sm-9">
                <input type="text" name="title" id="title" placeholder="文章标题"
                       class="col-xs-10 col-sm-5" value="<?php echo ($blog["title"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">文章标题不能为空。</span>
											</span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-1">
                SEO标题 </label>
              <div class="col-sm-9">
                <input type="text" name="blog_seotitle" id="seotitle" placeholder="SEO标题"
                       class="col-xs-10 col-sm-5" value="<?php echo ($blog["blog_seotitle"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">如果设置SEO标题，将会在IE标题栏显示SEO标题。</span>
											</span>
              </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-2">
                关键词 </label>
              <div class="col-sm-9">
                <input type="text" name="keywords" id="keywords" placeholder="关键词"
                       class="col-xs-10 col-sm-5" value="<?php echo ($blog["keywords"]); ?>">
                <span class="help-inline col-xs-12 col-sm-7">
												<span class="middle">文章关键词。</span>
											</span>
              </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-1 control-label no-padding-right" for="form-field-3">
                文章摘要 </label>
              <div class="col-sm-9">
                <textarea name="description" id="description" placeholder="文章摘要" class="col-xs-10 col-sm-5" rows="5"><?php echo ($blog["description"]); ?></textarea>
                <span class="help-inline col-xs-12 col-sm-7">
                  <span class="middle">文章摘要、描述。</span>
                </span>
              </div>
            </div>
            <div class="space-4"></div>
        <div class="form-group">
          <label class="col-sm-1 control-label no-padding-right" for="form-field-2">
            文章内容 </label>
          <div class="col-sm-9">
            <textarea name="content" style="width:100%;height:500px;visibility:hidden;"><?php echo ($blog['content']); ?></textarea>
          </div>
        </div>
        <div class="space-4"></div>
        <div class="col-md-offset-2 col-md-9">
          <input type="submit" value="提交" class="button">

        </div>

        <!-- PAGE CONTENT ENDS -->


        </form>
      </div>
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