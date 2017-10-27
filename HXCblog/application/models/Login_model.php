<?php
class Login_model extends CI_Model{
	var $table = 'users';
	var $max_idle_time = 3600;
	
	function __construct(){
		parent::__construct();
		$this->load->helper('captcha');
	}

/*已登录*/
	function is_logged_in(){
		
		$last_activity = $this->session->userdata('last_activity');
		$logged_in = $this->session->userdata('logged_in');
		$user = $this->session->userdata('user');
		
		if(($logged_in == 'yes') && ((time() - $last_activity) < $this->max_idle_time )){
			$this->allow_pass( $user );
			return true;
		}else{
			$this->remove_pass();
			return false;
		}
	}

/*允许通过*/	
	function allow_pass($user_data){
		$this->session->set_userdata(array('last_activity' => time(),'logged_in' => 'yes', 'user' => $user_data ));
	}

/*移除*/
	function remove_pass(){
		$array_items = array('last_activity' => '', 'logged_in' => '', 'user' => '');
		$this->session->unset_userdata($array_items);
	}
	

/*获取验证码 CI验证码辅助函数*/	
	function get_checkword(){
		$table = "picture";
		$vals = array(
			'word'      => rand(1000,10000),//定义验证码词库从1000到10000
			'img_path'  => './captcha/',//验证码图片存储位置
			'img_url'   => base_url().'captcha/',
			'font_path' => './path/to/fonts/texb.ttf',
			'img_width' => '140',
			'img_height'    => 38,//高度
			'expiration'    => 1000,//保留验证码图片时长
			'word_length'   => 8,
			'font_size' => 16,
			'img_id'    => 'Imageid',//验证码图片id
			'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'    => array(
				'background' => array(255, 255, 255),//验证码背景色
				'border' => array(96, 96, 96),//边框色
				'text' => array(255, 0, 0),//文章色
				'grid' => array(10, 100, 10)//花纹颜色
				)
			);
			
        $cap = create_captcha($vals); 
        //定义数组
		$data = array(
			'captcha_time'  => $cap['time'],
			'ip_address'    => $this->input->ip_address(),
			'word'      => $cap['word']
		);
        $query = $this->db->insert($table,$data);//将数据插入数据库存储
		$expiration = time() - 1000; //清除数据的时间
		$this->db->where('captcha_time < ', $expiration)->delete('picture');//删除pictrue表中过期的数据
        return $cap['image'];//输出验证码图
	}
	
/*验证验证码*/	
	function check_num($word,$ip_address,$captcha_time){
		$sql = 'SELECT COUNT(*) AS count FROM picture WHERE word = ? AND ip_address = ? AND captcha_time > ?';
		$binds = array($word,$ip_address,$captcha_time);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		if ($row->count == 0){
			return false;
		}
		else{
			return true;
		}
	}

/*获取用户名*/
	function get_by_username($username) {
		$table = "user";
		$query = $this->db->get_where($table, array('username' => $username), 1);
		if( $query->num_rows() > 0 ) return $query->row_array();
		return false;
	}

/*校验密码*/	
	function check_password($password,$hashed_password) {
		if($hashed_password == md5($password)) return true;
		return false;
	}
	
}
?>