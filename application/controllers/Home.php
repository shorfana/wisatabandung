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
    	// $this->load->helper('url');
    }	

    //fungsi untuk memanggil file home,header,dan footer pada folder views
	function index(){
		$kotban=$this->Dbs_home->hitung_kotban()->row();
		$cimahi=$this->Dbs_home->hitung_cimahi()->row();
		$kabban=$this->Dbs_home->hitung_kabban()->row();
		$banrat=$this->Dbs_home->hitung_banrat()->row();
		$data=array(
			'kotban' => $kotban,
			'cimahi' => $cimahi,
			'kabban' => $kabban,
			'banrat' => $banrat
		);
		$this->load->view('header');
		$this->load->view('home',$data);
		$this->load->view('footer');
	}

	function wkwk(){
		$this->load->view('pemilikwisata/coba');
	}
}

 ?>