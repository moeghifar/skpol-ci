<!-- START modal-sm -->
<div id="modalCreateSKP" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Tambah Produk</h3>
			</div>
			<form id="form-multi-produk">
				<div class="modal-body" style="max-height:450px;overflow:scroll;">
					<div class="row">
						<div class="col-sm-12">
							<div class="alert alert-warning fade in">
								<h5 class="semibold">Tata Cara Pengisian</h5>
								<p class="mb10">
									- Semua field pada form wajib diisi <br/>
									- Jika data tidak tersedia gunakan tanda strip (-)
								</p>
							</div>
						</div>
						<div class="col-sm-12" style="margin-bottom:10px;">
							<select placeholder="Nama Produk" class="nama_produk" id="select2-placeholder">
								<option value="">Pilih produk...</option>
								<?php
								$katprod = '';
								foreach($getProduk as $k){
									if($katprod != $k['kategori_produk']){
										echo '<optgroup label="'.$k['kategori_produk'].'">';
										$katprod = $k['kategori_produk'];
									}
									echo '<option value="'.$k['idtbl_produk'].'">'.$k['namaind_produk'].'</option>';
								}
								?>
							</select>
						</div>
						<div class="col-sm-4" style="margin-bottom:10px;">
							<select placeholder="Jenis Pengajuan" class="form-control jenis_pengajuan">
								<option value="">Jenis pengajuan...</option>
								<option value="1">Baru</option>
								<option value="2">Perpanjang</option>
							</select>
						</div>
						<div class="col-sm-8" style="margin-bottom:10px;">
							<div class="input-group">
								<input type="text" placeholder="Total Realisasi Produksi (angka)" class="form-control numb total_realisasi_produk" required>
								<span class="input-group-addon">Kg/Tahun</span>
							</div>
						</div>
						<div id="pemasaran">
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-10">
										<div id="formKota"><input required placeholder="Tujuan Pemasaran Domestik (kota)" type="text" class="form-control mb10" name="kota[]"></div>
									</div>
									<div class="col-sm-2">
										<a class="btn btn-primary mb10" onclick="addKota()"><i class="ico ico-plus"></i></a>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-10">
										<div id="formNegara"><input required placeholder="Tujuan Pemasaran Mancanegara (negara)" type="text" class="form-control mb10" name="negara[]"></div>
									</div>
									<div class="col-sm-2">
										<a class="btn btn-primary mb10" onclick="addNegara()"><i class="ico ico-plus"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div id="bahanbaku">
							<div class="form-group">
								<label class="control-label col-sm-12">Bahan Baku - Hasil Tangkapan</label>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-10" id="formTangkap" style="margin-bottom: 10px;">
											<div class="row">
												<div class="col-sm-4">
													<input type="text" required group-restrict="bahanbaku" group-field="tangkapan0" class="form-control mb10" name="t_asal[]" placeholder="Asal Wilayah">
												</div>
												<div class="col-sm-4">
													<input type="text" required group-field="tangkapan0" class="form-control mb10" name="t_jenis[]" placeholder="Jenis Ikan">
												</div>
												<div class="col-sm-4">
													<input type="text" required group-field="tangkapan0" class="form-control mb10" name="t_bentuk[]" placeholder="Bentuk Ikan">
												</div>
											</div>
										</div>
										<div class="col-sm-1">
											<a class="btn btn-primary" onclick="addTangkap()"><i class="ico ico-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Bahan Baku - Hasil Budidaya</label>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-10" id="formBudidaya" style="margin-bottom: 10px;">
											<div class="row">
												<div class="col-sm-4">
													<input type="text" group-restrict="bahanbaku" group-field="budidaya0" class="form-control mb10" name="b_asal[]" placeholder="Asal Wilayah" required>
												</div>
												<div class="col-sm-4">
													<input type="text" group-field="budidaya0" class="form-control mb10" name="b_jenis[]" placeholder="Jenis Ikan" required>
												</div>
												<div class="col-sm-4">
													<input type="text" group-field="budidaya0" class="form-control mb10" name="b_bentuk[]" placeholder="Bentuk Ikan" required>
												</div>
											</div>
										</div>
										<div class="col-sm-1">
											<a class="btn btn-primary" onclick="addBudidaya()"><i class="ico ico-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-12">Bahan Baku - Hasil Import</label>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-10" id="formImport" style="margin-bottom: 10px;">
											<div class="row">
												<div class="col-sm-4">
													<input type="text" group-restrict="bahanbaku" group-field="import0" class="form-control mb10" name="i_asal[]" placeholder="Asal Wilayah" required>
												</div>
												<div class="col-sm-4">
													<input type="text" group-field="import0" class="form-control mb10" name="i_jenis[]" placeholder="Jenis Ikan" required>
												</div>
												<div class="col-sm-4">
													<input type="text" group-field="import0" class="form-control mb10" name="i_bentuk[]" placeholder="Bentuk Ikan" required>
												</div>
											</div>
										</div>
										<div class="col-sm-1">
											<a class="btn btn-primary" onclick="addImport()"><i class="ico ico-plus"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<button id="btn-tambah-produk" type="submit" class="btn btn-primary">Tambah Produk</button>
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
<div class="row form-scroll">
	<div class="col-md-12">
		<div class="alert alert-info fade in">
		<h4 class="semibold">Tata Cara Pengisian Form Pengajuan SKP</h4>
		<p class="mb10">
			<ol style="font-size:120%;">
				<li>Semua field pada form wajib diisi</li>
				<li>Jika data tidak tersedia gunakan tanda strip (-) untuk kolom text</li>
				<li>Jika data tidak tersedia gunakan angka nol (0) untuk kolom angka</li>
			</ol>
		</p>
		</div>
	</div>
	<div class="col-md-12">
		<!-- Form horizontal layout striped -->
		<?=form_open_multipart(site_url('skp/action_create_skp'),array('class'=>'form-horizontal form-bordered panel panel-default form-create-skp','method'=>'post'))?>

		<!--Produk-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">Daftar Produk</h3>
		</div>
		<div class="panel-body">
			<a class="btn btn-primary mb10" data-toggle="modal" data-target="#modalCreateSKP"><i class="ico ico-plus"></i> Tambah Produk </a>
			<p><strong style="text-align:center;color:red;">Harap Masukan Minimal 1 Produk</strong></p>
			<hr/>
			<div class="table-responsive">
				<table class="table table-responsive" style="font-size:80%;">
					<thead>
						<tr>
							<th style="border-right:1px solid #DDD;">#</th>
							<th style="border-right:1px solid #DDD;">Info Produk</th>
							<th style="border-right:1px solid #DDD;">Pemasaran</th>
							<th>Bahan Baku</th>
						</tr>
					</thead>
					<tbody id="tbl-produk-container">
					</tbody>
				</table>
			</div>
		</div>

		<!--SNI-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">SNI</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">SNI yang Diterapkan</label>
				<div class="col-sm-9">
					<div class="row">
						<div class="col-sm-6">
							<div id="formSni"><input type="text" class="form-control mb10" name="sni[0]" placeholder="SNI / ISO / BRC / HACCP / SKP / Standar Lain" required></div>
						</div>
						<div class="col-sm-6">
							<a class="btn btn-primary" onclick="addSni()"><i class="ico ico-plus"></i> Tambah SNI</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Kapasitas Sarpras-->
		<div class="panel-heading text-center">
			<h3 class="panel-title" id="sarpras">Kapasitas Sarana dan Prasarana</h3>
		</div>
		<div class="panel-body">
			<div class="col-md-12">
				<div class="form-group">
					<label class="control-label col-sm-3">Gudang Beku</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="gedungbeku" class="form-control numb mb10" placeholder="Jumlah Unit" name="ugudang_beku">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="gedungbeku" placeholder="Jumlah Kapasitas" name="gudang_beku">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Gudang Dingin</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="gudangdingin" class="form-control numb mb10" placeholder="Jumlah Unit" name="ugudang_dingin">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="gudang-dingin" placeholder="Jumlah Kapasitas" name="gudang_dingin">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">ABF</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="abf" class="form-control numb mb10" placeholder="Jumlah Unit" name="uabf">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="abf" placeholder="Jumlah Kapasitas" name="abf">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Contact Plate Freezer</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="cpf" class="form-control numb mb10" placeholder="Jumlah Unit" name="ucpf">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="cpf" placeholder="Jumlah Kapasitas" name="cpf">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Tunnel Freezer</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="tf" class="form-control numb mb10" placeholder="Jumlah Unit" name="utf">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="tf" placeholder="Jumlah Kapasitas" name="tf">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Brine Freezer</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" required group-field="bf" class="form-control numb mb10" placeholder="Jumlah Unit" name="ubf">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="bf" placeholder="Jumlah Kapasitas" name="bf">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Retort</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control numb mb10" required group-field="retor" placeholder="Jumlah Unit" name="uretor">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="retor" placeholder="Jumlah Kapasitas" name="retor">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Seamer</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control numb mb10" required group-field="seamer" placeholder="Jumlah Unit" name="useamer">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="seamer" placeholder="Jumlah Kapasitas" name="seamer">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Gudang Kering</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control numb mb10" required group-field="gudangkering" placeholder="Jumlah Unit" name="ugudang_kering">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="gudangkering" placeholder="Jumlah Kapasitas" name="gudang_kering">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Bak Pencuci</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control numb mb10" required group-field="bakcuci" placeholder="Jumlah Unit" name="ubak_cuci">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="bakcuci" placeholder="Jumlah Kapasitas" name="bak_cuci">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Bak Penampungan</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-4">
								<input type="text" class="form-control numb mb10" required group-field="bakpenampungan" placeholder="Jumlah Unit" name="ubak_tampung">
							</div>
							<div class="col-sm-5">
								<div class="input-group">
									<input type="text" class="form-control numb" group-field="bakpenampungan" placeholder="Jumlah Kapasitas" name="bak_tampung">
									<span class="input-group-addon">Kg</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Lainnya</label>
					<div class="col-sm-9">
						<div class="row">
							<div class="col-sm-9" id="formLainnya">
								<div class="row">
									<div class="col-sm-4">
										<input type="text" class="form-control mb10 " name="lainnya_sarana[0]" placeholder="Nama Sarana">
									</div>
									<div class="col-sm-3">
										<input type="text" class="form-control mb10 numb" name="lainnya_unit[0]" placeholder="Unit">
									</div>
									<div class="col-sm-5 mb10">
										<div class="input-group">
											<input type="text" class="form-control numb" placeholder="Kapasitas" name="lainnya_kg[0]">
											<span class="input-group-addon">Kg</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<a class="btn btn-primary" onclick="addLainnya()"><i class="ico ico-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--Tenaga Kerja-->
		<div class="panel-heading text-center">
			<h3 class="panel-title" id="tenaker">Tenaga Kerja</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">Tenaga Kerja Asing</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="tka_administrasi_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="tka_administrasi_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="tka_pengolahan_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="tka_pengolahan_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Tenaga Tetap</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="tt_administrasi_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="tt_administrasi_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="tt_pengolahan_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="tt_pengolahan_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Tenaga Harian</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="th_administrasi_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Administrasi" name="th_administrasi_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="th_pengolahan_l">
							<span class="input-group-addon">L</span>
						</div>
					</div>
					<div class="col-sm-3 mb10">
						<div class="input-group">
							<input type="text" required class="form-control numb" placeholder="Pengolahan" name="th_pengolahan_p">
							<span class="input-group-addon">P</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Jumlah Hari Kerja</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="numb" id="bs-harikerja" name="jumlah_hari_kerja" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Jumlah Shift</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="numb" id="bs-shift" name="jumlah_shift" required>
					</div>
				</div>
			</div>
		</div>

		<!--Penanggung Jawab-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">Penanggung Jawab</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">UPI</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Nama" name="pj_upi_pabrik_nama" required>
					</div>
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Pendidikan" name="pj_upi_pabrik_pendidikan" required>
					</div>
					<div class="col-sm-6 mb10">
						<input type="text" class="form-control" placeholder="Sertifikat (SPI / HACCP / ISO / Sertifikat lain)" name="pj_upi_pabrik_sertifikat" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Produksi</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Nama" name="pj_produksi_nama" required>
					</div>
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Pendidikan" name="pj_produksi_pendidikan" required>
					</div>
					<div class="col-sm-6 mb10">
						<input type="text" class="form-control" placeholder="Sertifikat (SPI / HACCP / ISO / Sertifikat lain)" name="pj_produksi_sertifikat" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Mutu (QC)</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Nama" name="pj_mutu_nama" required>
					</div>
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Pendidikan" name="pj_mutu_pendidikan" required>
					</div>
					<div class="col-sm-6 mb10">
						<input type="text" class="form-control" placeholder="Sertifikat (SPI / HACCP / ISO / Sertifikat lain)" name="pj_mutu_sertifikat" required>
					</div>
				</div>
			</div>
		</div>

		<!--Asal Es-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">Air Bersih</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">Sumber</label>
				<div class="col-sm-9">
					<div class="col-sm-6" style="padding-left: 0px;">
						<input type="text" class="form-control" name="sumber_air" placeholder="PAM / Sumur / Air Tanah / Beli" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Pengolahan</label>
				<div class="col-sm-9">
					<div class="col-sm-6" style="padding-left: 0px;">
						<input type="text" class="form-control" name="pengolahan_air" placeholder="Filter / UV / Ozon / RO" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Volume</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="numb" id="bs-volume" name="volume_air" required>
					</div>
				</div>
			</div>
		</div>

		<!--Asal Es-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">Es Untuk Pengolahan</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">Produksi Sendiri</label>
				<div class="col-sm-9">
					<div class="col-sm-6" style="padding-left: 0px;">
						<div class="input-group">
							<input type="text" class="form-control numb" name="produksi_sendiri" placeholder="Produksi Sendiri (angka)" required>
							<span class="input-group-addon">Kg</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Pembelian Dari</label>
				<div class="col-sm-9">
					<div class="col-sm-6 mb10" style="padding-left: 0px;">
						<input type="text" class="form-control" name="pembelian_dari" placeholder="Pembelian Dari" required>
					</div>
					<div class="col-sm-6 mb10" style="padding-left: 0px;">
						<div class="input-group">
							<input type="text" class="form-control numb" name="pembelianjumlah" placeholder="Jumlah" required>
							<span class="input-group-addon">Kg</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Bentuk Es</label>
				<div class="col-sm-9">
					<label class="checkbox-inline">
						<input type="checkbox" name="bentuk_es[]" value="Curai"> Curai
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="bentuk_es[]" value="Balok"> Balok
					</label>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Penggunaan Es</label>
				<div class="col-sm-9">
					<label class="checkbox-inline">
						<input type="checkbox" name="penggunaan_es[]" value="Penanganan"> Penanganan
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="penggunaan_es[]" value="Penyimpanan Sementara"> Penyimpanan Sementara
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="penggunaan_es[]" value="Distribusi"> Distribusi
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" name="penggunaan_es[]" value="Pengolahan"> Pengolahan
					</label>
				</div>
			</div>
		</div>

		<!--Informasi Lainnya-->
		<div class="panel-heading text-center">
			<h3 class="panel-title">Informasi Lainnya</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label class="control-label col-sm-3">Bahan Tambahan Pangan</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="bahan_penolong_tambahan" placeholder="Bahan Tambahan Pangan (Jika ada)" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Bahan Kimia yang Digunakan</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="bahan_kimia_tambahan" placeholder="Bahan Kimia yang Digunakan (Jika Ada)" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Bahan Lainnya</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<input type="text" class="form-control" name="bahan_lainnya" placeholder="Bahan Lain yang Digunakan (Jika Ada)" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Jenis Bahan Kemasan Produk Akhir</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Inner" name="jbk_inner" required>
					</div>
					<div class="col-sm-3 mb10">
						<input type="text" class="form-control" placeholder="Master" name="jbk_master" required>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Informasi Lainnya</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<textarea style="min-height:80px;max-width:100%;min-width:100%;" class="form-control" name="info_lainnya"></textarea>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Upload File GMP/SSOP</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<div class="input-group">
							<input name="file_name_gmpssop" flag="prevent" type="text" class="form-control" placeholder="Upload File GMPSSOP" for="file_gmpssop" readonly>
							<span class="input-group-btn">
								<div class="btn btn-primary btn-file">
									<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_gmpssop">
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Upload Surat Pengajuan SKP</label>
				<div class="col-sm-9" style="padding-left: 0px">
					<div class="col-sm-6">
						<div class="input-group">
							<input name="file_name_sp" flag="prevent" type="text" class="form-control" placeholder="Upload Surat Pengajuan SKP" for="file_sp" readonly>
							<span class="input-group-btn">
								<div class="btn btn-primary btn-file">
									<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_sp">
								</div>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel-footer">
			<input type="submit" name="submit" value="Ajukan SKP" class="btn btn-primary">
			<input type="reset" name="reset" value="Reset Form" class="btn btn-default">
		</div>
	</form>
	<!--/ Form horizontal layout striped -->
</div>
</div>
