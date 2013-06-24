<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Roles extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('roles_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {


        $this->data['result'] = $this->roles_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/roles/roles_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->roles_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/roles/listing_view', $this->data);

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

        $this->data['queryup'] = $this->roles_model->getroles($id);
        $this->data['result'] = $this->roles_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/roles/roles_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('name', 'User role name', 'required|trim|xss_clean|callback_checkname');
        $this->form_validation->set_rules('description', 'Description', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['id'])) {

            $this->roles_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->roles_model->save($data, $data['id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function sorting(){

        $this->roles_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->roles_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome();

    }


    public function remove($id)
    {
        $this->roles_model->delete($id);
        $this->redirectToHome();

    }

    public function checkname($title){


        $data = $this->input->post();
        return  $this->roles_model->checkRoles($data['id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/roles/'.$redirect);
    }

}