<?php 
/**
 * 
 */
class Dbs_sadmin extends CI_Model
{
	
	function getDatakab(){
		$kab=$this->db->get('kabupaten');
		return $kab;
	}

	function getDataadmindinas(){
		$adm=$this->db->get('admin_dinas');
		return $adm;
	}
}
 ?>