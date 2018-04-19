<?php

class Categoria extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');

        $this->load->model('categoria_model');
    }

    public function grid()
    {
        $data['categorias'] = $this->categoria_model->getAll();

        $data['title'] = 'Categorias';

        $this->load->view('templates/header', $data);
        $this->load->view('categorias/grid', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create()
    {
        $data['title'] = 'Nova Categoria';

        $this->load->view('templates/header', $data);
        $this->load->view('categorias/create');
        $this->load->view('templates/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        $data['title'] = 'Nova Categoria';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('categorias/create');
            $this->load->view('templates/footer');

        }
        else
        {
            $this->categoria_model->store();

            redirect('categoria/grid');
        }
    }

    public function edit($id = null)
    {
        $categoria = $this->categoria_model->getById($id);

        if($categoria) {
            $data['id'] = $categoria[0]['id'];
            $data['descricao'] = $categoria[0]['descricao'];
        } else {
            redirect('/categoria/grid');
        }

        $data['title'] = 'Edição Categoria';

        $this->load->view('templates/header', $data);
        $this->load->view('categorias/edit');
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');

        $data['title'] = 'Edição Categoria';

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('categorias/edit');
            $this->load->view('templates/footer');
        }

        $this->categoria_model->update($id);

        redirect('/categoria/grid');
    }

    public function delete($id)
    {
        $this->categoria_model->delete($id);

        redirect('/categoria/grid');
    }

}