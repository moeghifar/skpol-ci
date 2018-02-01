<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Error404 extends CI_Controller {

    public function index() {
        $data['content'] = 'errors/content_error404';
        $this->load->view('error',$data);//loading view
    } 
}
