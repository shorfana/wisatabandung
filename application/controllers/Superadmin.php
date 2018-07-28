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
    	$this->load->helper('url');
        if ($this->session->userdata('status')!='superadmin') {
            redirect(base_url()."Login");
        }
    }

    function index(){
        $this->load->view('superadmin/header');
    	$this->load->view('superadmin/home');
        $this->load->view('superadmin/footer');
    }

    function pengelolaan_data_wilayah(){
    }

    function pengelolaan_data_admin_dinas(){
        $data['admin_dinas']=$this->Dbs_sadmin->getDataadmindinas()->result();
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
        $NIP=$_POST['nip'];
        $nama=$_POST['nama'];
        $password=$_POST['password'];
        $username_sadmin=$_POST['username_sadmin'];
        $kode_kabupaten=$_POST['kode_kabupaten'];
        $data=array( //menyatukan data menjadi array untuk dilempar ke model
            'nip' => $NIP,
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

    function vUpdateadmindinas($nip){ //fungsi untuk menampilkan data admin dinas kedalam form untuk diUpdate
        $get = $this->Dbs_CRUD->getbyNIP($nip);
        $data = array(
            'nip' => $get->NIP,
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
        $nip=$_POST['nip'];
        $nama=$_POST['nama'];
        $password=$_POST['password'];
        $data=array(
            'nama' => $nama,
            'password' => $password
        );
        $sql=$this->Dbs_CRUD->update($data,'admin_dinas','nip',$nip);
        if ($sql) {
            echo "<script type='text/javascript'>alert('Berhasil Diubah'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Gagal Diubah'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
        }
    }

    function deleteAdmindinas(){
        $nip=$_GET['NIP'];
        $this->Dbs_CRUD->delete('NIP',$nip,'admin_dinas');
        echo "<script type='text/javascript'>alert('Berhasil Dihapus'); document.location='http://localhost/wisatabandung/Superadmin/pengelolaan_data_admin_dinas' </script>";
    }
}

 ?>