<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Pengajuan SKP</h3>
				<div class="panel-toolbar text-right"><a href="" style="padding:5px 25px;" class="btn btn-success btn-sm pull-right disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-surat-rekomendasi">Edit Surat Rekomendasi</a></div>
			</div>
			<div class="panel-body">
				<form action="" method="POST" class="form-surat-rekomendasi">
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
								<th>View</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($rekomendasi as $k){ ?>
								<tr>
									<td>
										<input name="perbaikan_selesai[]" value="<?=$k['idtbl_skp'].'-'.$k['idtbl_kunjungan']?>" type="checkbox" />
									</td>
									<td><?=$i?></td>
									<td><?=$k['nama_upi']?></td>
									<td><?=$k['nama_provinsi']?></td>
									<td><?=date("d-m-Y", strtotime($k['tgl_kunjungan']))?></td>
									<td><a class="btn btn-xs btn-inverse" href="<?=base_url($k['rekomendasi_kunjungan'])?>" target="_blank"><i class="ico ico-file"></i> Lihat File</a></td>
									<td><?=$k['namaind_produk']?></td>
									<td><?=$k['info_revisi']?></td>
									<td>
										<a class="btn btn-xs btn-primary" href="<?php echo base_url('skp/detail_rekomendasi_skp/'.$k['idtbl_skp']);?>"><i class="ico ico-search"></i>Lihat Detail</a>
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
				<h3 class="semibold modal-title text-primary">Surat Rekomendasi</h3>
			</div>
			<?=form_open_multipart(site_url('kunjungan/action_edit_rekomendasi'),array('method'=>'post'))?>
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
