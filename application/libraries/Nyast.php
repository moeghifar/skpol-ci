<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nyast {

    public $CI;
	public $sess_name;

    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->CI->load->library('session');
        date_default_timezone_set('Asia/Jakarta');
		$this->sess_name = $this->CI->config->item('default_session_name');
    }

    // authentication package

    public function auth_check_session_page(){
        if(NULL==($this->CI->session->userdata($this->sess_name.'-login'))){
            redirect(site_url('auth'));
        }
    }

    public function auth_check_session_login(){
        if(NULL!=($this->CI->session->userdata($this->sess_name.'-login'))){
            redirect(site_url());
        }
    }

    public function auth_register_session($sessData,$url){
		// default login session
        $this->CI->session->set_userdata($this->sess_name.'-login',TRUE);
		// user costumized session
		$this->CI->session->set_userdata($sessData);
        redirect($url);
    }

    // notification package

    public function notif_create_notification($notif,$notifcat){
        $this->CI->session->set_flashdata($this->sess_name.'-notifcat',$notifcat);
        $this->CI->session->set_flashdata($this->sess_name.'-notif',$notif);
    }

    public function notif_show_notification(){
        if(NULL!=($this->CI->session->flashdata($this->sess_name.'-notif')) && NULL!=($this->CI->session->flashdata($this->sess_name.'-notifcat'))){
            $data['type'] = $this->CI->session->flashdata($this->sess_name.'-notifcat');
            $data['content'] = $this->CI->session->flashdata($this->sess_name.'-notif');
			$this->CI->load->view('pages_part/part_notification',$data);
        }
    }

	public function js_notif(){
		if(NULL!=($this->CI->session->flashdata($this->sess_name.'-notif')) && NULL!=($this->CI->session->flashdata($this->sess_name.'-notifcat'))){
			echo 'notifError("'.$this->CI->session->flashdata($this->sess_name.'-notifcat').'","'.$this->CI->session->flashdata($this->sess_name.'-notif').'");';
		}
	}

	public function date_indo_format($date){
		$d = explode('-',$date);
		return $d[2].'-'.$d[1].'-'.$d[0];
	}

	public function date_indo_month($date){
		$iddate = array(
			'1'=>'Januari', '01'=>'Januari',
			'2'=>'Februari', '02'=>'Februari',
			'3'=>'Maret', '03'=>'Maret',
			'4'=>'April', '04'=>'April',
			'5'=>'Mei', '05'=>'Mei',
			'6'=>'Juni', '06'=>'Juni',
			'7'=>'Juli', '07'=>'Juli',
			'8'=>'Agustus', '08'=>'Agustus',
			'9'=>'September', '09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
		$d = explode('-',$date);
		return $d[2].' '.$iddate[$d[1]].' '.$d[0];
	}

	public function prevUrl(){
		if(isset($_SERVER['HTTP_REFERER'])){
			return $_SERVER['HTTP_REFERER'];
		}else{
			return site_url();
		}
	}

	// Form Generator

	public function _form_generator($formParam = array(),$formItem = array()){

		if($formParam['file'] == TRUE){
			$comp	= form_open_multipart($formParam['target'], $formParam['attr']);
		}else{
			$comp	= form_open($formParam['target'], $formParam['attr']);
		}

		foreach($formItem as $in => $key){
			$comp	.= $key['prefix'];
			if($key['label'] != ''){
				$comp	.= '<label for="'.$key['input']['name'].'">'.$key['label'].'</label>';
			}
			switch($key['type']){
				case 'text' :
					$comp	.= form_input($key['input']);
					break;
				case 'password':
					$comp	.= form_input($key['input']);
					break;
				case 'dropdown':
					$comp	.= form_input($key['input']);
					break;
				case 'checbox':
					$comp	.= form_input($key['input']);
					break;
				case 'textarea':
					$comp	.= form_input($key['input']);
					break;
				case 'upload':
					$comp	.= form_input($key['input']);
					break;
				case 'multi-select':
					$comp	.= form_input($key['input']);
					break;
				case 'radio':
					$comp	.= form_input($key['input']);
					break;
				case 'button':
					$comp	.= form_input($key['input']);
					break;
				default:
					break;
			}
			$comp	.= $key['suffix'];
		}

		$comp	.= form_close();
		return $comp;
	}
}
