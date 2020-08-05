<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Informasi_model extends CI_Model
{

    // public $table = 'informasi';
    // public $id = 'id_informasi';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by('id_informasi', 'DESC');
        return $this->db->get('informasi')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where('id_informasi', $id);
        return $this->db->get('informasi')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_informasi', $q);
	$this->db->or_like('informasi', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->from('informasi');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('id_informasi', 'DESC');
        $this->db->like('id_informasi', $q);
	$this->db->or_like('informasi', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->limit($limit, $start);
        return $this->db->get('informasi')->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('informasi', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_informasi', $id);
        $this->db->update('informasi', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_informasi', $id);
        $this->db->delete('informasi');
    }

}

/* End of file Informasi_model.php */
/* Location: ./application/models/Informasi_model.php */
/* Please DO NOT modify this information : */
/* Dibuat pada : 2020-07-13 23:01:22 */
/* Yassirli Amri */