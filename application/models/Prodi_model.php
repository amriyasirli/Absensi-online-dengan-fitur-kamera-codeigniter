<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prodi_model extends CI_Model
{

    // public $table = 'prodi';
    // public $id = 'id_prodi';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
        $this->db->order_by('id_prodi', 'DESC');
        return $this->db->get('prodi')->result();
    }

    function show()
    {
        $this->db->select('*');
        $this->db->join('dosen', 'dosen.nipd=prodi.nipd');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
        $this->db->order_by('id', 'DESC');
        return $this->db->get('absen')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas');
        $this->db->where('id_prodi', $id);
        return $this->db->get('prodi')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('nama_prodi', $q);
	$this->db->or_like('kajur', $q);
	$this->db->from('prodi');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('id_prodi', 'DESC');
        $this->db->like('id_prodi', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('nama_prodi', $q);
	$this->db->or_like('kajur', $q);
	$this->db->limit($limit, $start);
        return $this->db->get('prodi')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('prodi', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_prodi', $id);
        $this->db->update('prodi', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_prodi', $id);
        $this->db->delete('prodi');
    }

}

/* End of file Prodi_model.php */
/* Location: ./application/models/Prodi_model.php */
/* Please DO NOT modify this information : */
/* Dibuat pada : 2020-07-13 23:01:22 */
/* Yassirli Amri */