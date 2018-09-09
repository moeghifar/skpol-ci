<div class="col-lg-4 col-lg-offset-4">
    <div class="panel">
	    <?php echo form_open(site_url('auth/action_login')); ?>
	        <div class="panel-body">
				<div class="alert alert-info text-center">
                    <span class="label label-info mb10">Informasi Penggunaan</span>
					<br/>Halaman ini untuk pengguna yang sudah terdaftar.
					<br/><strong>Untuk mendaftar silahkan menuju halaman registrasi melalui tombol Daftar di atas.</strong>
                </div>
	            <div class="form-group">
	                <div class="form-stack has-icon pull-left">
	                    <input name="username" type="text" class="form-control input-lg" placeholder="Username" required="required">
	                    <i class="ico-user2 form-control-icon"></i>
	                </div>
	                <div class="form-stack has-icon pull-left">
	                    <input name="password" type="password" class="form-control input-lg" placeholder="Password" required="required">
	                    <i class="ico-lock2 form-control-icon"></i>
	                </div>
	            </div>
	            <div class="form-group">
	                <div class="row">
	                    <div class="col-xs-12 text-center">
	                        <a href="" data-toggle="modal" data-target="#modalLupaPassword">Lupa Password ?</a>
	                    </div>
	                </div>
	            </div>
	            <div class="form-group nm">
	                <input type="submit" class="btn btn-block btn-success" name="submit" value="Masuk">
	            </div>
	        </div>
	    <?php echo form_close(); ?>
    </div>
	<a style="text-align:left;" target="_blank" href="<?php echo site_url('file/external/faq.pdf') ?>" class="btn btn-block btn-danger"><i class="ico ico-question-sign"></i> Frequently Asked Question</a>
	<a style="text-align:left;" target="_blank" href="<?php echo site_url('file/external/panduan_penggunaan.pdf') ?>" class="btn btn-block btn-danger"><i class="ico ico-info-sign"></i> Panduan penggunaan aplikasi SKP online</a>
	<br/>
	<br/>
</div>
<!-- START modal-sm -->
<div id="modalLupaPassword" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header text-center">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 class="semibold modal-title text-primary">Form Lupa Password</h3>
			</div>
			<?php echo form_open(site_url('auth/forgot_password')); ?>
				<div class="modal-body">
					<div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
								<p class="help-block text-danger">Password baru akan dikirim ke email anda.</p>
                                <input type="text" class="form-control" placeholder="Masukan alamat email anda" name="alamat_email" required/>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" value="Submit Query" class="btn btn-primary">
				</div>
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>
<!--/ END modal-sm -->
