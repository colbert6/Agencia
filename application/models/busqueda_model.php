<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Busqueda_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
            $this->db_my=$this->load->database('mysql',TRUE);            
            $this->db_pg=$this->load->database('postgre',TRUE);
            
          
	    }

	    function select(){

	    	$sql_civa="SELECT 'Civa' as 'empresa' ,";
	    	$sql_movil="SELECT 'Movil Tour' as empresa ,";
	    	$sql=" ori.ciu_nombre as origen,dest.ciu_nombre as destino, via.via_fecha_salida,
	    		asi.asi_num,asi.pas_dni,asi.pas_nombre, asi.pas_edad
				FROM asiento as asi, viaje as via ,ciudad as ori,ciudad as dest 
				WHERE asi.asi_viaje=via.via_id and via.via_origen=ori.ciu_id 
						and via.via_destino=dest.ciu_id ";

	    	
	        $query=$this->db_my->query($sql_civa.$sql);
	        $result['civa']=$query->result();
	        $query=$this->db_pg->query($sql_movil.$sql);
	        $result['movil']=$query->result();
	        
	        return $result;
	        
	    }


	    
	}
?>