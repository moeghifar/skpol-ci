<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm">
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:30%"></td>
		<td style="width:30%"></td>
		<td style="width:30%"></td>
	</tr>
	<tr>
		<td ></td>
		<td style="padding:290px 0px 80px 30px;font-size:9pt;"><?=$skpt[0]['no_skp_terbit']?></td>
		<td></td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:30%"></td>
		<td style="width:30%"></td>
		<td style="width:30%"></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:93px 0px 0px 10px;font-size:9pt;"><?=strtoupper($skpt[0]['nama_upi'])?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:28px 0px 0px 10px;font-size:9pt;"><?=$skpt[0]['alamat_upi']?>, <?=$skpt[0]['kecamatan_upi']?>, <?=$skpt[0]['kabupaten_upi']?>,<br> <?=$skpt[0]['nama_provinsi']?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:20px 0px 0px 10px;font-size:9pt;">
			<u><?=$skpt[0]['namaind_produk']?></u><br>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td style="font-style:italic;padding:0px 0px 0px 10px;font-size:9pt;">
			<span><?=$skpt[0]['namaen_produk']?></span>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<?php
			if(strlen($skpt[0]['nama_alurproses']) > 65){
		?>
			<td style="padding:20px 0px 0px 10px;font-size:9pt;">
		<?php
			}else{
		?>
			<td style="padding:20px 0px 0px 10px;font-size:9pt;">
		<?php
			}
			echo '<u>'.$skpt[0]['nama_alurproses'].'</u>';
		?>
		</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<?php
			if(strlen($skpt[0]['name_alurproses']) > 65){
		?>
			<td style="font-style:italic;padding:0px 0px 0px 10px;font-size:9pt;">
		<?php } else { ?>
			<td style="font-style:italic;padding:0px 0px 0px 10px;font-size:9pt;">
		<?php } ?>
			<span><?=$skpt[0]['name_alurproses']?></span>
		</td>
		<td></td>
	</tr>
</table>
<table border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td style="width:30%;"></td>
		<td style="width:30%"></td>
		<td style="width:30%"></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:150px 0px 0px 0px;font-size:9pt;">Jakarta</td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:32px 0px 0px 0px;font-size:9pt;"><?php echo $this->nyast->date_indo_month($skpt[0]['tglmulai_skp_terbit']); ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td style="padding:32px 0px 0px 0px;font-size:9pt;"><?php echo $this->nyast->date_indo_month($skpt[0]['tglkadaluarsa_skp_terbit']); ?></td>
		<td></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td style="padding:65px 0px 0px -30px;font-size:9pt;"><?php echo $pejabat[0]['nama_dinas']; ?></td>
	</tr>
</table>
</page>
