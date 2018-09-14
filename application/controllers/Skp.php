<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skp extends MY_Controller {

	protected $level;

	function __construct(){
		parent::__construct();
		$this->load->model('model_skp');
		$this->load->model('model_upi');
		$this->level = $this->session->userdata($this->session_prefix.'-userlevel');
	}

	public function index() {
		$this->show404();
	}

	//Pengajuan SKP oleh UPI
	public function create($version = 'v1'){
		$data['page_title'] 	= 'Formulir Pengajuan SKP';
		// $data['getKategori']	= $this->model_skp->_get_kategori_produk();
		$data['getProduk']		= $this->model_skp->_get_produk("1");
		switch($version) {
			case 'v1' :
				$data['content'] 	= 'pages_content/skp/view_create_skp';
				break;
			case 'v2' :
				$data['content'] 	= 'pages_content/skp/view_create_skp_2';
			 	break;
			default :
				$this->show404();
				break;
		}
		$this->load->view('index',$data);
	}

	public function get_produk(){
		$kat = $this->input->post('kat');
		$get = $this->model_skp->_get_produk_bykat($kat);
		echo json_encode($get);
	}

	function action_create_skp(){
		$config['allowed_types']       = 'jpg|jpeg|pdf|doc|docx';
		$config['overwrite']           = 1;
		$config['max_size']            = 0;
		$this->load->library('upload', $config);
		if( $this->input->post('submit') != NULL ){
			$gen_unik_filename = md5(uniqid());
			$fileUpload = array(
				'file_sp' 		=> 'sp-'.$gen_unik_filename.date('-y-m-d-his'),
				'file_gmpssop'	=> 'gmpssop-'.$gen_unik_filename.date('-y-m-d-his')
			);
			$fileData = array();
			$countError = array();
			foreach($fileUpload as $i => $v){
				if($i == 'file_sp'){
					$pathfolder = 'sp';
				}else{
					$pathfolder = 'gmpssop';
				}
				$config['upload_path'] = './file/skp/'.$pathfolder;
				$config['file_name'] = $v;
				$this->upload->initialize($config);
				if($this->upload->do_upload($i)){
					$fileData[$i]	= $this->upload->data();
				}else{
					$countError[] = $this->upload->display_errors();
				}
			}
			if(count($countError) == 0){
				$file_gmpssop = '/file/skp/gmpssop/'.$fileData['file_gmpssop']['file_name'];
				$file_spskp = '/file/skp/sp/'.$fileData['file_sp']['file_name'];
				$nama_produk = $this->input->post('nama_produk');
				$jenis_pengajuan = $this->input->post('jenis_pengajuan');
				$total_realisasi_produk = $this->input->post('total_realisasi_produk');
				$kota = $this->input->post('kota');
				$negara = $this->input->post('negara');
				// input with array receiver
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
				foreach($nama_produk as $kk => $vv) {
					$data['skp']	= array(
						'filegmpssop_skp'		=> $file_gmpssop,
						'filesp_skp'			=> $file_spskp,
						'permohonan_skp'		=> $jenis_pengajuan[$kk],
						'produk_id'				=> $vv,
						'realisasiproduksi_skp'	=> $total_realisasi_produk[$kk],
						'upi_id'				=> $this->session->userdata($this->session_prefix.'-upiid'),
						'status_skp'			=> 'pengajuan'
					);
					// input skp
					$this->model_skp->_insert_for_skp('tbl_skp',$data['skp']);
					$skpid = $this->db->insert_id();
					// insert domestik
					$domestik = explode(',',$kota[$kk]);
					foreach($domestik as $k => $i){
						$data['domestik'] = array(
							'tujuan_pemasaran'=>$i,
							'jenis_pemasaran'=>'domestik',
							'skp_id'=>$skpid
						);
						$this->model_skp->_insert_for_skp('tbl_pemasaran',$data['domestik']);
					}
					// insert mancanegara
					$mancanegara = explode(',',$negara[$kk]);
					foreach($mancanegara as $k => $i){
						if($i != ""){
							$data['negara'] = array(
								'tujuan_pemasaran'=>$i,
								'jenis_pemasaran'=>'mancanegara',
								'skp_id'=>$skpid
							);
							$this->model_skp->_insert_for_skp('tbl_pemasaran',$data['negara']);
						}
					}
					// v2 bahan baku input
					// hasil tangkapan
					$tangkap = explode(',',$t_asal[$kk]);
					foreach($tangkap as $k => $i){
						$jenis = explode(",",$t_jenis[$kk]);
						$bentuk = explode(",",$t_bentuk[$kk]);
						if($i != ""){
							$data['bahanbaku']['t'][$k]['idtbl_bahanbaku']='';
							$data['bahanbaku']['t'][$k]['asal_bahanbaku']=$i;
							$data['bahanbaku']['t'][$k]['jenis_bahanbaku']=$jenis[$k];
							$data['bahanbaku']['t'][$k]['bentuk_bahanbaku']=$bentuk[$k];
							$data['bahanbaku']['t'][$k]['kategori_bahanbaku']='tangkapan';
							$data['bahanbaku']['t'][$k]['skp_id']=$skpid;
						}
					}
					if(array_key_exists('t',$data['bahanbaku'])){
						foreach($data['bahanbaku']['t'] as $k){
							$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
						}
					}
					// hasil budidaya
					$budidaya = explode(',',$b_asal[$kk]);
					foreach($budidaya as $k => $i){
						$jenis = explode(",",$b_jenis[$kk]);
						$bentuk = explode(",",$b_bentuk[$kk]);
						if($i != ""){
							$data['bahanbaku']['b'][$k]['idtbl_bahanbaku']='';
							$data['bahanbaku']['b'][$k]['asal_bahanbaku']=$i;
							$data['bahanbaku']['b'][$k]['jenis_bahanbaku']=$jenis[$k];
							$data['bahanbaku']['b'][$k]['bentuk_bahanbaku']=$bentuk[$k];
							$data['bahanbaku']['b'][$k]['kategori_bahanbaku']='budidaya';
							$data['bahanbaku']['b'][$k]['skp_id']=$skpid;
						}
					}
					if(array_key_exists('b',$data['bahanbaku'])){
						foreach($data['bahanbaku']['b'] as $k){
							$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
						}
					}
					// hasil import
					$import = explode(',',$i_asal[$kk]);
					foreach($import as $k => $i){
						$jenis = explode(",",$i_jenis[$kk]);
						$bentuk = explode(",",$i_bentuk[$kk]);
						if($i != ""){
							$data['bahanbaku']['i'][$k]['idtbl_bahanbaku']='';
							$data['bahanbaku']['i'][$k]['asal_bahanbaku']=$i;
							$data['bahanbaku']['i'][$k]['jenis_bahanbaku']=$jenis[$k];
							$data['bahanbaku']['i'][$k]['bentuk_bahanbaku']=$bentuk[$k];
							$data['bahanbaku']['i'][$k]['kategori_bahanbaku']='import';
							$data['bahanbaku']['i'][$k]['skp_id']=$skpid;
						}
					}
					if(array_key_exists('i',$data['bahanbaku'])){
						foreach($data['bahanbaku']['i'] as $k){
							$this->model_skp->_insert_for_skp('tbl_bahanbaku',$k);
						}
					}
					// insert sni
					foreach($sni as $k){
						$data['sni'] = array(
							'nama_sni'=>$k,
							'skp_id'=>$skpid
						);
						$this->model_skp->_insert_for_skp('tbl_sni',$data['sni']);
					}
					$data['ksp']['Gudang Beku']				= $this->input->post('gudang_beku');
					$data['ksp']['Gudang Dingin']			= $this->input->post('gudang_dingin');
					$data['ksp']['ABF']						= $this->input->post('abf');
					$data['ksp']['Contact Plate Freezer']	= $this->input->post('cpf');
					$data['ksp']['Tunnel Freezer']			= $this->input->post('tf');
					$data['ksp']['Brine Freezer']			= $this->input->post('bf');
					$data['ksp']['Retort']					= $this->input->post('retor');
					$data['ksp']['Seamer']					= $this->input->post('seamer');
					$data['ksp']['Gudang Kering']			= $this->input->post('gudang_kering');
					$data['ksp']['Bak Cuci']				= $this->input->post('bak_cuci');
					$data['ksp']['Bak Tampung']				= $this->input->post('bak_tampung');
					$lainnya_unit							= $this->input->post('lainnya_unit');
					// Unit
					$data['uksp']['Gudang Beku']			= $this->input->post('ugudang_beku');
					$data['uksp']['Gudang Dingin']			= $this->input->post('ugudang_dingin');
					$data['uksp']['ABF']					= $this->input->post('uabf');
					$data['uksp']['Contact Plate Freezer']	= $this->input->post('ucpf');
					$data['uksp']['Tunnel Freezer']			= $this->input->post('utf');
					$data['uksp']['Brine Freezer']			= $this->input->post('ubf');
					$data['uksp']['Retort']					= $this->input->post('uretor');
					$data['uksp']['Seamer']					= $this->input->post('useamer');
					$data['uksp']['Gudang Kering']			= $this->input->post('ugudang_kering');
					$data['uksp']['Bak Cuci']				= $this->input->post('ubak_cuci');
					$data['uksp']['Bak Tampung']			= $this->input->post('ubak_tampung');
					$lainnya_kg	 							= $this->input->post('lainnya_kg');
					foreach($this->input->post('lainnya_sarana') as $k => $i){
						$data['uksp'][$i] 	= $lainnya_unit[$k];
						$data['ksp'][$i] 	= $lainnya_kg[$k];
					}
					// insert sarpras
					foreach($data['ksp'] as $k => $i){
						$data['inpksp'] = array(
							'nama_sarpras' => $k,
							'value_sarpras' => $i,
							'kuantitas_sarpras' => $data['uksp'][$k],
							'skp_id' => $skpid
						);
						$this->model_skp->_insert_for_skp('tbl_sarpras',$data['inpksp']);
					}
					// insert data karyawan
					$data['karyawan'] = array(
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
						'harikerja_karyawan' 	=> $this->input->post('jumlah_hari_kerja'),
						'shift_karyawan' 		=> $this->input->post('jumlah_shift'),
						'skp_id' 				=> $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_karyawan',$data['karyawan']);
					$data['penanggungjawab'] = array(
						'upinama_penanggungjawab' 				=> $this->input->post('pj_upi_pabrik_nama'),
						'upipendidikan_penanggungjawab' 		=> $this->input->post('pj_upi_pabrik_pendidikan'),
						'upipelatihan_penanggungjawab' 			=> $this->input->post('pj_upi_pabrik_sertifikat'),
						'produksinama_penanggungjawab' 			=> $this->input->post('pj_produksi_nama'),
						'produksipendidikan_penanggungjawab' 	=> $this->input->post('pj_produksi_pendidikan'),
						'produksipelatihan_penanggungjawab' 	=> $this->input->post('pj_produksi_sertifikat'),
						'mutunama_penanggungjawab' 				=> $this->input->post('pj_mutu_nama'),
						'mutupendidikan_penanggungjawab' 		=> $this->input->post('pj_mutu_pendidikan'),
						'mutupelatihan_penanggungjawab' 		=> $this->input->post('pj_mutu_sertifikat'),
						'skp_id' 								=> $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_penanggungjawab',$data['penanggungjawab']);
					$data['airbersih'] = array(
						'id_airbersih' 		=> '',
						'sumber_air' 		=> $this->input->post('sumber_air'),
						'pengolahan_air' 	=> $this->input->post('pengolahan_air'),
						'volume_air' 		=> $this->input->post('volume_air'),
						'skp_id' 			=> $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_airbersih',$data['airbersih']);
					$be="";$pe="";
					if(null!==($this->input->post('bentuk_es')))
					{$be = implode(',',$this->input->post('bentuk_es'));}
					if(null!==($this->input->post('penggunaan_es')))
					{$pe = implode(',',$this->input->post('penggunaan_es'));}
					$data['asales'] = array(
						'sendiri_asales' 			=> $this->input->post('produksi_sendiri'),
						'pembelian_asales' 			=> $this->input->post('pembelian_dari'),
						'pembelianjumlah_asales' 	=> $this->input->post('pembelianjumlah'),
						'bentuk_asales' 			=> $be,
						'penggunaan_asales' 		=> $pe,
						'skp_id' 					=> $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_asales',$data['asales']);
					$data['lainnya'] = array(
						'bahanpenolong_infolain' 	=> $this->input->post('bahan_penolong_tambahan'),
						'bahankimia_infolain' 		=> $this->input->post('bahan_kimia_tambahan'),
						'bahanlain_infolain' 		=> $this->input->post('bahan_lainnya'),
						'kemasaninner_infolain' 	=> $this->input->post('jbk_inner'),
						'kemasanmaster_infolain' 	=> $this->input->post('jbk_master'),
						'lainnya_infolain' 			=> $this->input->post('info_lainnya'),
						'skp_id' 					=> $skpid
					);
					$this->model_skp->_insert_for_skp('tbl_infolain',$data['lainnya']);
					// create skp log
					$this->model_skp->_create_skp_log('Pengajuan SKP',$skpid);
				}
				// perform redirect with notification
				$this->nyast->notif_create_notification('Pengajuan SKP Berhasil','Selamat');
				redirect(site_url('skp/create/v2'));
				// - - - - - - - - - - - - - - - - - - - - - - - - -
			}else{
				$this->nyast->notif_create_notification($this->upload->display_errors(),'Pengajuan SKP Gagal');
				redirect(site_url('skp/create/v2'));
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
		$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$ids);
		$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$ids);
		$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$ids);
		$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$ids);
		$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$ids);
		$data['pendidikan']	= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$ids);
		$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$ids);
		$data['air']		= $this->model_skp->_get_by_skp('tbl_airbersih',$ids);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$ids);
		$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp',$ids);
		$data['alur']		= $this->model_skp->_get_by_alur('tbl_alurproses',$id);

		$data['upi']		= $this->model_upi->_get_upi_terdaftar($data['skp'][0]['upi_id']);
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
				$this->model_skp->_create_skp_log('Penjadwalan Pembinaan Dinas',$key);
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
		$data['air']		= $this->model_skp->_get_by_skp('tbl_airbersih',$id);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$id);
		$data['content'] 	= 'pages_content/skp/view_pengajuan_skp_detail';
		if ($this->session->userdata($this->session_prefix.'-userlevel') == 'kp') {
			$this->load->view('index',$data);
		}elseif ($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas' && $data['skp'][0]['kode_provinsi'] == $this->session->userdata($this->session_prefix.'-userkodeprovinsi')) {
			$this->load->view('index',$data);
		}else{
			$this->show404();
		}
	}

	//Tabel Rekomendasi SKP yang dikirimkan oleh dinas ke KP
	public function rekomendasi_list()
	{
		if($this->level=='kp'||$this->level=='admin'){
			$data['page_title'] = 'Daftar Rekomendasi SKP oleh Dinas';
			$data['content'] = 'pages_content/skp/view_rekomendasi_list';
			$data['alurproses']	= $this->model_skp->_get_alur_proses();
			$data['rekomendasi'] = $this->model_skp->_get_rekomendasi_skp();
			foreach ($data['rekomendasi'] as $k => $v) {
				$skpid = $v['idtbl_skp'];
				$getRevisi = $this->model_skp->_check_revisi_rekomendasi($skpid);
				$data['rekomendasi'][$k]['info_revisi'] = '<small>tidak ada</small>';
				if (count($getRevisi) > 0) {
					if ($getRevisi[0]['status'] == 1) {
						$data['rekomendasi'][$k]['info_revisi'] = '<small>Revisi sudah diajukan ke dinas</small>';
					}elseif ($getRevisi[0]['status'] == 2) {
						$data['rekomendasi'][$k]['info_revisi'] = '<small>Perbaikan sudah dilakukan</small>';
					}
				}
			}
			$this->load->view('index',$data);
		}else{
			$this->show404();
		}
	}

	public function rekomendasi_dinas()
	{
		$data['page_title'] = 'Daftar Rekomendasi SKP oleh Dinas';
		$data['content'] = 'pages_content/skp/view_rekomendasi_dinas_list';
		if($this->level=='dinas'){
			$data['rekomendasi'] = $this->model_skp->_get_rekomendasi_skp(null, $this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
			foreach ($data['rekomendasi'] as $k => $v) {
				$skpid = $v['idtbl_skp'];
				$getRevisi = $this->model_skp->_check_revisi_rekomendasi($skpid);
				$data['rekomendasi'][$k]['info_revisi'] = '<small>tidak ada</small>';
				if (count($getRevisi) > 0) {
					if ($getRevisi[0]['status'] == 1) {
						$data['rekomendasi'][$k]['info_revisi'] = '<small>'.$getRevisi[0]['deskripsi'].'</small>';
					} elseif($getRevisi[0]['status'] == 2) {
						$data['rekomendasi'][$k]['info_revisi'] = '<small>Perbaikan sudah diberikan</small>';
					}
				}
			}
		}else{
			$this->show404();
		}
		$this->load->view('index',$data);
	}

	public function edit_rekomendasi_dinas($id)
	{
		$data['page_title'] = 'Edit Rekomendasi SKP oleh Dinas';
		$data['content'] = 'pages_content/skp/view_edit_rekomendasi_dinas_list';
		if($this->level=='dinas'){
			$data['rekomendasi'] = $this->model_skp->_get_rekomendasi_skp($id, $this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
		}else{
			$this->show404();
		}
		$this->load->view('index',$data);
	}

	function action_supervisi($id = null){
		if(null!=$this->input->post('submit')){
			$tgl = $this->input->post('tanggal_kunjungan');
			foreach($this->input->post('supervisi') as $k){
				$ke 			= explode('-',$k);
				$key 			= $ke[0];
				$dt = array(
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
				// update revisi rekomendasi skp
				$reject = $this->model_skp->_check_revisi_rekomendasi($key);
				if(count($reject) > 0 && $reject[0]['status'] == 1) {
					$data = array(
						'status' => 0,
						'deskripsi' => ''
					);
					$this->model_skp->_update_revisi_rekomendasi($key, $data);
				}
				$this->model_skp->_update_skp_status($dtskp,$key);
			}
			// perform redirect with notification
			$this->nyast->notif_create_notification('Penjadwalan Supervisi SKP Berhasil','Selamat');
			redirect(site_url('skp/rekomendasi_list'));
		}else{
			$this->show404();
		}
	}

	function action_reject_skp($id = null){
		if(null!=$this->input->post('submit')){
			$action = $this->input->post('reject_action');
			foreach($this->input->post('supervisi') as $k){
				$ke 			= explode('-',$k);
				$idskp 			= $ke[0];
				if ($action == 1) { // action revisi dokumen
					$reject = $this->model_skp->_check_revisi_rekomendasi($idskp);
					$data = array(
						'status' => 1,
						'deskripsi' => $this->input->post('info_revisi')
					);
					if(count($reject) > 0) {
						$this->model_skp->_update_revisi_rekomendasi($id, $data);
					} else {
						$data['skp_id'] = $idskp;
						$this->model_skp->_insert_revisi_rekomendasi($data);
					}
				} else { // action delete skp rekom
					$this->model_skp->_delete_skp($idskp);
				}
			}
			// perform redirect with notification
			$this->nyast->notif_create_notification('Action reject SKP rekomendasi Berhasil','Selamat');
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
		$data['air']		= $this->model_skp->_get_by_skp('tbl_airbersih',$id);
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
				$ke 			= explode('-',$key);
				$skpid 			= $ke[0];
				$ttdid 			= $ke[1];
				$exstat 		= explode('-',$k);
				$statlog 		= ucfirst($exstat[0]).' '.ucfirst($exstat[1]);
				// update tanda tangan
				$this->model_skp->_update_ttd(array('status_tandatangan'=>$k,'tgl_tandatangan'=>$tgl,'skp_id'=>$skpid),$skpid,$ttdid);
				// create skp log
				// update main skp status
				if($k == 'SKP-dikirim'){
					$this->model_skp->_create_skp_log('SKP telah dikirim ke Dinas KP Provinsi',$skpid,$tgl);
					$this->model_skp->_update_skp_status(array('status_skp'=>'terbit-skp'),$skpid);
				}else{
					$this->model_skp->_create_skp_log($statlog,$skpid,$tgl);
					$this->model_skp->_update_skp_status(array('status_skp'=>'penerbitan-skp'),$skpid);
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
		// strict session page
        $this->_session_restrict(array('kp'));
		$data['page_title'] = 'Daftar Alur Proses';
		$data['content'] = 'pages_content/alurproses/view_alurproses_list';
		$data['alur']	= $this->model_skp->_get_alur_proses();
		$this->load->view('index',$data);
	}

	function action_add_alurproses(){
		if( $this->input->post('submit') != NULL ){
			$param = array(
				'nama_alurproses'	=> $this->input->post('nama'),
				'name_alurproses'	=> $this->input->post('name'),
				'status'			=> 1
			);
			if($this->model_skp->_insert_alur_proses($param)){
				$this->nyast->notif_create_notification('Alur Proses Berhasil Ditambahkan','Penambahan Berhasil');
				redirect(site_url('skp/alurproses'));
			}
		}
	}

	public function delete_alurproses($id){
		if($this->model_skp->_soft_delete_alur_proses($id,array('status'=>0))){
			$this->nyast->notif_create_notification('Alur Proses Berhasil Dihapus','Alur Proses Dihapus');
			redirect(site_url('skp/alurproses'));
		}

	}

	public function action_upload_skp_terbit(){
		if(null!=$this->input->post('submit')){
			// get skpterbit data
			$skpData = $this->model_skp->_get_skp_terbit_id($this->input->post('id_skp_terbit'));
			if($skpData[0]['file_skp_terbit'] != ""){
				// hapus dulu
				$oldPath = '.'.$skpData[0]['file_skp_terbit'];
				if(file_exists($oldPath)){
					unlink($oldPath);
				}
			}
			// upload file
			$config['allowed_types']    = 'jpg|jpeg|pdf|doc|docx';
			$config['upload_path'] 		= './file/skp-terbit';
			$config['max_size'] 		= 0;
			$config['file_name'] 		= $skpData[0]['idtbl_skp_terbit'].'-'.str_replace(array('/','.'),'',$skpData[0]['noseri_skp_terbit']);
			$this->load->library('upload', $config);
			$fileData = array();
			if($this->upload->do_upload('file_skp_terbit')){
				$fileData = $this->upload->data();
			}
			// update database
			$dt = array(
				'file_skp_terbit'	=> '/file/skp-terbit/'.$fileData['file_name']
			);
			$this->model_skp->_update_skp_terbit($dt,$this->input->post('id_skp_terbit'));
			// redirect
			$this->nyast->notif_create_notification('Upload File SKP Terbit Berhasil','Selamat');
			redirect(site_url('skp/skp_list'));
		}else{
			$this->show404();
		}
	}

	public function print_skp($idskp,$skpname){
		if($idskp != null){
			//$this->load->model('model_user');
			ob_start();
			$data['pejabat'] = $this->model_skp->_get_dirjen();
			$data['skpt'] = $this->model_skp->_get_print_skp_terbit('penerbitan-skp',$idskp);
			$this->load->view('print',$data);
			$html = ob_get_contents();
			ob_end_clean();
			require_once(APPPATH.'third_party/html2pdf/html2pdf.class.php');
			$pdf = new HTML2PDF('P','A4','en');
			$pdf->WriteHTML($html);
			$pdf->Output($skpname.'.pdf');
		}else{
			$this->show404();
		}
	}

	public function print_pengajuan($id,$skpname){
		if($id != null){
			ob_start();
			$data['skp']		= $this->model_skp->_get_skp($id);
			$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$id);
			$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$id);
			$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$id);
			$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$id);
			$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$id);
			$data['pj']			= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$id);
			$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$id);
			$data['air']		= $this->model_skp->_get_by_skp('tbl_airbersih',$id);
			$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$id);
			$this->load->view('print_pengajuan',$data);
			$html = ob_get_contents();
			ob_end_clean();
			require_once(APPPATH.'third_party/html2pdf/html2pdf.class.php');
			$pdf = new HTML2PDF('P','A4','en');
			$pdf->WriteHTML($html);
			$pdf->Output($skpname.'.pdf');
		}else{
			$this->show404();
		}
	}

	public function delete_skp_terbit($id) {
		if($id != null && is_numeric($id) && $id > 0){
			// get skp id
			$id_skp = $this->model_skp->_get_skp_by_terbit($id);
			// soft delete Skp
			$dtskp = array(
				'status_skp' => 'deleted'
			);
			// soft delete Skp terbit
			$this->model_skp->_update_skp_status($dtskp,$id_skp[0]['skp_id']);
			// update main skp status
			$dtskpterbit = array(
				'status' => 0
			);
			$this->model_skp->_update_skp_terbit_status($dtskpterbit,$id);
			// redirect
			$this->nyast->notif_create_notification('Hapus Data SKP Terbit Berhasil','Selamat');
			redirect(site_url('skp/skp_list'));
		} else {
			$this->show404();
		}
	}
}
