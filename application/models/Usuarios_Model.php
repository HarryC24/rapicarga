<?php

/*
 * File Name: Usuarios_Model.php
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios_Model extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function validar_Usuario($email, $pass) {
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $this->db->from('user');
        $query = $this->db->get();
        $data = $query->result_array();

        $retorno = 0;
        foreach ($data as $item) {

            $_SESSION['iduser'] = $item['id'];
            $_SESSION['user'] = $item['email'];
            $_SESSION['nombre'] = $item['nombre'];
            $_SESSION['apellido'] = $item['apellido'];
            $_SESSION['tipoUser'] = $item['tipoUser'];
            $_SESSION['valid'] = true;
            if ($item['tipoUser'] == '2000')
                $retorno = 2; // si es usuario del sistema
            if ($item['tipoUser'] == '1000')
                $retorno = 1; // si es cliente
            if ($item['tipoUser'] == '3000')
                $retorno = 3; // administrador 
        }
        return $retorno;
    }

    function createUser($data) {
        $this->db->insert('user', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    function updateUser($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    function updatePermission($id, $data) {
        $this->db->where('idpermisos', $id);
        $this->db->update('permisos', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    function deleteUser($data) {
        $this->db->delete('user', $data);
        $num_inserts = $this->db->affected_rows();
        return $num_inserts;
    }

    function findCed($cedula) {
        $query = $this->db->where('user', array('cedula' => $cedula));
        $data = $query->row();
        echo $data;
        return $data;
    }
    
    function findEmpresa($cedula) {
        //extrae de la tabla user los datos del cliente
        $query = $this->db->where('user', array('cedula' => $cedula));
        $data = $query->row();
        
         //realiza un join entre la tabla user y userempresa con id del cliente para obtener
        // el idempresa  
        $this->db->where('id', $data);
        $this->db->from('user');
        $this->db->join('userempresa', 'userempresa.iduser = user.id');
        $query = $this->db->get();
        $userempresa = $query->result_array();
        
        //realiza un join entre la tabla user y empresa con el iduser  para obtener
        // los datos de la empresa : nombre legal y comercial de la empresa
        $this->db->where('id', $userempresa);
        $this->db->from('userempresa');
        $this->db->join('empresa', 'empresa.id = userempresa.id');
        $query = $this->db->get();
        $userempresa = $query->result_array();
        return $data;
    }

    /*
     * Busca los usuarios seg�n criterio (id,cedula,nombre,email)
     *  q = texto de busqueda o id
     */

    function findUser($criteria, $q) {
        try {
            if ($criteria == 1) { //cedula,nombre,email

                $this->db->where('cedula', $q);
                $this->db->where('cedula <>', 'Admin');
                $this->db->or_where('apellido', $q);
                $this->db->where('apellido <>', 'Admin');
                $this->db->or_where('email', $q);
                $this->db->where('email <>', 'Admin');
                if ($_SESSION['tipoUser'] == 3000) {
                    $this->db->where('tipoUser', '3000');
                    $this->db->or_where('tipoUser', '2000');
                } else
                    $this->db->where('tipoUser <>', '3000');
                $this->db->from('user');
                $query = $this->db->get();
                $data = $query->result_array();
                return $data;
            }
            else if ($criteria == 'id') { // id
                $query = $this->db->get_where('user', array('id' => $q));
                $data = $query->row();
                return $data;
            } else { // 10 �ltimos

                $this->db->select('*');
                $this->db->from('user');
                if ($_SESSION['tipoUser'] == 3000) {
                    $this->db->where('tipoUser', '3000');
                    $this->db->or_where('tipoUser', '2000');
                } else
                    $this->db->where('tipoUser', '2000');
                $this->db->limit(10);
                $this->db->order_by('id', 'DESC');
                $query = $this->db->get();
                $data = $query->result_array();
                return $data;
            }
        } catch (Exception $e) {
            return -1;
        }
    }

    /*
     * selecciona los permisos de un usuario
     */

    function getPermission($idUsuario) {
        $this->db->where('usuario', $idUsuario);
        $this->db->from('permisos');
        $this->db->join('modulos', 'permisos.modulo = modulos.idmodulos');
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    /*
     * crea  permiso de usuario y devuelve el id del permiso
     */

    function createPermission($data) {

        try {
            $this->db->insert('permisos', $data);
            $num_inserts = $this->db->affected_rows();
            $lastid = 0;
            if ($num_inserts > 0) {
                $lastid = $this->db->insert_id();
            } else {
                $lastid = 0;
            }
            return $lastid;
        } catch (Exception $e) {
            return -1;
        }
    }

    /*
     * devuelve los m�dulos que no han sido asigados al usuario
     * para crear un listbox
     */

    function getModulosDisponibles($idUsuario) {

        $this->db->select('modulo');
        $this->db->where('usuario', $idUsuario);
        $this->db->from('permisos');
        $where_clause = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from('modulos');
        $this->db->where("`idmodulos` NOT IN ($where_clause)", NULL, FALSE);
        $query = $this->db->get();
        $data = $query->result_array();
        return $data;
    }

    /*
      function get_employee_record_all()
      {
      //$this->db->where('employee_no', $empno);
      $this->db->from('tbl_employee');
      $this->db->join('tbl_department','tbl_department.department_id = tbl_employee.department_id');
      $this->db->join('tbl_designation','tbl_designation.designation_id = tbl_employee.designation_id');
      $query = $this->db->get();
      return $query->result();
      }
      //get department table to populate the department name dropdown
      function get_department()
      {
      $this->db->select('department_id');
      $this->db->select('department_name');
      $this->db->from('tbl_department');
      $query = $this->db->get();
      $result = $query->result();

      //array to store department id & department name
      $dept_id = array('-SELECT-');
      $dept_name = array('-SELECT-');

      for ($i = 0; $i < count($result); $i++)
      {
      array_push($dept_id, $result[$i]->department_id);
      array_push($dept_name, $result[$i]->department_name);
      }
      return $department_result = array_combine($dept_id, $dept_name);
      }

      //get designation table to populate the designation dropdown
      function get_designation()
      {
      $this->db->select('designation_id');
      $this->db->select('designation_name');
      $this->db->from('tbl_designation');
      $query = $this->db->get();
      $result = $query->result();

      $designation_id = array('-SELECT-');
      $designation_name = array('-SELECT-');

      for ($i = 0; $i < count($result); $i++)
      {
      array_push($designation_id, $result[$i]->designation_id);
      array_push($designation_name, $result[$i]->designation_name);
      }
      return $designation_result = array_combine($designation_id, $designation_name);
      } */
}

?>