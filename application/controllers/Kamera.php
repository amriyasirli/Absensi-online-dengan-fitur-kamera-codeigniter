<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kamera extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		if(!$this->session->userdata('nipd')){
            redirect ('Auth');
        }
        
        // ----------------------------
	}

	public function index()
	{
		$this->load->view('kamera');
	}

	public function save()
	{
		$nipd = $this->input->post('nipd', true);
		$nama = $this->input->post('nama', true);
		$id_prodi = $this->input->post('id_prodi', true);
        $id_fakultas = $this->input->post('id_fakultas', true);
        // $keterangan = $this->input->post('keterangan', true);
		$image = $this->input->post('image');
		$image = str_replace('data:image/jpeg;base64,','', $image);
		$image = base64_decode($image);
		$filename = 'image_'.time().'.jpeg';
		file_put_contents(FCPATH.'/uploads/'.$filename,$image);
		$data = array(
			'id_fakultas' => $id_fakultas,
			'id_prodi' => $id_prodi,
			'nipd' => $nipd,
			'nama' => $nama,
            'tanggal' => date('Y-m-d H:i:s'),
            'jam_masuk' => date('H:i:s'),
            'keterangan' => "-",
			'image' => $filename,
			'jumlah' => 1
		);

		// $this->load->model('user');
		$res = $this->db->insert('absen',$data);
		echo json_encode($res);
    }
    
    public function pulang()
	{
        $nipd = $this->input->post('nipd', true);
        $tanggal = date('Y-m-d H:i:s');
        
		$data = array(
			
            'jam_keluar' => date('H:i:s'),
			
		);

        // $this->load->model('user');
        $this->db->where('nipd', $nipd);
        $this->db->where('tanggal <=', $tanggal);
        $this->db->update('absen',$data);
        redirect('Welcome');
		// echo json_encode($res);
	}

}

/* End of file Capture.php */
/* Location: ./application/controllers/Capture.php */