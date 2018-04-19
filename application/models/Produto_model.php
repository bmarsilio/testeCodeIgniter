<?php

class Produto_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        $query = $this->db->get('produto');

        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('produto', array('id' => $id));

        return $query->result_array();
    }

    public function store()
    {
        $data = array(
            'categoria_id' => $this->input->post('categoria_id'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
        );

        return $this->db->insert('produto', $data);
    }

    public function update($id)
    {
        $data = array(
            'categoria_id' => $this->input->post('categoria_id'),
            'nome' => $this->input->post('nome'),
            'descricao' => $this->input->post('descricao'),
            'valor' => $this->input->post('valor'),
        );

        $this->db->where('id', $id);

        return $this->db->update('produto', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('produto');
    }

}