<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_home');
		$this->load->model('model_skp');
	}
	public function index()
	{
		$data['page_title'] = 'Dashboard';
		if($this->session->userdata($this->session_prefix.'-userlevel') == 'upi'){
			$data['skp'] 			= $this->model_home->_get_last_status_skp($this->session->userdata($this->session_prefix.'-userid'));
			$data['skpTerbit'] 		= $this->model_home->_get_skp_terbit_id($this->session->userdata($this->session_prefix.'-upiid'));
		}elseif($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas') {
			$data['skp'] 			= $this->model_home->_get_last_status_skp(null, $this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
			$data['skpTerbit'] 		= $this->model_home->_get_skp_terbit_id(null, $this->session->userdata($this->session_prefix.'-userkodeprovinsi'));
		}else{
			$data['SkpTerbit']		= $this->model_home->_get_skp_terbit();
			$data['UpiTerdaftar']	= $this->model_home->_get_upi_terdaftar();
			$data['SkpProses']		= $this->model_home->_get_skp_progress();
			$data['SkpProsesBaru']	= $this->model_home->_get_skp_progress_baru();
			$data['SkpProsesPer']	= $this->model_home->_get_skp_progress_perpanjang();
			$data['skp'] 			= $this->model_home->_get_last_status_skp();
			$data['skpTerbit'] 		= $this->model_home->_get_skp_terbit_id();
		}
		$data['pagetype'] = 'dashboard';
		$data['content'] = 'pages_content/view_dashboard';
		$this->load->view('index',$data);
	}

	public function history($id){
		$data['page_title'] = 'Detail History';
		$data['skp'] 		= $this->model_home->_get_status_skp($id);
		$data['pagetype'] = 'history';
		$data['content'] = 'pages_content/view_dashboard';
		if ($this->session->userdata($this->session_prefix.'-userlevel') == 'upi') {
			if ($data['skp'][0]['id_user']==$this->session->userdata($this->session_prefix.'-userid')) {
				$this->load->view('index',$data);
			}else{
				$this->show404();
			}
		}elseif ($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas') {
			if ($data['skp'][0]['kode_provinsi']==$this->session->userdata($this->session_prefix.'-userkodeprovinsi')) {
				$this->load->view('index',$data);
			}else{
				$this->show404();
			}
		}else{
			$this->load->view('index',$data);
		}
	}

	public function monitoring_skp()
	{
		$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp');
		$data['page_title'] = 'Monitoring SKP';
		$data['content'] = 'pages_content/view_monitoring_skp';
		$this->load->view('index',$data);
	}

	public function detail_skp($id,$ids)
	{
		$data['page_title'] = 'Detail SKP';
		$data['pemasaran']	= $this->model_skp->_get_by_skp('tbl_pemasaran',$id);
		$data['bahanbaku']	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$id);
		$data['sni']		= $this->model_skp->_get_by_skp('tbl_sni',$id);
		$data['sarpras']	= $this->model_skp->_get_by_skp('tbl_sarpras',$ids);
		$data['karyawan']	= $this->model_skp->_get_by_skp('tbl_karyawan',$ids);
		$data['pendidikan']	= $this->model_skp->_get_by_skp('tbl_penanggungjawab',$ids);
		$data['es']			= $this->model_skp->_get_by_skp('tbl_asales',$ids);
		$data['air']		= $this->model_skp->_get_by_skp('tbl_airbersih',$ids);
		$data['lain']		= $this->model_skp->_get_by_skp('tbl_infolain',$ids);
		$data['skp']		= $this->model_skp->_get_skp_terbit('terbit-skp',$ids);
		$data['alur']		= $this->model_skp->_get_by_alur('tbl_alurproses',$id);
		$data['content'] = 'pages_content/view_monitoring_skp_detail';
		$this->load->view('index',$data);
	}

	public function exportExcel($opt){
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		switch($opt){

			case 'upi_terdaftar':
			$titleName = 'REPORT-UPI-TERDAFTAR';
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle($titleName);
			// set table heading
			$heading = array(
				'Nama UPI','Alamat UPI','Kelurahan','Kecamatan','Kode Pos','Kota / Kabupaten','Propinsi','Alamat Pabrik','Nama Pemilik UPI','Nama Penanggung Jawab UPI','Kontak Person','Email',
				'Entitas UPI','Jenis UPI','Skala UPI','Omzet UPI','Tahun Berdiri','No. NPWP','No. SIUP','No. IUP','No. Akta'
			);
			$this->excel->getActiveSheet()->fromArray($heading, NULL, 'A3');
			//coloring header
			$this->excel->getActiveSheet()->getStyle('A3:U3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCFDFB0');

			//set aligment to center
			$this->excel->getActiveSheet()->getStyle('A3:U3')->getAlignment()->setWrapText(TRUE);
			$this->excel->getActiveSheet()->getStyle('A3:U3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:U3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:U3')->getFont()->setBold(TRUE);
			//set height
			$this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(46);
			//set width
			for($col = 'A'; $col !== 'V'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(TRUE);
			}
			$upi = $this->model_home->_get_upi_terdaftar();
			foreach($upi as $vupi){
				$generated[$vupi['idtbl_upi']][] = $vupi['nama_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['alamat_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['desa_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['kecamatan_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['kodepos_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['kabupaten_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['nama_provinsi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['alamat_pabrik'];
				$generated[$vupi['idtbl_upi']][] = $vupi['pemilik_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['penanggungjawab_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['kontakperson_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['email'];
				$generated[$vupi['idtbl_upi']][] = $vupi['entitas_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['jenis_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['skala_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['omzet_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['tahunmulai_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['nonpwp_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['nosiup_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['noiup_upi'];
				$generated[$vupi['idtbl_upi']][] = $vupi['noakta_upi'];
			}
			// --- //
			$startValue = 4;
			foreach($generated as $v){
				$startPoint = 'A'.$startValue;
				$this->excel->getActiveSheet()->fromArray($v, NULL, $startPoint);
				$startValue++;
			}
			$lastRow = substr($startPoint,1);
			$this->excel->getActiveSheet()->getStyle('S4:U'.$lastRow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
			break;

			case 'skp_terbit':
			$titleName = 'REPORT-SKP-TERBIT';
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle($titleName);
			// set table heading
			$heading = array(
				'Nama UPI','Alamat UPI','No. Telp/Fax','Nama dan Nomor Kontak','Email','Propinsi','Kabupaten','Kecamatan','Kelurahan','Kode Pos','Nama Pemilik','Tahun Mulai Operasi','Omzet Tahunan','NPWP','No. SIUP','No. IUP','No. Akta Notaris','Jenis UPI','Jenis Olahan','Jenis Produk (bahasa)','Jenis Produk (english)','Tahapan Pengolahan (bahasa)','Tahapan Pengolahan (english)','Total Realisasi Produksi','Jenis Ikan Bahan Baku',
				'Jumlah Unit Gudang Beku','Kapasitas Gudang Beku', 'Jumlah Unit Gudang Dingin', 'Kapasitas Gudang Dingin', 'Jumlah Unit ABF', 'Kapasitas ABF', 'Jumlah Unit Contact Plate Freezer', 'Kapasitas Contact Plate Freezer', 'Jumlah Unit Gudang Kering', 'Kapasitas Gudang Kering', 'Tenaga Kerja Laki2', 'Tenaga Kerja Perempuan', 'Jml Hari Kerja', 'Jml Shift',
				'Jenis Permohonan','Tujuan Pemasaran Domestik','Tujuan Pemasaran Ekspor','SUPERVISI','No. Seri SKP','Tgl. Dikeluarkan','Tgl. Kadaluarsa','No. SKP','Penerbitan SKP','Masuk Direktur','Keluar Direktur','Masuk Dirjen','SKP Terbit','SKP Dikirim'
			);
			$this->excel->getActiveSheet()->fromArray($heading, NULL, 'A3');
			//coloring header
			$this->excel->getActiveSheet()->getStyle('A3:R3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCFDFB0');
			$this->excel->getActiveSheet()->getStyle('S3:AU3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFAAC0DD');
			$this->excel->getActiveSheet()->getStyle('AV3:BA3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFC82C0');
			//set aligment to center
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setWrapText(TRUE);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getFont()->setBold(TRUE);
			//set height
			$this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(46);
			//set width
			for($col = 'A'; $col !== 'Z'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(TRUE);
			}
			for($col = 'AA'; $col !== 'AN'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setWidth(20);
			}
			for($col = 'AM'; $col !== 'BB'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(TRUE);
			}

			$skpData = $this->model_home->_get_skp_terbit();
			foreach($skpData as $k => $v){
				$generated[$v['idtbl_skp_terbit']][] = $v['nama_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['alamat_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kontak_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kontakperson_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['email'];
				$generated[$v['idtbl_skp_terbit']][] = $v['nama_provinsi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kabupaten_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kecamatan_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['desa_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kodepos_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['pemilik_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['tahunmulai_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['omzet_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['nonpwp_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['nosiup_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['noiup_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['noakta_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['jenis_upi'];
				$generated[$v['idtbl_skp_terbit']][] = $v['kategori_produk'];
				$generated[$v['idtbl_skp_terbit']][] = $v['namaind_produk'];
				$generated[$v['idtbl_skp_terbit']][] = $v['namaen_produk'];
				$generated[$v['idtbl_skp_terbit']][] = $v['nama_alurproses'];
				$generated[$v['idtbl_skp_terbit']][] = $v['name_alurproses'];
				$generated[$v['idtbl_skp_terbit']][] = $v['realisasiproduksi_skp'];
				// detail skp
				$pemas	= $this->model_skp->_get_by_skp('tbl_pemasaran',$v['skp_id']);
				$bb	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$v['skp_id']);
				$sarpras = $this->model_skp->_get_by_skp('tbl_sarpras',$v['skp_id']);
				$kar	= $this->model_skp->_get_by_skp('tbl_karyawan',$v['skp_id']);
				$log	= $this->model_skp->_get_by_skp('tbl_skp_log',$v['skp_id']);
				$bbready = '';
				foreach($bb as $vbb){
					if ($vbb['kategori_bahanbaku']=='tangkapan') {
						$bbready .= 'Tangkapan : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
					if ($vbb['kategori_bahanbaku']=='budidaya') {
						$bbready .= 'Budidaya : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
					if ($vbb['kategori_bahanbaku']=='import') {
						$bbready .= 'Import : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
				}
				$generated[$v['idtbl_skp_terbit']][] = $bbready;
				$sarprasready = '';
				foreach($sarpras as $vsarpras){
					if ($vsarpras['nama_sarpras']=='Gudang Beku') {
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Gudang Dingin') {
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='ABF') {
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Contact Plate Freezer') {
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Gudang Kering') {
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp_terbit']][] = $vsarpras['value_sarpras'];
					}
				}
				// tenaga kerja lk
				$generated[$v['idtbl_skp_terbit']][] = $kar[0]['admasinglk_karyawan']+$kar[0]['olahasinglk_karyawan']+$kar[0]['admtetaplk_karyawan']+$kar[0]['olahtetaplk_karyawan']+$kar[0]['admharilk_karyawan']+$kar[0]['olahharilk_karyawan'];
				// tenaga kerja pr
				$generated[$v['idtbl_skp_terbit']][] = $kar[0]['admasingpr_karyawan']+$kar[0]['olahasingpr_karyawan']+$kar[0]['admtetappr_karyawan']+$kar[0]['olahtetappr_karyawan']+$kar[0]['admharipr_karyawan']+$kar[0]['olahharipr_karyawan'];
				// hari kerja
				$generated[$v['idtbl_skp_terbit']][] = $kar[0]['harikerja_karyawan'];
				// shift
				$generated[$v['idtbl_skp_terbit']][] = $kar[0]['shift_karyawan'];
				// jenis permohonan
				$generated[$v['idtbl_skp_terbit']][] = $v['permohonan_skp'];
				$mancaready = '';
				$domready = '';
				foreach($pemas as $vpemas){
					if($vpemas['jenis_pemasaran']=='domestik'){
						$domready .= ucfirst($vpemas['tujuan_pemasaran']).'; ';
					}
					if($vpemas['jenis_pemasaran']=='mancanegara'){
						$mancaready .= ucfirst($vpemas['tujuan_pemasaran']).'; ';
					}
				}
				// tujuan domestik
				$generated[$v['idtbl_skp_terbit']][] = $domready;
				// tujuan internasional
				$generated[$v['idtbl_skp_terbit']][] = $mancaready;
				// no seri skp
				$generated[$v['idtbl_skp_terbit']][] = '-';
				// no seri skp
				$generated[$v['idtbl_skp_terbit']][] = '#'.$v['noseri_skp_terbit'];
				// tgl skp terbit
				$generated[$v['idtbl_skp_terbit']][] = $v['tglmulai_skp_terbit'];
				// tgl kadaluarsa
				$generated[$v['idtbl_skp_terbit']][] = $v['tglkadaluarsa_skp_terbit'];
				// no skp
				$generated[$v['idtbl_skp_terbit']][] = $v['no_skp_terbit'];
				foreach($log as $vlog){
					if($vlog['status_log']=='Penerbitan SKP'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
					if($vlog['status_log']=='Masuk Direktur'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
					if($vlog['status_log']=='Keluar Direktur'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
					if($vlog['status_log']=='Masuk Dirjen'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
					if($vlog['status_log']=='SKP Terbit'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
					if($vlog['status_log']=='SKP telah dikirim ke Dinas KP Provinsi'){
						$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
					}
				}
			}
			// --- //
			$startValue = 4;
			foreach($generated as $v){
				$startPoint = 'A'.$startValue;
				$this->excel->getActiveSheet()->fromArray($v, NULL, $startPoint);
				$startValue++;
			}
			$lastRow = substr($startPoint,1);
			$this->excel->getActiveSheet()->getStyle('O4:Q'.$lastRow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
			break;

			case 'skp_pengajuan':
			$titleName = 'REPORT-PENGAJUAN-SKP';
			//name the worksheet
			$this->excel->getActiveSheet()->setTitle($titleName);
			// set table heading
			$heading = array(
				'Nama UPI','Alamat UPI','No. Telp/Fax','Nama dan Nomor Kontak','Email','Propinsi','Kabupaten','Kecamatan','Kelurahan','Kode Pos','Nama Pemilik','Tahun Mulai Operasi','Omzet Tahunan','NPWP','No. SIUP','No. IUP','No. Akta Notaris','Jenis UPI','Jenis Olahan','Jenis Produk (bahasa)','Jenis Produk (english)','Total Realisasi Produksi','Jenis Ikan Bahan Baku',
				'Jumlah Unit Gudang Beku','Kapasitas Gudang Beku', 'Jumlah Unit Gudang Dingin', 'Kapasitas Gudang Dingin', 'Jumlah Unit ABF', 'Kapasitas ABF', 'Jumlah Unit Contact Plate Freezer', 'Kapasitas Contact Plate Freezer', 'Jumlah Unit Gudang Kering', 'Kapasitas Gudang Kering', 'Tenaga Kerja Laki2', 'Tenaga Kerja Perempuan', 'Jml Hari Kerja', 'Jml Shift',
				'Jenis Permohonan','Tujuan Pemasaran Domestik','Tujuan Pemasaran Ekspor'
				// 'SUPERVISI',
				// 'No. Seri SKP',
				// 'Tgl. Dikeluarkan',
				// 'Tgl. Kadaluarsa',
				// 'No. SKP',
				// 'Penerbitan SKP',
				// 'Masuk Direktur',
				// 'Keluar Direktur',
				// 'Masuk Dirjen',
				// 'SKP Terbit',
				// 'SKP Dikirim'
			);
			$this->excel->getActiveSheet()->fromArray($heading, NULL, 'A3');
			//coloring header
			$this->excel->getActiveSheet()->getStyle('A3:R3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCFDFB0');
			$this->excel->getActiveSheet()->getStyle('S3:AN3')->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFAAC0DD');
			// $this->excel->getActiveSheet()->getStyle('S3:AU3')->getFill()
			// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFAAC0DD');
			// $this->excel->getActiveSheet()->getStyle('AV3:BA3')->getFill()
			// ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFFC82C0');
			//set aligment to center
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setWrapText(TRUE);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$this->excel->getActiveSheet()->getStyle('A3:BA3')->getFont()->setBold(TRUE);
			//set height
			$this->excel->getActiveSheet()->getRowDimension('3')->setRowHeight(46);
			//set width
			for($col = 'A'; $col !== 'Z'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setAutoSize(TRUE);
			}
			for($col = 'AA'; $col !== 'AN'; $col++) {
				$this->excel->getActiveSheet()
				->getColumnDimension($col)
				->setWidth(20);
			}
			// for($col = 'AM'; $col !== 'BB'; $col++) {
			// 	$this->excel->getActiveSheet()
			// 	->getColumnDimension($col)
			// 	->setAutoSize(TRUE);
			// }

			$skpData = $this->model_home->_get_skp_progress();
			foreach($skpData as $k => $v){
				$generated[$v['idtbl_skp']][] = $v['nama_upi'];
				$generated[$v['idtbl_skp']][] = $v['alamat_upi'];
				$generated[$v['idtbl_skp']][] = $v['kontak_upi'];
				$generated[$v['idtbl_skp']][] = $v['kontakperson_upi'];
				$generated[$v['idtbl_skp']][] = $v['email'];
				$generated[$v['idtbl_skp']][] = $v['nama_provinsi'];
				$generated[$v['idtbl_skp']][] = $v['kabupaten_upi'];
				$generated[$v['idtbl_skp']][] = $v['kecamatan_upi'];
				$generated[$v['idtbl_skp']][] = $v['desa_upi'];
				$generated[$v['idtbl_skp']][] = $v['kodepos_upi'];
				$generated[$v['idtbl_skp']][] = $v['pemilik_upi'];
				$generated[$v['idtbl_skp']][] = $v['tahunmulai_upi'];
				$generated[$v['idtbl_skp']][] = $v['omzet_upi'];
				$generated[$v['idtbl_skp']][] = $v['nonpwp_upi'];
				$generated[$v['idtbl_skp']][] = $v['nosiup_upi'];
				$generated[$v['idtbl_skp']][] = $v['noiup_upi'];
				$generated[$v['idtbl_skp']][] = $v['noakta_upi'];
				$generated[$v['idtbl_skp']][] = $v['jenis_upi'];
				$generated[$v['idtbl_skp']][] = $v['kategori_produk'];
				$generated[$v['idtbl_skp']][] = $v['namaind_produk'];
				$generated[$v['idtbl_skp']][] = $v['namaen_produk'];
				// $generated[$v['idtbl_skp']][] = $v['nama_alurproses'];
				// $generated[$v['idtbl_skp']][] = $v['name_alurproses'];
				$generated[$v['idtbl_skp']][] = $v['realisasiproduksi_skp'];
				// detail skp
				$pemas	= $this->model_skp->_get_by_skp('tbl_pemasaran',$v['idtbl_skp']);
				$bb	= $this->model_skp->_get_by_skp('tbl_bahanbaku',$v['idtbl_skp']);
				$sarpras = $this->model_skp->_get_by_skp('tbl_sarpras',$v['idtbl_skp']);
				$kar	= $this->model_skp->_get_by_skp('tbl_karyawan',$v['idtbl_skp']);
				// $log	= $this->model_skp->_get_by_skp('tbl_skp_log',$v['skp_id']);
				$bbready = '';
				foreach($bb as $vbb){
					if ($vbb['kategori_bahanbaku']=='tangkapan') {
						$bbready .= 'Tangkapan : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
					if ($vbb['kategori_bahanbaku']=='budidaya') {
						$bbready .= 'Budidaya : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
					if ($vbb['kategori_bahanbaku']=='import') {
						$bbready .= 'Import : '.ucfirst($vbb['asal_bahanbaku']).'-'.ucfirst($vbb['jenis_bahanbaku']).'-'.ucfirst($vbb['bentuk_bahanbaku']).'; ';
					}
				}
				$generated[$v['idtbl_skp']][] = $bbready;
				$sarprasready = '';
				foreach($sarpras as $vsarpras){
					if ($vsarpras['nama_sarpras']=='Gudang Beku') {
						$generated[$v['idtbl_skp']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Gudang Dingin') {
						$generated[$v['idtbl_skp']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='ABF') {
						$generated[$v['idtbl_skp']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Contact Plate Freezer') {
						$generated[$v['idtbl_skp']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp']][] = $vsarpras['value_sarpras'];
					}
					if ($vsarpras['nama_sarpras']=='Gudang Kering') {
						$generated[$v['idtbl_skp']][] = $vsarpras['kuantitas_sarpras'];
						$generated[$v['idtbl_skp']][] = $vsarpras['value_sarpras'];
					}
				}
				// tenaga kerja lk
				$generated[$v['idtbl_skp']][] = $kar[0]['admasinglk_karyawan']+$kar[0]['olahasinglk_karyawan']+$kar[0]['admtetaplk_karyawan']+$kar[0]['olahtetaplk_karyawan']+$kar[0]['admharilk_karyawan']+$kar[0]['olahharilk_karyawan'];
				// tenaga kerja pr
				$generated[$v['idtbl_skp']][] = $kar[0]['admasingpr_karyawan']+$kar[0]['olahasingpr_karyawan']+$kar[0]['admtetappr_karyawan']+$kar[0]['olahtetappr_karyawan']+$kar[0]['admharipr_karyawan']+$kar[0]['olahharipr_karyawan'];
				// hari kerja
				$generated[$v['idtbl_skp']][] = $kar[0]['harikerja_karyawan'];
				// shift
				$generated[$v['idtbl_skp']][] = $kar[0]['shift_karyawan'];
				// jenis permohonan
				$generated[$v['idtbl_skp']][] = $v['permohonan_skp'];
				$mancaready = '';
				$domready = '';
				foreach($pemas as $vpemas){
					if($vpemas['jenis_pemasaran']=='domestik'){
						$domready .= ucfirst($vpemas['tujuan_pemasaran']).'; ';
					}
					if($vpemas['jenis_pemasaran']=='mancanegara'){
						$mancaready .= ucfirst($vpemas['tujuan_pemasaran']).'; ';
					}
				}
				// tujuan domestik
				$generated[$v['idtbl_skp']][] = $domready;
				// tujuan internasional
				$generated[$v['idtbl_skp']][] = $mancaready;
				// // no seri skp
				// $generated[$v['idtbl_skp_terbit']][] = '-';
				// // no seri skp
				// $generated[$v['idtbl_skp_terbit']][] = '#'.$v['noseri_skp_terbit'];
				// // tgl skp terbit
				// $generated[$v['idtbl_skp_terbit']][] = $v['tglmulai_skp_terbit'];
				// // tgl kadaluarsa
				// $generated[$v['idtbl_skp_terbit']][] = $v['tglkadaluarsa_skp_terbit'];
				// // no skp
				// $generated[$v['idtbl_skp_terbit']][] = $v['no_skp_terbit'];
				// foreach($log as $vlog){
				// 	if($vlog['status_log']=='Penerbitan SKP'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// 	if($vlog['status_log']=='Masuk Direktur'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// 	if($vlog['status_log']=='Keluar Direktur'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// 	if($vlog['status_log']=='Masuk Dirjen'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// 	if($vlog['status_log']=='SKP Terbit'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// 	if($vlog['status_log']=='SKP telah dikirim ke Dinas KP Provinsi'){
				// 		$generated[$v['idtbl_skp_terbit']][] = $vlog['date_log'];
				// 	}
				// }
			}
			// --- //
			$startValue = 4;
			foreach($generated as $v){
				$startPoint = 'A'.$startValue;
				$this->excel->getActiveSheet()->fromArray($v, NULL, $startPoint);
				$startValue++;
			}
			$lastRow = substr($startPoint,1);
			$this->excel->getActiveSheet()->getStyle('O4:Q'.$lastRow)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER);
			break;

			default:
			redirect(site_url());
		}

		$currentDate = date("d-m-Y");
		$filename=$titleName.'-'.$currentDate.'.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}

	public function monitoring_upi()
	{
		$data['page_title'] = 'Monitoring UPI';
		$data['content'] = 'pages_content/view_monitoring_upi';
		$this->load->view('index',$data);
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}

	private function test_send_mail($rec) {
		$conf = array(
			'subject' 	=> 'Notifikasi SKP - Online',
			'message' 	=> 'hi guys! email dari skp online.',
			'from'		=> 'skpolp2hp@gmail.com',
			'to'		=> $rec
		);
		$this->_send_email($conf);
	}

}
