<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->layout->setLayout('layout_admin');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        //$this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));


    }

    public function index()
    {
        /*
         *
         *
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
        */
        $this->data['active']='dashboard';
        redirect('admin/orders/listing');

    }

    function theme(){

        $this->data['active']='Admin Theme';
        $this->layout->view('admin/theme_html', $this->data);

    }


}