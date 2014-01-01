<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Establishments extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->model('establishments_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/establishments/establishments_view', $this->data);

    }

    public function listing(){

        $this->data['result'] = $this->establishments_model->getListing();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/establishments/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('establishment_id');
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

        $this->data['queryup'] = $this->establishments_model->getestablishments($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/establishments/establishments_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('revel_establishment_id', 'Establishment ID', 'required|trim');
        $this->form_validation->set_rules('revel_product_id', 'Revel Product ID', 'required|trim|xss_clean');
        $this->form_validation->set_rules('establishment_id');
        $this->form_validation->set_rules('is_custom_product');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['establishment_id'])) {

            $this->establishments_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->establishments_model->save($data, $data['establishment_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        }

    }

    public function sorting(){

        $this->establishments_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->establishments_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->establishments_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->establishments_model->checkestablishments($data['establishment_id'],$title);


    }

    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/establishments/'.$redirect);
    }

}