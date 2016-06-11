<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Terminal extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('terminal_model');
            $this->load->model('ciudad_model');               
        }
        
       public function index()
        {   
            $dato_header= array ( 'titulo'=> 'Terminales');
            $data['ciudad'] = $this->ciudad_model->select();

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/terminal/index.php",$data);
            $this->load->view("/layout/foother_table.php");

        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array (  'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'direccion'=> $this->input->post('direccion'),
                                'ciudad'=> $this->input->post('ciudad'));
                $guardar=$this->terminal_model->editar($data);   

            }else{
                $data= array (  
                                'descripcion'=> $this->input->post('descripcion'),
                                'direccion'=> $this->input->post('direccion'),
                                'ciudad'=> $this->input->post('ciudad'));
                $guardar=$this->terminal_model->crear($data);

            } 
            echo json_encode($guardar);     
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->terminal_model->eliminar($_POST['id']);
            
            //echo "<pre>";
            //print_r($nuevo);exit();
        }

        public function cargar_datos($tabla='terminal')
        {   
            $consulta=$this->terminal_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            echo json_encode($result);
        }
    }
 ?>
