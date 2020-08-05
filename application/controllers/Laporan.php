<?php 
class Laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('Prodi_model');
        $this->load->model('Laporan_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Absen_model');
        $this->load->library('Cetak_pdf');

        if(!$this->session->userdata('nipd')){
            redirect ('Auth');
        }
        
        // ----------------------------

        }
        public function index(){
            if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
                $filter = $_GET['filter']; // Ambil data filder yang dipilih user
    
                if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                    $tgl = $_GET['tanggal'];
                    $ket = 'DATA ABSENSI TANGGAL '.date('d F Y', strtotime($tgl));
                    $url_cetak = 'Laporan/cetak?filter=1&tanggal='.$tgl;
                    $absen = $this->Laporan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Laporan_model
                }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                    $bulan = $_GET['bulan'];
                    $tahun = $_GET['tahun'];
                    $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                    $ket = 'DATA ABSENSI BULAN '.$nama_bulan[$bulan].' '.$tahun;
                    $url_cetak = 'Laporan/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                    $absen = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Laporan_model
                }else{ // Jika filter nya 3 (per tahun)
                    $tahun = $_GET['tahun'];
    
                    $ket = 'DATA ABSENSI TAHUN '.$tahun;
                    $url_cetak = 'Laporan/cetak?filter=3&tahun='.$tahun;
                    $absen = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Laporan_model
                }
            }else{ // Jika user tidak mengklik tombol tampilkan
                $ket = '';
                $url_cetak = 'Laporan/cetak';
                $absen = $this->Laporan_model->view_all(); // Panggil fungsi view_all yang ada di Laporan_model
            }
    
            $data['title'] = 'Laporan';
            $data['ket'] = $ket;
            $data['url_cetak'] = base_url(''.$url_cetak);
            $data['absen'] = $absen;
            $data['option_tahun'] = $this->Laporan_model->option_tahun();
            $data['prodi'] = $this->Prodi_model->get_all();
            // $this->load->view('template/header', $data);
            // $this->load->view('template/topbar', $data);
            // $this->load->view('template/sidebar', $data);
            // $this->load->view('laporan/laporan', $data);
            // $this->load->view('template/footer', $data);
        
            $this->load->view('laporan/laporan', $data);
        }
    
    public function cetak()
	{
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'DATA ABSENSI TANGGAL '.date('d-m-Y', strtotime($tgl));
                $absen = $this->Laporan_model->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di Laporan_model
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                $ket = 'DATA ABSENSI BULAN '.$nama_bulan[$bulan].' '.$tahun;
                $absen = $this->Laporan_model->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di Laporan_model
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $ket = 'DATA ABSENSI TAHUN '.$tahun;
                $absen = $this->Laporan_model->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di Laporan_model
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = '';
            $absen = $this->Laporan_model->view_all(); // Panggil fungsi view_all yang ada di Laporan_model
        }
        $data['ket'] = $ket;
        $data['absen'] = $absen;
        // $prodi = $this->Prodi_model->get_by_id($id);
        $tahun_ajaran = $this->db->get('tahun_ajaran')->result();

  
        foreach ($tahun_ajaran as $row) :
        
         endforeach; 
        // var_dump($prodi);

        $pdf = new FPDF('P', 'mm','A4');

        $pdf->AddPage();

        $pdf->Image(base_url('assets/img/logoiain.jpg'),17,16,20,0,'JPG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,5,'KEMENTERIAN AGAMA REPUBLIK INDONESIA',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,5,'INSTITUT AGAMA ISLAM NEGERI (IAIN) BUKITTINGGI',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,'LABORATORIUM TERPADU (IAIN) BUKITTINGGI',0,1,'C');
        // $pdf->Line(10,$this->GetY(),100,$this->GetY());
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(0,3,'Kampus II : Jalan Gurun Aur Kubang Putih Kab. Agam - Sumatera Barat',0,1,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(0,3,'Email: @iainbukittinggi.ac.id',0,1,'C');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,1,'___________________________________________',0,1,'C');
        $pdf->Cell(10,10,'',0,1);

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,1,'LAPORAN '. $ket,0,1,'C');

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(15);
        // $pdf->Cell(26,6,'Program Studi ',0,0,'L');
        // $pdf->cell(30,6, ' : ', 0,0, 'L');
        // $pdf->Cell(35);
        $pdf->Cell(23,6,'Tahun Ajaran ',0,0,'L');
        $pdf->cell(23,6, ' : '. $row->tahun, 0,1, 'L');
        $pdf->Cell(15);
        // $pdf->Cell(26,6,'Ketua Prodi ',0,0,'L');
        // $pdf->cell(30,6, ' : ', 0,0, 'L');
        // $pdf->Cell(35);
        $pdf->Cell(23,6,'Semester ',0,0,'L');
        $pdf->cell(23,6, ' : '. $row->semester, 0,1, 'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(3);
        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(25,6,'Nidn',1,0,'C');
        $pdf->Cell(40,6,'Nama',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,0,'C');
        $pdf->Cell(20,6,'Masuk',1,0,'C');
        $pdf->Cell(20,6,'Keluar',1,0,'C');
        $pdf->Cell(20,6,'Kehadiran',1,0,'C');
        $pdf->Cell(30,6,'Keterangan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        // $laporan_perprodi  = $this->db->get('dosen')->result();
        // var_dump($laporan_perprodi);
        // $laporan_perkelas = $this->Laporan_model->get()->result();
        $no=1;
        foreach ($data['absen'] as $data){
            $tanggal = date('d-m-Y', strtotime($data->tanggal));
            $pdf->Cell(3);
            $pdf->Cell(7,6,$no,1,0);
            $pdf->Cell(25,6,$data->nipd,1,0);
            $pdf->Cell(40,6,$data->nama,1,0);
            $pdf->Cell(20,6,$tanggal,1,0, 'C');
            $pdf->Cell(20,6,$data->jam_masuk,1,0, 'C');
            $pdf->Cell(20,6,$data->jam_keluar,1,0, 'C');
            $pdf->Cell(20,6,$data->kehadiran.' kali',1,0, 'C');
            $pdf->Cell(30,6,$data->keterangan,1,1, 'C');
            $no++;
        }
        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        // $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(95);
        $pdf->Cell(0,5,'Bukittinggi, '. date('d F Y'),0,1,'C');
        $pdf->Cell(95);
        // $pdf->Cell(0,5,'Guru Mata Pelajaran',0,1,'C');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(95);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,4,'',0,1,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(95);
        $pdf->Cell(0,4,'NIP. ',0,1,'C');
        $pdf->Output();
    }
    

    public function laporan_perprodi()
    {    
        $data['title'] = 'Laporan Perprodi';
		$data['prodi'] = $this->Prodi_model->get_all();
            // $this->load->view('template/header', $data);
            // $this->load->view('template/topbar', $data);
            // $this->load->view('template/sidebar', $data);
            $this->load->view('laporan/laporan_perprodi', $data);
            // $this->load->view('template/footer', $data);
    }
    
    public function perprodi ($id)
    {
        $prodi = $this->Prodi_model->get_by_id($id);
        $tahun_ajaran = $this->db->get('tahun_ajaran')->result();

  
        foreach ($tahun_ajaran as $row) :
        
         endforeach; 
        // var_dump($prodi);
        $pdf = new FPDF('P', 'mm','A4');

        $pdf->AddPage();

        $pdf->Image(base_url('assets/img/logoiain.jpg'),17,16,20,0,'JPG');
        // $pdf->Image(base_url('assets/img/logosumbar.png'),171,16,22,0,'PNg');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,5,'KEMENTERIAN AGAMA REPUBLIK INDONESIA',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,5,'INSTITUT AGAMA ISLAM NEGERI (IAIN) BUKITTINGGI',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,'LABORATORIUM TERPADU (IAIN) BUKITTINGGI',0,1,'C');
        // $pdf->Line(10,$this->GetY(),100,$this->GetY());
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(0,3,'Kampus II : Jalan Gurun Aur Kubang Putih Kab. Agam - Sumatera Barat',0,1,'C');
        $pdf->SetFont('Arial','',8);
        $pdf->Cell(0,3,'Email: @iainbukittinggi.ac.id',0,1,'C');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(0,1,'___________________________________________',0,1,'C');
        $pdf->Cell(10,10,'',0,1);

        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,1,'LAPORAN ABSENSI DOSEN',0,1,'C');

        $pdf->SetFont('Arial','',10);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(15);
        $pdf->Cell(26,6,'Program Studi ',0,0,'L');
        $pdf->cell(30,6, ' : '. $prodi->nama_prodi, 0,0, 'L');
        $pdf->Cell(51);
        $pdf->Cell(23,6,'Tahun Ajaran ',0,0,'L');
        $pdf->cell(23,6, ' : '. $row->tahun, 0,1, 'L');
        $pdf->Cell(15);
        $pdf->Cell(26,6,'Ketua Prodi ',0,0,'L');
        $pdf->cell(30,6, ' : '. $prodi->kajur, 0,0, 'L');
        $pdf->Cell(51);
        $pdf->Cell(23,6,'Semester ',0,0,'L');
        $pdf->cell(23,6, ' : '. $row->semester, 0,1, 'L');
        $pdf->Cell(10,5,'',0,1);
        $pdf->Cell(5);
        $pdf->Cell(7,6,'No',1,0,'C');
        $pdf->Cell(25,6,'Nidn',1,0,'C');
        $pdf->Cell(40,6,'Nama',1,0,'C');
        $pdf->Cell(20,6,'Tanggal',1,0,'C');
        $pdf->Cell(20,6,'Masuk',1,0,'C');
        $pdf->Cell(20,6,'Keluar',1,0,'C');
        $pdf->Cell(30,6,'Keterangan',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $laporan_perprodi  = $this->Absen_model->perprodi($id)->result();
        // var_dump($laporan_perprodi);
        
        $no=1;
        foreach ($laporan_perprodi as $data){
            $tanggal = date('d-m-Y', strtotime($data->tanggal));
            $pdf->Cell(5);
            $pdf->Cell(7,6,$no,1,0);
            $pdf->Cell(25,6,$data->nipd,1,0);
            $pdf->Cell(40,6,$data->nama,1,0);
            $pdf->Cell(20,6,$tanggal,1,0, 'C');
            $pdf->Cell(20,6,$data->jam_masuk,1,0, 'C');
            $pdf->Cell(20,6,$data->jam_keluar,1,0, 'C');
            $pdf->Cell(30,6,$data->keterangan,1,1, 'C');
            $no++;
        }

        $pdf->AcceptPageBreak();
        $pdf->Cell(10,10,'',0,1);
        // $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(95);
        $pdf->Cell(0,5,'Bukittinggi, '. date('d F Y'),0,1,'C');
        $pdf->Cell(95);
        // $pdf->Cell(0,5,'Guru Mata Pelajaran',0,1,'C');
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(95);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(0,4,$prodi->kajur,0,1,'C');
        $pdf->SetFont('Arial','',11);
        $pdf->Cell(95);
        $pdf->Cell(0,4,'NIP. '.$prodi->nidn,0,1,'C');
        $pdf->Output();
    }
    
}
?>