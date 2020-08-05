<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dosen_model extends CI_Model
{

    // public $table = 'dosen';
    // public $id = 'nipd';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=dosen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->order_by('nipd', 'DESC');
        return $this->db->get('dosen')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=dosen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->where('nipd', $id);
        return $this->db->get('dosen')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=dosen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->like('nipd', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('gelar', $q);
	$this->db->or_like('keahlian', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('role', $q);
	$this->db->from('dosen');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=dosen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->order_by('nipd', 'DESC');
        $this->db->like('nipd', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('tanggal_lahir', $q);
	$this->db->or_like('jabatan', $q);
	$this->db->or_like('gelar', $q);
	$this->db->or_like('keahlian', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('role', $q);
	$this->db->limit($limit, $start);
        return $this->db->get('dosen')->result();
    }

    // insert data
    function insert($data)
    {
        return $this->db->insert('dosen', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('nipd', $id);
        $this->db->update('dosen', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('nipd', $id);
        $this->db->delete('dosen');
    }

}

/* End of file Dosen_model.php */
/* Location: ./application/models/Dosen_model.php */
/* Please DO NOT modify this information : */
/* Dibuat pada : 2020-07-13 23:01:22 */
/* Yassirli Amri */