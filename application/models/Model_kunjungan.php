<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kunjungan extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_kunjungan_upi($status, $idupi){
		$q = $this->db->get_where('view_skp_kunjungan',array('status_kunjungan'=>$status,'idtbl_upi'=>$idupi));
		return $q->result_array();
	}

	function _get_kunjungan($status=null, $uker, $idskp = null){
		$kodeProv = $this->session->userdata($this->session_prefix.'-userkodeprovinsi');
		$this->db->order_by('date_updated desc','idtbl_kunjungan desc');
		if ($idskp != null) {
			if($status == ''){
				if($uker == 'dinas'){
					$this->db->where("(status_skp = 'temuan-kunjungan-dinas' OR status_skp = 'menunggu-persetujuan-perbaikan-dinas') AND uker_kunjungan = '$uker' AND kode_provinsi = '$kodeProv' AND idtbl_skp = '$idskp'");
					$q = $this->db->get('view_skp_kunjungan');
				}else{
					$this->db->where("(status_skp != 'penerbitan-skp' AND status_skp != 'terbit-skp') AND status_kunjungan != 'Penjadwalan' AND uker_kunjungan = '$uker' AND idtbl_skp = '$idskp'");
					$q = $this->db->get('view_skp_kunjungan');
				}
			}else{
				if($uker == 'dinas'){
					$q = $this->db->get_where('view_skp_kunjungan',array('status_kunjungan'=>$status,'uker_kunjungan'=>$uker,'kode_provinsi'=>$this->session->userdata($this->session_prefix.'-userkodeprovinsi'), 'idtbl_skp'=>$idskp));
				}else{
					$q = $this->db->get_where('view_skp_kunjungan',array('status_kunjungan'=>$status,'uker_kunjungan'=>$uker,'idtbl_skp'=>$idskp));
				}
			}
		}else{
			if($status == ''){
				if($uker == 'dinas'){
					$this->db->where("(status_skp = 'temuan-kunjungan-dinas' OR status_skp = 'menunggu-persetujuan-perbaikan-dinas') AND uker_kunjungan = '$uker' AND kode_provinsi = '$kodeProv'");
					$q = $this->db->get('view_skp_kunjungan');
				}else{
					$this->db->where("(status_skp != 'penerbitan-skp' AND status_skp != 'terbit-skp') AND status_kunjungan != 'Penjadwalan' AND uker_kunjungan = '$uker'");
					$q = $this->db->get('view_skp_kunjungan');
				}
			}else{
				if($uker == 'dinas'){
					$q = $this->db->get_where('view_skp_kunjungan',array('status_kunjungan'=>$status,'uker_kunjungan'=>$uker,'kode_provinsi'=>$this->session->userdata($this->session_prefix.'-userkodeprovinsi')));
				}else{
					$q = $this->db->get_where('view_skp_kunjungan',array('status_kunjungan'=>$status,'uker_kunjungan'=>$uker));
				}
			}
		}
		return $q->result_array();
	}

	function _insert_kunjungan($data){
		$data['date_updated'] = 'NOW()';
		$q = $this->db->insert('tbl_kunjungan',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_kunjungan($dt,$idskp,$idkunjungan){
		$dt['date_updated'] = 'NOW()';
		$this->db->where(array('skp_id'=>$idskp,'idtbl_kunjungan'=>$idkunjungan));
		$q = $this->db->update('tbl_kunjungan',$dt);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _get_uker($id){
		$this->db->select('uker_kunjungan');
		$q = $this->db->get_where("tbl_kunjungan",array('idtbl_kunjungan' => $id));
		return $q->result_array();
	}

}
