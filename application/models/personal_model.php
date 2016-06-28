<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Personal_model extends CI_Model{
        
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
            $sql="SELECT per.per_id,per.per_dni,per.per_nombres ,
                        per.per_fecha_nac,per.per_fecha_reg,per.per_cargo,car.car_descripcion 
                    FROM personal as per, cargo as car 
                    WHERE per.per_cargo=car.car_id and per.per_estado=1";  
            $query=$this->db->query($sql);  
            return $query;            
        }

        function selectId($id){
            $sql="SELECT per.*,car.car_descripcion 

                    FROM viaje_personal as v,  personal as per ,cargo as car

                    WHERE v.per_id=per.per_id and  car.car_id=per.per_cargo and 
                           v.via_id=".$id;
                    
            $query=$this->db->query($sql);
            return $query;
       
        }

        function crear($data){
            $datos=array(
                        'per_dni' => $data['dni'],
                        'per_nombres' => $data['nombre'],
                        'per_fecha_nac' => $data['nacimiento'],
                        'per_fecha_reg' => date('Y-m-d') ,
                        'per_cargo' => $data['cargo'],
                        'per_estado' => 1 );
            if($this->db->insert('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            
            return $query;            
        }

        function editar($data){
            $datos=array(
                        'per_dni' => $data['dni'],
                        'per_nombres' => $data['nombre'],
                        'per_fecha_nac' => $data['nacimiento'],
                        'per_cargo' => $data['cargo']);
            $this->db->where("per_id",$data['id']);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

        function eliminar($id){

            $datos=array('per_estado' => 0 );
            $this->db->where("per_id",$id);
            if($this->db->update('personal',$datos)){
                 $query=0;
            }else{
                 $query=$this->db->_error_message();
            }
            return $query;
        }

    }
?>