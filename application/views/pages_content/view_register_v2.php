<div class="col-lg-8 col-lg-offset-2">
	<div class="panel">
		<?php echo form_open_multipart(site_url('auth/action_register'),'class="form-register"'); ?>
		<div class="panel-body ">
			<div class="row">
				<div class="col-lg-6">
					<div class="form-group">
						<input name="username" type="text" class="form-control input-md" placeholder="Username" id="username" required>
					</div>
					<div class="form-group">
						<input data-toggle="popover" data-placement="top" data-trigger="focus" title="Email harus unik dan aktif untuk menerima notifikasi" name="email" type="email" class="form-control input-md" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input name="password" type="password" class="form-control input-md" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input name="nama_upi" type="text" class="form-control input-md" placeholder="Nama UPI" style="text-transform: uppercase;" required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<select class="form-control input-md" name="jenis_upi">
									<option value="">Entitas Upi</option>
									<option value="PT" >PT</option>
									<option value="CV" >CV</option>
									<option value="UD" >UD</option>
									<option value="Koperasi" >Koperasi</option>
									<option value="Lainnya" >Lainnya</option>
								</select>
							</div>
							<div class="col-lg-6">
								<select class="form-control" name="omzet">
									<option>Omzet Tahunan</option>
									<?php
										$st = array('<2.5'=>'< 2.5 Milyar','2.5 - 50'=>'2.5 Milyar - 50 Milyar','> 50'=>'> 50 Milyar'); foreach($st as $k => $v){
												if($upi[0]['omzet_upi'] == $k){
													echo '<option selected value="'.$k.'">'.$v.'</option>';
												}else{
													echo '<option value="'.$k.'">'.$v.'</option>';
												}
											}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="form-group">
						<select class="form-control input-md" name="provinsi">
							<option value="">...pilih provinsi...</option>
							<?php
							foreach($provinsi as $key){
								echo '<option value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group siup-form-group">
						<input name="nosiup" type="text" class="form-control input-md" placeholder="No SIUP" required>
					</div>
					<div class="form-group siup-form-group">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<input name="file_name_siup" type="text" class="form-control input-md" placeholder="Upload File SIUP" for="file_siup" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file btn-md">
											<span class="icon iconmoon-file-3"><i class="ico ico-upload"></i> </span> Upload <input type="file" name="file_siup">
										</div>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group iup-form-group">
						<input name="noiup" type="text" class="form-control input-md" placeholder="No IUP" required>
					</div>
					<div class="form-group iup-form-group">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<input name="file_name_iup" type="text" class="form-control input-md" placeholder="Upload File IUP" for="file_iup" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file btn-md">
											<span class="icon iconmoon-file-3"><i class="ico ico-upload"></i> </span> Upload <input type="file" name="file_iup">
										</div>
									</span>
								</div>

							</div>
						</div>
					</div>
					<!-- <div class="form-group">
						<input name="noakta" type="text" class="form-control input-md" placeholder="No Akta Notaris" required>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<input name="file_name_akta" type="text" class="form-control input-md" placeholder="Upload File Akta" for="file_akta" readonly>
									<span class="input-group-btn">
										<div class="btn btn-primary btn-file btn-md">
											<span class="icon iconmoon-file-3"><i class="ico ico-upload"></i> </span>Upload <input type="file" name="file_akta">
										</div>
									</span>
								</div>

							</div>
						</div>
					</div> -->
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 mb15">
					<input type="submit" class="btn btn-block btn-success" value="Submit Pendaftaran" name="submit">
				</div>
				<div class="col-sm-6 mb15">
					<input type="reset" class="btn btn-block btn-warning" value="Reset" name="reset">
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>