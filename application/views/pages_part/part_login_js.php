<script type="text/javascript">
	$(document).ready(function(){
		$('.form-register input[name="nosiup"]').on('blur',function(){
			if ($(this).val() != "") {
				$('.form-register input[name="noiup"]').removeAttr('required');
			} else {
				$('.form-register input[name="noiup"]').attr('required','required');
			}
		});
		$('.form-register input[name="noiup"]').on('blur',function(){
			if ($(this).val() != "") {
				$('.form-register input[name="nosiup"]').removeAttr('required');
			} else {
				$('.form-register input[name="nosiup"]').attr('required','required');
			}
		});
		$('.form-register input[name=username]').on('blur',function(){
			var sel = $(this);
			var uname = sel.val();
			$.post('<?=site_url('auth/check_username_email')?>',{u:uname}).done(function(cb){
				if(cb!=""){
					notifError('Peringatan!', cb);
					sel.attr('flag','prevent');
				}else{
					sel.removeAttr('flag');
				}
			});
		});
		$('.form-register input[name=email]').on('blur',function(){
			var sel = $(this);
			var email = sel.val();
			$.post('<?=site_url('auth/check_username_email')?>',{e:email}).done(function(cb){
				if(cb!=""){
					notifError('Peringatan!', cb);
					sel.attr('flag','prevent');
				}else{
					sel.removeAttr('flag');
				}
			});
		});
		// handle file upload
		$('input:file').change(function(){
			var fileExtension = ['pdf', 'doc', 'docx', 'jpg', 'jpeg'];
			// check siup file
			if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
	            notifError('File Tidak Sesuai', 'Hanya format .jpg .jpeg .pdf .doc & .docx yang diperbolehkan');
				$(this).attr('value','');
				return false;
	        }else{
				// get name
				var nameAttr = $(this).attr('name');
				// get value
				var valFile = $(this).val();
				// assign to input file
				$("input[for="+nameAttr+"]").attr('value',valFile);
				return true;
			}
		});
		$('input[type=reset]').click(function(){
			$("input[for]").attr('value','');
		});
		$('.form-register').on('submit',function(e){
			var ot  	= $('select[name=omzet_tahunan]');
			var p 		= $('select[name=provinsi]');
			var ju 		= $('select[name=jenis_upi]');
			var siup	= $('input[name=file_siup]');
			var iup		= $('input[name=file_iup]');
			var akta 	= $('input[name=file_akta]');
			$('select').filter(function() {
				if($.trim( $(this).val() ) == '') {
					$(this).parent().addClass('has-error');
				} else {
					$(this).parent().removeClass('has-error');
				}
			});
			$('input').filter(function() {
				if($.trim( $(this).val() ) == ''){
					$(this).parent().addClass('has-error');
				} else {
					$(this).parent().removeClass('has-error');
				}
			});
			// count flag prevent
			var cof = check_other_field(ot,p,ju,siup,iup,akta);
			var prevent = count_flag_prevent($('input[flag=prevent]'));
			if(cof && prevent){
				return true;
			}else {
				return false;
			}
		});
		<?php $this->nyast->js_notif(); ?>
	});
	function check_other_field(ot,p,ju,siup,iup,akta){
		if(ot.val() == "" || p.val() == "" || ju.val() == ""){
			notifError('Input Gagal','Semua field harus diisi');
			return false;
		}else if(siup.val() == "" && iup.val() == ""){
			notifError('Input Gagal','File SIUP atau IUP harus diupload');
			return false;
		}else{
			return true;
		}
	}
	function count_flag_prevent(cont){
		var total = cont.size();
		if(total != 0){
			var nerror = cont.attr('name');
			notifError('Peringatan!', nerror+' Sudah Terdaftar');
			return false;
		}else{
			return true;
		}
	}
</script>
<script type="text/javascript">
	$("#username").on("keydown", function (e) {
		this.value = this.value.toLowerCase();
	    return e.which !== 32;
	});
</script>
