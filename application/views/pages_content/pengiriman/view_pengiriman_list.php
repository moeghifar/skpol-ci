<?php
    $sessionJen = $this->session->userdata($this->session_prefix.'-userlevel');
	if($sessionJen == 'kp'){
		$level = 'Kantor Pusat';
	}elseif($sessionJen == 'upi'){
		$level = 'UPI';
	}else{
		$level = ucfirst($sessionJen);
	}
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Tabel Pengiriman </h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered" id="table-list-unsortable">
					<thead>
						<tr>
							<th>#</th>
							<?php if($sessionJen != 'upi'){ ?>
							<th>Provinsi</th>
							<th>Nama UPI</th>
							<?php } ?>
							<?php if($sessionJen == 'upi'){ ?>
							<th>Nama Produk</th>
							<?php }?>
							<th>No. SKP</th>
							<th>No. Seri SKP</th>
							<th>Kurir</th>
							<th>Resi</th>
							<th>Tanggal Pengiriman</th>
							<th style="text-align:center"><i class="ico-list"></i></th>
						</tr>
					</thead>
					<tbody>
						<?php $x = 1; foreach($pengiriman as $p){?>
						<tr>
							<td><?=$x;?></td>
							<?php if($sessionJen != 'upi'){ ?>
							<td><?=$p['nama_provinsi']?></td>
							<td><?=$p['nama_upi']?></td>
							<?php } ?>
							<?php if($sessionJen == 'upi'){ ?>
							<td><?=$p['namaind_produk']?></td>
							<?php } ?>
							<td><?=$p['no_skp_terbit']?></td>
							<td><?=$p['noseri_skp_terbit']?></td>
							<td><?=$p['kurir_pengiriman']?></td>
							<td><?=$p['resi_pengiriman']?></td>
							<td><?=$p['tgl_pengiriman']?></td>
							<td style="text-align:center">
								<a href="<?=site_url('pengiriman/detail_pengiriman/'.$p['idtbl_pengiriman']);?>" class="btn btn-xs btn-primary mb5"><i class="ico-eye"></i></a>
								<?php if($sessionJen=='kp'||$sessionJen=='admin'){ ?>
								<a data-toggle="modal" data-target="#deleteModal" data-url="<?=site_url('pengiriman/delete_pengiriman/'.$p['idtbl_pengiriman']);?>" class="btn btn-xs btn-danger mb5"><i class="ico-remove"></i></a>
								<a href="<?=site_url('pengiriman/edit_pengiriman/'.$p['idtbl_pengiriman']);?>" class="btn btn-xs btn-success mb5"><i class="ico-edit"></i></a>
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

<?php if($sessionJen=='kp'||$sessionJen=='admin'){ ?>

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

<?php } ?>
