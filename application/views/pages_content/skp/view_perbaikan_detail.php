<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">

            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Perbaikan Kunjungan</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['alamat_upi']?>, <?=$perbaikan[0]['desa_upi']?>, <?=$perbaikan[0]['kecamatan_upi']?>, <?=$perbaikan[0]['kabupaten_upi']?>, <?=$perbaikan[0]['nama_provinsi']?> Kode Pos <?=$perbaikan[0]['kodepos_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kontak</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['kontak_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kategori Produk</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['kategori_produk']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Produk</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['namaind_produk']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Total Realisasi Produksi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['realisasiproduksi_skp']?> Kg/Bulan</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File GMPSSOP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><a href="<?=base_url($perbaikan[0]['filegmpssop_skp'])?>">GMPSSOP.pdf</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File Temuan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php if($perbaikan[0]['temuan_kunjungan']!=''){?>
                                <a href="<?=base_url($perbaikan[0]['temuan_kunjungan'])?>">Temuan Kunjungan</a>
                            <?php }else{?>
                                Tidak ada temuan
                            <?php }?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File Perbaikan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php if($perbaikan[0]['perbaikan_kunjungan']!=''){?>
                                <a href="<?=base_url($perbaikan[0]['perbaikan_kunjungan'])?>">Perbaikan Kunjungan</a>
                            <?php }else{?>
                                Belum ada perbaikan
                            <?php }?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">PIC Kunjungan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['pic_kunjungan']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Note Revisi Kunjungan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['note_revisi_kunjungan']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Kunjungan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$this->nyast->date_indo_format($perbaikan[0]['tgl_kunjungan'])?></p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('kunjungan/approval_list');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
