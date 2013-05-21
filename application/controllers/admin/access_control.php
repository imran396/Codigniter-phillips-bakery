<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Access_control extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model(array('access_control_model'));
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
        $this->data['group_id']=0;
        $this->data['groupresult'] = $this->access_control_model->getGroups();
        $this->data['conresult'] = $this->access_control_model->getControllers();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/access_control/access_control_view', $this->data);

    }

    public function access($id=0){

        $this->data['group_id']=$id;
        $this->data['groupresult'] = $this->access_control_model->getGroups();
        $this->data['conresult'] = $this->access_control_model->getControllers();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/access_control/access_control_view', $this->data);

    }


    public function save($group_id)
    {

        if($group_id > 0){

            $this->saveData($group_id);
            redirect('admin/access_control/access/'.$group_id);

        }else{

            $this->session->set_flashdata('error_msg',$this->lang->line('no_group_msg'));
            redirect ('admin/access_control');

        }


    }

    private function saveData($group_id)
    {

            $this->access_control_model->save($group_id);
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));


    }

}