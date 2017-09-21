<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 11:46
 */
/** 公共类*/

namespace Home\Controller;

use Think\Controller;
use Vendor\Tree;
class PublicController extends Controller
{
  function __construct()
  {
    parent::__construct();

    //定义数据库中的setting中的数据以常量的形式输出
    C(setting());
    $nav = M("Navi");
    $nav = $nav->where("hide='y'")->field('id,naviname,pid,en_name')->select();
    $navarr = new Tree($nav);
   // $str = '<a href=\"$id\"><span>$naviname</span><span class=\"en\">$en_name</span></a>'; //生成的形式
    $navarr = $navarr->get_treeview(0, $str, $pid);
    $this->assign('category', $navarr);

  }
}

