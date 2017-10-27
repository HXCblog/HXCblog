<!--
待开发......
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Settings extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model(array('Login_model','Settings_model'));
		if(!$this->Login_model->is_logged_in()) {
			redirect('Login/index');
		}
	}

	public function index() {
		$this->load->view('Admin/header');
		$this->load->view('Admin/settings');
		$this->load->view('Admin/footer');
	}
}

?>