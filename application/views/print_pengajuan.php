<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width: 100%;text-align: center;">Detail Pengajuan SKP <?=$skp[0]['entitas_upi']?> <?=$skp[0]['nama_upi']?></td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" style="padding-top: 20px;">
	<tr>
		<td style="width: 20%; vertical-align:top;">Pemohon</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['nama_upi']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Nama Pemilik</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['pemilik_upi']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Alamat</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['alamat_upi']?>, <?=$skp[0]['desa_upi']?>, <?=$skp[0]['kecamatan_upi']?>, <?=$skp[0]['kabupaten_upi']?>, <?=$skp[0]['provinsi_upi']?> Kode Pos <?=$skp[0]['kodepos_upi']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Kontak UPI</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['kontak_upi']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Kontak Personal</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['kontakperson_upi']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Jenis Pengajuan</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['permohonan_skp']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Kategori Produk</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['kategori_produk']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Nama Produk</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=$skp[0]['namaind_produk']?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Pemasaran Domestik</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?php foreach($pemasaran as $p){if($p['jenis_pemasaran']=='domestik'){echo ucfirst($p['tujuan_pemasaran']).', ';}}?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Pemasaran Mancanegara</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;"><?php foreach($pemasaran as $p){if($p['jenis_pemasaran']=='mancanegara'){echo ucfirst($p['tujuan_pemasaran']).', ';}}?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Realisasi Produksi</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%;"><?=number_format($skp[0]['realisasiproduksi_skp'],0,'','.')?> Kg/Tahun</td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td style="padding-top: 5px;"> </td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;" rowspan="5">Bahan Baku</td>
		<td style="width: 1%; vertical-align:top;" rowspan="5">:</td>
		<td style="width: 20%; vertical-align:top;">Hasil Tangkap</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 58%; vertical-align: top;">
			<?php foreach($bahanbaku as $bb){
                if ($bb['kategori_bahanbaku']=='tangkapan') {
                    echo ucfirst($bb['asal_bahanbaku']).' - '.ucfirst($bb['jenis_bahanbaku']).' - '.ucfirst($bb['bentuk_bahanbaku']).'<br>';
                }
            }
            ?>
            &nbsp;
		</td>
	</tr>
	<tr><td style="padding-top: 5px;"> </td></tr>
	<tr>
		<td style="width: 1%; vertical-align:top;"></td>
		<td style="width: 20%; vertical-align:top;">Hasil Import</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 58%; vertical-align: top;">
			<?php foreach($bahanbaku as $bb){
                if ($bb['kategori_bahanbaku']=='import') {
                    echo ucfirst($bb['asal_bahanbaku']).' - '.ucfirst($bb['jenis_bahanbaku']).' - '.ucfirst($bb['bentuk_bahanbaku']).'<br>';
                }
            }
            ?>
            &nbsp;
	    </td>
	</tr>
	<tr><td style="padding-top: 5px;"> </td></tr>
	<tr>
		<td style="width: 1%; vertical-align:top;"></td>
		<td style="width: 20%; vertical-align:top;">Hasil Budidaya</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 58%; vertical-align: top;">
			<?php foreach($bahanbaku as $bb){
                if ($bb['kategori_bahanbaku']=='budidaya') {
                    echo ucfirst($bb['asal_bahanbaku']).' - '.ucfirst($bb['jenis_bahanbaku']).' - '.ucfirst($bb['bentuk_bahanbaku']).'<br>';
                }
            }
            ?>
            &nbsp;
	    </td>
	</tr>
	
