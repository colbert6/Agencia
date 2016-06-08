<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Vehiculo extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('vehiculo_model');           
        }
        
       public function index()
        {   

            //echo "<pre>";print_r($this->vehiculo_model->select()->result());exit();
            $dato_header= array ( 'titulo'=> 'Vehiculos');

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/vehiculo/index.php");
            $this->load->view("/layout/foother_table.php");

        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'tipo'=> $this->input->post('tipo'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'fecha_compra'=> $this->input->post('fecha_compra'),
                                'num_asientos'=> $this->input->post('capacidad'),
                                'matricula'=> $this->input->post('matricula'));
                $guardar=$this->vehiculo_model->editar($data);   

            }else{
                $data= array (  'tipo'=> $this->input->post('tipo'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'fecha_compra'=> $this->input->post('fecha_compra'),
                                'num_asientos'=> $this->input->post('capacidad'),
                                'matricula'=> $this->input->post('matricula'));
                $guardar=$this->vehiculo_model->crear($data);
                
            } 
            echo json_encode($guardar);     
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->vehiculo_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='vehiculo')
        {   
            $consulta=$this->vehiculo_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            echo json_encode($result);
        }
    }
 ?>
