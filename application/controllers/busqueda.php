<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Busqueda extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();   
                
        }
        
        public function index()
        {   
            $data['terminal'] = $this->terminal_model->select();
            $dato= array ( 'titulo'=> 'Terminales');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/terminal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }


    }
 ?>

