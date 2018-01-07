<script type="text/javascript">
$(document).ready(function(){
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
		var ckos = 0, csarpras = 0, ctenaker = 0, cpemasaran = 0;
		var pemasaran = $('input[group-restrict=pemasaran]');
		var tenaker = $('input[group-restrict=tenaker]');
		var bahanbaku = $('input[group-restrict=bahanbaku]');
		var sarpras = $('input[group-restrict=sarpras]');
		pemasaran.filter(function(){
			if($.trim( $(this).val() ) == ''){
				cpemasaran+=1;
			}
		});
		tenaker.filter(function(){
			if($.trim( $(this).val() ) == ''){
				ctenaker+=1;
			}
		});
		bahanbaku.filter(function(){
			if($.trim( $(this).val() ) == ''){
				ckos+=1;
			}
		});
		sarpras.filter(function(){
			if($.trim( $(this).val() ) == ''){
				csarpras+=1;
			}
		});
		if(cpemasaran == pemasaran.length){
			scrollTo('pemasaran');
			notifError('Input Gagal', 'Pemasaran Harus Diisi Salah Satu Domestik / Luar Negeri');
			return false;
		}
		if(ctenaker == tenaker.length){
			scrollTo('tenaker');
			notifError('Input Gagal', 'Jumlah Tenaga Kerja tidak boleh kosong');
			return false;
		}
		if(ckos == bahanbaku.length){
			scrollTo('bahanbaku');
			notifError('Input Gagal', 'Bahan Baku harus diisi salah satunya');
			return false;
		}
		if(csarpras == sarpras.length){
			scrollTo('sarpras');
			notifError('Input Gagal', 'Kapasitas Sarana dan Prasarana harus diisi salah satunya');
			return false;
		}
		$('select').filter(function() {
			if($.trim( $(this).val() ) == ''){
				notifError('Input Gagal', 'Field '+$(this).attr('placeholder')+' Masih Kosong');
				return false;
			}
		});
		// count flag prevent
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
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
function count_flag_prevent(cont){
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
function addKota() {
	var formKota = '<div id="inputKota'+yk+'" class="input-group add-on mb10" style="padding-top: 2px;"><input class="form-control" placeholder="Tujuan Pemasaran Domestik (kota)" name="kota[]" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputKota'+yk+'" onclick="removeInputKota('+yk+')"><i class="ico ico-remove"></i></button></div></div>';
	$("#formKota").append(formKota);
	yk++;
}
function removeInputKota(idnum){
	var idForm = "#inputKota"+idnum;
	$("#formKota "+idForm).remove();
}
function addNegara() {
	var formNegara = '<div id="inputNegara'+yn+'" class="input-group add-on mb10" style="padding-top: 2px;"><input class="form-control" placeholder="Tujuan Pemasaran Mancanegara (negara)" name="negara[]" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputNegara'+yn+'" onclick="removeInputNegara('+yn+')"><i class="ico ico-remove"></i></button></div></div>';
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
	var formSni = '<div id="inputSni'+ysni+'" class="input-group add-on mb10"><input class="form-control" name="sni['+ysni+']" type="text" placeholder="SNI / ISO / BRC / HACCP / SKP / Standar Lain" required><div class="input-group-btn"><button class="btn btn-default" id="inputSni'+ysni+'" onclick="removeInputSni('+ysni+')" type="submit"><i class="ico ico-remove"></i></button></div></div>'
	$("#formSni").append(formSni);
	ysni++;
}
function removeInputSni(idnum){
	var idForm = "#inputSni"+idnum;
	$("#formSni "+idForm).remove();
}
function addLainnya() {

	var formLainnya = '<div id="inputLainnya'+yl+'" class="row"><div class="col-sm-4"><input group-field="lainnya'+yl+'" type="text" class="form-control mb10" placeholder="Nama Sarana" name="lainnya_sarana['+yl+']"></input></div><div class="col-sm-4"><input type="text" class="form-control mb10 numb" name="lainnya_unit['+yl+']" placeholder="Unit"></div><div class="col-sm-4"><div class="input-group add-on"><input group-field="lainnya'+yl+'" placeholder="Kapasitas" class="form-control" name="lainnya_kg['+yl+']" type="text"><div class="input-group-btn"><button class="btn btn-default" onclick="removeInputLainnya('+yl+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
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
