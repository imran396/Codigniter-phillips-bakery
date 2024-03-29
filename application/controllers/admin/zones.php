<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Zones extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('zones_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/zones/zones_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->zones_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/zones/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('zone_id');
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

        $this->data['queryup'] = $this->zones_model->getzones($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/zones/zones_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Category', 'required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('zone_id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['zone_id'])) {

            $this->zones_model->create($data);

            $this->session->set_flashdata('success_msg',"New delivery zone has been added successfully");
        } else {
            $this->zones_model->save($data, $data['zone_id']);

            $this->session->set_flashdata('success_msg',"Delivery zone has been updated successfully");
        }

    }

    public function sorting(){

        $this->zones_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->zones_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->zones_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->zones_model->checkZones($data['zone_id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/zones/'.$redirect);
    }

}