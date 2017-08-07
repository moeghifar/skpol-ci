<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('model_produk');
    }

	public function view_produk_list()
	{
        // session restriction
		$this->_session_restrict(array('kp','dinas'));
		$data['page_title'] = 'Produk Terdaftar';
		$data['produk']		= $this->model_produk->_get_produk("1");
		$data['content'] 	= 'pages_content/produk/view_produk_list';
        $this->load->view('index',$data);
	}
	public function view_approval_produk()
	{
		// session restriction
		$this->_session_restrict(array('kp'));
		$data['page_title'] = 'Pengajuan Produk Baru';
		$data['produk']		= $this->model_produk->_get_produk("0");
		$data['content'] = 'pages_content/produk/view_approval_produk';
        $this->load->view('index',$data);
	}

	public function action_add_product(){
        // session restriction
		$this->_session_restrict(array('kp','dinas'));
		if( $this->input->post('submit') != NULL ){
			$param = array(
				'idtbl_produk'			=> '',
				'kategori_produk'		=> $this->input->post('kategori_produk'),
				'namaind_produk'		=> $this->input->post('nama_produk'),
				'namaen_produk'			=> $this->input->post('product_name'),
				'status_produk'			=> '0'
			);
			if($this->model_produk->_insert_produk($param)){
				$this->nyast->notif_create_notification('Produk Berhasil Diajukan, Silahkan Tunggu Approval dari Kantor Pusat','Pengajuan Berhasil');
				redirect(site_url('produk/view_produk_list'));
			}
		}
	}

	public function confirm_product($id){
        // session restriction
		$this->_session_restrict(array('kp'));
		if($this->model_produk->_update_produk($id)){
			$this->nyast->notif_create_notification('Produk Berhasil Ditambahkan','Konfirmasi Berhasil');
			redirect(site_url('produk/view_approval_produk'));
		}

	}

	public function delete_product($id){
        // session restriction
		$this->_session_restrict(array('kp'));
		if($this->model_produk->_delete_produk($id)){
			$this->nyast->notif_create_notification('Produk Tidak Ditambahkan','Produk Ditolak');
			redirect(site_url('produk/view_approval_produk'));
		}

	}
	public function delete_current_product($id){
        // session restriction
		$this->_session_restrict(array('kp'));
		if($this->model_produk->_soft_delete_produk($id)){
			$this->nyast->notif_create_notification('Data Produk Telah Dihapus','Hapus Berhasil');
			redirect(site_url('produk/view_produk_list'));
		}

	}


}
