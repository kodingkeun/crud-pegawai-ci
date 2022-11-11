<?php

class Auth extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    function auth_check($username, $password) {
        $query = $this->db->get_where('users', array('username' => $username));

        if ($query->num_rows() > 0) {
            $data = $query->row();
            if (password_verify($password, $data->password)) {
                $this->session->set_userdata('username', $username);
                $this->session->set_userdata('loggedin', TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function loggedin() {
        if (empty($this->session->userdata('loggedin'))) {
            redirect(base_url('login'));
        }
    }
}
?>
