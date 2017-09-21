<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12
 * Time: 11:36
 */

namespace Admin\Model;

use Admin\Controller\IndexController;
use Think\Model;

//use Think\Model;

class NaviModel extends Model
{

  /**
   * 新增文章分类
   */
  function category_add()
  {
    $nav = M("Navi");
    $nav->create($_POST);
    $nav->add($_POST);
  }

  function category_edit()
  {
    $nav = M("Navi");
    $id = I('POST.id');
    $nav->where("id = '%s'", $id)->save($_POST);
  }

  function category_index()
  {
    $nav = M("Navi");
    return $nav->field('id,naviname,sort,pid')->order('sort,id')->select();
  }

  protected $_validate = array(
    array('username', '', '用户已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    array('repassword', 'password', '两次密码不一致', 0, 'confirm'), // 验证确认密码是否和密码一致
    array('password', 'checkPwd', '密码格式不正确', 0, 'function'), // 自定义函数验证密码格式
    array('groupname', '', '用户组不能为空或者已经存在！', 0, 'unique', 1),
  );
}