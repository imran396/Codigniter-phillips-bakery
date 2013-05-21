<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Controls extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('controls_model');

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
        $this->data['result'] = $this->controls_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/controls/controls_view', $this->data);

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

        $this->data['queryup'] = $this->controls_model->getcontrols($id);
        $this->data['result'] = $this->controls_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/controls/controls_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('controller_name', 'Controller name', 'required|trim|xss_clean|callback_checkname');
        $this->form_validation->set_rules('control_id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['control_id'])) {

            $this->controls_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->controls_model->save($data, $data['control_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function status($id){

        $this->controls_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome();

    }


    public function remove($id)
    {
        $this->controls_model->delete($id);
        $this->redirectToHome();

    }

    public function checkname($title){


        $data = $this->input->post();
        return  $this->controls_model->checkcontrols($data['control_id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/controls/'.$redirect);
    }

}