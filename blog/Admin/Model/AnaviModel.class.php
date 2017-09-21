<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/3
 * Time: 17:25
 */

namespace Admin\Model;

use Admin\Controller\IndexController;
use Think\Model;

class AnaviModel extends Model
{
  function __construct()
  {
    //初构权限的目录
    $value = session("roleid");
    //判断超级管理员
    if ($value == 1) {
      $navi = M("anavi");
      $nav = $navi->field("id")->select();
      /**
       * array_column 用于PHP版本为5.5以上
       *  $navid= array_column($nav, 'id');
       */
      $navid = array_map(
        function ($navid) {
          return $navid['id'];
        },
        $nav
      );
      $rolemenu = implode(",", $navid);
      $this->rolemnu = $rolemenu;
    } else {
      $role = M("usergroup");
      $vrole = $role->where("id = $value")->select();
      $rolemenu = $vrole[0]["menu"];
      $this->rolemnu = $rolemenu;
    }

  }

  function action()
  {
    $action = strtolower(CONTROLLER_NAME . '/' . ACTION_NAME);
    $navi = M("anavi");
    $navi = $navi->where("url ='%s'", $action)->field('id')->select();
    $navid = $navi[0]["id"];
    $rolemenu = $this->rolemnu;
    $vroleid= session("roleid");
    if ($action == 'index/index') {
      return true;
    } elseif ($vroleid == 1) {
      return true;
    } elseif (strpos($rolemenu, $navid)) {
      return true;
    } else {
      return false;
    }
  }

  function nav()
  {
    //获取顶级目录
    $rolemenu = $this->rolemnu;
    $navi = M("anavi");
    $navi = $navi->where("pid = 0")->field("id,naviname,url,pid,ico")->where(array("id" => array("in", "$rolemenu")))->select();
    return $navi;
  }

  function navp()
  {
    //获取二级目录
    $rolemenu = $this->rolemnu;
    $navi = M("anavi");
    $navi = $navi->where("pid <> 0")->field("id,naviname,url,pid,ico")->where(array("id" => array("in", "$rolemenu")))->select();
    return $navi;
  }


  function edit($id)
  {
    $result = M('anavi')->where("id='%s'", $id)->select();
    return $result;
  }

  function change($id)
  {
    $change = M("anavi");
    $change->create($_POST);
    $change->where("id='%s'", $id)->save($_POST);


  }

  function add($kvar)
  {
    $add = M("anavi");
    $map["url"] = "$kvar";
    $var = $add->where($map)->find();
    $var = $var["url"];
    //判断变量名称是否存在
    if ($kvar == $var) {
      return false;
    } else {
      $add->data($_POST)->add();
    }
  }

  //删除单个
  function del($id)
  {
    M("anavi")->delete($id);
  }

  //批量删除
  function checkdel($data)
  {
    M("anavi")->delete("$data");
  }
}