<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_last_status_skp($id = null, $idp = null){
		if ($id != null) {
			if ($idp != null) {
				$q = $this->db->query("SELECT * FROM (SELECT max(sl.id_skp_log) as maxidlog FROM tbl_skp_log sl GROUP BY sl.skp_id) mxdl, tbl_skp_log tsl, view_upi_produk_skp ups WHERE tsl.id_skp_log = maxidlog AND ups.idtbl_skp = tsl.skp_id AND ups.id_user = '$id' AND ups.kode_provinsi = '$idp' AND ups.status_skp <> 'terbit-skp' AND ups.status_skp <> 'deleted'");
			}else{
				$q = $this->db->query("SELECT * FROM (SELECT max(sl.id_skp_log) as maxidlog FROM tbl_skp_log sl GROUP BY sl.skp_id) mxdl, tbl_skp_log tsl, view_upi_produk_skp ups WHERE tsl.id_skp_log = maxidlog AND ups.idtbl_skp = tsl.skp_id AND ups.id_user = '$id' AND ups.status_skp <> 'terbit-skp' AND ups.status_skp <> 'deleted'");
			}
		}else{
			if ($idp != null) {
				$q = $this->db->query("SELECT * FROM (SELECT max(sl.id_skp_log) as maxidlog FROM tbl_skp_log sl GROUP BY sl.skp_id) mxdl, tbl_skp_log tsl, view_upi_produk_skp ups WHERE tsl.id_skp_log = maxidlog AND ups.idtbl_skp = tsl.skp_id AND ups.kode_provinsi = '$idp' AND ups.status_skp <> 'terbit-skp' AND ups.status_skp <> 'deleted'");
			}else{
				$q = $this->db->query("SELECT * FROM (SELECT max(sl.id_skp_log) as maxidlog FROM tbl_skp_log sl GROUP BY sl.skp_id) mxdl, tbl_skp_log tsl, view_upi_produk_skp ups WHERE tsl.id_skp_log = maxidlog AND ups.idtbl_skp = tsl.skp_id AND ups.status_skp <> 'terbit-skp' AND ups.status_skp <> 'deleted'");
			}
		}
		// $q = $this->db->get_where('view_upi_produk_skp',array('idtbl_upi'=>$id));
		return $q->result_array();
	}

	function _get_status_skp($skpid){
		$q = $this->db->query("SELECT * FROM view_upi_produk_skp ups, tbl_skp_log sl WHERE ups.idtbl_skp = sl.skp_id AND sl.skp_id = '$skpid' ORDER BY sl.id_skp_log ASC");
		// $q = $this->db->get_where('view_upi_produk_skp',array('idtbl_upi'=>$id));
		return $q->result_array();
	}

	function _get_skp_terbit_id($id=null,$pr=null){
		if ($id!=null) {
			if ($pr!=null) {
				$q = $this->db->get_where('view_skp_terbit',array('idtbl_upi'=>$id,'kode_provinsi'=>$pr,'status'=>1));
			}else{
				$q = $this->db->get_where('view_skp_terbit',array('idtbl_upi'=>$id,'status'=>1));
			}
		}else{
			if ($pr!=null) {
				$q = $this->db->get_where('view_skp_terbit',array('kode_provinsi'=>$pr,'status'=>1));
			}else{
				$q = $this->db->get_where('view_skp_terbit',array('status'=>1));
			}
		}
		return $q->result_array();
	}

	function _get_skp_terbit(){
		$q = $this->db->get_where('view_skp_terbit',array('status_skp'=>'terbit-skp'));
		return $q->result_array();
	}

	function _get_upi_terdaftar(){
		$q = $this->db->get('view_user_upi_provinsi');
		return $q->result_array();
	}

	function _get_skp_progress(){
		$q = $this->db->get_where('view_upi_produk_skp',array('status_skp !='=>'terbit-skp'));
		return $q->result_array();
	}

	function _get_skp_progress_baru(){
		$q = $this->db->get_where('view_upi_produk_skp',array('status_skp !='=>'terbit-skp','permohonan_skp'=>'Baru'));
		return $q->result_array();
	}

	function _get_skp_progress_perpanjang(){
		$q = $this->db->get_where('view_upi_produk_skp',array('status_skp !='=>'terbit-skp','permohonan_skp'=>'Perpanjang'));
		return $q->result_array();
	}

}
