<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center">Brokers</h1>
	<table id="example" class="table table-striped table-bordered table-responsive" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Correo</th>
                                        <th>Estatus</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Teléfono</th>
					<th>Correo</th>
                                        <th>Estatus</th>
					<th>Acciones</th>
				</tr>
			</tfoot>
		</table>
	<a class="btn btn-default"  href="<?php echo full_url."/adm/brokers/index.php?action=new"?>"><i class="fa fa-file-o fa-pull-left fa-border"></i>Agregar</a>
        <br><br><br>
</div>
	<?php include('../../view_footer.php')?>
<script>
$(document).ready(function() {
    $('#example').DataTable({
        "scrollX": true,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo full_url."/adm/brokers/index.php?action=brokers_list_json"?>",
		"language": {
                "url": "<?php echo full_url."/web/js/"?>datatables.spanish.lang"
        },
        "columns": [
            { "data": "id_broker" },
            { "data": "name" },
            { "data": "phone1" },
            { "data": "email1" },
            { "data": "status" },
            { "data": "actions" }
        ],
      "aoColumnDefs": [
          { 'bSortable': false, 'aTargets': [ 4 ] }
       ]				
    });
} );

</script>
