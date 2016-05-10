<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Busqueda_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
          
	    }

	    function select(){

	    	$sql_civa="SELECT 'Civa' as 'empresa' ";
	    	$sql_movil="SELECT 'Movil Tour' as empresa ";
	    	$sql=" ,c_ori.ciu_nombre as ori,c_des.ciu_nombre as dest,veh.veh_descripcion,veh.veh_matricula,veh.veh_tipo,
	    				v.via_precio,v.via_fecha_salida,v.via_hora_salida,a.asi_num,p.pas_nombres,
	    				p.pas_apellidos,p.pas_num_documento ,vp.venpas_precio 

					FROM viaje as v, asiento as a, venta_pasaje as vp, pasajero as p, ciudad as c_ori, 
						ciudad as c_des, vehiculo as veh

					WHERE v.via_origen=c_ori.ciu_id and v.via_destino=c_des.ciu_id and v.via_vehiculo=veh.veh_id 
						and v.via_id=a.asi_viaje and a.asi_id=vp.venpas_asiento and vp.venpas_pasajero=p.pas_id ";
	    	
	        $query=$this->db_my->query($sql_civa.$sql);
	        $result['civa']=$query->result();
	        $query=$this->db_pg->query($sql_movil.$sql);
	        $result['movil']=$query->result();
	        
	        //$query['movil']=$this->db_pg->get($sql);
	        return $result;
	        
	    }


	    
	}
?>