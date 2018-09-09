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
                    <label class="control-label col-sm-3">Entitas & Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">(<?php if(isset($upi[0]['entitas_upi'])){echo $upi[0]['entitas_upi'];} ?>) <?php if(isset($upi[0]['nama_upi'])){echo $upi[0]['nama_upi'];} ?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Pemilik Upi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?php echo (isset($upi[0]['pemilik_upi'])?$upi[0]['pemilik_upi']:""); ?></p>
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
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['alamat_upi']?>, <?=$upi[0]['desa_upi']?>, <?=$upi[0]['kecamatan_upi']?>, <?=$upi[0]['kabupaten_upi']?>, <?=$upi[0]['nama_provinsi']?> Kode Pos <?=$upi[0]['kodepos_upi']?></p>
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
                    <label class="control-label col-sm-3">Nomor Telepon UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['kontak_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Jenis dan Skala UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=ucfirst($upi[0]['jenis_upi'])?> - <?=ucfirst($upi[0]['skala_upi'])?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Omzet Tahunan UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$upi[0]['omzet_upi']?> Milyar</p>
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
                        <p class="control-label" style="text-align: left;">                    
                            <?php
                                if($upi[0]['filenpwp_upi'] != "" && file_exists('.'.$upi[0]['filenpwp_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filenpwp_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <?php echo $upi[0]['nonpwp_upi']; ?><br/>
                            <a class="btn btn-xs btn-default mt10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No SIUP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php
                                if($upi[0]['filesiup_upi'] != "" && file_exists('.'.$upi[0]['filesiup_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesiup_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <?php echo $upi[0]['nosiup_upi']; ?><br/>
                            <a  class="btn btn-xs btn-default mt10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No IUP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                           <?php
                                if($upi[0]['fileiup_upi'] != "" && file_exists('.'.$upi[0]['fileiup_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['fileiup_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <?php echo $upi[0]['noiup_upi']; ?><br/>
                            <a  class="btn btn-xs btn-default mt10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No Akta Notaris</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                           <?php
                                if($upi[0]['fileakta_upi'] != "" && file_exists('.'.$upi[0]['fileakta_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['fileakta_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <?php echo $upi[0]['noakta_upi']; ?><br/>                            
                            <a  class="btn btn-xs btn-default mt10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <!-- new file -->
                <div class="form-group">
                    <label class="control-label col-sm-3">KTP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                           <?php
                                if($upi[0]['filektp_upi'] != "" && file_exists('.'.$upi[0]['filektp_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filektp_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Sertifikat Pengolah Ikan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php
                                if($upi[0]['filesertifikatpengolahikan_upi'] != "" && file_exists('.'.$upi[0]['filesertifikatpengolahikan_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesertifikatpengolahikan_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">SPT Pajak</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">                        
                            <?php
                                if($upi[0]['filesptpajak_upi'] != "" && file_exists('.'.$upi[0]['filesptpajak_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesptpajak_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>                   
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Surat Sewa Menyewa</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">                        
                            <?php
                                if($upi[0]['filesewamenyewa_upi'] != "" && file_exists('.'.$upi[0]['filesewamenyewa_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesewamenyewa_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-3">Surat Pernyataan Hiu/Lobster/Rajungan/Kepiting</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">                        
                            <?php
                                if($upi[0]['filehiulobsterrajungankepiting_upi'] != "" && file_exists('.'.$upi[0]['filehiulobsterrajungankepiting_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filehiulobsterrajungankepiting_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Surat Nomor Induk Berusaha (NIB)</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">                        
                            <?php
                                if($upi[0]['filenib_upi'] != "" && file_exists('.'.$upi[0]['filenib_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filenib_upi']);
                                } else {
                                    $file = '<i class="ico ico-file" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-xs btn-default" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo $prev_page; ?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
