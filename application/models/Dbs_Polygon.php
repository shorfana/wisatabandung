<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbs_Polygon extends CI_Model{

  public $table = 'polygon';
public $id = 'id_polygon';
public $order = 'DESC';

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function get_by_kabupaten($kode_kabupaten)
  {
      $this->db->where('kode_kabupaten', $kode_kabupaten);
      return $this->db->get($this->table)->row();
  }

}
