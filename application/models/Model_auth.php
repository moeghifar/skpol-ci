<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_auth extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _check_user_availabe($u){
		$q = $this->db->get_where('tbl_user',array('username'=>$u));
		if($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _check_email($e){
		$q = $this->db->get_where('tbl_user',array('email'=>$e));
		if($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _update_pass_by_email($d,$e){
		$this->db->where('email',$e);
		$q = $this->db->update('tbl_user',$d);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_password($u){
		$this->db->select('password, level');
		$q = $this->db->get_where('tbl_user',array('username'=>$u));
		return $q->result_array();
	}

	function _check_user_login($u){
		$q = $this->db->get_where('tbl_user',array('username'=>$u,'login_status'=>'1'));
		if($q->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _get_for_session($u,$level=null){
		if($level=='dinas'){
			$q = $this->db->get_where('view_user_dinas_provinsi',array('username'=>$u));
		}elseif($level=='upi'){
			$this->db->order_by("idtbl_upi", "desc");
			$q = $this->db->get_where('view_user_upi_provinsi',array('username'=>$u));
		}else{
			$q = $this->db->get_where('tbl_user',array('username'=>$u));
		}
		return $q->result_array();
	}

	function _get_provinsi(){
		$q = $this->db->get('tbl_provinsi');
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

	function _register_upi($data){
		$q = $this->db->insert('tbl_register_upi',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _check_u_e($u,$e){
		$this->db->select('username as u, email as e');
		$this->db->where("username = '$u'");
		$this->db->or_where("email = '$e'");
		$q = $this->db->get('tbl_user');
		return $q->result_array();
	}
}
