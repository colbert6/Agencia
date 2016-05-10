<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Vehiculo_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->select(" 'Civa' as 'empresa', veh_id , veh_descripcion, veh_matricula, veh_fecha_compra, veh_num_asientos", FALSE);
            $this->db_my->where('veh_estado',1);
            $query_1=$this->db_my->get('vehiculo');

             $this->db_pg->select(" 'Movil Tour' as empresa, veh_id , veh_descripcion,veh_matricula,  veh_fecha_compra, veh_num_asientos", FALSE);
            $this->db_pg->where('veh_estado',1);
            $query_2=$this->db_pg->get('vehiculo');

            $query=array_merge($query_1->result(),$query_2->result());

            //echo "<pre>";print_r( $query);exit();

            return $query;
            
        }

        function selectId($id){
            $this->db->where('veh_id',$id);
            $query=$this->db->get('vehiculo');
            return $query;
       
        }

        function crear($data){
            $datos=array('veh_tipo' => $data['tipo'],
                            'veh_descripcion' => $data['descripcion'],
                            'veh_matricula' => $data['matricula'],
                            'veh_fecha_compra' => $data['fecha_compra'],
                            'veh_num_asientos' => $data['num_asientos'],
                            'veh_estado' => 1 );
            if($data['empresa']==1){
                $this->db_my->insert('vehiculo',$datos);
            }else if($data['empresa']==2){
                $this->db_pg->insert('vehiculo',$datos);
            }
        }

        function editar($data){
            $datos=array('veh_tipo' => $data['tipo'],
                        'veh_descripcion' => $data['descripcion'],
                        'veh_matricula' => $data['matricula'],
                        'veh_fecha_compra' => $data['fecha_compra'],
                        'veh_num_asientos' => $data['num_asientos']
                        );
            $this->db->where('veh_id',$data['id']);
            $query=$this->db->update('vehiculo',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('veh_estado' => 0   );
            $this->db->where('veh_id',$id);
            $query=$this->db->update('vehiculo',$datos);
            return $query;
        }

    }
?>