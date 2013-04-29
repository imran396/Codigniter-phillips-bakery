<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Roles extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->library('form_validation');
       // $this->load->library("pagination");
        $this->load->library('session');
        $this->layout->setLayout('layout_admin');
        $this->load->helper('url');

    }

    public function index()
    {

        $group = $this->session->userdata('group');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_group($group))
        {
            redirect('/admin', 'refresh');
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['users'] = $this->ion_auth->get_users_array();
        }


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/roles/roles_view', $this->data);

    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {

                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->layout->view('admin/roles/add', $this->data);
    }


    public function edit($id)
    {
        if (!empty($_POST)) {

            $this->addValidation();
            $this->handleUpload();
            if ($this->form_validation->run()) {
                $this->saveData();
                $this->redirectToHome();
            }
        }
        $this->data['roles'] = $this->category->getCategory();

        $this->data['category'] = $this->category->getById($id);
        $this->data['category_de'] = $this->category->getByLang($id);

        $this->layout->view('admin/roles/edit', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('name', 'Category', 'required');

    }


    private function saveData()
    {

        $data = $this->input->post();

        if (!empty($this->uploadedFile)) {
            $data['image'] = $this->uploadedFile['file_name'];
        }

        if (empty($data['category_id'])) {

            $this->category->create($data);

            $this->session->set_userdata('success_message','Category Successfully Inserted.');
        } else {
            $this->category->save($data, $data['category_id']);

            $this->session->set_userdata('success_message','Category Successfully Updated.');
        }

    }


    private function redirectToHome()
    {
        redirect('admin/roles');
    }

    public function remove($id)
    {
        $this->data['category'] = $this->category->delete($id);
        $this->session->set_userdata('success_message','Category Successfully Deleted.');
        $this->layout->view('admin/roles/list', $this->data);
        redirect('admin/roles');
    }

    public function getCategory()
    {
        $this->data['roles'] = $this->product->getCategory();
    }



}