<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Absen_model extends CI_Model
{

    // public $table = 'absen';
    // public $id = 'id_absen';
    // public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        $this->db->order_by('id_absen', 'DESC');
        return $this->db->get('absen')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('*');
        $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        $this->db->where('id_absen', $id);
        return $this->db->get('absen')->row();
    }

    public function perprodi ($id)
    {
        // $this->db->select('*');
        // $this->db->join('fakultas', 'fakultas.id_fakultas=absen.id_fakultas');
        // $this->db->join('prodi', 'prodi.id_prodi=absen.id_prodi');
        // $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        return $this->db->get_where('absen', ['id_prodi' =>$id]);
        // return $this->db->get('absen');
    }
    
    // get total rows
    function total_rows($q = NULL) {
        // $this->db->select('*');
        // $this->db->join('dosen', 'dosen.nipd=absen.id_absen');
        // $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->like('id_absen', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('nipd', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('jam_masuk', $q);
	$this->db->or_like('jam_keluar', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from('absen');
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        // $this->db->select('*');
        // $this->db->join('dosen', 'dosen.nipd=absen.nipd');
        // $this->db->join('prodi', 'prodi.id_prodi=dosen.id_prodi');
        $this->db->order_by('id_absen', 'DESC');
        $this->db->like('id_absen', $q);
	$this->db->or_like('id_fakultas', $q);
	$this->db->or_like('id_prodi', $q);
	$this->db->or_like('nipd', $q);
	$this->db->or_like('tanggal', $q);
	$this->db->or_like('jam_masuk', $q);
	$this->db->or_like('jam_keluar', $q);
	$this->db->or_like('keterangan', $q);
    $this->db->limit($limit, $start);
    $this->db->from('absen');
        return $this->db->get()->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert('absen', $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where('id_absen', $id);
        $this->db->update('absen', $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where('id_absen', $id);
        $this->db->delete('absen');
    }

}

/* End of file Absen_model.php */
/* Location: ./application/models/Absen_model.php */
/* Please DO NOT modify this information : */
/* Dibuat pada : 2020-07-13 23:01:22 */
/* Yassirli Amri */