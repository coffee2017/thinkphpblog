<?php
return array(
	//'配置项'=>'配置值'
	'URL_MODEL'=>'2',
	'URL_HTML_SUFFIX' =>'.html',
     //开启路由
    'URL_ROUTER_ON' =>true,
	//路由规则
	'URL_ROUTE_RULES'=>array(
	//'Home/Blog/index/:gid' => 'Blog/index/1',
	//'blog/:gid'=>'Home/blog/index',
	'article/:gid\d'    => 'blog/index',
	'cate/:navid\d'    => 'Index/index',
	),
);