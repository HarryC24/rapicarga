<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas_Model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	
	function convertirAFactura($idCot,$totFc)
	{
		$data = array(
				'codigocotizacion' => '2',
				'hora' => $totFc
		);
		$this->db->where('id', $idCot);
		$this->db->update('cotizaciones', $data);
		$num_inserts = $this->db->affected_rows();
		return $num_inserts;
	}
	
	function traerFacturas()
	{
		$this->db->select('*');
		$this->db->from('facturas_p'); // vista
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
	function traerFactura($idFac)
	{
		$this->db->select('*');
		$this->db->from('facturas_p'); // vista
		$this->db->where('id', $idFac);
		$query = $this->db->get();
		$data = $query->result_array();
		return $data;
	}
}
?>
