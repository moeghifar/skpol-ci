<div class="col-lg-10 col-lg-offset-1">
	<div class="panel">
		<?php echo form_open_multipart(site_url('auth/action_register'),'class="form-register"'); ?>
		<div class="panel-body ">
			<div class="row">
				<div class="col-lg-4">
					<div class="form-group">
						<input name="username" type="text" class="form-control input-md" placeholder="Username" id="username" required>
					</div>
					<div class="form-group">
						<input tooltip="Email harus unik dan aktif untuk menerima notifikasi" name="email" type="email" class="form-control input-md" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input name="password" type="password" class="form-control input-md" placeholder="Password" required>
					</div>
					<div class="form-group">
						<input name="nama_upi" type="text" class="form-control input-md" placeholder="Nama UPI" style="text-transform: uppercase;" required>
					</div>
					<div class="form-group">
						<select class="form-control input-md" name="jenis_upi">
							<option value="">...pilih entitas UPI...</option>
							<option value="PT" >PT</option>
							<option value="CV" >CV</option>
							<option value="UD" >UD</option>
							<option value="Koperasi" >Koperasi</option>
							<option value="Lainnya" >Lainnya</option>
						</select>
					</div>
					<div class="form-group">
						<input name="nama_pemilik" type="text" class="form-control input-md" placeholder="Nama Pemilik UPI" required>
					</div>
					<div class="form-group">
						<input name="nama_penanggungjawab" type="text" class="form-control input-md" placeholder="Nama Penanggung Jawab UPI" required>
					</div>
					<div class="form-group">
						<select class="form-control input-md" name="omzet_tahunan">
							<option value="">...pilih omzet tahunan...</option>
							<option value="< 2.5"> < 2.5 Milyar </option>
							<option value="2.5 - 50"> 2.5 Milyar - 50 Milyar </option>
							<option value="> 50"> > 50 Milyar </option>
						</select>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<select name="tahun_mulai" class="form-control input-md">
							<option>...Pilih tahun mulai beroperasi...</option>
							<?php
							for($x=1950;$x<=date('Y');$x++){
								echo '<option value="'.$x.'">'.$x.'</opion>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<input name="alamat_upi" type="text" class="form-control input-md" placeholder="Alamat UPI" required>
					</div>
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
					<div class="form-group">
						<input name="kabupaten" type="text" class="form-control" placeholder="Kabupaten / Kota" required>
					</div>
					<div class="form-group">
						<input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" required>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<input name="kelurahan" type="text" class="form-control" placeholder="Desa / Kelurahan" required>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<input name="kode_pos" type="text" class="form-control" placeholder="Kode Pos" data-mask="99999" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input name="kontak_upi" type="text" class="form-control input-md numb" placeholder="Nomor Telepon UPI" required>
					</div>
					<div class="form-group">
						<input name="kontakperson_upi" type="text" class="form-control input-md" placeholder="Nama & Nomor Kontak Person" required>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="form-group">
						<input name="alamat_pabrik" type="text" class="form-control input-md" placeholder="Alamat Pabrik" required>
					</div>
					<div class="form-group">
						<input name="nonpwp" type="text" class="form-control input-md" placeholder="No NPWP" data-mask="99.999.999.9–999.999" required>
					</div>
					<div class="form-group">
						<input name="nosiup" type="text" class="form-control input-md" placeholder="No SIUP" required>
					</div>
					<div class="form-group">
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
					<div class="form-group">
						<input name="noiup" type="text" class="form-control input-md" placeholder="No IUP" required>
					</div>
					<div class="form-group">
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
					<div class="form-group">
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
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 mb15">
					<input type="submit" class="btn btn-block btn-success" value="Submit" name="submit">
				</div>
				<div class="col-sm-6 mb15">
					<input type="reset" class="btn btn-block btn-warning" value="Reset" name="reset">
				</div>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</div>
