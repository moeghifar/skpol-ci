<script type="text/javascript" src="<?php echo site_url('template/javascript/vendor.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/javascript/core.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/javascript/backend/app.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/inputmask/js/inputmask.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/touchspin/js/jquery.bootstrap-touchspin.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/select2/js/select2.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/datatables/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/datatables/js/dataTables.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/jquery-ui/js/jquery-ui.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/jquery-ui/js/addon/timepicker/jquery-ui-timepicker.js');?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/gritter/js/jquery.gritter.js'); ?>"></script>
<script type="text/javascript" src="<?php echo site_url('template/plugins/bootbox/js/bootbox.js'); ?>"></script>
<script type="text/javascript">
$('select[id="select2-placeholder"]').select2({placeholder: 'Select a State'});
$('input[id="bs-harikerja"]').TouchSpin({min: 0,max: 31,step: 1,decimals: 0,boostat: 5,maxboostedstep: 10,postfix: 'Hari/Bulan'});
$('input[id="bs-shift"]').TouchSpin({min: 0,step: 1,decimals: 0,boostat: 5,maxboostedstep: 10,postfix: 'Shift/Hari'});
$('input[id="bs-volume"]').TouchSpin({min: 0,max: 999999999999999,step: 1,postfix: 'Liter/Hari'});
$('table#table-list-unsortable').each(function(){$(this).dataTable({'bSort':false})});
var table = $('#table-checkbox').DataTable({'bSort':false,'order': [1, 'asc']});
$('#example-select-all').on('click', function(){
	var rows = table.rows({ 'search': 'applied' }).nodes();
	$('input[type="checkbox"]', rows).prop('checked', this.checked);
	var totalCeklis = $("#table-checkbox :checkbox:checked").length;
	if(totalCeklis > 1){
		$('a[data-formclass]').removeClass('disabled');
	}else{
		$('a[data-formclass]').addClass('disabled');
	}
});
$('#table-checkbox tbody').on('change', 'input[type="checkbox"]', function(){
	var hasName = $(this).attr('name');
	var totalCeklis = $("#table-checkbox input[type=checkbox][name='"+hasName+"']:checked").length;
	if(!this.checked){
		var el = $('#example-select-all').get(0);
		if(el && el.checked && ('indeterminate' in el)){
			el.indeterminate = true;
		}
	}
	if(totalCeklis != 0){
		$('a[data-formclass]').removeClass('disabled');
	}else{
		$('a[data-formclass]').addClass('disabled');
	}
});
$('#deleteModal').on('show.bs.modal', function (event) {var button = $(event.relatedTarget);var url = button.data('url');var modal = $(this);modal.find('#target-href').attr('href',url);});
$('#datepicker').datepicker({changeMonth: true,dateFormat: 'yy-mm-dd',changeYear: true});
$('#datepicker2').datepicker({changeMonth: true,dateFormat: 'yy-mm-dd',changeYear: true});
function notifError(judul,text){$.gritter.add({title: judul,text: text,sticky: false,});}
function notifInfo(judul,text){$.gritter.add({title: judul,text: text,'class_name': 'gritter-lightblue',sticky: false});}
<?php $this->nyast->js_notif(); ?>
$('.numb').on('keydown', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
</script>
