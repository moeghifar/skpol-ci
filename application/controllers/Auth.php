<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*	Filename	: Auth.php
*	Location	: application/controllers
*	Desc		: contains methods to perform authentication
*	methods		: ...
*
*/

class Auth extends MY_Controller {

	public $error;
	public $levelInfo;

	function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect(site_url('auth/login'));
	}

	public function login(){
		$data['content']	= 'pages_content/view_login';
		$this->load->view('login',$data);
	}

	public function registrasi(){
		$data['provinsi']	= $this->model_auth->_get_provinsi();
		$data['content']	= 'pages_content/view_register_v2';
		$this->load->view('login',$data);
	}

	public function action_login(){
		if( $this->input->post('submit') != NULL ){
			$username = trim($this->input->post('username',TRUE));
			$password = trim($this->input->post('password'));
			// db check user and pass
			if($this->_check_database($username,$password) == TRUE){
				// generate session data
				$sessprefix = $this->session_prefix;
				if($this->levelInfo == 'admin'){
					$sessData = array(
						$sessprefix.'-userid' => '1',
						$sessprefix.'-username' => $username,
						$sessprefix.'-userlevel' => 'admin',
						$sessprefix.'-userprovinsi' => 'all'
					);
				}elseif($this->levelInfo == 'kp' || $this->levelInfo == 'pejabat'){
					$getForSession = $this->model_auth->_get_for_session($username,$this->levelInfo);
					$sessData = array(
						$sessprefix.'-userid' => $getForSession[0]['id_user'],
						$sessprefix.'-username' => $username,
						$sessprefix.'-userprovinsi' => 'all',
						$sessprefix.'-userlevel' => $getForSession[0]['level']
					);
				}elseif($this->levelInfo == 'upi' ){
					$getForSession = $this->model_auth->_get_for_session($username,$this->levelInfo);
					$sessData = array(
						$sessprefix.'-userid' => $getForSession[0]['id_user'],
						$sessprefix.'-upiid' => $getForSession[0]['idtbl_upi'],
						$sessprefix.'-username' => $username,
						$sessprefix.'-userkodeprovinsi' => $getForSession[0]['kode_provinsi'],
						$sessprefix.'-userprovinsi' => $getForSession[0]['nama_provinsi'],
						$sessprefix.'-userlevel' => $getForSession[0]['level']
					);
				}elseif($this->levelInfo == 'pejabat-dirjen' || $this->levelInfo == 'pejabat-direktur'){
					$getForSession = $this->model_auth->_get_for_session($username,$this->levelInfo);
					$sessData = array(
						$sessprefix.'-userid' => $getForSession[0]['id_user'],
						$sessprefix.'-username' => $username,
						$sessprefix.'-userprovinsi' => 'all',
						$sessprefix.'-userlevel' => $getForSession[0]['level']
					);
				}else{
					$getForSession = $this->model_auth->_get_for_session($username,$this->levelInfo);
					$sessData = array(
						$sessprefix.'-userid' => $getForSession[0]['id_user'],
						$sessprefix.'-username' => $username,
						$sessprefix.'-userkodeprovinsi' => $getForSession[0]['kode_provinsi'],
						$sessprefix.'-userprovinsi' => $getForSession[0]['nama_provinsi'],
						$sessprefix.'-userlevel' => $getForSession[0]['level']
					);
				}
				$this->nyast->auth_register_session($sessData,site_url());
			}else{
				$this->nyast->notif_create_notification($this->error,'Login Gagal');
				redirect(site_url('auth/login'));
			}
		}else{
			redirect(site_url());
		}
	}

	public function check_file($fn){
		if(is_uploaded_file($_FILES[$fn]['tmp_name'])){
			return true;
		}else{
			return false;
		}
	}

	public function action_register(){
		$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx|application/pdf|application/unknown';
		$config['overwrite']			= true;
		// $config['max_size']             = 25000;
		$this->load->library('upload', $config);
		if( $this->input->post('submit') != NULL ){
			if($this->check_file('file_akta') && $this->check_file('file_siup') && $this->check_file('file_iup')){
				$fileUpload = array(
					'file_akta' => str_replace(array('/','.'),'_',$this->input->post('nama_upi')).'_'.str_replace(array('/','.',','),'',$this->input->post('noakta')),
					'file_siup'	=> str_replace(array('/','.'),'_',$this->input->post('nama_upi')).'_'.str_replace(array('/','.',','),'',$this->input->post('nosiup')),
					'file_iup'	=> str_replace(array('/','.'),'_',$this->input->post('nama_upi')).'_'.str_replace(array('/','.',','),'',$this->input->post('noiup'))
				);
				$fileData = array();
				$countError = array();
				foreach($fileUpload as $i => $v){
					$config['upload_path'] = './file/upi/'.$i;
					$config['file_name'] = $v;
					$this->upload->initialize($config);
					if($this->upload->do_upload($i)){
						$fileData[$i]	= $this->upload->data();
					}else{
						$countError[0] = $this->upload->display_errors();
					}
				}
				if(count($countError) == 0){
					$data['user'] = array(
						'username' 		=> $this->input->post('username'),
						'password' 		=> password_hash($this->input->post('password'), PASSWORD_BCRYPT),
						'email' 		=> $this->input->post('email'),
						'login_status' 	=> '0',
						'level'			=> 'upi'
					);
					if (strlen($this->input->post('alamat_pabrik') < 1)) {
						$alamat_pabrik = '-';
					} else {
						$alamat_pabrik = $this->input->post('alamat_pabrik');
					}
					// input user
					$this->model_auth->_insert_user($data['user']);
					$iduser = $this->db->insert_id();
					$data['upi'] = array(
						'idtbl_upi'				=> '',
						'nama_upi'				=> strtoupper($this->input->post('nama_upi')),
						// 'pemilik_upi'			=> $this->input->post('nama_pemilik'),
						// 'penanggungjawab_upi'	=> $this->input->post('nama_penanggungjawab'),
						// 'alamat_upi'			=> $this->input->post('alamat_upi'),
						// 'alamat_pabrik'			=> $alamat_pabrik,
						// 'kodepos_upi'			=> $this->input->post('kode_pos'),
						'entitas_upi'			=> $this->input->post('jenis_upi'),
						'provinsi_upi'			=> $this->input->post('provinsi'),
						// 'kabupaten_upi'			=> $this->input->post('kabupaten'),
						// 'kecamatan_upi'			=> $this->input->post('kecamatan'),
						// 'desa_upi'				=> $this->input->post('kelurahan'),
						'email_upi'				=> $this->input->post('email'),
						// 'kontak_upi'			=> $this->input->post('kontak_upi'),
						// 'kontakperson_upi'		=> $this->input->post('kontakperson_upi'),
						// 'omzet_upi'				=> $this->input->post('omzet_tahunan'),
						// 'tahunmulai_upi'		=> $this->input->post('tahun_mulai'),
						'nosiup_upi'			=> $this->input->post('nosiup'),
						'noiup_upi'				=> $this->input->post('noiup'),
						'noakta_upi'			=> $this->input->post('noakta'),
						'filesiup_upi'			=> '/file/upi/file_siup/'.$fileData['file_siup']['file_name'],
						'fileiup_upi'			=> '/file/upi/file_iup/'.$fileData['file_iup']['file_name'],
						'fileakta_upi'			=> '/file/upi/file_akta/'.$fileData['file_akta']['file_name'],
						'nonpwp_upi'			=> $this->input->post('nonpwp'),
						'registration_status'	=> '1',
						'registration_date'		=> date('Y-m-d'),
						'user_id'				=> $iduser
					);
					// register upi
					$this->model_auth->_register_upi($data['upi']);
					// send email message
					$conf = array(
						'subject' 	=> 'Notifikasi Registrasi SKP - Online',
						'message' 	=> 'Terima kasih telah mendaftar di sistem SKP - Online Kementrian Kelautan dan Perikanan, Konfirmasi Aktifasi username akan dikirim ke email yang didaftarkan dalam waktu 1x24 jam. username anda : '.$this->input->post('username').' | password anda : '.$this->input->post('password'),
						'from'		=> 'skpolp2hp@gmail.com',
						'to'		=> $this->input->post('email')
					);
					$this->_send_email($conf);
					// ..................
					$this->nyast->notif_create_notification('Konfirmasi Aktifasi username akan dikirim ke email yang didaftarkan dalam waktu 1x24 jam.','Registrasi Berhasil');
					redirect(site_url('auth/registrasi'));
				}else{
					$this->nyast->notif_create_notification($countError[0],'Registrasi Gagal');
					redirect(site_url('auth/registrasi'));
				}
			}else{
				$this->nyast->notif_create_notification('File Tidak Lengkap!','Registrasi Gagal');
				redirect(site_url('auth/registrasi'));
			}
		}else{
			redirect(site_url('auth'));
		}
	}

	public function _check_database($u,$p){
		// check user availability
		if($this->model_auth->_check_user_availabe($u)){
			// check username and password matched
			$pass = $this->model_auth->_get_password($u);
			if(password_verify($p, $pass[0]['password'])){
				// check login status info
				if($this->model_auth->_check_user_login($u)){
					$this->levelInfo = $pass[0]['level'];
					return TRUE;
				}else{
					$this->error = 'Pendaftaran akun belum dikonfirmasi, <br/> tidak dapat masuk!';
					return FALSE;
				}
			}else{
				$this->error = 'Username dan Password tidak sesuai!';
				return FALSE;
			}
		} else{
			$this->error = 'Pengguna belum terdaftar!';
			return FALSE;
		}
	}

	public function check_username_email($u=null,$e=null){
		$u = $this->input->post('u');
		$e = $this->input->post('e');
		$get = $this->model_auth->_check_u_e($u,$e);
		if(count($get)==0){
			return true;
		}elseif(count($get)==1){
			if($get[0]['e']==$e && $get[0]['u']==$u){
				echo 'Email dan Username Sudah Terdaftar';
			}elseif($get[0]['e']==$e){
				echo 'Email Sudah Terdaftar';
			}elseif($get[0]['u']==$u){
				echo 'Username Sudah Terdaftar';
			}
		}
	}

	public function forgot_password(){
		if(null!=$this->input->post('submit')){
			// cek email
			if($this->model_auth->_check_email($this->input->post('alamat_email'))) {
				// ada
				// generate new password
				$newPass = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
				// set to database
				$dataQuery = array('password' => password_hash($newPass, PASSWORD_BCRYPT));
				$this->model_auth->_update_pass_by_email($dataQuery,$this->input->post('alamat_email'));
				// send email latest password
				$conf = array(
					'subject' 	=> 'Notifikasi Reset Password SKP - Online',
					'message' 	=> 'Permintaan reset password anda sudah kami terima, Password baru anda : '.$newPass,
					'from'		=> 'skpolp2hp@gmail.com',
					'to'		=> $this->input->post('email')
				);
				$this->_send_email($conf);
				// inform user
				$this->nyast->notif_create_notification('Password baru sudah dikirim ke alamat email anda.','Reset Password Berhasil');
			}else{
				// tidak
				// inform user
				$this->nyast->notif_create_notification('Mohon maaf, Alamat email tidak terdaftar!','Reset Password Gagal');
			}
			redirect(site_url('auth/registrasi'));
		}
	}
}
