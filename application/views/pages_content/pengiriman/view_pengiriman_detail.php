<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Informasi Pengiriman SKP Terbit</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Produk</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['namaind_produk']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['no_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No Seri SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['noseri_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kurir Pengiriman</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['kurir_pengiriman']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nomor Resi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['resi_pengiriman']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat Pengiriman</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['alamat_pengiriman']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Informasi Tambahan</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['keterangan_pengiriman']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Pengiriman</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$pengiriman[0]['tgl_pengiriman']?></p>
                    </div>
                </div>

            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('pengiriman/view_pengiriman_list');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
