<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Viaje_model extends CI_Model{
        
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
        function guardarViaje($_P){

             foreach ($_P['asiento'] as $key => $value) {
            $datos=array(
                        'asi_viaje' => (int)$_P['idviaje'],
                         'asi_num' => $value,
                        'asi_estado'=>1,
                        'pas_tipo_documento' => 1,
                        'pas_dni' =>  $_P['dni'][$key],
                        'pas_nombre' => $_P['nombre'][$key],
                        'pas_apellidos'=>'apellido',
                        'pas_edad' => 22,
                        'pas_email'=> 'email',
                        'pas_telefono'=> $_P['telefono'][$key]
                         );

            if($this->db->insert('asiento',$datos)){
                             $query=array('resp'=>1,'msg'=>'ok');
                        }else{
                             $query=array('resp'=>0,'msg'=>$this->db->_error_message());
                        }
           

            }
             return $query;   
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
            $sql="SELECT c_ori.ciu_nombre as ori,c_des.ciu_nombre as dest,veh.veh_descripcion,veh.veh_matricula,veh.veh_tipo,
                        v.via_precio,v.via_fecha_salida,v.via_hora_salida, v.via_id,veh.veh_tipo

                    FROM viaje as v,  ciudad as c_ori,    ciudad as c_des, vehiculo as veh

                    WHERE v.via_origen=c_ori.ciu_id and v.via_destino=c_des.ciu_id and v.via_vehiculo=veh.veh_id and 
                           v.via_id=".$id;
                    
            $query=$this->db->query($sql);
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