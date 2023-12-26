<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {

    public function get_pengeluaran() {
        return $this->db->get('tb_jenis_pengeluaran')->result();
    }

    public function get_akun_data() {
        $this->db->select('*');
        $this->db->from('tb_akun');
        $this->db->where('SUBSTRING(id_akun, 1, 1) =', 5);
        return $this->db->get()->result();
    }
    
    public function insert_pengeluaran($data) {
        $this->db->insert('tb_jenis_pengeluaran', $data);
        return $this->db->insert_id();
    }

    public function get_pengeluaran_by_id($id_pengeluaran) {
        return $this->db->get_where('tb_jenis_pengeluaran', array('id_pengeluaran' => $id_pengeluaran))->row();
    }
    
    public function update_pengeluaran($id_pengeluaran, $data) {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        $this->db->update('tb_jenis_pengeluaran', $data);
    }
    
    public function delete_pengeluaran($id_pengeluaran) {
        $this->db->where('id_pengeluaran', $id_pengeluaran);
        $this->db->delete('tb_jenis_pengeluaran');
    }
}
