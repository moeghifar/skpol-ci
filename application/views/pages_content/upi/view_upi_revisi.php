<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar UPI</h3>
            </div>
            <div class="panel-body table-responsive">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="table-list-unsortable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Upi</th>
                                <th>Provinsi</th>
                                <th>Pendaftaran</th>
                                <th width="30%">Alasan</th>
                                <th width="20%">Perbaikan</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $x = 1; foreach($upi as $k){ ?>
                                <tr>
                                    <td><?=$x?></td>
                                    <td><?=strtoupper($k['nama_upi'])?></td>
                                    <td><?=$k['nama_provinsi']?></td>
                                    <td><?=$this->nyast->date_indo_format($k['registration_date'])?></td>
    								<td><?=$k['alasan']?></td>
                                    <td><?php echo ( isset($k['revisi']) ? $k['revisi'] : '<span style="color:red">belum ada</span>' ); ?></td>
                                    <td>
    									<button class="btn btn-sm btn-success mb5" data-idupi="<?=$k['idtbl_upi']?>" data-toggle="modal" data-target="#modalParam"><i class="ico ico-checkmark4"></i></button>
                                        <a href="<?php echo base_url('upi/view_detail_revisi/'.$k['idtbl_upi']);?>" class="btn btn-sm btn-info mb5"><i class="ico ico-search"></i></a>
                                    </td>
                                </tr>
                            <?php $x++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- START modal-sm -->
<div id="modalParam" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-inverse">Konfirmasi Perbaikan</h3>
			</div>
			<form method="post" class="confirm-upi" action="<?=site_url('upi/confirm_upi')?>">
				<div class="modal-body">
					<div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
								<div class="alert alert-info fade in">
								<h5 class="semibold">Jika UPI telah disetujui langsung klik tombol simpan</h5>
								</div>
								<small class="help-block text-danger">*Isi field di bawah jika UPI belum memenuhi persyaratan.</small>
                                <textarea name="alasan" class="form-control" style="max-width:100%;min-width:100%;min-height:80px;"></textarea>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_upi">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
