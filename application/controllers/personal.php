<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Personal extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('personal_model');           
        }
        
       public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Personal');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/personal/index.php");
            $this->load->view("/layout/foother_table.php");
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array (  'id'=> $this->input->post('id'),
                                'dni'=> $this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'apellidos'=> $this->input->post('apellidos'),
                                'nacimiento'=> $this->input->post('nacimiento'),
                                'registro'=> $this->input->post('registro'),
                                'cargo'=> $this->input->post('cargo'));
                $guardar=$this->terminal_model->editar($data);   

            }else{
                $data= array (  
                                'dni'=> $this->input->post('dni'),
                                'nombre'=> $this->input->post('nombre'),
                                'apellidos'=> $this->input->post('apellidos'),
                                'nacimiento'=> $this->input->post('nacimiento'),
                                'registro'=> $this->input->post('registro'),
                                'cargo'=> $this->input->post('cargo'));
                $guardar=$this->personal_model->crear($data);

            } 
            echo json_encode($guardar);     
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->personal_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='personal')
        {   
            $consulta=$this->personal_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            echo json_encode($result);
        }
    }
 ?>
