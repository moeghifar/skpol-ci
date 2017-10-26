<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	function __construct(){
		parent::__construct();
		//$this->nyast->auth_check_session_page();
		$this->load->model('model_setting');
	}

	public function index()
	{
		$data['user'] = $this->model_setting->_get_user();
		$data['page_title'] = 'Setting';
		$data['content'] = 'pages_content/view_setting';
		$this->load->view('index',$data);
	}

	public function informasi(){
		if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
			$data['dataFile'] = $this->model_setting->_get_data_file();
		}else{
			$data['dataFile'] = $this->model_setting->_get_data_file($this->session->userdata($this->session_prefix.'-userlevel'));
		}
		$data['page_title'] = 'Informasi';
		$data['content'] = 'pages_content/view_informasi';
		$this->load->view('index',$data);
	}

	public function do_add_url(){
		if($this->input->post('submit')!=null){
			$data_insert = array(
				'file_name' => $this->input->post('keterangan_video'),
				'file_url' => $this->input->post('link_video'),
				'file_target' => $this->input->post('file_target'),
				'kategori_file' => 'video'
			);
			if($this->model_setting->_insert_file($data_insert)){
				$this->nyast->notif_create_notification('Link Video Berhasil Ditambahkan','Selamat');
				redirect(site_url('setting/informasi'));
			}
		}else{
			redirect(site_url());
		}
	}

	public function do_add_file(){
		if($this->input->post('submit')!=null){
			if(is_uploaded_file($_FILES['file_url']['tmp_name'])){
				$config['allowed_types'] 	= 'pdf|doc|docx';
				$config['overwrite']	 	= true;
				$config['max_size']	 		= 0;
				$config['upload_path']		= './file/master-file';
				$config['file_name'] 		= str_replace(array('/','.'),'_',$this->input->post('file_name'));
				$this->load->library('upload', $config);
				if($this->upload->do_upload('file_url')){
					$fileData['file_url']	= $this->upload->data();
					$data_insert = array(
						'file_name' => $this->input->post('file_name'),
						'file_url' => '/file/master-file/'.$fileData['file_url']['file_name'],
						'file_target' => $this->input->post('file_target'),
						'kategori_file' => 'file'
					);
					if($this->model_setting->_insert_file($data_insert)){
						$this->nyast->notif_create_notification('File Baru Berhasil Ditambahkan','Selamat');
						redirect(site_url('setting/informasi'));
					}
				}else{
					$this->nyast->notif_create_notification($this->upload->display_errors(),'Gagal');
					redirect(site_url('setting/informasi'));
				}
			}else{
				$this->nyast->notif_create_notification('Maaf File Belum Dipilih','Gagal');
				redirect(site_url('setting/informasi'));
			}
		}else{
			redirect(site_url());
		}
	}

	public function do_delete_file($id){
		$old = $this->model_setting->_get_file_by_id($id);
		if($old[0]['kategori_file'] == 'file'){
			$path = '.'.$old[0]['file_url'];
			if(file_exists($path)){
				unlink($path);
				if($this->model_setting->_delete_file($id)){
					$this->nyast->notif_create_notification('File Berhasil Dihapus','Selamat');
					redirect(site_url('setting/informasi'));
				}
			}else{
				$this->nyast->notif_create_notification('Maaf Hapus Data Gagal " '.$path.' " not defined','Gagal');
				redirect(site_url('setting/informasi'));
			}
		}else{
			if($this->model_setting->_delete_file($id)){
				$this->nyast->notif_create_notification('File Berhasil Dihapus','Selamat');
				redirect(site_url('setting/informasi'));
			}else{
				$this->nyast->notif_create_notification('Maaf Hapus Data Gagal " '.$path.' " not defined','Gagal');
				redirect(site_url('setting/informasi'));
			}
		}
	}

	public function action_update_setting(){
		if($this->input->post('submit') != null){
			$cek = $this->check_username_email($this->input->post('username'),$this->input->post('email'),$this->input->post('id_user'));
			if($cek === true){
				$data['user'] = array(
					'username' 		=> $this->input->post('username'),
					'email' 		=> $this->input->post('email')
				);
				if ($this->input->post('password') != "") {
					$data['user']['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				// input user
				$this->model_setting->_update_user($this->input->post('id_user'),$data['user']);
				$this->nyast->notif_create_notification('Selamat Perubahan Berhasil','Berhasil');
				redirect(site_url('setting'));
			}else{
				$this->nyast->notif_create_notification($cek,'Gagal');
				redirect(site_url('setting'));
			}
		}else{
			$this->nyast->notif_create_notification('Perubahan Gagal','Gagal');
			redirect(site_url('setting'));
		}
	}

	public function check_username_email($u,$e,$id){
		$get = $this->model_setting->_check_u_e_and_id($u,$e,$id);
		if(count($get)==0){
			return true;
		}elseif(count($get)!=0){
			if($get[0]['email']==$e && $get[0]['username']==$u){
				return 'Email dan Username Sudah Terdaftar';
			}elseif($get[0]['email']==$e){
				return 'Email Sudah Terdaftar';
			}elseif($get[0]['username']==$u){
				return 'Username Sudah Terdaftar';
			}
		}
	}
}
