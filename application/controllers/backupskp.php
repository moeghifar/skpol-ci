<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('model_skp');
		$this->level = $this->session->userdata($this->session_prefix.'-userlevel');
	}

	//Pengajuan SKP oleh UPI
	public function create()
	{
		$data['page_title'] 	= 'Formulir Pengajuan SKP';
		$data['getProduk']		= $this->model_skp->_get_produk();
		$data['content'] 		= 'pages_content/skp/view_create_skp';
		$this->load->view('index',$data);
	}

	function action_create_skp(){
		$config['allowed_types']        = 'jpg|jpeg|pdf|doc|docx';
		$config['max_size']             = 0;
		$config['overwrite']            = 1;
		$this->load->library('upload', $config);
		if( $this->input->post('submit') != NULL ){
			$config['upload_path'] = './file/gmpssop';
			$config['file_name'] = 'gmpssop-'.date('y-m-d--his');
			$this->upload->initialize($config);
			if($this->upload->do_upload('file_gmpssop')){
				$fileData		= $this->upload->data();
				$data['skp']	= array(
					'filegmpssop_skp'		=> '/file/gmpssop/'.$fileData['file_name'],
					'permohonan_skp'		=> $this->input->post('jenis_pengajuan'),
					'produk_id'				=> $this->input->post('nama_produk'),
					'realisasiproduksi_skp'	=> $this->input->post('total_realisasi_produk'),
					'upi_id'				=> $this->session->userdata($this->session_prefix.'-upiid'),
					'status_skp'			=> 'pengajuan'
				);
				// input skp
				$this->model_skp->_insert_for_skp('tbl_skp',$data['skp']);
				$skpid = $this->db->insert_id();
				// input with array receiver
				$kota 		= $this->input->post('kota');
				$negara 	= $this->input->post('negara');
				$t_asal 	= $this->input->post('t_asal');
				$t_jenis 	= $this->input->post('t_jenis');
				$t_bentuk 	= $this->input->post('t_bentuk');
				$b_asal 	= $this->input->post('b_asal');
				$b_jenis 	= $this->input->post('b_jenis');
				$b_bentuk 	= $this->input->post('b_bentuk');
				$i_asal 	= $this->input->post('i_asal');
				$i_jenis 	= $this->input->post('i_jenis');
				$i_bentuk 	= $this->input->post('i_bentuk');
				$sni	 	= $this->input->post('sni');
				// insert domestik
				foreach($kota as $k => $i){
					$data['domestik'] = array(
						'idtbl_pemasaran'=>'',
						'tujuan_pemasaran'=>$i,
						'jenis_pemasaran'=>'domestik',
						'skp_id'=>$skpid
					);
					$this->model_skp->_insert_for_skp('tbl_pemasaran',$data['domestik']);
				}
				// insert mancanegara
				foreach($negara as $k => $i){
					$data['negara'] = array(
						'idtbl_pemasaran'=>'',
						'tujuan_pemasaran'=>$i,
						'jenis_pemasaran'=>'mancanegara',
						'skp_id'=>$skpid
					);
					$this->model_skp->_insert_for_skp('tbl_pemasaran',$data['negara']);
				}
				foreach($t_jenis as $k => $i){
					$data['bahanbaku']['t'][$k]['idtbl_bahanbaku']='';
					$data['bahanbaku']['t'][$k]['asal_bahanbaku']=$t_asal[$k];
					$data['bahanbaku']['t'][$k]['jenis_bahanbaku']=$i;
					$data['bahanbaku']['t'][$k]['bentuk_bahanbaku']=$t_bentuk[$k];
					$data['bahanbaku']['t'][$k]['kategori_bahanbaku']='tangkapan';
					$data['bahanbaku']['t'][$k]['skp_id']=$skpid;
				}
				foreach($b_jenis as $k => $i){
					$data['bahanbaku']['b'][$k]['idtbl_bahanbaku']='';
					$data['bahanbaku']['b'][$k]['asal_bahanbaku']=$b_asal[$k];
					$data['bahanbaku']['b'][$k]['jenis_bahanbaku']=$i;
					$data['bahanbaku']['b'][$k]['bentuk_bahanbaku']=$b_bentuk[$k];
					$data['bahanbaku']['b'][$k]['kategori_bahanbaku']='budidaya';
					$data['bahanbaku']['b'][$k]['skp_id']=$skpid;
				}
				foreach($i_jenis as $k => $i){
					$data['bahanbaku']['i'][$k]['idtbl_bahanbaku']='';
					$data['bahanbaku']['i'][$k]['asal_bahanbaku']=$i_asal[$k];
					$data['bahanbaku']['i'][$k]['jenis_bahanbaku']=$i;
					$data['bahanbaku']['i'][$k]['bentuk_bahanbaku']=$i_bentuk[$k];
					$data['bahanbaku']['i'][$k]['kategori_bahanbaku']='import';
					$data['bahanbaku']['i'][$k]['skp_id']=$skpid;
				}
				// insert t
				foreach($data['bahanbaku']['t'] as $k){
					$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
				}
				// insert b
				foreach($data['bahanbaku']['b'] as $k){
					$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
				}
				// insert i
				foreach($data['bahanbaku']['i'] as $k){
					$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
				}
				// insert sni
				foreach($sni as $k){
					$data['sni'] = array(
						'idtbl_sni'=>'',
						'nama_sni'=>$k,
						'skp_id'=>$skpid
					);
					$this->model_skp->_insert_for_skp('tbl_sni',$data['sni']);
				}
				$data['ksp']['gudang_beku']			= $this->input->post('gudang_beku');
				$data['ksp']['abf_iqf']				= $this->input->post('abf_iqf');
				$data['ksp']['retor_seamer']		= $this->input->post('retor_seamer');
				$data['ksp']['gudang_penyimpanan']	= $this->input->post('gudang_penyimpanan');
				$data['ksp']['bak_pencuci']			= $this->input->post('bak_pencuci');
				$data['ksp']['kolam_penampungan']	= $this->input->post('kolam_penampungan');
				$sarana_kg	 						= $this->input->post('lainnya_kg');
				foreach($this->input->post('lainnya_sarana') as $k => $i){
					$data['ksp'][$i] = $sarana_kg[$k];
				}
				// insert sarpras
				foreach($data['ksp'] as $k => $i){
					$data['inpksp'] = array(
						'idtbl_sarpras' =>	'',
						'nama_sarpras' => $k,
						'value_sarpras' => $i,
						'skp_id' => $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_sarpras',$data['inpksp']);
				}
				$data['karyawan'] = array(
					'idtbl_karyawan' 		=> '',
					'admasinglk_karyawan' 	=> $this->input->post('tka_administrasi_l'),
					'admasingpr_karyawan' 	=> $this->input->post('tka_administrasi_p'),
					'admtetaplk_karyawan' 	=> $this->input->post('tt_administrasi_l'),
					'admtetappr_karyawan' 	=> $this->input->post('tt_administrasi_p'),
					'admharilk_karyawan' 	=> $this->input->post('th_administrasi_l'),
					'admharipr_karyawan' 	=> $this->input->post('th_administrasi_p'),
					'olahasinglk_karyawan' 	=> $this->input->post('tka_pengolahan_l'),
					'olahasingpr_karyawan' 	=> $this->input->post('tka_pengolahan_p'),
					'olahtetaplk_karyawan' 	=> $this->input->post('tt_pengolahan_l'),
					'olahtetappr_karyawan' 	=> $this->input->post('tt_pengolahan_p'),
					'olahharilk_karyawan' 	=> $this->input->post('th_pengolahan_l'),
					'olahharipr_karyawan' 	=> $this->input->post('th_pengolahan_p'),
					'harikerja_karyawan' 			=> $this->input->post('jumlah_hari_kerja'),
					'skp_id' 				=> $skpid
				);
				$this->model_skp->_insert_for_skp('tbl_karyawan',$data['karyawan']);
				$data['penanggungjawab'] = array(
					'idtbl_penanggungjawab' 				=> '',
					'upipendidikan_penanggungjawab' 		=> $this->input->post('pj_upi_pabrik_pendidikan'),
					'upipelatihan_penanggungjawab' 			=> $this->input->post('pj_upi_pabrik_sertifikat'),
					'produksipendidikan_penanggungjawab' 	=> $this->input->post('pj_produksi_pendidikan'),
					'produksipelatihan_penanggungjawab' 	=> $this->input->post('pj_produksi_sertifikat'),
					'mutupendidikan_penanggungjawab' 		=> $this->input->post('pj_mutu_pendidikan'),
					'mutupelatihan_penanggungjawab' 		=> $this->input->post('pj_mutu_sertifikat'),
					'skp_id' 								=> $skpid
				);
				$this->model_skp->_insert_for_skp('tbl_penanggungjawab',$data['penanggungjawab']);
				$be="";$pe="";
				if(null!==($this->input->post('bentuk_es')))
				{$be = implode(',',$this->input->post('bentuk_es'));}
				if(null!==($this->input->post('penggunaan_es')))
				{$pe = implode(',',$this->input->post('penggunaan_es'));}
				$data['asales'] = array(
					'idtbl_asales' 		=> '',
					'sendiri_asales' 	=> $this->input->post('produksi_sendiri'),
					'pembelian_asales' 	=> $this->input->post('pembelian_dari'),
					'bentuk_asales' 	=> $be,
					'penggunaan_asales' => $pe,
					'skp_id' 			=> $skpid
				);
				$this->model_skp->_insert_for_skp('tbl_asales',$data['asales']);
				$data['lainnya'] = array(
					'idtbl_infolain' 			=> '',
					'bahanpenolong_infolain' 	=> $this->input->post('bahan_penolong_tambahan'),
					'kemasaninner_infolain' 	=> $this->input->post('jbk_inner'),
					'kemasanmaster_infolain' 	=> $this->input->post('jbk_master'),
					'lainnya_infolain' 			=> $this->input->post('info_lainnya'),
					'skp_id' 					=> $skpid
				);
				$this->model_skp->_insert_for_skp('tbl_infolain',$data['lainnya']);

				// create skp log
				$this->model_skp->_create_skp_log('Pengajuan SKP',$skpid);

				// perform redirect with notification
				$this->nyast->notif_create_notification('Pengajuan SKP Berhasil','Selamat');
				redirect(site_url('skp/create'));
				// - - - - - - - - - - - - - - - - - - - - - - - - -
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Pengajuan SKP Gagal');
				redirect(site_url('skp/create'));
				// - - - - - - - - - - - - - - - - - - - - - - - - -
			}
		}else{
			$this->show404();
		}
	}

	//Monitoring SKP yang telah diterbitkan
	public function skp_list()
	{
		$data['page_title'] = 'Daftar Monitoring SKP';
		if($this->level=='dinas'){
			$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp',null,$this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
		}else{
			$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp');
		}
		$data['content'] = 'pages_content/skp/view_skp_list';
		$this->load->view('index',$data);
	}

	//Detail dari Monitoring SKP yang telah diterbitkan
	public function detail_skp($id,$ids)
	{
		$data['page_title'] = 'Detail SKP';
		//$data['skp']		= $this->model_skp->_get_skp($id);
		$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$id);
		$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$id);
		$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$id);
		$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$ids);
		$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$ids);
		$data['pendidikan']	= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$ids);
		$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$ids);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$ids);
		$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp',$ids);
		$data['alur']		= $this->model_skp->_get_by_alur('tbl_alurproses',$id);
		$data['content'] = 'pages_content/skp/view_detail_skp';
		$this->load->view('index',$data);
	}

	//Tabel Pengajuan SKP oleh semua UPI
	public function pengajuan_list()
	{
		$data['page_title'] = 'Daftar Pengajuan SKP';
		if($this->level=='dinas'){
			$data['skp']		= $this->model_skp->_get_skp_progress('pengajuan', null, $this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
		}else{
			$data['skp']		= $this->model_skp->_get_skp_progress('pengajuan');
		}
		$data['content'] 	= 'pages_content/skp/view_pengajuan_skp_list';
		$this->load->view('index',$data);
	}

	function action_penjadwalan($id = null){
		if(null!=$this->input->post('submit')){
			$tgl = $this->input->post('tanggal_kunjungan');
			foreach($this->input->post('penjadwalan_dinas') as $key){
				$dt = array(
					'idtbl_kunjungan'		=> '',
					'tgl_kunjungan'			=> $tgl,
					'pic_kunjungan'			=> '',
					'uker_kunjungan'		=> 'dinas',
					'temuan_kunjungan'		=> '',
					'perbaikan_kunjungan'	=> '',
					'survey_kunjungan'		=> '',
					'status_kunjungan'		=> 'Penjadwalan',
					'skp_id'				=> $key
				);
				// insert into kunjungan
				$this->model_skp->_insert_penjadwalan($dt);
				// create skp log
				$this->model_skp->_create_skp_log('Penjadwalan Kunjungan Dinas',$key);
				// update main skp status
				$dtskp = array(
					'status_skp'	=> 'penjadwalan-kunjungan'
				);
				$this->model_skp->_update_skp_status($dtskp,$key);
			}
			// perform redirect with notification
			$this->nyast->notif_create_notification('Penjadwalan Kunjungan SKP Berhasil','Selamat');
			redirect(site_url('skp/pengajuan_list'));
		}else{
			$this->show404();
		}
	}

	//Detail dari Tabel Pengajuan SKP oleh semua UPI
	public function detail_pengajuan_skp($id)
	{
		$data['page_title'] = 'Detail Pengajuan SKP';
		$data['skp']		= $this->model_skp->_get_skp($id);
		$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$id);
		$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$id);
		$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$id);
		$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$id);
		$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$id);
		$data['pendidikan']	= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$id);
		$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$id);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$id);
		$data['content'] = 'pages_content/skp/view_pengajuan_skp_detail';
		if ($data['skp'][0]['kode_provinsi']==$this->session->userdata($this->session_prefix.'-userkodeprovinsi')) {
			$this->load->view('index',$data);
		}else{
			$this->show404();
		}
	}

	//Tabel Rekomendasi SKP yang dikirimkan oleh dinas ke KP
	public function rekomendasi_list()
	{
		$data['page_title'] = 'Daftar Rekomendasi SKP oleh Dinas';
		$data['content'] = 'pages_content/skp/view_rekomendasi_list';
		$data['alurproses']	= $this->model_skp->_get_alur_proses();
		$data['rekomendasi'] = $this->model_skp->_get_rekomendasi_skp();
		$this->load->view('index',$data);
	}

	function action_supervisi($id = null){
		if(null!=$this->input->post('submit')){
			$tgl = $this->input->post('tanggal_kunjungan');
			foreach($this->input->post('supervisi') as $k){
				$ke 			= explode('-',$k);
				$key 			= $ke[0];
				$dt = array(
					'idtbl_kunjungan'		=> '',
					'tgl_kunjungan'			=> $tgl,
					'pic_kunjungan'			=> '',
					'uker_kunjungan'		=> 'kp',
					'temuan_kunjungan'		=> '',
					'perbaikan_kunjungan'	=> '',
					'survey_kunjungan'		=> '',
					'status_kunjungan'		=> 'Penjadwalan',
					'skp_id'				=> $key
				);
				// insert into kunjungan
				$this->model_skp->_insert_penjadwalan($dt);
				// create skp log
				$this->model_skp->_create_skp_log('Penjadwalan Supervisi Kantor Pusat',$key);
				// update main skp status
				$dtskp = array(
					'status_skp'	=> 'penjadwalan-kunjungan-supervisi'
				);
				$this->model_skp->_update_skp_status($dtskp,$key);
			}
			// perform redirect with notification
			$this->nyast->notif_create_notification('Penjadwalan Supervisi SKP Berhasil','Selamat');
			redirect(site_url('skp/rekomendasi_list'));
		}else{
			$this->show404();
		}
	}

	//Detail dari Tabel Rekomendasi SKP yang dikirimkan oleh dinas ke KP
	public function detail_rekomendasi_skp($id)
	{
		$data['page_title'] = 'Detail Rekomendasi SKP oleh Dinas';
		$data['content'] = 'pages_content/skp/view_rekomendasi_detail';
		$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$id);
		$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$id);
		$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$id);
		$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$id);
		$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$id);
		$data['pendidikan']	= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$id);
		$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$id);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$id);
		$data['rekomendasi'] = $this->model_skp->_get_rekomendasi_skp($id);
		$this->load->view('index',$data);
	}

	//Tabel dari SKP yang telah diterbitkan
	public function tandatangan_list()
	{
		$data['skpt']		= $this->model_skp->_get_skp_terbit('penerbitan-skp');
		$data['page_title'] = 'Daftar Proses Tanda Tangan SKP';
		$data['content'] 	= 'pages_content/skp/view_tandatangan_list';
		$this->load->view('index',$data);
	}

	function action_update_ttd(){
		if(null!=$this->input->post('submit')){
			$tgl = $this->input->post('tgl_ttd');
			foreach($this->input->post('update_ttd') as $key => $k){
				$ke 			= explode('-',$k);
				$skpid 			= $ke[0];
				$ttdid 			= $ke[1];
				// update tanda tangan
				$this->model_skp->_update_ttd(array('status_tandatangan'=>$key,'tgl_tandatangan'=>$tgl,'skp_id'=>$skpid),$skpid,$ttdid);
				// create skp log
				$this->model_skp->_create_skp_log('Masuk '.$key,$skpid);
				// update main skp status
				if($key == 'Dirjen'){
					$this->model_skp->_update_skp_status(array('status_skp'=>'terbit-skp'),$skpid);
				}else{
					$this->model_skp->_update_skp_status(array('status_skp'=>'tanda-tangan-'.$key),$skpid);
				}
			}
			// perform redirect with notification
			$this->nyast->notif_create_notification('Update Tanda Tangan Berhasil','Selamat');
			redirect(site_url('skp/tandatangan_list'));
		}else{
			$this->show404();
		}
	}

	public function alurproses(){
		$data['page_title'] = 'Daftar Alur Proses';
		$data['content'] = 'pages_content/alurproses/view_alurproses_list';
		$data['alur']	= $this->model_skp->_get_alur_proses();
		$this->load->view('index',$data);
	}

	function action_add_alurproses(){
		if( $this->input->post('submit') != NULL ){
			$param = array(
				'idtbl_alurproses'			=> '',
				'nama_alurproses'		=> $this->input->post('nama'),
				'name_alurproses'		=> $this->input->post('name')
			);
			if($this->model_skp->_insert_alur_proses($param)){
				$this->nyast->notif_create_notification('Alur Proses Berhasil Ditambahkan','Penambahan Berhasil');
				redirect(site_url('skp/alurproses'));
			}
		}
	}

	public function delete_alurproses($id){
		if($this->model_skp->_delete_alur_proses($id)){
			$this->nyast->notif_create_notification('Alur Proses Berhasil Dihapus','Alur Proses Dihapus');
			redirect(site_url('skp/alurproses'));
		}

	}

	public function print_skp($idskp){
		if($idskp != null){
			ob_start();
			$data['skpt']		= $this->model_skp->_get_print_skp_terbit('penerbitan-skp',$idskp);
			$this->load->view('print',$data);
			$html = ob_get_contents();
			ob_end_clean();

			require_once(APPPATH.'third_party/html2pdf/html2pdf.class.php');
			$pdf = new HTML2PDF('P','A4','en');

			$pdf->WriteHTML($html);
			$pdf->Output('skp-terbit-.pdf');
		}else{
			$this->show404();
		}
	}
}
