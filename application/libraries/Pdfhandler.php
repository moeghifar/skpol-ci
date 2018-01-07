<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pdfhandler {

    public $CI;
	public $html2pdf;

    public function __construct(){
        $this->CI =& get_instance();
		require_once(APPPATH.'third_party/html2pdf440/html2pdf.class.php');
	    $this->$html2pdf = new HTML2PDF('P','A4','en');
    }
}

?>
