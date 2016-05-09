<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Terminal extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('terminal_model');           
        }
        
        public function index()
        {   
            $data['terminal'] = $this->terminal_model->select();
            $dato= array ( 'titulo'=> 'Terminales');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/terminal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'descripcion'=> $this->input->post('descripcion'),
                              'abreviacion'=> $this->input->post('abreviacion')  );

                $this->razas_model->crear($data);                
                
                redirect('terminal', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar Raza','action'=>  'razas/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/razas/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'id'=> $this->input->post('id'),
                                'descripcion'=> $this->input->post('descripcion'),
                                'abreviacion'=> $this->input->post('abreviacion')  );

                $this->razas_model->editar($data);
                $this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("razas");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar Raza','action'=>  'razas/editar');
                $idRaza=$this->uri-> segment(3);

                $data['razas']=$this->razas_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['razas']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/razas/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->razas_model->eliminar($id);
            $this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("razas");
            
            
        }


    }
 ?>

