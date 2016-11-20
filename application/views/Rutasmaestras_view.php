<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Rapicarga WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="<?php echo base_url("css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
 	<link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
 	<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery-ui.js'); ?>"></script>
    <script src="<?php echo base_url('js/crypto/sha1.js'); ?>"></script>
</head>
<body>
 
<div id="container">
	<div class="wrapper">
    
		 <div class="header">
	       <div class="container header_top">
				<div class="logo">
				  <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/logo.png'); ?>" alt=""></a>
				</div>
		  		<div class="menu">
					<ul class="nav" id="nav">
					<?php
							/*
							 * Menú dinámico según los permisos de usuario
							 */
					$create = 0;
					$read = 0;
					$update = 0;
					$delete =  0;
					$print =  0;
							foreach ($Rutasmaestras as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
								if($create == 1) //si tiene  permiso para crear se muestra el acceso
								{
									echo("<li  onclick='crearRutasmaestras();'><a href='#'>Crear Rutas maestras</a></li>");
								}
								if($read  == 1) //si tiene  permiso para buscar se muestra el acceso
								{
									echo("<li  onclick='buscarRutasmaestras();'><a href='#'>Buscar Rutas maestras</a></li>");
								}
							
					?>
					  <li><a href="<?php echo base_url('Management/'); ?>">Regresar</a></li>	
					  <li><a href="<?php echo base_url('Logout/'); ?>">Salir</a></li> 
					</ul>
				</div>								
	  			
			 </div>
		</div>
	

     <div class="container banner">
	 	<div class="row">
	 	<h3><span class="label label-info">M&oacute;dulo de Rutas Maestras</span></h3>
	 	<h3><span style="color: red;" id="info"></span></h3>
	 		<div id="formulario" style="display: none;"></div>
	 	 </div>
	 	 
	 </div>
	 
     <div class="container footer">
       
     	<div class="footer_bottom">
     	  <div class="copy">
		    <p>&copy;2015 RapiCarga S.A.</p>
		  </div>
		  <ul class="social">
			<li><a href=""> <i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
		  </ul>
		  <div class="clearfix"> </div>
     	</div>
     </div>
 </div>	
</div>
 <!-- Elementos Modales -->
 
 <!--  Modal formulario Permisos-->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPermisos">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Permisos de  Puerto</h4>
		      </div>
		      <div class="modal-body" id="modalBodyPermiso">
		     		
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal permisisos-->
		
<!--  Modal formulario Update Usuarios-->  
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalUpdateRutasmaestras" >
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Actualizar Informaci&oacute;n del Puerto</h4>
		      </div>
		      <div class="modal-body" id="modalBodyUpdateRutasmaestras">
		     		
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal update-->

 
 <!-- FIN Elementos Modales -->
 <!-- Elementos Modales  -->
 <!--  Modal Prguntar guardar-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntar">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Registro de Rutas Maestras</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf">
			        	  	        	  
						  <div><h3>Datos listos para guardar.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-info" onclick="guardarRutasmaestras();" data-toggle='tooltip' >Guardar datos</button>
						  <button type="button" class="btn btn-warning"  data-dismiss="modal" aria-hidden="true">Cancelar</button>
					</form>
		               
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
 <!--  Modal Prguntar guardar-->
        
		<div class="modal fade bs-example-modal-sm" data-backdrop="static" tabindex="-1" role="dialog" id="modalAviso">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Aviso</h4>
		      </div>
		      <div class="modal-body" id="aviso">
		      </div>
		      <div class="modal-footer">
		       <button type="button" class="btn btn-info" onclick="aceptarAviso();" data-dismiss="modal" aria-hidden="true">Aceptar</button>
						  
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
	
	<!--  Modal Preguntar seguir-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntarSeguir">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Registro de Rutas Maestras</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf2">
			        	  			        	  
						  <div><h3>Datos Guardados Satisfactoriamente.</h3></div>
						  <button type="button" class="btn btn-info" onclick="salir();" data-dismiss="modal" aria-hidden="true">Aceptar</button>
						  </form>
		               
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
<!--  Modal Prguntar eliminar-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntarEliminarRutasmaestras">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminaci&oacute;n de Rutas Maestras</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form">
			        	  <div id='mensaje3'></div>
			        	  
						  <div><h3>Confirme por favor.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-warning" onclick="eliminar();" data-toggle='tooltip' >Eliminar</button>
						  <button type="button" class="btn btn-info"  data-dismiss="modal" aria-hidden="true">Cancelar</button>
					</form>
		               
		    </div>
		      
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dalog -->
		</div><!-- /.modal preguntar-->
 <!--  Modal Prguntar guardar-->
</body>

<script>

var puertoorigen;
var puertodestino;


//Despliega el formulario para crear usuario
function crearRutasmaestras(){
	$("#formulario").load("<?php echo base_url('Rutasmaestras/loadView/NewRutasmaestras'); ?>", function() {
	    $(this).show(700);
	});

}

//validación de los datos del usuario antes de guardarlos
$("#formulario").submit(function(event) {
	
	event.preventDefault();
	
	puertoorigen = $('#puertoorigen').val();
	puertodestino = $('#puertodestino').val();
	
	
  if ( puertoorigen !== '' ) {
	   
	    $('#modalPreguntar').modal({
			keyboard : false
		});
		$('#modalPreguntar').modal('show');
		return;
	  }
  else
			$( "span" ).text("no se selecciono el puerto de origen" ).show().fadeOut( 3000 );
	 
	});

//guarda los datos del nuevo puerto
function guardarRutasmaestras() {
	var success = 0;
	$.ajaxSetup({async: false});
	$.post('<?php echo base_url("Rutasmaestras/createRutasmaestras/"); ?>'+puertoorigen+'/'+puertodestino,function () {
		})
		  .done(function(retorno) {
			  success = retorno;	 
		  });
	  
    $('#modalPreguntar').modal('hide');
    
		if(success == 1) // exito al insertar
		{
			location.reload();
		}
		if(success == 0) //falló al intentar guardar
		{
			$( "span" ).text("No se pudo guardar, revise los datos!" ).show().fadeOut( 5000 );
		}
	
}






//despúes de crear al puerto sale del formulario
function salir()
{
	location.reload();
}

//Despliega el formulario para buscar puerto
function buscarRutasmaestras(){
	$("#formulario").load("<?php echo base_url('Rutasmaestras/loadView/findRutasmaestras'); ?>", function() {
	    $(this).show(700);
	});
}

//búsqueda del usuario según el criterio
//carga una tabla dinámica con los datos encontrados
function buscarRutasmaestrasCriterio(criterio)
{
	if(criterio == 1) //según el texto de búsqueda nombre de puerto
	{
		var data = $("#busqueda").val(); //texto de búsqueda
		if(data===''){
			$('#info').html("<h2>Texto de b&uacute;squeda vac&iacute;o.</h2>" ).show().fadeOut( 3000 ); 
			return;}
		$("#tablaResultados").load("<?php echo base_url('Rutasmaestras/findRutasmaestras/1/'); ?>"+data, function() {
		    $(this).show(700);
		});
	}
	if(criterio == 2) // los últimos 10 registrados
	{
		$("#tablaResultados").load("<?php echo base_url('Rutasmaestras/findRutasmaestras/2/0'); ?>", function() {
		    $(this).show(700);
		});
	}
}

//Despliega el formulario modal  'update' de usuario
function editarRutasmaestras(id)
{
	$('#modalUpdateRutasmaestras').modal({
		keyboard : false
	});
	$('#modalUpdateRutasmaestras').modal('show');
	$("#modalBodyUpdateRutasmaestras").load("<?php echo base_url('Rutasmaestras/findRutasmaestras/id/'); ?>"+id, function() {
	    $(this).show(700);
	});
}



// Despliega ventana de confirmación para eliminar usuario
function eliminarRutasmaestras(id)
{
	id_aEliminar = idUsuario;
	$('#modalPreguntarEliminarRutasmaestras').modal({
		keyboard : false
	});
	$('#modalPreguntarEliminarRutasmaestras').modal('show');
}

// Elimina al usuario seleccionado
function eliminar()
{
	$.ajaxSetup({async: false});
	
	$.post('<?php echo base_url("Rutasmaestras/deleteRutasmaestras/"); ?>'+id_aEliminar,function () {
		})
		  .done(function(retorno) {
			  if($.trim(retorno) == '1') // exito al eliminar
				{
				  $('table#tablaDatos tr#'+id_aEliminar).remove(); //quitamos de la tabla de usuarios
				  $('#mensaje3').html("<h2>Dato eliminado correctamente!</h2>")
			        .hide()
			        .fadeIn(1000, function() {
			        	$('#modalPreguntarEliminarUsuario').modal('hide'); 					
			        }); 
					
				}
			  if($.trim(retorno) == '0') //falló al intentar eliminar
				{
				// aviso al usuario
				 	$('#aviso').html("<h2>No hubo Cambios.</h2>" ).show().fadeOut( 5000 );
				 	$('#modalAviso').modal('show');
				}
		  });
	 		
}
//cerrar modal aviso
function aceptarAviso()
{
	$('#modalAviso').modal('hide');
}

// despliega ventana modal para modificar permisos de usuarios
function permisosUsuarios(idUsuario)
{
	$('#modalPermisos').modal({
		keyboard : false
	});
	$('#modalPermisos').modal('show');
	
	$("#modalBodyPermiso").load("<?php echo base_url('Usuarios/getPermission/'); ?>"+idUsuario, function() {
	    $(this).show(700);
	});
	
}

</script>
</html>		