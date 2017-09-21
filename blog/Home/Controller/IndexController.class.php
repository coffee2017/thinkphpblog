<?php
namespace Home\Controller;

class IndexController extends PublicController {
    public function Index($navid=""){
       // $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
      $nav = M("Navi");
      //筛选信息
      $title = isset($_GET["title"]) ? $_GET["title"] : "";
      $where['title'] = array('like', "%{$title}%");
      $where['_logic'] = 'and';
      $navid = isset($_GET["navid"]) ? $_GET["navid"] : "";
      $where['navid'] = array('like', "%{$navid}%");
      /*$hide = isset($_GET["hide"]) ? $_GET["hide"] : "n";
      $where['hide']  =array('like', "%{$hide}%");*/
      $order = isset($_GET["order"]) ? $_GET["order"] : "";
      if ($order == 'asc') {
        $order = "date asc";
      } else {
        $order = "date desc";
      }
      //分页
      $count = $nav->where($where)->join('__BLOG__ ON __BLOG__.navid = __NAVI__.id')->count();// 查询满足要求的总记录数
      $Page = new \Think\Page($count, 10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
      $show = $Page->show();// 分页显示输出

      $bloginfo = $nav->where($where)
        ->join('__BLOG__ ON __BLOG__.navid = __NAVI__.id')
        ->field("id,naviname,gid,title,date,navid,edit_date,content")
        ->limit($Page->firstRow . ',' . $Page->listRows)
        ->order($order)
        ->select();
      $this->assign("blog", $bloginfo);
      $this->assign("page", $show);
      $this->display();
    }
}