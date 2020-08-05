<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Absen_model');
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
            $config['base_url'] = base_url() . 'absen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'absen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'absen/index.html';
            $config['first_url'] = base_url() . 'absen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Absen_model->total_rows($q);
        $absen = $this->Absen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'absen_data' => $absen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['absen'] = $this->Absen_model->get_all();
        $this->load->view('absen/absen_list', $data);
    }

    public function absen_masuk ()
    {
        $this->load->view('absen/ambil_absen');
    }

    public function absen_pulang ()
    {
        $this->load->view('absen/absen_pulang');
    }

    public function keterangan ()
    {
        $nipd = $this->input->post('nipd');
        $fakultas = $this->input->post('id_fakultas');
        $prodi = $this->input->post('id_prodi');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'nipd' => $nipd,
            'id_fakultas' =>$fakultas,
            'id_prodi' => $prodi,
            'tanggal' => date('d-m-Y'),
            'jam_masuk' => "-",
            'jam_keluar' => "-",
            'image' => "-",
            'keterangan' => $keterangan
        ];

        $this->Absen_model->insert($data);
        $this->session->set_flashdata('pesan', '<div class="alert bg-teal" role="alert">Keterangan berhasil di submit !</div>');
        redirect('Welcome');
    }

    public function read($id) 
    {
        $row = $this->Absen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_absen' => $row->id_absen,
		'id_fakultas' => $row->id_fakultas,
		'id_prodi' => $row->id_prodi,
		'nipd' => $row->nipd,
		'tanggal' => $row->tanggal,
		'jam_masuk' => $row->jam_masuk,
		'jam_keluar' => $row->jam_keluar,
		'keterangan' => $row->keterangan,
	    );
            $this->load->view('absen/absen_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('absen/create_action'),
	    'id_absen' => set_value('id_absen'),
	    'id_fakultas' => set_value('id_fakultas'),
	    'id_prodi' => set_value('id_prodi'),
	    'nipd' => set_value('nipd'),
	    'tanggal' => set_value('tanggal'),
	    'jam_masuk' => set_value('jam_masuk'),
	    'jam_keluar' => set_value('jam_keluar'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->load->view('absen/absen_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'nipd' => $this->input->post('nipd',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jam_masuk' => $this->input->post('jam_masuk',TRUE),
		'jam_keluar' => $this->input->post('jam_keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Absen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('absen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Absen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('absen/update_action'),
		'id_absen' => set_value('id_absen', $row->id_absen),
		'id_fakultas' => set_value('id_fakultas', $row->id_fakultas),
		'id_prodi' => set_value('id_prodi', $row->id_prodi),
		'nipd' => set_value('nipd', $row->nipd),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jam_masuk' => set_value('jam_masuk', $row->jam_masuk),
		'jam_keluar' => set_value('jam_keluar', $row->jam_keluar),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->load->view('absen/absen_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_absen', TRUE));
        } else {
            $data = array(
		'id_fakultas' => $this->input->post('id_fakultas',TRUE),
		'id_prodi' => $this->input->post('id_prodi',TRUE),
		'nipd' => $this->input->post('nipd',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jam_masuk' => $this->input->post('jam_masuk',TRUE),
		'jam_keluar' => $this->input->post('jam_keluar',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Absen_model->update($this->input->post('id_absen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('absen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Absen_model->get_by_id($id);

        if ($row) {
            $this->Absen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('absen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('absen'));
        }
    }

    public function reset ()
    {
        $this->db->empty_table('absen');
        $data = [
            'kehadiran' => 0,
        ];
        $this->db->update('dosen', $data);
        redirect('Welcome');
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_fakultas', 'id fakultas', 'trim|required');
	$this->form_validation->set_rules('id_prodi', 'id prodi', 'trim|required');
	$this->form_validation->set_rules('nipd', 'nipd', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jam_masuk', 'jam masuk', 'trim|required');
	$this->form_validation->set_rules('jam_keluar', 'jam keluar', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_absen', 'id_absen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Absen.php */
/* Location: ./application/controllers/Absen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-13 23:01:22 */
/* http://harviacode.com */