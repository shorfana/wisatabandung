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
    	$id_pemilikwisata=$this->session->userdata('id_pemilikwisata');
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

        $sql=$this->Dbs_CRUD->update($data,'pemilik_wisata','id_pemilikwisata',$id_pemilikwisata);
        if ($sql) {
        	echo "<script type='text/javascript'>alert('Profil Kamu Berhasil Diubah'); document.location='http://localhost/wisatabandung/pemilik_wisata/' </script>";
        }else {
        	echo "<script type='text/javascript'>alert('Profil Kamu Gagal Diubah'); document.location='http://localhost/wisatabandung/pemilik_wisata/' </script>";
        }

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


			redirect('Pemilik_Wisata/data_wisata','refresh');
    }

		public function hapuswisata($id)
    {
        $row = $this->Data_Wisata_Model->get_by_id($id);

        if ($row) {
            $this->Data_Wisata_Model->hapus($id);
            echo "<script type='text/javascript'>alert('Data Wisata Berhasil Dihapus'); document.location='http://localhost/wisatabandung/Pemilik_Wisata/data_wisata' </script>";
        } else {
            echo "<script type='text/javascript'>alert('Data Wisata Gagal Dihapus'); document.location='http://localhost/wisatabandung/Pemilik_Wisata/data_wisata' </script>";
        }
    }

		public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Kelompok 3 ATOL')
							   ->setLastModifiedBy('Kelompok 3 ATOL')
							   ->setTitle("Data Wisata")
							   ->setSubject("Pemilik Wisata")
							   ->setDescription("Laporan Semua Data Wisata")
							   ->setKeywords("Data Wisata");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA WISATA"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:G1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "No");
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "Nama Wisata"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "Latitude"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "Longitude"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "Alamat"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "Nama Kelurahan");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "Nama Kecamatan");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "Nama Kabupaten/Kota");// Set kolom E3 dengan tulisan "ALAMAT"

		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);

		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$datawisata = $this->Data_Wisata_Model->get_wisata_export();

		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($datawisata as $data){ // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->nama_wisata);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->latitude);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->longitude);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->nama_kelurahan);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->nama_kecamatan);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->nama_kabupaten);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);

			$no++; // Tambah 1 setiap kali looping
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(50); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Wisata");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Wisata.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

}
 ?>
