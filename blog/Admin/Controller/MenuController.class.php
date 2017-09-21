<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/8
 * Time: 11:16
 */

namespace Admin\Controller;


class MenuController extends PublicController
{
 /* function index(){
    $nav =D('Anavi'); // 实例化User对象
    $navs = $nav->nav();

    $this->assign("navs", $navs);
    $anavi = M('Anavi'); // 实例化User对象
    $count      = $anavi->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,7);// 实例化分页类 传入总记录数和每页显示的记录数(10)
    $navp = $anavi->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
    $show       = $Page->show();// 分页显示输出
    $this->assign("navp", $navp);
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
  }*/
  function index(){
    $anavi = M('Anavi'); // 实例化User对象
    $navpid = $anavi->order('id')->select();
    $navid =  $anavi->where("pid=0")->select();
    $this->assign("navid", $navid);
    $this->assign("navpid", $navpid);
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
  }
  /**编辑菜单*/
  function edit($id)
  {
    $edit = new \Admin\Model\AnaviModel();
    $data = $edit->edit($id);
    if (!empty($_POST)) {
      $data = $edit->change(I("POST.id"), I("POST.url"));
      //判断变量名称是否存在
      if ($data === false) {
        $this->error("<span style='color:red'>" . I("POST.url") . "</span>" . "变量名称已经存在,请使用其他变量名称");
      } else {
        $this->success("修改成功", U("Menu/index"));
      }
    } else {
      $this->assign("data", $data);
      $this->display();
    }
  }

  /**删除菜单*/
  function del($id)
  {
    $del = M("Anavi");
    $count = $del->where("pid = '%s'",$id)->field("pid")->select();
    //showbug($count);
    if (count($count )!=0){
      echo "2";
    }else{
      $del->delete($id);
      echo "1";
    }
  }

  /**批量删除*/
  function checkdel()
  {
    $del = new \Admin\Model\AnaviModel();
    if(!empty($_POST)){
      $ids=implode(",", $_POST["ids"]);
      $del->checkdel($ids);
      $this->success("删除成功", U("Menu/index"));
    }else{
     $this->error("没有选择要删除的选项",U("Menu/index"));
    }

  }

  /**添加菜单*/
  function add()
  {
    $add = new \Admin\Model\AnaviModel();
    if (!empty($_POST)) {
      $data = $add->add(I("POST.url"));
      //判断变量名称是否存在
      if ($data === false) {
        $this->error("<span style='color:red'>" . I("POST.url") . "</span>" . "链接已经存在,请使用其他链接");
      } else {
        $this->success("添加成功", U("Menu/index"));
      }
    }
  }
}