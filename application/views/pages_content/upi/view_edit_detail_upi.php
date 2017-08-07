<div class="col-lg-12">
    <div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title ellipsis">Edit Detail UPI</h3>
		</div>
	    <!-- Register form -->
		<form name="form-edit" action="<?=site_url('upi/action_update_upi/');?>" method="post">
		    <div class="panel-body ">
		        <div class="row">
		        	<div class="col-lg-4">
		                <div class="form-group">
		                	<input name="nama" type="text" class="form-control input-md" placeholder="Nama UPI" required>
		                </div>
		                <div class="form-group">
		                    <select class="form-control input-md" name="entitas">
								<option value="">Jenis Badan Usaha UPI</option>
								<?php
									$et = array('PT'=>'PT','CV'=>'CV','UD'=>'UD','Koperasi'=>'Koperasi','Lainnya'=>'Lainnya'); foreach($et as $e => $t){
											if($upi[0]['entitas_upi'] == $e){
												echo '<option selected value="'.$e.'">'.$t.'</option>';
											}else{
												echo '<option value="'.$e.'">'.$t.'</option>';
											}
									 	}
								?>
							</select>
		                </div>
		                <div class="form-group">
		                	<input name="pemilik" type="text" class="form-control input-md" placeholder="Nama Pemilik UPI" required>
		                </div>
		                <div class="form-group">
		                    <select class="form-control input-md" name="omzet">
								<?php
									$st = array('<2.5'=>'< 2.5 Milyar','2.5 - 50'=>'2.5 Milyar - 50 Milyar','>2.5'=>'> 2.5 Milyar'); foreach($st as $k => $v){
											if($upi[0]['omzet_upi'] == $k){
												echo '<option selected value="'.$k.'">'.$v.'</option>';
											}else{
												echo '<option value="'.$k.'">'.$v.'</option>';
											}
									 	}
								?>
							</select>
		                </div>
						<div class="form-group">
							<input name="kontak" type="text" class="form-control input-md" placeholder="Kontak UPI" required>
						</div>
						<div class="form-group">
							<input name="tahunmulai" type="text" class="form-control input-md" placeholder="Tahun Berdiri" required>
						</div>
		            </div>
		            <div class="col-lg-4">
						<div class="form-group">
							<select class="form-control input-md" name="provinsi">
								<option value="">...pilih provinsi...</option>
								<?php
									foreach($provinsi as $key){
										if($upi[0]['id_provinsi'] == $key['id_provinsi']){
											echo '<option selected value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
										}else{
											echo '<option value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
										}
									}
								?>
							</select>
						</div>
						<div class="form-group">
		                	<input name="alamat" type="text" class="form-control input-md" placeholder="Alamat" required>
		                </div>
		                <div class="form-group">
		                	<input name="kabupaten" type="text" class="form-control input-md" placeholder="Kabupaten/Kota" required>
		                </div>
		                <div class="form-group">
		                	<input name="kecamatan" type="text" class="form-control input-md" placeholder="Kecamatan" required>
		                </div>
		                <div class="form-group">
		                	<input name="desa" type="text" class="form-control input-md" placeholder="Desa" required>
		                </div>
		                <div class="form-group">
		                    <input name="kodepos" type="text" class="form-control input-md" placeholder="Kode Pos" required>
		                </div>
		       		</div>
		       		<div class="col-lg-4">
		       			<div class="form-group">
		                	<input name="nonpwp" type="text" class="form-control input-md" data-mask="99.999.999.9–999.999" placeholder="No NPWP" required>
		                </div>
		       			<div class="form-group">
		                	<input name="nosiup" type="text" class="form-control input-md" placeholder="No SIUP" required>
		                </div>
		                <!--<div class="form-group">
		                	<div class="row">
			                	<div class="col-sm-12">
									<div class="input-group">
										<input name="file_name_siup" type="text" class="form-control" placeholder="Upload File SIUP" for="file_siup" readonly>
										<span class="input-group-btn">
											<div class="btn btn-primary btn-file">
												<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_siup">
											</div>
										</span>
									</div>
			                	</div>
		                	</div>
		                </div>-->
		                <div class="form-group">
		                	<input name="noiup" type="text" class="form-control input-md" placeholder="No IUP" required>
		                </div>
		                <!--<div class="form-group">
		                	<div class="row">
								<div class="col-sm-12">
									<div class="input-group">
										<input name="file_name_siup" type="text" class="form-control" placeholder="Upload File IUP" for="file_iup" readonly>
										<span class="input-group-btn">
											<div class="btn btn-primary btn-file">
												<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_iup">
											</div>
										</span>
									</div>
			                	</div>
			                </div>
		                </div>-->
		                <div class="form-group">
		                	<input name="noakta" type="text" class="form-control input-md" placeholder="No Akta Notaris" required>
		                </div>
		                <!--<div class="form-group">
		                	<div class="row">
								<div class="col-sm-12">
									<div class="input-group">
										<input name="file_name_siup" type="text" class="form-control" placeholder="Upload File Akta" for="file_akta" readonly>
										<span class="input-group-btn">
											<div class="btn btn-primary btn-file">
												<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_akta">
											</div>
										</span>
									</div>
			                	</div>
			                </div>
		                </div>-->
						<input type="hidden" value="<?=$upi[0]['idtbl_upi']?>" name="idupi"/>
		       		</div>
		        </div>

		        <!-- Error container -->
		        <div id="error-container" class="mb15"></div>
		        <!--/ Error container -->
		    </div>
			<div class="panel-footer">
				<?php if($this->session->userdata($this->session_prefix.'-userlevel')!='upi'){?>
				<a href="<?php echo base_url('upi/view_list');?>" class="btn btn-default">Batal</a>
				<?php }?>
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
		<!-- Register form -->


    </div>
</div>
