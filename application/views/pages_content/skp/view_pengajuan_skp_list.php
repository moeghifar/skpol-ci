<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Pengajuan SKP</h3>
				<?php if($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas'){ ?>
				<div class="panel-toolbar text-right"><a href="" id="jadwalSekaligus" style="padding:5px 25px;" class="btn btn-success btn-sm pull-right disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-penjadwalan-dinas">PEMBINAAN</a></div>
				<?php } ?>
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
								<th>Kabupaten</th>
								<th>Nama Produk</th>
								<th style="width:40px;">View</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($skp as $k){ ?>
								<tr>
									<td><input name="penjadwalan_dinas[]" value="<?=$k['idtbl_skp']?>" type="checkbox" /></td>
									<td><?=$i?></td>
									<td><?=$k['nama_upi']?></td>
									<td><?=$k['nama_provinsi']?></td>
									<td><?=$k['kabupaten_upi']?></td>
									<td><?=$k['namaind_produk']?></td>
									<td>
										<a class="btn btn-sm btn-xs btn-primary" href="<?php echo base_url('skp/detail_pengajuan_skp/'.$k['idtbl_skp']);?>"><i class="ico ico-search"></i>Lihat Detail</a>
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
<?php if($this->session->userdata($this->session_prefix.'-userlevel') == 'dinas'){ ?>
<!-- START modal-sm -->
<div id="modalCheckbox" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Jadwalkan</h3>
			</div>
			<form action="<?=site_url('skp/action_penjadwalan')?>" method="post">
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
<?php } ?>
