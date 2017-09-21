-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 21 日 11:13
-- 服务器版本: 5.5.53
-- PHP 版本: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `thinkmyblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `emlog_anavi`
--

CREATE TABLE IF NOT EXISTS `emlog_anavi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `ico` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=74 ;

--
-- 转存表中的数据 `emlog_anavi`
--

INSERT INTO `emlog_anavi` (`id`, `naviname`, `url`, `newtab`, `hide`, `taxis`, `pid`, `isdefault`, `type`, `type_id`, `ico`) VALUES
(57, '用户管理', 'User/Index', 'n', 'n', 0, 51, 'n', 0, 0, ''),
(53, '用户组管理', 'User/group', 'n', 'n', 0, 51, 'n', 0, 0, ''),
(51, '用户及组', '#', 'n', 'n', 0, 0, 'n', 0, 0, 'fa-users'),
(43, '系统设置', '#', 'n', 'n', 0, 0, 'n', 0, 0, 'fa-cog'),
(44, '后台菜单', 'Menu/index', 'n', 'n', 0, 43, 'n', 0, 0, 'fa-book'),
(45, '自定义变量', 'Variable/Index', 'n', 'n', 0, 43, 'n', 0, 0, 'fa-coffee'),
(46, '网站设置', 'Variable/Setting', 'n', 'n', 0, 43, 'n', 0, 0, 'fa-flash'),
(54, '新增用户组', 'User/groupadd', 'n', 'n', 0, 51, 'n', 0, 0, ''),
(55, '新增用户', 'User/Add', 'n', 'n', 0, 57, 'n', 0, 0, ''),
(56, '用户修改', 'User/edit', 'n', 'n', 0, 57, 'n', 0, 0, ''),
(58, '删除', 'Menu/del', 'n', 'n', 0, 44, 'n', 0, 0, ''),
(59, '修改', 'Menu/edit', 'n', 'n', 0, 44, 'n', 0, 0, ''),
(61, '用户组修改', 'User/groupedit', 'n', 'n', 0, 53, 'n', 0, 0, ''),
(62, '博客前台', '# ', 'n', 'n', 0, 0, 'n', 0, 0, ''),
(63, '文章列表', 'Blog/index', 'n', 'n', 0, 62, 'n', 0, 0, ''),
(64, '添加文章', 'Blog/add', 'n', 'n', 0, 62, 'n', 0, 0, ''),
(65, '文章分类', 'Blog/category_index', 'n', 'n', 0, 62, 'n', 0, 0, ''),
(66, '新增分类', 'Blog/category_add', 'n', 'n', 0, 62, 'n', 0, 0, ''),
(69, 'fadfadf', 'adfadfadf', 'n', 'n', 0, 67, 'n', 0, 0, ''),
(71, '打发', 'adfadf', 'n', 'n', 0, 70, 'n', 0, 0, ''),
(73, 'adfadff', 'adfadfadff', 'n', 'n', 0, 72, 'n', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_attachment`
--

CREATE TABLE IF NOT EXISTS `emlog_attachment` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blogid` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` varchar(255) NOT NULL DEFAULT '',
  `filesize` int(10) NOT NULL DEFAULT '0',
  `filepath` varchar(255) NOT NULL DEFAULT '',
  `addtime` bigint(20) NOT NULL DEFAULT '0',
  `width` int(10) NOT NULL DEFAULT '0',
  `height` int(10) NOT NULL DEFAULT '0',
  `mimetype` varchar(40) NOT NULL DEFAULT '',
  `thumfor` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `blogid` (`blogid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- 转存表中的数据 `emlog_attachment`
--

INSERT INTO `emlog_attachment` (`aid`, `blogid`, `filename`, `filesize`, `filepath`, `addtime`, `width`, `height`, `mimetype`, `thumfor`) VALUES
(1, 1, '7E1058OCMF0AZU_04_MediumSize.jpg', 311353, '../content/uploadfile/201706/9d4f1496813878.jpg', 1496813878, 786, 1000, 'image/jpeg', 0),
(2, 1, '7E1058OCMF0AZU_04_MediumSize.jpg', 11525, '../content/uploadfile/201706/thum-9d4f1496813878.jpg', 1496813878, 362, 460, 'image/jpeg', 1),
(44, 31, 'writeimage.png', 194654, '../content/uploadfile/201706/0cab1498724311.png', 1498724311, 596, 576, 'image/png', 0),
(38, 31, 'image.png', 49791, '../content/uploadfile/201706/d2b51498701156.png', 1498701156, 1061, 358, 'image/png', 0),
(45, 31, 'writeimage.png', 155985, '../content/uploadfile/201706/thum-0cab1498724311.png', 1498724311, 420, 406, 'image/png', 44),
(46, 31, 'res.png', 15294, '../content/uploadfile/201706/ac7d1498724531.png', 1498724531, 410, 419, 'image/png', 0),
(47, 31, 'login.png', 18023, '../content/uploadfile/201706/d9fa1498724671.png', 1498724671, 417, 416, 'image/png', 0),
(39, 31, 'image.png', 27485, '../content/uploadfile/201706/thum-d2b51498701156.png', 1498701156, 420, 142, 'image/png', 38),
(40, 31, 'checked.png', 7490, '../content/uploadfile/201706/03081498721849.png', 1498721849, 884, 40, 'image/png', 0),
(41, 31, 'checked.png', 6886, '../content/uploadfile/201706/thum-03081498721849.png', 1498721849, 420, 20, 'image/png', 40),
(42, 31, 'codeheight.png', 17522, '../content/uploadfile/201706/5c0e1498722318.png', 1498722318, 583, 258, 'image/png', 0),
(43, 31, 'codeheight.png', 39981, '../content/uploadfile/201706/thum-5c0e1498722318.png', 1498722318, 420, 186, 'image/png', 42);

-- --------------------------------------------------------

--
-- 表的结构 `emlog_blog`
--

CREATE TABLE IF NOT EXISTS `emlog_blog` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `date` datetime NOT NULL,
  `edit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `content` longtext NOT NULL,
  `description` longtext NOT NULL,
  `keywords` text NOT NULL,
  `blog_seotitle` varchar(128) NOT NULL,
  `alias` varchar(200) NOT NULL DEFAULT '',
  `author` int(10) NOT NULL DEFAULT '1',
  `navid` int(10) NOT NULL DEFAULT '-1',
  `type` varchar(20) NOT NULL DEFAULT 'blog',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `comnum` int(10) unsigned NOT NULL DEFAULT '0',
  `attnum` int(10) unsigned NOT NULL DEFAULT '0',
  `top` enum('n','y') NOT NULL DEFAULT 'n',
  `sortop` enum('n','y') NOT NULL DEFAULT 'n',
  `blog_hide` enum('n','y') NOT NULL DEFAULT 'n',
  `checked` enum('n','y') NOT NULL DEFAULT 'y',
  `allow_remark` enum('n','y') NOT NULL DEFAULT 'y',
  `password` varchar(255) NOT NULL DEFAULT '',
  `template` varchar(255) NOT NULL DEFAULT '',
  `tags` text,
  PRIMARY KEY (`gid`),
  KEY `author` (`author`),
  KEY `views` (`views`),
  KEY `comnum` (`comnum`),
  KEY `sortid` (`navid`),
  KEY `top` (`top`,`date`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `emlog_blog`
--

INSERT INTO `emlog_blog` (`gid`, `title`, `date`, `edit_date`, `content`, `description`, `keywords`, `blog_seotitle`, `alias`, `author`, `navid`, `type`, `views`, `comnum`, `attnum`, `top`, `sortop`, `blog_hide`, `checked`, `allow_remark`, `password`, `template`, `tags`) VALUES
(1, '欢迎使用emlog', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '恭喜您成功安装了emlog，这是系统自动生成的演示文章。编辑或者删除它，然后开始您的创作吧！<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/9d4f1496813878.jpg" id="ematt:1"><img src="http://www.emlog.online/content/uploadfile/201706/9d4f1496813878.jpg" title="点击查看原图" alt="7E1058OCMF0AZU_04_MediumSize.jpg" width="169" border="0" height="215" /></a>', '', '', '0', '', 1, -1, 'blog', 12, 1, 1, 'n', 'n', 'n', 'y', 'y', '', '', ''),
(2, '我的第一个博客系统', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '我要怎么做呢？有点不知所措！那就慢慢来吧 给自己加油！<br />', '', '', '0', '', 1, -1, 'blog', 144, 1, 0, 'n', 'n', 'n', 'y', 'y', '', '', ''),
(31, '更新记录', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017/6/29 之前做的<br />\n后台添加首页图片轮播上传修改功能：<br />\n一.这个是为了学习：<br />\n1. 数据库的增删改查<br />\n2.对数据库的查询<br />\n3.用jq让标题点击就可以修改，鼠标离开是就上传到数据库<br />\n<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/d2b51498701156.png" id="ematt:38"><img src="http://www.emlog.online/content/uploadfile/201706/d2b51498701156.png" title="点击查看原图" alt="image.png" border="0" width="1061" height="358" /><br />\n</a>二.修复bug<br />\n1.文章点击不允许评论之后，再点击允许评论前台还是不能评论。这个bug 是因为<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/03081498721849.png" id="ematt:40"><img src="http://www.emlog.online/content/uploadfile/201706/03081498721849.png" title="点击查看原图" alt="checked.png" border="0" width="884" height="40" /></a><br />\n源代码里多了 标红的代码。<br />\n三.新增<br />\n1.增加代码在文章中的可读性（代码高亮）<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/5c0e1498722318.png" id="ematt:42"><img src="http://www.emlog.online/content/uploadfile/201706/5c0e1498722318.png" title="点击查看原图" alt="codeheight.png" border="0" width="583" height="258" /></a><br />\n这个是用国外插件做的，这个是根据文章中HTML代码中&lt;pre class ="brush:&nbsp;language"&gt;&lt;/pre&gt;去实现代码高亮。<br />\n2.在文章列表列表页显示文章中的图片<br />\n<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/0cab1498724311.png" id="ematt:44"><img src="http://www.emlog.online/content/uploadfile/201706/0cab1498724311.png" title="点击查看原图" alt="writeimage.png" border="0" width="596" height="576" /><br />\n</a>3.增加登入注册功能<br />\n<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/ac7d1498724531.png" id="ematt:46"><img src="http://www.emlog.online/content/uploadfile/201706/ac7d1498724531.png" title="点击查看原图" alt="res.png" border="0" width="410" height="419" /><br />\n<a target="_blank" href="http://www.emlog.online/content/uploadfile/201706/d9fa1498724671.png" id="ematt:47"><img src="http://www.emlog.online/content/uploadfile/201706/d9fa1498724671.png" title="点击查看原图" alt="login.png" border="0" width="417" height="416" /></a></a><br />\n四.心得<br />\n这次学习得到了我哥的帮助，帮我找了个北京的熊老师。熊老师给了很多的指引.在学习的过程中得到了，熊老师的很多帮助。可能是我自己的自学能力比较差，过了一段时间，感觉自己的PHP ,Javascript,Jquery.这些都基础很差。于是，我就开始学习网上的视频这些视频是麦子学院里的，我学习了一个叫king老师讲的PHP知识。这让我对PHP语法有了更全面的认识。<br />\n五.现在的我<br />\n现在我也能写出一些自己想要的效果的代码。但是这还不够，最大的问题是自己的逻辑思维还不够。继续努力。', '', '', '0', '', 1, -1, 'page', 0, 0, 6, 'n', 'n', 'n', 'y', 'n', '', '', NULL),
(27, '代码测试', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '<pre class="brush: js">      	/**\n      	 * SyntaxHighlighter\n      	 */\n      	function foo()\n      	{\n      		if (counter &lt;= 10)\n      			return;\n      		// it works!\n      	}\n      </pre>\nadfhajkdfhakjdf\n<pre class="brush: js">adfadf</pre>\n这个是PHP代码  \n<pre class="brush: php"> 	\n&lt;?php echo ''45646'';?&gt;\n      </pre>\n<pre class="brush: js">      	&lt;pre class="brush: js"&gt;\n      		/**\n      		 * SyntaxHighlighter\n      		 */\n      		function foo()\n      		{\n      			if (counter &lt;= 10)\n      				return;\n      			// it works!\n      		}\n      	&lt;/pre&gt;\n      </pre>', '', '', '0', '', 1, 8, 'blog', 136, 0, 0, 'n', 'n', 'n', 'y', 'n', '', '', ''),
(28, '关于我', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2017/6/29<br />\n自己设计了博客 ，也是自己想要的。<br />\n这个博客是为了学习PHP， 而建立的。<br />\n从这个博客系统中我学到怎么去解决问题。<br />\n也暴露了很多问题，基础知识不是很扎实。<br />\n还有很多问题待完善。', '', '', '0', 'aboutus', 1, -1, 'page', 0, 0, 0, 'n', 'n', 'n', 'y', 'n', '', '', NULL),
(43, 'coffee', '2017-09-15 16:57:19', '0000-00-00 00:00:00', '&nbsp;啊ad啊啊啊', '大发发的', '菜单', '测试', '', 1, 8, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(54, 'JS', '0000-00-00 00:00:00', '2017-09-20 03:05:33', '', '', '菜单', 'fadfadfadf', '', 1, 0, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(55, 'coffee', '0000-00-00 00:00:00', '2017-09-20 03:05:42', '', '', '菜单', 'fadfadfadf', '', 1, 0, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(66, 'iOS Safari 中click点击事件失效的解决办法', '2017-09-20 17:33:08', '2017-09-21 02:08:23', '在我们使用MySQL的时候，有时会遇到需要更改或者删除mysql的主键，我们可以简单的使用alter table table_name drop primary key;来完成。下面我使用数据表table_test来作了例子。\r\n1、首先创建一个数据表table_test：\r\ncreate table table_test(\r\n`id` varchar(100) NOT NULL,\r\n`name` varchar(100) NOT NULL,\r\nPRIMARY KEY (`name`)\r\n)ENGINE=MyISAM DEFAULT CHARSET=gb2312;\r\n2、假设发现主键设置错了,应该是id是主键,但现在表里已经有好多数据了,不能删除表再重建了，只能在这基础上修改表结构。\r\n先删除主键\r\nalter table table_test drop primary key;\r\n然后再添加主键\r\nalter table table_test add primary key(id);\r\n注:在添加主键之前,必须先把重复的id删除掉。', 'Safari 浏览器 用jquery的live方法绑定的click事件点击无效（不能执行）', 'click点击事件', 'iOS Safari 中click点击事件失效的解决办法', '', 1, 14, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(49, 'coffee', '2017-09-19 09:38:16', '2017-09-19 01:40:21', 'adfadfafdadf', 'adfadfadfadf', '菜单', '测试', '', 1, 8, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(67, 'mysql删除及更改表的主键', '2017-09-20 17:34:49', '2017-09-21 02:11:02', '<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	在我们使用<a href="http://lib.csdn.net/base/mysql" class="replace_word" target="_blank">MySQL</a>的时候，有时会遇到需要更改或者删除<a href="http://lib.csdn.net/base/mysql" class="replace_word" target="_blank">mysql</a>的主键，我们可以简单的使用alter table table_name drop primary key;来完成。下面我使用数据表table_test来作了例子。\r\n</p>\r\n<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	1、首先创建一个数据表table_test：<br />\r\ncreate table table_test(<br />\r\n`id` varchar(100) NOT NULL,<br />\r\n`name` varchar(100) NOT NULL,<br />\r\nPRIMARY KEY (`name`)<br />\r\n)ENGINE=MyISAM DEFAULT CHARSET=gb2312;\r\n</p>\r\n<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	2、假设发现主键设置错了,应该是id是主键,但现在表里已经有好多数据了,不能删除表再重建了，只能在这基础上修改表结构。\r\n</p>\r\n<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	先删除主键<br />\r\nalter table table_test drop primary key;\r\n</p>\r\n<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	然后再添加主键<br />\r\nalter table table_test add primary key(id);\r\n</p>\r\n<p style="color:#555555;font-family:宋体, Verdana, Arial, Helvetica, sans-serif;font-size:13px;background-color:#F7FBFF;">\r\n	注:在添加主键之前,必须先把重复的id删除掉。\r\n</p>', '遇到需要更改或者删除mysql的主键', 'mysql删除,主键', 'mysql删除及更改表的主键', '', 1, 17, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL),
(68, '三步实现滚动条触动css动画效果', '0000-00-00 00:00:00', '2017-09-21 02:59:49', '<ul style="color:#FFFFFF;font-family:微软雅黑, Arial, Helvetica, sans-serif;font-size:14px;background-color:#075498;">\r\n	<p>\r\n		现在很多网站都有这种效果，我就整理了一下，分享出来。利用滚动条来实现动画效果，\r\n	</p>\r\n	<p>\r\n		ScrollReveal.js 用于创建和管理元素进入可视区域时的动画效果，帮助你的网站增加吸引力。只需要给元素增加 data-scroll-reveal 属性，当元素进入可视区域的时候会自动被触发设置好的动画。这里有一个我做的示例网站。<a href="http://www.lmjhome.com/" target="_blank"><span><span class="bt-cs" style="background:#FF9900;">演示</span></span></a>\r\n	</p>\r\n	<p>\r\n		<strong>1、引入文件</strong>\r\n	</p>\r\n	<div class="shili" style="margin:0px;padding:10px;background-color:#221ABD;border:1px dotted #778855;">\r\n		<p>\r\n			&nbsp;&lt;script src="js/scrollReveal.js"&gt;&lt;/script&gt;\r\n		</p>\r\n	</div>\r\n	<p>\r\n		<strong>2、html页面</strong>\r\n	</p>\r\n	<p>\r\n		必须给元素加上 data-scroll-reveal 属性，加上之后会执行默认的动画效果，你也可以自定义改属性以显示不同的动画效果，如：\r\n	</p>\r\n	<div class="shili" style="margin:0px;padding:10px;background-color:#221ABD;border:1px dotted #778855;">\r\n		<p>\r\n			&lt;div data-scroll-reveal="enter left and move 50px over 1.33s"&gt;杨青个人博客&lt;/div&gt;\r\n		</p>\r\n		<p>\r\n			&lt;div data-scroll-reveal="enter from the bottom after 1s"&gt;ScrollReveal&lt;/div&gt;\r\n		</p>\r\n		<p>\r\n			&lt;div data-scroll-reveal="wait 2.5s and then ease-in-out 100px"&gt;ScrollReveal&lt;/div&gt;\r\n		</p>\r\n	</div>\r\n	<p>\r\n		<strong>3、JavaScript</strong>\r\n	</p>\r\n	<div class="shili" style="margin:0px;padding:10px;background-color:#221ABD;border:1px dotted #778855;">\r\n		<p>\r\n			&nbsp; &lt;script&gt;\r\n		</p>\r\n		<p>\r\n			<span> </span>if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){\r\n		</p>\r\n		<p>\r\n			<span> </span>(function(){\r\n		</p>\r\n		<p>\r\n			<span> </span>window.scrollReveal = new scrollReveal({reset: true});\r\n		</p>\r\n		<p>\r\n			<span> </span>})();\r\n		</p>\r\n		<p>\r\n			<span> </span>};\r\n		</p>\r\n		<p>\r\n			&lt;/script&gt;&nbsp;\r\n		</p>\r\n	</div>\r\n	<div class="shili" style="margin:0px;padding:10px;background-color:#221ABD;border:1px dotted #778855;">\r\n		<p>\r\n			data-scroll-reveal属性\r\n		</p>\r\n		<p>\r\n			上面说了可以自定义 data-scroll-reveal 属性，下面来看看该属性的关键词和值（可选）。\r\n		</p>\r\n		<p>\r\n			enter\r\n		</p>\r\n		<p>\r\n			说明: 动画起始方向\r\n		</p>\r\nv\r\n		<p>\r\n			值: top | right | bottom | left\r\n		</p>\r\n		<p>\r\n			move\r\n		</p>\r\n		<p>\r\n			说明: 动画执行距离\r\n		</p>\r\n		<p>\r\n			值: 数字，以 px 为单位\r\n		</p>\r\n		<p>\r\n			over\r\n		</p>\r\n		<p>\r\n			说明: 动画持续时间\r\n		</p>\r\n		<p>\r\n			值: 数字，以秒为单位\r\n		</p>\r\n		<p>\r\n			after/wait\r\n		</p>\r\n		<p>\r\n			说明: 动画延迟时间&lt;\r\n		</p>\r\n		<p>\r\n			值: 数字，以秒为单位\r\n		</p>\r\n		<p>\r\n			填充（可选）\r\n		</p>\r\n		<p>\r\n			可以在 data-scroll-reveal 属性里填充（添加）一些类似编程的“语句”，使其更有可读性，scrollReveal.js 支持以下“语句”：\r\n		</p>\r\n		<p>\r\n			from\r\n		</p>\r\n		<p>\r\n			the\r\n		</p>\r\n		<p>\r\n			and\r\n		</p>\r\n		<p>\r\n			then\r\n		</p>\r\n		<p>\r\n			but\r\n		</p>\r\n		<p>\r\n			with\r\n		</p>\r\n	</div>\r\n</ul>', 'ScrollReveal.js 用于创建和管理元素进入可视区域时的动画效果', '动条触动css动', '三步实现滚动条触动css动画效果', '', 1, 14, 'blog', 0, 0, 0, 'n', 'n', 'n', 'y', 'y', '', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `emlog_comment`
--

CREATE TABLE IF NOT EXISTS `emlog_comment` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `date` bigint(20) NOT NULL,
  `poster` varchar(20) NOT NULL DEFAULT '',
  `comment` text NOT NULL,
  `mail` varchar(60) NOT NULL DEFAULT '',
  `url` varchar(75) NOT NULL DEFAULT '',
  `ip` varchar(128) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  PRIMARY KEY (`cid`),
  KEY `gid` (`gid`),
  KEY `date` (`date`),
  KEY `hide` (`hide`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `emlog_comment`
--

INSERT INTO `emlog_comment` (`cid`, `gid`, `pid`, `date`, `poster`, `comment`, `mail`, `url`, `ip`, `hide`) VALUES
(1, 1, 0, 1496806652, 'emlog', 'fadf', '', 'http://www.emlog.online/', '127.0.0.1', 'n'),
(2, 2, 0, 1496822212, 'emlog', '测试', '', 'http://www.emlog.online/', '127.0.0.1', 'n');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_image`
--

CREATE TABLE IF NOT EXISTS `emlog_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `hide` enum('n','y') NOT NULL DEFAULT 'y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `emlog_image`
--

INSERT INTO `emlog_image` (`id`, `title`, `image`, `hide`) VALUES
(1, '测试图片1', '/content/uploadfile/ads/1.jpg', 'y'),
(2, '测试图片2', '/content/uploadfile/ads/2.jpg', 'y'),
(4, '测试图片3', '/content/uploadfile/ads/3.jpg', 'n');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_link`
--

CREATE TABLE IF NOT EXISTS `emlog_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(30) NOT NULL DEFAULT '',
  `siteurl` varchar(75) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `emlog_link`
--

INSERT INTO `emlog_link` (`id`, `sitename`, `siteurl`, `description`, `hide`, `taxis`) VALUES
(1, 'emlog.net', 'http://www.emlog.net', 'emlog官方主页', 'n', 0);

-- --------------------------------------------------------

--
-- 表的结构 `emlog_navi`
--

CREATE TABLE IF NOT EXISTS `emlog_navi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `en_name` varchar(128) NOT NULL,
  `naviname` varchar(30) NOT NULL DEFAULT '',
  `seotitle` text NOT NULL,
  `seokey` text NOT NULL,
  `seodes` text NOT NULL,
  `url` varchar(75) NOT NULL DEFAULT '',
  `newtab` enum('n','y') NOT NULL DEFAULT 'n',
  `hide` enum('n','y') NOT NULL DEFAULT 'n',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `isdefault` enum('n','y') NOT NULL DEFAULT 'n',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `type_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `emlog_navi`
--

INSERT INTO `emlog_navi` (`id`, `en_name`, `naviname`, `seotitle`, `seokey`, `seodes`, `url`, `newtab`, `hide`, `taxis`, `pid`, `isdefault`, `sort`, `type_id`) VALUES
(1, 'Home', '首页', '', '', '', '', 'n', 'n', 1, 0, 'y', 1, 0),
(16, 'CSS', 'CSS', '', '', '', '', 'n', 'y', 2, 0, 'n', 4, 13),
(14, 'jQuery', 'jQuery', '', '', '', '', 'n', 'y', 1, 0, 'n', 4, 11),
(15, 'Ajax', 'Ajax', '', '', '', '', 'n', 'y', 3, 0, 'n', 4, 12),
(17, 'PHP Code', 'PHP 代码', 'PHP 代码', 'PHP 代码', 'PHP 代码', '', 'n', 'y', 1, 0, 'n', 4, 14),
(18, 'Other', '其他', '', '', '', '', 'n', 'y', 5, 17, 'n', 4, 15),
(19, 'Note', '学习笔记', '', '', '', '', 'n', 'y', 6, 0, 'n', 4, 16),
(20, 'About us', '关于我', '', '', '', '', 'n', 'y', 10, 21, 'n', 5, 28),
(21, 'Recode', '更新记录', '', '', '', '', 'n', 'y', 11, 0, 'n', 5, 31),
(42, '', '未分类', '', '', '', '', 'n', 'n', 1, 0, 'y', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `emlog_options`
--

CREATE TABLE IF NOT EXISTS `emlog_options` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL,
  PRIMARY KEY (`option_id`),
  KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `emlog_options`
--

INSERT INTO `emlog_options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'blogname', '前端开发工作者'),
(2, 'bloginfo', ''),
(3, 'site_title', ''),
(4, 'site_description', '对php,jquery,css等学习记录'),
(5, 'site_key', 'php,jquery,css'),
(6, 'log_title_style', '0'),
(7, 'blogurl', 'http://www.emlog.online/'),
(8, 'icp', ''),
(9, 'footer_info', ' '),
(10, 'admin_perpage_num', '15'),
(11, 'rss_output_num', '10'),
(12, 'rss_output_fulltext', 'y'),
(13, 'index_lognum', '10'),
(14, 'index_comnum', '10'),
(15, 'index_twnum', '10'),
(16, 'index_newtwnum', '5'),
(17, 'index_newlognum', '5'),
(18, 'index_randlognum', '5'),
(19, 'index_hotlognum', '5'),
(20, 'comment_subnum', '20'),
(21, 'nonce_templet', 'default'),
(22, 'admin_style', 'default'),
(23, 'tpl_sidenum', '1'),
(24, 'comment_code', 'n'),
(25, 'comment_needchinese', 'y'),
(26, 'comment_interval', '60'),
(27, 'isgravatar', 'y'),
(28, 'isthumbnail', 'y'),
(29, 'att_maxsize', '20480'),
(30, 'att_type', 'rar,zip,gif,jpg,jpeg,png,txt,pdf,docx,doc,xls,xlsx'),
(31, 'att_imgmaxw', '420'),
(32, 'att_imgmaxh', '460'),
(33, 'comment_paging', 'y'),
(34, 'comment_pnum', '10'),
(35, 'comment_order', 'newer'),
(36, 'login_code', 'n'),
(37, 'reply_code', 'n'),
(38, 'iscomment', 'y'),
(39, 'ischkcomment', 'y'),
(40, 'ischkreply', 'n'),
(41, 'isurlrewrite', '0'),
(42, 'isalias', 'n'),
(43, 'isalias_html', 'n'),
(44, 'isexcerpt', 'n'),
(45, 'excerpt_subnum', '300'),
(46, 'istreply', 'n'),
(47, 'timezone', 'Asia/Shanghai'),
(48, 'active_plugins', ''),
(49, 'widget_title', 'a:11:{s:7:"blogger";s:12:"个人资料";s:8:"calendar";s:6:"日历";s:3:"tag";s:6:"标签";s:4:"sort";s:6:"分类";s:7:"archive";s:6:"存档";s:7:"newcomm";s:12:"最新评论";s:6:"newlog";s:12:"最新文章";s:6:"hotlog";s:12:"热门文章";s:4:"link";s:6:"链接";s:6:"search";s:6:"搜索";s:11:"custom_text";s:15:"自定义组件";}'),
(50, 'custom_widget', 'a:0:{}'),
(51, 'widgets1', 'a:3:{i:0;s:7:"archive";i:1;s:4:"link";i:2;s:6:"search";}'),
(52, 'widgets2', ''),
(53, 'widgets3', ''),
(54, 'widgets4', ''),
(55, 'detect_url', 'n');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_setting`
--

CREATE TABLE IF NOT EXISTS `emlog_setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `k` varchar(100) NOT NULL COMMENT '变量',
  `v` varchar(255) NOT NULL COMMENT '值',
  `type` tinyint(1) NOT NULL COMMENT '0系统，1自定义',
  `name` varchar(255) NOT NULL COMMENT '说明',
  PRIMARY KEY (`id`),
  KEY `k` (`k`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `emlog_setting`
--

INSERT INTO `emlog_setting` (`id`, `k`, `v`, `type`, `name`) VALUES
(1, 'sitename', '前端开发者', 0, ''),
(2, 'title', 'PHP开发者', 0, ''),
(3, 'keywords', 'PHP,Jquery,CSS开发学习', 0, ''),
(4, 'description', '前端开发者源码分享，杨青个人博客，是一个站在web前端设计之路的海员个人网站，提供个人博客模板免费资源下载的个人原创网站。', 0, ''),
(5, 'footer', '基于ThinkPHP3.2 <a href="/">2016©coffee</a> 模板来源：<a href="http://www.yangqq.com">杨青博客</a>', 0, ''),
(23, '', '', 0, ''),
(21, 'coffeed', '啊阿发ad', 1, 'afdadf'),
(22, 'coffeeff', '2.7.19', 1, 'afdadf'),
(24, '', '', 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_sort`
--

CREATE TABLE IF NOT EXISTS `emlog_sort` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sortname` varchar(255) NOT NULL DEFAULT '',
  `alias` varchar(200) NOT NULL DEFAULT '',
  `taxis` int(10) unsigned NOT NULL DEFAULT '0',
  `pid` int(10) unsigned NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `template` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `emlog_sort`
--

INSERT INTO `emlog_sort` (`sid`, `sortname`, `alias`, `taxis`, `pid`, `description`, `template`) VALUES
(2, '耐克', 'nike', 1, 0, '', ''),
(13, 'CSS', 'css', 3, 0, '', ''),
(11, 'jQuery', 'jQuery', 1, 0, '', ''),
(12, 'Ajax', 'ajax', 2, 0, '', ''),
(14, 'PHP', 'php', 4, 0, '', ''),
(15, 'Other', 'other', 5, 0, '', ''),
(16, '学习笔记', '', 6, 0, '', ''),
(17, 'Jordan', '', 0, 2, '', ''),
(18, '未分类', '', 2, 2, '', ''),
(19, '未分类', '', 1, 11, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_storage`
--

CREATE TABLE IF NOT EXISTS `emlog_storage` (
  `sid` int(8) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `type` varchar(8) NOT NULL,
  `value` text NOT NULL,
  `createdate` int(11) NOT NULL,
  `lastupdate` int(11) NOT NULL,
  PRIMARY KEY (`sid`),
  UNIQUE KEY `plugin` (`plugin`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `emlog_tag`
--

CREATE TABLE IF NOT EXISTS `emlog_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` varchar(60) NOT NULL DEFAULT '',
  `gid` text NOT NULL,
  PRIMARY KEY (`tid`),
  KEY `tagname` (`tagname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `emlog_tag`
--

INSERT INTO `emlog_tag` (`tid`, `tagname`, `gid`) VALUES
(1, '生活 哎', '');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_user`
--

CREATE TABLE IF NOT EXISTS `emlog_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL DEFAULT '',
  `nickname` varchar(20) NOT NULL DEFAULT '',
  `role` varchar(60) NOT NULL DEFAULT 'writer',
  `roleid` int(11) NOT NULL,
  `ischeck` enum('n','y') NOT NULL DEFAULT 'n',
  `photo` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=186 ;

--
-- 转存表中的数据 `emlog_user`
--

INSERT INTO `emlog_user` (`uid`, `username`, `password`, `nickname`, `role`, `roleid`, `ischeck`, `photo`, `email`, `description`) VALUES
(1, 'emlog', '$P$BT5Wla0gFBlWy.AS39b7xsyrHBe/jc0', '', 'admin', 1, 'n', '../content/uploadfile/201706/thum-f1211498556024.jpg', '', ''),
(159, 'afafdgsfg', '$P$BBbZ/GQ/.4WjwOSjISmizvIGxyLGyW1', '', 'writer', 2, 'y', '', 'afdadf@qq.com', ''),
(156, 'afadfafda', '$P$B1dJ/omJak2z3YA371FaESBInI4IzN.', '', 'writer', 2, 'y', '', 'afdafd@qq.com', ''),
(157, 'adfadfa', '$P$Bp8uCYA8pagNJ9JfBDF/zp.6RhC3JS0', '', 'writer', 2, 'y', '', 'adfadfafd@qq.colm', ''),
(158, 'afadfaf', '$P$BDDK7DT8pkHxO8u9aMPPLHh/Iy8dSz.', '', 'writer', 2, 'y', '', 'adfadf@qq.com', ''),
(155, 'emlogf', '$P$BRAfdOQVuzwzPLWKzPBySathmkwVDO0', '', 'writer', 2, 'y', '', '290687131@qq.com', ''),
(184, 'coffee2017', '$2a$08$hK5.m5SRehIfs9n5dgEkN.oi7vwX4FBumPU0UuYvkee0lpnXoY4Te', '', 'writer', 2, 'n', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `emlog_usergroup`
--

CREATE TABLE IF NOT EXISTS `emlog_usergroup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupname` varchar(128) NOT NULL,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `emlog_usergroup`
--

INSERT INTO `emlog_usergroup` (`id`, `groupname`, `menu`) VALUES
(1, '超级管理员', ''),
(2, 'writer', '51,57,55,53,54,43,44,59'),
(3, 'afdadf', ''),
(4, 'afdadf', ''),
(5, 'afdadffadfadfafd', '51,57,55,56'),
(6, 'dgsgfsgf', ''),
(8, 'admin123', ''),
(10, 'admin123', ''),
(11, 'afdadf', '51,52,53,54,55,43,44,45,46'),
(12, 'cs123', '51,57,58,53,54,43,44,45,46'),
(13, 'writerabc123', '51,57,55,56,53,54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
