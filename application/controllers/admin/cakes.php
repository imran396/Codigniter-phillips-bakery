<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cakes extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('image_lib');
        $this->layout->setLayout('layout_admin');
        $this->load->model('cakes_model');
        $this->load->helper('string');


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

        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['locresult'] = $this->cakes_model->getLocations();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/cakes/cakes_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->cakes_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/cakes/listing_view', $this->data);

    }



    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('cake_id');
                if(!empty($id)) {
                    $this->redirectToHome('edit/'.$id);
                }else{
                    $this->redirectToHome();
                }


            }
        }
        $this->index();

    }





    public function edit($id)
    {

        $this->data['queryup'] = $this->cakes_model->getcakes($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/cakes/cakes_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Location Title','required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('cake_id');
        $this->form_validation->set_rules('cake_id');
        $this->form_validation->set_rules('category_id');
        $this->form_validation->set_rules('description');
        $this->form_validation->set_rules('meta_tag');
        $this->form_validation->set_rules('price');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['cake_id'])) {

            $this->cakes_model->create($data);
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->cakes_model->save($data, $data['cake_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }



    public function status($id){

        $this->data['category'] = $this->cakes_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->data['category'] = $this->cakes_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->cakes_model->checkcakes($data['cake_id'],$title);


    }


    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/cakes/'.$redirect);
    }

}