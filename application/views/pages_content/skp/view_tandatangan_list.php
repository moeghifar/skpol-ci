<?php $level = $this->session->userdata($this->session_prefix.'-userlevel'); ?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Proses Tanda Tangan SKP</h3>
				<div class="panel-toolbar text-right">
					<?php
					if($level == "kp"){
						?>
						<a href="" style="padding:5px 25px;" class="btn btn-success btn-sm disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-update-ttd">UPDATE TANDA TANGAN</a>
						<?php
					}
					?>
				</div>
			</div>
			<div class="panel-body table-responsive">
				<form class="form-update-ttd">
					<table class="table table-striped table-bordered" id="table-checkbox">
						<thead>
							<tr>
								<th><input name="select_all" id="example-select-all" type="checkbox" /></th>
								<th>#</th>
								<th>Nama Upi</th>
								<th>Provinsi</th>
								<th>Nama Produk</th>
								<th>Nomor Seri SKP</th>
								<th>Nomor SKP</th>
								<th>Status</th>
								<th>Log</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $x=1; foreach($skpt as $s){?>
								<tr>
									<td>
										<?php
										if($s['status_tandatangan'] == ""){
											$next = 'masuk-direktur';
										}elseif($s['status_tandatangan'] == "masuk-direktur"){
											$next = 'keluar-direktur';
										}elseif($s['status_tandatangan'] == "keluar-direktur"){
											$next = 'masuk-dirjen';
										}elseif($s['status_tandatangan'] == "masuk-dirjen"){
											$next = 'SKP-terbit';
										}elseif($s['status_tandatangan'] == "SKP-terbit"){
											$next = 'SKP-dikirim';
										}
										if($level == "kp"){
											?><input name="update_ttd[<?=$s['idtbl_skp'].'-'.$s['idtbl_tandatangan']?>]" value="<?=$next?>" type="checkbox" /><?php
										}
										?>
									</td>
									<td><?=$x?></td>
									<td><?=strtoupper($s['nama_upi'])?></td>
									<td><?=$s['nama_provinsi']?></td>
									<td><?=$s['namaind_produk']?></td>
									<td><?=$s['noseri_skp_terbit']?></td>
									<td><?=$s['no_skp_terbit']?></td>
									<td>
										<?php
										if($s['status_tandatangan'] == ""){
											echo 'belum ada';
										}else{
											$exstat = explode('-',$s['status_tandatangan']);
											echo '<span style="font-size:9pt">status saat ini:</span><br/>';
											echo '<strong>'.ucfirst($exstat[0]).' '.ucfirst($exstat[1]).'</strong>';
											if(isset($next)){
												$nextstat = explode('-',$next);
												echo '<br/><span style="font-size:9pt">status selanjutnya:</span><br/>';
												echo '<strong>'.ucfirst($nextstat[0]).' '.ucfirst($nextstat[1]).'</strong>';
											}
										}
										?>
									</td>
									<td>
										<?php 
											$ttd = '0000-00-00';
											if (!empty($s['tgl_tandatangan'])) {
												$ttd = $s['tgl_tandatangan'];
											}
											echo $this->nyast->date_indo_format($ttd);
										?>
									</td>
									<td>
										<a class="btn btn-xs btn-primary" target="_blank" href="<?php echo base_url('skp/print_skp/'.$s['idtbl_skp'].'/'.$s['noseri_skp_terbit']);?>"><i class="ico ico-print"></i> Print</a>
									</td>
								</tr>
							<?php $x++; }?>
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
				<h3 class="semibold modal-title text-primary">Update Tanda Tangan</h3>
			</div>
			<?=form_open(site_url('skp/action_update_ttd'),array('class'=>'update-ttd','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-12">
									<label class="control-label">Tanggal Tanda Tangan</label>
									<input name="tgl_ttd" type="text" class="form-control" id="datepicker" placeholder="Pilih Tanggal Tanda Tangan" required />
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<div class="formContainer"></div>
					<button onclick="clearInput('update-ttd')" type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
