<?php 
/**
 * 
 */
class Admin_Dinas extends CI_Controller
{
	public function __construct(){
    	parent::__construct();
    	// Codeigniter : Write Less Do More
    	$this->load->model('Dbs_Dinas');
        $this->load->model('Dbs_CRUD');
        $this->load->model('Dbs_pw');
         $this->load->model('Data_Wisata_Model');
    	$this->load->helper('url');
        if ($this->session->userdata('status')!='admin_dinas') {
            redirect(base_url()."Login");
        }
    }	

    function index(){
        if ($this->session->userdata('status')!='admin_dinas') {
            redirect(base_url()."Login/login_admin_dinas");
        } else {
             $this->load->view('admindinas/header');
        $this->load->view('admindinas/home');
        $this->load->view('admindinas/footer');
        }
    }

    function data_wisata(){
            $data_wisata=$this->Data_Wisata_Model->get_wisata_aktif();
            $data = array(
                'data_wisata' => $data_wisata , );
            $this->load->view('admindinas/header');
            $this->load->view('admindinas/tampilDataWisata',$data);
            $this->load->view('admindinas/footer');
    }

    function pemilik_wisata_aktif(){
        // $nip=$this->session->userdata('nip');
        // $data['pemilik_wisata']=$this->Dbs_Dinas->getDataKotabandung($nip);
        $data['pemilik_wisata']=$this->Dbs_Dinas->getpw_aktif()->result();
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/dataPemilikwisata',$data);
        $this->load->view('admindinas/footer');
    }
    function pemilik_wisata_nonaktif(){
        // $nip=$this->session->userdata('nip');
        // $data['pemilik_wisata']=$this->Dbs_Dinas->getDataKotabandung($nip);
        $data['pemilik_wisata']=$this->Dbs_Dinas->getpw_nonaktif()->result();
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/dataPemilikwisata',$data);
        $this->load->view('admindinas/footer');
    }

    function vTambahPemilikwisata(){
        $data['admin_dinas']=$this->Dbs_Dinas->getDinas()->result();
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/tambahPemilikwisata',$data);
        $this->load->view('admindinas/footer');
    }

