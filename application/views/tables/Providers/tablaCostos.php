<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
?>
<!-- tabla de costos  -->
	
						<table class="table table-hover" id="tablaDatosCostos">
						<thead>
						<tr style="background:#AEC9E0;"><th>Id Costo</th>
						<th>Proveedor</th><th>Tipo Costo</th><th>Valor Fijo</th><th>Tipo de Contenedor</th><th>Valor % Carga</th><th>Costo x Peso</th><th>Costo x Cantidad</th>
						</tr>
						</thead>
						<tbody>
						<?php
							
								foreach ($COSTOS as $item)
								{
						
						
									echo("<tr id='$item[id]'><td>$item[id]</td>");
									echo("<td>$item[proveedor]</td>");
									if($item['tipocosto']==1)
										echo("<td>Fijo</td>");
									else 
										echo("<td>Variable</td>");
									echo("<td>&dollar;$item[valor1]</td>");
									echo("<td>$item[tipocarga]</td>");
									echo("<td>$item[valor2]%</td>");
									echo("<td>&dollar;$item[valor3]</td>");
									echo("<td>&dollar;$item[valor4]</td></tr>");
									
								}
								
							?>
						</tbody>		
						</table>