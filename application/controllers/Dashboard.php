<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('auth');
        $this->load->model('pegawai');
        $this->auth->loggedin();
    }

    public function index() {
        $this->load->view('dashboard');
    }

    public function get_total_data() {
        $data = array(
            'total_records_data' => $this->pegawai->count_all()
        );

        echo json_encode($data);
    }

    public function list_data() {
        $list = $this->pegawai->get_data();
        $data = array();
        $index = $_POST['start'];
        foreach ($list as $pegawai) {
            $index++;

            $row = array();
            $row[] = $pegawai->nama;
            $row[] = $pegawai->nip;
            $row[] = $pegawai->email;
            $row[] = $pegawai->tgl_lahir;
            $row[] = $pegawai->keterangan;

            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_data('. "'".$pegawai->id."'".')">Edit</a> <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_data('. "'".$pegawai->id."'". ')">Hapus</a>';

            $data[] = $row;
        }

        $output = array(
            'draw' => $_POST['draw'],
            'recordsTotal' => $this->pegawai->count_all(),
            'recordsFiltered' => $this->pegawai->count_filter(),
            'data' => $data
        );

        echo json_encode($output);
    }

    public function edit($id) {
       $data = $this->pegawai->get_by_id($id);

       echo json_encode($data);
    }

    public function add() {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama' => $nama,
            'nip' => $nip,
            'email' => $email,
            'tgl_lahir' => $tgl_lahir,
            'keterangan' => $keterangan
        );

        $insert = $this->pegawai->save($data);
        echo json_encode(array('status' => TRUE));
    }

    public function update() {
        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $email = $this->input->post('email');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama' => $nama,
            'nip' => $nip,
            'email' => $email,
            'tgl_lahir' => $tgl_lahir,
            'keterangan' => $keterangan
        );

        $this->pegawai->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array('status' => TRUE));
    }

    public function delete($id) {
        $this->pegawai->delete($id);
        echo json_encode(array('status' => TRUE));
    }
}
