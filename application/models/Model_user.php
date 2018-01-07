<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_user($table, $where = null){
		$this->db->order_by('id_user','DESC');
		if($where != null){
			$this->db->where($where);
		}
		$q = $this->db->get($table);
		return $q->result_array();
	}

	function _insert_user($data){
		$q = $this->db->insert('tbl_user',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _insert_dinas($data){
		$q = $this->db->insert('tbl_dinas',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _activate_user($id, $p){
		$this->db->where('id_user',$id);
		$q = $this->db->update('tbl_user',array('login_status' => $p));
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_user($id_user,$dt){
		$this->db->where('id_user',$id_user);
		$q = $this->db->update('tbl_user', $dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_dinas($id, $dt){
		$this->db->where('user_id',$id);
		$q = $this->db->update('tbl_dinas', $dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_provinsi(){
		$q = $this->db->get('tbl_provinsi');
		return $q->result_array();
	}

	function _check_u_e($u,$e){
		$this->db->select('username as u, email as e');
		$this->db->where("username = '$u'");
		$this->db->or_where("email = '$e'");
		$q = $this->db->get('tbl_user');
		return $q->result_array();
	}
}
