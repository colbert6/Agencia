<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Ciudad extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('ciudad_model');           
        }
        
        public function index()
        {   
            $data['ciudad'] = $this->ciudad_model->select();
            $dato= array ( 'titulo'=> 'ciudad');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/ciudad/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ('empresa'=> $this->input->post('empresa'),
                              'codigo'=> $this->input->post('codigo'),
                              'nombre'=> $this->input->post('nombre'));
                $this->ciudad_model->crear($data);                
                redirect('ciudad', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar ciudad','action'=>  'ciudad/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/ciudad/form.php");
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

                $this->ciudad_model->editar($data);
                //$this->auditoria('modificar',$this->tabla,'', $data['id']);//auditoria
                $this->redireccionar("ciudad");
                
            }else{
                $dato= array ( 'titulo'=> 'Editar ciudad','action'=>  'ciudad/editar');
                $idRaza=$this->uri-> segment(3);

                $data['ciudad']=$this->ciudad_model->selectId( $idRaza);

                //echo "<pre>";print_r($data['ciudad']->result());exit();
                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/ciudad/form.php",$data);
                $this->load->view("/layout/foother.php");

            }
            
        }

        public function eliminar()
        {
            $id=$this->uri-> segment(3);
            $this->ciudad_model->eliminar($id);
            //$this->auditoria('eliminar',$this->tabla,'', $id);//auditoria
            $this->redireccionar("ciudad");
            
            
        }


    }
 ?>

