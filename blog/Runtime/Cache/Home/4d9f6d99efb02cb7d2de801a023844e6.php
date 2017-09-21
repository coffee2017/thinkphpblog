<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo C('title');?></title>
  <meta name="keywords" content="<?php echo C('keywords');?>"/>
  <meta name="description" content="<?php echo C('description');?>"/>
  <link href="<?php echo (HOME_PUBLIC); ?>/css/base.css" rel="stylesheet">
<link href="<?php echo (HOME_PUBLIC); ?>/css/about.css" rel="stylesheet">
<link href="<?php echo (HOME_PUBLIC); ?>/css/index.css" rel="stylesheet">
<link href="<?php echo (HOME_PUBLIC); ?>/css/mobile.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="<?php echo (HOME_PUBLIC); ?>/js/modernizr.js"></script>
<![endif]-->
<script src="<?php echo (HOME_PUBLIC); ?>/js/scrollReveal.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<header>
  

<div class="logo" data-scroll-reveal="enter right over 1s"><a href="/"><img src="<?php echo (HOME_PUBLIC); ?>/images/logo.png"></a></div>
<nav class="topnav" data-scroll-reveal="enter bottom over 1s after 1s">
  <?php echo ($category); ?>
</nav>
</header>
<article>
  <div class="container">

    <!--<div class="blog" data-scroll-reveal="enter top" >
      <figure>
        <ul>
          <a href="/"><img src="images/t01.jpg"><span>下载个人博客模板</span></a>
        </ul>
        <p><a href="/">灯具公司复古风格PSD设计稿</a></p>
        <figcaption>此模板为PSD设计稿，复古风格。首页主要突出产品，以及公司简介。手绘灯作为头部背景图片，这个比较特别。html可以做出灯一闪一闪的效果，或者说旁边有个按钮...</figcaption>
      </figure>
      <figure>
        <ul>
          <a href="/"><img src="images/t02.jpg"><span>下载个人博客模板</span></a>
        </ul>
        <p><a href="/">个人博客模板古典系列之——江南墨..</a></p>
        <figcaption>一共是四个页面，首页，图文列表，图片列表，文字内容。此模板风格为中国古典风格，山水画墨迹成就一幅江南墨卷。页面首页设计较为简单，突出文章重点。图文列表显示...</figcaption>
      </figure>
      <figure>
        <ul>
          <a href="/"><img src="images/t03.jpg"><span>下载个人博客模板</span></a>
        </ul>
        <p><a href="/">美丽的茧</a></p>
        <figcaption>让世界拥有它的脚步，让我保有我的茧。当溃烂已极的心灵再不想做一丝一毫的思索时，就让我静静回到我的茧内，以回忆为睡榻，以悲哀为覆被，这是我唯一的美丽。</figcaption>
      </figure>
    </div> -->
    <ul class="cbp_tmtimeline">
      <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><li>
          <time class="cbp_tmtime">
            <span><?php echo mb_substr(strip_tags($v['date']),5,6,"UTF-8"); ?></span>
            <span><span><?php echo mb_substr(strip_tags($v['date']),0,4,"UTF-8"); ?></span>
          </time>
          <div class="cbp_tmicon"></div>
          <div class="cbp_tmlabel" data-scroll-reveal="enter right over 1s">
            <h2><?php echo ($v["title"]); ?></h2>
            <p><span class="blogpic">
              <?php preg_match('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i',$v['content'],$match); $match=isset($match[0])?$match[0]:'<img src="/Home/Public/images/girl.jpg"/> '; echo $match ?></span>
              <?php echo mb_substr(strip_tags($v['content']),0,150,"UTF-8").'...'; ?>
            </p>
            <a href="<?php echo U('/article/'.$v['gid']);?>"class="readmore">阅读全文&gt;&gt;</a>
          </div>
        </li><?php endforeach; endif; ?>
    </ul>
  </div>
</article>
<div class="page">
<?php echo ($page); ?>
</div>
<footer>
  <?php echo C('footer');?>
</footer>
</body>
</html>