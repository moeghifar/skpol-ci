<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_pengiriman');
        $this->load->model('model_upi');
        $this->load->model('model_skp');
        $sess = $this->session->userdata($this->session_prefix.'-userlevel');
    }

    public function pengiriman_skp_terbit()
    {
    	if ($this->session->userdata($this->session_prefix.'-userlevel') == 'kp' || $this->session->userdata($this->session_prefix.'-userlevel') == 'admin'){
    		$data['page_title'] = 'Daftar Pengiriman SKP Terbit';
    		$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp');
    		$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_kp';
    		$this->load->view('index',$data);
    	}else{
    		$this->show404();
    	}
    }

	public function view_pengiriman_list()
	{
		$data['page_title'] = 'Daftar Pengiriman SKP';
		if ($this->session->userdata($this->session_prefix.'-userlevel') == 'upi') {
			$data['pengiriman']		= $this->model_pengiriman->_get_pengiriman(1, 'id_user' ,$this->session->userdata($this->session_prefix.'-userid'));
			$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_list';
		}elseif ($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas') {
			$data['pengiriman']		= $this->model_pengiriman->_get_pengiriman(1, 'kode_provinsi' ,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
			$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_list';
		}else{
			$data['pengiriman']		= $this->model_pengiriman->_get_pengiriman(1);
			$data['upi']		= $this->model_upi->_get_upi_terdaftar();
			$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_list';
		}
        $this->load->view('index',$data);
	}

	public function action_add_pengiriman(){
		if ($this->session->userdata($this->session_prefix.'-userlevel') == 'kp' || $this->session->userdata($this->session_prefix.'-userlevel') == 'admin') {
			if( $this->input->post('submit') != NULL ){
				foreach($this->input->post('kirim') as $k){
					$param = array(
						'kurir_pengiriman'		=> $this->input->post('kurir'),
						'tgl_pengiriman'		=> $this->input->post('tanggal'),
						'resi_pengiriman'		=> $this->input->post('resi'),
						'alamat_pengiriman'		=> $this->input->post('alamat'),
						'skpterbit_id'			=> $k,
						'keterangan_pengiriman'	=> $this->input->post('keterangan'),
						'status_pengiriman'		=> '1'
					);
					$this->model_pengiriman->_insert_pengiriman($param);
				}
				$this->nyast->notif_create_notification('Pengiriman Berhasil Ditambahkan','Penambahan Berhasil');
				redirect(site_url('pengiriman/pengiriman_skp_terbit'));
			}else{
				$this->show404();
			}
		}else{
			$this->show404();
		}
	}

	public function delete_pengiriman($id){
		if($this->model_pengiriman->_soft_delete_pengiriman($id)){
			$this->nyast->notif_create_notification('Pengiriman Berhasil Dihapus','Data Dihapus');
			redirect(site_url('pengiriman/view_pengiriman_list'));
		}

	}

	public function detail_pengiriman($id)
	{
		$data['page_title'] = 'Detail Pengiriman SKP Terbit';
		$data['pengiriman']		= $this->model_pengiriman->_get_pengiriman(1, 'idtbl_pengiriman', $id);
		$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_detail';
    	$this->load->view('index',$data);
	}

	public function edit_pengiriman($id)
	{
		$data['page_title'] = 'Update Pengiriman SKP Terbit';
		$data['pengiriman']		= $this->model_pengiriman->_get_pengiriman(1, 'idtbl_pengiriman', $id);
		$data['content'] 	= 'pages_content/pengiriman/view_pengiriman_edit';
    	$this->load->view('index',$data);
	}

	public function action_edit_pengiriman()
	{
		if ($this->session->userdata($this->session_prefix.'-userlevel') == 'kp' || $this->session->userdata($this->session_prefix.'-userlevel') == 'admin') {
			if( $this->input->post('submit') != NULL ){
				$idskp = $this->input->post('idpengiriman');
				$data = array(
						'kurir_pengiriman'		=> $this->input->post('kurir'),
						'tgl_pengiriman'		=> $this->input->post('tanggal'),
						'resi_pengiriman'		=> $this->input->post('resi'),
						'alamat_pengiriman'		=> $this->input->post('alamat'),
						'keterangan_pengiriman'	=> $this->input->post('info')
					);
				if ($this->model_pengiriman->_update_pengiriman($idskp, $data)) {
					$this->nyast->notif_create_notification('Pengiriman Berhasil Dirubah','Data Dirubah');
					redirect(site_url('pengiriman/view_pengiriman_list'));
				}else{
					$this->nyast->notif_create_notification('Pengiriman Gagal Dirubah','Gagal');
					redirect(site_url('pengiriman/view_pengiriman_list'));
				}
			}
		}else{
			$this->show404();
		}
	}
}
