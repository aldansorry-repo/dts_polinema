<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {


    public function index()
    {
        $data['data_barang'] = $this->db
        ->get('barang')->result();
        $this->load->view('toko/tampil',$data);
    }
	public function tambah()
	{
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nama_merek',"Nama Merek","required");
        $this->form_validation->set_rules('warna',"Warna","required");
        $this->form_validation->set_rules('jumlah',"Jumlah","required|numeric");

        if($this->form_validation->run() == FALSE){
            $this->load->view('toko/tambah');
        }else{
            $set = [
                'nama_merek' => $this->input->post('nama_merek'),
                'warna' => $this->input->post('warna'),
                'jumlah' => $this->input->post('jumlah')
            ];
            $this->db
            ->insert('barang',$set);

            redirect("Toko/tambah");
        }
	}
}
