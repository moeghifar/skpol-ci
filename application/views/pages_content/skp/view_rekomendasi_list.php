<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Rekomendasi SKP</h3>
				<div class="panel-toolbar text-right">
					<a href="" style="padding:5px 25px;" class="btn btn-danger btn-sm disabled" data-toggle="modal" data-target="#modalCheckboxThree" data-formclass="form-penjadwalan-dinas">REJECT</a>
					<a href="" style="padding:5px 25px;" class="btn btn-success btn-sm disabled" data-toggle="modal" data-target="#modalCheckboxTwo" data-formclass="form-penjadwalan-dinas">TERBITKAN SKP</a>
					<a href="" style="padding:5px 25px;" class="btn btn-primary btn-sm disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-penjadwalan-dinas">SUPERVISI</a>
				</div>
			</div>
			<div class="panel-body">
				<form action="" method="POST" class="form-penjadwalan-dinas">
					<table class="table table-striped table-bordered" id="table-checkbox">
						<thead>
							<tr>
								<th>
									<input name="select_all" id="example-select-all" type="checkbox" />
								</th>
								<th>#</th>
								<th>Nama Upi</th>
								<th>Provinsi</th>
								<th>Tanggal Kunjungan Dinas</th>
								<th>File Rekomendasi</th>
								<th>Nama Produk</th>
								<th>Info Revisi</th>
								<th style="width:40px;">View</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($rekomendasi as $k){ ?>
								<tr>
									<td><input name="supervisi[]" value="<?=$k['idtbl_skp'].'-'.$k['idtbl_kunjungan']?>" type="checkbox" /></td>
									<td><?=$i?></td>
									<td><?=$k['nama_upi']?></td>
									<td><?=$k['nama_provinsi']?></td>
									<td><?=date("d-m-Y", strtotime($k['tgl_kunjungan']))?></td>
									<td><a class="btn btn-xs btn-inverse" href="<?=base_url($k['rekomendasi_kunjungan'])?>" target="_blank"><i class="ico ico-file"></i> Lihat File</a></td>
									<td><?=$k['namaind_produk']?></td>
									<td><?=$k['info_revisi']?></td>
									<td>
										<a class="btn btn-sm btn-xs btn-primary" href="<?php echo base_url('skp/detail_rekomendasi_skp/'.$k['idtbl_skp']);?>"><i class="ico ico-search"></i>Lihat Detail</a>
									</td>
								</tr>
							<?php $i++; } ?>
						</tbody>
					</table>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- START modal-sm -->
<div id="modalCheckbox" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Penjadwalan Supervisi</h3>
			</div>
			<form action="<?=site_url('skp/action_supervisi')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Tanggal Kunjungan</label>
								<input type="text" class="form-control" id="datepicker" placeholder="Pilih Hari" name="tanggal_kunjungan" required/>
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

<!-- START modal-sm -->
<div id="modalCheckboxTwo" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Terbitkan SKP</h3>
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
									<!-- <input id="alurproses" type="text" name="alur_proses" class="form-control" placeholder="Alur Proses" required> -->
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

<!-- START modal-sm -->
<div id="modalCheckboxThree" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Reject SKP</h3>
			</div>
			<form class="reject_skp" action="<?=site_url('skp/action_reject_skp')?>" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Reject Action</label>
									<select name="reject_action" class="form-control">
										<option value="">...pilih reject action...</option>
										<option value="1">Revisi Dokumen</option>
										<option value="2">Hapus Pengajuan (permanen)</option>
									</select>
								</div>
								<div class="form-group info_revisi">
									<label>Info Revisi</label>
									<input type="text" name="info_revisi" class="form-control" placeholder="Info Revisi" required>
									<small>*wajib diisi untuk info revisi dokumen rekomendasi</small>
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
