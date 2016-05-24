<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

<<<<<<< HEAD
	class Terminal_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
=======
    class Terminal_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
            if($this->session->userdata('base')=='civa'){
               $this->db_my=$this->load->database('mysql',TRUE);
               $this->db=$this->db_my;
            }else if($data['base']=='movi_tour'){
               $this->db_pg=$this->load->database('postgre',TRUE);
               $this->db=$this->db_pg;
            }
    
        }

        function select(){
            $this->db->where("ter_estado",1);  
<<<<<<< HEAD
            $query=$this->db->get("terminal");      
=======
            $query=$this->db->get("terminal");    
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
            return $query;            
        }

        function selectId($id){
            
            return $query;
        }

        function crear($data){
<<<<<<< HEAD
            $datos=array('ter_descripcion' => $data['descripcion'],
    					'ter_direccion' => $data['direccion'],
    					'ter_ciudad' => $data['ciudad'],
    					'ter_estado' => 1 );
=======
            $datos=array(
                        'ter_descripcion' => $data['descripcion'],
                        'ter_direccion' => $data['direccion'],
                        'ter_ciudad' => $data['ciudad'],
                        'ter_estado' => 1 );
>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
            if($this->db->insert('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }
<<<<<<< HEAD

        function editar($data){
            $datos=array('ter_descripcion' => $data['descripcion'],
    					'ter_direccion' => $data['direccion'],
    					'ter_ciudad' => $data['ciudad'] );
            $this->db->where("ter_id",$data['id']);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('ter_estado' => 0 );
            $this->db->where("ter_id",$id);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

=======

        function editar($data){
            $datos=array(
                        'ter_descripcion' => $data['descripcion'],
                        'ter_direccion' => $data['direccion'],
                        'ter_ciudad' => $data['ciudad']);
            $this->db->where("ter_id",$data['id']);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('ter_estado' => 0 );
            $this->db->where("ter_id",$id);
            if($this->db->update('terminal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

>>>>>>> 1fb3545e04d60a26b33b9e9d210ed49783bf123a
    }
?>