<?php 
/**
 * 
 */
class Home extends CI_Controller
{

	public function __construct(){
    	parent::__construct();
    	//Codeigniter : Write Less Do More
    	$this->load->model('Dbs_home');
    	$this->load->model('Data_Wisata_Model');
        $this->load->helper('url');
    }	

    //fungsi untuk memanggil file home,header,dan footer pada folder views
	function index(){
		$kotban=$this->Dbs_home->hitung_kotban()->row();
		$cimahi=$this->Dbs_home->hitung_cimahi()->row();
		$kabban=$this->Dbs_home->hitung_kabban()->row();
		$banrat=$this->Dbs_home->hitung_banrat()->row();
		$data=$this->Data_Wisata_Model->get_wisata_latihan();
		$data=array(
			'kotban' => $kotban,
			'cimahi' => $cimahi,
			'kabban' => $kabban,
			'banrat' => $banrat,
			'data' => $data
		);
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

	function details($id)
	{
		$data=$this->Data_Wisata_Model->get_by_id($id);
		$data = array(
			'data' => $data );

		$this->load->view('header');
		$this->load->view('details',$data);
		$this->load->view('footer');
	}

	function kotabandung(){
		$this->load->view('header');
		$this->load->view('blogkotband');
		$this->load->view('footer');
	}

	function cimahi(){

	}

	function kabupatenbandung(){

	}

	function bandungbarat(){

	}
}

 ?>