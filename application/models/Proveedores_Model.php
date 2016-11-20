<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function getServicios()
	{
	
		$this->db->select('id');
		$this->db->select('servicio');
		$this->db->from('servicios');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->id);
			array_push($loc_name, $result[$i]->servicio);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
	function getTipoCarga()
	{
	
		$this->db->select('id');
		$this->db->select('tipocarga');
		$this->db->from('tipocontenedor');
		$query = $this->db->get();
		$result = $query->result();
	
		$loc_id = array();
		$loc_name = array();
	
		for ($i = 0; $i < count($result); $i++)
		{
			array_push($loc_id, $result[$i]->id);
			array_push($loc_name, $result[$i]->tipocarga);
		}
		return $result = array_combine($loc_id, $loc_name);
	}
	
	function createProvider($data)
	{
		$this->db->insert('proveedores', $data);
		$num_inserts = $this->db->affected_rows();
		return $num_inserts;
	}
	
	function getProvs($servicios,$tipoCont)
	{

		$this->db->select('p.id,p.proveedor, s.id as idSer, ct.valor1,	ct.valor2,	ct.valor3,	ct.valor4');
		$this->db->from('proveedores p');
		$this->db->where('p.idserxpro IN ('.$servicios.')');
		$this->db->join('servicios s','s.id = p.idserxpro');
		$this->db->join('costoxtipocarga ct','ct.idproveedor = p.id');
		$this->db->where('ct.tipocont = '.$tipoCont);
		$query = $this->db->get();
		$data = $query->result();
		return $data;
	}
	
	function getProviders($idProv = 0)
	{
		try {

			if($idProv <> 0)
			{
				$this->db->select('*');
				$this->db->from('proveedores');
				$this->db->where('id',$idProv);
				$query = $this->db->get();
				$data = $query->row();
				return $data;
			}
			else
			{
				$this->db->select('proveedores.id,proveedores.proveedor,proveedores.idserxpro,servicios.servicio');
				$this->db->from('proveedores');
				$this->db->join('servicios','proveedores.idserxpro = servicios.id');
				$query = $this->db->get();
				$data = $query->result_array();
				return $data;
			}
			
		} catch (Exception $e) {
		}
	}
	
	function getCostos($id)
	{
		try {
	
			$this->db->select('*');
			$this->db->from('costoxtipocarga');
			$this->db->where('idproveedor',$id);
			$this->db->join('proveedores','proveedores.id = costoxtipocarga.idproveedor');
			$this->db->join('tipocontenedor','tipocontenedor.id = costoxtipocarga.tipocont');
			$query = $this->db->get();
			$data = $query->result_array();
			return $data;
		} catch (Exception $e) {
		}
	}
	
	function createCosto($param,$id) {
		$this->db->insert('costoxtipocarga', $param);
		$num_inserts = $this->db->affected_rows();
		if($num_inserts > 0)
		{
			$this->db->select('proveedor');
			$this->db->from('proveedores');
			$this->db->where('id',$id);
			$query = $this->db->get();
			$data = $query->row();
			return $data;
		}
		else
		{
			$data = array(
					'proveedor' => $num_inserts
			);
			return $data;
		}
		
	}
	
	function updateProvider($data,$idProv) {
		$this->db->where('id', $idProv);
    	$this->db->update('proveedores', $data);
    	$num_inserts = $this->db->affected_rows();
    	return $num_inserts;
	}
	function deleteProvider($data)
	        {
		            $this->db->delete('proveedores',$data);
		            $num_inserts = $this->db->affected_rows();
		            return $num_inserts;
		        }
}
?>