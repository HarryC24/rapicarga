<?php
/* 
 * File Name: Proveedores.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedores extends CI_Controller
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('Proveedores_Model','PM',true);
		$this->load->model('Session_Management','SM',true);
		
	}
	

	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['PROVEEDORES']=$this->SM->Validar_Permiso('PROVEEDORES');
		$this->load->view('Proveedores_view',$permisos);
	}
	/*
	 * Para cargar formularios o tablas mediante ajax
	 */
	public function loadView($view,$data = NULL)
	{
		if($view == 'newProvider'){
			$data['SERVICIOS'] = $this->PM->getServicios();
			$this->load->view('forms/Provider/formNewProvider',$data);
		}
		
		if($view == 'tableProvider'){
			
			$data['PERMISO']=$this->SM->Validar_Permiso('PROVEEDORES');
			$data['TIPOCARGA'] = $this->PM->getTipoCarga();
			$data['PROVEEDORES'] = $this->PM->getProviders();
			$this->load->view('tables/Providers/tableDataListProviders',$data);
		}
		
			
	}
	public function getProvider($idProv)
	{
		$data['PROVEEDOR'] = $this->PM->getProviders($idProv);
		$data['SERVICIOS'] = $this->PM->getServicios();
		$this->load->view('forms/Provider/formUpdateProvider',$data);

	}
	public function createProvider($nombre,$servicio)
	{
		$nombre = rawurldecode($nombre);
		$data = array(
				'proveedor' => $nombre ,
				'idrutas' => '0' ,
				'idserxpro' => $servicio
		);
		$retorno = $this->PM->createProvider($data);
		echo $retorno;
	}
	
	public function getCostos($idProv)
	{
		$data['COSTOS'] = $this->PM->getCostos($idProv);
		$this->load->view('tables/Providers/tablaCostos',$data);
	}
	
	function createCosto($idProv,$idTipoCosto,$valor1,$idTipoCont,$valor2,$valor3,$valor4) {
		$data = array(
				'idproveedor' => $idProv ,
				'tipocosto' => $idTipoCosto ,
				'valor1' => $valor1,
				'tipocont' => $idTipoCont,
				'valor2' => $valor2 ,
				'valor3' => $valor3,
				'valor4' => $valor4 ,
		);
		$retorno = $this->PM->createCosto($data,$idProv);
		echo $retorno->proveedor;
		
	}
	
	public function updateProvider($idProv,$nomProv,$idServicio) {
		$nombre = rawurldecode($nomProv);
		$data = array(
				'proveedor' => $nombre ,
				'idserxpro' => $idServicio 
		);
		$retorno = $this->PM->updateProvider($data,$idProv);
		echo $retorno;
	}
	public function deleteProvider($idProv) {
		
				// TODO: eliminar costos asociados a este id de proveedor
				try {
						$data = array(
										'id' => $idProv
								);
						$retorno = $this->PM->deleteProvider($data);
						echo $retorno;
			
					} catch (Exception $e) {
							echo 0;
						}
	}
}