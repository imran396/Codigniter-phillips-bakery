<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Blackouts extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        //$this->layout->setLayout('layout_admin');
        $this->layout->setLayout('layout_custom');
        $this->load->model(array('blackouts_model','orders_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));


    }

    public function index($start=0)
    {
        $this->data['paging'] = $this->blackouts_model->getListing($start);
        $this->data['locations'] = $this->blackouts_model->getLocations();
        $this->data['blockouts'] = $this->blackouts_model->getFlavours();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/blackouts/blackout_view', $this->data);

    }

    public function edit($id,$start=0)
    {
        $this->data['paging'] = $this->blackouts_model->getListing($start);
        $this->data['locations'] = $this->blackouts_model->getLocations();
        $this->data['flavours'] = $this->blackouts_model->getFlavours();
        $this->data['queryup'] = $this->db->where('blackout_id',$id)->get('blackouts')->row();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/blackouts/blackout_view', $this->data);

    }



    public function listing($start=0)
    {
        $this->data['paging'] = $this->blackouts_model->getListing($start);
        $this->data['locations'] = $this->blackouts_model->getLocations();
        $this->data['blockouts'] = $this->blackouts_model->getFlavours();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/blackouts/blackout_view', $this->data);

    }


    public function save()
    {

        $data= $this->input->post();
        if (!empty($data)) {

                $this->saveData();

        }
        $this->redirectToHome();

    }


    public function search($id)
    {

        $this->data['queryup'] = $this->blackouts_model->getservings($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/servings/servings_view', $this->data);
    }

    function checkLessCurrentDate(){

        $curdate=date('m/d/Y');
        $blackout_date      = explode(',',$this->input->post('blackout_date'));
        $final          = array();

        foreach($blackout_date as $date){

            if($date < $curdate){

                $final[]=$date;
            }
        }

        echo count($final);
    }




    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['blackout_id'])) {

            $this->blackouts_model->insert();
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));

        } else {
            
            $this->blackouts_model->update($data, $data['serving_id']);
            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }



    public function remove($id)
    {
        $this->blackouts_model->delete($id);
        $this->redirectToHome();

    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/blackouts/'.$redirect);
    }

}