<div class="row">
    <div class="col-md-12">
		<?php echo form_open_multipart(site_url('upi/action_update_upi'),'class="form-horizontal form-bordered panel panel-default form-edit-upi"'); ?>
            <div class="panel-heading text-center">
                <h3 class="panel-title">Edit Detail UPI</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="nama" value="<?php if (isset($upi[0]['nama_upi'])){echo $upi[0]['nama_upi'];}?>" style="text-transform: uppercase;">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Entitas UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select class="form-control" name="entitas">
                                <?php
                                    $et = array('PT'=>'PT','CV'=>'CV','UD'=>'UD','Koperasi'=>'Koperasi','Lainnya'=>'Lainnya'); foreach($et as $e => $t){
                                            if($upi[0]['entitas_upi'] == $e){
                                                echo '<option selected value="'.$e.'">'.$t.'</option>';
                                            }else{
                                                echo '<option value="'.$e.'">'.$t.'</option>';
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Pemilik</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="pemilik" value="<?php if(isset($upi[0]['pemilik_upi'])){echo $upi[0]['pemilik_upi'];}?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Penanggung Jawab</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="penanggungjawab" value="<?php if(isset($upi[0]['penanggungjawab_upi'])){echo $upi[0]['penanggungjawab_upi'];}?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Omzet Tahunan UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select class="form-control" name="omzet">
                                <?php
                                    $st = array('<2.5'=>'< 2.5 Milyar','2.5 - 50'=>'2.5 Milyar - 50 Milyar','> 50'=>'> 50 Milyar'); foreach($st as $k => $v){
                                            if($upi[0]['omzet_upi'] == $k){
                                                echo '<option selected value="'.$k.'">'.$v.'</option>';
                                            }else{
                                                echo '<option value="'.$k.'">'.$v.'</option>';
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nomor Telepon UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kontak" value="<?=$upi[0]['kontak_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama & Nomor Kontak Person</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kontakperson" value="<?=$upi[0]['kontakperson_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tahun Berdiri UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select name="tahunmulai" class="form-control">
								<?php
								for($x=1950;$x<=date('Y');$x++){
									if($x == $upi[0]['tahunmulai_upi']){
										echo '<option selected value="'.$x.'">'.$x.'</opion>';
									}else{
										echo '<option value="'.$x.'">'.$x.'</opion>';
									}
								}
								?>
							</select>
                        </div>
                    </div>
                </div>
                <?php if ($this->session->userdata($this->session_prefix.'-userlevel')!='upi') {?>
                <div class="form-group">
                    <label class="control-label col-sm-3">Jenis dan Skala UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select name="jenis_upi" class="form-control mb15">
                                <?php
                                    $ju = array('uprlk'=>'UPRLK','upih'=>'UPIH','importir'=>'Importir/ Gudang Non RL','kapal'=>'Kapal','nonupi'=>'Non UPI'); foreach($ju as $a => $b){
                                            if($upi[0]['jenis_upi'] == $a){
                                                echo '<option selected value="'.$a.'">'.$b.'</option>';
                                            }else{
                                                echo '<option value="'.$a.'">'.$b.'</option>';
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select name="skala_upi" class="form-control">
                                <?php
                                    $sk = array('kecil'=>'Skala Kecil','menengah'=>'Skala Menengah','besar'=>'Skala Besar'); foreach($sk as $c => $d){
                                            if($upi[0]['skala_upi'] == $c){
                                                echo '<option selected value="'.$c.'">'.$d.'</option>';
                                            }else{
                                                echo '<option value="'.$c.'">'.$d.'</option>';
                                            }
                                        }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <?php }?>
                <div class="form-group">
                    <label class="control-label col-sm-3">Provinsi</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select class="form-control" name="provinsi">
                                <?php
                                    foreach($provinsi as $key){
                                        if($upi[0]['id_provinsi'] == $key['id_provinsi']){
                                            echo '<option selected value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
                                        }else{
                                            echo '<option value="'.$key['id_provinsi'].'">'.$key['nama_provinsi'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kabupaten / Kota</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kabupaten" value="<?=$upi[0]['kabupaten_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kecamatan</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kecamatan" value="<?=$upi[0]['kecamatan_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kelurahan / Desa</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="desa" value="<?=$upi[0]['desa_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="alamat" value="<?=$upi[0]['alamat_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat Pabrik</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="alamat_pabrik" value="<?=$upi[0]['alamat_pabrik']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kode Pos</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kodepos" data-mask="99999" value="<?=$upi[0]['kodepos_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No. NPWP</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="nonpwp" data-mask="99–999–999–9–999–999" value="<?=$upi[0]['nonpwp_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No. IUP</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="noiup" value="<?=$upi[0]['noiup_upi']?>">
                        </div>
                        <div class="col-sm-2" style="padding-left: 0px;">
                            <a target="_blank" class="btn btn-block btn-default" href="<?=base_url($upi[0]['fileiup_upi'])?>"><i class="ico ico-file"></i> File IUP</a>
							<input type="hidden" name="old_iup_path" value="<?=$upi[0]['fileiup_upi']?>">
						</div>
						<div class="col-sm-5">
							<div class="input-group">
								<input name="file_name_iup" type="text" class="form-control" placeholder="Upload File IUP" for="file_iup" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_iup">
									</div>
								</span>
							</div>
						</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No. SIUP</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="nosiup" value="<?=$upi[0]['nosiup_upi']?>">
                        </div>
						<div class="col-sm-2" style="padding-left: 0px;">
                            <a target="_blank" class="btn btn-block btn-default" href="<?=base_url($upi[0]['filesiup_upi'])?>"><i class="ico ico-file"></i> File SIUP</a>
							<input type="hidden" name="old_siup_path" value="<?=$upi[0]['filesiup_upi']?>">
						</div>
						<div class="col-sm-5">
							<div class="input-group">
								<input name="file_name_siup" type="text" class="form-control" placeholder="Upload File SIUP" for="file_siup" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_siup">
									</div>
								</span>
							</div>
						</div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No. Akta</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="noakta" value="<?=$upi[0]['noakta_upi']?>">
                        </div>
						<div class="col-sm-2" style="padding-left: 0px;">
                            <a target="_blank" class="btn btn-block btn-default" href="<?=base_url($upi[0]['fileakta_upi'])?>"><i class="ico ico-file"></i> File Akta</a>
							<input type="hidden" name="old_akta_path" value="<?=$upi[0]['fileakta_upi']?>">
						</div>
						<div class="col-sm-5">
							<div class="input-group">
								<input name="file_name_akta" type="text" class="form-control" placeholder="Upload File Akta" for="file_akta" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_akta">
									</div>
								</span>
							</div>
                        </div>
                    </div>
                </div>
				<?php if($this->global_alert != ""){ ?>
					<div class="form-group">
	                    <label class="control-label col-sm-3">Pesan Perbaikan Data</label>
	                    <div class="col-sm-9">
	                        <div class="col-sm-7" style="padding-left: 0px;">
	                            <input type="text" class="form-control" name="revisi" placeholder="pesan untuk perbaikan yang diselesaikan" required>
	                        </div>
	                    </div>
	                </div>
				<?php } ?>
            </div>
            <input type="hidden" value="<?=$upi[0]['idtbl_upi']?>" name="idupi"/>
            <div class="panel-footer">
                <?php if($this->session->userdata($this->session_prefix.'-userlevel')!='upi'){?>
                <a href="<?php echo base_url('upi/view_list');?>" class="btn btn-default">Batal</a>
                <?php }?>
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <input type="reset" name="reset" class="btn btn-warning" value="Ulang">
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
