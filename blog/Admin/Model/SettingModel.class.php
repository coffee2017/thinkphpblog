<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/28
 * Time: 11:52
 */

namespace Admin\Model;
use THINK\Model;

class SettingModel extends Model
{
  function system()
  {
    $variable = M('setting')->where("type = 1")->order('id desc')->select();
    return $variable;
  }

  function custom()
  {
    $variable = M('setting')->where("type = 1")->order('id desc')->select();
    return $variable;
  }

  function edit($k)
  {
    $result = M('setting')->where("k='%s'", $k)->select();
    return $result;
  }

  function change($k, $kvar)
  {
    $change = M("setting");
    $map["k"] = "$kvar";
    $var = $change->where($map)->find();
    $var = $var["k"];
    //判断变量名称是否存在
    if ($kvar == $var) {
      return false;
    } else {
      $change->create($_POST);
      $change->where("k='%s'", $k)->save($_POST);
    }

  }

  function add($kvar)
  {
    $add = M("setting");
    $map["k"] = "$kvar";
    $var = $add->where($map)->find();
    $var = $var["k"];
    //判断变量名称是否存在
    if ($kvar == $var) {
      return false;
    } else {
      M("setting")->data($_POST)->add();
    }
  }

  //删除单个
  function del($k)
  {
    M("setting")->where("k='%s'", $k)->delete();
  }

  //批量删除
  function checkdel($data)
  {
    foreach ($data as $k => $v) {
      M("setting")->delete($k);
    }
  }


  function setting()
  {
    foreach ($_POST as $k => $v) {
      $data["v"] = $v;
      $data["k"] = $k;
      M("setting")->where("k='%s'", $k)->data($data)->save();
    }
  }

  public function saveAll($saveWhere, &$saveData, $tableName)
  {
    if ($saveWhere == null || $tableName == null)
      return false;
    //获取更新的主键id名称
    // $key = array_keys($saveWhere)["k"];
    //获取更新列表的长度
    $len = count($saveWhere[$key]);
    $flag = true;
    $model = isset($model) ? $model : M($tableName);
    //开启事务处理机制
    $model->startTrans();
    //记录更新失败ID
    // $error = [];
    for ($i = 0; $i < $len; $i++) {
      //预处理sql语句
      $isRight = $model->where($key . '=' . $saveWhere[$key][$i])->save($saveData[$i]);
      if ($isRight == 0) {
        //将更新失败的记录下来
        $error[] = $i;
        $flag = false;
      }//$flag=$flag&&$isRight;
    }
    if ($flag) {
      //如果都成立就提交
      $model->commit();
      return $saveWhere;
    } elseif (count($error) > 0 & count($error) < $len) {
      //先将原先的预处理进行回滚
      $model->rollback();
      for ($i = 0; $i < count($error); $i++) {
        //删除更新失败的ID和Data
        unset($saveWhere[$key][$error[$i]]);
        unset($saveData[$error[$i]]);
      }
      //重新将数组下标进行排序
      $saveWhere[$key] = array_merge($saveWhere[$key]);
      $saveData = array_merge($saveData);
      //进行第二次递归更新
      $this->saveAll($saveWhere, $saveData, $tableName);
      return $saveWhere;
    } else {
      //如果都更新就回滚
      $model->rollback();
      return false;
    }
  }

}
















