<?php 
/**
 * 
 */
class Home extends CI_Controller
{

	public function __construct(){
    	parent::__construct();
    	//Codeigniter : Write Less Do More
    	// $this->load->model('Dbslogin');
    	// $this->load->helper('url');
    }	

    //fungsi untuk memanggil file home,header,dan footer pada folder views
	function index(){
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	function wkwk(){
		$this->load->view('pemilikwisata/coba');
	}
}

 ?>