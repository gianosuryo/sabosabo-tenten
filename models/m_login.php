<?php 
 
class M_login extends CI_Model{	
	function cek_login($table,$where){		
		$query = $this->db->get_where($table,$where);
		return $query->row();
	}
}


?>