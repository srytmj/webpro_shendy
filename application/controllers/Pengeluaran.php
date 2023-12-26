<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pengeluaran_model');
    }

    public function index() {
        $data['pengeluaran'] = $this->Pengeluaran_model->get_pengeluaran();
        $data['akun_data'] = $this->Pengeluaran_model->get_akun_data();

        $this->load->view('pengeluaran/index', $data);
    }

    public function add() {
        $tanggal = $this->input->post('tanggal');
        $biaya_pengeluaran = $this->input->post('biaya_pengeluaran');
        $keterangan = $this->input->post('keterangan');
        $jumlah = $this->input->post('jumlah');
        
        $keterangan_combined = $keterangan . ' ' . $biaya_pengeluaran;
        
        $data = array(
            'tanggal' => $tanggal,
            'biaya_pengeluaran' => $biaya_pengeluaran,
            'keterangan' => $keterangan_combined,
            'jumlah' => $jumlah
        );
        

        $insert_id = $this->Pengeluaran_model->insert_pengeluaran($data);

        if ($insert_id) {
            redirect('pengeluaran');
        } else {
            echo "Gagal menambahkan data!";
        }
    }

    public function edit($id_pengeluaran) {
        $data['pengeluaran_detail'] = $this->Pengeluaran_model->get_pengeluaran_by_id($id_pengeluaran);
        $data['akun_data'] = $this->Pengeluaran_model->get_akun_data();

        $this->load->view('pengeluaran/edit', $data);
    }
    
    public function update($id_pengeluaran) {
        $tanggal = $this->input->post('tanggal');
        $biaya_pengeluaran = $this->input->post('biaya_pengeluaran');
        $keterangan = $this->input->post('keterangan');
        $jumlah = $this->input->post('jumlah');
        
        $keterangan_combined = $keterangan . ' ' . $biaya_pengeluaran;
        
        $data = array(
            'tanggal' => $tanggal,
            'biaya_pengeluaran' => $biaya_pengeluaran,
            'keterangan' => $keterangan_combined,
            'jumlah' => $jumlah
        );
    
        $this->Pengeluaran_model->update_pengeluaran($id_pengeluaran, $data);
    
        redirect('pengeluaran');
    }

    public function delete($id_pengeluaran) {
        $this->Pengeluaran_model->delete_pengeluaran($id_pengeluaran);
        redirect('pengeluaran');
    }

}
