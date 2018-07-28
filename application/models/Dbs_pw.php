<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbs_pw extends CI_Model{

  public $table = 'pemilik_wisata';
public $id = 'email';
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

function getDatapw($email){
	$dml="SELECT * FROM pemilik_wisata WHERE email='$email'";
	$query=$this->db->query($dml);
	return $query;
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

function non_aktif($id_pemilikwisata){
	$dml="UPDATE `pemilik_wisata` SET `NIP` = NULL WHERE `pemilik_wisata`.`id_pemilikwisata` = '$id_pemilikwisata'";
	$query=$this->db->query($dml);
	return $query;
}

}
