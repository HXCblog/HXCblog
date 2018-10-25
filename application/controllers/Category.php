<?php
/*
*文件名：栏目分类控制器
*时间：2017年7月
*作者：HXC
*/

defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Category extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Category_model'));
		//登录判断
		if(!$this->Login_model->is_logged_in()) {
			redirect('Login/index');
		}
	}

/*获取分类列表*/

	public function index() {
		//查询分类信息
		$data['info'] = $this->Category_model->get_category();
		//分配变量输出模板
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/category');
		$this->load->view('Admin/footer');
	}
	
/*添加分类功能*/
	public function addcate() {
		//获取分类信息
		$category = $this->input->post('category');
		$datetime = $this->input->post('datetime');
		$info = array("catename"=>$category,"createtime"=>$datetime);
		//执行添加操作
		if($this->Category_model->add_category($info)) {
			redirect('Category/index');//返回
		}
	}

/*栏目分类修改*/
	public function changecate() {
		//获取分类id和分类信息
		$cid = $this->uri->segment(3);
		$category = $this->input->post('category');
		$datetime = $this->input->post('datetime');
		$info = array("catename"=>$category,"createtime"=>$datetime);
		//执行更新操作
		if($this->Category_model->update_category($cid,$info)) {
			redirect('Category/index');//返回
		}
	}

/*删除栏目分类*/
	public function delcate() {
		//获取分类id
		$cid = $this->uri->segment(3);
		//执行删除操作
		if($this->Category_model->del_category($cid)) {
			$data['tips'] = "删除成功!";
		} else {
			$data['tips'] = "删除失败!";
		}
		$data['route'] = site_url("Category/index");
		//作出提示并跳转
		$this->load->view("tips",$data);//提示页
	}
}


?>
