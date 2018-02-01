<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Informasi User</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['nama_dinas']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Jabatan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['jabatan_dinas']?></p>
                    </div>
                </div>
                <?php if ($user[0]['level']=='dinas') {?>
				<div class="form-group">
                    <label class="control-label col-sm-3">Provinsi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$user[0]['nama_provinsi']?></p>
                    </div>
                </div>
				<?php }?>
                <div class="form-group">
                    <label class="control-label col-sm-3">Username</label>
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
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('user');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
