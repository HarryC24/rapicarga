<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pais extends CI_Controller 
{
	function __construct() 
	{
		parent::__construct();
		$this->load->model('Pais_Model','PM',true);
	}
	
	function index()
	{
		$pages=10; //N�mero de registros mostrados por p�ginas
		$this->load->library('pagination'); //Cargamos la librer�a de paginaci�n
		$config['base_url'] = base_url().'pais/pagina/'; // parametro base de la aplicaci�n, si tenemos un .htaccess nos evitamos el index.php
		$config['total_rows'] = $this->PM->filas();//calcula el n�mero de filas  
		$config['per_page'] = $pages; //N�mero de registros mostrados por p�ginas
        $config['num_links'] = 10; //N�mero de links mostrados en la paginaci�n
 		$config['first_link'] = 'Primera';//primer link
		$config['last_link'] = '&Uacute;ltima';//�ltimo link
        $config["uri_segment"] = 3;//el segmento de la paginaci�n
		$config['next_link'] = 'Siguiente';//siguiente link
		$config['prev_link'] = 'Anterior';//anterior link
		$this->pagination->initialize($config); //inicializamos la paginaci�n		
		$data["paises"] = $this->PM->total_paginados($config['per_page'],$this->uri->segment(3));			
             
		$this->load->view('Paises_view', $data);
	}
}
