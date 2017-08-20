<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends MY_Controller {

	public $level;

	function __construct(){
		parent::__construct();
		$this->load->model('model_kunjungan');
		$this->load->model('model_skp');
		$this->level = $this->session->userdata($this->session_prefix.'-userlevel');
	}

	public function tindak_lanjut()
	{
		$data['page_title'] = 'Tindak Lanjut Temuan';
		$data['content'] = 'pages_content/skp/view_tindak_lanjut';
		$data['skpdata'] = $this->model_kunjungan->_get_kunjungan_upi('Menunggu Perbaikan',$this->session->userdata($this->session_prefix.'-upiid'));
		$this->load->view('index',$data);
	}

	function action_tindak_lanjut(){
		if(null!=$this->input->post('submit')){
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			//$config['max_size']             = 25000;
			$config['overwrite']            = 1;
			$config['upload_path'] = './file/perbaikan';
			$config['file_name'] = 'perbaikan-'.date('y-m-d--his');
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file_perbaikan')){
				$fileData	= $this->upload->data();
				foreach($this->input->post('perbaikan') as $k){
					$ke 			= explode('_',$k);
					$idskp 			= $ke[0];
					$idkunjungan 	= $ke[1];

					$pathPerbaikan = '.'.$ke[2];
					if (file_exists($pathPerbaikan)) {
						@unlink($pathPerbaikan);
					}
					$dt = array(
						'perbaikan_kunjungan'	=> '/file/perbaikan/'.$fileData['file_name'],
						'status_kunjungan'	=> 'Menunggu Persetujuan Pembina Mutu'
					);
					// update kunjungan
					$this->model_kunjungan->_update_kunjungan($dt,$idskp,$idkunjungan);

					$getUker = $this->model_kunjungan->_get_uker($idkunjungan);

					if($getUker[0]['uker_kunjungan'] == 'kp'){
						// create skp log
						$this->model_skp->_create_skp_log('Menunggu Persetujuan Pembina Mutu Pusat',$idskp);
						// update main skp status
						$this->model_skp->_update_skp_status(array('status_skp' => 'menunggu-persetujuan-perbaikan-kp'),$idskp);
					}elseif($getUker[0]['uker_kunjungan'] == 'dinas'){
						// create skp log
						$this->model_skp->_create_skp_log('Menunggu Persetujuan Pembina Mutu Dinas',$idskp);
						// update main skp status
						$this->model_skp->_update_skp_status(array('status_skp' => 'menunggu-persetujuan-perbaikan-dinas'),$idskp);
					}
				}
				// perform redirect with notification
				$this->nyast->notif_create_notification('Upload File Perbaikan Berhasil','Selamat');
				redirect(site_url('kunjungan/tindak_lanjut'));
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Upload File Perbaikan Gagal');
				redirect(site_url('kunjungan/tindak_lanjut'));
			}
		}else{
			$this->show404();
		}
	}

	public function kunjungan_list()
	{
		$data['page_title'] = 'Daftar Pembinaan';
		$data['content'] = 'pages_content/skp/view_kunjungan_list';
		if($this->level == 'dinas'){
			$data['jadwal'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','dinas');
		}elseif($this->level == 'kp'){
			$data['jadwal'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','kp');
		}else{
			$data['jadwal'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','');
		}
		$this->load->view('index',$data);
	}

	public function kunjungan_detail($idskp)
	{
		$data['page_title'] = 'Detail Kunjungan';
		$data['content'] = 'pages_content/skp/view_kunjungan_detail';
		if($this->level == 'dinas'){
			$data['skp'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','dinas',$idskp);
		}elseif($this->level == 'kp'){
			$data['skp'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','kp',$idskp);
		}else{
			$data['skp'] = $this->model_kunjungan->_get_kunjungan('Penjadwalan','',$idskp);
		}
		$this->load->view('index',$data);
	}

	function action_kunjungan_selesai(){
		if(null!=$this->input->post('submit')){
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			//$config['max_size']             = 25000;
			$config['overwrite']            = 1;
			$config['upload_path'] = './file/temuan';
			$config['file_name'] = 'temuan-'.date('y-m-d--his');
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file_temuan')){
				$fileData	= $this->upload->data();
				foreach($this->input->post('terjadwal') as $k){
					$ke 			= explode('-',$k);
					$idskp 			= $ke[0];
					$idkunjungan 	= $ke[1];
					$dt = array(
						'temuan_kunjungan'	=> '/file/temuan/'.$fileData['file_name'],
						'pic_kunjungan'		=> $this->input->post('pic_kunjungan'),
						'status_kunjungan'	=> 'Menunggu Perbaikan'
					);
					// update kunjungan
					$this->model_kunjungan->_update_kunjungan($dt,$idskp,$idkunjungan);
					// create skp log
					$this->model_skp->_create_skp_log('Perbaikan Pembinaan Dinas',$idskp);
					// update main skp status
					$dtskp = array(
						'status_skp'	=> 'temuan-kunjungan-dinas'
					);
					$this->model_skp->_update_skp_status($dtskp,$idskp);
				}
				// perform redirect with notification
				$this->nyast->notif_create_notification('Upload Temuan Berhasil','Selamat');
				redirect(site_url('kunjungan/kunjungan_list'));
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Upload Temuan Gagal');
				redirect(site_url('kunjungan/kunjungan_list'));
			}
		}else{
			$this->show404();
		}
	}

	function action_supervisi_selesai(){
		if(null!=$this->input->post('submit')){
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			//$config['max_size']             = 25000;
			$config['overwrite']            = 1;
			$config['upload_path'] = './file/temuan';
			$config['file_name'] = 'temuan-'.date('y-m-d--his');
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file_temuan')){
				$fileData	= $this->upload->data();
				foreach($this->input->post('terjadwal') as $k){
					$ke 			= explode('-',$k);
					$idskp 			= $ke[0];
					$idkunjungan 	= $ke[1];
					$dt = array(
						'temuan_kunjungan'	=> '/file/temuan/'.$fileData['file_name'],
						'pic_kunjungan'		=> $this->input->post('pic_kunjungan'),
						'status_kunjungan'	=> 'Menunggu Perbaikan'
					);
					// update kunjungan
					$this->model_kunjungan->_update_kunjungan($dt,$idskp,$idkunjungan);
					// create skp log
					$this->model_skp->_create_skp_log('Perbaikan Supervisi Kantor Pusat',$idskp);
					// update main skp status
					$dtskp = array(
						'status_skp'	=> 'temuan-supervisi-kp'
					);
					$this->model_skp->_update_skp_status($dtskp,$idskp);
				}
				// perform redirect with notification
				$this->nyast->notif_create_notification('Upload Temuan Berhasil','Selamat');
				redirect(site_url('kunjungan/kunjungan_list'));
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Upload Temuan Gagal');
				redirect(site_url('kunjungan/kunjungan_list'));
			}
		}else{
			$this->show404();
		}
	}

	public function perbaikan_detail($idskp)
	{
		$data['page_title'] = 'Informasi Detail Temuan';
		$data['content'] = 'pages_content/skp/view_perbaikan_detail';
		if($this->level == 'dinas'){
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','dinas',$idskp);
		}elseif($this->level == 'kp'){
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','kp',$idskp);
		}else{
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','',$idskp);
		}
		$this->load->view('index',$data);
	}

	public function perbaikan_edit($idskp)
	{
		$data['page_title'] = 'Informasi Detail Temuan';
		$data['content'] = 'pages_content/skp/view_perbaikan_edit';
		if($this->level == 'dinas'){
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','dinas',$idskp);
		}elseif($this->level == 'kp'){
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','kp',$idskp);
		}else{
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','',$idskp);
		}
		$this->load->view('index',$data);
	}

	function action_perbaikan_edit(){
		if( $this->input->post('submit') != NULL ){
			$idskp = $this->input->post('idskp');
			$idkunjungan = $this->input->post('idkunjungan');
			$data['kunjungan'] = array(
				'pic_kunjungan'		=> $this->input->post('pic_kunjungan'),
				'tgl_kunjungan'		=> $this->input->post('tanggal_kunjungan'),
				'status_kunjungan'	=> 'Menunggu Perbaikan'
			);
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			$config['overwrite']            = 1;
            $config['max_size']             = 0; // unlimited file upload
			$this->load->library('upload', $config);
			// $fileData = array();
			if($this->input->post('file_name_temuan')!=null){
				// upload file and replace
				$config['upload_path'] = './file/temuan';
				$config['file_name'] = 'temuan-'.date('y-m-d--his');
				$this->upload->initialize($config);
				if($this->upload->do_upload('file_temuan')){
					$fileData['temuan_kunjungan'] = $this->upload->data();
                    // remove old data if new data uploaded
    				$pathTemuan = '.'.$this->input->post('old_temuan_path');
    				if(file_exists($pathTemuan)){
                        // implement `@` to prevent error if linked data doesn't exists
    					@unlink($pathTemuan);
    				}
    				$data['kunjungan']['temuan_kunjungan'] = '/file/temuan/'.$fileData['temuan_kunjungan']['file_name'];

    				// $this->nyast->notif_create_notification('Upload Temuan Berhasil','Selamat');
					// redirect(site_url('kunjungan/approval_list'));

                	$this->model_skp->_create_skp_log('Revisi Perbaikan',$idskp);
            	} else {
                    $extraError = $this->upload->display_errors();
                    $this->nyast->notif_create_notification('Detail Gagal Dirubah \n'.$extraError,'Gagal');
    				redirect(site_url('kunjungan/perbaikan_edit/'.$idskp));
                }
			}
			// update kunjungan
			if ($this->model_kunjungan->_update_kunjungan($data['kunjungan'],$idskp,$idkunjungan)) {
				$this->nyast->notif_create_notification('Data Berhasil Dirubah','Berhasil');
				redirect(site_url('kunjungan/approval_list/'));
			}else{
				$this->nyast->notif_create_notification('Detail Gagal Dirubah','Gagal');
				redirect(site_url('kunjungan/perbaikan_detail/'.$idskp));
			}

		}
	}

	public function approval_list()
	{
		$data['page_title'] = 'Saran dan Perbaikan';
		$data['content'] = 'pages_content/skp/view_perbaikan';
		if($this->level == 'dinas'){
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','dinas');
		}elseif($this->level == 'kp'){
			$data['alurproses']	= $this->model_skp->_get_alur_proses();
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','kp');
		}else{
			$data['alurproses']	= $this->model_skp->_get_alur_proses();
			$data['perbaikan'] = $this->model_kunjungan->_get_kunjungan('','');
		}
		$this->load->view('index',$data);
	}

	function action_surat_rekomendasi(){
		if(null!=$this->input->post('submit')){
			$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
			//$config['max_size']             = 25000;
			$config['overwrite']            = 1;
			$config['upload_path'] = './file/surat-rekomendasi';
			$config['file_name'] = 'surat-rekomendasi-'.date('y-m-d--his');
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file_surek')){
				$fileData	= $this->upload->data();
				foreach($this->input->post('perbaikan_selesai') as $k){
					$ke 			= explode('-',$k);
					$idskp 			= $ke[0];
					$idkunjungan 	= $ke[1];
					$dt = array(
						'rekomendasi_kunjungan'	=> '/file/surat-rekomendasi/'.$fileData['file_name'],
						'status_kunjungan'		=> 'Kunjungan Selesai'
					);
					// update kunjungan
					$this->model_kunjungan->_update_kunjungan($dt,$idskp,$idkunjungan);
					// create skp log
					$this->model_skp->_create_skp_log('Keluar Rekomendasi ke KKP',$idskp);
					// update main skp status
					$dtskp = array(
						'status_skp'	=> 'kunjungan-selesai-dinas'
					);
					$this->model_skp->_update_skp_status($dtskp,$idskp);
				}
				// perform redirect with notification
				$this->nyast->notif_create_notification('Upload Surat Rekomendasi Berhasil','Selamat');
				redirect(site_url('kunjungan/approval_list'));
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Upload Surat Rekomendasi Gagal');
				redirect(site_url('kunjungan/approval_list'));
			}
		}else{
			$this->show404();
		}
	}

	function action_terbit_skp(){
		if($this->input->post('submit')!=null){
			if($this->input->post('perbaikan_selesai') != null){
				$contentLoop = $this->input->post('perbaikan_selesai');
			}else{
				$contentLoop = $this->input->post('supervisi');
			}
			foreach($contentLoop as $k){
				$ke 			= explode('-',$k);
				$idskp 			= $ke[0];
				$idkunjungan 	= $ke[1];

				// update kunjungan
				$this->model_kunjungan->_update_kunjungan(array('status_kunjungan' => 'Kunjungan (Supervisi Kantor Pusat) Selesai'),$idskp,$idkunjungan);

				// create skp log
				$this->model_skp->_create_skp_log('Penerbitan SKP',$idskp);

				// update main skp status
				$this->model_skp->_update_skp_status(array('status_skp' => 'penerbitan-skp'),$idskp);

				// // cek alur proses
				// $alpros = $this->model_skp->_cek_alur_proses();
				// $alurProses = $alpros[0]['idtbl_alurproses'];

				$today = date('Y-m-d');
				$kd    = date('Y-m-d', strtotime('+2 years'));
				// insert into skp_terbit
				$skpTerbit = array(
					'idtbl_skp_terbit' 			=> '',
					'tglmulai_skp_terbit'		=> $today,
					'tglkadaluarsa_skp_terbit'	=> $kd,
					'noseri_skp_terbit' 		=> $this->input->post('no_seri_skp'),
					'no_skp_terbit' 			=> $this->input->post('no_skp'),
					'skp_id' 					=> $idskp,
					'status' 					=> 1,
					'alurproses_id' 			=> $this->input->post('alur_proses')
				);
				$this->model_skp->_insert_skp_terbit($skpTerbit);

				// insert into tanda tangan
				$skpTandaTangan = array(
					'idtbl_tandatangan' 	=> '',
					'status_tandatangan' 	=> '',
					'skp_id' 				=> $idskp
				);
				$this->model_skp->_insert_skp_ttd($skpTandaTangan);
			}
			$this->nyast->notif_create_notification('SKP Berhasil Diterbitkan','Selamat');
			redirect(site_url('skp/rekomendasi_list'));
		}else{
			$this->show404();
		}
	}
}
