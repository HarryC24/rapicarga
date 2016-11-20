<?php 
if (empty($CLIENTE))
{
?>
<form class="control-form" >
	<div class="alert alert-danger" role="alert">
	  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
	  <span class="sr-only">Error:</span>
	  No existe el Cliente
	  <br>
	  <a href="<?php echo base_url("Costumers/"); ?>" class="btn btn-link">Ir al M&oacute;dulo Clientes</a>
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
    <div style="text-align: center;"><h2> Cotizaci&oacute;n de Servicios RapiCarga</h2></div>
    <hr class="linea" />
	   <div class="row">
			  <div class="col-xs-6">
			    <label for="numcot">No. de Cotizacion:</label>
	            <input required type="text" class="form-control"  id="numcot" placeholder="Num cotizacion">
	       
			  </div>
			  <div class="col-xs-6">
			   <label for="datepicker" class="control-label">Fecha:</label>
	            <input required type="date"  class="form-control" name="datepicker" placeholder="Fecha (ej. 2016-12-31)"  id="datepicker">
			  </div>
		</div>

        <div style="text-align: center; margin-top: 25px;"><h3> Datos Generales del Cliente/Empresa</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-6">
				<label for="ced">C&eacute;dula del Cliente:</label>
	            <input readonly type="text" value="<?php echo $CLIENTE[0]['cedula'];?>" class="form-control"  id="ced">
	         </div>
			<div class="col-xs-6">
			  	<label for="nomcli">Nombre del Cliente:</label>
            	<input readonly  type="text" value="<?php echo $CLIENTE[0]['nombre']." ".$CLIENTE[0]['apellido'];?>" class="form-control"  id="nomcli">         	    
			</div>
				
		</div>
		
		<div class="row">
			<div class="col-xs-6">
				  	<label for="nomcom">Nombre de la Empresa:</label>
	            	<input  readonly type="text" value="<?php echo $CLIENTE[1]['nombrecomercial'];?>" class="form-control"  id="nomcom">         	    
					       
				</div>
				<div class="col-xs-6">
				  	<label for="nomleg">Nombre Legal de la Empresa:</label>
	            	<input  readonly  type="text" value="<?php echo $CLIENTE[1]['nombrelegal'];?>" class="form-control"  id="nomleg">         	    
					       
			</div>
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3> Ruta de la Carga</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-6">
				  	<label for="nomcom">Pa&iacute;s de Origen:</label>
				  	<?php echo form_dropdown('paisO', $PAISES, '', ' required class="form-control" id="paisO" onchange="selectPuertos(1)"'); ?>			   
	        </div>
	        
	        
			<div class="col-xs-6">
				  	<label for="nomleg">Pa&iacute;s de Destino:</label>
				  	<?php echo form_dropdown('paisD', $PAISES, '', ' required class="form-control" id="paisD" onchange="selectPuertos(2)"'); ?>			   
				  	
	       </div>
		</div>
		
        <div class="row" style="text-align: left; margin-top: 10px;">
			<div class="col-xs-6">
				  	<label for="nomcom">Puerto de Origen:</label>
				  	<select id="puertoO" required class="form-control  inputstl" style="width: 50%;"></select>			   
	        </div>
	        <div class="col-xs-6">
				  	<label for="nomcom">Puerto de Destino:</label>
				  	<select id="puertoD" required class="form-control  inputstl" style="width: 50%;"></select>			   
	        </div>
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3>Detalles de la Carga</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-3">
					  	<label for="nomcom">Tipo de Carga/Contenedor:</label>
					  <?php echo form_dropdown('tipoCont', $TIPOCARGA, '', 'required class="form-control  inputstl" style="width:100%;" id="tipoCont"'); ?>
		        </div>
			<div class="col-xs-3">
					  	<label for="valCar">Valor de la Carga:</label>
					  	<input  required type="text"  class="form-control" placeholder="Valor Monetario de la Carga " id="valCar">         	    
								  	
			</div>
			<div class="col-xs-3">
					  	<label for="cantCar">Cantidad (U):</label>
					  <input  type="text"  class="form-control" required placeholder="Cantidad de Contenedores" id="cantCar"> 			   
		    </div>
		    <div class="col-xs-3">
					  	<label for="pesoCar">Peso (Kg):</label>
					  <input  type="text" required  class="form-control" placeholder="Peso de la carga" id="pesoCar"> 			   
		    </div>
		</div>
		<div class="row">
		<br>
			<div class="col-xs-8">
					<label for="desc">Descripci&oacute;n de la Carga:</label>
					<textarea rows="4" class="form-control" id="comCarga"></textarea>
			</div>
			<div class="col-xs-4">
			<br>
					<label for="datepicker2">Fecha Estimada de Salida:</label>
					<input required type="date"  class="form-control" name="datepicker2" placeholder="Fecha (ej. 2016-12-31)"  id="datepicker2">
					<label for="volu">Vol&uacute;men de la Carga:</label>
					<input  type="text"  class="form-control" placeholder="Pies C&uacute;bicos" id="volu"> 			   		
			</div>
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3>Servicios para la Carga</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xs-8">
				  	<label for="tipoServ">Seleccione los Servicios para esta Carga (Ctrl + Click):</label>
				  	 <?php echo form_dropdown('servicios', $SERVICIOS, '', 'class="form-control inputstl" id="servicios" multiple'); ?>
		   </div>		   		
		</div>
		<div class="row">
		<div class="col-xs-2">
			<input style="text-align: left; margin-top: 10px;" type="submit" class="btn btn-info" value ="Iniciar Calculos">	  							  
		</div>
			
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3>Proveedores Disponibles</h3></div>
		<hr class="linea" />
		<div class="row">
			<div class="col-xm-6" id="t1" style="display: none;">
			<div class="panel panel-default">
			<div class="panel-heading">Proveedores para Transporte Terrestre </div>
	
				<table class="table table-hover" id="tablaProvs">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th>
							<th>Proveedor</th><th>Costo Fijo</th><th>x Valor</th><th>x Contenedor</th><th>x Peso</th><th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					</div>
			</div>
			<div class="col-xm-6" id="t2" style="display: none;">
			<div class="panel panel-default">
			<div class="panel-heading">Proveedores para Transporte Mar&iacute;timo</div>
				<table class="table table-hover" id="tablaProvs2">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th>
							<th>Proveedor</th><th>Costo Fijo</th><th>x Valor</th><th>x Contenedor</th><th>x Peso</th><th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-xm-6" id="t3" style="display: none;">
			<div class="panel panel-default">
			<div class="panel-heading"> Proveedores para Servicio Aduanal</div>
			
				<table class="table table-hover" id="tablaProvs3">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th>
							<th>Proveedor</th><th>Costo Fijo</th><th>x Valor</th><th>x Contenedor</th><th>x Peso</th><th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					</div>
			</div>
			<div class="col-xm-6" id="t4" style="display: none;">
			<div class="panel panel-default">
			<div class="panel-heading">Proveedores para Almacenaje</div>
			
				<table class="table table-hover" id="tablaProvs4">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th>
							<th>Proveedor</th><th>Costo Fijo</th><th>x Valor</th><th>x Contenedor</th><th>x Peso</th><th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-xm-6" id="t5" style="display: none;">
			<div class="panel panel-default">
			<div class="panel-heading">Proveedores para Seguro de Carga</div>
			
				<table class="table table-hover" id="tablaProvs5">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th>
							<th>Proveedor</th><th>Costo Fijo</th><th>x Valor</th><th>x Contenedor</th><th>x Peso</th><th>Seleccionar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					</div>
			</div>
			
			
		</div>
		<div style="text-align: center; margin-top: 25px;"><h3>C&aacute;lculo de Costos</h3></div>
		<hr class="linea" />
		<div class="row">
		<div class="col-xm-8" id="t6" style="display: none;">
		<div class="panel panel-default">
		<div class="panel-heading">Proveedores Seleccionados</div>
				<table class="table table-hover" id="tablaResl">
						<thead>
							<tr style="background:#AEC9E0;"><th>Id</th><th>Proveedor</th>
							<th>Costo Aprox.</th><th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
						
						</tbody>
					</table>
					<div class="well">
					<label>Total de Costos:</label><div id="tot1"></div>
					<br>
					<label>Comisi&oacute;n:</label><div id="tot2"></div>
					<br>
					<label>Costo Aproximado:</label><div id="tot3"></div>
					<br>
					</div>
				</div>	
			</div>
			
		</div>
		
		<hr class="linea" />
        <div class="row" style="margin-bottom: 10px;">
         
            <div class="col-xs-4">
                <input id="btn1" disabled name="btn1" type="button" style="width: 50%;" class="btn btn-success" value="Guardar Cotizaci&oacute;n" />
            </div>
             <div class="col-xs-8" id="mensaje">
               
            </div>
        </div>
    </form>


<script type="text/javascript">
var indices = new Array();
var costos = new Array();

//guardar cotizacion

function obtenerDatos()
{
	$(function () {
        $("#tablaResl tbody tr").each(function (index) 
        {
        	 var campo1, campo2;
            $(this).children("td").each(function (index2) 
            {
                switch (index2) 
                {
                    case 0:  campo1 = $(this).text();
                            break;
                    case 2:  campo2 = $(this).text();
                            break;
                }
                $(this).css("background-color", "#ECF8E0");
            })
          //  alert(campo1 + ' - ' + campo2);
            costos.push(campo1);
            costos.push(campo2);
          
        })
        enviarDatos();
});	
}

function enviarDatos()
{
	//datos necesarios
	var idCliente = <?php echo ($CLIENTE[0]['id']); ?>;
	var idEmpresa = <?php echo ($CLIENTE[1]['id']); ?>;
	var numCot = $('#numcot').val();
	var fechaCot = $('#datepicker').val();
	var idPaisOrigen  = $('#paisO').val();
	var idPaisDestino  = $('#paisD').val();
	var idPuertoOrigen  = $('#puertoO').val();
	var idPuertoDestino  = $('#puertoD').val();
	var tipoContenedor  = $('#tipoCont').val();
	var valorCarga  = $('#valCar').val();
	var pesoCarga  = $('#pesoCar').val();
	var cantiCarga  = $('#cantCar').val();
	var fechaSalida = $('#datepicker2').val();
	var volCarga  = $('#volu').val();
	var comCarga = $('#comCarga').val();
	var comision = parseFloat($("#tot2").text());
	
	if(!comCarga) comCarga = "0";
	if(!volCarga) volCarga = "0";
	if(!comision) comision = 0;
	// enviamos los datos para guardar la coti
	$.ajaxSetup({async: false});
	
		$.post('<?php echo base_url("Cotizaciones/guardarCotiza/"); ?>'+idCliente+"/"+idEmpresa+"/"+fechaCot+"/"+idPaisOrigen+"/"+idPaisDestino+"/"+idPuertoOrigen+"/"+idPuertoDestino+"/"+tipoContenedor+"/"+valorCarga+"/"+pesoCarga+"/"+cantiCarga+"/"+fechaSalida+"/"+volCarga+"/"+comCarga+"/"+comision+"/"+costos,function () {
			})
			  .done(function(retorno) {
				  if($.trim(retorno) == '1') // exito al crear
					{
					  $('#mensaje').html("<h2>Cotizaci&#243;n Guardada con &#201;xito.</h2>")
				        .hide()
				        .fadeIn(1500, function() {
				        	location.reload(true); 					
				        }); 
						
					}
				  if($.trim(retorno) == '0') //falló al intentar eliminar
					{
						alert("Error al Tratar de Guardar Datos.");
					}
			  });
}

$("#btn1").click(function(){
	obtenerDatos();
});











$( document ).ready(function() {
	selectPuertos(2);
	
});
    $(function () {

        $("#datepicker").datepicker();
        $("#datepicker2").datepicker();
        $("#datepicker").datepicker("option", "dateFormat", 'yy-mm-dd');    // Le pasamos el formato de la fecha
        $("#datepicker2").datepicker("option", "dateFormat", 'yy-mm-dd');
        });
    
function selectPuertos(tipo)
{ 
	if(tipo == 1) // proviene de pais de origen, carga mediante ajax los pueros de ese pais
	{
		var idPais = $("#paisO").val();
		$("#puertoO option").remove();
		$.getJSON('<?php echo base_url("Cotizaciones/getPuertos/"); ?>'+idPais,function (datos){
			if(datos == '') // no hay empresas registradas
			{
				$("<option value='0'>No Hay Puertos en este pa&iacute;s</option>").appendTo("#puertoO");
				return;
			}
		    $.each(datos, function(i, puerto){
		    	$("<option value='"+puerto.idpuertos+"'>"+puerto.nombre+"</option>").appendTo("#puertoO");
		    });
		  });
	}
	else
	{
		var idPais = $("#paisD").val();
		$("#puertoD option").remove();
		$.getJSON('<?php echo base_url("Cotizaciones/getPuertos/"); ?>'+idPais,function (datos){
			if(datos == '') // no hay empresas registradas
			{
				$("<option value='0'>No Hay Puertos en este pa&iacute;s</option>").appendTo("#puertoD");
				return;
			}
		    $.each(datos, function(i, puerto){
		    	$("<option value='"+puerto.idpuertos+"'>"+puerto.nombre+"</option>").appendTo("#puertoD");
		    });
		  });
	}
}

function calcularCostos()
{
	
	// validar datos necesarios
	var idPaisOrigen  = $('#paisO').val();
	var idPaisDestino  = $('#paisD').val();
	var idPuertoOrigen  = $('#puertoO').val();
	var idPuertoDestino  = $('#puertoD').val();
	var tipoContenedor  = $('#tipoCont').val();
	var valorCarga  = $('#valCar').val();
	var pesoCarga  = $('#pesoCar').val();
	var cantiCarga  = $('#cantCar').val();
	var servicios = $('#servicios').val();
	var comCarga = $('#comCarga').val();
	
	if(!idPaisOrigen)
	{
		alert("Seleccione pais de origen");
		return;
	}
	if(!idPaisDestino)
	{
		alert("Seleccione pais de destino");
		return;
	}
	if(!idPuertoOrigen)
	{
		alert("Seleccione puerto de origen");
		return;
	}
	if(!idPuertoDestino)
	{
		alert("Seleccione puerto de origen");
		return;
	}
	if(!tipoContenedor)
	{
		alert("Seleccione tipo de contenedor");
		return;
	}
	if(!valorCarga)
	{
		alert("Indique valor de la carga");
		return;
	}
	if(!cantiCarga)
	{
		alert("Indique la cantidad de contenedores");
		return;
	}
	if(!pesoCarga)
	{
		alert("Indique peso de la carga");
		return;
	}
	
	if(servicios.length == 0)
	{
		alert("Seleccione al menos un servicio.");
		return;
	}
	
	// mediante ajax traemos los proveedores disponibles para cada servicio

	
	$("#tablaProvs > tbody").html("");
	$("#tablaProvs2 > tbody").html("");
	$("#tablaProvs3 > tbody").html("");
	$("#tablaProvs4 > tbody").html("");
	$("#tablaProvs5 > tbody").html("");
	$("#tablaResl > tbody").html("");
	$('#t1').show(100);
	$('#t2').show(100);
	$('#t3').show(100);
	$('#t4').show(100);
	$('#t5').show(100);
	$('#t6').show(100);
	$('#t7').show(100);
	$("#tot1").text(0.00);
	$("#tot2").text(0.00);
	$("#tot3").text(0.00);
	$.ajaxSetup({async: false});
	$.getJSON( "<?php echo base_url('Cotizaciones/cargarProveedores/'); ?>"+servicios+"/"+tipoContenedor, function( datos ) {
			$.each(datos, function(i, provs){
				var tablaDatos;
				switch ($.trim(provs.idSer)) {
				case '1':
					tablaDatos = $("#tablaProvs");
					break;
				case '2':	
					tablaDatos = $("#tablaProvs2");				
					break;
				case '3':
					tablaDatos = $("#tablaProvs3");
					break;
				case '4':
					tablaDatos = $("#tablaProvs4");
					break;
				case '5':
					tablaDatos = $("#tablaProvs5");
					break;
				}
				tablaDatos.append("<tr id='"+provs.id+"'><td class='pi'>"+provs.id+"</td><td class='pn'>"+provs.proveedor+"</td><td class='v1'>"+parseFloat(provs.valor1).toFixed(2)+"</td><td class='v2'>"+parseFloat((provs.valor2 /100) * valorCarga).toFixed(2)+"</td><td class='v3'>"+parseFloat(provs.valor4 * cantiCarga).toFixed(2)+"</td><td class='v4'>"+parseFloat(provs.valor3 * pesoCarga).toFixed(2)+"</td><td><input type='radio'  onclick='handleClick("+provs.id+")' name='selec"+provs.idSer+"'></td></tr>");
		    });
			var rowCount1 = $('#tablaProvs tr').length;
			var rowCount2 = $('#tablaProvs2 tr').length;
			var rowCount3 = $('#tablaProvs3 tr').length;
			var rowCount4 = $('#tablaProvs4 tr').length;
			var rowCount5 = $('#tablaProvs5 tr').length;
			if(rowCount1 == 1)
				tablainVisible(1);
			if(rowCount2 == 1)
				tablainVisible(2);
			if(rowCount3 == 1)
				tablainVisible(3);
			if(rowCount4 == 1)
				tablainVisible(4);
			if(rowCount5 == 1)
				tablainVisible(5);
		});
	
	
}

function tablainVisible(idTabla)
{
	switch (idTabla) {
	case 1:
		$('#t1').hide(100);
		break;
	case 2:
		$('#t2').hide(100);
		break;
	case 3:
		$('#t3').hide(100);
		break;
	case 4:
		$('#t4').hide(100);
		break;
	case 5:
		$('#t5').hide(100);
		break;
	}
}
$("#frmNewQut").submit(function(event) {
	
	event.preventDefault();
	calcularCostos();
});

function handleClick(value)
{
	var idProv = parseFloat($("#"+value).find(".pi").html()); 
	var nomProv = $("#"+value).find(".pn").html(); 
	var valorFijo = parseFloat($("#"+value).find(".v1").html()); 
	var xValor = parseFloat($("#"+value).find(".v2").html());
	var xCant = parseFloat($("#"+value).find(".v3").html());
	var xPeso = parseFloat($("#"+value).find(".v4").html());
	
	var costo = -1;
	
	if(valorFijo == 0)
	{
		if(xValor == 0)
		{		
			costo = xPeso > xCant ? xCant : xPeso; 
		}
		else
			costo = xValor;
	}
	else
		costo = valorFijo;
	
	var a = indices.indexOf(idProv);
	if(a > -1)
		return; 
	indices.push(idProv);
	anexarTablaCosto(idProv,nomProv,costo);
}

function anexarTablaCosto(idProv,nomProv,costo)
{
	tablaDatos = $("#tablaResl");
	tablaDatos.append("<tr id='r"+idProv+"'><td class='i'>"+idProv+"</td><td class='n'>"+nomProv+"</td><td class='c'>"+parseFloat(costo).toFixed(2)+"</td><td><button class='btn btn-link' onclick='eliminaCosto("+idProv+")' >X</button></td></tr>");

	 var costoTotal = parseFloat($("#tot1").text());
	 var comision;
	 var total;
	 
	 if(costoTotal)
	 {
		 costoTotal = costo + costoTotal;
		 comision = costoTotal * 0.4;
		 total = costoTotal + comision;
		 enableBoton(total);
		 $("#tot1").text(costoTotal.toFixed(2));
		 $("#tot2").text(comision.toFixed(2));
		 $("#tot3").text(total.toFixed(2));
	 }
		 
	 else
	 {
		 comision = costo * 0.4;
		 total = costo + comision;
		 $("#tot1").text(costo.toFixed(2));
		 $("#tot2").text(comision.toFixed(2));
		 $("#tot3").text(total.toFixed(2));
		 enableBoton(total);
	 }
	// $("#btn1").prop("disabled",false);	 
}
function enableBoton(total)
{
	if(total == 0)
		$("#btn1").prop("disabled",true);
	else
		$("#btn1").prop("disabled",false);
}
function eliminaCosto(idCosto)
{
	var costo = parseFloat($("#r"+idCosto).find(".c").html()); 
	
	var costoTotal = parseFloat($("#tot1").text());
	var comision;
	var total;
	costoTotal = costoTotal - costo;
	comision = costoTotal * 0.4;
	total = costoTotal + comision;
	enableBoton(total);
	$("#tot1").text(costoTotal.toFixed(2));
	$("#tot2").text(comision.toFixed(2));
	$("#tot3").text(total.toFixed(2));
	 
	$('table#tablaResl tr#r'+idCosto).remove();
	var a = indices.indexOf(idCosto);
	if(a > -1)
		indices.splice(a, 1);
	
}
</script>