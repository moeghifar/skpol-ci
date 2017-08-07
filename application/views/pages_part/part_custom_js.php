<script type="text/javascript">
$(document).ready(function(){
	var tbl_produk_counter = 1;
	/* BOF script multi product */
	$('#btn-tambah-produk').on('click',function(){
		var error = false;
		var produk = {};
		var domestik = [];
		var negara = [];
		var nama_produk = $('#form-multi-produk .nama_produk').find("option:selected").text();
		if (validate_not_empty(nama_produk) == false) {
			error = true;
		} else {
			produk.nama_produk = nama_produk;
			error = false;
		}
		var id_produk = $('#form-multi-produk .nama_produk').find("option:selected").val();
		if (validate_not_empty(id_produk) == false) {
			error = true;
		} else {
			produk.id_produk = id_produk;
			error = false;
		}
		var jenis_pengajuan = $('#form-multi-produk .jenis_pengajuan').val();
		if (validate_not_empty(jenis_pengajuan) == false) {
			error = true;
		} else {
			if (jenis_pengajuan == 1) {
				nama_pengajuan = 'Baru';
			} else {
				nama_pengajuan = 'Perpanjang';
			}
			produk.jenis_pengajuan = jenis_pengajuan;
			produk.nama_pengajuan = nama_pengajuan;
			error = false;
		}
		var total_realisasi = $('#form-multi-produk .total_realisasi_produk').val();
		if (validate_not_empty(total_realisasi) == false) {
			error = true;
		} else {
			produk.total_realisasi = total_realisasi;
			error = false;
		}
		$('#form-multi-produk input[name^="kota"]').each(function(){
			var data_kota = $(this).val();
			console.log(data_kota);
			if (validate_not_empty(data_kota) == false) {
				error = true;
			} else {
				domestik.push(data_kota);
				error = false;
			}
		});
		$('#form-multi-produk input[name^="negara"]').each(function(){
			var data_negara = $(this).val();
			if (validate_not_empty(data_negara) == false ){
				error = true;
			} else {
				negara.push(data_negara);
				error = false;
			}
		});
		produk.domestik = domestik;
		produk.negara = negara;
		if (error == false) {
			console.log(produk);
			// append to tables
			var buildForm = ''
				+ '<input type="hidden" name="nama_produk[]" value="' + produk.id_produk + '">'
				+ '<input type="hidden" name="jenis_pengajuan[]" value="' + produk.jenis_pengajuan + '">'
				+ '<input type="hidden" name="total_realisasi_produk[]" value="' + produk.total_realisasi + '">'
				+ '<input type="hidden" name="kota[]" value="' + produk.domestik + '">'
				+ '<input type="hidden" name="negara[]" value="' + produk.negara + '">'
			;
			var buildTable = ''
				+ '<tr class="tbl-tr-' + tbl_produk_counter + '">'
				+ '<td><a onclick="remove_table_produk(' + tbl_produk_counter + ')" class="btn btn-xs btn-danger"><i class="ico ico-remove"></i></a>'+ buildForm +'</td>'
				+ '<td>' + produk.nama_produk + '</td>'
				+ '<td>' + produk.nama_pengajuan + '</td>'
				+ '<td>' + produk.total_realisasi + ' Kg</td>'
				+ '<td>' + produk.domestik + '</td>'
				+ '<td>' + produk.negara + '</td>'
				+ '</tr>'
			;
			tbl_produk_counter += 1;
			$('#tbl-produk-container').append(buildTable);
			$('#modalCreateSKP').modal('toggle');
		} else {
			alert('semua kolom harus diisi');
		}
	});
	/* EOF script multi product */
	// script upload gmpssop
	$('input[type=file]').change(function(){
		var fileExtension = ['pdf', 'doc', 'docx', 'jpg', 'jpeg'];
		// check siup file
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			notifError('File Tidak Sesuai', 'Hanya format .jpg .jpeg .pdf .doc & .docx yang diperbolehkan');
			var nameAttr = $(this).attr('name');
			$(this).attr('value','');
			$("input[for="+nameAttr+"]").attr('value','');
			return false;
		}else{
			// get name
			var nameAttr = $(this).attr('name');
			// get value
			var valFile = $(this).val();
			// assign to input file
			$("input[for="+nameAttr+"]").attr('value',valFile);
			$("input[for="+nameAttr+"]").removeAttr('flag');
			return true;
		}
	});
	// reset upload file on reset button
	$('input[type=reset]').click(function(){
		$("input[for]").attr('value','');
	});

	$('input[group-field]').on('blur',function(){
		var ini = $(this);
		var gf = ini.attr('group-field');
		var kontener = $('input[group-field="'+gf+'"]');
		var kosong=0; var ada=0;
		kontener.each(function(){
			if($(this).val() == ""){
				kosong+=1;
			}else{
				ada+=1;
			}
		});
		if(ada == 0){
			kontener.removeAttr('required');
			return true;
		}else if(kosong == 0){
			return true;
		}else{
			kontener.attr('required','required');
			return false;
		}
	});

	$('.form-create-skp').on('submit',function(e){
		return true;
		// var np = $('input[name^="nama_produk"]').length;
		// var jp = $('input[name^="jenis_pengajuan"]').length;
		// var tr = $('input[name^="total_realisasi"]').length;
		// if (np == 0 && jp == 0 && tr == 0) {
		// 	notifError('Input Gagal', 'Harap isi Daftar Produk');
		// 	return false
		// }
		// $('select').filter(function() {
		// 	if($.trim( $(this).val() ) == ''){
		// 		notifError('Input Gagal', 'Field '+$(this).attr('placeholder')+' Masih Kosong');
		// 		return false;
		// 	}
		// });
		// // count flag prevent
		// var prevent = count_flag_prevent($('input[flag=prevent]'));
		// if(prevent){
		// 	return true;
		// }else {
		// 	return false;
		// }
	});

	// form penerimaan
	$('.confirm-upi').on('submit',function(){
		if($('select[name=jenis_upi]').val() != "" && $('select[name=skala_upi]').val() != ""){
			return true;
		}else{
			notifError('Peringatan!', 'Lengkapi Semua Pilihan Field');
			return false;
		}
	});

	// form upload temuan
	$('.upload-temuan').on('submit',function(e){
		// count flag prevent
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
	});

	// form skp-terbit
	$('.upload-skp-terbit').on('submit',function(e){
		// count flag prevent
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
	});

	<?php $this->nyast->js_notif(); ?>

});
function remove_table_produk(num) {
	$('#tbl-produk-container .tbl-tr-'+num).remove();
}
function validate_not_empty(data) {
	var clean_data = $.trim(data);
	if (clean_data == "" || clean_data.length < 1 || typeof data == 'undefined') {
		return false;
	}
	return true
}
function count_flag_prevent(cont) {
	var total = cont.length;
	if(total != 0){
		var nerror = cont.attr('placeholder');
		notifError('Peringatan!', nerror+' Belum Diisi');
		return false;
	}else{
		return true;
	}
}
var yk = 1;
var yn = 1;
var ytangkapan = 1;
var ybud = 1;
var yim = 1;
var ysni = 1;
var yl = 1;
var prdk = 1;
function duplicateProduk() {
	// clone data
	var cloneProduk = $('#container-produk').html();
	var wrapClone = '<span id="clone-produk-'+prdk+'"><hr/><p><a onclick="removeDuplicate('+prdk+')" class="btn btn-danger btn-xs"><i class="ico ico-remove"></i> Hapus form tambah produk</a></p>'+cloneProduk+'</span>';
	$('#container-produk').parent().append(wrapClone);
	prdk++;
}
function removeDuplicate(idnum) {
	var idForm = "#clone-produk-"+idnum;
	$(idForm).remove();
}
function addKota() {
	var formKota = '<div id="inputKota'+yk+'" class="input-group add-on mb10" style="padding-top: 2px;"><input required class="form-control" placeholder="Tujuan Pemasaran Domestik (kota)" name="kota[]" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputKota'+yk+'" onclick="removeInputKota('+yk+')"><i class="ico ico-remove"></i></button></div></div>';
	$("#formKota").append(formKota);
	yk++;
}
function removeInputKota(idnum){
	var idForm = "#inputKota"+idnum;
	$("#formKota "+idForm).remove();
}
function addNegara() {
	var formNegara = '<div id="inputNegara'+yn+'" class="input-group add-on mb10" style="padding-top: 2px;"><input required class="form-control" placeholder="Tujuan Pemasaran Mancanegara (negara)" name="negara[]" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputNegara'+yn+'" onclick="removeInputNegara('+yn+')"><i class="ico ico-remove"></i></button></div></div>';
	$("#formNegara").append(formNegara);
	yn++;
}
function removeInputNegara(idnum){
	var idForm = "#inputNegara"+idnum;
	$("#formNegara "+idForm).remove();
}
function addTangkap() {
	var formTangkap = '<div id="inputJenis'+ytangkapan+'" class="row"><div class="col-sm-4"><input group-field="tangkapan'+ytangkapan+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="t_asal['+ytangkapan+']"></input></div><div class="col-sm-4"><input group-field="tangkapan'+ytangkapan+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="t_jenis['+ytangkapan+']"></input></div><div class="col-sm-4"><div class="input-group add-on"><input group-field="tangkapan'+ytangkapan+'" placeholder="Bentuk Ikan" class="form-control" name="t_bentuk['+ytangkapan+']" id="inputBentuk'+ytangkapan+'" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+ytangkapan+'" onclick="removeInputTangkap('+ytangkapan+')"><i class="ico ico-remove"></i></button></div></div></div></div>';
	$("#formTangkap").append(formTangkap);
	ytangkapan++;
}
function removeInputTangkap(idnum){
	var idJenis = "#inputJenis"+idnum;
	var idBentuk = "#inputBentuk"+idnum;
	$("#formTangkap "+idJenis).remove();
	$("#formTangkap "+idBentuk).remove();
}
function addBudidaya() {
	var formBudidaya = '<div id="inputJenis'+ybud+'" class="row"><div class="col-sm-4"><input group-field="budidaya'+ybud+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="b_asal['+ybud+']" ></input></div><div class="col-sm-4"><input group-field="budidaya'+ybud+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="b_jenis['+ybud+']" ></input></div><div class="col-sm-4"><div class="input-group add-on"><input group-field="budidaya'+ybud+'" placeholder="Bentuk Ikan" class="form-control" name="b_bentuk['+ybud+']" id="inputBentuk'+ybud+'" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+ybud+'" onclick="removeInputBudidaya('+ybud+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
	$("#formBudidaya").append(formBudidaya);
	ybud++;
}
function removeInputBudidaya(idnum){
	var idJenis = "#inputJenis"+idnum;
	var idBentuk = "#inputBentuk"+idnum;
	$("#formBudidaya "+idJenis).remove();
	$("#formBudidaya "+idBentuk).remove();
}
function addImport() {
	var formImport = '<div id="inputJenis'+yim+'" class="row"><div class="col-sm-4"><input group-field="import'+yim+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="i_asal['+yim+']"></input></div><div class="col-sm-4"><input group-field="import'+yim+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="i_jenis['+yim+']"></input></div><div class="col-sm-4"><div class="input-group add-on"><input group-field="import'+yim+'" placeholder="Bentuk Ikan" class="form-control" name="i_bentuk['+yim+']" id="inputBentuk'+yim+'" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+yim+'" onclick="removeInputImport('+yim+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
	$("#formImport").append(formImport);
	yim++;
}
function removeInputImport(idnum){
	var idJenis = "#inputJenis"+idnum;
	var idBentuk = "#inputBentuk"+idnum;
	$("#formImport "+idJenis).remove();
	$("#formImport "+idBentuk).remove();
}
function addSni() {
	var formSni = '<div id="inputSni'+ysni+'" class="input-group add-on mb10"><input required class="form-control" name="sni['+ysni+']" type="text" placeholder="SNI / ISO / BRC / HACCP / SKP / Standar Lain" required><div class="input-group-btn"><button class="btn btn-default" id="inputSni'+ysni+'" onclick="removeInputSni('+ysni+')" type="submit"><i class="ico ico-remove"></i></button></div></div>'
	$("#formSni").append(formSni);
	ysni++;
}
function removeInputSni(idnum){
	var idForm = "#inputSni"+idnum;
	$("#formSni "+idForm).remove();
}
function addLainnya() {

	var formLainnya = '<div id="inputLainnya'+yl+'" class="row mb10"><div class="col-sm-4"><input group-field="lainnya'+yl+'" type="text" class="form-control mb10" placeholder="Nama Sarana" name="lainnya_sarana['+yl+']"></input></div><div class="col-sm-4"><input type="text" class="form-control mb10 numb" name="lainnya_unit['+yl+']" placeholder="Unit"></div><div class="col-sm-4"><div class="input-group add-on"><input group-field="lainnya'+yl+'" placeholder="Kapasitas" class="form-control" name="lainnya_kg['+yl+']" type="text"><div class="input-group-btn"><button class="btn btn-default" onclick="removeInputLainnya('+yl+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
	$("#formLainnya").append(formLainnya);
	yl++;
}
function removeInputLainnya(idnum){
	var idForm = "#inputLainnya"+idnum;
	$("#formLainnya "+idForm).remove();
}
function scrollTo(hash) {
   location.hash = "#" + hash;
}
function clearInput(form){
	$('input:checked').removeAttr('checked');
	$('input[type=text]').attr('value','');
	$('[data-toggle=modal]').addClass('disabled');
	$('.'+form).trigger('reset');
}
</script>
