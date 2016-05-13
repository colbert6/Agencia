<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    class Pasaje extends CI_Controller
    {   
        
        function __construct(){
            parent::__construct();
            $this->load->model('viaje_model');           
        }
        
        public function index()
        {   
            $data['viaje'] = $this->viaje_model->select();
            $dato= array ( 'titulo'=> 'viaje');
            $this->load->view("/layout/header.php",$dato);
            $this->load->view("/pasaje/index.php",$data);
            $this->load->view("/layout/foother_table.php");
        }

        public function nuevo()
        {            
            if (@$_POST['guardar'] == 1) {
                $data= array ('empresa'=> $this->input->post('empresa'),
                              'codigo'=> $this->input->post('codigo'),
                              'nombre'=> $this->input->post('nombre'));
                $this->viaje_model->crear($data);                
                redirect('viaje', 'refresh');
                
            }else{
                $dato= array ( 'titulo'=> 'Registrar viaje','action'=>  'viaje/nuevo' );

                $this->load->view("/layout/header.php",$dato);
                $this->load->view("/viaje/form.php");
                $this->load->view("/layout/foother.php");

            }
            
        }




    }
 ?>

