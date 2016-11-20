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
							foreach ($FACTURAS as $item)
							{
								$create = $item['C'];
								$read = $item['R'];
								$update = $item['U'];
								$delete = $item['D'];
								$print = $item['I'];
							}
								if($create == 1) //si tiene  permiso para crear se muestra el acceso
								{
									echo("<li  onclick='alert('No Disponible');'><a href='#'>Crear Factura</a></li>");
								}
								if($read  == 1) //si tiene  permiso para buscar se muestra el acceso
								{
									echo("<li  onclick='buscarFacturas();'><a href='#'>Buscar Facturas</a></li>");
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
	 	
	 	<h3><span style="color: red;" id="info"></span></h3>
<!-- 	 		<div id="formulario" style="display: none;"> -->
	 			
					<div id="formulario" class="jumbotron" style="display: none;">
					 
					</div>




	 			
<!-- 	 		</div> -->
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
 
 <!-- Elementos Modales  -->
 <!--  Modal Prguntar guardar-->
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntar">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Registro de Usuario</h4>
		      </div>
		      <div class="modal-body">
		     		        
			        <form role="form" id = "form_preguntarf">
			        	  	        	  
						  <div><h3>Datos listos para guardar.<small><br> Qu&eacute; desea hacer ?</small></h3></div>
						  <button type="button" class="btn btn-info" onclick="guardarUsuario();" data-toggle='tooltip' >Guardar datos</button>
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
		        <h4 class="modal-title">Registro de Usuario</h4>
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
        
		<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="modalPreguntarEliminarUsuario">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Eliminaci&oacute;n de Usuario</h4>
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
 
 <!--  Modal formulario buscar cedula-->  
<div class="modal fade" data-backdrop="static" tabindex="-1" role="dialog" id="buscaCed" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buscar C&eacute;dula del Cliente</h4>
            </div>
            <div class="modal-body" id="modalBodyUpdateUsuario">
                <input id="idced" class="form-control" style="width: 50%;" name="btn_add" type="text" class="" Placeholder="C&eacute;dula" />
                <br>
                <button onclick="CedSeek();" name="Buscar" type="Button" class="btn btn-warning">Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            <div id="infoced"></div>
            </div>
			
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dalog -->
</div><!-- /.modal update-->
</body>
<script type="text/javascript">

$( document ).ready(function() {
	<?php 
		if (isset($idCot))
		{
			?> 
			 var idCot = <?php echo $idCot; ?>;
			 crearFactura(idCot);
			<?php 
		}
	?>
   
});

function crearFactura(idCot)
{

    
	$("#formulario").load("<?php echo base_url('Facturas/traerCotizacion/'); ?>"+idCot, function() {
	    $(this).show(700);
	});
}

function buscarFacturas()
{
	$("#formulario").load("<?php echo base_url('Facturas/traerFacturas'); ?>", function() {
	    $(this).show(700);
	});
}

function track(idFactura)
{
	$("#formulario").load("<?php echo base_url('Facturas/map/'); ?>"+idFactura, function() {
	    $(this).show(700);
	});
}

</script>

</html>		