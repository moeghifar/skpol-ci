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
		$this->db->order_by('idtbl_skp','desc');
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
				'skp_id'		=> $id,
				'status_log'	=> $log,
				'date_log'		=> date('Y-m-d')
			);
		}else{
			$data = array(
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

	function _get_rekomendasi_skp($id = null, $idp = null){
		$this->db->reset_query();
		$this->db->order_by('idtbl_skp','desc');
		if ($id != null) {
			if ($idp == null) {
				$q = $this->db->get_where('view_skp_kunjungan',array('idtbl_skp'=>$id,'status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas'));
			}else{
				$q = $this->db->get_where('view_skp_kunjungan',array('idtbl_skp'=>$id,'status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas', 'kode_provinsi'=>$idp));
			}
		}else{
			if ($idp == null) {
				$q = $this->db->get_where('view_skp_kunjungan',array('status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas'));
			}else{
				$q = $this->db->get_where('view_skp_kunjungan',array('status_skp'=>'kunjungan-selesai-dinas','status_kunjungan'=>'Kunjungan Selesai','uker_kunjungan'=>'dinas', 'kode_provinsi'=>$idp));
			}
		}
		return $q->result_array();
	}

	function _get_rekomendasi_skp_nonview($id = null, $idp = null){
		$this->db->reset_query();
		$query = "SELECT 
				skp.idtbl_skp, 
				upi.nama_upi, 
				prod.namaind_produk, 
				skp.permohonan_skp,
				prov.nama_provinsi,
				k.idtbl_kunjungan,
				k.tgl_rekomendasi,
				k.rekomendasi_kunjungan,
				k.date_updated,
				k.tgl_kunjungan
			FROM 
				tbl_upi upi,
				tbl_skp skp, 
				tbl_produk prod,
				tbl_provinsi prov,
				tbl_kunjungan k
			WHERE
				skp.upi_id = upi.idtbl_upi AND
				skp.produk_id = prod.idtbl_produk AND
				upi.provinsi_upi = prov.id_provinsi AND
				skp.idtbl_skp = k.skp_id AND 
				skp.status_skp = 'kunjungan-selesai-dinas' AND
				k.status_kunjungan = 'Kunjungan Selesai' AND
				k.uker_kunjungan = 'dinas'";
		if ($id != null) {
			if ($idp == null) {
				$fixQuery = $query.' AND skp.idtbl_skp = ? ORDER BY k.tgl_rekomendasi, k.date_updated, k.tgl_kunjungan, skp.idtbl_skp DESC';
				$q = $this->db->query($fixQuery, $id);
			}else{
				$fixQuery = $query.' AND prov.kode_provinsi = ? AND skp.idtbl_skp = ? ORDER BY k.tgl_rekomendasi, k.date_updated, k.tgl_kunjungan, skp.idtbl_skp DESC';
				$q = $this->db->query($fixQuery, $idp, $id);
			}
		}else{
			if ($idp == null) {
				$fixQuery = $query.' ORDER BY k.tgl_rekomendasi, k.date_updated, k.tgl_kunjungan, skp.idtbl_skp DESC';
				$q = $this->db->query($fixQuery);
			}else{
				$fixQuery = $query.' AND prov.kode_provinsi = ? ORDER BY k.tgl_rekomendasi, k.date_updated, k.tgl_kunjungan, skp.idtbl_skp DESC';
				$q = $this->db->query($fixQuery, $idp);
			}
		}
		return $q->result_array();
	}

	function _check_revisi_rekomendasi($idskp) {
		$q = $this->db->get_where('tbl_revisi_rekomendasi',array('skp_id' => $idskp));
		return $q->result_array();
	}

	function _insert_revisi_rekomendasi($data) {
		$q = $this->db->insert('tbl_revisi_rekomendasi',$data);
		if($q){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function _update_revisi_rekomendasi($id, $data) {
		$this->db->where(array('skp_id'=>$id));
		$q = $this->db->update('tbl_revisi_rekomendasi',$data);
		if($q){
			return TRUE;
		}else{
			return FALSE;
		}
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

	function _delete_skp($id){
		$this->db->where('idtbl_skp', $id);
		$q = $this->db->delete('tbl_skp');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_skp_log($skpid) {
		$this->db->where('skp_id',$skpid);
		$q = $this->db->delete('tbl_skp_log');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_skp_with_dependency($skpid) {
		$tables = array('tbl_airbersih', 'tbl_asales', 'tbl_bahanbaku', 'tbl_infolain', 'tbl_karyawan', 'tbl_kunjungan', 'tbl_pemasaran', 'tbl_penanggungjawab', 'tbl_sarpras', 'tbl_sni', 'tbl_skp_log');
		$this->db->where('skp_id', $skpid);
		$this->db->delete($tables);
		$this->db->reset_query();
		$del = $this->db->delete('tbl_skp', array('idtbl_skp' => $skpid));
		if ($del) {
			return true;
		}else{
			return false;
		}
	}
}
