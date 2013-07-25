<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Auditlog extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('audit_model');
        $this->layout->setLayout('layout_admin');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        //$this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function listing($start=0)
    {
        $this->data['paging'] = $this->audit_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/auditlog/listing_view', $this->data);
    }
}