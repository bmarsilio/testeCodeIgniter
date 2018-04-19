<?php

class Categoria_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('categoria');

        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('categoria', array('id' => $id));

        return $query->result_array();
    }

    public function store()
    {
        $data = array(
            'descricao' => $this->input->post('descricao')
        );

        return $this->db->insert('categoria', $data);
    }

    public function update($id)
    {
        $data = array(
            'descricao' => $this->input->post('descricao')
        );

        $this->db->where('id', $id);

        return $this->db->update('categoria', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('categoria');
    }

}