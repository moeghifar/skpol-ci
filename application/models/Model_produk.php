<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_produk extends CI_Model {

	public function __construct(){
		parent::__construct();

	}

	function _get_produk($p = null, $id = null){
		if($p != null && $id != null){
			$this->db->order_by('idtbl_produk','desc');
			$q = $this->db->get_where('tbl_produk',array('status_produk'=>$p,'idtbl_produk'=>$id));
		}elseif($p != null){
			$this->db->order_by('idtbl_produk','desc');
			$q = $this->db->get_where('tbl_produk',array('status_produk'=>$p));
		}elseif($id != null){
			$this->db->order_by('idtbl_produk','desc');
			$q = $this->db->get_where('tbl_produk',array('idtbl_produk'=>$id));
		} else {
			$this->db->order_by('idtbl_produk','desc');
			$q = $this->db->get('tbl_produk');
		}
		return $q->result_array();
	}

	function _insert_produk($data){
		$q = $this->db->insert('tbl_produk',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _update_produk($id,$data){
		$this->db->where('idtbl_produk',$id);
		$q = $this->db->update('tbl_produk',$data);
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _confirm_produk($id){
		$this->db->where('idtbl_produk',$id);
		$q = $this->db->update('tbl_produk',array('status_produk'=>'1'));
		if($q){
			return true;
		}else{
			return false;
		}
	}

	function _delete_produk($id){
		$this->db->where('idtbl_produk',$id);
		$q = $this->db->delete('tbl_produk');
		if($q){
			return true;
		}else{
			return false;
		}
	}

	/*
		perform soft delete mechanism to prevent data inconsistency
	*/
	function _soft_delete_produk($id){
		$this->db->where('idtbl_produk',$id);
		$q = $this->db->update('tbl_produk',array('status_produk'=>'2'));
		if($q){
			return true;
		}else{
			return false;
		}
	}

}
