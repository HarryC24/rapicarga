<?php
/*
 * File Name: Costumers.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'Captcha.php';
class Puertos extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('Session_Management','SM',true);
		//$this->load->model('Costumers_Model','CM',true);
		$this->load->model('Puertos_model','PM',true);
		$this->SM->Validar_Sesion();
	}
	
	
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['Puertos']=$this->SM->Validar_Permiso('Puertos');
		$this->load->view('Puertos_view',$permisos);
	}
	
	public function loadView($view,$data = NULL)
	{
		//
	
	
		if($view == 'NewPuerto'){
			$data['PAISES']=$this->PM->getPaises();
			$this->load->view('forms/Puerto/formNewPuertos',$data);}
		
		if($view == 'findPuertos')
			$this->load->view('forms/Puerto/formFindPuertos');
		if($view == 'editPuertos')
			$this->load->view('forms/Puerto/formUpdatePuertos',array_merge($data,$imagen));
		if($view == 'tablePuertos')
			$this->load->view('tables/Puerto/tableDataListPuertos',$data);
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
	
	
	public function createPuertos($nombre,$codpais)
	{
		$nombre = rawurldecode($nombre);
		//$codpuerto = rawurldecode($codpuerto);
		$codpais = rawurldecode($codpais);
		//$fecha = rawurldecode($fecha);
		//if($empresa == "") $empresa = 0;
		
		$data = array(
				'nombre' => $nombre ,
				'codpuerto' => 0,
				'codpais' => $codpais,
		);
		$retorno = $this->PM->createPuertos($data);
		echo $retorno;
	}
	
	public function findPuertos($criteria,$q)
	{
		$data['Puertos']=$this->PM->findPuertos($criteria,$q);
		$data['PERMISO']=$this->SM->Validar_Permiso('Puertos');
	
		if($criteria == 'id')
		{
				
			$this->loadView('editPuertos',$data);
		}
			
		else
		{
			$this->loadView('tablePuertos',$data);
		}
			
	}
	
	public function updatePuertos($id,$nombre,$codpais)
	{
		// 		$this->SM->Validar_Sesion();
		$nombre = rawurldecode($nombre);
		$codpais = rawurldecode($codpais);
	
		
			$data = array(
					'nombre' => $nombre ,
					'codpuerto' => 0,
					'codpais' => $codpais,
	
			);
		
		
	
			
	
		$retorno = $this->PM->updatePuertos($id,$data);
		echo $retorno;
	}
	
	
	
	
	
	
	
	
	
	
}






?>