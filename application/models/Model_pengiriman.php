<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengiriman extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_pengiriman($p = null, $par = null, $var = null){
		if ($par != null && $var != null) {
			if($p != null){
				$this->db->order_by('idtbl_pengiriman','desc');
				$q = $this->db->get_where('view_pengiriman_skp_terbit',array('status_pengiriman'=>$p, $par=>$var,'status_skp <>'=>'deleted'));
			}else{
				$this->db->order_by('idtbl_pengiriman','desc');
				$q = $this->db->get('view_pengiriman_skp_terbit', array($par=>$var));
			}
		}else{
			if($p != null){
				$this->db->order_by('idtbl_pengiriman','desc');
				$q = $this->db->get_where('view_pengiriman_skp_terbit',array('status_pengiriman'=>$p,'status_skp <>'=>'deleted'));
			}else{
				$this->db->order_by('idtbl_pengiriman','desc');
				$q = $this->db->get('view_pengiriman_skp_terbit');
			}
		}
		return $q->result_array();
	}

	function _insert_pengiriman($data){
		$q = $this->db->insert('tbl_pengiriman',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_pengiriman($id, $data){
		$this->db->where('idtbl_pengiriman',$id);
		$q = $this->db->update('tbl_pengiriman', $data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_pengiriman($id){
		$this->db->where('idtbl_pengiriman',$id);
		$q = $this->db->delete('tbl_pengiriman');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	/*
		perform soft delete mechanism to prevent data inconsistency
	*/
	function _soft_delete_pengiriman($id){
		$this->db->where('idtbl_pengiriman',$id);
		$q = $this->db->update('tbl_pengiriman',array('status_pengiriman'=>'2'));
		if($q){
			return true;
		}else{
			return false;
		}
	}

}
