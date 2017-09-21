<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo ($blog["blog_seotitle"]); ?></title>
  <meta name="keywords" content="<?php echo ($blog["keywords"]); ?>"/>
  <meta name="description" content="<?php echo ($blog["description"]); ?>"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo (HOME_PUBLIC); ?>/css/base.css" rel="stylesheet">
<link href="<?php echo (HOME_PUBLIC); ?>/css/about.css" rel="stylesheet">
<link href="<?php echo (HOME_PUBLIC); ?>/css/index.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo (HOME_PUBLIC); ?>/js/modernizr.js"></script>
<![endif]-->
<script src="<?php echo (HOME_PUBLIC); ?>/js/scrollReveal.js"></script>
</head>
<body>
<header>
  

<div class="logo" data-scroll-reveal="enter right over 1s"><a href="/"><img src="images/logo.png"></a></div>
<nav class="topnav" data-scroll-reveal="enter bottom over 1s after 1s">
  <?php echo ($category); ?>
</nav>
</header>
<article>
  <div class="container">

    <div class="about left">

      <ul>
        <h4 class="atitle"><span><?php echo mb_substr(strip_tags($blog['date']),0,10,"UTF-8"); ?></span><?php echo ($blog["title"]); ?></h4>
        <p class="newsnav">您现在的位置是:<a href="/">首页</a>&nbsp;>&nbsp;<a href="<?php echo U('Index/index',array('navid'=>$blog['navid']));?>"><?php echo ($blog["naviname"]); ?></a></p>
        <?php echo ($blog["content"]); ?>
      </ul>
      <div class="keybq">
        <p><span>关键字词</span>：<?php echo ($blog["keywords"]); ?></p>
      </div>
      <div class="nextinfo">
        <?php if($front != null): ?><p>上一篇：<a href="<?php echo U('Blog/index',array('gid'=>$front['gid']));?>"><?php echo ($front['title']); ?></a></p><?php endif; ?>
        <?php if($after != null): ?><p>下一篇：<a href="<?php echo U('Blog/index',array('gid'=>$after['gid']));?>"><?php echo ($after['title']); ?></a></p><?php endif; ?>
      </div>
      <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
          <?php if(is_array($other)): foreach($other as $key=>$v): ?><li><a href="<?php echo U('Blog/index',array('gid'=>$v['gid']));?>"><?php echo ($v['title']); ?></a></li><?php endforeach; endif; ?>
        </ul>
      </div>
      <div class="gbko">

        <!--PC版-->
        <div id="SOHUCS" sid="<?php echo ($blog["gid"]); ?>"></div>
        <script charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/changyan.js" ></script>
        <script type="text/javascript">
            window.changyan.api.config({
                appid: 'cytdVHS4h',
                conf: 'prod_e8ff2b81402803e9bdf3d2f5cdea5b5a'
            });
        </script>
      </div>
    </div>

  </div>
  </div>
  </aside>
</article>
<footer> <?php echo C('footer');?></footer>
</body>
</html>