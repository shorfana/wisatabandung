<?php 
/**
 * 
 */
class Dbs_home extends CI_Model
{
	function get_Poto(){
		$data="SELECT * FROM gambar where kode_wisata=99";
		$query=$this->db->query($data)->result();
		return $query;
	}

	function hitung_kotban(){
		$dml="select COUNT(kode_wisata) as wisata from data_wisata where kode_kabupaten='1'";
		$query=$this->db->query($dml);
		return $query;
	}

	function hitung_cimahi(){
		$dml="select COUNT(kode_wisata) as wisata from data_wisata where kode_kabupaten='2'";
		$query=$this->db->query($dml);
		return $query;
	}

	function hitung_banrat(){
		$dml="select COUNT(kode_wisata) as wisata from data_wisata where kode_kabupaten='3'";
		$query=$this->db->query($dml);
		return $query;
	}

	function hitung_kabban(){
		$dml="select COUNT(kode_wisata) as wisata from data_wisata where kode_kabupaten='4'";
		$query=$this->db->query($dml);
		return $query;
	}

	function filter($kode_kabupaten){
		$dml="SELECT nama_wisata,alamat,deskripsi,nama_gambar FROM data_wisata INNER JOIN gambar USING(kode_wisata) where kode_kabupaten=$kode_kabupaten";
		$query=$this->db->query($dml);
		return $query;
	}

	function getpoto(){
		$d=$this->db->get('gambar');
		return $d;
	}
	
}
 ?>