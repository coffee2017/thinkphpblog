<?php
namespace Admin\Controller;

class IndexController extends PublicController {
    public function Index(){
        //显示数据库版本
        $mysql= M();
        $mysql=$mysql->query("select VERSION()");
        $this->assign("mysql",$mysql[0]["version()"]);
        $this->display();

    }
}