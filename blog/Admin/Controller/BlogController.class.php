<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12
 * Time: 10:11
 */

namespace Admin\Controller;

use Vendor\Tree;

class BlogController extends PublicController
{
  /**
   * @param string $id 文章id
   * @param string $navid 分类id
   */
  function index($id="")
  {

    $blog = M("Blog");
    //获取栏目分类
    $nav = M("Navi");
    $nav_id = $nav->field('id,naviname,pid')->select();
    $navarr = new Tree($nav_id);
    $pid  =isset($_GET["navid"]) ? $_GET["navid"]:"";
    $str = "<option value=\$id \$selected>\$spacer\$naviname</option>"; //生成的形式
    $navarr = $navarr->get_tree(0, $str, $pid);
    $this->assign('category', $navarr);
    //筛选信息
    $title = isset($_GET["title"]) ? $_GET["title"]:"";
    $where['title'] =array('like', "%{$title}%");
    $where['_logic'] = 'and';
    $navid  =isset($_GET["navid"]) ? $_GET["navid"]:"";
    $where['navid'] =array('like', "%{$navid}%");
    $order = isset($_GET["order"]) ? $_GET["order"]:"";
   if ($order =='asc'){
     $order ="date asc";
   }else{
     $order ="date desc";
   }
    //分页
    $count      =  $nav->where($where)->join('__BLOG__ ON __BLOG__.navid = __NAVI__.id')->count();// 查询满足要求的总记录数
    $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(10)
    $show       = $Page->show();// 分页显示输出

    if ($id){
      $blog->delete($id);
      echo "1";
    }else{
      $bloginfo = $nav->where($where)
        ->join('__BLOG__ ON __BLOG__.navid = __NAVI__.id')
        ->field("id,naviname,gid,title,date,navid,edit_date")
        ->limit($Page->firstRow.','.$Page->listRows)
        ->order($order)
        ->select();
      $this->assign("blog",$bloginfo);
      $this->assign("page",$show);
      $this->display();
    }

  }

  function edit($gid=""){
    if(!empty($_POST)){
      if(!empty($_POST["title"])){
        $blog  = M("Blog");
        $_POST['edit_date']=date("Y-m-d H:i:s");
        $blog->where("gid ='%s'",$gid)->save($_POST);
        $this->success("修改成功",U("Blog/index"));
      }else{
        $this->error("文章标题不能为空");
      }

    }else{
      //获取栏目分类
      $nav = M("Navi");
      $nav_id = $nav->field('id,naviname,pid')->select();
      $navarr = new Tree($nav_id);
      $pid  = M("Blog")->where("gid ='%s'",$gid)->field('navid')->select();
      $pid=$pid[0]["navid"];
      $str = "<option value=\$id \$selected>\$spacer\$naviname</option>"; //生成的形式
      $navarr = $navarr->get_tree(0, $str, $pid);
      $this->assign('category', $navarr);

      $bloginfo = $nav->where("gid ='%s'",$gid)->join('__BLOG__ ON __BLOG__.navid = __NAVI__.id')
        ->field("id,naviname,gid,title,date,navid,description,keywords,content,blog_seotitle")
        ->select();
      $this->assign("blog",$bloginfo[0]);
     // $this->show($content, 'utf-8', 'text/xml')
     $this->display('add');
    }

  }

  /**
   * 添加文章
   */
  function add()
  {
    if(!empty($_POST)){
      $blog= M("Blog");
      $blog->add($_POST);
      $this->success("添加成功",U("Blog/index"));
    }else{
      $nav = M("Navi");
      $nav = $nav->field('id,naviname,pid')->select();
      $navarr = new Tree($nav);
      $str = "<option value=\$id \$selected>\$spacer\$naviname</option>"; //生成的形式
      $navarr = $navarr->get_tree(0, $str, $pid);
      $this->assign('category', $navarr);
      $this->display();
    }

  }

  /**
   * 文章分类列表
   */
  function category_index()
  {
    $nav = M("Navi");
    $cate= $nav->field('id,naviname,sort,pid')->order('sort,id')->select();
   // $count      = $nav->count();
   // $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
   // $show       = $Page->show();// 分页显示输出
   // $cate = $nav->field('id,naviname,sort,pid')->order('sort,id')->limit($Page->firstRow.','.$Page->listRows)->select();
    //$nav->field('id,naviname,sort,pid')->order('sort,id')->select();
    $catearr = new Tree($cate);
    $str = "<tr>
              <td>\$spacer\$naviname</td>

              <td>
              <input name='sort' class='inputorder' type='number' value='\$sort' val='\$id'/>
              </td>
              <td>
              <a class='green' href='/index.php/Admin/Blog/category_add/pid/\$id.html'title='新增分类'>
              <i class='ace-icon fa fa-plus-circle bigger-100'></i>
              新增</a>&nbsp;&nbsp;
              <a class='blue' href='/index.php/Admin/Blog/category_edit/id/\$id.html' title='编辑分类'>
              <i class='ace-icon fa fa-plus-circle bigger-100'></i>
              编辑</a>&nbsp;&nbsp;
              <a class='dellink del' href='javascript:void(0);'  val='\$id' title='删除分类'>
              <i class='ace-icon fa fa-plus-circle bigger-100'></i>
              删除</a>
              </td>
            </tr>";
    $catearr = $catearr->get_tree(0,$str);
    $this->assign('cate',$catearr);
   // $this->assign('page',$show);
    $this->display();
  }

  /**
   * 添加文章分类
   */
  function category_add($pid='')
  {
    $nav = D("Navi");
    if (!empty($_POST)) {
      if (!empty($_POST['naviname'])){
        $nav->category_add();
        $this->success('添加成功', U('Blog/category_add'));
      }else{
        $this->error('分类不能为空', U('Blog/category_add'));
      }
    } else {
      $nav = M("Navi");
      $nav = $nav->field('id,naviname,pid')->select();
      $navarr = new Tree($nav);
      $str = "<option value=\$id \$selected>\$spacer\$naviname</option>"; //生成的形式
      $navarr = $navarr->get_tree(0, $str, $pid);
      $this->assign('category', $navarr);
      $this->assign('nav', $nav);
      $this->display();
    }

  }

  /**
   * @param string $id 分类id
   */
  function category_edit($id='')
  {
    $nav = D("Navi");
    if (!empty($_POST)) {
      $nav->category_edit();
      $this->success('修改成功', U('Blog/category_index'));
    } else {
      $navinfo = M("Navi");
      $nav = $navinfo->field('id,naviname,pid')->select();//显示所有分类
      $navid = $navinfo->where("id='%d'",$id)->field('id,naviname,pid,seotitle,seodes,seokey,sort,hide,en_name')->select();//选中分类
      $navarr = new Tree($nav);
      $str = "<option value=\$id \$selected>\$spacer\$naviname</option>"; //生成的形式
      $navarr = $navarr->get_tree(0, $str, $navid[0]['pid']);
      $this->assign('category', $navarr);
      $this->assign('navid', $navid[0]);
      $this->display('category_add');
    }
  }
  function category_del($id=""){
    $nav  = M("Navi");
    $count = $nav->where("pid = '%s'",$id)->field("pid")->select();
    if (count($count )!=0){
     echo "2";
    }else{
      $nav->delete($id);
      echo "1";
    }
  }
}