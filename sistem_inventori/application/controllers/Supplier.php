<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

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
		$data = [
			'pages' => 'supplier/index',
			'supplier' => $this->db->get('tb_supplier')->result()
		];
		$this->load->view('layouts/dashboard', $data);
	}

	public function create()
	{
		$data = [
			'pages' => 'supplier/create'
		];

		$this->form_validation->set_rules('nama',"nama",'trim|required');
		$this->form_validation->set_rules('alamat',"alamat",'trim|required');
		$this->form_validation->set_rules('telepon',"telepon",'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('layouts/dashboard', $data);
		}else{
			$set = [
				'nama' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'telepon' => $this->input->post('telepon'),
			];
			$this->db
			->insert('tb_supplier',$set);
			redirect('Supplier');
		}
	}

	public function delete($id)
	{
		$this->db
		->where('id',$id)
		->delete('tb_supplier');
		redirect('Supplier');
	}
}
