<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', "username", "trim|required|callback_auth");
        $this->form_validation->set_rules('password', "password", "trim|required");
        if ($this->form_validation->run() == false) {
            $this->load->view('layouts/login');
        } else {
            $this->session->set_userdata('is_loggedin', true);
            redirect('Home');
        }
    }

    public function auth($username)
    {
        if ($this->input->post('username') == "admin" && $this->input->post('password') == "admin") {
            
            return true;
        } else {
            $this->form_validation->set_message('auth', "Login Gagal");
            return false;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect("Login");
    }
}
