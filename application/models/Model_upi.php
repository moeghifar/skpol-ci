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

	function _check_reject($id){
		$q = $this->db->query("SELECT up.user_id, up.idtbl_upi, r.alasan, r.revisi FROM tbl_user u, tbl_upi up, tbl_rejected r WHERE u.id_user = '$id' AND u.id_user = up.user_id AND r.upi_id = up.idtbl_upi");
		return $q->result_array();
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

	// query without view

	function _get_upi_revisi_non_view($id = null, $idp = null) {
		$sql = "SELECT 
			upi.*,
			user.email as user_email,
			user.level as user_level,
			user.login_status as user_login_status,
			p.nama_provinsi
		FROM tbl_upi upi, tbl_user user, tbl_provinsi p, tbl_rejected ur
		WHERE p.id_provinsi = upi.provinsi_upi
		AND user.id_user = upi.user_id
		AND ur.upi_id = upi.idtbl_upi";
		if($id != null) {
			if($idp != null) {
				$sql .= " AND idtbl_upi = ? AND p.kode_provinsi = ?";
				$q = $this->db->query($sql, $id, $idp);
			} else {
				$sql .= " AND idtbl_upi = ?";
				$q = $this->db->query($sql, $id);
			}
		} else {
			$sql .= " ORDER BY user_id DESC";
			$q = $this->db->query($sql);
		}
		return $q->result_array();
	}

	function _get_upi_detail($upi_id) {
		$sql = "SELECT 
			upi.*,
			user.email as user_email,
			user.level as user_level,
			user.login_status as user_login_status,
			p.nama_provinsi
		FROM tbl_upi upi, tbl_user user, tbl_provinsi p 
		WHERE p.id_provinsi = upi.provinsi_upi
		AND user.id_user = upi.user_id
		AND idtbl_upi = ?
		ORDER BY user_id DESC";
		$q = $this->db->query($sql, $upi_id);
		return $q->result_array();
	}

	function _get_rejected_upi($upi_id) {
		$sql = "SELECT 
			upi.*,
			user.email as user_email,
			user.level as user_level,
			user.login_status as user_login_status,
			p.nama_provinsi,
			ur.alasan,
			ur.revisi
		FROM tbl_upi_rejected ur, tbl_upi upi, tbl_user user, tbl_provinsi p 
		WHERE p.id_provinsi = upi.provinsi_upi
		AND user.id_user = upi.user_id
		AND upi.idtbl_upi = ur.upi_id
		AND idtbl_upi = ?
		ORDER BY user_id DESC";
	}

}
