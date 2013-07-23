<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Locations extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $this->load->model('locations_model');
       // $this->output->enable_profiler(false);
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/locations/locations_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->locations_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/locations/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('location_id');
                if(!empty($id)) {
                    $this->redirectToHome('edit/'.$id);
                }else{
                    $this->redirectToHome('listing');
                }


            }
        }
        $this->index();

    }


    public function edit($id)
    {

        $this->data['queryup'] = $this->locations_model->getLocations($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/locations/locations_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Location Title','required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('email', 'Email Address','valid_email');
        $this->form_validation->set_rules('location_id');
        $this->form_validation->set_rules('vaughan_location','trim|xss_clean|callback_checkVaughanLocation');
        $this->form_validation->set_rules('address1');
        $this->form_validation->set_rules('address2');
        $this->form_validation->set_rules('city');
        $this->form_validation->set_rules('province');
        $this->form_validation->set_rules('postal_code');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('surcharge');
        $this->form_validation->set_rules('pos_api');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['location_id'])) {

            $this->locations_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->locations_model->save($data, $data['location_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function sorting(){

        $this->locations_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->locations_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->locations_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->locations_model->checkLocations($data['location_id'],$title);


    }

    function checkVaughanLocation($VaughanLocation){

        $data = $this->input->post();
        return  $this->locations_model->vaughanLocation($data['location_id'],$VaughanLocation);

    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/locations/'.$redirect);
    }

}