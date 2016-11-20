<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizaciones_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	//devuelve los paises para el combobox de pais origen y destino
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
	
	// devuelve los puertos de X pais
	function getPuertos($idPais) {
	
		$this->db->select('idpuertos,nombre');
		$this->db->where('codpais', $idPais);
		$this->db->from('puertos');
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	
	function createCotiza($data,$costos)
	{
		$this->db->insert('cotizaciones', $data);
		$num_inserts = $this->db->affected_rows();
		$lastid = 0;
		if ($num_inserts > 0) {
			$lastid = $this->db->insert_id();
		} else {
			$lastid = 0;
		}
		$array = explode(",", $costos);
		$longitud = count($array);
		for($i=0; $i<$longitud; $i += 2)
		{
			$data = array(
					'idcotizacion' => $lastid ,
					'idproveedor' => $array[$i],
					'costo'  => $array[$i + 1]
			);
			$this->db->insert('serviciosxcot', $data);
		}
		
		return 1;
	}
	function getCotizaciones()
	{
		$this->db->select('*');
		$this->db->from('cotizaciones_p'); // vista 
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	
	function traerCotizacion($idCot)
	{
		$this->db->select('*');
		$this->db->from('Cotizaciones_view'); // vista
		$this->db->where('Identificador', $idCot);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	function traerCostos($idCot)
	{
		$this->db->select('*');
		$this->db->from('Servicios_view'); // vista
		$this->db->where('Identificador', $idCot);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	
	function traerPuertos($idCot)
	{
		$this->db->select('*');
		$this->db->from('Paises_Puertos_view'); // vista
		$this->db->where('Identificador', $idCot);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
}
?>