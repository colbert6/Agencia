<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Viaje_model extends CI_Model{
        
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

            $sql="SELECT c_ori.ciu_nombre as ori,c_des.ciu_nombre as dest,veh.veh_descripcion,veh.veh_matricula,veh.veh_tipo,
                        v.via_precio,v.via_fecha_salida,v.via_hora_salida, v.via_id,veh.veh_tipo

                    FROM viaje as v,  ciudad as c_ori,    ciudad as c_des, vehiculo as veh

                    WHERE v.via_origen=c_ori.ciu_id and v.via_destino=c_des.ciu_id and v.via_vehiculo=veh.veh_id ";
                    
            $query=$this->db->query($sql);
            return $query;
            
        }

        function selectId($id){
            $this->db->where('via_id',$id);
            $query=$this->db->get('viaje');
            return $query;
       
        }

         function crear($data){
            $datos=array(
                        'via_codigo_postal' => $data['codigo'],
                        'via_nombre' => $data['nombre'],
                        'via_estado' => 1 );
            if($data['empresa']==1){
                $this->db_my->insert('viaje',$datos);
            }else if($data['empresa']==2){
                $this->db_pg->insert('viaje',$datos);
            }
        }


        function editar($data){
            $datos=array('via_dni' => $data['dni'],
                        'via_nombres' => $data['nombres'],
                        'via_apellidos' => $data['apellidos'],
                        'via_fecha_nac' => $data['fecha_nac'],
                        'via_fecha_reg' => $data['fecha_reg']
                        );
            $this->db->where('via_id',$data['id']);
            $query=$this->db->update('viaje',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('via_estado' => 0   );
            $this->db->where('via_id',$id);
            $query=$this->db->update('viaje',$datos);
            return $query;
        }

    }
?>