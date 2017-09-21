<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9
 * Time: 17:11
 */

namespace Admin\Controller;


class UserController extends PublicController
{
  function index()
  {
    $info = D("User");
    if (!empty($_POST)){
      /**
       * 批量删除用户
       */
      $uid = implode(",",array_keys($_POST));
      $info->del($uid);
      $this->success("删除成功", U("User/index"));
    }else{
      /**
       * 显示用户信息
       */

      $user = $info->index();
      $role = $info->indexrole();
      $uid = $info->groupedit(session(roleid));
      $uid = explode(',',$uid[0]["menu"]);
      $this ->assign("uid",$uid);
      $this->assign("role", $role);
      $this->assign("user", $user);
      $this->display();
    }
  }

  function add()
  {
    $user = new \Admin\Model\UserModel(); // 实例化User对象
    $role = $user->role();
    $this->assign("role", $role);
    //判断是否提交数据
    if (!empty($_POST)) {
      if (!$user->create()) {
        // 如果创建失败 表示验证没有通过 输出错误提示信息
        $error = $user->getError();
        $this->error($error);
      } else {
        $user->add();
        $this->success("添加成功", "index");
      }
    } else {
      $this->display();
    }
  }

  function group()
  {
    $user =D("User"); // 实例化User对象
    $role = $user->role();
    $uid = $user->groupedit(session(roleid));
    $uid = explode(',',$uid[0]["menu"]);
    $this ->assign("uid",$uid);
    $this->assign("role", $role);
    $this->display();
  }

  function groupadd()
  {
    $user = new \Admin\Model\UserModel();
    //判断是否提交数据
    if (!empty($_POST)) {
      if ($user->create()) {
        // 如果创建失败 表示验证没有通过 输出错误提示信息
        $error = $user->getError();
        $this->error($error);
      } else {
        $_POST["menu"] = implode(",", $_POST["menu"]);
        $user->groupadd();
        $this->success("添加成功", "groupadd");
      }
    } else {
      $this->display();
    }
  }

  function groupedit($id)
  {
    $user = D("User");
    $roleinfo = $user->groupedit($id);
    if (!empty($_POST)) {
      $_POST["menu"] = implode(",",I("POST.menu"));
      $roleinfo = $user->groupchange(I("POST.id"));
      if ($roleinfo === false) {
        $this->error("<span style='color:red'>" . I("POST.url") . "</span>" . "变量名称已经存在,请使用其他变量名称");
      } else {
        $this->success("修改成功", U("User/group"));
      }
    } else {
      $menuid =$roleinfo[0][menu];
      $menuidarr= explode(',',$menuid);
      $this->assign("menuid",$menuidarr);
      $this->assign("roleinfo",$roleinfo[0]);
      $this->display();
    }
  }

  function groupdel()
  {

  }

  /**
   * 修改用户信息
   * @param $uid 用户名id
   */
  function edit($uid){
    $user = D("User");
    $userinfo = $user->edit($uid);
    if (!empty($_POST)) {
      $userinfo = $user->userchange(I("POST.uid"),I("POST.username"));
      //判断用户名是否存在
      if ($userinfo === false) {
        $this->error("<span style='color:red'>" . I("POST.username") . "</span>" . "用户已经存在");
      } else {
        if ($userinfo ==null) {
          $this->error("两次密码不一致");
        } else {
          $this->success("修改成功", U("User/index"));
        }
      }
    } else {
      $role = $user->role();
      $this->assign("role", $role);
      $this->assign("userinfo", $userinfo[0]);
      $this->display();
    }
  }
  /**
   * 删除用户信息
   */
  function del($uid){
    $user = D("User");
    $user->del($uid);
    $this->success("删除成功", U("User/index"));
  }
}