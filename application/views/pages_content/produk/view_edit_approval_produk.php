<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <?php echo form_open(site_url('produk/action_edit_product'),'class="form-horizontal form-bordered panel panel-default form-edit-pengiriman"'); ?>
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Informasi Pengiriman SKP Terbit</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Kategory Produk</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="selectize-kategori-produk" name="kategori_produk">
                            <?php
                                $prdk = array('Asap','Beku','Fermentasi','Kaleng','Kering','Segar','Lumatan Daging','Reduksi','Pindang','Lainnya');
                                foreach($prdk as $v) {
                                    if($v == $produk[0]['kategori_produk']) {
                                        echo '<option selected value="'.$v.'">'.$v.'</option>';
                                    } else {
                                        echo '<option value="'.$v.'">'.$v.'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Produk Bahasa Indonesia</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_produk" value="<?=$produk[0]['namaind_produk']?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Produk Bahasa Inggris</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="product_name" value="<?=$produk[0]['namaen_produk']?>" required/>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="id_produk" value="<?=$produk[0]['idtbl_produk']?>" />
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('produk/view_approval_produk');?>" class="btn btn-success">Kembali</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
