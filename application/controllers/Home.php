<!--
*文件名：前台
*时间：20170715
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('date.timezone','Asia/Shanghai');//时区设置
class Home extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Home_model');
	}
	
/*前台文章分页*/
	public function index() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();    //获取栏目并显示 
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//加载分页类
		$this->load->library('pagination');   //分页显示文章列表
		//配置分页类
		$perPage = 4;
		$config['base_url'] = site_url('Home/index');//分页所在控制器
		$config['total_rows'] = $this->db->count_all_results('article');//需要做分页的总行数
		$config['per_page'] = $perPage;//希望展现的分页数量
		$config['uri_segment'] = 3;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = '<span class="layui-btn" role = "button">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span>&nbsp;&nbsp;';//第一个链接的结束标签
		$config['last_tag_open'] = '<span class="layui-btn" role = "button">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span>&nbsp;&nbsp;';//最后一个链接的结束标签
		$config['num_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//数字链接的起始标签
		$config['num_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['cur_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['prev_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['prev_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['next_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['next_tag_close'] = '</span>&nbsp;&nbsp;';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取数据
		$offset = $this->uri->segment(3);
		$data['article']=$this->Home_model->getarticle($perPage, $offset);
		//加载视图	
		$this->load->view('Home/header',$data);
		$this->load->view('Home/body');
		$this->load->view('Home/footer');
	}

/*博客分类栏目分页配置*/
	public function block() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo();
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示 
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//获取分类id
		$cid = $this->uri->segment(3);
		$this->db->where('cid',$cid);
		$total = $this->db->count_all_results('article');
		//加载分页类
		$this->load->library('pagination');                                                 //分页显示文章列表
		//配置分页类
		$perPage = 4;
		$url = 'Home/block/'."{$cid}";
		$config['base_url'] = site_url($url);
		$config['total_rows'] = $total;
		$config['per_page'] = $perPage;
		$config['uri_segment'] = 4;
		$config['first_link'] = '首页';
		$config['last_link'] = '尾页';
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_tag_open'] = '<span class="layui-btn" role = "button">';//第一个链接的起始标签。
		$config['first_tag_close'] = '</span>&nbsp;&nbsp;';//第一个链接的结束标签
		$config['last_tag_open'] = '<span class="layui-btn" role = "button">';//最后一个链接的起始标签
		$config['last_tag_close'] = '</span>&nbsp;&nbsp;';//最后一个链接的结束标签
		$config['num_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//数字链接的起始标签
		$config['num_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['cur_tag_open'] = '<span class="layui-btn layui-btn-primary" role = "button">';//当前页链接的起始标签
		$config['cur_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['prev_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['prev_tag_close'] = '</span>&nbsp;&nbsp;';
		$config['next_tag_open'] = '<span class="layui-btn" role = "button">';
		$config['next_tag_close'] = '</span>&nbsp;&nbsp;';
		$this->pagination->initialize($config);
		//生成分页
		$data['links'] = $this->pagination->create_links();
		//获取数据
		$offset = $this->uri->segment(4);
		$data['article']=$this->Home_model->getarticle($perPage, $offset,$cid);
		//加载视图
		$this->load->view('Home/header',$data);
		$this->load->view('Home/blog');
		$this->load->view('Home/footer');
	}

/*文章内容*/
	public function content() {
		//获取用户信息
		$data['userinfo'] = $this->Home_model->getuserinfo(); 
		//获取分类信息
		$data['category'] = $this->Home_model->getcategory();                                       //获取栏目并显示
		//获取排名信息
		$data['order'] = $this->Home_model->getorderart();
		//获取文章具体内容
		$aid = $this->uri->segment(3);
		$data['content'] = $this->Home_model->getcontent($aid);
		//加载视图	
		$this->load->view('Home/header',$data);
		$this->load->view('Home/content');
		$this->load->view('Home/footer');
	}
	
/*文章浏览量*/
	public function viewnum() {
		//查询文章
		$aid = $this->input->post('id');
		$table = "article";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();
		//增加点击量
		$data = $result['viewnum'] + 1;
		$this->db->where("id",$aid);
		$this->db->update($table,array("viewnum"=>$data));
	}	
	
}

?>
