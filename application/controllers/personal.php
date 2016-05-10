<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Personal extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('personal_model');           
        }
        
        public function index()
        {   
            $data['personal'] = $this->personal_model->select();
            $dato= array ( 'titulo'=> 'Personal');
           
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/personal/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'dni'=> $this->input->post('dni'),
                                'nombres'=> $this->input->post('nombres'),
                              'apellidos'=> $this->input->post('apellidos'),
                              'fecha_nac'=> $this->input->post('fecha_nac'),
                              'fecha_reg'=> $this->input->post('fecha_reg'),
                              'cargo'=> $this->input->post('cargo') );

                $this->personal_model->crear($data);                
                
                redirect('personal', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar personal','action'=>  'personal/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/personal/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function editar()
        {
            
            if (@$_POST['guardar'] == 1) {
                $data= array ( 'per_dni' => $this->input->post('dni'),
                                'per_nombres' => $this->input->post('nombres'),
                                'per_apellidos' => $this->input->post('apellidos'),
                                'per_fecha_nac' => $this->input->post('fecha_nac'),
                                'per_fecha_reg' => $this->input->post('fecha_reg')
                                  );

                $this->personal_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("personal");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar personal','action'=>  'personal/editar');
                $idRaza=$this->uri-> segment(3);

                $data['personal']=$this->personal_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['personal']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/personal/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->personal_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("personal");
            
            
        }


    }
 ?>

