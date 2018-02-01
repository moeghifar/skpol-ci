<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Pembinaan</h3>
				<div class="panel-toolbar text-right"><a href="" id="jadwalSekaligus" style="padding:5px 25px;" class="btn btn-success btn-sm pull-right disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-kunjungan-terjadwal">SELESAI PEMBINAAN</a></div>
			</div>
			<div class="panel-body">
				<form action="" method="POST" class="form-kunjungan-terjadwal">
					<table class="table table-striped table-bordered" id="table-checkbox">
						<thead>
							<tr>
								<th>
									<input name="select_all" id="example-select-all" type="checkbox" />
								</th>
								<th>#</th>
								<th>Nama UPI</th>
								<th>Provinsi</th>
								<th>Kabupaten</th>
								<th>Nama Produk</th>
								<th>Tanggal Kunjungan</th>
								<th style="width:40px;"></th>
							</tr>
						</thead>
						<tbody>
							<?php $x= 1; foreach ($jadwal as $key => $value) { ?>
								<tr>
									<td><input name="terjadwal[]" value="<?=$value['idtbl_skp'].'-'.$value['idtbl_kunjungan']?>" type="checkbox" /></td>
									<td><?=$x?></td>
									<td><?=strtoupper($value['nama_upi'])?></td>
									<td><?=$value['nama_provinsi']?></td>
									<td><?=$value['kabupaten_upi']?></td>
									<td><?=$value['namaind_produk']?></td>
									<td><?=$this->nyast->date_indo_format($value['tgl_kunjungan'])?></td>
									<td>
										<a class="btn btn-xs btn-inverse" href="<?php echo site_url('kunjungan/kunjungan_detail/'.$value['idtbl_skp']);?>"><i class="ico ico-search"></i> Detail</a>
									</td>
								</tr>
							<?php $x++; } ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<?php if($this->level == 'dinas'){ ?>
<!-- START modal-sm -->
<div id="modalCheckbox" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Upload Saran</h3>
			</div>
			<?=form_open_multipart(site_url('kunjungan/action_kunjungan_selesai'),array('class'=>'upload-temuan','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Pembina Mutu</label>
								<input name="pic_kunjungan" type="text" class="form-control mb10" placeholder="Masukan Nama Pembina Mutu" required/>
							</div>
							<div class="col-sm-12">
								<label class="control-label">File Temuan</label>
								<div class="input-group">
									<input name="file_name_temuan" flag="prevent" type="text" class="form-control" placeholder="Upload File Temuan" for="file_temuan" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_temuan">
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="formContainer"></div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
<?php }elseif($this->level == 'kp'){ ?>
<!-- START modal-sm -->
<div id="modalCheckbox" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Upload Saran Supervisi</h3>
			</div>
			<?=form_open_multipart(site_url('kunjungan/action_supervisi_selesai'),array('class'=>'upload-temuan','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Pembina Mutu Pusat</label>
								<input name="pic_kunjungan" type="text" class="form-control mb10" placeholder="Masukan Nama Pembina Mutu Pusat" required/>
							</div>
							<div class="col-sm-12">
								<label class="control-label">File Saran</label>
								<div class="input-group">
									<input name="file_name_temuan" flag="prevent" type="text" class="form-control" placeholder="Upload File Saran" for="file_temuan" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_temuan">
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="formContainer"></div>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
<?php } ?>
