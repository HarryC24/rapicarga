<?php
class Rutasmaestras_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	
	
	//trae un arreglo de los paises

		
	
	function createRutasmaestras($data)
	{
		$this->db->insert('rutas-maestras', $data);
		$num_inserts = $this->db->affected_rows();
		$lastid = 0;
		if($num_inserts > 0)
		{
			$lastid = $this->db->insert_id();
		}
		else
		{
			$lastid = 0;
		}
		return $lastid;
	}
	
	function findRutasmaestras($criteria,$q)
	{
		try {
			if($criteria == 1) // q nombre de puerto
			{
				 
				
				$this->db->from('rutas-maestras');
				
				$this->db->join('puertos','rutas-maestras.puertoorigen = puertos.idpuertos');	
				$this->db->join('puertos','rutas-maestras.puertodestino = puertos.idpuertos');	
				
				
				//$this->db->join('servicios','proveedores.idserxpro = servicios.id');	
				$query = $this->db->get();
				$data = $query->result_array();
				return $data;
			}
			else if($criteria == 'id') // id
			{
				$query = $this->db->get_where('origen-destino', array('id' => $q));
				$data = $query->row();
				return $data;
			}
			else // 10 últimos
			{
				 
				$this->db->select('rm.*, po.nombre,pd.nombre ');
				$this->db->from('rutas-maestras as rm');
				$this->db->join('(select idpuertos,nombre from puertos) po',' rm.`puertoorigen` = po.`idpuertos` ');	
				$this->db->join('(select idpuertos,nombre from puertos) pd',' rm.`puertodestino` = pd.`idpuertos` ');	
					
				//$this->db->where('tipoUser','1000');
				$this->db->limit(10);
				$this->db->order_by('rm.id', 'DESC');
				$query = $this->db->get();
				$data = $query->result_array();
				return $data;
				
			}
		} catch (Exception $e) {
			return -1;
		}
	}
	
	
	
	function getPaises()
	{
	
		$this->db->select('id');
		$this->db->select('pais');
		$this->db->from('paises');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->id);
			array_push($loc_name, $result[$i]->pais);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
///------------------------------------------------------------------------------------------------------------------	
	function getPuertos()
	{
	
		$this->db->select('idpuertos');
		$this->db->select('nombre');
		$this->db->from('puertos');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->idpuertos);
			array_push($loc_name, $result[$i]->nombre);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}
?>