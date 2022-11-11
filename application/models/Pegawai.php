<?php

class Pegawai extends CI_Model
{
    var $table = "pegawais";
    var $column_data = array('nama', 'nip', 'email', 'tgl_lahir', 'keterangan');
    var $column_search = array('nama', 'nip', 'email');
    var $order = array('id' => 'desc');

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_search_query() {
        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_data[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_data() {
        $this->get_search_query();

        if ($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filter() {
        $this->get_search_query();

        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all() {
        $this->db->from($this->table);

        return $this->db->count_all_results();
    }

    public function get_by_id($id) {
        $this->db->from($this->table);

        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function save($data) {
        $this->db->insert($this->table, $data);

        return $this->db->insert_id();
    }

    public function update($where, $data) {
        $this->db->update($this->table, $data, $where);

        return $this->db->affected_rows();
    }

    public function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
?>
