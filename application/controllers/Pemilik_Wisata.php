<?php
/**
 *
 */
class Pemilik_Wisata extends CI_Controller
{
	public function __construct(){
    	parent::__construct();
    	//Codeigniter : Write Less Do More
    	$this->load->model('Dbs_CRUD');
    	$this->load->model('Dbs_pw');
		$this->load->model('Data_Wisata_Model');
    	// $this->load->helper('url');
		if ($this->session->userdata('status')!= 'pemilik_wisata') {
            redirect(base_url()."Login/Pemilik_Wisata");
        }

    }

		public function index()
		{
			$email = $this->session->userdata('email');
			$nama = $this->session->userdata('nama');
			$data = array(
			'email' => $email,
			'nama' => $nama
			);
			$this->load->view('pemilikwisata/header',$data);
			$this->load->view('pemilikwisata/home');
			$this->load->view('pemilikwisata/footer');
		}

		function data_wisata(){
			$id_pemilikwisata=$this->session->userdata('id_pemilikwisata');
			$data_wisata=$this->Data_Wisata_Model->get_wisata_aktif_byId($id_pemilikwisata);
			$data = array(
				'data_wisata' => $data_wisata , );
			$this->load->view('pemilikwisata/header');
			$this->load->view('pemilikwisata/tampilDataWisata',$data);
			$this->load->view('pemilikwisata/footer');
    }

		function editprofile(){
		$id = $this->session->userdata('id_pemilikwisata');
		// $data['pemilik_wisata']= $this->Dbs_pw->getDatapw($email)->result();
		$pemilik_wisata=$this->Dbs_pw->get_by_id($id);

		$data = array(

			'pemilik_wisata' => $pemilik_wisata , );

        $this->load->view('pemilikwisata/header');
        $this->load->view('pemilikwisata/editProfilePw',$data);
        $this->load->view('pemilikwisata/footer');

	}

