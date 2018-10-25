<?php
class Admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

/*获取用户信息*/
	function get_user_info(){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$query = $this->db->get_where($table,array('username'=>$username));
		$result = $query->row_array();
		return $result;
	}

/*更新用户信息*/
	function update_user_info($user){
		$table = "user";
		$userinfo = $this->session->userdata('user');
		$username = $userinfo['username'];
		$this->db->where('username',$username);
		$this->db->update($table, $user);
		return $this->db->affected_rows();
	}

/*获取版本信息列表*/
	function get_plan_info(){
		$table = "plan";
		$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}


/*添加版本计划*/
	function add_user_plan($plan){
		$table = "plan";
		$this->db->insert($table, $plan);
		return $this->db->affected_rows();
	}

/*更新版本计划*/
	function update_user_plan($pid,$plan){
		$table = "plan";
		$this->db->where("id",$pid);
		$this->db->update($table,$plan);
		return $this->db->affected_rows();
	}

/*删除版本计划*/	
	function del_user_plan($aid){
		$table = "plan";
		$this->db->delete($table, array('id' => $aid));
		return $this->db->affected_rows();
	}

/*获取用户名*/	
	function get_username($user){
		$table = "user";
		$query = $this->db->get_where($table,array("username"=>$user));
		$result = $query->row_array();
		return $result;
	}

/*校验密码*/
	function check_password($password,$userpass){
		if($password == md5($userpass)){
			return true;
		}else{
			return false;
		}
	}

/*更新密码*/	
	function update_password($uid,$password){
		$table = "user";
		$newpass = md5($password); 
		$info = array("password"=>$newpass);
		$this->db->where("uid",$uid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
}

?>