</table>
<table border="0" cellpadding="0" cellspacing="0">
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">SNI</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;"><?php foreach($sni as $sn){echo $sn['nama_sni'].'<br>';}?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Sarana Prasarana</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;"><?php foreach($sarpras as $sp){
			echo $sp['nama_sarpras'].' : ';
            if ($sp['kuantitas_sarpras']!=null) {
                echo $sp['kuantitas_sarpras'].' Unit - '.number_format($sp['value_sarpras'],0,'','.').' Kg';
            }
            echo '<br>';
			}?></td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Tenaga Kerja</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;">
			<?php
				echo 'Administrasi Asing : '.$karyawan[0]['admasinglk_karyawan'].' Laki-laki; '.$karyawan[0]['admasingpr_karyawan'].' Perempuan<br>';
				echo 'Pengolahan Asing : '.$karyawan[0]['olahasinglk_karyawan'].' Laki-laki; '.$karyawan[0]['olahasingpr_karyawan'].' Perempuan<br>';
				echo 'Administrasi Tetap : '.$karyawan[0]['admtetaplk_karyawan'].' Laki-laki; '.$karyawan[0]['admtetappr_karyawan'].' Perempuan<br>';
				echo 'Pengolahan Tetap : '.$karyawan[0]['olahtetaplk_karyawan'].' Laki-laki; '.$karyawan[0]['olahtetappr_karyawan'].' Perempuan<br>';
				echo 'Administrasi Harian : '.$karyawan[0]['admharilk_karyawan'].' Laki-laki; '.$karyawan[0]['admharipr_karyawan'].' Perempuan<br>';
				echo 'Pengolahan Harian : '.$karyawan[0]['olahharilk_karyawan'].' Laki-laki; '.$karyawan[0]['olahharipr_karyawan'].' Perempuan<br>';
				echo 'Jumlah Hari Kerja : '.$karyawan[0]['harikerja_karyawan'].' Hari/Bulan<br>';
				echo 'Jumlah Shift : '.$karyawan[0]['shift_karyawan'].' /Hari<br>';
			?>
		</td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Penanggung Jawab</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;">
			<?php
				echo 'UPI/Pabrik : '.$pj[0]['upinama_penanggungjawab'].' - '.$pj[0]['upipendidikan_penanggungjawab'].' - '.$pj[0]['upipelatihan_penanggungjawab'].'<br>';
				echo 'Produksi : '.$pj[0]['produksinama_penanggungjawab'].' - '.$pj[0]['produksipendidikan_penanggungjawab'].' - '.$pj[0]['produksipelatihan_penanggungjawab'].'<br>';
				echo 'Mutu (QC) : '.$pj[0]['mutunama_penanggungjawab'].' - '.$pj[0]['mutupendidikan_penanggungjawab'].' - '.$pj[0]['mutupelatihan_penanggungjawab'].'<br>';
			?>
		</td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Asal Es</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;">
			<?php
				echo 'Produksi Sendiri : '.$es[0]['sendiri_asales'].' Kg<br>';
				echo 'Pembelian dari : '.$es[0]['pembelian_asales'].'<br>';
				echo 'Bentuk Es : '.$es[0]['bentuk_asales'].'<br>';
				echo 'Penggunaan : '.$es[0]['penggunaan_asales'].'<br>';
			?>
		</td>
	</tr>
	<tr><td style="padding-top: 5px;"></td></tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Air Bersih</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;">
			<?php
				echo 'Sumber Air : '.$air[0]['sumber_air'].'<br>';
				echo 'Pengolahan Air : '.$air[0]['pengolahan_air'].'<br>';
				echo 'Volume Air : '.$air[0]['volume_air'].' Liter/Hari<br>';
			?>
		</td>
	</tr>
	<tr>
		<td style="width: 20%; vertical-align:top;">Informasi Lainnya</td>
		<td style="width: 1%; vertical-align:top;">:</td>
		<td style="width: 79%; vertical-align:top;">
			<?php
				echo 'Bahan Penolong Tambahan : '.$lain[0]['bahanpenolong_infolain'].'<br>';
				echo 'Jenis Bahan Kemasan : Inner ('.$lain[0]['kemasaninner_infolain'].') Master ('.$lain[0]['kemasanmaster_infolain'].')<br>';
				echo 'Lainnya : '.$lain[0]['lainnya_infolain'].'<br>';
			?>
		</td>
	</tr>
</table>
</page>
