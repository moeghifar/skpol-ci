<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_skp extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_produk(){
		$this->db->order_by('kategori_produk', 'ASC');
		$q = $this->db->get_where('tbl_produk',array('status_produk'=>1));
		return $q->result_array();
	}

	function _check_reject($id){
		$q = $this->db->query("SELECT * FROM tbl_user u, tbl_upi up, tbl_rejected r WHERE u.id_user = '$id' AND u.id_user = up.user_id AND r.upi_id = up.idtbl_upi");
		return $q->result_array();
	}

	function _get_produk_bykat($kat){
		$q = $this->db->get_where('tbl_produk',array('status_produk'=>1,'kategori_produk'=>$kat));
		return $q->result_array();
	}

	function _get_kategori_produk(){
		$this->db->distinct();
		$this->db->select('kategori_produk');
		$q = $this->db->get_where('tbl_produk',array('status_produk'=>1));
		return $q->result_array();
	}

	function _insert_for_skp($tblname,$data){
		$q = $this->db->insert($tblname,$data);
		if($q){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _get_skp($p = null){
		if($p != null){
			$q = $this->db->get_where('view_upi_produk_skp',array('idtbl_skp'=>$p));
		}else{
			$q = $this->db->get('view_upi_produk_skp');
		}
		return $q->result_array();
	}

	function _get_skp_progress($status,$id = null, $idp = null){
		$this->db->order_by('idtbl_skp', 'DESC');
		if($id != null){
			if ($idp != null) {
				$q = $this->db->get_where('view_upi_produk_skp',array('idtbl_skp'=>$id, 'status_skp'=>$status, 'kode_provinsi'=>$idp));
			}else{
				$q = $this->db->get_where('view_upi_produk_skp',array('idtbl_skp'=>$id, 'status_skp'=>$status));
			}
		}else{
			if ($idp != null) {
				$q = $this->db->get_where('view_upi_produk_skp',array('kode_provinsi'=>$idp, 'status_skp'=>$status));
			}else{
				$q = $this->db->get_where('view_upi_produk_skp', array('status_skp'=>$status));
			}
		}
		return $q->result_array();
	}

	function _get_skp_terbit($status, $id = null){
		if($id != null){
			$q = $this->db->get_where('view_skp_terbit',array('idtbl_skp'=>$id, 'status_skp'=>$status));
		}elseif($status == "penerbitan-skp"){
			$this->db->join('tbl_tandatangan','tbl_tandatangan.skp_id = view_skp_terbit.skp_id');
			$this->db->where("status_skp != 'terbit-skp' AND status_skp != 'deleted'");
			$q = $this->db->get('view_skp_terbit');
		}else{
			$q = $this->db->get_where('view_skp_terbit',array('status_skp'=>$status));
		}
		return $q->result_array();
	}

	function _get_by_alur($tblname, $id){
		$q = $this->db->get_where($tblname,array('idtbl_alurproses'=>$id));
		return $q->result_array();
	}

	function _get_by_skp($tblname, $id){
		$q = $this->db->get_where($tblname,array('skp_id'=>$id));
		return $q->result_array();
	}

	function _create_skp_log($log,$id,$datelog=null){
		if($datelog == null){
			$data = array(
				'id_skp_log'	=> '',
				'skp_id'		=> $id,
				'status_log'	=> $log,
				'date_log'		=> date('Y-m-d')
			);
		}else{
			$data = array(
				'id_skp_log'	=> '',
				'skp_id'		=> $id,
				'status_log'	=> $log,
				'date_log'		=> $datelog
			);
		}

		$q = $this->db->insert('tbl_skp_log',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _insert_penjadwalan($dt){
		$q = $this->db->insert('tbl_kunjungan',$dt);
		if($q){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _update_skp_status($dt,$id){
		$this->db->where(array('idtbl_skp'=>$id));
		$q = $this->db->update('tbl_skp',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_skp_terbit_status($dt,$id){
		$this->db->where(array('idtbl_skp_terbit'=>$id));
		$q = $this->db->update('tbl_skp_terbit',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_rekomendasi_skp($id = null){
		if ($id != null) {
			$q = $this->db->get_where('view_skp_kunjungan',array('idtbl_skp'=>$id,'status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas'));
		}else{
			$q = $this->db->get_where('view_skp_kunjungan',array('status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas'));
		}
		return $q->result_array();
	}

	function _cek_alur_proses($data){
		$q = $this->db->get_where('tbl_alurproses',array('nama_alurproses' => $data));
		return $q->result_array();
	}

	function _insert_skp_terbit($data){
		$q = $this->db->insert('tbl_skp_terbit',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _insert_skp_ttd($data){
		$q = $this->db->insert('tbl_tandatangan',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_alur_proses(){
		$q = $this->db->get_where('tbl_alurproses',array('status'=>1));
		return $q->result_array();
	}

	function _insert_alur_proses($data){
		$q = $this->db->insert('tbl_alurproses',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_alur_proses($id){
		$this->db->where('idtbl_alurproses',$id);
		$q = $this->db->delete('tbl_alurproses');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _soft_delete_alur_proses($id,$dt){
		$this->db->where('idtbl_alurproses',$id);
		$q = $this->db->update('tbl_alurproses',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_ttd($dt,$skpid,$ttdid){
		$this->db->where(array('skp_id'=>$skpid,'idtbl_tandatangan'=>$ttdid));
		$q = $this->db->update('tbl_tandatangan',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_print_skp_terbit($status,$idskp){
		$q = $this->db->get_where('view_skp_terbit',array('status_skp'=>$status,'idtbl_skp'=>$idskp,'status'=>1));
		return $q->result_array();
	}

	function _get_dirjen(){
		$q = $this->db->get_where('tbl_dinas',array('jabatan_dinas'=>'Direktorat Jendral'));
		return $q->result_array();
	}

	function _get_skp_terbit_id($id){
		$q = $this->db->get_where('tbl_skp_terbit',array('idtbl_skp_terbit'=>$id,'status'=>1));
		return $q->result_array();
	}

	function _update_skp_terbit($dt,$id){
		$this->db->where(array('idtbl_skp_terbit'=>$id,'status'=>1));
		$q = $this->db->update('tbl_skp_terbit',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_skp_by_terbit($id_terbit) {
		$q = $this->db->get_where('tbl_skp_terbit',array('idtbl_skp_terbit'=>$id_terbit));
		return $q->result_array();
	}

	function _delete_skp_table($id,$tbl,$where){
		$this->db->where($where,$id);
		$q = $this->db->delete($tbl);
		if($q){
			return true;
		}else{
			return false;
		}
	}
}
