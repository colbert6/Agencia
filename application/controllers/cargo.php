<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Cargo extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('cargo_model');           
        }
        
        public function index()
        {   
            $data['cargo'] = $this->cargo_model->select();
            $dato= array ( 'titulo'=> 'Cargo');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/cargo/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion') );

                $this->cargo_model->crear($data);                
                
                redirect('cargo', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar cargo','action'=>  'cargo/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/cargo/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion')
                                  );

                $this->cargo_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("cargo");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar cargo','action'=>  'cargo/editar');
                $idRaza=$this->uri-> segment(3);

                $data['cargo']=$this->cargo_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['cargo']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/cargo/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->cargo_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("cargo");
            
            
        }


    }
 ?>

