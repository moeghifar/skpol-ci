<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.0/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.0/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.0/js/buttons.print.min.js"></script>
<script type="text/javascript">
$('table#table-list-printable').each(function(){
	$(this).dataTable({
		'bSort':false,
		dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
	});
});
</script>
