<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">

            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail SKP dan Kunjungan</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['alamat_upi']?>, <?=$skp[0]['desa_upi']?>, <?=$skp[0]['kecamatan_upi']?>, <?=$skp[0]['kabupaten_upi']?>, <?=$skp[0]['nama_provinsi']?> Kode Pos <?=$skp[0]['kodepos_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kontak</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['kontak_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kategori Produk</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['kategori_produk']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Produk</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['namaind_produk']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Total Realisasi Produksi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=number_format($skp[0]['realisasiproduksi_skp'],'0',',','.')?> Kg/Bulan</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File GMPSSOP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><a target="_blank" href="<?=BASE_URL($skp[0]['filegmpssop_skp'])?>">GMPSSOP.pdf</a></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Kunjungan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=date("d-m-Y", strtotime($skp[0]['tgl_kunjungan']))?></p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('kunjungan/kunjungan_list');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
