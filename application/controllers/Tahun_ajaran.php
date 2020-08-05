<?php 
class Tahun_ajaran extends CI_Controller {

    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('nipd')){
            redirect ('Auth');
        }
        
        // ----------------------------
        
        }
    public function index ()
    {
        //..
    }
    
    public function create ()
    {
        $data = [
            'tahun' => $this->input->post('tahun'),
            'semester' => $this->input->post('semester')
        ];

        $this->db->update('tahun_ajaran', $data);
        $this->session->set_flashdata('pesan', '<div class="alert bg-teal" role="alert">Data tahun ajaran dan semester berhasil di tambah !</div>');
        redirect('Welcome');
    }
    
    public function edit ()
    {
        //..
    }
    
    public function delete ()
    {
        //..
    }
    
}
?>