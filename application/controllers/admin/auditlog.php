<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Auditlog extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->load->helper('csv');
        //$this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function listing($start=0)
    {
        $this->data['paging'] = $this->logs_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/auditlog/listing_view', $this->data);
    }

    public function csvfile()
    {

        $query = $this->db->get('auditlog');
        query_to_csv($query, TRUE, 'toto.csv');

    }

    function search($urlsearch=NULL,$start=0)
    {


        $getsearch = $this->input->get('search');

        if($getsearch){
            $search = $getsearch;
        }else{
            $search = $urlsearch;
        }

        if(!empty($search)){

            $this->data['paging'] = $this->logs_model->searching($search,$start);
            $this->data['active']=$this->uri->segment(2,0);
            $this->layout->view('admin/auditlog/listing_view', $this->data);


        }else{

            $this->session->set_flashdata('warnings_msg',$this->lang->line('update_msg'));
            redirect("admin/auditlog/listing");
        }


    }
}