<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Wisata_Model extends CI_Model{

  public $table = 'data_wisata';
public $id = 'kode_wisata';
public $order = 'DESC';

function __construct()
{
    parent::__construct();
}

// get all
function get_all()
{
    $this->db->order_by($this->id, $this->order);
    return $this->db->get($this->table)->result();
}

function get_wisata_aktif_byId($id){
  $sql="Select * from `data_wisata` where `dihapus`='T' and `id_pemilikwisata`=$id";
  return $this->db->query($sql)->result();
    }

    function get_wisata_export(){
  $sql="SELECT `nama_wisata`, `latitude`, `longitude`, `alamat`, `nama_kelurahan`, `nama_kecamatan`, `nama_kabupaten` FROM `data_wisata` JOIN `kabupaten` USING(kode_kabupaten) JOIN `kecamatan` USING(kode_kecamatan) JOIN `kelurahan` USING(kode_kelurahan)";
  return $this->db->query($sql)->result();
    }

function get_wisata_aktif(){
  $sql="Select * from `data_wisata` where `dihapus`='T'";
  return $this->db->query($sql)->result();
    }
//get field
function get_field(){
  return $this->db->list_fields($this->table);
}

// get data by id
function get_by_id($id)
{
    $this->db->where($this->id, $id);
    return $this->db->get($this->table)->row();
}

function get_by_kabupaten($kode_kabupaten)
{
    $sql="Select * from `data_wisata` where `dihapus`='T' and `kode_kabupaten`=$kode_kabupaten";
    return $this->db->query($sql)->result();
}

// get total rows
function total_rows($q = NULL) {
    $this->db->like('kode_wisata', $q);
$this->db->or_like('nama_wisata', $q);
$this->db->or_like('latitude', $q);
$this->db->or_like('longitude', $q);
$this->db->or_like('alamat', $q);
$this->db->or_like('deskripsi', $q);
$this->db->or_like('kode_kabupaten', $q);
$this->db->or_like('kode_kecamatan', $q);
$this->db->or_like('kode_kelurahan', $q);
$this->db->from($this->table);
    return $this->db->count_all_results();
}

// insert data
function insert($data)
{
    $this->db->insert($this->table, $data);
}

// update data
function update($id, $data)
{
    $this->db->where($this->id, $id);
    $this->db->update($this->table, $data);
}

// delete data
function delete($id)
{
    $this->db->where($this->id, $id);
    $this->db->delete($this->table);
}

public function nonaktif($id)
{
  $sql="Update `data_wisata` SET `aktif`='T' where `kode_wisata` = $id";
  $this->db->query($sql);
}

public function aktif($id)
{
  $sql="Update `data_wisata` SET `aktif`='Y' where `kode_wisata` = $id";
  $this->db->query($sql);
}

public function hapus($id)
{
  $sql="Update `data_wisata` SET `dihapus`='Y', `aktif`='T' where `kode_wisata` = $id";
  $this->db->query($sql);
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

     public function get_statistik_wisata()
     {
       $sql="SELECT kode_kabupaten, count(kode_wisata) as jumlah from data_wisata GROUP BY kode_kabupaten";
       return $this->db->query($sql)->result();
     }

     public function get_wisata_latihan()
     {
       $sql="Select * from `data_wisata` join kabupaten using (kode_kabupaten) join kecamatan using (kode_kecamatan) join kelurahan using (kode_kelurahan) where data_wisata.dihapus='T' LIMIT 6";
        return $this->db->query($sql)->result();
     }
}
