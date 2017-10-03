<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <?php echo form_open_multipart(site_url('kunjungan/action_perbaikan_edit'),'class="form-horizontal form-bordered panel panel-default form-edit-perbaikan"'); ?>

            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Edit Perbaikan Kunjungan</h3>
            </div>
            <div class="panel-body">
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
                    <label class="control-label col-sm-3">File Temuan</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <?php if($perbaikan[0]['temuan_kunjungan']!=''){?>
                                <a target="_blank" class="btn btn-block btn-default" href="<?=base_url($perbaikan[0]['temuan_kunjungan'])?>"><i class="ico ico-file"></i> File Temuan</a>
                                <input type="hidden" name="old_temuan_path" value="<?=$perbaikan[0]['temuan_kunjungan']?>">
                            <?php }else{?>
                                <a target="_blank" class="btn btn-block btn-default disable"><i class="ico ico-file"></i> File Temuan</a>
                            <?php }?>
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <input name="file_name_temuan" type="text" class="form-control" placeholder="Upload File Temuan" for="file_temuan" readonly>
                                <span class="input-group-btn">
                                    <div class="btn btn-primary btn-file">
                                        <span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_temuan">
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">PIC Kunjungan</label>
                    <div class="col-sm-9">
                        <!-- <p class="control-label" style="text-align: left;"><?=$perbaikan[0]['pic_kunjungan']?></p> -->
                        <input type="text" class="form-control" name="pic_kunjungan" placeholder="<?=$perbaikan[0]['pic_kunjungan']?>" required/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Note Revisi Kunjungan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" style="max-width:100%;min-width:100%;min-height:80px;" name="note_revisi" placeholder="<?php if(isset($perbaikan[0]['note_revisi_kunjungan'])) {echo $perbaikan[0]['note_revisi_kunjungan'];}?>"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Kunjungan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker" placeholder="<?=$this->nyast->date_indo_format($perbaikan[0]['tgl_kunjungan'])?>" name="tanggal_kunjungan" required/>
                    </div>
                </div>
            </div>
            <input type="hidden" value="<?=$perbaikan[0]['idtbl_skp']?>" name="idskp"/>
            <input type="hidden" value="<?=$perbaikan[0]['idtbl_kunjungan']?>" name="idkunjungan"/>
            <div class="panel-footer">
                <a href="<?php echo base_url('kunjungan/approval_list');?>" class="btn btn-success">Kembali</a>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <input type="reset" name="reset" class="btn btn-warning" value="Ulang">
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
