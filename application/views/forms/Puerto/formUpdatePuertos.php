<?php
/**
 * formulario update de usuario
 */


	$id = $Puertos->id;
	$nombre = $Puertos->nombre;
	$codpais = $Puertos->codpais;
	
	
	foreach ($PERMISO as $item)
	{
		$create = $item['C'];
		$read = $item['R'];
		$update = $item['U'];
		$delete = $item['D'];
		$print = $item['I'];
	}
	
	// <tr> para actualizar la lista de los usuarios dinamicamente mediante jquery </tr>.
	$tr;
	
	if($update == 1) 
	{
		$tr = "<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarPuertos($id);'><i class='glyphicon glyphicon-pencil'></i> Modificar</button>";
		
			
	}
	else 
		$tr = $tr."<td>";
	if($delete == 1)
		$tr = $tr."<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarPuertos($id);'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</button></td></tr>";
	else
		$tr = $tr."</td></tr>";

?>
<form data-toggle="validator" role="form" id="updateUserForm" style="background-color: #f2faea;">
                <div class="control-group form-group">
                        <div class="controls">
                            <label>NOMBRE DEL PUERTO</label>
                            <input type="text" value="<?php echo ($nombre); ?>" style="width: 25%;" class="form-control" id="nombre_update" required data-validation-required-message="Por favor ingrese el nombre del puerto.">
                            <p class="help-block"></p>
                        </div>
                </div>
                
  				   <div class="control-group form-group">
				  <div class="controls">
					    <label for="pais" class="control-label">Pa&iacute;s:</label>
					     <?php echo form_dropdown('Paises', $PAISES, '', 'class="form-control" id="idpais"'); ?>
					    <div class="help-block with-errors"></div>
				    </div>
				  </div>
                    
				 
			     <div class="form-group">
			    
			    	<button type="submit" class="btn btn-primary" >Actualizar Usuario</button>
			  	</div>
			  	<span style="color: red; display:block;"></span>
  				

 
</form>


<script>
$(document).ready(function() {

	//validación de los datos del usuario antes de actualizarlos
	$("#updateUserForm").submit(function(event) {
		
		event.preventDefault();
		
		
		$('#modalUpdatePuertos').modal('hide'); //cerrar ventana modal update
		
		var nombre = $('#nombre_update').val();
		var codpais = $('#codpais').val();
		
		var success = 0;
		$.ajaxSetup({async: false});
		// valida captcha
		
			  if(nombre !== '') // captcha válido
			  {
				  $.post('<?php echo base_url("Puertos/updatePuertos/").$id; ?>/'+nombre+'/'+codpais,function () {
					})
					  .done(function(retorno) {
						  success = $.trim(retorno);
					  });
			  }	 
		
		if(success == '1') 
		{
			// se actualiza tabla de usuarios
			var tr = "<tr ><td id='<?php echo $id; ?>'><?php echo $id; ?></td><td>"+nombre+"</td><td>"+codpais+"</td><?php echo $tr; ?>";
			$("tr#<?php /* TODO: no esta actualizando dinamicamente; */ echo $id; ?>").parent().replaceWith(tr);
			// aviso al usuario
			$('#aviso').html("<h2>Datos Actualizados.</h2>" ).show().fadeOut( 5000 );
		 	$('#modalAviso').modal('show');
		}
		else if(success == '0') //no hubo cambios
		{
			// aviso al usuario
			 	$('#aviso').html("<h2>No hubo Cambios.</h2>" ).show().fadeOut( 5000 );
			 	$('#modalAviso').modal('show');
		}
		});
	
		


	
});



</script>