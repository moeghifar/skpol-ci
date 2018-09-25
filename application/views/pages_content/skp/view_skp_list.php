<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar SKP Terbit</h3>
            </div>
            <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered" id="table-list-unsortable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><i class="ico ico-files"></i></th>
                            <th>Nama Upi</th>
                            <th>Provinsi</th>
                            <th>Produk</th>
                            <th>No. Seri</th>
                            <th>No. SKP</th>
                            <th>Tanggal Berlaku</th>
                            <th>Tanggal Kedaluarsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach($skp as $k){ ?>
                        <tr>
                            <td><?=$i?></td>
                            <td>
								<?php
									if($k['file_skp_terbit']==""){
										echo '<i class="ico ico-file-remove2"></i>';
									}else{
										echo '<a target="_blank" href="'.base_url($k['file_skp_terbit']).'"><i class="ico ico-file-check"></i></a>';
									}
								?>
							</td>
                            <td><?=strtoupper($k['nama_upi'])?></td>
                            <td><?=$k['nama_provinsi']?></td>
                            <td><?=$k['namaind_produk']?></td>
                            <td><?=$k['noseri_skp_terbit']?></td>
                            <td><?=$k['no_skp_terbit']?></td>
                            <td><?=date("d-m-Y", strtotime($k['tglmulai_skp_terbit']))?></td>
                            <td><?=date("d-m-Y", strtotime($k['tglkadaluarsa_skp_terbit']))?></td>
                            <td>
								<a class="btn btn-xs btn-primary mb5" href="<?php echo base_url('skp/detail_skp/'.$k['idtbl_skp_terbit'].'/'.$k['idtbl_skp']);?>"><i class="ico ico-eye-open"></i></a>
                                <a data-toggle="modal" data-target="#deleteModal" data-url="<?=site_url('skp/delete_skp_terbit/'.$k['idtbl_skp_terbit']);?>" class="btn btn-xs btn-danger mb5"><i class="ico-remove"></i></a>
								<?php
									if($this->session->userdata($this->session_prefix.'-userlevel') == 'kp'){
										if($k['file_skp_terbit']==""){
											echo '<a class="btn btn-xs btn-default mb5" data-toggle="modal" data-target="#modalParamDirect" data-url="'.$k['idtbl_skp_terbit'].'"><i class="ico ico-file-upload"></i></a>';
										}else{
											echo '<a class="btn btn-xs btn-default mb5" data-toggle="modal" data-target="#modalParamDirect" data-url="'.$k['idtbl_skp_terbit'].'"><i class="ico ico-upload7"></i></a>';
										}
									}
								?>
							</td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- START modal-sm -->
<div id="modalParamDirect" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">File SKP Terbit</h3>
			</div>
			<?=form_open_multipart(site_url('skp/action_upload_skp_terbit'),array('class'=>'upload-skp-terbit','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">Upload File SKP Terbit</label>
								<div class="input-group">
									<input name="file_name_skp_terbit" flag="prevent" type="text" class="form-control" placeholder="Upload File SKP Terbit" for="file_skp_terbit" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_skp_terbit">
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id_skp_terbit">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->

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
