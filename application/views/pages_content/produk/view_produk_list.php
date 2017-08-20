<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tabel Produk </h3>
				<div class="panel-toolbar text-right"><a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tambah-modal">Tambah Produk</a></div>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered" id="table-list-unsortable">
					<thead>
						<tr>
							<th>#</th>
							<th>Kategori Produk</th>
							<th>Nama Produk (Bahasa)</th>
							<th>Nama Produk (English)</th>
							<th style="text-align:center">
								<i class="ico-list"></i>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $x = 1; foreach($produk as $p){?>
						<tr>
							<td><?=$x;?></td>
							<td><?=$p['kategori_produk']?></td>
							<td><?=$p['namaind_produk']?></td>
							<td><?=$p['namaen_produk']?></td>
							<td style="text-align:center">
								<?php if($this->session->userdata($this->session_prefix.'-userlevel')=='kp'){?>
									<a data-toggle="modal" data-target="#deleteModal" data-url="<?=site_url('produk/delete_current_product/'.$p['idtbl_produk']);?>" class="btn btn-sm btn-danger"><i class="ico-remove"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php $x++; }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- START tambah modal -->
<div id="tambah-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Tambah Produk</h4>
			</div>
			<form name="upi-detil" action="<?=site_url('produk/action_add_product')?>" method="post">
				<div class="modal-body">
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Kategori Produk</label>
							<select class="form-control" id="selectize-kategori-produk" name="kategori_produk">
								<option value="Asap">Asap</option>
								<option value="Beku">Beku</option>
								<option value="Fermentasi">Fermentasi</option>
								<option value="Kaleng">Kaleng</option>
								<option value="Kering">Kering</option>
								<option value="Segar">Segar</option>
								<option value="Lumatan Daging">Lumatan Daging</option>
								<option value="Reduksi">Reduksi</option>
								<option value="Pindang">Pindang</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</div>
						<div class="form-group">
							<label class="control-label">Nama Produk (Bahasa)</label>
							<input type="text" class="form-control" name="nama_produk" data-parsley-required>
						</div>
						<div class="form-group">
							<label class="control-label">Nama Produk (English)</label>
							<input type="text" class="form-control" name="product_name" data-parsley-required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" class="btn btn-primary" value="Ajukan">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal -->

<!-- START Delete modal -->
<div id="deleteModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<i class="ico ico-warning"></i> Konfirmasi Hapus Data
			</div>
			<div class="modal-body">
				Anda yakin ingin menghapus data ini ??
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				<a id="target-href" class="btn btn-danger">Hapus</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal -->