    function editprofileact()
    {
    	$nama=$_POST['nama'];
        $noktp=$_POST['noktp'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $alamat=$_POST['alamat'];
        $tempat=$_POST['tempat'];
        $tgl_lahir=$_POST['tgl_lahir'];
        $data=array(
            'nama' => $nama,
            'noktp' => $noktp,
            'email' => $email,
            'password' => $password,
            'alamat' => $alamat,
            'tempat' => $tempat,
            'tgl_lahir' => $tgl_lahir
        );

        $this->Dbs_pw->update($email,$data);

        echo "good";
    }

		function tambahwisata()
		{

			if(!empty($this->session->userdata('NIP'))){
			$data = array(
            'kabupaten' => $this->Dbs_CRUD->get_kabupaten(),
            'kecamatan' => $this->Dbs_CRUD->get_kecamatan(),
            'kelurahan' => $this->Dbs_CRUD->get_kelurahan(),
            'kabupaten_selected' => '',
            'kecamatan_selected' => '',
            'kelurahan_selected' => '',
        );
			$this->load->view('pemilikwisata/header');
			$this->load->view('pemilikwisata/tambahDataWisata',$data);
			$this->load->view('pemilikwisata/footer');
		} else {
			echo "<script type='text/javascript'>alert('Akun anda belum di aktivasi admin!!'); document.location='http://localhost/wisatabandung/Pemilik_Wisata/data_wisata' </script>";
		}
		}

		function actiontambahwisata(){
		        $kode_wisata=$_POST['kode_wisata'];
		        $nama_wisata=$_POST['nama_wisata'];
						$latitude=$_POST['latitude'];
						$longitude=$_POST['longitude'];
						$alamat=$_POST['alamat'];
						$deskripsi=$_POST['deskripsi'];
						$kode_kabupaten=$_POST['kabupaten'];
						$kode_kecamatan=$_POST['kecamatan'];
						$kode_kelurahan=$_POST['kelurahan'];
						$id_pemilikwisata = $this->session->userdata('id_pemilikwisata');
		        $data=array(
		            'kode_wisata' => $kode_wisata,
		            'nama_wisata' => $nama_wisata,
								'latitude'=>$latitude,
								'longitude'=>$longitude,
								'alamat'=>$alamat,
								'deskripsi'=>$deskripsi,
								'kode_kabupaten'=>$kode_kabupaten,
								'kode_kecamatan'=>$kode_kecamatan,
								'kode_kelurahan'=>$kode_kelurahan,
								'id_pemilikwisata' => $id_pemilikwisata
		        );
		        $sql=$this->Data_Wisata_Model->insert($data);
						//upload gambar
						if(!empty($_FILES['files']['name'])){
		            $filesCount = count($_FILES['files']['name']);
		            for($i = 0; $i < $filesCount; $i++){
		                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
		                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
		                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
		                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
		                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

		                // File upload configuration
		                $uploadPath = 'uploads/files/';
		                $config['upload_path'] = $uploadPath;
		                $config['allowed_types'] = 'jpg|jpeg|png|gif';
										$config['encrypt_name'] = TRUE;

		                // Load and initialize upload library
		                $this->load->library('upload', $config);
		                $this->upload->initialize($config);

		                // Upload file to server
		                if($this->upload->do_upload('file')){
		                    // Uploaded file data
		                    $fileData = $this->upload->data();
		                    $uploadData[$i]['nama_gambar'] = $fileData['file_name'];
		                    $uploadData[$i]['kode_wisata'] = $kode_wisata;
		                }
		            }

		            if(!empty($uploadData)){
		                // Insert files data into the database
		                $insert = $this->Dbs_CRUD->insert_gambar($uploadData);
		            }
		        }
						//end upload gambar
		        redirect('Pemilik_Wisata/data_wisata','refresh');
		    }

		// untuk edit
 function editwisata($kode_wisata)
		{
			$data_wisata=$this->Data_Wisata_Model->get_by_id($kode_wisata);
				// realnya ambil data dari database, misalnya kita dapatkan data sbb:

				$data = array(
						'data_wisata' => $data_wisata,
						'kabupaten' => $this->Data_Wisata_Model->get_kabupaten(),
						'kecamatan' => $this->Data_Wisata_Model->get_kecamatan(),
						'kelurahan' => $this->Data_Wisata_Model->get_kelurahan(),
						'kabupaten_selected' => $data_wisata->kode_kabupaten,
						'kecamatan_selected' => $data_wisata->kode_kecamatan,
						'kelurahan_selected' => $data_wisata->kode_kelurahan,
				);

				$this->load->view('pemilikwisata/header');
				$this->load->view('pemilikwisata/ubahDataWisata', $data);
				$this->load->view('pemilikwisata/footer');
		}

		public function actioneditwisata()
    {
			$kode_wisata=$_POST['kode_wisata'];
			$nama_wisata=$_POST['nama_wisata'];
			$latitude=$_POST['latitude'];
			$longitude=$_POST['longitude'];
			$alamat=$_POST['alamat'];
			$deskripsi=$_POST['deskripsi'];
			$kode_kabupaten=$_POST['kabupaten'];
			$kode_kecamatan=$_POST['kecamatan'];
			$kode_kelurahan=$_POST['kelurahan'];
			$data=array(
					'kode_wisata' => $kode_wisata,
					'nama_wisata' => $nama_wisata,
					'latitude'=>$latitude,
					'longitude'=>$longitude,
					'alamat'=>$alamat,
					'deskripsi'=>$deskripsi,
					'kode_kabupaten'=>$kode_kabupaten,
					'kode_kecamatan'=>$kode_kecamatan,
					'kode_kelurahan'=>$kode_kelurahan
			);
			$this->Data_Wisata_Model->update($kode_wisata,$data);

			redirect('Pemilik_Wisata/data_wisata','refresh');
    }

		public function hapuswisata($id)
    {
        $row = $this->Data_Wisata_Model->get_by_id($id);

        if ($row) {
            $this->Data_Wisata_Model->hapus($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemilik_Wisata/data_wisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemilik_Wisata/data_wisata'));
        }
    }

}
 ?>
