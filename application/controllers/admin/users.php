<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class users extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $this->load->model('users_model');

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
            $this->ion_auth->get_users_array();

        }
        $this->data['groupresult'] = $this->users_model->getGroup();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/users_view', $this->data);

    }

    public function listing($start=0){

        $this->data['paging'] = $this->users_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('id');
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

        $this->data['queryup'] = $this->users_model->getusers($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/users_view', $this->data);
    }

    private function addValidation()
    {

        $this->form_validation->set_rules('user_name', 'User Name', 'required|trim|xss_clean|callback_checkUserName');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('group_id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['id'])) {

            $this->users_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->users_model->save($data, $data['id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function status($id){

        $this->data['category'] = $this->users_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->data['category'] = $this->users_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkUserName($title){


        $data = $this->input->post();
        return  $this->users_model->checkusers($data['id'],$title);


    }


    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/users/'.$redirect);
    }

}