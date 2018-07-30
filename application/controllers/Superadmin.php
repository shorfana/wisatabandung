<?php
/**
 *
 */
class Superadmin extends CI_Controller
{

	public function __construct(){
    	parent::__construct();
    	//Codeigniter : Write Less Do More
    	$this->load->model('Dbs_CRUD');
        $this->load->model('Dbs_sadmin');
        $this->load->model('Dbs_home');
				$this->load->model('Data_Wisata_Model');
    	$this->load->helper('url');
        if ($this->session->userdata('status')!='superadmin') {
            redirect(base_url()."Login");
        }
    }



    function index(){
			$statistik=$this->Data_Wisata_Model->get_statistik_wisata();
			$footerdata['statistik'] =$statistik;
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
        $this->load->view('superadmin/header');
    	$this->load->view('superadmin/home',$data);
        $this->load->view('superadmin/footer',$footerdata);
    }

    function pengelolaan_data_wilayah(){
    }

    function pengelolaan_data_admin_dinas(){
        $admindinas=$this->Dbs_sadmin->getDataadmindinas();
				$data = array('admindinas' => $admindinas , );
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/adminDinas',$data);
        $this->load->view('superadmin/footer');
    }
    function vtambahAdmindinas(){
        $data['kabupaten']=$this->Dbs_sadmin->getDatakab()->result();
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/registerAdmindinas',$data);
        $this->load->view('superadmin/footer');

    }



    function tambahAdmindinas(){ //untuk menambah admin dinas
        $username=$_POST['username'];
        $nama=$_POST['nama'];
        $password=$_POST['password'];
        $username_sadmin=$_POST['username_sadmin'];
        $kode_kabupaten=$_POST['kode_kabupaten'];
        $data=array( //menyatukan data menjadi array untuk dilempar ke model
            'username' => $username,
            'nama' => $nama,
            'password' => md5($password),
            'username_sadmin' => $username_sadmin,
            'kode_kabupaten' => $kode_kabupaten
        );
        $sql=$this->Dbs_CRUD->insert($data,'admin_dinas');
        if($sql){//kondisi jika kegiatan insert berhasil maka ditampilkan echo seperti dibawah
            echo "<script type='text/javascript'>alert('Berhasil Membuat akun'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
            //echo ' Admin Dinas Behasil Ditambahkan';
        }else{ //jika tidak maka yang ditampilkan seperti dibawah ini
            echo 'Admin Dinas Gagal Ditambahkan';
        }

    }

    function vUpdateadmindinas($username){ //fungsi untuk menampilkan data admin dinas kedalam form untuk diUpdate
        $get = $this->Dbs_CRUD->get_by_id($username);
        $data = array(
            'username' => $get->username,
            'nama' => $get->nama,
            'password' => $get->password,
            'username_sadmin' => $get->username_sadmin,
            'kode_kabupaten' => $get->kode_kabupaten
        );
        $this->load->view('superadmin/header');
        $this->load->view('superadmin/updateAdmindinas',$data);
        $this->load->view('superadmin/footer');
    }

    function pUpdateadmindinas(){// fungsi untuk melakukan update kedalam database
        $username=$_POST['username'];
        $nama=$_POST['nama'];
        $password=$_POST['password'];
        $data=array(
            'nama' => $nama,
            'password' => $password
        );
        $sql=$this->Dbs_CRUD->update($data,'admin_dinas','username',$username);
        if ($sql) {
            echo "<script type='text/javascript'>alert('Berhasil Diubah'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Gagal Diubah'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
        }
    }

    function deleteAdmindinas(){
        $username=$_GET['username'];
        $this->Dbs_CRUD->deleteAdmin($username);
        echo "<script type='text/javascript'>alert('Berhasil Dihapus'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
    }
}

 ?>
