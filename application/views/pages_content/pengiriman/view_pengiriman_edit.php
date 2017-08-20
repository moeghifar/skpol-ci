<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <?php echo form_open_multipart(site_url('pengiriman/action_edit_pengiriman'),'class="form-horizontal form-bordered panel panel-default form-edit-pengiriman"'); ?>
            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail Informasi Pengiriman SKP Terbit</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Kurir Pengiriman</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="kurir" value="<?=$pengiriman[0]['kurir_pengiriman']?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nomor Resi</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="resi" value="<?=$pengiriman[0]['resi_pengiriman']?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat Pengiriman</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="alamat" required><?=$pengiriman[0]['alamat_pengiriman']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Informasi Tambahan</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" name="info" required><?=$pengiriman[0]['keterangan_pengiriman']?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Pengiriman</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker" name="tanggal" value="<?=$pengiriman[0]['tgl_pengiriman']?>" required/>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="idpengiriman" value="<?=$pengiriman[0]['idtbl_pengiriman']?>" />

            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('pengiriman/view_pengiriman_list');?>" class="btn btn-success">Kembali</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
