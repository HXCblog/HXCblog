<?php
class Category_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	function get_category(){
		$table = "category";
		$query = $this->db->get($table);
		$result = $query->result_array();
		return $result;
	}
	function add_category($cate){
		$table = "category";
		$this->db->insert($table,$cate);
		return $this->db->affected_rows();
	}
	function update_category($cid,$info){
		$table = "category";
		$this->db->where("cid",$cid);
		$this->db->update($table,$info);
		return $this->db->affected_rows();
	}
	function del_category($cid){
		$table = "category";
		$rows = $this->db->delete($table,array("cid"=>$cid));
		$table = "article";
		$this->db->delete($table,array("cid"=>$cid));
		return $rows;
	}
}
?>