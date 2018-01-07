<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_setting extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function _get_user(){
		$q = $this->db->get_where('tbl_user',array('id_user'=>$this->session->userdata($this->session_prefix.'-userid')));
		return $q->result_array();
	}

	function _get_file_by_id($id){
		$q = $this->db->get_where('tbl_file_example',array('id_file_example'=>$id));
		return $q->result_array();
	}

	function _get_data_file($level = ""){
		if($level == ""){
			$q = $this->db->get('tbl_file_example');
		}else{
			$q = $this->db->get_where('tbl_file_example',array('file_target'=>$level));
		}
		return $q->result_array();
	}

	function _insert_file($data_insert){
		$q = $this->db->insert('tbl_file_example',$data_insert);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_file($id){
		$this->db->where('id_file_example',$id);
		$q = $this->db->delete('tbl_file_example');
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

	function _check_u_e($u,$e){
		$this->db->where('username', $u);
		$this->db->or_where('email', $e);
		$q = $this->db->get('tbl_user');
		return $q->result_array();
	}

	function _check_u_e_and_id($u,$e,$id){
		$where = "id_user != $id AND username = '$u' OR email = '$e'";
		$this->db->where($where);
		$q = $this->db->get('tbl_user');
		return $q->result_array();
	}

	function _check_user_availabe($u){
		$q = $this->db->get_where('tbl_user',array('username'=>$u));
		if($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
