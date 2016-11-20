<?php
//tabla clientes
	foreach ($PERMISOS as $item)
	{
		$create = 	$item['C'];
		$read = 	$item['R'];
		$update = 	$item['U'];
		$delete = 	$item['D'];
		$print = 	$item['I'];
	}
?>
<div class="panel panel-default">
<div class="panel-heading">Lista de Cotizaciones Pendientes</div>
<table class="table table-hover" id="tablaDatos">
<thead>
<tr style="background:#AEC9E0;"><th>Id</th>
<th>Cliente</th><th>C&eacute;dula</th><th>Empresa</th><th>Fecha Cot.</th><th>Valor de Carga</th><th>Acciones</th>
</tr>
</thead>
<tbody>
<?php

		foreach ($COTIZACIONES as $item)
		{
			

			echo("<tr id='$item[id]'><td>$item[id]</td>"); //id en el <tr> para poder eliminarlo mediante ajax
			echo("<td id='$item[id]'>$item[nombre]</td>"); //id en el <td> para poder modificarlo mediante ajax
			echo("<td>$item[cedula]</td>");
			echo("<td>$item[nombrecomercial]</td>");
			echo("<td>$item[fecha]</td>");
			echo("<td>$item[valorRealCarga]</td>");
			if(($read + $create + $update) > 0) //solo si tiene el permiso 
			{
				echo("<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Detalles' onclick='detalles($item[id]);'><i class='glyphicon glyphicon-th-list'></i> Detalles</button>");
					
			}
			else echo("<td>");
			if($update == 1)//solo si tiene el permiso para modifiar
				echo("<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Facturar' onclick='facturar($item[id]);'><i class='glyphicon glyphicon-pushpin'></i> Facturar</button></td></tr>");
			else echo("</td></tr>");
		}
			
	?>
</tbody>		
</table>
</div>
<hr>