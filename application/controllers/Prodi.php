<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prodi_model');
        $this->load->model('Fakultas_model');
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
            $config['base_url'] = base_url() . 'prodi/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'prodi/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'prodi/index.html';
            $config['first_url'] = base_url() . 'prodi/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Prodi_model->total_rows($q);
        $prodi = $this->Prodi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'prodi_data' => $prodi,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('prodi/prodi_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_prodi' => $row->id_prodi,
        'id_fakultas' => $row->id_fakultas,
        'nama_fakultas' => $row->nama_fakultas,
        'nama_prodi' => $row->nama_prodi,
        'nidn' => $row->nidn,
		'kajur' => $row->kajur,
	    );
            $this->load->view('prodi/prodi_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('prodi/create_action'),
	    'id_prodi' => set_value('id_prodi'),
        'id_fakultas' => set_value('id_fakultas'),
        'nama_fakultas' => set_value('nama_fakultas'),
        'nama_prodi' => set_value('nama_prodi'),
        'nidn' => set_value('nidn'),
	    'kajur' => set_value('kajur'),
    );
        $data['fakultas'] = $this->Fakultas_model->get_all();
        $this->load->view('prodi/prodi_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_fakultas' => $this->input->post('fakultas',TRUE),
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
        'kajur' => $this->input->post('kajur',TRUE),
        'nidn' => $this->input->post('nidn',TRUE),
	    );

            $this->Prodi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('prodi'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prodi/update_action'),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
        'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
        'nama_fakultas' => set_value('nama_fakultas', $row->nama_fakultas),
		'nama_prodi' => set_value('nama_prodi', $row->nama_prodi),
        'kajur' => set_value('kajur', $row->kajur),
        'nidn' => set_value('nidn', $row->nidn),
        );
            $data['fakultas'] = $this->Fakultas_model->get_all();
            $this->load->view('prodi/prodi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_prodi', TRUE));
        } else {
            $data = array(
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'nama_prodi' => $this->input->post('nama_prodi',TRUE),
        'kajur' => $this->input->post('kajur',TRUE),
        'nidn' => $this->input->post('nidn',TRUE),
	    );

            $this->Prodi_model->update($this->input->post('id_prodi', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('prodi'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Prodi_model->get_by_id($id);

        if ($row) {
            $this->Prodi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('prodi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prodi'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_prodi', 'nama prodi', 'trim|required');
    $this->form_validation->set_rules('kajur', 'kajur', 'trim|required');
    $this->form_validation->set_rules('nidn', 'nidn', 'trim|required');

	$this->form_validation->set_rules('id_prodi', 'id_prodi', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Prodi.php */
/* Location: ./application/controllers/Prodi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-13 23:01:22 */
/* http://harviacode.com */