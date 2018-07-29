<?php 
/**
 * 
 */
class Dbs_Dinas extends CI_Model
{
	function getpw_aktif(){
		// $this->db->where('NIP',$nip);
		// return $this->db->get('pemilik_wisata')->result();
		$dml="SELECT * FROM pemilik_wisata where NIP IS NOT NULL and dihapus='T'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getpw_nonaktif(){
		// $this->db->where('NIP',$nip);
		// return $this->db->get('pemilik_wisata')->result();
		$dml="SELECT * FROM pemilik_wisata where NIP IS NULL and dihapus='T'";
		$query=$this->db->query($dml);
		return $query;
	}

	function hapusPw($id)
	{
		$sql="UPDATE `pemilik_wisata` SET NIP = NULL, dihapus ='Y' where id_pemilikwisata=$id";
		return $this->db->query($sql);
	}

	function getDinas(){
		$data=$this->db->get('admin_dinas');
		return $data;
	}

	function getByemail($email){
		$this->db->where('email',$email);
		return $this->db->get('pemilik_wisata')->row();
	}

	function getByeid($id){
		$this->db->where('id_pemilikwisata',$id);
		return $this->db->get('pemilik_wisata')->row();
	}


	function cekNip($id){
		$dml="SELECT * FROM pemilik_wisata where id_pemilikwisata='$id'";
        $query = $this->db->query($dml);
        return $query;
	}

	function cekHapuskec($kode_kecamatan){
		$dml="SELECT * FROM kecamatan WHERE kode_kecamatan=$kode_kecamatan";
		$query = $this->db->query($dml);
		return $query;
	}

	function cekHapuskel($kode_kelurahan){
		$dml="SELECT * FROM kelurahan WHERE kode_kelurahan=$kode_kelurahan";
		$query=$this->db->query($dml);
		return $query;
	}

	function get_kec($kode_kabupaten){
		$dml="SELECT kode_kecamatan,nama_kecamatan, kode_kabupaten, nama_kabupaten FROM kecamatan join kabupaten USING (kode_kabupaten) WHERE kode_kabupaten=$kode_kabupaten AND dihapus='T'";
		$query=$this->db->query($dml);
		return $query;
	}	

	function getkel($kode_kabupaten){
		$dml="SELECT kode_kelurahan,nama_kelurahan,nama_kecamatan,kode_kecamatan from kabupaten join kecamatan USING (kode_kabupaten) join kelurahan using (kode_kecamatan) where kode_kabupaten=$kode_kabupaten AND kelurahan.dihapus='T'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getkell($kode_kabupaten){
		$dml="SELECT DISTINCT nama_kecamatan,kode_kecamatan from kabupaten join kecamatan USING (kode_kabupaten) join kelurahan using (kode_kecamatan) where kode_kabupaten=$kode_kabupaten";
		$query=$this->db->query($dml)->result();
		return $query;
	}	

}
 ?>