<?php
class Article_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

/*获取文章列表*/
	function get_article($perPage,$offset,$cid = 0){
		$table = "article";
		if($cid == 0){
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get($table,$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}else{
			$this->db->order_by('id','DESC');//降序排序，id越大最新发布的在前
			$query = $this->db->get_where($table,array("cid"=>$cid),$perPage,$offset);
			$result = $query->result_array();
			return $result;
		}		
	}

/*获取文章*/
	function get_art_info($aid){
		$table = "article";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();//返回数组
		return $result;
	}

/*获取分类*/
	function get_category(){
		$table = "category";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}

/*插入文章*/
	function insert_article($article){
		$table = "article";
		$this->db->insert($table,$article);
		return $this->db->affected_rows();
	}


/*删除文章*/
	function del_article($id){
		$table = "article";
		$this->db->delete($table,array("id"=>$id));
		$result = $this->db->affected_rows();
		return $result;
	}

/*获取文章id*/
	function get_artcid($aid){
		$table = "article";
		$query = $this->db->get_where($table,array("id"=>$aid));
		$result = $query->row_array();
		return $result['cid'];
	}

/*更新文章*/
	function update_art($aid,$info){
		$table = "article";
		$this->db->where("id",$aid);
		$this->db->update($table,$info);
		$result = $this->db->affected_rows();
		return $result;
	}

/*更新分类*/
	function update_cate($cid,$token){
		$table = "category";
		$query = $this->db->get_where($table,array("cid"=>$cid));
		$result = $query->row_array();
		if($token == 1){
			$data = $result['articlenum']+1;
		}else{
			$data = $result['articlenum']-1;
		}
		$this->db->where("cid",$cid);
		$this->db->update($table,array("articlenum"=>$data));
		$result = $this->db->affected_rows();
		return $result;
	}
}
?>