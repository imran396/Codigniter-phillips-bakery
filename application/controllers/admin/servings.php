<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Servings extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('servings_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/servings/servings_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->servings_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/servings/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('serving_id');
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

        $this->data['queryup'] = $this->servings_model->getservings($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/servings/servings_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Category', 'required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('serving_id');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['serving_id'])) {

            $this->servings_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->servings_model->save($data, $data['serving_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function status($id){

        $this->servings_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('status_msg'));
        $this->redirectToHome("listing");

    }

    public function sorting(){

        $this->servings_model->sortingList();
        echo $this->lang->line('update_msg');

    }



    public function remove($id)
    {
        $this->servings_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->servings_model->checkservings($data['serving_id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/servings/'.$redirect);
    }

}