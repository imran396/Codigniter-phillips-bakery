<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cakes extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

       // $this->load->library('image_lib');
        $this->load->helper('uploader');
        //$this->output->enable_profiler(TRUE);
        $this->layout->setLayout('layout_admin');
        $this->load->model(array('cakes_model','gallery_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {

        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['flvresult'] = $this->cakes_model->getFlavours();
        $this->data['sapresult'] = $this->cakes_model->getShapes();

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/cakes/cakes_view', $this->data);

    }

    public function listing($start=0){

        $this->data['paging'] = $this->cakes_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/cakes/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('cake_id');
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


        $this->data['queryup'] = $this->cakes_model->getcakes($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['flvresult'] = $this->cakes_model->getFlavours();
        $this->data['sapresult'] = $this->cakes_model->getShapes();
        $this->data['galleries']=$this->gallery_model->getGallery($id);
        $this->layout->view('admin/cakes/cakes_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('title', 'Cake','required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('cake_id');
        $this->form_validation->set_rules('cake_id');
        $this->form_validation->set_rules('category_id');
        $this->form_validation->set_rules('description');
        $this->form_validation->set_rules('meta_tag');
        $this->form_validation->set_rules('price');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['cake_id'])) {

            $this->cakes_model->create($data);
            $this->session->set_flashdata('success_msg','New cake has been added successfully');
        } else {
            $this->cakes_model->save($data, $data['cake_id']);

            $this->session->set_flashdata('success_msg','New cake has been updated successfully');
        }

    }

    function search($urlsearch=NULL,$start=0){


        $getsearch = $this->input->get('search');

        if($getsearch){
           $search = $getsearch;
        }else{
            $search = $urlsearch;
        }

        if(!empty($search)){

            $this->data['paging'] = $this->cakes_model->searching($search,$start);
            $this->data['active']=$this->uri->segment(2,0);
            $this->layout->view('admin/cakes/listing_view', $this->data);


        }else{

            $this->session->set_flashdata('warnings_msg',$this->lang->line('update_msg'));
            $this->redirectToHome("listing");
        }


    }

    public function sorting(){

        $this->cakes_model->sortingList();
        echo $this->lang->line('update_msg');

    }

    public function status($id){

        $this->cakes_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->cakes_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){


        $data = $this->input->post();
        return  $this->cakes_model->checkcakes($data['cake_id'],$title);


    }


    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/cakes/'.$redirect);
    }

}