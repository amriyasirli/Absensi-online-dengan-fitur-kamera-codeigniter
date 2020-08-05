<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->model('Fakultas_model');
        $this->load->model('Prodi_model');
        $this->load->library('form_validation');

        if(!$this->session->userdata('nipd')){
            redirect ('Auth');
        }
        
        // ----------------------------
    }

    public function index()
    {
        // $q = urldecode($this->input->get('q', TRUE));
        // $start = intval($this->input->get('start'));
        
        // if ($q <> '') {
        //     $config['base_url'] = base_url() . 'dosen/index.html?q=' . urlencode($q);
        //     $config['first_url'] = base_url() . 'dosen/index.html?q=' . urlencode($q);
        // } else {
        //     $config['base_url'] = base_url() . 'dosen/index.html';
        //     $config['first_url'] = base_url() . 'dosen/index.html';
        // }

        // $config['per_page'] = 10;
        // $config['page_query_string'] = TRUE;
        // $config['total_rows'] = $this->Dosen_model->total_rows($q);
        // $dosen = $this->Dosen_model->get_limit_data($config['per_page'], $start, $q);

        // $this->load->library('pagination');
        // $this->pagination->initialize($config);

        // $data = array(
        //     'dosen_data' => $dosen,
        //     'q' => $q,
        //     'pagination' => $this->pagination->create_links(),
        //     'total_rows' => $config['total_rows'],
        //     'start' => $start,
        // );
        $dosen['dosen_data']= $this->Dosen_model->get_all();
        $this->load->view('dosen/dosen_list', $dosen);
    }

    public function read($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'nipd' => $row->nipd,
		'nama' => $row->nama,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jabatan' => $row->jabatan,
		'gelar' => $row->gelar,
		'keahlian' => $row->keahlian,
		'nama_prodi' => $row->nama_prodi,
		'nama_fakultas' => $row->nama_fakultas,
		'role' => $row->role,
	    );
            $this->load->view('dosen/dosen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('dosen/create_action'),
	    'nipd' => set_value('nipd'),
	    'nama' => set_value('nama'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jabatan' => set_value('jabatan'),
	    'gelar' => set_value('gelar'),
        'keahlian' => set_value('keahlian'),
        'id_prodi' => set_value('id_prodi'),
        'nama_prodi' => set_value('nama_prodi'),
        'id_fakultas' => set_value('id_fakultas'),
	    'nama_fakultas' => set_value('nama_fakultas'),
	    'role' => set_value('role'),
    );
        $data['fakultas'] = $this->Fakultas_model->get_all();
        $data['prodi'] = $this->Prodi_model->get_all();
        $this->load->view('dosen/dosen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'nipd' => $this->input->post('id', TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'gelar' => $this->input->post('gelar',TRUE),
		'keahlian' => $this->input->post('keahlian',TRUE),
		'id_prodi' => $this->input->post('prodi',TRUE),
		'id_fakultas' => $this->input->post('fakultas',TRUE),
		'role' => $this->input->post('role',TRUE)
	    );

            $this->Dosen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('dosen/update_action'),
		'nipd' => set_value('nipd', $row->nipd),
		'nama' => set_value('nama', $row->nama),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jabatan' => set_value('jabatan', $row->jabatan),
		'gelar' => set_value('gelar', $row->gelar),
        'keahlian' => set_value('keahlian', $row->keahlian),
        'id_prodi' => set_value('id_prodi', $row->id_prodi),
        'nama_prodi' => set_value('nama_prodi', $row->nama_prodi),
        'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'nama_fakultas' => set_value('nama_fakultas', $row->nama_fakultas),
		'role' => set_value('role', $row->role),
        );
            $data['fakultas'] = $this->Fakultas_model->get_all();
            $data['prodi'] = $this->Prodi_model->get_all();
            $this->load->view('dosen/dosen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('nipd', TRUE));
        } else {
            $data = array(
        'nipd' => $this->input->post('nipd',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jabatan' => $this->input->post('jabatan',TRUE),
		'gelar' => $this->input->post('gelar',TRUE),
		'keahlian' => $this->input->post('keahlian',TRUE),
		'id_prodi' => $this->input->post('prodi',TRUE),
		'id_fakultas' => $this->input->post('fakultas',TRUE),
		'role' => $this->input->post('role',TRUE),
	    );

            $this->Dosen_model->update($this->input->post('nipd', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('dosen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Dosen_model->get_by_id($id);

        if ($row) {
            $this->Dosen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('dosen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('dosen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jabatan', 'jabatan', 'trim|required');
	$this->form_validation->set_rules('gelar', 'gelar', 'trim|required');
	$this->form_validation->set_rules('keahlian', 'keahlian', 'trim|required');
	$this->form_validation->set_rules('role', 'role', 'trim|required');

	// $this->form_validation->set_rules('nipd', 'nipd', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Dosen.php */
/* Location: ./application/controllers/Dosen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-13 23:01:22 */
/* http://harviacode.com */