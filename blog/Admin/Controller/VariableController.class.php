<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:04
 */
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:04
 * 变量信息控制器
 */

namespace Admin\Controller;


class VariableController extends PublicController
{
  function index()
  {
    $var = M('setting'); // 实例化var对象
    $count      = $var->where("type=1")->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(1)
    $list = $var->where('type=1')->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
    $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%  <div class="pagetotal">共%TOTAL_ROW%条数据</div>');
    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('first','首页');
    $Page->setConfig('last','尾页');
    $show       = $Page->show();// 分页显示输出

    $this->assign('var',$list);// 赋值数据集
    $this->assign('page',$show);// 赋值分页输出
    $this->display();
  }

  /**添加变量*/
  function add()
  {
    $add = new \Admin\Model\SettingModel();
    if (!empty($_POST)) {
      $data = $add->add(I("POST.k"));
      //判断变量名称是否存在
      if ($data === false) {
       $this->error("<span style='color:red'>" . I("POST.k") . "</span>" . "变量名称已经存在,请使用其他变量名称");
      } else {
      $this->success("添加成功", U("Variable/index"));
      }
    } else {
      $this->display();
    }
  }

  /**编辑变量*/
  function edit($k)
  {
    $edit = new \Admin\Model\SettingModel();
    $data = $edit->edit($k);
    if (!empty($_POST)) {
      $data = $edit->change(I("POST.varname"), I("POST.k"));
      //判断变量名称是否存在
      if ($data === false) {
        $this->error("<span style='color:red'>" . I("POST.k") . "</span>" . "变量名称已经存在,请使用其他变量名称");
      } else {
        $this->success("修改成功", U("Variable/index"));
      }
    } else {
      $this->assign("data", $data);
      $this->display();
    }
  }

  /**删除变量*/
  function del($k)
  {
    $del = new \Admin\Model\SettingModel();
    $del->del($k);
    $this->success($k . "删除成功", U("Variable/index"));
  }

  /**网站变量*/
  function setting()
  {

    if (!empty($_POST)){
      $setting = new \Admin\Model\SettingModel();
      $setting->setting();
      $this->success("修改成功");
    }else{
      $setting = new \Admin\Model\SettingModel();
      $var = $setting->custom();
      $this->assign("var", $var);
      $this->display();
    }
  }
  function checkboxdel()
  {
    $del = new \Admin\Model\SettingModel();
    $del->checkdel($_POST);
    $this->success("删除成功", U("Variable/index"));
  }
}