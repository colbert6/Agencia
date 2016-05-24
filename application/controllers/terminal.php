<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Terminal extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('terminal_model');           
        }
        
       public function index()
        {   
<<<<<<< HEAD
            $dato_header= array ( 'titulo'=> 'Terminales');
=======
            $dato_header= array ( 'titulo'=> 'Terminal');
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a

            $this->load->view("/layout/header.php",$dato_header);
            $this->load->view("/terminal/index.php");
            $this->load->view("/layout/foother_table.php");
<<<<<<< HEAD
        }

        public function guardar()
        {   
            if(!empty($_POST['id'])) {
                $data= array ( 'id'=> $this->input->post('id'),
                               'descripcion'=> $this->input->post('descripcion'),
                              'direccion'=> $this->input->post('direccion'),
                              'ciudad'=> $this->input->post('ciudad'));
                $guardar=$this->terminal_model->editar($data);   

            }else{
                $data= array ( 'empresa'=> $this->input->post('empresa'),
                               'descripcion'=> $this->input->post('descripcion'),
                              'direccion'=> $this->input->post('direccion'),
                              'ciudad'=> $this->input->post('ciudad') );
                $guardar=$this->terminal_model->crear($data);
                
            } 
            echo json_encode($guardar);            
            
        }
     
        public function eliminar()
        {            
            $guardar=$this->terminal_model->eliminar($_POST['id']);
            echo json_encode($guardar);            
            
        }

        public function cargar_datos($tabla='terminal')
        {   
            $consulta=$this->terminal_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
=======
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
            echo json_encode($guardar);            
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
            
            //echo "<pre>";
            //print_r($nuevo);exit();
            echo json_encode($result);
        }

<<<<<<< HEAD


=======
        public function cargar_datos($tabla='terminal')
        {   
            $consulta=$this->terminal_model->select($tabla);
            $result= array("draw"=>1,
                "recordsTotal"=>$consulta->num_rows(),
                 "recordsFiltered"=>$consulta->num_rows(),
                 "data"=>$consulta->result());
            echo json_encode($result);
        }
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
    }
 ?>
