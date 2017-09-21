<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 11:46
 */
/** 公共类*/

namespace Admin\Controller;

use Think\Controller;

class PublicController extends Controller
{
  function __construct()
  {
    parent::__construct();
    //判断用户是否登入
    if (!session(username)) {
      $this->success('你没有登入或者登入过期', U("Login/index"), 3);
    }
    if(!session(roleid)){
      $this->success('对不起');
    }
    $nav = new \Admin\Model\AnaviModel();
    $action =$nav->action();
    if($action ==false){
      $this->error('对不起你访问页面不存在');
      exit;
    }
    //定义数据库中的setting中的数据以常量的形式输出
    C(setting());
    //侧边导航
    $navs = $nav->nav();
    $navp = $nav->navp();
    $this->assign("navp", $navp);
    $this->assign("navs", $navs);
    $nav = CONTROLLER_NAME."/".ACTION_NAME;
    $this->assign("active",$nav);

  }
}

