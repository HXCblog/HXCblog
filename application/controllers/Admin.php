<!-- *文件名：后台文章模块 *时间：20170809 -->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Admin extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->library('form_validation');
		$this->load->model(array('Login_model','Admin_model'));
		if(!$this->Login_model->is_logged_in()) {
			redirect('Login/index');
		}
	}

	public function index() {
		//加载首页视图
		$this->load->view('Admin/header');
		$this->load->view('Admin/home');
		$this->load->view('Admin/footer');
	}
	
	/*获取名片信息*/
	public function show() {
		//获取用户名片
		$data['info'] = $this->Admin_model->get_user_info();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/admin');
		$this->load->view('Admin/footer');
	}

	public function pass() {
		//加载修改密码视图
		$data['update_error'] = "";
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/password');
		$this->load->view('Admin/footer');
	}

	/*版本管理*/
	public function version() {
		//获取用户信息和计划
		$data['plan'] = $this->Admin_model->get_plan_info();
		//加载视图分配变量
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/version');
		$this->load->view('Admin/footer');
	}

	public function updateinfo() {
		//获取用户信息	
		$username = $this->input->post('username');
		$location = $this->input->post('location');
		$email = $this->input->post('email');
		$info = array('username'=>$username,'location'=>$location,'email'=>$email);
		//执行更新操作
		if($this->Admin_model->update_user_info($info)) {
			$data['tips'] = "修改成功!";
		} else {
			$data['tips'] = "未做修改!";
		}
		$data['route'] = site_url('Admin/show');
		//输出信息并跳转
		$this->load->view('tips',$data);	
	}

	/*添加版本计划*/
	public function addplan() {
		//获取计划信息
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished'); 
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		//执行添加操作
		if($this->Admin_model->add_user_plan($info)) {
			redirect('Admin/version');
		}
			
	}

	/*修改版本计划*/
	public function changeplan() {
		//获取计划id和信息
		$pid = $this->uri->segment(3);
		$planname = $this->input->post('planname');
		$usedtime = $this->input->post('usedtime');
		$finished = $this->input->post('finished');
		$info = array('planname'=>$planname,'usedtime'=>$usedtime,'finished'=>$finished);
		//执行更新计划操作
		if($this->Admin_model->update_user_plan($pid,$info)) {
			redirect('Admin/version');
		} 
		
	}
	
	/*删除版本计划*/
	public function delplan() {
		//获取计划id
		$pid = $this->uri->segment(3);
		//执行删除动作
		if($this->Admin_model->del_user_plan($pid)) {
			redirect('Admin/version');
		}
	}
	
	/*更新密码*/
	public function updatepass() {
		$data['update_error'] = '';
		//设置用户密码过滤条件
		$this->form_validation->set_rules('username','管理员名','required',array('required'=>'用户名不能为空'));
		$this->form_validation->set_rules('prepass','原密码','required',array('required'=>'原密码不能为空'));
		$this->form_validation->set_rules('newpass','新密码','required',array('required'=>'新密码不能为空'));
		$this->form_validation->set_rules('conpass','确认密码','required|matches[newpass]',array('required'=>'确认密码不能为空'));
		//判断过滤结果是否成功
		if($this->form_validation->run()) {
			$username = $this->input->post("username");
			$prepass = $this->input->post("prepass");
			$newpass = $this->input->post("newpass");
			//用户名验证
			if($user = $this->Admin_model->get_username($username)) {
				//密码验证
				if($this->Admin_model->check_password($user['password'],$prepass)) {
					//更新密码
					if($this->Admin_model->update_password($user['uid'],$newpass)) {
						echo "<script type = 'text/javascript'>alert('修改成功!');</script>";
					} else {
						echo "<script type = 'text/javascript'>alert('修改失败!');</script>";
					}
				} else {
					$data['update_error'] = "无效的用户名或密码!";
				}
			} else {
				$data['update_error'] = "无效的用户名或密码!";
			}
		}
		//加载视图分配变量
		$this->load->view("Admin/header",$data);
		$this->load->view("Admin/password");
		$this->load->view("Admin/footer");
	}
	
}
?>
