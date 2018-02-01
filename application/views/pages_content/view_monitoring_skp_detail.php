<div class="row">
    <div class="col-md-12">
        <!-- Form horizontal layout striped -->
        <form class="form-horizontal form-bordered panel panel-default" action="">

            <!--Produk-->
            <div class="panel-heading text-center">
                <h3 class="panel-title">Detail SKP</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label col-sm-3">Nama UPI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['nama_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Penanggung Jawab</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['pemilik_upi']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Alamat</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['alamat_upi']?>, <?=$skp[0]['desa_upi']?>, <?=$skp[0]['kecamatan_upi']?>, <?=$skp[0]['kabupaten_upi']?>, <?=$skp[0]['nama_provinsi']?> Kode Pos <?=$skp[0]['kodepos_upi']?></p>
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
                    <label class="control-label col-sm-3">Nomor SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['no_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Nomor Seri SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['noseri_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Berlaku SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['tglmulai_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tanggal Kadaluarsa SKP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=$skp[0]['tglkadaluarsa_skp_terbit']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tujuan Pemasaran Domestik</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php foreach($pemasaran as $p){
                            if($p['jenis_pemasaran']=='domestik'){echo ucfirst($p['tujuan_pemasaran']).'<br>';}}?>
                        </p>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tujuan Pemasaran Mancanegara</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php foreach($pemasaran as $p){
                            if($p['jenis_pemasaran']=='mancanegara'){echo ucfirst($p['tujuan_pemasaran']).'<br>';}}?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Total Realisasi Produksi</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?=number_format($skp[0]['realisasiproduksi_skp'],0,'','.')?> Kg/Bulan</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Bahan Baku</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                        Hasil Tangkapan :
                        <?php foreach($bahanbaku as $bb){
                            if ($bb['kategori_bahanbaku']=='tangkapan') {
                                if ($bb['asal_bahanbaku']!=null) {
                                    echo ucfirst($bb['asal_bahanbaku']);
                                }else{
                                    echo 'Asal wilayah tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['jenis_bahanbaku']!=null) {
                                    echo ucfirst($bb['jenis_bahanbaku']);
                                }else{
                                    echo 'Jenis tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['bentuk_bahanbaku']!=null) {
                                    echo ucfirst($bb['bentuk_bahanbaku']);
                                }else{
                                    echo 'Bentuk tidak diketahui';
                                }
                                echo '; ';
                            }
                        }
                        ?>
                        <br>
                        Hasil Budidaya :
                        <?php foreach($bahanbaku as $bb){
                            if ($bb['kategori_bahanbaku']=='budidaya') {
                                if ($bb['asal_bahanbaku']!=null) {
                                    echo ucfirst($bb['asal_bahanbaku']);
                                }else{
                                    echo 'Asal wilayah tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['jenis_bahanbaku']!=null) {
                                    echo ucfirst($bb['jenis_bahanbaku']);
                                }else{
                                    echo 'Jenis tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['bentuk_bahanbaku']!=null) {
                                    echo ucfirst($bb['bentuk_bahanbaku']);
                                }else{
                                    echo 'Bentuk tidak diketahui';
                                }
                                echo '; ';
                            }
                        }
                        ?>
                        <br>
                        Hasil Import :
                        <?php foreach($bahanbaku as $bb){
                            if ($bb['kategori_bahanbaku']=='import') {
                                if ($bb['asal_bahanbaku']!=null) {
                                    echo ucfirst($bb['asal_bahanbaku']);
                                }else{
                                    echo 'Asal wilayah tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['jenis_bahanbaku']!=null) {
                                    echo ucfirst($bb['jenis_bahanbaku']);
                                }else{
                                    echo 'Jenis tidak diketahui';
                                }
                                echo ' - ';
                                if ($bb['bentuk_bahanbaku']!=null) {
                                    echo ucfirst($bb['bentuk_bahanbaku']);
                                }else{
                                    echo 'Bentuk tidak diketahui';
                                }
                                echo '; ';
                            }
                        }
                        ?>
                        <br>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">SNI</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?php foreach($sni as $s){
                                echo ucfirst($s['nama_sni']).'<br>';
                            }?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Kapasitas Sarana dan Prasarana</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">
                            <?php foreach($sarpras as $sp){
                            echo $sp['nama_sarpras'];
                            if ($sp['kuantitas_sarpras']!=null) {
                                echo ' : '.$sp['kuantitas_sarpras'].' Unit - '.number_format($sp['value_sarpras'],0,'','.').' Kg';
                            }
                            echo '<br>';
                            }?>
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Tenaga Kerja</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">Tenaga Kerja Asing Administrasi <?=$karyawan[0]['admasinglk_karyawan']?> Laki-laki <?=$karyawan[0]['admasingpr_karyawan']?> Perempuan<br>Tenaga Kerja Asing Pengolahan <?=$karyawan[0]['olahasinglk_karyawan']?> Laki-laki <?=$karyawan[0]['olahasingpr_karyawan']?> Perempuan<br>Tenaga Kerja Tetap Administrasi <?=$karyawan[0]['admtetaplk_karyawan']?> Laki-laki <?=$karyawan[0]['admtetappr_karyawan']?> Perempuan<br>Tenaga Kerja Tetap Pengolahan <?=$karyawan[0]['olahtetaplk_karyawan']?> Laki-laki <?=$karyawan[0]['olahtetappr_karyawan']?> Perempuan<br>Tenaga Kerja Harian Administrasi <?=$karyawan[0]['admharilk_karyawan']?> Laki-laki <?=$karyawan[0]['admharipr_karyawan']?> Perempuan<br>Tenaga Kerja Harian Pengolahan <?=$karyawan[0]['olahharilk_karyawan']?> Laki-laki <?=$karyawan[0]['olahharipr_karyawan']?> Perempuan<br>Jumlah Hari Kerja : <?=$karyawan[0]['harikerja_karyawan']?> Hari/Bulan<br>Jumlah Shift : <?=$karyawan[0]['shift_karyawan']?> /Hari</p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Penanggung Jawab</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">UPI/Pabrik : <?=$pendidikan[0]['upinama_penanggungjawab']?> - <?=$pendidikan[0]['upipendidikan_penanggungjawab']?> - <?=$pendidikan[0]['upipelatihan_penanggungjawab']?><br>Produksi : <?=$pendidikan[0]['produksinama_penanggungjawab']?> -  <?=$pendidikan[0]['produksipendidikan_penanggungjawab']?> - <?=$pendidikan[0]['produksipelatihan_penanggungjawab']?><br>Mutu (QC) : <?=$pendidikan[0]['mutunama_penanggungjawab']?> -  <?=$pendidikan[0]['mutupendidikan_penanggungjawab']?> - <?=$pendidikan[0]['mutupelatihan_penanggungjawab']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Asal Es</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">Produksi Sendiri : <?php if($es[0]['sendiri_asales']!=null){ echo $es[0]['sendiri_asales'].' Kg';}?><br>Pembelian : <?=$es[0]['pembelian_asales']?><br>Bentuk Es : <?=$es[0]['bentuk_asales']?><br>Penggunaan Es : <?=$es[0]['penggunaan_asales']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Air Bersih</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">Sumber Air : <?=$air[0]['sumber_air']?><br>Pengolahan Air : <?=$air[0]['pengolahan_air']?><br>Volume Air : <?=$air[0]['volume_air']?><br></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">Informasi Lainnya</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;">Bahan Penolong Tambahan : <?=$lain[0]['bahanpenolong_infolain']?><br>Jenis Bahan Kemasan : Inner (<?=$lain[0]['kemasaninner_infolain']?>) - Master (<?=$lain[0]['kemasanmaster_infolain']?>)<br>Lainnya : <?=$lain[0]['lainnya_infolain']?></p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3">File GMPSSOP</label>
                    <div class="col-sm-9">
                        <p class="control-label" style="text-align: left;"><?php
                            if ($skp[0]['filegmpssop_skp']!=null) {
                                echo '<a href="'.base_url('ViewerJS/..'.$skp[0]['filegmpssop_skp']).'" target="_blank">GMPSSOP</a>';
                            }else{
                                echo 'Tidak ada';
                            }
                        ?></p>
                    </div>
                </div>
            </div>

            <div class="panel-footer">
                <a href="<?php echo base_url('home/monitoring_skp');?>" class="btn btn-success">Kembali</a>
            </div>
        </form>
        <!--/ Form horizontal layout striped -->
    </div>
</div>
