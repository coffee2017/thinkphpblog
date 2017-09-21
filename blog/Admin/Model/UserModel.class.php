<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 17:55
 */

namespace Admin\Model;

use Think\Model;

class UserModel extends Model
{
  function CheckNamePwd($name, $pwd)
  {
    //1.查询用户名
    $info = $this->getByusername($name);
    //验证密码
    $passwd = new \Admin\Controller\PasswordHash(8, false);//实例化密码对比
    $check = $passwd->CheckPassword($pwd, $info["password"]);
    if ($info != null) {
      if ($check) {
        return $info;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  function index()
  {
    $info = M()->table(array('emlog_user' => 'user', 'emlog_usergroup' => 'usergroup'))
      ->field('user.uid,user.roleid,user.username,user.email,usergroup.groupname')
      ->where("user.roleid= usergroup.id")
      ->select();
    return $info;
  }

  function indexrole()
  {

    return $info;
  }

  function add()
  {
    $info = M("user");
    $passwd = new \Admin\Controller\PasswordHash(8, FALSE);
    $_POST["password"] = $passwd->HashPassword($_POST["password"]);
    $info->create($_POST);
    $info->add();
  }


  function role()
  {
    $role = M("usergroup");
    return $role->select();
  }

  function groupadd()
  {
    $role = M("usergroup");
    $role->create($_POST);
    $role->add();
  }
  function groupedit($id)
  {
    $role = M("usergroup");
    $roleinfo = $role->where("id = %s",$id)->select();
    return $roleinfo ;

  }
  function groupchange($id)
  {
    $change = M("usergroup");
    $change->create($_POST);
    $change->where("id = %s",$id)->save($_POST);
    return true;
  }
  function groupdel(){

  }
  /**
   * 用户信息显示
   * @param $uid 用户名id
   * @return mixed
   */
  function edit($uid){
    $user=M("user");
    $userinfo = $user->where("uid ='%s'",$uid)->select();
    return $userinfo;
  }
  /**
   * 用户信息修改
   * @param $uid 用户名id
   * @param $username 用户名
   * @return bool|null
   */
  function userchange($uid,$username){
    $info = M("user");
    $uinfo = $info->where("username= '%s'",$username)->field("username,uid")->find();
    if ($uinfo['uid']!=$uid){
      return false;
    }
   $passwd = new \Admin\Controller\PasswordHash(8, FALSE);
    if (!empty($_POST["password"])){
      $_POST["password"] = $passwd->HashPassword($_POST["password"]);
      $check = $passwd->CheckPassword($_POST["repassword"], $_POST["password"]);
      if (!$check){
        return null;
      }
    }else{
        unset($_POST['password']);
    }
    $info->where("uid = '%s'",$uid)->save($_POST);
    return true;
  }

  /**
   * @var array
   */
  function del($uid){
    $user=M("user");
    $user->delete($uid);
  }


  protected $_validate = array(
    array('username', '', '用户已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
    array('repassword', 'password', '两次密码不一致', 0, 'confirm'), // 验证确认密码是否和密码一致
    array('password', 'checkPwd', '密码格式不正确', 0, 'function'), // 自定义函数验证密码格式
    array('groupname', '', '用户组不能为空或者已经存在！', 0, 'unique', 1),
  );

}
