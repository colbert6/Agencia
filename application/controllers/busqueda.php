<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Busqueda extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();   
            $this->load->model('busqueda_model');    
        }
        
        public function index()
        {   
            $data['busqueda'] = $this->busqueda_model->select();
            $dato= array ( 'titulo'=> 'Busqueda');
            //echo "<pre>";print_r($data['busqueda']);exit;
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/busqueda/index.php",$data);
            $this->load->view("/busqueda/foother_table.php");
        }

        public function ajax()
        {   
            $data['busqueda'] = $this->busqueda_model->select();
            $dato= array ( 'titulo'=> 'Busqueda');
            //echo "<pre>";print_r($data['busqueda']);exit;
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/busqueda/ajax.php",$data);
            $this->load->view("/busqueda/foother_table.php");
        }


    }
 ?>

