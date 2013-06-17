<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Price_matrix extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('price_matrix_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));
    }

    public function index()
    {


        $this->data['location_id']=0;
        $this->data['serresult'] = $this->price_matrix_model->getServings();
        $this->data['locresult'] = $this->price_matrix_model->getLocations();
        $this->data['flvresult'] = $this->price_matrix_model->getFlavours();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/price_matrix/price_matrix_view', $this->data);

    }

    public function matrix($id=0){

        $this->data['location_id']=$id;
        $this->data['serresult'] = $this->price_matrix_model->getServings();
        $this->data['locresult'] = $this->price_matrix_model->getLocations();
        $this->data['flvresult'] = $this->price_matrix_model->getFlavours();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/price_matrix/price_matrix_view', $this->data);

    }


    public function save($locationid)
    {

        if($locationid > 0){

            $this->saveData($locationid);
            redirect('admin/price_matrix/matrix/'.$locationid);

        }else{

            $this->session->set_flashdata('success_msg',$this->lang->line('no_location_msg'));
            redirect ('admin/price_matrix');

        }


    }

    private function saveData($locationid)
    {

            $this->price_matrix_model->save($locationid);
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));


    }

}