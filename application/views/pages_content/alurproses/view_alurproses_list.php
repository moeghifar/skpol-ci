<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tabel Alur Proses </h3>
				<div class="panel-toolbar text-right"><a href="" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tambah-modal">Tambah</a></div>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-striped table-bordered" id="table-list-unsortable">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Alur Proses (Bahasa)</th>
							<th>Nama Alur Proses (English)</th>
							<th style="text-align:center"><i class="ico-list"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php $x = 1; foreach($alur as $p){?>
						<tr>
							<td><?=$x;?></td>
							<td><?=$p['nama_alurproses']?></td>
							<td><?=$p['name_alurproses']?></td>
							<td style="text-align:center"><a data-toggle="modal" data-target="#deleteModal" data-url="<?=site_url('skp/delete_alurproses/'.$p['idtbl_alurproses']);?>" class="btn btn-sm btn-danger"><i class="ico-remove"></i></a></td>
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
				<h4>Tambah</h4>
			</div>
			<form name="upi-detil" action="<?=site_url('skp/action_add_alurproses')?>" method="post">
				<div class="modal-body">
					<div class="panel-body">
						<div class="form-group">
							<label class="control-label">Nama Alur Proses (Bahasa)</label>
							<textarea class="form-control" name="nama"></textarea>
						</div>
						<div class="form-group">
							<label class="control-label">Nama Alur Proses (English)</label>
							<textarea class="form-control" name="name"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
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
