<?php
/**
 *
 */
class Login extends CI_Controller
{
	public function __construct(){
    	parent::__construct();

    	//Codeigniter : Write Less Do More
    	$this->load->model('Dbs_login');
    	$this->load->helper('url');



    }

    function index(){

        $this->load->view('pemilikwisata/login_pemilik_wisata');
    }


    //fungsi untuk proses login super admin dan admin dinas
    function login_act(){
    	$username=$this->input->post('username');
    	$password=$this->input->post('password');
        $ceknip=$this->Dbs_login->getNIP($username);
        $cekpassword=$this->Dbs_login->getPassword($password);
    	$where=array(
    		'username' => $username,
    		'password' => md5($password)
    	);
    	if($this->Dbs_login->cek_login("super_admin",$where)->num_rows()>0){// cek ke tabel super admin
    		$data_session = array(
                'username' => $username,
                'status' => "superadmin"
                );

            $this->session->set_userdata($data_session);
            redirect(base_url("Superadmin"));
    	}else if($this->Dbs_login->cek_login("admin_dinas",$where)->num_rows()>0){ //cek ke tabel admin dinas
            $data = $this->Dbs_login->cek_login("admin_dinas",$where)->row();
                $data_session = array(
                    'nip' => $data->username,
                    'nama' => $data->nama,
                    'username_sadmin' => $data->username_sadmin,
                    'kode_kabupaten' => $data->kode_kabupaten,
                    'status' => 'admin_dinas'
                );
                $this->session->set_userdata($data_session);
                if ($data->kode_kabupaten == "1") {
                    redirect('Admin_Dinas');
                }elseif ($data->kode_kabupaten == "2") {
                    redirect('Admin_Dinas');
                }elseif ($data->kode_kabupaten == "3") {
                    redirect('Admin_Dinas');
                }elseif ($data->kode_kabupaten == "4") {
                    redirect('Admin_Dinas');
                }


            }else{
               echo "<script type='text/javascript'>alert('Username atau password Salah!!!'); document.location='http://localhost/wisatabandung/Login/admin' </script>";
            }
        }

    function admin(){
        $this->load->view('Login');
    }

    function pemilik_wisata_act(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        $cekemail = $this->Dbs_login->getEmail($email);
        $cekpassword = $this->Dbs_login->getpasspemilikw($password);
        $get=$this->Dbs_login->getByemail($email);
        $aktif=$get->aktif;
        $where=array(
            'email' => $email,
            'password' => md5($password),
            'aktif' => $aktif
        );
        if($this->Dbs_login->cek_login("pemilik_wisata",$where)->num_rows()>0){// cek ke tabel super admin
                    if ($aktif == 'Y') {
                        $data_session = array(
                        'email' => $email,
												'id_pemilikwisata' => $get->id_pemilikwisata,
												'NIP' => $get->NIP,
                        'nama' => $get->nama,
                        'status' => 'pemilik_wisata'
                        );
                    $this->session->set_userdata($data_session);
                    redirect(base_url("Pemilik_Wisata"));
                    }else{
                        echo "<script type='text/javascript'>alert('Akun Anda Sedang Nonaktif'); document.location='http://localhost/wisatabandung/Login/' </script>";
                    }


            }else{
               echo "<script type='text/javascript'>alert('Username atau password Salah!!!'); document.location='http://localhost/wisatabandung/Login/' </script>";
            }
    }

    //fungsi untuk menampilkan halaman lupa password
    function lupaPassword(){
        $this->load->view('superadmin/lupasPassword');

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


    function lupa_password(){
        $this->load->view('pemilikwisata/lupaPassword');
    }

    function lupaPassword_act(){//fungsi untuk memproses lupa password
            $email = $this->input->post('email');
            $cekEmailUser = $this->Dbs_login->getEmailUser($email);
            $cek=$cekEmailUser->num_rows();

                //password baru
            if ($cek>0) {
                $get=$cekEmailUser->row();
                $pass="129FAasdsk25kwBjakjDlff";
                $panjang='8';
                $len=strlen($pass);
                $start=$len-$panjang;
                $xx=rand('0',$start);
                $yy=str_shuffle($pass);
                $passwordbaru=substr($yy, $xx, $panjang);
                $data['password'] = md5($passwordbaru);
                $isiemail='ini password baru anda '.$passwordbaru.' <br>
                <a href="http://localhost/wisatabandung/Login/pemilik_wisata/">LOGIN klik DIsini!!!</a>';
                $this->Dbs_login->ubahpasswordUser($email, $data);
                $this->email('Email Anda',$isiemail,$email);
                echo "<script type='text/javascript'>alert('Password Baru Sudah terkirim ke email anda'); document.location='http://localhost/wisatabandung/Login/' </script>";
                    }
                echo "<script type='text/javascript'>alert('Email Anda belum terdaftar'); document.location='http://localhost/Igniterhotel/Login/lupaPassword' </script>";

            }


    function logout(){
    	$this->session->sess_destroy();
    	redirect(base_url());
    }
}
 ?>
