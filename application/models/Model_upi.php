<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_upi extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _insert_rejected($dt){
		$q = $this->db->insert('tbl_rejected',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_upi_baru($id = null, $idp = null){
		$this->db->order_by('idtbl_upi', 'DESC');
		if($id != null){
			if ($idp != null) {
				$q = $this->db->get_where('view_user_register_upi',array('idtbl_upi'=>$id, 'kode_provinsi'=>$idp));
			}else{
				$q = $this->db->get_where('view_user_register_upi',array('idtbl_upi'=>$id));
			}
		}else{
			if ($idp != null) {
				$q = $this->db->get_where('view_user_register_upi',array('kode_provinsi'=>$idp));
			}else{
				$q = $this->db->get('view_user_register_upi');
			}
		}
		return $q->result_array();
	}

	function _get_upi_terdaftar($id = null, $idp = null){
		if($id != null){
			if ($idp != null) {
				$q = $this->db->query("SELECT * FROM view_user_upi_provinsi where idtbl_upi='$id' AND kode_provinsi='$idp' AND idtbl_upi NOT IN (SELECT upi_id FROM tbl_rejected WHERE upi_id IS NOT NULL) ORDER BY idtbl_upi DESC");
			}else{
				$q = $this->db->query("SELECT * FROM view_user_upi_provinsi where idtbl_upi='$id' AND idtbl_upi NOT IN (SELECT upi_id FROM tbl_rejected WHERE upi_id IS NOT NULL) ORDER BY idtbl_upi DESC");
			}
		}else{
			if ($idp != null) {
				$q = $this->db->query("SELECT * FROM view_user_upi_provinsi where kode_provinsi='$idp' AND idtbl_upi NOT IN (SELECT upi_id FROM tbl_rejected WHERE upi_id IS NOT NULL) ORDER BY idtbl_upi DESC");
			}else{
				$q = $this->db->query("SELECT * FROM view_user_upi_provinsi where idtbl_upi NOT IN (SELECT upi_id FROM tbl_rejected WHERE upi_id IS NOT NULL) ORDER BY idtbl_upi DESC");
			}
		}
		return $q->result_array();
	}

	function _get_upi_revisi($id = null, $idp = null){
		$this->db->order_by("idtbl_upi", "desc");
		$this->db->join('tbl_rejected', 'upi_id = idtbl_upi');
		if($id != null){
			if ($idp != null) {
				$q = $this->db->get_where('view_user_upi_provinsi',array('idtbl_upi'=>$id, 'kode_provinsi'=>$idp));
			}else{
				$q = $this->db->get_where('view_user_upi_provinsi',array('idtbl_upi'=>$id));
			}
		}else{
			if ($idp != null) {
				$q = $this->db->get_where('view_user_upi_provinsi',array('kode_provinsi'=>$idp));
			}else{
				$q = $this->db->get('view_user_upi_provinsi');
			}
		}
		return $q->result_array();
	}

	function _insert_upi($data){
		$q = $this->db->insert('tbl_upi',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_user($id){
		$this->db->where('id_user',$id);
		$q = $this->db->update('tbl_user',array('login_status'=>'1'));
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_rejected($id,$data){
		$this->db->where('upi_id',$id);
		$q = $this->db->update('tbl_rejected',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_rejected($id){
		$this->db->where('upi_id',$id);
		$q = $this->db->delete('tbl_rejected');
		if($q){
			return true;
		}else{
			return false;
		}
	}
	function _delete_reg_upi($id){
		$this->db->where('idtbl_upi',$id);
		$q = $this->db->delete('tbl_register_upi');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_register_user($id) {
		$this->db->where('id_user',$id);
		$q = $this->db->delete('tbl_user');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_upi($id, $data){
		$this->db->where(array('idtbl_upi'=>$id));
		$q = $this->db->update('tbl_upi',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_revisi($id, $data){
		$this->db->where(array('upi_id'=>$id));
		$q = $this->db->update('tbl_rejected',$data);
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

	// get user_id from tbl_register_upi
	function _get_user_from_register_upi($id) {
		$this->db->order_by("idtbl_upi", "desc");		
		$q = $this->db->get_where('tbl_register_upi',array('idtbl_upi'=>$id));
		return $q->result_array();
	}
}
