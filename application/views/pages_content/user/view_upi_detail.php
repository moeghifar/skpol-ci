<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Informasi UPI</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Pemilik Upi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['pemilik_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['alamat_upi']?>, <?=$user[0]['desa_upi']?>, <?=$user[0]['kecamatan_upi']?>, <?=$user[0]['kabupaten_upi']?>, <?=$user[0]['nama_provinsi']?> Kode Pos <?=$user[0]['kodepos_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">User Name</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['username']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['email']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Status Login</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
							<?php
								if ($user[0]['login_status'] == 1) {
									echo "Aktif";
								}else {
									echo "Non Aktif";
								}
							?>
						</p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('user/upi');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
