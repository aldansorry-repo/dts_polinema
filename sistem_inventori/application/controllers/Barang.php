<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

		if($this->session->userdata('is_loggedin') == null){
			redirect("Login");
		}
	}

	public function index()
	{
		$barang = $this->db
		->select("tb_barang.*,tb_kategori.nama as nama_kategori,tb_supplier.nama as nama_supplier")
		->join('tb_kategori','tb_barang.fk_kategori=tb_kategori.id')
		->join('tb_supplier','tb_barang.fk_supplier=tb_supplier.id')
		->get('tb_barang')
		->result();

		$data = [
			'pages' => 'barang/index',
			'barang' => $barang
		];
		$this->load->view('layouts/dashboard',$data);
	}

	public function create()
	{	
		$data = [
			'pages' => 'barang/create',
			'combo_supplier' => $this->db->get('tb_supplier')->result(),
			'combo_kategori' => $this->db->get('tb_kategori')->result()
		];

		$this->form_validation->set_rules('nama',"nama",'trim|required');
		$this->form_validation->set_rules('harga',"harga",'trim|required');
		$this->form_validation->set_rules('stok',"stok",'trim|required');
		$this->form_validation->set_rules('fk_kategori',"kategori",'trim|required');
		$this->form_validation->set_rules('fk_supplier',"supplier",'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/dashboard', $data);
		}else{
			$set = [
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'fk_kategori' => $this->input->post('fk_kategori'),
				'fk_supplier' => $this->input->post('fk_supplier'),
			];
			$this->db
			->insert('tb_barang',$set);
			redirect('Barang');
		}
	}

	public function update($id)
	{	
		$data_barang = $this->db
		->where('id',$id)
		->get('tb_barang')
		->row(0);


		$data = [
			'pages' => 'barang/create',
			'data_barang' => $data_barang,
			'combo_supplier' => $this->db->get('tb_supplier')->result(),
			'combo_kategori' => $this->db->get('tb_kategori')->result()
		];

		$this->form_validation->set_rules('nama',"nama",'trim|required');
		$this->form_validation->set_rules('harga',"harga",'trim|required');
		$this->form_validation->set_rules('stok',"stok",'trim|required');
		$this->form_validation->set_rules('fk_kategori',"kategori",'trim|required');
		$this->form_validation->set_rules('fk_supplier',"supplier",'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/dashboard', $data);
			unset($_POST);
		}else{
			$set = [
				'nama' => $this->input->post('nama'),
				'harga' => $this->input->post('harga'),
				'stok' => $this->input->post('stok'),
				'fk_kategori' => $this->input->post('fk_kategori'),
				'fk_supplier' => $this->input->post('fk_supplier'),
			];
			$this->db
			->where('id',$id)
			->update('tb_barang',$set);
			redirect('Barang');
		}
	}

	public function delete($id)
	{
		$this->db
		->where('id',$id)
		->delete('tb_barang');
		redirect('Barang');
	}
}
