<?php
/* 
 * File Name: Cotizaciones.php
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Facturas extends CI_Controller
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
		$this->load->model('Facturas_Model','FM',true);
	}
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['FACTURAS']=$this->SM->Validar_Permiso('FACTURAS');
		$this->load->view('Facturas_view',$permisos);
	}
	public function traerCotizacion($idCot) {
		$data['COTIZACION']=$this->CM->traerCotizacion($idCot);
		$data['COSTOS']=$this->CM->traerCostos($idCot);
		$data['PUERTOS']=$this->CM->traerPuertos($idCot);
		$data['PERMISOS']=$this->SM->Validar_Permiso('FACTURAS');
		$this->load->view("forms/Facturas/formNewFactura",$data);
	}
	
	public function mostrarCotizacion($idCot)
	{
		$permisos['FACTURAS']=$this->SM->Validar_Permiso('FACTURAS');
		$permisos['idCot'] = $idCot;
		$this->load->view('Facturas_view',$permisos);
	}
	public function convertirAFactura($idCot,$totFc)
	{
		$retorno = $this->FM->convertirAFactura($idCot,$totFc);
		echo $retorno;
	}
	public function traerFacturas()
	{
		$data['PERMISOS']=$this->SM->Validar_Permiso('FACTURAS');
		$data['FACTURAS'] = $this->FM->traerFacturas();
		$this->load->view('tables/Facturas/tableListFacturas',$data);
	}
	public function map($idFactura)
	{
		$data['FACTURA'] = $this->FM->traerFactura($idFactura);
		$this->load->view('map',$data);
	}
		
	}