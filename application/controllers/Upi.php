<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upi extends MY_Controller {

    function __construct(){
        parent::__construct();
		$this->load->model('model_upi');
		$this->level = $this->session->userdata($this->session_prefix.'-userlevel');
    }

    public function index() {
		$this->show404();
	}

	public function filing_list(){
        // strict session page
        $this->_session_restrict(array('kp', 'dinas'));
    	$data['page_title'] = 'Daftar Pengajuan UPI Baru';
    	if($this->level=='dinas'){
    		$data['upi']		= $this->model_upi->_get_upi_baru(null,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
    	}else{
    		$data['upi']		= $this->model_upi->_get_upi_baru();
    	}
	    $data['content'] = 'pages_content/upi/view_filing_list';
	    $this->load->view('index',$data);
    }

	public function confirm_upi(){
		if(null!=$this->input->post('submit')){
			if(null==$this->input->post('id_register_upi')){
				$id_upi = $this->input->post('id_upi');
				if(null!=$this->input->post('alasan')){
					$data['alasan'] = array(
						'alasan'		=> $this->input->post('alasan'),
						'revisi'		=> ''
					);
					$this->model_upi->_update_rejected($id_upi,$data['alasan']);
					$this->nyast->notif_create_notification('Update notifikasi perbaikan data upi berhasil','Konfirmasi Berhasil');
					redirect(site_url('upi/view_upi_revisi'));
				}else{
					// hapus rejected
					$this->model_upi->_delete_rejected($id_upi);
					$this->nyast->notif_create_notification('UPI Sudah Terdaftar dan Aktif','Konfirmasi Berhasil');
					redirect(site_url('upi/view_upi_revisi'));
				}
			} else {
				// get table from view_user_register_upi & prepare for tbl_upi input
				$regUpi			= $this->model_upi->_get_upi_baru($this->input->post('id_register_upi'));
				$data['upi'] 	= array(
					'nama_upi'				=> $regUpi[0]['nama_upi'],
					'pemilik_upi'			=> $regUpi[0]['pemilik_upi'],
					'penanggungjawab_upi'	=> $regUpi[0]['penanggungjawab_upi'],
					'alamat_upi'			=> $regUpi[0]['alamat_upi'],
					'alamat_pabrik'			=> $regUpi[0]['alamat_pabrik'],
					'kodepos_upi'			=> $regUpi[0]['kodepos_upi'],
					'entitas_upi'			=> $regUpi[0]['entitas_upi'],
					'provinsi_upi'			=> $regUpi[0]['provinsi_upi'],
					'kabupaten_upi'			=> $regUpi[0]['kabupaten_upi'],
					'kecamatan_upi'			=> $regUpi[0]['kecamatan_upi'],
					'desa_upi'				=> $regUpi[0]['desa_upi'],
					'email_upi'				=> $regUpi[0]['email_upi'],
					'kontak_upi'			=> $regUpi[0]['kontak_upi'],
					'kontakperson_upi'		=> $regUpi[0]['kontakperson_upi'],
					'omzet_upi'				=> $regUpi[0]['omzet_upi'],
					'tahunmulai_upi'		=> $regUpi[0]['tahunmulai_upi'],
					'nosiup_upi'			=> $regUpi[0]['nosiup_upi'],
					'noiup_upi'				=> $regUpi[0]['noiup_upi'],
					'noakta_upi'			=> $regUpi[0]['noakta_upi'],
					'filesiup_upi'			=> $regUpi[0]['filesiup_upi'],
					'fileiup_upi'			=> $regUpi[0]['fileiup_upi'],
					'fileakta_upi'			=> $regUpi[0]['fileakta_upi'],
					'nonpwp_upi'			=> $regUpi[0]['nonpwp_upi'],
					'registration_date'		=> $regUpi[0]['registration_date'],
					'jenis_upi'				=> $this->input->post('jenis_upi'),
					'skala_upi'				=> $this->input->post('skala_upi'),
					'user_id'				=> $regUpi[0]['user_id']
				);
				// insert data upi
				$this->model_upi->_insert_upi($data['upi']);
				// update user login status
				$idupi = $this->db->insert_id();

				$this->model_upi->_update_user($regUpi[0]['user_id']);
				// delete reg upi
				$this->model_upi->_delete_reg_upi($regUpi[0]['idtbl_upi']);

				// if revisi data upi
				if(null!=$this->input->post('alasan')){
					$data['alasan'] = array(
						'id_rejected' 	=> '',
						'alasan'		=> $this->input->post('alasan'),
						'upi_id'		=> $idupi
					);
					$this->model_upi->_insert_rejected($data['alasan']);
					// perform send email notif
					$this->nyast->notif_create_notification('Update notifikasi perbaikan data UPI berhasil','Konfirmasi Berhasil');
					redirect(site_url('upi/filing_list'));
				}else{
					// send email message
					$conf = array(
						'subject' 	=> 'Notifikasi Konfirmasi Pendaftaran SKP - Online',
						'message' 	=> 'Selamat, akun SKP - Online anda sudah dikonfirmasi. Anda sudah dapat melakukan login, dan mengajukan perizinan SKP melalui link berikut : http://skp-pdspkp.kkp.go.id/skp-online',
						'from'		=> 'skpolp2hp@gmail.com',
						'to'		=> $regUpi[0]['email_upi']
					);
					$this->_send_email($conf);
					// perform send email notif
					$this->nyast->notif_create_notification('UPI Sudah Terdaftar dan Aktif','Konfirmasi Berhasil');
					redirect(site_url('upi/filing_list'));
				}
			}
		}else{
			// show error
			$this->show404();
		}
	}

    public function filing_detail($id){
    	$data['page_title'] = 'Pendaftaran UPI Detail';
		$data['upi']		= $this->model_upi->_get_upi_baru($id);
	    $data['content'] = 'pages_content/upi/view_filing_detail';
	    $this->load->view('index',$data);
    }

	public function edit_detail($id = null)
	{
		$data['page_title'] = 'Edit Detail UPI';
		if ($id!=null) {
            if($this->level == 'upi') {
                redirect(site_url('upi/edit_detail'));
            }
			$data['upi']	= $this->model_upi->_get_upi_detail($id);
		}else{
			if($this->level == 'upi'){
                if($this->global_alert != ""){
                    $data['upi']       = $this->model_upi->_get_upi_revisi($this->session->userdata($this->session_prefix.'-upiid'));
                } else {
                    $data['upi']	   = $this->model_upi->_get_upi_detail($this->session->userdata($this->session_prefix.'-upiid'));
                }
			}else{
				$this->show404();
			}
		}
        if($this->global_alert != ""){
            $data['confirmed']  = false;
        }else{
            $data['confirmed']  = true;
		}
        $data['js']         = 'template/javascript/backend/ajax.upload.js';
		$data['provinsi']	= $this->model_upi->_get_provinsi();
		$data['content']	= 'pages_content/upi/view_edit_detail';
        $this->load->view('index',$data);
	}

	public function view_upi_revisi(){
		$data['page_title'] = 'Daftar UPI Perlu Revisi';
		if($this->level=='dinas'){
    		$data['upi']		= $this->model_upi->_get_upi_revisi(null,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
    	}else{
    		$data['upi']		= $this->model_upi->_get_upi_revisi();
    	}
		$data['content'] 	= 'pages_content/upi/view_upi_revisi';
        $this->load->view('index',$data);
	}

    public function view_detail_revisi($id)
	{
		$data['page_title'] = 'Detail UPI Revisi';
        if($this->level=='dinas'){
    		$data['upi']		= $this->model_upi->_get_upi_revisi($id,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
    	}else{
    		$data['upi']		= $this->model_upi->_get_upi_revisi($id);
    	}
		$data['content'] = 'pages_content/upi/view_upi_detail';
        $data['prev_page'] = site_url('upi/view_upi_revisi');
        $this->load->view('index',$data);
	}

	public function view_list()
	{
		$data['page_title'] = 'List UPI Terdaftar';
		if($this->level=='dinas'){
    		$data['upi']		= $this->model_upi->_get_upi_detail(null,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
    	}else{
    		$data['upi']		= $this->model_upi->_get_upi_terdaftar();
		}
		$data['content'] 	= 'pages_content/upi/view_upi';
        $this->load->view('index',$data);
	}

	public function view_detail($id)
	{
		$data['page_title'] = 'Detail UPI';
		$data['upi']		= $this->model_upi->_get_upi_detail($id);
		$data['content'] = 'pages_content/upi/view_upi_detail';
        $data['prev_page'] = site_url('upi/view_list');
        $this->load->view('index',$data);
	}

	public function action_update_upi(){
		if( $this->input->post('submit') != NULL ){
            // DEBUG ONLY !!!!
            // $data['npwp'] = $this->input->post('file_name_npwp');
            // $data['iup'] = $this->input->post('file_name_iup');
            // $data['siup'] = $this->input->post('file_name_siup');
            // $data['akta'] = $this->input->post('file_name_akta');
            // $data['idupi'] = $this->input->post('idupi');
            // var_dump($data);
            $idupi = $this->input->post('idupi');
			// building data
			$data['upi'] = array(
				'nama_upi'			=> strtoupper($this->input->post('nama')),
				'pemilik_upi'		=> $this->input->post('pemilik'),
				'penanggungjawab_upi'=> $this->input->post('penanggungjawab'),
				'alamat_upi'		=> $this->input->post('alamat'),
				'alamat_pabrik'		=> $this->input->post('alamat_pabrik'),
				'kontak_upi'		=> $this->input->post('kontak'),
				'kontakperson_upi'	=> $this->input->post('kontakperson'),
				'kodepos_upi'		=> $this->input->post('kodepos'),
				'entitas_upi'		=> $this->input->post('entitas'),
				'provinsi_upi'		=> $this->input->post('provinsi'),
				'kabupaten_upi'		=> $this->input->post('kabupaten'),
				'kecamatan_upi'		=> $this->input->post('kecamatan'),
				'desa_upi'			=> $this->input->post('desa'),
				'omzet_upi'			=> $this->input->post('omzet'),
				'tahunmulai_upi'	=> $this->input->post('tahunmulai'),
				'nonpwp_upi'		=> $this->input->post('nonpwp'),
				'nosiup_upi'		=> $this->input->post('nosiup'),
				'noiup_upi'			=> $this->input->post('noiup'),
				'noakta_upi'		=> $this->input->post('noakta')
			);
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			$config['overwrite']            = true;
            $config['max_size']             = 0; // unlimited file upload
			$this->load->library('upload', $config);
			$fileData = array();
			if($this->input->post('file_name_akta')!=null){
				// upload file and replace
				$config['upload_path'] = './file/upi/file_akta';
				$config['file_name'] = str_replace(array('/','.'),'-',$this->input->post('nama')).'-'.str_replace(array('/','.'),'',$this->input->post('noakta'));
				$this->upload->initialize($config);
				if($this->upload->do_upload('file_akta')){
					$fileData['akta'] = $this->upload->data();
                    // remove old data if new data uploaded
    				$pathAkta = '.'.$this->input->post('old_akta_path');
    				if(file_exists($pathAkta)){
                        // implement `@` to prevent error if linked data doesn't exists
    					@unlink($pathAkta);
					}
    				$data['upi']['fileakta_upi'] = '/file/upi/file_akta/'.$fileData['akta']['file_name'];
            	} else {
                    $extraError = $this->upload->display_errors();
                    $this->nyast->notif_create_notification('Detail Gagal Dirubah \n'.$extraError,'Gagal');
    				redirect(site_url('upi/edit_detail/'));
                }
			}
			if($this->input->post('file_name_iup')!=null){
				// upload file and replace
				$config['upload_path'] = './file/upi/file_iup';
				$config['file_name'] = str_replace(array('/','.'),'-',$this->input->post('nama')).'-'.str_replace(array('/','.'),'',$this->input->post('noiup'));
				$this->upload->initialize($config);
				if($this->upload->do_upload('file_iup')){
					$fileData['iup'] = $this->upload->data();
                    // remove old data
    				$pathIup = '.'.$this->input->post('old_iup_path');
    				if(file_exists($pathIup)){
                        // implement `@` to prevent error if linked data doesn't exists
    					@unlink($pathIup);
    				}
    				$data['upi']['fileiup_upi'] = '/file/upi/file_iup/'.$fileData['iup']['file_name'];
                } else {
                    $extraError = $this->upload->display_errors();
                    $this->nyast->notif_create_notification('Detail Gagal Dirubah \n'.$extraError,'Gagal');
    				redirect(site_url('upi/edit_detail/'.$idupi));
                }
			}
			if($this->input->post('file_name_siup')!=null){
				// upload file and replace
				$config['upload_path'] = './file/upi/file_siup';
				$config['file_name'] = str_replace(array('/','.'),'-',$this->input->post('nama')).'-'.str_replace(array('/','.'),'',$this->input->post('nosiup'));
                $this->upload->initialize($config);
				if($this->upload->do_upload('file_siup')){
					$fileData['siup'] = $this->upload->data();
                    // remove old data
    				$pathSiup = '.'.$this->input->post('old_siup_path');
    				if(file_exists($pathSiup)){
                        // implement `@` to prevent error if linked data doesn't exists
    					@unlink($pathSiup);
    				}
    				$data['upi']['filesiup_upi'] = '/file/upi/file_siup/'.$fileData['siup']['file_name'];
                } else {
                    $extraError = $this->upload->display_errors();
                    $this->nyast->notif_create_notification('Detail Gagal Dirubah \n'.$extraError,'Gagal');
    				redirect(site_url('upi/edit_detail/'.$idupi));
                }
			}
			if($this->input->post('file_name_npwp')!=null){
				// upload file and replace
				$config['upload_path'] = './file/upi/file_npwp';
				$config['file_name'] = str_replace(array('/','.'),'-',$this->input->post('nama')).'-'.str_replace(array('/','.'),'',preg_replace("/[^A-Za-z0-9]/", '', $this->input->post('nonpwp')));
                $this->upload->initialize($config);
				if($this->upload->do_upload('file_npwp')){
					$fileData['npwp'] = $this->upload->data();
                    // remove old data
    				$pathNpwp = '.'.$this->input->post('old_npwp_path');
    				if(file_exists($pathNpwp)){
                        // implement `@` to prevent error if linked data doesn't exists
    					@unlink($pathNpwp);
    				}
    				$data['upi']['filenpwp_upi'] = '/file/upi/file_npwp/'.$fileData['npwp']['file_name'];
                } else {
                    $extraError = $this->upload->display_errors();
                    $this->nyast->notif_create_notification('Detail Gagal Dirubah \n'.$extraError,'Gagal');
    				redirect(site_url('upi/edit_detail/'.$idupi));
                }
			}
			if(null != $this->input->post('revisi')){
				$data['revisi']=array(
					'revisi'	=> $this->input->post('revisi')
				);
				$this->model_upi->_update_revisi($this->input->post('idupi'),$data['revisi']);
			}
			if ($this->model_upi->_update_upi($this->input->post('idupi'),$data['upi'])) {
				$this->nyast->notif_create_notification('Data Berhasil Dirubah','Berhasil');
				redirect(site_url('upi/edit_detail/'.$idupi));
			}else {
				$this->nyast->notif_create_notification('Detail Gagal Dirubah','Gagal');
				redirect(site_url('upi/edit_detail/'.$idupi));
			}
		}else{
			redirect(site_url());
		}
	}

    public function action_delete_upi($id) {
        // check if id is valid integer
        if ($id != null && is_numeric($id) && $id > 0) {
            // delete from get user_id from tbl_register_upi
            $result = $this->model_upi->_get_upi_detail($id);
            // remove data from register upi
            $paths[] = '.'.$result[0]['filesiup_upi'];
            $paths[] = '.'.$result[0]['fileakta_upi'];
            $paths[] = '.'.$result[0]['fileiup_upi'];
            $paths[] = '.'.$result[0]['filektp_upi'];
            $paths[] = '.'.$result[0]['filenpwp_upi'];
            $paths[] = '.'.$result[0]['filesewamenyewa_upi'];
            $paths[] = '.'.$result[0]['filesertifikatpengolahikan_upi'];
            $paths[] = '.'.$result[0]['filesptpajak_upi'];
            // remove file if exists
            foreach($paths as $v) {
                if(file_exists($v)){
                    // implement `@` to prevent error if linked data doesn't exists
                    @unlink($v);
                }
            }
            $user_id = $result[0]['user_id'];
            // delete from tbl_user
            $this->model_upi->_delete_register_user($user_id);
            // delete from tbl_register_upi
            $this->model_upi->_delete_reg_upi($id);
            $this->nyast->notif_create_notification('Data UPI Telah Dihapus','Hapus Berhasil');
            redirect(site_url('upi/view_list'));
        }
    }
}
