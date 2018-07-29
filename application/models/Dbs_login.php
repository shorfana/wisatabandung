<?php 
/**
 * 
 */
class Dbs_login extends CI_Model
{
	//fungsi untuk mengecek apakah didalam tabel ada data atau tidak
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}

	function getNIP($nip){
		$dml="SELECT * FROM admin_dinas WHERE username='$nip'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getPassword($password){
		$dml="SELECT * FROM admin_dinas WHERE password='$password'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getEmail($email){
		$dml="SELECT * FROM pemilik_wisata WHERE email='$email'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getpasspemilikw($password){
		$dml="SELECT * FROM pemilik_wisata WHERE password='$password'";
		$query=$this->db->query($dml);
		return $query;
	}

	function gethapus(){
		$kab=$this->db->get('pemilik_wisata');
		return $kab;
	}


	function getAktif($email){
		$dml="SELECT aktif FROM pemilik_wisata WHERE email='$email'";
		$query=$this->db->query($dml);
		return $query;
	}

	function getByemail($email){
		$this->db->where('email',$email);
		return $this->db->get('pemilik_wisata')->row();
	}	

	function getEmailUser($email){
		$dml="SELECT * FROM pemilik_wisata where email='$email'";
        $query = $this->db->query($dml);
        return $query;
	}	

    function ubahpasswordUser($email,$data){
        $this->db->set($data);
        $this->db->where('email', $email);
        $this->db->update('pemilik_wisata');
    }

    function cekEmail($email){
    	$sql="SELECT email FROM pemilik_wisata WHERE email='$email'";
    	$query = $this->db->query($sql);
    	return $query;
    }

}
 ?>