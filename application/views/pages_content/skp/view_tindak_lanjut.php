<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Daftar Temuan Kunjungan</h3>
				<div class="panel-toolbar text-right"><a href="" style="padding:5px 25px;" class="btn btn-success btn-sm pull-right disabled" data-toggle="modal" data-target="#modalCheckbox" data-formclass="form-tindak-lanjut">UPLOAD PERBAIKAN</a></div>
            </div>
            <div class="panel-body table-responsive">
				<form class="form-tindak-lanjut">
	                <table class="table table-striped table-bordered" id="table-checkbox">
	                    <thead>
	                        <tr>
	                            <th><input name="select_all" id="example-select-all" type="checkbox" /></th>
	                            <th>#</th>
	                            <th>Nama Produk</th>
	                            <th>Tgl Kunjungan</th>
	                            <th>Pembina Mutu</th>
	                            <th>Temuan</th>
	                            <th>Perbaikan</th>
	                            <th>Unit Kerja</th>
	                            <th>Status</th>
	                            <th>Note</th>
	                        </tr>
	                    </thead>
	                    <tbody>
							<?php $x=1; foreach($skpdata as $i=>$v){ ?>
	                        <tr>
	                            <td>
									<!-- <?php
										if($v['perbaikan_kunjungan'] != ''){
									?><i class="ico ico-file"></i><?php
										}else{
									?><input name="perbaikan[]" value="<?=$v['idtbl_skp'].'-'.$v['idtbl_kunjungan'].'-'.$v['perbaikan_kunjungan']?>" type="checkbox" /><?php
										}
									?> -->
									<input name="perbaikan[]" value="<?=$v['idtbl_skp'].'_'.$v['idtbl_kunjungan'].'_'.$v['perbaikan_kunjungan']?>" type="checkbox" />
								</td>
	                            <td><?=$x?></td>
	                            <td><?=$v['namaind_produk']?></td>
	                            <td><?=date("d-m-Y", strtotime($v['tgl_kunjungan']))?></td>
	                            <td><?=$v['pic_kunjungan']?></td>
	                            <td>
	                            	<a class="btn btn-xs btn-block btn-danger" href="<?=site_url($v['temuan_kunjungan'])?>" target="_blank"><i class="ico ico-file"></i> File Temuan</a>
	                            </td>
	                            <td>
									<?php if($v['perbaikan_kunjungan'] != ""){ ?>
									<a class="btn btn-xs btn-block btn-primary" href="<?=site_url($v['perbaikan_kunjungan'])?>" target="_blank"><i class="ico ico-file"></i> File Perbaikan</a>
									<?php } else { ?>
										<i class="ico ico-file-remove"></i> Belum Upload
									<?php } ?>
								</td>
	                            <td><?php if($v['uker_kunjungan']=='kp'){echo 'KKP'; }else{ echo ucfirst($v['uker_kunjungan']); } ?></td>
	                            <td>
	                            	<?php if($v['perbaikan_kunjungan'] != ""){ ?>
	                            		Revisi Perbaikan
	                            	<?php } else { ?>
	                            		<?=$v['status_kunjungan']?>
	                            	<?php } ?>
	                            	
	                            </td>
	                            <td>
	                            	<?php
	                            	if ($v['note_revisi_kunjungan'] != "") {
	                            		echo $v['note_revisi_kunjungan'];
	                            	}else{
	                            		echo "-";
	                            	}
	                            	?>
	                            </td>
	                        </tr>
							<?php $x++; } ?>
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
				<h3 class="semibold modal-title text-primary">Upload Perbaikan</h3>
			</div>
			<?=form_open_multipart(site_url('kunjungan/action_tindak_lanjut'),array('class'=>'upload-temuan','method'=>'post'))?>
				<div class="modal-body">
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<label class="control-label">File Perbaikan</label>
								<div class="input-group">
									<input name="file_name_perbaikan" flag="prevent" type="text" class="form-control" placeholder="Upload File Perbaikan" for="file_perbaikan" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file">
											<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_perbaikan">
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
