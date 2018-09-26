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
                            <input type="text" class="form-control" name="nama" value="<?php echo (isset($upi[0]['nama_upi'])?$upi[0]['nama_upi']:""); ?>" style="text-transform: uppercase;">
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
                            <input type="text" class="form-control" name="pemilik" value="<?php echo $upi[0]['pemilik_upi']; ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama Penanggung Jawab</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="penanggungjawab" value="<?=$upi[0]['penanggungjawab_upi']?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Omzet Tahunan UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select class="form-control" name="omzet">
                                <option>...pilih omzet tahunan...</option>
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
                    <label class="control-label col-sm-3">Nama & No. Telepon Kontak Person</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <input type="text" class="form-control" name="kontakperson" value="<?=$upi[0]['kontakperson_upi']?>">
                            <span class="info-mini-red">*wajib diisi</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tahun Berdiri UPI</label>
                    <div class="col-sm-9">
                        <div class="col-sm-7" style="padding-left: 0px;">
                            <select name="tahunmulai" class="form-control">
                                <option>...pilih tahun berdiri...</option>
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
                                    $ju = array('UPRLK (Unit Penanganan Rumput Laut Kering)'=>'UPRLK (Unit Penanganan Rumput Laut Kering)','UPIH (Unit Penanganan Ikan Hidup)'=>'UPIH (Unit Penanganan Ikan Hidup)','Gudang Beku Dalam Negeri'=>'Gudang Beku Dalam Negeri','Gudang Beku Export'=>'Gudang Beku Export','Gudang Penyimpanan Kering'=>'Gudang Penyimpanan Kering','Kapal Pengolah Ikan'=>'Kapal Pengolah Ikan','UPI (Unit Pengolahan Ikan)'=>'UPI (Unit Pengolahan Ikan)','Non UPI/Industri Non Perikanan'=>'Non UPI/Industri Non Perikanan'); 
                                    foreach($ju as $a => $b){
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
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" class="form-control mb10" data-mask="99–999–999–9–999–999" name="nonpwp" value="<?=$upi[0]['nonpwp_upi']?>">
                        </div>
						<div class="col-sm-2" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filenpwp_upi'] != "" && file_exists('.'.$upi[0]['filenpwp_upi'])) {
                                    $filenpwp = '<i class="ico ico-check" style="color:green"></i>';
                                    $urlnpwp = base_url($upi[0]['filenpwp_upi']);
                                } else {
                                    $filenpwp = '<i class="ico ico-remove" style="color:red"></i>';
                                    $urlnpwp = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$urlnpwp?>"><?php echo $filenpwp; ?> File NPWP</a>
							<input type="hidden" name="old_npwp_path" value="<?=$upi[0]['filenpwp_upi']?>">
						</div>
						<div class="col-sm-5">
							<div class="input-group">
								<input name="file_name_npwp" type="text" class="form-control" placeholder="Upload File NPWP" for="file_npwp" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Upload <input type="file" name="file_npwp">
									</div>
								</span>
							</div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">No. IUP</label>
                    <div class="col-sm-9">
                        <div class="col-sm-5" style="padding-left: 0px;">
                            <input type="text" class="form-control mb10" name="noiup" value="<?=$upi[0]['noiup_upi']?>">
                        </div>
                        <div class="col-sm-2" style="padding-left: 0px;">
                            <?php
                                if(isset($upi[0]['fileiup_upi']) && file_exists('.'.$upi[0]['fileiup_upi'])) {
                                    $fileiup = '<i class="ico ico-check" style="color:green"></i>';
                                    $urliup = base_url($upi[0]['fileiup_upi']);
                                } else {
                                    $fileiup = '<i class="ico ico-remove" style="color:red"></i>';
                                    $urliup = 'javascript:void(0)';
                                }
                            ?>
                            <a class="btn btn-block btn-default mb10" target="_blank" href="<?=$urliup?>"><?php echo $fileiup; ?> File IUP</a>
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
                            <input type="text" class="form-control mb10" name="nosiup" value="<?=$upi[0]['nosiup_upi']?>">
                        </div>
						<div class="col-sm-2" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filesiup_upi'] != "" && file_exists('.'.$upi[0]['filesiup_upi'])) {
                                    $filesiup = '<i class="ico ico-check" style="color:green"></i>';
                                    $urlsiup = base_url($upi[0]['filesiup_upi']);
                                } else {
                                    $filesiup = '<i class="ico ico-remove" style="color:red"></i>';
                                    $urlsiup = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$urlsiup?>"><?php echo $filesiup; ?> File SIUP</a>
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
                            <input type="text" class="form-control mb10" name="noakta" value="<?=$upi[0]['noakta_upi']?>">
                        </div>
						<div class="col-sm-2" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['fileakta_upi'] != "" && file_exists('.'.$upi[0]['fileakta_upi'])) {
                                    $fileakta = '<i class="ico ico-check" style="color:green"></i>';
                                    $urlakta = base_url($upi[0]['fileakta_upi']);
                                } else {
                                    $fileakta = '<i class="ico ico-remove" style="color:red"></i>';
                                    $urlakta = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$urlakta?>"><?php echo $fileakta; ?> File Akta</a>
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
                <!-- FILE KTP -->
                <div class="form-group">
                    <label class="control-label col-sm-12 mb10" style="text-align:center;"><strong>FILE UPLOAD TAMBAHAN</strong></label>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File KTP</label>
                    <div class="col-sm-9" id="filektp_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filektp_upi'] != "" && file_exists('.'.$upi[0]['filektp_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filektp_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_ktp" type="text" class="form-control" placeholder="Upload File KTP" for="file_ktp" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_ktp">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filektp_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
                        </div>
                    </div>
                </div>
                <!-- FILE Sertifikat Pengolah Ikan -->
                <div class="form-group">
                    <label class="control-label col-sm-3">File Sertifikat Pengolah Ikan(SPI) / Sertifikat Keamanan Pangan QC/QA</label>
                    <div class="col-sm-9" id="filesertifikatpengolahikan_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filesertifikatpengolahikan_upi'] != "" && file_exists('.'.$upi[0]['filesertifikatpengolahikan_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesertifikatpengolahikan_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_sertifikatpengolahikan" type="text" class="form-control" placeholder="Upload File Sertifikat Pengolah Ikan" for="file_sertifikatpengolahikan" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_sertifikatpengolahikan">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filesertifikatpengolahikan_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
                        </div>
                    </div>
                </div>
                <!-- FILE SPT Pajak -->
                <div class="form-group">
                    <label class="control-label col-sm-3">File SPT Pajak</label>
                    <div class="col-sm-9" id="filesptpajak_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filesptpajak_upi'] != "" && file_exists('.'.$upi[0]['filesptpajak_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesptpajak_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_sptpajak" type="text" class="form-control" placeholder="Upload File SPT Pajak" for="file_sptpajak" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_sptpajak">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filesptpajak_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
                        </div>
                    </div>
                </div>
                <!-- FILE Sewa Menyewa -->
                <div class="form-group">
                    <label class="control-label col-sm-3">File Sewa Menyewa</label>
                    <div class="col-sm-9" id="filesewamenyewa_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filesewamenyewa_upi'] != "" && file_exists('.'.$upi[0]['filesewamenyewa_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filesewamenyewa_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_sewamenyewa" type="text" class="form-control" placeholder="Upload File Sewa Menyewa" for="file_sewamenyewa" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_sewamenyewa">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filesewamenyewa_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
                        </div>
                    </div>
                </div>
                <!-- FILE Surat Pernyataan Hiu/Lobster/Rajungan/Kepiting -->
                <div class="form-group">
                    <label class="control-label col-sm-3">Surat Pernyataan Hiu/Lobster/Rajungan/Kepiting</label>
                    <div class="col-sm-9" id="filehiulobsterrajungankepiting_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filehiulobsterrajungankepiting_upi'] != "" && file_exists('.'.$upi[0]['filehiulobsterrajungankepiting_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filehiulobsterrajungankepiting_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_hiulobsterrajungankepiting" type="text" class="form-control" placeholder="Upload Surat Pernyataan Hiu/Lobster/Rajungan/Kepiting" for="file_hiulobsterrajungankepiting" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_hiulobsterrajungankepiting">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filehiulobsterrajungankepiting_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
                        </div>
                    </div>
                </div>
                <!-- FILE Nomor Induk Berusaha (NIB) -->
                <div class="form-group">
                    <label class="control-label col-sm-3">File Nomor Induk Berusaha</label>
                    <div class="col-sm-9" id="filenib_upi">
						<div class="col-sm-3" style="padding-left: 0px;">
                            <?php
                                if($upi[0]['filenib_upi'] != "" && file_exists('.'.$upi[0]['filenib_upi'])) {
                                    $file = '<i class="ico ico-check" style="color:green"></i> ada';
                                    $url = base_url($upi[0]['filenib_upi']);
                                } else {
                                    $file = '<i class="ico ico-remove" style="color:red"></i> belum ada';
                                    $url = 'javascript:void(0)';
                                }
                            ?>
                            <a  class="btn btn-block btn-default mb10" target="_blank" href="<?=$url?>"><?php echo $file; ?></a>
						</div>
						<div class="col-sm-6">
							<div class="input-group">
								<input name="file_name_nib" type="text" class="form-control" placeholder="Upload File Nomor Induk Berusaha" for="file_nib" readonly>
								<span class="input-group-btn">
									<div class="btn btn-primary btn-file">
										<span class="icon iconmoon-file-3"></span> Pilih File <input type="file" name="file_nib">
									</div>
								</span>
							</div>
                            <span class="info-mini-red">*Maksimum ukuran file upload 4MB</span>
                        </div>
                        <div class="col-sm-3">
                            <input type="button" class="btn btn-inverse" data-path="file/upi/file_extra" data-file="filenib_upi" data-id="<?=$upi[0]['idtbl_upi']?>" data-tbl="upi" name="submit" id="ajax_upload_file" value="Simpan File">
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
