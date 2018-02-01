<div class="row">
	<div class="col-md-12 mb10">
		<?php
		if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
			?>
			<a class="btn btn-primary" data-toggle="modal" data-target="#tambah-modal-url">Tambah Video Youtube</a>
			<a class="btn btn-primary" data-toggle="modal" data-target="#tambah-modal-file">Tambah File Baru</a>
			<?php
		}
		?>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar Video Pendukung</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="text-align:center;">Video</th>
							<?php
							if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
								?>
								<th style="text-align:center;">File Target User</th>
								<th style="text-align:center;">Aksi</th>
								<?php
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						foreach($dataFile as $k){
							if($k['kategori_file'] == 'video'){
								echo '<tr>';
								echo '<td style="text-align:center;">'.htmlspecialchars_decode($k['file_url']).'<br/>'.$k['file_name'].'</td>';
								if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
									echo '<td>'.strtoupper($k['file_target']).'</td>';
									echo '<td><a class="btn btn-xs btn-danger btn-block" href="'.base_url('setting/do_delete_file/'.$k['id_file_example']).'"><i class="ico ico-remove"></i> Hapus File</a></td>';
								}
								echo '</tr>';
							}
							$i++;
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Daftar File Pendukung</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama File</th>
							<th>URL File</th>
							<?php
							if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
								?>
								<th>File Target User</th>
								<th>Aksi</th>
								<?php
							}
							?>
						</tr>
					</thead>
					<tbody>
						<?php $i=1; foreach($dataFile as $k){ if($k['kategori_file'] == 'file'){?>
							<tr>
								<td><?=$i?></td>
								<td style="width:50%"><?=$k['file_name']?></td>
								<td><a class="btn btn-xs btn-info" href="<?=base_url($k['file_url'])?>" target="_blank"><i class="ico ico-file"></i> Lihat File</a></td>
								<?php
								if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
									?>
									<td><?=strtoupper($k['file_target'])?></td>
									<td>

										<a class="btn btn-xs btn-danger btn-block" href="<?php echo base_url('setting/do_delete_file/'.$k['id_file_example']);?>"><i class="ico ico-remove"></i> Hapus File</a>
									</td>
									<?php
								}
							}
							?>
						</tr>
						<?php $i++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){ ?>
	<!-- START tambah modal -->
	<div id="tambah-modal-url" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Tambah File Baru</h4>
				</div>
				<?=form_open_multipart(site_url('setting/do_add_url'),array('method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Target User</label>
						<select class="form-control" id="selectize-kategori-produk" name="file_target">
							<option value="upi">UPI</option>
							<option value="dinas">Dinas</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">Keterangan Video</label>
						<input type="text" class="form-control" name="keterangan_video" placeholder="Nama File" required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Link Embedd Video</label>
								<input type="text" class="form-control" name="link_video" placeholder="Link Video" required>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
				<?php echo form_close(); ?>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!--/ END modal -->
	<!-- START tambah modal -->
	<div id="tambah-modal-file" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4>Tambah File Baru</h4>
				</div>
				<?=form_open_multipart(site_url('setting/do_add_file'),array('method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">Target User</label>
						<select class="form-control" id="selectize-kategori-produk" name="file_target">
							<option value="upi">UPI</option>
							<option value="dinas">Dinas</option>
						</select>
					</div>
					<div class="form-group">
						<label class="control-label">Nama File</label>
						<input type="text" class="form-control" name="file_name" placeholder="Nama File" required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Upload File</label>
								<div class="input-group">
									<input name="file_name_url" flag="prevent" type="text" class="form-control" placeholder="Upload File" for="file_url" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_url">
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
				<?php echo form_close(); ?>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div>
	<!--/ END modal -->
	<?php } ?>
