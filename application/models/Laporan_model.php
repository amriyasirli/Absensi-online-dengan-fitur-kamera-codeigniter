<?php 
class Laporan_model extends CI_Model { 

    public function view_by_date($date){
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
        $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
		return $this->db->get('absen')->result();// Tampilkan data absen sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
        $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        
		return $this->db->get('absen')->result(); // Tampilkan data absen sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
		return $this->db->get('absen')->result(); // Tampilkan data absen sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
		$this->db->get('absen')->result(); // Tampilkan semua data absen
	}
    
    public function option_tahun(){
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tanggal
        $this->db->from('absen'); // select ke tabel absen
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tanggal
        
        return $this->db->get()->result(); // Ambil data pada tabel absen sesuai kondisi diatas
    }

    public function laporan_perprodi ()
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->distinct();
        // $this->db->order_by('nipd', 'DESC');
        return $this->db->get('dosen')->result();
    }
 }
?>