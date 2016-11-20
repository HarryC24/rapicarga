<?php
/*
 * File Name: Costumers.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'Captcha.php';
class Rutasmaestras extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('Session_Management','SM',true);
		//$this->load->model('Costumers_Model','CM',true);
		$this->load->model('Rutasmaestras_model','RM',true);
		$this->load->model('Puertos_model','PM',true);
		$this->SM->Validar_Sesion();
	}
	
	
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['Rutasmaestras']=$this->SM->Validar_Permiso('RUTAS');
		$this->load->view('Rutasmaestras_view',$permisos);
	}
	
	public function loadView($view,$data = NULL)
	{
		//
	
	
		if($view == 'NewRutasmaestras'){
			$data['Puertos']=$this->RM->getPuertos();
			$this->load->view('forms/Rutasmaestras/formNewRutasmaestras',$data);}
		
		if($view == 'findRutasmaestras')
			$this->load->view('forms/Rutasmaestras/formFindRutasmaestras');
		if($view == 'editPuertos')
			$this->load->view('forms/Rutasmaestras/formUpdateRutasmaestras',array_merge($data,$imagen));
		if($view == 'tableRutasmaestras')
			$this->load->view('tables/Rutasmaestras/tableDataListRutasmaestras',$data);
	}
	
	
	
	function get_paises(){
		if (isset($_GET['term'])){
			$q = strtolower($_GET['term']);
			$this->PM->get_pais($q);
		}
	}
	
	public function getPaises()
	{
		$retorno = $this->PM->getPaises();
		echo json_encode($retorno);
	}
	
	
	public function createRutasmaestras($puertoorigen,$puertodestino)
	{
		$nombre1 = rawurldecode($puertoorigen);
		//$codpuerto = rawurldecode($codpuerto);
		$nombre2 = rawurldecode($puertodestino);
		//$fecha = rawurldecode($fecha);
		//if($empresa == "") $empresa = 0;
		
		$data = array(
				'puertoorigen' => $nombre1 ,
				'puertodestino' => $nombre2 ,
				'idorigen/destino' => 0,
				'tiempoestimado' => 0,
				'costodelaruta' => 0,
				
		);
		$retorno = $this->RM->createRutasmaestras($data);
		echo $retorno;
	}
	
	public function findRutasmaestras($criteria,$q)
	{
		$data['Rutasmaestras']=$this->RM->findRutasmaestras($criteria,$q);
		$data['PERMISO']=$this->SM->Validar_Permiso('RUTAS');
	
		if($criteria == 'id')
		{
				
			$this->loadView('editRutasmaestras',$data);
		}
			
		else
		{
			$this->loadView('tableRutasmaestras',$data);
		}
			
	}
	
	public function updateRutasmaestras($id,$puertoorigen,$puertodestino)
	{
		// 		$this->SM->Validar_Sesion();
		$puertoorigen = rawurldecode($puertoorigen);
		$puertodestino = rawurldecode($puertodestino);
	
		
			$data = array(
				'nombre' => $puertodestino ,
				'nombre' => $puertodestino ,
				'idorigen/destino' => 0,
				'tiempoestimado' => 0,
				'costodelaruta' => 0,
	
			);
		
		
	
			
	
		$retorno = $this->PM->updateRutasmaestras($id,$data);
		echo $retorno;
	}
	
	
	
	
	
	
	
	
	
	
}






?>