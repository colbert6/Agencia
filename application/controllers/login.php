<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    /**
    * 
    */
    class Login extends CI_Controller
    {   
        function __construct(){
            parent::__construct();
        }

        public function index()
        {         
            if(!isset($_POST['user'])){ //primera vez en el login                
                $this->load->view("/login/index.php");            
            }else{
                
                $this->load->model('usuario_model');
                $data= array('user' =>  $_POST['user'],'password'=>$_POST['password'],'base' =>  $_POST['base']);
                $user=$this->usuario_model->ValidarUsuario($data);
                if(!empty($user)){
                    $data= array(
                        'user' => $_POST['user'],
                        'id' => $user->usu_id, 
                        'login'=>true,
                        'base'=>$_POST['base'],
                        'empresa'=>strtoupper(str_replace("_"," ",$_POST['base'])),
                        'logo'=>"logo_".$_POST['base'].".png",
                        'persona'=>"persona_".$_POST['base'].".png",
                        'img1'=>"slide_".$_POST['base']."1".".jpg",
                        'img_empresa'=>$_POST['base'].".png");

                    $this->session->set_userdata($data);
                    redirect('', 'refresh');

                }else{
                    $data['error']="Usuario o password incorrecta";
                    $this->load->view("/login/index.php",$data); 
                }
            }

        }

        /*public function mostrar()
        {
            $this->load->model('usuario_model');
            //$data= array('user' =>  'admin_pg','password'=>'1234','base' =>  'movil_tour');
            //$data= array('user' =>  'admin','password'=>'1234','base' =>  'civa');
            $user=$this->usuario_model->ValidarUsuario($data);
            echo "<pre>";print_r($data);
            print_r($user);
        
        } */





        public function cerrar()
        {
            $this->session->sess_destroy();
            redirect('', 'refresh');
        
        } 


    }


?>