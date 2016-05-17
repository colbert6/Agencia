<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Ciudad extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('ciudad_model');           
        }
        
       public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Ciudades');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/ciudad/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'codigo_postal'=> $this->input->post('codigo_postal'),
                                'nombre'=> $this->input->post('nombre'));
                $guardar=$this->ciudad_model->editar($data);   

            }else{
                $data= array ( 'codigo_postal'=> $this->input->post('codigo_postal'),
                                'nombre'=> $this->input->post('nombre') );
                $guardar=$this->ciudad_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->ciudad_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='ciudad')
        {   
            $consulta=$this->ciudad_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            echo json_encode($result);
        }
    }
 ?>
