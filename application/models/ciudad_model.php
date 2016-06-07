<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ciudad_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            if($this->session->userdata('base')=='civa'){
               $this->db_my=$this->load->database('mysql',TRUE);
               $this->db=$this->db_my;
            }else if($this->session->userdata('base')=='movil_tour'){
               $this->db_pg=$this->load->database('postgre',TRUE);
               $this->db=$this->db_pg;
            }    
        }

        function select(){
            $this->db->where("ciu_estado",1);  
            $query=$this->db->get("ciudad");      
            return $query;            
        }

        function selectId($id){            
            return $query;
        }

        function crear($data){
            $datos=array('ciu_codigo_postal' => $data['codigo_postal'],
                          'ciu_nombre' => $data['nombre'],
                        'ciu_estado' => 1 );
            if($this->db->insert('ciudad',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('ciu_codigo_postal' => $data['codigo_postal'],
                          'ciu_nombre' => $data['nombre'] );
            $this->db->where("ciu_id",$data['id']);
            if($this->db->update('ciudad',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('ciu_estado' => 0 );
            $this->db->where("ciu_id",$id);
            if($this->db->update('ciudad',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>