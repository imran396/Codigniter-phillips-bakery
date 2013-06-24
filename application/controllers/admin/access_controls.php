<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Access_controls extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model(array('access_control_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));
    }

    public function index()
    {

        $this->data['group_id']=0;
        $this->data['groupresult'] = $this->access_control_model->getGroups();
        $this->data['conresult'] = $this->access_control_model->getControllers();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/access_controls/access_control_view', $this->data);

    }

    public function access($id=0){

        $this->access_model->access_permission($this->uri->segment(2,NULL),'others');

        $this->data['group_id']=$id;
        $this->data['groupresult'] = $this->access_control_model->getGroups();
        $this->data['conresult'] = $this->access_control_model->getControllers();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/access_controls/access_control_view', $this->data);

    }


    public function save($group_id)
    {

        if($group_id > 0){

            $this->saveData($group_id);
            redirect('admin/access_controls/access/'.$group_id);

        }else{

            $this->session->set_flashdata('error_msg',$this->lang->line('no_group_msg'));
            redirect ('admin/access_controls');

        }


    }

    private function saveData($group_id)
    {

            $this->access_control_model->save($group_id);
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));


    }

}