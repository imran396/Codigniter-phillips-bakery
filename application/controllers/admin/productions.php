<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . '/var/www/phillips-bakery/application/libraries/');

//var_dump($loader->register());

class Productions extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';

        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();

        //$this->layout->setLayout('layout_admin');
        $this->layout->setLayout('layout_custom');
        $this->load->model('productions_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }



    public function index()
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/production/production_view', $this->data);

    }


    function barcode_gen() {

        $this->load->library('zend');
        $this->zend->load('Zend/Barcode/Barcode');
        $barcodeOptions = array('text' => 'ZEND-FRAMEWORK');
        $rendererOptions = array();
        Zend\Barcode\Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
    }


    public function inproduction($starts=0)
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->productions_model->getListing($starts);
        $this->layout->view('admin/production/inproduction_view', $this->data);

    }


    public function details($order_code=0)
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->data['queryup']=$this->productions_model->orderDetails($order_code);
        $this->layout->view('admin/production/details_view', $this->data);

    }

    public function lookup()
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/orders/lookup_view', $this->data);


    }


    public function blackout()
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/orders/blackout_view', $this->data);


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
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
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