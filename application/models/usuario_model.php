<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Usuario_model extends CI_Model{
	    
	    function __construct(){
	        parent::__construct();
	        
          
	    }

	    function ValidarUsuario($data){
	    	$sql="SELECT usu_id 
	    			FROM usuario 
	    			WHERE usu_name='".$data['user']."' and usu_password='".md5($data['password'])."' and usu_estado=1";

            if($data['base']=='civa'){
               $query=$this->db_my->query($sql);
            }else if($data['base']=='movi_tour'){
               $query=$this->db_pg->query($sql);
            }
            return $query->row();
      
	    }


	    
	}
?>