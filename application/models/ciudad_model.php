<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Ciudad_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            
           // $this->db_pg=$this->load->database('pgsql',TRUE);
        }

        function select(){
            $this->db_my->select(" 'Civa' as 'empresa', ciu_id , ciu_codigo_postal, ciu_nombre", FALSE);
            $this->db_my->where('ciu_estado',1);
            $query_1=$this->db_my->get('ciudad');

             $this->db_pg->select(" 'Movil Tour' as empresa, ciu_id , ciu_codigo_postal,ciu_nombre", FALSE);
            $this->db_pg->where('ciu_estado',1);
            $query_2=$this->db_pg->get('ciudad');

            $query=array_merge($query_1->result(),$query_2->result());

            //echo "<pre>";print_r( $query);exit();

            return $query;
            
        }

        function selectId($id){
            $this->db->where('ciu_id',$id);
            $query=$this->db->get('ciudad');
            return $query;
       
        }

         function crear($data){
            $datos=array(
                        'ciu_codigo_postal' => $data['codigo'],
                        'ciu_nombre' => $data['nombre'],
                        'ciu_estado' => 1 );
            if($data['empresa']==1){
                $this->db_my->insert('ciudad',$datos);
            }else if($data['empresa']==2){
                $this->db_pg->insert('ciudad',$datos);
            }
        }


        function editar($data){
            $datos=array('ciu_dni' => $data['dni'],
                        'ciu_nombres' => $data['nombres'],
                        'ciu_apellidos' => $data['apellidos'],
                        'ciu_fecha_nac' => $data['fecha_nac'],
                        'ciu_fecha_reg' => $data['fecha_reg']
                        );
            $this->db->where('ciu_id',$data['id']);
            $query=$this->db->update('ciudad',$datos);
            return $query;
        }

        function eliminar($id){
            $datos=array('ciu_estado' => 0   );
            $this->db->where('ciu_id',$id);
            $query=$this->db->update('ciudad',$datos);
            return $query;
        }

    }
?>