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
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Pemilik Upi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['pemilik_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Penanggung Jawab Upi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['penanggungjawab_upi']?></p>
                    </div>
                </div>
				<div class="form-group">
                    <label class="control-label col-sm-3">Kontak Person</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['kontakperson_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <?php if(isset($upi[0]['alamat_upi'])){?>
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['alamat_upi']?>, <?=$upi[0]['desa_upi']?>, <?=$upi[0]['kecamatan_upi']?>, <?=$upi[0]['kabupaten_upi']?>, <?=$upi[0]['nama_provinsi']?> Kode Pos <?=$upi[0]['kodepos_upi']?> </p>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat Pabrik</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['alamat_pabrik']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tahun Berdiri</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['tahunmulai_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kontak</label>
                    <div class="col-sm-9">
                        <?php if(isset($upi[0]['kontak_upi'])){?>
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['kontak_upi']?> / <?=$upi[0]['kontakperson_upi']?></p>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Omzet Tahunan UPI</label>
                    <div class="col-sm-9">
                        <?php if(isset($upi[0]['omzet_upi'])){?>
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['omzet_upi']?> Milyar</p>
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Email UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['email_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">NPWP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['nonpwp_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No SIUP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><a href="<?php echo base_url('ViewerJS/..'.$upi[0]['filesiup_upi']);?>" target="_blank"><?=$upi[0]['nosiup_upi']?></a></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No IUP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><a href="<?php echo base_url('ViewerJS/..'.$upi[0]['fileiup_upi']);?>" target="_blank"><?=$upi[0]['noiup_upi']?></a></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No Akta Notaris</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><a href="<?php echo base_url('ViewerJS/..'.$upi[0]['fileakta_upi']);?>" target="_blank"><?=$upi[0]['noakta_upi']?></a></p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('upi/filing_list');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
