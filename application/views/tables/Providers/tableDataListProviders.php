<?php

$create = 0;
$read = 0;
$update = 0;
$delete =  0;
$print =  0;
foreach ($PERMISO as $item)
{
	$create = 	$item['C'];
	$read = 	$item['R'];
	$update = 	$item['U'];
	$delete = 	$item['D'];
	$print = 	$item['I'];
}

?>
<table class="table table-hover" id="tablaDatos">
<thead>
<tr style="background:#AEC9E0;"><th>Id</th>
<th>Proveedor</th><th>Tipo de Servicio</th><th>Acciones</th>
</tr>
</thead>
<tbody>
<?php

		foreach ($PROVEEDORES as $item)
		{
			

			echo("<tr id='$item[id]'><td>$item[id]</td>"); //id en el <tr> para poder eliminarlo mediante ajax
			echo("<td id='$item[id]'>$item[proveedor]</td>"); //id en el <td> para poder modificarlo mediante ajax
			echo("<td>$item[servicio]</td>");
			if($update == 1) //solo si tiene el permiso para modificar se muestran las opciones
			{
				echo("<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarUsuario($item[id]);'><i class='glyphicon glyphicon-pencil'></i> Modificar </button>");
				echo("<button type='button' class='btn btn-link' data-toggle='modal' data-target='#modalCostos' title='Permisos' onclick='costos($item[id]);'><i class='glyphicon glyphicon-lock'></i> Costos por Servicios</button>");
					
			}
			else echo("<td>");
			if($delete == 1)//solo si tiene el permiso para borrar se muestra la opción
				echo("<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarUsuario($item[id]);'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</button></td></tr>");
			else echo("</td></tr>");
		}
			
	?>
</tbody>		
</table>
<hr>
<!--  Modal formulario -->  
		<div class="modal fade bs-example-modal-lg" data-backdrop="static" tabindex="-1" role="dialog" id="modalCostos" >
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Actualizar Costos del Proveedor</h4>
		      </div><!-- /.modal-header -->  
		      <div class="modal-body" id="modalBodyUpdateUsuario">
		      
		      <div class="well well-sm">
			      <label for="tipoCosto">El Costo es:</label>
				      <select name="tipoCosto" id="tipoCosto" class="form-control" style="width:50%;">
				      	<option value="1">Fijo</option>
				      	<option value="2">Variable</option>
				      </select>
			      <div id="valorFijo">
				       	<label for="tipoValor">Valor fijo:</label>
				      	<input type="text" class="form-control" id="tipoValor" style="width:50%;">
			      </div>
			     	<div id="valorVar" style="display: none;">		      
					      <div id="tipoCont2" >
						       	<label for="tipoCont">Tipo de Contenedor:</label>
						      	 <?php echo form_dropdown('tipoCont', $TIPOCARGA, '', 'class="form-control" style="width:50%;" id="tipoCont"'); ?>
					      </div>
					      
					     <div id="valorPor" >
						       	<label for="porcentaje">Porcentaje Valor de Carga:</label>
						      	<input type="text" class="form-control" id="porcentaje" placeholder="Ejemplo: 25" style="width:50%;">
					      </div>
					      <div id="valorPorPeso" >
						       	<label for="peso">Costo x Kilogramo:</label>
						      	<input type="text" class="form-control" id="peso" style="width:50%;" >
					      </div>
					      <div id="valorPorCant" >
						       	<label for="unidad">Costo x Contenedor(Unidad):</label>
						      	<input type="text" class="form-control" id="unidad" style="width:50%;">
						  </div>
				      </div>
			      </div><!-- /.well -->  
			     <button class="btn btn-warning" id="guardarCosto">Agregar Costo</button> 
			     <hr>
			     <div class="well well-sm" id="tablaCostosPorPorv">
				     
				 </div>
		     </div><!-- /.modal-body -->  	
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal update-->
		




 <script type="text/javascript">
 var m_idProveedor=0;
 
 $('#tipoCosto').on('change', function() {

	  $( "#valorFijo" ).toggle();
	  $( "#valorVar" ).toggle();
	 
	});

 function costos(id)
 {
	 m_idProveedor=id;
	 $("#tablaCostosPorPorv").load("<?php echo base_url('Proveedores/getCostos/'); ?>"+id, function() {
		    $(this).show(700);
		});
	 return;
 }
 
	
 $( document ).ready(function() {

	 $('#guardarCosto').on('click', function() {

			var tipocosto = 0;
			var valor1 = 0;
			var tipocont = 0;
			var tipoConttext = "";
			var valor2 = 0;
			var valor3 = 0;
			var valor4 = 0;

			tipocosto = $('#tipoCosto').val();
			valor1 = $('#tipoValor').val();
			tipocont = $('#tipoCont').val();
			tipoConttext = $( "#tipoCont option:selected" ).text();
			valor2 = $('#porcentaje').val();
			valor3 = $('#peso').val();
			valor4 = $('#unidad').val();
			if(!valor1)
				valor1=0;
			if(!valor2)
				valor2=0;
			if(!valor3)
				valor3=0;
			if(!valor4)
				valor4=0;
			$.post('<?php echo base_url("Proveedores/createCosto/"); ?>'+m_idProveedor+'/'+tipocosto+'/'+valor1+'/'+tipocont+'/'+valor2+'/'+valor3+'/'+valor4,function () {
			})
			  .done(function(retorno) {
				  // retorna el nombre del proveedor o (0,-1)==error
				  if($.trim(retorno) != '0' || $.trim(retorno) != '-1') //si hubo éxito en la insercción actualiza la tabla permisos dinámicamente
					{
						//construimos el string row <tr> para insertarlo a la tabla costos
						
						var row;
						row += "<tr id='"+m_idProveedor+"'><td>"+m_idProveedor+"</td>";
						row += "<td>"+$.trim(retorno)+"</td>";
						if(tipocosto == 1)
							row += "<td>Fijo</td>";
							else
							row += "<td>Variable</td>";
						row += "<td>$"+valor1+"</td>";
						row += "<td>"+tipoConttext+"</td>";
						row += "<td>"+valor2+"%</td>";
						row += "<td>$"+valor3+"</td>";
						row += "<td>$"+valor4+"</td></tr>";
						
						//inserccion de fila dinámica
						var tablaDatos= $("#tablaDatosCostos");
						tablaDatos.append(row);
						limpiaModal();
						
					}
				  else
				  {
					  // TODO: Avisar al Usuario
					  alert("Error..");
				  }
			  });



			
		
		}); // fin guardar costo
		
	}); // fin document ready

	function limpiaModal()
	{
		$('#tipoCosto option:first').prop('selected', 'selected');
		$('#tipocont option:first').prop('selected', 'selected');
		$('#tipoValor').val('');
		$('#porcentaje').val('');
		$('#peso').val('');
		$('#unidad').val('');
		 $( "#valorVar" ).hide(500);
	}
</script>				  