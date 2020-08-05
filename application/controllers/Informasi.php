<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Informasi_model');
        $this->load->library('form_validation');
        if(!$this->session->userdata('nipd')){
            redirect ('Auth');
        }
        
        // ----------------------------
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'informasi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'informasi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'informasi/index.html';
            $config['first_url'] = base_url() . 'informasi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Informasi_model->total_rows($q);
        $informasi = $this->Informasi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'informasi_data' => $informasi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('informasi/informasi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Informasi_model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_informasi' => $row->id_informasi,
        'nama' => $row->nama,
		'informasi' => $row->informasi,
		'tanggal' => $row->tanggal,
	    );
            $this->load->view('informasi/informasi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('informasi/create_action'),
        'id_informasi' => set_value('id_informasi'),
        'nama' => set_value('nama'),
	    'informasi' => set_value('informasi'),
	    'tanggal' => set_value('tanggal'),
	);
        $this->load->view('informasi/informasi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'informasi' => $this->input->post('informasi',TRUE),
                'tanggal' => date('d F Y'),
	    );

            $this->Informasi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('informasi');
        }
    }
    
    public function update($id) 
    {
        $row = $this->Informasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('informasi/update_action'),
        'id_informasi' => set_value('id_informasi', $row->id_informasi),
        'nama' => set_value('nama', $row->nama),
		'informasi' => set_value('informasi', $row->informasi),
		'tanggal' => set_value('tanggal', $row->tanggal),
	    );
            $this->load->view('informasi/informasi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_informasi', TRUE));
        } else {
            $data = array(
                'nama' => $this->input->post('nama',TRUE),
                'informasi' => $this->input->post('informasi',TRUE),
                'tanggal' => date('d F Y')
	    );

            $this->Informasi_model->update($this->input->post('id_informasi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('informasi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Informasi_model->get_by_id($id);

        if ($row) {
            $this->Informasi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('informasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('informasi'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	$this->form_validation->set_rules('informasi', 'informasi', 'trim|required');
	// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');

	$this->form_validation->set_rules('id_informasi', 'id_informasi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Informasi.php */
/* Location: ./application/controllers/Informasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-13 23:01:22 */
/* http://harviacode.com */