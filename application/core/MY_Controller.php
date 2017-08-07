<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $session_prefix;
	public $global_alert;

	function __construct(){
		parent::__construct();
		$this->load->library('nyast');
		// set session name
		$this->session_prefix = $this->config->item('default_session_name');
		// check session availability
		$this->_session_engine();
		// check rejected UPI
		$cekr = $this->cek_rejected();
		if(count($cekr) == 0){
			$this->global_alert = '';
		}else{
			$this->global_alert = $cekr[0]['alasan'];
		}
	}

	public function cek_rejected(){
		$currentLevel = $this->session->userdata($this->session_prefix.'-userlevel');
		$this->load->model('model_skp');
		return $this->model_skp->_check_reject($this->session->userdata($this->session_prefix.'-userid'));
	}

	public function _session_engine(){
		// check uri segment
		$totalSegments = $this->uri->total_segments();
		if($totalSegments > 0){
			switch($this->uri->segment(1)){
				case 'auth':
				$this->nyast->auth_check_session_login();
				break;
				default:
				$this->nyast->auth_check_session_page();
				break;
			}
		}else{
			$this->nyast->auth_check_session_page();
		}
	}

	function _send_email($conf=array()){
		$this->load->library('email');
		$subject = $conf['subject'];
		$message = $conf['message'];

		// Get full html:
		$body =
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset='.strtolower(config_item('charset')).'" />
		<title>'.html_escape($subject).'</title>
		<style type="text/css">
		body {
			font-family: Arial, Verdana, Helvetica, sans-serif;
			font-size: 16px;
		}
		</style>
		</head>
		<body>
		'.$message.'
		</body>
		</html>';
		// Also, for getting full html you may use the following internal method:
		//$body = $this->email->full_html($subject, $message);

		$result = $this->email
		->from($conf['from'])
		->to($conf['to'])
		->subject($subject)
		->message($body)
		->send();
		//var_dump($result);
		//echo '<br />';
		//echo $this->email->print_debugger();
		//exit;
	}

	public function show404(){
		$data['content'] = 'errors/content_error404';
		$this->load->view('error',$data);//loading view
	}

	public function _session_restrict($level = array()){
		$current_level = $this->session->userdata($this->session_prefix.'-userlevel');
		if (in_array($current_level,$level)) {
			return true;
		}
		redirect('404');
	}

}
