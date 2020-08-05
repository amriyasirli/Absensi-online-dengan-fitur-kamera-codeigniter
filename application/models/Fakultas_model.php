<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fakultas_model extends CI_Model
{

    // public $table = 'fakultas';
    // public $id = 'id_fakultas';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('id_fakultas', 'DESC');
        return $this->db->get('fakultas')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id_fakultas', $id);
        return $this->db->get('fakultas')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_fakultas', $q);
	$this->db->or_like('nama_fakultas', $q);
	$this->db->or_like('dekan', $q);
	$this->db->from('fakultas');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('id_fakultas', 'DESC');
        $this->db->like('id_fakultas', $q);
	$this->db->or_like('nama_fakultas', $q);
	$this->db->or_like('dekan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get('fakultas')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('fakultas', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_fakultas', $id);
        $this->db->update('fakultas', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_fakultas', $id);
        $this->db->delete('fakultas');
    }

}

/* End of file Fakultas_model.php */
/* Location: ./application/models/Fakultas_model.php */
/* Please DO NOT modify this information : */
/* Dibuat pada : 2020-07-13 23:01:22 */
/* Yassirli Amri */