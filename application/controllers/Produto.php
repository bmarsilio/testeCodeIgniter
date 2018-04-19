<?php

class Produto extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('produto_model');
        $this->load->model('categoria_model');
    }

    public function grid()
    {
        $data['produtos'] = $this->produto_model->getAll();

        $data['title'] = 'Produtos';

        $this->load->view('templates/header', $data);
        $this->load->view('produtos/grid', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Novo Produto';

        $data['categorias'] = $this->categoria_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('produtos/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');

        $data['title'] = 'Novo Produto';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('produtos/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->produto_model->store();

            redirect('produto/grid');
        }
    }

    public function edit($id = null)
    {
        $produto = $this->produto_model->getById($id);
        $data['categorias'] = $this->categoria_model->getAll();

        if($produto) {
            $data['id'] = $produto[0]['id'];
            $data['categoria_id'] = $produto[0]['categoria_id'];
            $data['nome'] = $produto[0]['nome'];
            $data['descricao'] = $produto[0]['descricao'];
            $data['valor'] = $produto[0]['valor'];
        } else {
            redirect('/produto/grid');
        }

        $data['title'] = 'Edição Produto';

        $this->load->view('templates/header', $data);
        $this->load->view('produtos/edit');
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('categoria_id', 'Categoria', 'required');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
        $this->form_validation->set_rules('valor', 'Valor', 'required');

        $data['title'] = 'Edição Produto';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('produtos/edit');
            $this->load->view('templates/footer');
        }

        $this->produto_model->update($id);

        redirect('/produto/grid');
    }

    public function delete($id)
    {
        $this->produto_model->delete($id);

        redirect('/produto/grid');
    }

}