<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
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
            $config['base_url'] = base_url() . 'fakultas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'fakultas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'fakultas/index.html';
            $config['first_url'] = base_url() . 'fakultas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Fakultas_model->total_rows($q);
        $fakultas = $this->Fakultas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'fakultas_data' => $fakultas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('fakultas/fakultas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Fakultas_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_fakultas' => $row->id_fakultas,
		'nama_fakultas' => $row->nama_fakultas,
		'dekan' => $row->dekan,
	    );
            $this->load->view('fakultas/fakultas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fakultas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('fakultas/create_action'),
	    'id_fakultas' => set_value('id_fakultas'),
	    'nama_fakultas' => set_value('nama_fakultas'),
	    'dekan' => set_value('dekan'),
	);
        $this->load->view('fakultas/fakultas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_fakultas' => $this->input->post('nama_fakultas',TRUE),
		'dekan' => $this->input->post('dekan',TRUE),
	    );

            $this->Fakultas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('fakultas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Fakultas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('fakultas/update_action'),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'nama_fakultas' => set_value('nama_fakultas', $row->nama_fakultas),
		'dekan' => set_value('dekan', $row->dekan),
	    );
            $this->load->view('fakultas/fakultas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fakultas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_fakultas', TRUE));
        } else {
            $data = array(
		'nama_fakultas' => $this->input->post('nama_fakultas',TRUE),
		'dekan' => $this->input->post('dekan',TRUE),
	    );

            $this->Fakultas_model->update($this->input->post('id_fakultas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('fakultas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Fakultas_model->get_by_id($id);

        if ($row) {
            $this->Fakultas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('fakultas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('fakultas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_fakultas', 'nama fakultas', 'trim|required');
	$this->form_validation->set_rules('dekan', 'dekan', 'trim|required');

	$this->form_validation->set_rules('id_fakultas', 'id_fakultas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Fakultas.php */
/* Location: ./application/controllers/Fakultas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-13 23:01:22 */
/* http://harviacode.com */