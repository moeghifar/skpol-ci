<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Perbaikan</h3>
				<div class="panel-toolbar text-right"><a href="" style="padding:5px 25px;" class="btn btn-success btn-sm pull-right disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-temuan-kunjungan">SETUJUI PERBAIKAN TEMUAN</a></div>
            </div>
            <div class="panel-body">
				<form action="" method="POST" class="form-temuan-kunjungan">
					<table class="table table-striped table-bordered" id="table-checkbox">
						<thead>
							<tr>
								<th>
									<input name="select_all" id="example-select-all" type="checkbox" />
								</th>
								<th>#</th>
								<th>Nama UPI</th>
								<!-- <th>Provinsi</th> -->
								<th>File Perbaikan</th>
								<th>Nama Produk</th>
								<th>Pembina Mutu</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php $x= 1; foreach ($perbaikan as $key => $value) { ?>
								<tr>
									<td>
										<?php
											if($value['status_kunjungan'] == 'Menunggu Perbaikan'){
										?><i class="ico ico-file-remove"></i><?php
											}else{
										?><input name="perbaikan_selesai[]" value="<?=$value['idtbl_skp'].'-'.$value['idtbl_kunjungan']?>" type="checkbox" /><?php
											}
										?>
									</td>
									<td><?=$x?></td>
									<td><?=strtoupper($value['nama_upi'])?></td>
									<!-- <td><?=$value['nama_provinsi']?></td> -->
									<td>
										<?php
											if($value['status_kunjungan'] == 'Menunggu Perbaikan'){
										?><i class="ico ico-file-remove"></i><?php
											}else{
										?><a class="btn btn-xs btn-block btn-danger" href="<?=site_url($value['perbaikan_kunjungan'])?>" target="_blank"><i class="ico ico-file"></i> File Perbaikan</a>
										<?php
											}
										?>
									</td>
									<td><?=$value['namaind_produk']?></td>
									<td><?=$value['pic_kunjungan']?></td>
									<td>
										<?php
											if($value['status_kunjungan'] == 'Menunggu Perbaikan'){
												echo '<span class="label label-danger">'.$value['status_kunjungan'].'</label>';
											}else{
												echo '<span class="label label-primary">'.$value['status_kunjungan'].'</label>';
											}
										?>
									</td>
									<td>
										<a class="btn btn-xs btn-success" href="<?php echo site_url('kunjungan/perbaikan_edit/'.$value['idtbl_skp']);?>"><i class="ico ico-edit"></i></a>
										<a class="btn btn-xs btn-primary" href="<?php echo site_url('kunjungan/perbaikan_detail/'.$value['idtbl_skp']);?>"><i class="ico ico-search"></i></a>
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

<?php if($this->level == 'kp'){ ?>

	<!-- START modal-sm -->
	<div id="modalCheckbox" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3 class="semibold modal-title text-primary">Setujui Perbaikan dan Terbitkan SKP</h3>
				</div>
				<?=form_open(site_url('kunjungan/action_terbit_skp'),array('class'=>'upload-temuan','method'=>'post'))?>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Peringkat UPI</label>
										<select name="peringkat_upi" class="form-control">
											<option value="">...pilih peringkat UPI...</option>
											<option value="a">A</option>
											<option value="b">B</option>
											<option value="c">C</option>
											<option value="gagal">Gagal</option>
										</select>
									</div>
									<div class="form-group">
										<label>No Seri SKP</label>
										<input type="text" name="no_seri_skp" class="form-control" placeholder="Nomor Seri SKP" required>
									</div>
									<div class="form-group">
										<label>No SKP</label>
										<input type="text" name="no_skp" class="form-control" placeholder="Nomor SKP" required>
									</div>
									<div class="form-group">
										<label>Alur Proses</label>
										<select name="alur_proses" class="form-control">
											<option value="">...pilih alur proses...</option>
											<?php
												foreach($alurproses as $v){
													echo '<option value="'.$v['idtbl_alurproses'].'">'.$v['nama_alurproses'].'</option>';
												}
											?>
										</select>
									</div>
									<div class="ui-front"></div>
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


<?php }elseif($this->level == 'dinas'){ ?>

	<!-- START modal-sm -->
	<div id="modalCheckbox" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h3 class="semibold modal-title text-primary">Surat Rekomendasi</h3>
				</div>
				<?=form_open_multipart(site_url('kunjungan/action_surat_rekomendasi'),array('class'=>'upload-temuan','method'=>'post'))?>
					<div class="modal-body">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label class="control-label">Upload Surat Rekomendasi</label>
									<div class="input-group">
										<input name="file_name_surek" flag="prevent" type="text" class="form-control" placeholder="Upload File Surat Rekomendasi" for="file_surek" readonly>
										<span class="input-group-btn">
											<div class="btn btn-primary btn-file">
												<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_surek">
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
