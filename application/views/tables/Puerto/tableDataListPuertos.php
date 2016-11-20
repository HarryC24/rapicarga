<?php

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
<tr style="background:#AEC9E0;">
	<th>Id</th>
	<th>Nombre del Puerto</th>
	<th>Pais</th>
	<th>Aciones</th>
</tr>
</thead>
<tbody>
<?php

		foreach ($Puertos as $item)
		{
			

			echo("<tr id='$item[idpuertos]'><td>$item[idpuertos]</td>"); //id en el <tr> para poder eliminarlo mediante ajax
			echo("<td id='$item[idpuertos]'>$item[nombre]</td>"); //id en el <td> para poder modificarlo mediante ajax
			echo("<td>$item[pais]</td>");
			if($update == 1) //solo si tiene el permiso para modificar se muestran las opciones
			{
				echo("<td><button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='top' title='Editar' onclick='editarPuerto($item[idpuertos]);'><i class='glyphicon glyphicon-pencil'></i> Modificar</button>");
				
					
			}
			else echo("<td>");
			if($delete == 1)//solo si tiene el permiso para borrar se muestra la opción
				echo("<button type='button' class='btn btn-link' data-toggle='tooltip' data-placement='bottom' title='Eliminar' onclick='eliminarPuerto($item[idpuertos]);'><i class='glyphicon glyphicon-remove-circle'></i> Eliminar</button></td></tr>");
			else echo("</td></tr>");
		}
			
	?>
</tbody>		
</table>
<hr>