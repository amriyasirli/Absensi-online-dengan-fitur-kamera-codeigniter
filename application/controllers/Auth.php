<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

    }

    public function index()
    {
        $this->form_validation->set_rules('nipd', 'Nipd', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('login');

        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nipd = $this->input->post('nipd');
        $password = $this->input->post('password');

        $dosen = $this->db->get_where('dosen', ['nipd' => $nipd])->row_array();

        //dosen ada
        if ($dosen) {
                //cek passwordnya
                if (password_verify($password, $dosen['password'])) {
                    $data = [
                        'nipd' => $dosen['nipd'],
                        'nama' => $dosen['nama'],
                        'id_prodi' => $dosen['id_prodi'],
                        'id_fakultas' => $dosen['id_fakultas'],
                        // 'foto' => $dosen['foto'],
                        'role' => $dosen['role'],
                    ];
                    $this->session->set_userdata($data);

                    if ($user['role'] == 1) {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">SELAMAT DATANG ADMINISTRATOR !</div>');
                        redirect('Welcome');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert bg-teal" role="alert">SELAMAT DATANG, '. $this->session->userdata('nama') .' !</div>');
                        redirect('Welcome');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah !</div>');
                    redirect('Auth');
                }

        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">email Tidak Terdaftar !</div>');
            redirect('Auth');
        }
    }

    public function registration ()
    {
        $this->load->view('register');
    }


    public function registration_aksi()
    {
        //validasi data terlebih dahulu
        // $this->form_validation->set_rules('nipd', 'NIPD', 'required|trim');
        // // $this->form_validation->set_rules(
        // //     'email',
        // //     'email',
        // //     'required|trim|valid_email|is_unique[user.email]',
        // //     [
        // //         'is_unique' => 'email already Registered !',
        // //     ]
        // // );
        // $this->form_validation->set_rules(
        //     'password1',
        //     'Password',
        //     'required|trim|min_length[5]|matches[password2]',
        //     [
        //         'min_length' => 'Password too short',
        //         'matches' => 'Password dont match !',
        //     ]
        // );
        $nipd = $this->input->post('nipd');
        $this->form_validation->set_rules('nipd', 'NIPD', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $data['title']   = 'User Registration';
            // $this->load->view('templates/auth_header', $data);
            $this->load->view('registration');
            // $this->load->view('templates/auth_footer');
        } else {
            $data = [
                // 'name'        => htmlspecialchars($this->input->post('name'), true),
                // 'email'       => htmlspecialchars($this->input->post('email'), true),
                // 'image'       => 'default.jpg',
                'password'    => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                // 'role_id'     => 2,
                // 'is_active'   => 1,
                // 'data_created' => time()
            ];
            $this->db->where('nipd', $nipd);
            $this->db->update('dosen', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation. Your account has been registered, get Login now !</div>');
            redirect('Auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('nipd');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('id_prodi');
        $this->session->unset_userdata('id_fakultas');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Logout Berhasil !</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $data['title'] = 'Oops !';

        $this->load->view('layout/header', $data);
        $this->load->view('block', $data);
    }
}
