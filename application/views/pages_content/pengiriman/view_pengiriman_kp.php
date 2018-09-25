<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar SKP Terbit Siap Kirim</h3>
				<div class="panel-toolbar text-right">
					<a href="" style="padding:5px 25px;" class="btn btn-success btn-sm disabled" data-toggle="modal" data-target="#modalCheckboxTwo" data-formclass="form-penjadwalan-dinas">Kirim SKP</a>
				</div>
			</div>
		 	<div class="panel-body table-responsive">
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
								<th>Produk</th>
								<th>Nomor Seri</th>
								<th>Nomor SKP</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=1; foreach($skp as $k){ ?>
								<tr>
									<td><input name="kirim[]" value="<?=$k['idtbl_skp_terbit']?>" type="checkbox" /></td>
									<td><?=$i?></td>
									<td><?=$k['nama_upi']?></td>
									<td><?=$k['nama_provinsi']?></td>
									<td><?=$k['namaind_produk']?></td>
									<td><?=$k['noseri_skp_terbit']?></td>
									<td><?=$k['no_skp_terbit']?></td>
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
<div id="modalCheckboxTwo" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Kirim SKP</h3>
			</div>
			<?=form_open(site_url('pengiriman/action_add_pengiriman'),array('class'=>'kirim-skp','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Kurir Pengiriman</label>
									<input type="text" name="kurir" class="form-control" placeholder="Kurir" required>
								</div>
								<div class="form-group">
									<label>Nomor Resi Pengiriman</label>
									<input type="text" name="resi" class="form-control" placeholder="Nomor resi pengiriman" required>
								</div>
								<div class="form-group">
									<label>Alamat Pengiriman</label>
									<textarea type="text" name="alamat" class="form-control" placeholder="Alamat pengiriman" required></textarea>
								</div>
								<div class="form-group">
									<label>Tanggal Pengiriman</label>
									<input type="text" class="form-control" id="datepicker" placeholder="Pilih Hari" name="tanggal" required/>
								</div>
								<div class="form-group">
									<label>Keterangan Tambahan</label>
									<textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan tambahan" required></textarea>
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
