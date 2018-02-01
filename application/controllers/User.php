<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
*	Filename	: User.php
*	Location	: application/controllers
*	Desc		: contains methods to manage user
*	methods		: ...
*
*/

class User extends MY_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('model_user');
    }

    public function index(){
    	$data['page_title'] = 'User Management';
		$data['provinsi']	= $this->model_user->_get_provinsi();
    	$data['user']		= array_merge($this->model_user->_get_user('view_user_dinas_provinsi'),$this->model_user->_get_user('tbl_user','level != "upi" AND level != "dinas" AND id_user != "1"'));
		$data['content'] 	= 'pages_content/user/view_user_list';
		$this->load->view('index',$data);
    }

    public function user_detail($level,$id){
        $data['page_title'] = 'User';
        if ($level == 'dinas') {
        	$data['user']       = $this->model_user->_get_user('view_user_dinas_provinsi',array('id_user'=>$id));
        }else {
        	$data['user']       = $this->model_user->_get_user('view_user_kp',array('id_user'=>$id));
        }
        $data['content'] = 'pages_content/user/view_user_detail';
        $this->load->view('index',$data);
    }

	public function user_edit($level,$id){
        $data['page_title'] = 'Edit User';
		if($level == 'dinas'){
			$data['user']       = $this->model_user->_get_user('view_user_dinas_provinsi',array('id_user'=>$id));
		}else{
			$data['user']       = $this->model_user->_get_user('view_user_kp',array('id_user'=>$id));
		}
		$data['provinsi']	= $this->model_user->_get_provinsi();
        $data['content'] 	= 'pages_content/user/view_user_edit';
        $this->load->view('index',$data);
    }

    public function upi(){
    	$data['page_title'] = 'UPI';
    	$data['user']		= $this->model_user->_get_user('view_user_upi_provinsi',array('level'=>'upi'));
		$data['content'] = 'pages_content/user/view_upi_list';
		$this->load->view('index',$data);
    }

    public function upi_detail($level,$id){
        $data['page_title'] = 'UPI';
        $data['user']       = $this->model_user->_get_user('view_user_upi_provinsi',array('id_user'=>$id));
        $data['content'] = 'pages_content/user/view_upi_detail';
        $this->load->view('index',$data);
    }

	public function upi_edit($level,$id){
        $data['page_title'] = 'Edit User';
		if($level == 'upi'){
			$data['user']       = $this->model_user->_get_user('view_user_upi_provinsi',array('id_user'=>$id));
		}else{
			$data['user']       = $this->model_user->_get_user('tbl_user',array('id_user'=>$id));
		}
        $data['content'] 	= 'pages_content/user/view_upi_edit';
        $this->load->view('index',$data);
    }

	public function action_add(){
		if( $this->input->post('submit') != NULL ){
			$data['user'] = array(
				'username' 		=> $this->input->post('username'),
				'password' 		=> password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'email' 		=> $this->input->post('email'),
				'login_status' 	=> '1',
				'level'			=> $this->input->post('level')
			);
			// input user
			$this->model_user->_insert_user($data['user']);
			$iduser = $this->db->insert_id();
			$data['dinas'] = array(
				'idtbl_dinas'			=> '',
				'nama_dinas'			=> $this->input->post('nama'),
				'jabatan_dinas'			=> $this->input->post('jabatan'),
				'user_id'				=> $iduser
			);
			// register upi
			if ($this->input->post('level')=='kp') {
				$data['dinas']['provinsi_id'] = '0';
			}elseif ($this->input->post('level')=='dinas') {
				$data['dinas']['provinsi_id'] = $this->input->post('provinsi');
			}
			$this->model_user->_insert_dinas($data['dinas']);
			// send email message
			// ..................
			$this->nyast->notif_create_notification('User Berhasil Ditambahkan','Berhasil');
			redirect(site_url('user'));
		}else{
			redirect(site_url('user'));
		}
	}

	public function activate_user($id, $a){
		if ($a == 1) {
			if($this->model_user->_activate_user($id, $a)){
				$this->nyast->notif_create_notification('User Aktif','Berhasil');
				redirect(site_url('user'));
			}
		}else if ($a == 0){
			if($this->model_user->_activate_user($id, $a)){
				$this->nyast->notif_create_notification('User Nonaktif','Berhasil');
				redirect(site_url('user'));
			}
		}
	}

	public function action_update_user(){
		if( $this->input->post('submit') != NULL ){
			if($this->input->post('level') == 'dinas'){
				$dt['dinas'] = array(
					'nama_dinas'		=> $this->input->post('nama_dinas'),
					'jabatan_dinas'		=> $this->input->post('jabatan_dinas')
				);
				$dt['user'] = array(
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email')
				);
				if($this->input->post('password') != ""){
					$dt['user']['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				if ($this->input->post('provinsi_id') != "") {
					$dt['dinas']['provinsi_id'] = $this->input->post('provinsi_id');
				}
				if ($this->input->post('login_status') != "") {
					$dt['user']['login_status'] = $this->input->post('login_status');
				}
				$this->model_user->_update_user($this->input->post('id_user'),$dt['user']);
				$this->model_user->_update_dinas($this->input->post('id_user'),$dt['dinas']);
				$this->nyast->notif_create_notification('Detail Berhasil Dirubah','Berhasil');
				redirect(site_url('user'));
			}elseif ($this->input->post('level') == 'kp') {
				$dt['dinas'] = array(
					'nama_dinas'		=> $this->input->post('nama_dinas'),
					'jabatan_dinas'		=> $this->input->post('jabatan_dinas')
				);
				$dt['user'] = array(
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email')
				);
				if($this->input->post('password') != ""){
					$dt['user']['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				if ($this->input->post('login_status') != "") {
					$dt['user']['login_status'] = $this->input->post('login_status');
				}
				$this->model_user->_update_user($this->input->post('id_user'),$dt['user']);
				$this->model_user->_update_dinas($this->input->post('id_user'),$dt['dinas']);
				$this->nyast->notif_create_notification('Detail Berhasil Dirubah','Berhasil');
				redirect(site_url('user'));
			}elseif ($this->input->post('level') == 'pejabat-dirjen'||$this->input->post('level') == 'pejabat-direktur') {
				$dt['dinas'] = array(
					'nama_dinas'		=> $this->input->post('nama_dinas'),
					'jabatan_dinas'		=> $this->input->post('jabatan_dinas')
				);
				$dt['user'] = array(
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email')
				);
				if($this->input->post('password') != ""){
					$dt['user']['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				if ($this->input->post('login_status') != "") {
					$dt['user']['login_status'] = $this->input->post('login_status');
				}
				$this->model_user->_update_user($this->input->post('id_user'),$dt['user']);
				$this->model_user->_update_dinas($this->input->post('id_user'),$dt['dinas']);
				$this->nyast->notif_create_notification('Detail Berhasil Dirubah','Berhasil');
				redirect(site_url('user'));
			}else{
				$this->nyast->notif_create_notification('Detail Gagal Dirubah','Gagal');
				redirect(site_url('user'));
			}
		}else{
			redirect(site_url('user'));
		}
	}

	public function action_update_upi(){
		if( $this->input->post('submit') != NULL ){
			if($this->input->post('level') == 'upi'){
				$dt['user'] = array(
					'username'		=> $this->input->post('username'),
					'email'			=> $this->input->post('email')
				);
				if($this->input->post('password') != ""){
					$dt['user']['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
				}
				if ($this->input->post('login_status') != "") {
					$dt['user']['login_status'] = $this->input->post('login_status');
				}
				$this->model_user->_update_user($this->input->post('id_user'),$dt['user']);
				$this->nyast->notif_create_notification('Detail Berhasil Dirubah','Berhasil');
				redirect(site_url('user/upi'));
			}else{
				$this->nyast->notif_create_notification('Detail Gagal Dirubah','Gagal');
				redirect(site_url('user/upi'));
			}
		}else{
			redirect(site_url('user/upi'));
		}
	}

	public function check_username_email($u=null,$e=null){
		$u = $this->input->post('u');
		$e = $this->input->post('e');
		$get = $this->model_user->_check_u_e($u,$e);
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
}
