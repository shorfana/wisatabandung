<?php 
/**
 * 
 */
class Register extends CI_Controller
{
	
	public function __construct(){
    	parent::__construct();
    	$this->load->model('Dbs_Dinas');
        $this->load->model('Dbs_CRUD');
    	$this->load->helper('url');
	}

    function index(){
        $data['admin_dinas']=$this->Dbs_Dinas->getDinas()->result();
        $this->load->view('pemilikwisata/register',$data);
    }

	public function email($subject,$isi,$emailtujuan){

		  $config['protocol'] = 'smtp';
		  $config['smtp_host'] = 'ssl://smtp.gmail.com';
		  $config['smtp_port'] = '465';
		  $config['smtp_user'] = 'shorfanaiqbal98@gmail.com';
		  $config['smtp_pass'] = 'muhammad90'; //ini pake akun pass google email
		  $config['mailtype'] = 'html';
		  $config['charset'] = 'iso-8859-1';
		  $config['wordwrap'] = 'TRUE';
		  $config['newline'] = "\r\n";

		  $this->load->library('email', $config);
		  $this->email->initialize($config);

		  $this->email->from('shorfanaiqbal98@gmail.com');
		  $this->email->to($emailtujuan);
		  $this->email->subject($subject);
		  $this->email->message($isi);
		  $this->email->set_mailtype('html');
		  $this->email->send();
	}    

	function verif_pemilik_wisata($noktp){
		$data=array(
			'aktif' => 'Y'
		);
		$sql=$this->Dbs_CRUD->update($data,'pemilik_wisata','noktp',$noktp); 
		if ($sql) {
			echo "<script type='text/javascript'>alert('Verifikasi Berhasil Silahkan LOGIN!'); document.location='http://localhost/wisatabandung/Login/pemilik_wisata' </script>";
		}
	}

    function pRegistrasipemilikwisata(){
        $nama=$_POST['nama'];
        $noktp=$_POST['noktp'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $alamat=$_POST['alamat'];
        $tempat=$_POST['tempat'];
        $tgl_lahir=$_POST['tgl_lahir'];
        $foto_ktp=$_FILES['foto_ktp']['name'];
        $config['upload_path']='./fotoktp';
        $config['allowed_types']='jpg|gif|png';
        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('foto_ktp')) {
            echo "Download Gagal"; die();
        }else{
            $gambar=$this->upload->data('file_name');
        }
        $data=array(
            'nama' => $nama,
            'noktp' => $noktp,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'tempat' => $tempat,
            'tgl_lahir' => $tgl_lahir,
            'foto_ktp' => $foto_ktp
        );
        $sql=$this->Dbs_CRUD->insert($data,'pemilik_wisata');
        if ($sql) {
        	$isiemail='<a href=\'http://localhost/wisatabandung/register/verif_pemilik_wisata/'.$noktp.'\'>VERIFIKASI KLIK DISINI</a>';
        	$this->email('Verifikasi akun',$isiemail,$email);			
            

            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Pemilik Wisata'); document.location='http://localhost/wisatabandung/Admin_Dinas/Pemilik_Wisata' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Gagal Menambahkan Pemilik Wisata'); document.location='http://localhost/wisatabandung/Admin_Dinas/vTambahPemilikwisata' </script>";
            
        }
    }
}
 ?>