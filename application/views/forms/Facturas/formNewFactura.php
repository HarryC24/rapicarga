<?php 
if (empty($COTIZACION))
{
?>
<form class="control-form" >
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Error:</span>
	  No existe Cotizaci&oacute;n
	  <br>
	  <a href="<?php echo base_url("Cotizaciones/"); ?>" class="btn btn-link">Ir al M&oacute;dulo Cotizaciones</a>
	</div>
</form>
<?php
exit();
}


?>
<style>
 
.inputstl { 
    padding: 9px; 
    border: solid 1px #0077B0; 
    outline: 0; 
    background: -webkit-gradient(linear, left top, left 25, from(#FFFFFF), color-stop(4%, #C6ECFF), to(#FFFFFF)); 
    background: -moz-linear-gradient(top, #FFFFFF, #C6ECFF 1px, #FFFFFF 25px); 
    box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -moz-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 
    -webkit-box-shadow: rgba(0,0,0, 0.1) 0px 0px 8px; 

    } 
 .linea {
 	width: 100%; 
 	color: black;
 	height: 1px; 
 	background-color: #68BEE8;
 }
  .collapsing {
    background-color: #F5F5F5;
  }   
</style>
    
    <form id="frmNewQut" >
    <div style="text-align: center;"><h2> Detalle de Cotizaci&oacute;n</h2></div>
    <hr class="linea" />
	   <div class="row">
			  <div class="col-xs-6">
			    <label for="numcot">No. de Cotizacion:</label>
	            <input readonly id="idCot" type="text" class="form-control" value="<?php echo $COTIZACION[0]['Identificador']?>"  id="numcot">
	       
			  </div>
			  <div class="col-xs-6">
			   <label for="datepicker" class="control-label">Fecha:</label>
	            <input readonly type="date"  class="form-control" value="<?php echo $COTIZACION[0]['fecha']?>">
			  </div>
		</div>

        <div style="text-align: center; margin-top: 25px;"><h3> Datos Generales del Cliente/Empresa</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-6">
				<label for="ced">C&eacute;dula del Cliente:</label>
	            <input readonly type="text" value="<?php echo $COTIZACION[0]['cedula'];?>" class="form-control"  id="ced">
	         </div>
			<div class="col-xs-6">
			  	<label for="nomcli">Nombre del Cliente:</label>
            	<input readonly  type="text" value="<?php echo $COTIZACION[0]['Cliente'];?>" class="form-control"  id="nomcli">         	    
			</div>
				
		</div>
		
		<div class="row">
			<div class="col-xs-4">
				  	<label for="nomcom">Nombre de la Empresa:</label>
	            	<input  readonly type="text" value="<?php echo $COTIZACION[0]['nombrecomercial'];?>" class="form-control"  id="nomcom">         	    
					       
				</div>
				<div class="col-xs-4">
				  	<label for="nomleg">Nombre Legal de la Empresa:</label>
	            	<input  readonly  type="text" value="<?php echo $COTIZACION[0]['nombrelegal'];?>" class="form-control"  id="nomleg">         	    
					       
			</div>
			<div class="col-xs-4">
				  	<label for="nomleg">RUC Empresa:</label>
	            	<input  readonly  type="text" value="<?php echo $COTIZACION[0]['ruc'];?>" class="form-control" >         	    
					       
			</div>
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3> Ruta de la Carga</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-6">
				  	<label for="nomcom">Pa&iacute;s de Origen:</label>
				  	<input  readonly  type="text" value="<?php echo $PUERTOS[0]['PaisO'];?>" class="form-control" >		   
	        </div>
	        
	        
			<div class="col-xs-6">
				  	<label for="nomleg">Pa&iacute;s de Destino:</label>
				  	<input  readonly  type="text" value="<?php echo $PUERTOS[0]['PaisD'];?>" class="form-control" >				   
				  	
	       </div>
		</div>
		
        <div class="row" style="text-align: left; margin-top: 10px;">
			<div class="col-xs-6">
				  	<label for="nomcom">Puerto de Origen:</label>
				  	<input  readonly  type="text" value="<?php echo $PUERTOS[0]['PuertoO'];?>" class="form-control" >				   
	        </div>
	        <div class="col-xs-6">
				  	<label for="nomcom">Puerto de Destino:</label>
				  	<input  readonly  type="text" value="<?php echo $PUERTOS[0]['PuertoD'];?>" class="form-control" >				   
	        </div>
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3>Detalles de la Carga</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-3">
					  	<label for="nomcom">Tipo de Carga/Contenedor:</label>
					  <input  readonly  type="text" value="<?php echo $COTIZACION[0]['tipocarga'];?>" class="form-control" >	
		        </div>
			<div class="col-xs-3">
					  	<label for="valCar">Valor de la Carga:</label>
					  	<input  readonly  type="text" value="<?php echo $COTIZACION[0]['valorRealCarga'];?>" class="form-control" >      	    
								  	
			</div>
			<div class="col-xs-3">
					  	<label for="cantCar">Cantidad (U):</label>
					  <input  readonly  type="text" value="<?php echo $COTIZACION[0]['cantidad'];?>" class="form-control" > 			   
		    </div>
		    <div class="col-xs-3">
					  	<label for="pesoCar">Peso (Kg):</label>
					  <input  readonly  type="text" value="<?php echo $COTIZACION[0]['peso'];?>" class="form-control" > 			   
		    </div>
		</div>
		<div class="row">
		<br>
			<div class="col-xs-8">
					<label for="desc">Descripci&oacute;n de la Carga:</label>
					<textarea readonly rows="4" class="form-control" ><?php echo $COTIZACION[0]['comcarga'];?></textarea>
			</div>
			<div class="col-xs-4">
			<br>
					<label for="datepicker2">Fecha Estimada de Salida:</label>
					<input  readonly  type="text" value="<?php echo $COTIZACION[0]['fechasalida'];?>" class="form-control" >
					<label for="volu">Vol&uacute;men de la Carga:</label>
					<input  readonly  type="text" value="<?php echo $COTIZACION[0]['dimensiones'];?>" class="form-control" > 			   		
			</div>
		</div>
				
		<div style="text-align: center; margin-top: 25px;"><h3>C&aacute;lculo de Costos</h3></div>
		<hr class="linea" />
		<div class="row">
		<div class="col-xm-8" id="t6" >
		<div class="panel panel-default">
		<div class="panel-heading">Proveedores Seleccionados</div>
				<table class="table table-hover" id="tablaResl">
						<thead>
							<tr style="background:#AEC9E0;"><th>Proveedor</th>
							<th>Costo Aprox.</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$costo=0;
						foreach ($COSTOS as $item)
								{
									echo("<tr><td>$item[proveedor]</td>");
									echo("<td>&dollar;.".number_format($item['costo'],2)."</td></tr>");
									$costo = $costo + $item['costo'];
								}
								?>
						</tbody>
					</table>
					<div class="well">
					<label>Total de Costos:</label><div id="tot1">$.<?php echo number_format($costo,2);?></div>
					<br>
					<label>Comisi&oacute;n:</label><div id="tot2">$.<?php echo number_format($COTIZACION[0]['tarifarapicarga'],2);?></div>
					<br>
					<label>Costo Aproximado:</label><div id="tot3">$.<?php echo number_format(($COTIZACION[0]['tarifarapicarga']+$costo),2);?></div>
					<br>
					</div>
				</div>	
			</div>
			
		</div>
		
		<hr class="linea" />
        <div class="row" style="margin-bottom: 10px;">
         
            <div class="col-xs-4">
                <input id="btn1"  name="btn1" type="button" style="width: 50%;" class="btn btn-success" value="Facturar Cotizaci&oacute;n" />
            </div>
             <div class="col-xs-8" id="mensaje">
               
            </div>
        </div>
    </form>


<script type="text/javascript">
var totFac;
$( document ).ready(function() {
    totFac = <?php echo($COTIZACION[0]['tarifarapicarga']+$costo); ?>;
});


$("#btn1").click(function()
		{
	
	if (confirm('Confirma Facturar esta Cotizacion?')) {
		var idCot = $("#idCot").val();
		$.ajaxSetup({async: false});
		$.post('<?php echo base_url("Facturas/convertirAFactura/"); ?>'+idCot+"/"+totFac,function () {
			})
			.done(function(exito) {
				if($.trim(exito)!== '0')
				{
					alert("Nueva Factura registrada");
					 $('#mensaje').html("<h2>Estado de Documento: Entrega En Curso.</h2>")
				        .hide()
				        .fadeIn(1500, function() {
				        	location.reload(true); 					
				        });
				}
				 
			  });
	} else {
	    // Do nothing!
	}
		});

</script>