<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct() {
        parent::__construct();
        $this->load->model('auth');
    }

    function index() {
        $this->load->view('login');
    }

    function store() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->auth->auth_check($username, $password)) {
            redirect(base_url('dashboard'));
        } else {
            $this->session->set_flashdata('error', 'username atau password salah');
            redirect(base_url('login'));
        }
    }

    function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('loggedin');
        redirect(base_url('login'));
    }
}
