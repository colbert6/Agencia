<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Vehiculo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            if($this->session->userdata('base')=='civa'){
               $this->db_my=$this->load->database('mysql',TRUE);
               $this->db=$this->db_my;
            }else if($data['base']=='movi_tour'){
               $this->db_pg=$this->load->database('postgre',TRUE);
               $this->db=$this->db_pg;
            }
    
        }

        function select(){
            $this->db->where("veh_estado",1);  
            $query=$this->db->get("vehiculo");      
            return $query;            
        }

        function selectId($id){
            
            return $query;
        }

        function crear($data){
            $datos=array('veh_tipo' => $data['tipo'],
                        'veh_descripcion' => $data['descripcion'],
                        'veh_matricula' => $data['matricula'],
                        'veh_fecha_compra' => $data['fecha_compra'],
                        'veh_num_asientos' => $data['num_asientos'],
                        'veh_estado' => 1 );
            if($this->db->insert('vehiculo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;            
        }

        function editar($data){
            $datos=array('veh_tipo' => $data['tipo'],
                        'veh_descripcion' => $data['descripcion'],
                        'veh_matricula' => $data['matricula'],
                        'veh_fecha_compra' => $data['fecha_compra'],
                        'veh_num_asientos' => $data['num_asientos']);
            $this->db->where("veh_id",$data['id']);
            if($this->db->update('vehiculo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){
            $datos=array('veh_estado' => 0 );
            $this->db->where("veh_id",$id);
            if($this->db->update('vehiculo',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>