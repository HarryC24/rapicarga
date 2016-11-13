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
		$this->load->database();
		$this->load->model('Cotizaciones_Model','CM',true);
		$this->load->model('Session_Management','SM',true);
		
	}
	
	public function index()
	{
		$this->SM->Validar_Sesion();
		$permisos['COTIZACIONES']=$this->SM->Validar_Permiso('COTIZACIONES');
		$this->load->view('Cotizaciones_view',$permisos);
	}


	public function lista_cotizacion()
     {
          //load the department_model
          $this->load->model('Cotizaciones_model');  
          //call the model function to get the department data
          //$deptresult = $this->employee_model->get_employee_record_all();           
         // $data['deptlist'] = $deptresult;
          //load the department_view
          $this->load->view('cotizaciones_view');
          //http://localhost/rapicarga/index.php/Cotizaciones/lista_cotizacion
     }
	
	public function loadView($view)
	{
		
		
		if($view == 'NewCotiza')
			$this->load->view('forms/Cotizaciones/formNewCotizaciones');
	
	}
	
        
	
}