    function pTambahpemilikwisata(){
        $nama=$_POST['nama'];
        $nip=$_POST['NIP'];
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
            'NIP' => $nip,
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
            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Pemilik Wisata'); document.location='http://localhost/wisatabandung/Admin_Dinas/Pemilik_Wisata' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Berhasil Menambahkan Pemilik Wisata'); document.location='http://localhost/wisatabandung/Admin_Dinas/vTambahPemilikwisata' </script>";
            
        }
    }

    function vUpdatepemilikwisata($id){
        $get=$this->Dbs_Dinas->getByemail($id);
        $data=array(
            'nama' => $get->nama,
            'noktp' => $get->noktp,
            'password' => $get->password,
            'email' => $get->email,
            'alamat' => $get->alamat,
            'tempat' => $get->tempat,
            'tgl_lahir' => $get->tgl_lahir,
            'foto_ktp' => $get->foto_ktp
        );
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/vUpdatepemilikwisata',$data);
        $this->load->view('admindinas/footer');
    }

    function pUpdatepemilikwisata(){
        $email=$_POST['email'];
        $nama=$_POST['nama'];
        $nip=$_POST['NIP'];
        $noktp=$_POST['noktp'];
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
            'NIP' => $nip,
            'noktp' => $noktp,
            'password' => $password,
            'alamat' => $alamat,
            'tempat' => $tempat,
            'tgl_lahir' => $tgl_lahir,
            'foto_ktp' => $foto_ktp
        );
        $sql=$this->Dbs_CRUD->update($data,'pemilik_wisata','email',$email);        
        echo "<script type='text/javascript'>alert('Data Berhasil Diubah'); document.location='http://localhost/wisatabandung/Admin_Dinas/Pemilik_Wisata' </script>";  
    }

    function aktifPw($id_pemilikwisata){
        $nip=$this->session->userdata('nip');
        $data1 = $this->Dbs_Dinas->cekNip($id_pemilikwisata)->row();
        $ceknip=$data1->NIP;
        $data=array(
            'nip' => $nip
        );
        
        if (empty($ceknip)){
            $sql=$this->Dbs_CRUD->update($data,'pemilik_wisata','id_pemilikwisata',$id_pemilikwisata);
            if ($sql) {
            echo "<script type='text/javascript'>alert('Pemilik Wisata Berhasil diaktifasi'); document.location='http://localhost/wisatabandung/Admin_Dinas/pemilik_wisata_aktif' </script>";
            } else{
           echo "<script type='text/javascript'>alert('Pemilik Wisata Gagal diaktifasi'); document.location='http://localhost/wisatabandung/Admin_Dinas/pemilik_wisata_nonaktif' </script>";
            }
        }else if (!empty($ceknip)) {
            $sql=$this->Dbs_pw->non_aktif($id_pemilikwisata);
            if ($sql) {
            echo "<script type='text/javascript'>alert('Pemilik Wisata Berhasil nonaktif'); document.location='http://localhost/wisatabandung/Admin_Dinas/pemilik_wisata_nonaktif' </script>";
            }else{
            echo "<script type='text/javascript'>alert('Pemilik Wisata Gagal nonaktif'); document.location='http://localhost/wisatabandung/Admin_Dinas/pemilik_wisata_aktif' </script>";

            }
        }
    }

    function vhapus_pemilik_wisata($id){
        $get=$this->Dbs_Dinas->getByemail($id);
        $data=array(
            'nama' => $get->nama,
            'noktp' => $get->noktp,
            'password' => $get->password,
            'email' => $get->email,
            'alamat' => $get->alamat,
            'tempat' => $get->tempat,
            'tgl_lahir' => $get->tgl_lahir,
            'foto_ktp' => $get->foto_ktp,
            'dihapus' => $get->dihapus
        );
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/v_Hapuspm',$data);
        $this->load->view('admindinas/footer');
    }

    function pHapuspemilikwisata(){
        $email=$_POST['email'];
        $dihapus=$_POST['dihapus'];
        $data=array(
            'dihapus' => $dihapus
        );
        $sql=$this->Dbs_CRUD->update($data,'pemilik_wisata','email',$email);    
        if($dihapus == 'Y'){
            echo "<script type='text/javascript'>alert('Data Berhasil Dihapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/Pemilik_Wisata' </script>";  
        }else{
            echo "<script type='text/javascript'>alert('Data Berhasil Direstore'); document.location='http://localhost/wisatabandung/Admin_Dinas/Pemilik_Wisata' </script>"; 
        }
                  
    }

    function tambahwisata()
        {
            $data = array(
            'kabupaten' => $this->Dbs_CRUD->get_kabupaten(),
            'kecamatan' => $this->Dbs_CRUD->get_kecamatan(),
            'kelurahan' => $this->Dbs_CRUD->get_kelurahan(),
            'kabupaten_selected' => '',
            'kecamatan_selected' => '',
            'kelurahan_selected' => '',
        );
            $this->load->view('admindinas/header');
            $this->load->view('admindinas/tambahDataWisata',$data);
            $this->load->view('admindinas/footer');
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
        public function editwisata($kode_wisata)
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

                $this->load->view('admindinas/header');
                $this->load->view('admindinas/ubahDataWisata', $data);
                $this->load->view('admindinas/footer');
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
            $this->Data_Wisata_Model->nonaktif($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Pemilik_Wisata/data_wisata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Pemilik_Wisata/data_wisata'));
        }
    } 

    function data_kecamatan(){
        $kode_kabupaten=$this->session->userdata('kode_kabupaten');
        $data['kecamatan']=$this->Dbs_Dinas->get_kec($kode_kabupaten)->result();
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/dataKecamatan',$data);
        $this->load->view('admindinas/footer');
    }

    function tambah_kecamatan(){
        $kode_kabupaten=$this->session->userdata('kode_kabupaten');
        // $get=$this->Dbs_Dinas->get_kec($kode_kabupaten)->row();
        // $data=array(
        //     'kode_kecamatan' => $get->kode_kecamatan,
        //     'nama_kecamatan' => $get->nama_kecamatan,
        //     'kode_kabupaten' => $get->kode_kabupaten
        // );
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/tambahKecamatan',$kode_kabupaten);
        $this->load->view('admindinas/footer');
    }

    function createKec(){
        $nama_kecamatan=$_POST['nama_kecamatan'];
        $kode_kabupaten=$_POST['kode_kabupaten'];
        $data=array(
            'nama_kecamatan' => $nama_kecamatan,
            'kode_kabupaten' =>$kode_kabupaten
        );
        $sql=$this->Dbs_CRUD->insert($data,'kecamatan');
        if ($sql) {
            echo "<script type='text/javascript'>alert('Data Kecamatan Berhasil Ditambhakan'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal Ditambhakan'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }
    }   

    function vUpdateKec($kode_kecamatan){
        $get = $this->Dbs_CRUD->getbykdkec($kode_kecamatan);
        $data=array(
            'kode_kecamatan' => $get->kode_kecamatan,
            'nama_kecamatan' => $get->nama_kecamatan,
            'kode_kabupaten' => $get->kode_kabupaten
        );
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/vUpdatekecamatan',$data);
        $this->load->view('admindinas/footer');
    }

    function pUpdatekec(){
        $kode_kecamatan=$_POST['kode_kecamatan'];
        $nama_kecamatan=$_POST['nama_kecamatan'];
        $kode_kabupaten=$_POST['kode_kabupaten'];
        $data=array(
            'nama_kecamatan' => $nama_kecamatan,
            'kode_kabupaten' =>$kode_kabupaten
        );
        $sql=$this->Dbs_CRUD->update($data,'kecamatan','kode_kecamatan',$kode_kecamatan);
        if ($sql) {
            echo "<script type='text/javascript'>alert('Data Kecamatan Berhasil Diubah'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Gagal Ditambhakan'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }
    }

    function pDeletekec($kode_kecamatan){
        $kode_kabupaten=$this->session->userdata('kode_kabupaten');
        $data1 = $this->Dbs_Dinas->cekHapuskec($kode_kecamatan)->row();
        $cekhapus=$data1->dihapus;
        $hapus='Y';
        $data=array(
            'dihapus' => $hapus
        );
        $sql=$this->Dbs_CRUD->update($data,'kecamatan','kode_kecamatan',$kode_kecamatan);
        if ($cekhapus == 'Y'){
            echo "<script type='text/javascript'>alert('Data kecamatan Sudah hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }else if ($sql) {
            echo "<script type='text/javascript'>alert('Data kecamatan Berhasil hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }else{
           echo "<script type='text/javascript'>alert('Data kecamatan Gagal hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
        }
    }

    function data_kelurahan(){
        $kode_kabupaten=$this->session->userdata('kode_kabupaten');
        $data['kelurahan']=$this->Dbs_Dinas->getkel($kode_kabupaten)->result();
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/dataKelurahan',$data);
        $this->load->view('admindinas/footer');
    }

    function tambah_kelurahan(){
        $kode_kabupaten=$this->session->userdata('kode_kabupaten');
        $get=$this->Dbs_Dinas->getkell($kode_kabupaten);
        $data=array(
            'kode_kabupaten' => $kode_kabupaten,
            'get' => $get
        );
        // $get=$this->Dbs_Dinas->get_kec($kode_kabupaten)->row();
        // $data=array(
        //     'kode_kecamatan' => $get->kode_kecamatan,
        //     'nama_kecamatan' => $get->nama_kecamatan,
        //     'kode_kabupaten' => $get->kode_kabupaten
        // );
        $this->load->view('admindinas/header');
       $this->load->view('admindinas/tambahKelurahan',$data);
       $this->load->view('admindinas/footer');
    }

    function createKel(){
        $nama_kelurahan=$_POST['nama_kelurahan'];
        $kode_kecamatan=$_POST['kode_kecamatan'];
        $data=array(
            'nama_kelurahan' => $nama_kelurahan,
            'kode_kecamatan' =>$kode_kecamatan
        );
        $sql=$this->Dbs_CRUD->insert($data,'kelurahan');
        if ($sql) {
            echo "<script type='text/javascript'>alert('Data Kelurahan Berhasil Ditambhakan'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Kelurahan Gagal Ditambhakan'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }
    }   

    function vUpdateKel($kode_kelurahan){
        $get = $this->Dbs_CRUD->getbykdkel($kode_kelurahan);
        $data=array(
            'kode_kelurahan' => $get->kode_kelurahan,
            'nama_kelurahan' => $get->nama_kelurahan,
            'kode_kecamatan' => $get->kode_kecamatan
        );
        $this->load->view('admindinas/header');
        $this->load->view('admindinas/vUpdatekelurahan',$data);
        $this->load->view('admindinas/footer');
    }

    function pUpdatekel(){
        $kode_kelurahan=$_POST['kode_kelurahan'];
        $nama_kelurahan=$_POST['nama_kelurahan'];
        $kode_kecamatan=$_POST['kode_kecamatan'];
        $data=array(
            'nama_kelurahan' => $nama_kelurahan,
        );
        $sql=$this->Dbs_CRUD->update($data,'kelurahan','kode_kelurahan',$kode_kelurahan);
        if ($sql) {
            echo "<script type='text/javascript'>alert('Data Kelurahan Berhasil Diubah'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }else{
            echo "<script type='text/javascript'>alert('Data Kelurahan Gagal Diubah'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }
    }

    function pDeletekel($kode_kelurahan){
        $kode_kabupaten=$this->session->userdata('kode_kelurahan');
        $data1 = $this->Dbs_Dinas->cekHapuskel($kode_kelurahan)->row();
        $cekhapus=$data1->dihapus;
        $hapus='Y';
        $data=array(
            'dihapus' => $hapus
        );
        $sql=$this->Dbs_CRUD->update($data,'kelurahan','kode_kelurahan',$kode_kelurahan);
        if ($cekhapus == 'Y'){
            echo "<script type='text/javascript'>alert('Data kelurahan Sudah hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }else if ($sql) {
            echo "<script type='text/javascript'>alert('Data kelurahan Berhasil hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }else{
           echo "<script type='text/javascript'>alert('Data kelurahan Gagal hapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kelurahan' </script>";
        }
    }    

    function deleteKel($kdkec){
        $this->Dbs_CRUD->delete('kode_kecamatan',$kdkec,'kecamatan');
        echo "<script type='text/javascript'>alert('Berhasil Dihapus'); document.location='http://localhost/wisatabandung/Admin_Dinas/data_kecamatan' </script>";
    }    

}
 ?>