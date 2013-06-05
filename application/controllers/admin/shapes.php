<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Shapes extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('shapes_model');

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
        $this->layout->view('admin/shapes/shapes_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->shapes_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/shapes/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('shape_id');
                if(!empty($id)) {
                    $this->redirectToHome('edit/'.$id);
                }else{
                    $this->redirectToHome('listing');
                }


            }
        }
        $this->index();

    }


    public function edit($id)
    {

        $this->data['queryup'] = $this->shapes_model->getshapes($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/shapes/shapes_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Category', 'required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('shape_id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['shape_id'])) {

            $this->shapes_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->shapes_model->save($data, $data['shape_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function sorting(){

        $this->shapes_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->shapes_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->shapes_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->shapes_model->checkshapes($data['shape_id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/shapes/'.$redirect);
    }

}