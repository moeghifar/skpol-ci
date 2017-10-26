$(document).ready(function(){
	var tbl_produk_counter = 1;
	/* BOF script multi product */
	$('#form-multi-produk').on('submit',function(){
		var error = {};
		var countError = 0;
		var produk = {};
		var domestik = [];
		var negara = [];
		var id_produk = $('#form-multi-produk .nama_produk').find("option:selected").val();
		if (validate_not_empty(id_produk) == false) {
			alert("nama produk harus dipilih");
			countError += 1;
		} else {
			produk.id_produk = id_produk;
			produk.nama_produk = $('#form-multi-produk .nama_produk').find("option:selected").text();
		}
		var jenis_pengajuan = $('#form-multi-produk .jenis_pengajuan').val();
		if (validate_not_empty(jenis_pengajuan) == false) {
			alert("jenis pengajuan harus dipilih");
			countError += 1;
		} else {
			if (jenis_pengajuan == 1) {
				nama_pengajuan = 'Baru';
			} else {
				nama_pengajuan = 'Perpanjang';
			}
			produk.jenis_pengajuan = jenis_pengajuan;
			produk.nama_pengajuan = nama_pengajuan;
		}
		var total_realisasi = $('#form-multi-produk .total_realisasi_produk').val();
		if (validate_not_empty(total_realisasi) == false) {
			alert("total realisasi harus diisi");
			countError += 1;
		} else {
			produk.total_realisasi = total_realisasi;
		}
		$('#form-multi-produk input[name^="kota"]').each(function(){
			var data_kota = $(this).val();
			if (validate_not_empty(data_kota) == false) {
				alert("kota tujuan pemasaran harus dipilih");
				countError += 1;
			} else {
				domestik.push(data_kota);
			}
		});
		produk.domestik = domestik;
		$('#form-multi-produk input[name^="negara"]').each(function(){
			var data_negara = $(this).val();
			if (validate_not_empty(data_negara) == false ){
				alert("negara tujuan pemasaran harus dipilih");
				countError += 1;
			} else {
				negara.push(data_negara);
			}
		});
		produk.negara = negara;
		var bb_t_asal = [], bb_t_jenis =[], bb_t_bentuk = [], t_t_input = '';
		$('#form-multi-produk input[name^="t_asal"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_t_asal.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="t_jenis"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_t_jenis.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="t_bentuk"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_t_bentuk.push($(this).val());
			}
		});
		$.each(bb_t_asal, function(i,v){
			t_t_input += v +','+ bb_t_jenis[i] + ',' + bb_t_bentuk[i] +'<br/>';
		});
		var bb_b_asal = [], bb_b_jenis =[], bb_b_bentuk = [], b_t_input = '';
		$('#form-multi-produk input[name^="b_asal"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_b_asal.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="b_jenis"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_b_jenis.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="b_bentuk"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_b_bentuk.push($(this).val());
			}
		});
		$.each(bb_b_asal, function(i,v){
			b_t_input += v +','+ bb_b_jenis[i] + ',' + bb_b_bentuk[i] +'<br/>';
		});
		var bb_i_asal = [], bb_i_jenis =[], bb_i_bentuk = [], i_t_input = '';
		$('#form-multi-produk input[name^="i_asal"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_i_asal.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="i_jenis"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ) {
				bb_i_jenis.push($(this).val());
			}
		});
		$('#form-multi-produk input[name^="i_bentuk"]').each(function(i){
			if (validate_not_empty($(this).val()) == true ){
				bb_i_bentuk.push($(this).val());
			}
		});
		$.each(bb_i_asal, function(i,v){
			i_t_input += v +','+ bb_i_jenis[i] + ',' + bb_i_bentuk[i] +'<br/>';
		});
		if (countError == 0) {
			var buildForm = ''
			    + '<input type="hidden" name="nama_produk[]" value="' + produk.id_produk + '">'
			    + '<input type="hidden" name="jenis_pengajuan[]" value="' + produk.jenis_pengajuan + '">'
			    + '<input type="hidden" name="total_realisasi_produk[]" value="' + produk.total_realisasi + '">'
			    + '<input type="hidden" name="kota[]" value="' + produk.domestik + '">'
			    + '<input type="hidden" name="negara[]" value="' + produk.negara + '">'
				+ '<input type="hidden" name="t_asal[]" value="'+bb_t_asal+'">'
				+ '<input type="hidden" name="t_jenis[]" value="'+bb_t_jenis+'">'
				+ '<input type="hidden" name="t_bentuk[]" value="'+bb_t_bentuk+'">'
				+ '<input type="hidden" name="b_asal[]" value="'+bb_b_asal+'">'
				+ '<input type="hidden" name="b_jenis[]" value="'+bb_b_jenis+'">'
				+ '<input type="hidden" name="b_bentuk[]" value="'+bb_b_bentuk+'">'
				+ '<input type="hidden" name="i_asal[]" value="'+bb_i_asal+'">'
				+ '<input type="hidden" name="i_jenis[]" value="'+bb_i_jenis+'">'
				+ '<input type="hidden" name="i_bentuk[]" value="'+bb_i_bentuk+'">'
			;
			stringRealisasi = produk.total_realisasi.toString();
			var totalRealisasi = stringRealisasi.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
			var buildTableProduk 	= ''
				+ '<table class="table table-bordered">'
				+ '<tr><td><strong>Nama Produk</strong></td><td>'+produk.nama_produk+'</td></tr>'
				+ '<tr><td><strong>Jenis Pengajuan</strong></td><td>'+produk.nama_pengajuan+'</td></tr>'
				+ '<tr><td><strong>Realisasi Produk</strong></td><td>'+totalRealisasi+' Kg/tahun</td></tr>'
				+ '</table>'
			;
			var buildTablePemasaran = ''
			+ '<table class="table table-bordered">'
			+ '<tr><td><strong>Domestik</strong></td><td>'+produk.domestik+'</td></tr>'
			+ '<tr><td><strong>Mancanegara</strong></td><td>'+produk.negara+'</td></tr>'
			+ '</table>'
			;
			var buildTableBahanBaku = ''
				+ '<table class="table table-bordered">'
				+ '<tr><td><strong>Tangkapan</strong></td><td>'+t_t_input+'</td></tr>'
				+ '<tr><td><strong>Budidaya</strong></td><td>'+b_t_input+'</td></tr>'
				+ '<tr><td><strong>Import</strong></td><td>'+i_t_input+'</td></tr>'
				+ '</table>'
			;
			var buildTables = ''
			    + '<tr style="background:#FAFAFA;border-bottom:1px solid #FDFDFD;" class="tbl-tr-' + tbl_produk_counter + '">'
			    + '<td style="border-right:1px solid #F1F1F1;vertical-align:top;"><a onclick="remove_table_produk(' + tbl_produk_counter + ')" class="btn btn-xs btn-danger"><i class="ico ico-remove"></i></a>'+ buildForm +'</td>'
			    + '<td style="border-right:1px solid #F1F1F1;vertical-align:top;">' + buildTableProduk + '</td>'
			    + '<td style="border-right:1px solid #F1F1F1;vertical-align:top;">' + buildTablePemasaran + '</td>'
			    + '<td style="vertical-align:top;">' + buildTableBahanBaku + '</td>'
			    + '</tr>'
			;
			tbl_produk_counter += 1;
			console.log(buildTables);
			$('#tbl-produk-container').append(buildTables);
			$('#modalCreateSKP').modal('toggle');
			return false;
		}
		return false;
	});
	/* EOF script multi product */
	/* script upload gmpssop */
	$('input[type=file]').change(function(){
		var fileExtension = ['pdf', 'doc', 'docx', 'jpg', 'jpeg'];
		if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
			notifError('File Tidak Sesuai', 'Hanya format .jpg .jpeg .pdf .doc & .docx yang diperbolehkan');
			var nameAttr = $(this).attr('name');
			$(this).attr('value','');
			$("input[for="+nameAttr+"]").attr('value','');
			return false;
		}else{
			var nameAttr = $(this).attr('name');
			var valFile = $(this).val();
			$("input[for="+nameAttr+"]").attr('value',valFile);
			$("input[for="+nameAttr+"]").removeAttr('flag');
			return true;
		}
	});
	/* reset upload file on reset button */
	$('input[type=reset]').click(function(){
		$("input[for]").attr('value','');
	});
	$('.form-create-skp').on('submit',function(e){
		$('select').filter(function() {
			if($.trim( $(this).val() ) == ''){
				notifError('Input Gagal', 'Field '+$(this).attr('placeholder')+' Masih Kosong');
				return false;
			}
		});
		/* count flag prevent */
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
	});
	/* form penerimaan */
	$('.confirm-upi').on('submit',function(){
		if($('select[name=jenis_upi]').val() != "" && $('select[name=skala_upi]').val() != ""){
			return true;
		}else{
			notifError('Peringatan!', 'Lengkapi Semua Pilihan Field');
			return false;
		}
	});
	/* form upload temuan */
	$('.upload-temuan').on('submit',function(e){
		/* count flag prevent */
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
	});
	/* form skp-terbit */
	$('.upload-skp-terbit').on('submit',function(e){
		/* count flag prevent */
		var prevent = count_flag_prevent($('input[flag=prevent]'));
		if(prevent){
			return true;
		}else {
			return false;
		}
	});
	/* reject skp */
	$('.reject_skp select').on('change',function(){
		if($(this).val()==2) {
			$('input[name="info_revisi"]').removeAttr('required');
			$('.reject_skp .info_revisi').hide();
		} else {
			$('input[name="info_revisi"]').attr('required','required');
			$('.reject_skp .info_revisi').show();
		}
	});
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
	/* clone data */
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
	var formTangkap = '<div id="inputJenis'+ytangkapan+'" class="row">'
		+'<div class="col-sm-4">'
		+'<input required group-field="tangkapan'+ytangkapan+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="t_asal[]"></input></div>'
		+'<div class="col-sm-4">'
		+'<input required group-field="tangkapan'+ytangkapan+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="t_jenis[]"></input></div>'
		+'<div class="col-sm-4">'
		+'<div required class="input-group add-on"><input group-field="tangkapan'+ytangkapan+'" placeholder="Bentuk Ikan" class="form-control" name="t_bentuk[]" id="inputBentuk'+ytangkapan+'" type="text">'
		+'<div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+ytangkapan+'" onclick="removeInputTangkap('+ytangkapan+')"><i class="ico ico-remove"></i></button></div></div></div>'
		+'</div>';
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
	var formBudidaya = '<div id="inputJenis'+ybud+'" class="row"><div class="col-sm-4"><input required group-field="budidaya'+ybud+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="b_asal[]" ></input></div><div class="col-sm-4"><input required group-field="budidaya'+ybud+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="b_jenis[]" ></input></div><div class="col-sm-4"><div class="input-group add-on"><input required group-field="budidaya'+ybud+'" placeholder="Bentuk Ikan" class="form-control" name="b_bentuk[]" id="inputBentuk'+ybud+'" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+ybud+'" onclick="removeInputBudidaya('+ybud+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
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
	var formImport = '<div id="inputJenis'+yim+'" class="row"><div class="col-sm-4"><input required group-field="import'+yim+'" type="text" class="form-control mb10" placeholder="Asal Wilayah" name="i_asal[]"></input></div><div class="col-sm-4"><input required group-field="import'+yim+'" type="text" class="form-control mb10" placeholder="Jenis Ikan" name="i_jenis[]"></input></div><div class="col-sm-4"><div class="input-group add-on"><input required group-field="import'+yim+'" placeholder="Bentuk Ikan" class="form-control" name="i_bentuk[]" id="inputBentuk'+yim+'" type="text"><div class="input-group-btn"><button class="btn btn-default" id="inputBentuk'+yim+'" onclick="removeInputImport('+yim+')"><i class="ico ico-remove"></i></button></div></div></div></div>'
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
