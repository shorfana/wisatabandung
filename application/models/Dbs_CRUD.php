<?php
/**
 *
 */
class Dbs_CRUD extends CI_Model
{

	function get_allData_Wisata()
    {
        return $this->db->get('data_wisata')->result();
    }

    function get_allData_kec(){
    	return $this->db->get('kecamatan')->result();
    }

	function insert($data,$table){
		$this->db->insert($table,$data);
		if ($this->db->affected_rows()>0) {
			return true;
		}else{
			return false;
		}
	}

	function update($data,$table,$where,$value){
		$this->db->where($where,$value);
		$this->db->update($table,$data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}

	function delete($where,$value,$table){
		$this->db->where($where,$value);
		$this->db->delete($table);
	}

	// function getbyNIP($nip){
	// 	$this->db->where('nip',$nip);
	// 	return $this->db->get('admin_dinas')->row();
	// }

	function getkab_by_id($id)
	{
		$sql="SELECT * from kabupaten where `kode_kabupaten`=$id";
		return $this->db->query($sql);
	}

	function deleteAdmin($id){
		$sql="Update `admin_dinas` SET `dihapus`='Y' where `username` = $id";
	  $this->db->query($sql);
	}

	function getbyNIP($nip){
		$this->db->where('nip',$nip);
		return $this->db->get('admin_dinas')->row();
	}

	function get_by_id($id)
	{
		$this->db->where('username', $id);
		return $this->db->get('admin_dinas')->row();
	}

	function getbykdkec($kode_kecamatan){
		$this->db->where('kode_kecamatan',$kode_kecamatan);
		return $this->db->get('kecamatan')->row();
	}

	function getbykdkel($kode_kelurahan){
		// \\$dml="select DISTINCT kode_kelurahan,nama_kelurahan,nama_kecamatan from kabupaten inner join kecamatan using(kode_kabupaten) inner join kelurahan where kode_kabupaten=3";	

		$this->db->where('kode_kelurahan',$kode_kelurahan);
		return $this->db->get('kelurahan');
	}

	public function get_kabupaten()
			 {
					 $this->db->order_by('nama_kabupaten', 'asc');
					 return $this->db->get('kabupaten')->result();
			 }

			 public function get_kecamatan()
			 {
					 // kita joinkan tabel kota dengan provinsi
					 $this->db->order_by('nama_kecamatan', 'asc');
					 $this->db->join('kabupaten', 'kecamatan.kode_kabupaten = kabupaten.kode_kabupaten');
					 return $this->db->get('kecamatan')->result();
			 }

			 public function get_kelurahan()
			 {
					 // kita joinkan tabel kecamatan dengan kota
					 $this->db->order_by('nama_kelurahan', 'asc');
					 $this->db->join('kecamatan', 'kelurahan.kode_kecamatan = kecamatan.kode_kecamatan');
					 return $this->db->get('kelurahan')->result();
			 }


			 // untuk edit ambil dari id level paling bawah
			 public function get_selected_by_kode_kelurahan($kode_kelurahan)
			 {
					 $this->db->where('kode_kelurahan', $kode_kelurahan);
					 $this->db->join('kecamatan', 'kelurahan.kode_kecamatan = kecamatan.kode_kecamatan');
					 $this->db->join('kabupaten', 'kecamatan.kode_kabupaten = kabupaten.kode_kabupaten');
					 return $this->db->get('kelurahan')->row();
			 }

			 public function insert_gambar($data){
        $insert = $this->db->insert_batch('gambar',$data);
        return $insert?true:false;
    	 }

}
 ?>
