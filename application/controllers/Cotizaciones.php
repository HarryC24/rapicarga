<?php
/* 
 * File Name: Cotizaciones.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cotizaciones extends CI_Controller
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('date');
		$this->load->database();
		$this->load->model('Cotizaciones_Model','CM',true);
		$this->load->model('Proveedores_Model','PM',true);
		$this->load->model('Session_Management','SM',true);
		$this->load->model('Usuarios_Model','UM',true);
	}
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['COTIZACIONES']=$this->SM->Validar_Permiso('COTIZACIONES');
		$this->load->view('Cotizaciones_view',$permisos);
	}


	
	public function loadView($view,$data=NULL)
	{	
		if($view == 'NewCotiza')
		{
			$data['PAISES'] = $this->CM->getPaises(); // para el combobox de paises
			$data['TIPOCARGA'] = $this->PM->getTipoCarga();
			$data['SERVICIOS'] = $this->PM->getServicios();
			
			// TODO: traer el ultimo id y sumarle uno
			$this->load->view('forms/Cotizaciones/formNewCotizaciones',$data);
		}
			
	
	}
	
	public function getPuertos($idPais)
	{
		$retorno = $this->CM->getPuertos($idPais);
		echo json_encode($retorno);	
	}
	
	public function crearCotizacion($cedula)
	{
			$data['CLIENTE']=$this->UM->findDatosCliente($cedula);
			$this->loadView("NewCotiza",$data);
	}
	
	public function cargarProveedores($servicios,$tipoCont)
	{
		
		$data = $this->PM->getProvs($servicios,$tipoCont);
		echo json_encode($data);
	}
    
	public function guardarCotiza($idCliente,$idEmpresa,$fechaCot,$idPaisOrigen,$idPaisDestino,$idPuertoOrigen,$idPuertoDestino,$tipoContenedor,$valorCarga,$pesoCarga,$cantiCarga,$fechaSalida,$volCarga,$comCarga,$comision,$costos)
	{
		
		$comCargas = rawurldecode($comCarga);
			
		$data = array(
				'idempresa' => $idEmpresa ,
				'idcliente' => $idCliente ,
				'idcorresponsal' => $_SESSION['iduser'],
				'codigocotizacion' => "1",
				'fecha' => $fechaCot,
				'idpaisorigen' => $idPaisOrigen,
				'idpaisdestino' => $idPaisDestino,
				'idtipocarga' => $tipoContenedor,
				'peso' => $pesoCarga,
				'dimensiones' => $volCarga,
				'tarifarapicarga' => $comision,
				'valorRealCarga' => $valorCarga,
				'idpuertoO' => $idPuertoOrigen,
				'idpuertoD' => $idPuertoDestino,
				'cantidad' => $cantiCarga,
				'fechasalida' => $fechaSalida,
				'comcarga' => $comCargas
		);
		$retorno = $this->CM->createCotiza($data,$costos);
		echo $retorno;
	}
	public function mostrarLista()
	{
		$data['PERMISOS']=$this->SM->Validar_Permiso('COTIZACIONES');
		$data['COTIZACIONES'] = $this->CM->getCotizaciones();
		$this->load->view('tables/Cotizaciones/tableListCotizaciones',$data);
	}
}