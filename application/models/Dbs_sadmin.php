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
		$sql="SELECT `username`, `nama`, `nama_kabupaten` FROM `admin_dinas` JOIN `kabupaten` using (kode_kabupaten) where `admin_dinas`.dihapus='T'";
		return $this->db->query($sql)->result();
	}

	function get_by_id($id)
	{
	    $this->db->where($this->id, $id);
	    return $this->db->get($this->table)->row();
	}
}
 ?>
