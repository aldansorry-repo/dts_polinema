<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		
		if($this->input->post('search') != null){
			$barang = $this->db
			->select("tb_barang.*,tb_kategori.nama as nama_kategori,tb_supplier.nama as nama_supplier")
			->join('tb_kategori','tb_barang.fk_kategori=tb_kategori.id')
			->join('tb_supplier','tb_barang.fk_supplier=tb_supplier.id')
			->like('tb_barang.nama',$this->input->post('search'),"both")
			->get('tb_barang')
			->result();
		}else{
			$barang = $this->db
			->select("tb_barang.*,tb_kategori.nama as nama_kategori,tb_supplier.nama as nama_supplier")
			->join('tb_kategori','tb_barang.fk_kategori=tb_kategori.id')
			->join('tb_supplier','tb_barang.fk_supplier=tb_supplier.id')
			->get('tb_barang')
			->result();
		}

		$data = [
			'pages' => 'home/index',
			'search' => $this->input->post('search'),
			'barang' => $barang
		];
		$this->load->view('layouts/dashboard',$data);
	}

}
