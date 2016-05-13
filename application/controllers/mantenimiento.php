<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//este controlador lo usare para todas las tablas que no cuenten con alguna dependencia
    class Mantenimiento extends CI_Controller 
    {   
        
        function __construct(){
            parent::__construct();   
            $this->load->model('mi_model');    
        }
        

        public function Ver()
        {   
            $tabla=$this->uri-> segment(3);
            $datos_1['titulo']=strtoupper($tabla)."S";
            $datos_2['consulta']= $this->mi_model->select($tabla);

            $this->load->view("/layout/header.php",$datos_1);
            $this->load->view("/mantenimiento/index.php",$datos_2);
            $this->load->view("/layout/foother_table.php");


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

