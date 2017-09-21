<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/25
 * Time: 16:19
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller
{
function Index(){
    $verify = new \Think\Verify();//实例化验证码
    if(!empty($_POST)){
        // 检测输入的验证码是否正确，id为验证码图片传来的
        if (!$verify->check(I('post.verify'),"login")){
            $this->error('验证码错误',U(Login/Index));
        }else{
            $info = new \Admin\Model\UserModel(); //实例化用户名
            $result = $info->CheckNamePwd(I('post.username'),I("post.password"));//用户名，密码检测
            if($result===false){
                $this->error("用户名或者密码错误",U(Login/Index));
            }else{
                //session
                session("username",$result["username"]);
                session("uid",$result["uid"]);
                session("roleid",$result["roleid"]);
                $this->redirect('index/index');
            }
        }
    }else{
        $this->display();
    }
}
function logout(){
    session(null);
    $this->redirect('login/index');
}
//传到模板login/index.html 使用的验证码
function Verify(){
    $config =    array(
        'fontSize'    =>    18,              // 验证码字体大小
        'length'      =>    4,              // 验证码位数
        'useNoise'    =>    true,         // 关闭验证码杂点
        'imageH'      =>  0,               // 验证码图片高度
        'imageW'      =>  0,               // 验证码图片宽度
        'fontttf'     =>  '4.ttf',         // 验证码字体，不设置随机获取
    );
    $Verify = new \Think\Verify($config);
    //注意id为可标识的信息
   return $Verify->entry(login);
}
}