<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_upi');
	}
	public function index()
	{
		$this->show404();
	}

	public function file_upload()
	{
		$post = $this->input->post();
		if(isset($post['file_submit'])) {
			if(isset($post['file_upload_path'])) {
				$name_attr 					= $post['file_name_attr'];
				$config['upload_path'] 		= './' . $post['file_upload_path'];
				$config['file_name'] 		= $post['file_field'].'-'.$post['file_tbl'].'-'.$post['file_id'];
				$config['allowed_types'] 	= 'pdf|jpeg|jpg';
				$config['overwrite']		= true;
	            $config['max_size']        	= 0; // unlimited file upload
				if (isset($_FILES[$name_attr]['name'])) {
				    if (0 < $_FILES[$name_attr]['error']) {
				        echo 'Error during file upload' . $_FILES[$name_attr]['error'];
				    } else {
						$this->load->library('upload', $config);
						if ($this->upload->do_upload($name_attr)) {
							$fileUploaded = $this->upload->data('file_name');
							$f_path = '/'.$post['file_upload_path'].'/'.$fileUploaded;
							if($post['file_tbl'] == 'upi') {
								if($this->upi_update_execute($post['file_id'], $post['file_field'], $f_path)){
									echo 'File successfully uploaded';
								}
							}
						} else {
							echo $this->upload->display_errors();
						}
				    }
				} else {
				    echo 'Please choose a file';
				}
			}
		} else {
			$this->show404();
		}
	}

	public function upi_update_execute($id, $field, $filePath)
	{
		$oldData = $this->model_upi->_get_upi_detail($id);
		$fileUnlink = '.'.$oldData[0][$field];
		if ($oldData[0][$field] != $filePath) {
			if (file_exists($fileUnlink)){
				@unlink($fileUnlink);
			}
		}
		$updateQuery = array(
			$field => $filePath
		);
		$this->model_upi->_update_upi($id, $updateQuery);
		return true;
	}
}
