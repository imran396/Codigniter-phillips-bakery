<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));

//var_dump($loader->register());

class Productions extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';
        //$this->output->enable_profiler(TRUE);
        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();
        $this->load->helper('sentence_case');
        //$this->layout->setLayout('layout_admin');
        $this->layout->setLayout('layout_custom');
        $this->load->model(array('productions_model','gallery_model','orders_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }



    public function index()
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->session->unset_userdata('locationid');
        $this->data['locationresult'] = $this->productions_model->getAllLocations();
        $this->layout->view('admin/production/production_view', $this->data);

    }


    function barcode_gen() {

        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode/Barcode');
        $barcodeOptions = array('text' => '3458908123');
        $rendererOptions = array();
        Zend\Barcode\Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();
    }

    public function location_production($location_id){

        $newdata = array(
            'locationid'  =>$location_id
        );
        $this->session->set_userdata($newdata);

        redirect('admin/productions/inproduction');

    }

    public function inproduction($starts=0)
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->productions_model->getListing($starts);
        $this->layout->view('admin/production/inproduction_view', $this->data);

    }

    public function filtering(){
        $start=0;
        $data = $this->input->post();
        $this->data['delivery_type'] = $data['delivery_type'];
        $this->data['query'] = $this->productions_model->getFiltering($data);
        $this->load->view('admin/production/order_filtering_view', $this->data);
    }

    public function  inproduction_print(){

        $data = $this->input->post();
        $this->data['active']=$this->uri->segment(2,0);
        $this->data['delivery_type'] = $data['delivery_type'];
        $this->data['query'] = $this->productions_model->getPrinting($data);
        $this->layout->view('admin/production/inproduction_print_view', $this->data);

    }

    public function details($order_code=0)
    {
        $this->data['active']=$this->uri->segment(2,0);
        $result= $this->productions_model->orderDetails($order_code);
        if($result ->num_rows() > 0 ){
            $this->data['queryup']=$result->row();
            $this->layout->view('admin/production/details_view', $this->data);
        }else{
            redirect('admin/productions/inproduction');

        }


    }

    public function search(){

        $request = $this->input->post('search');
        if($request){

            $order_code = $this->productions_model->doSearch($request);
            if($order_code > 0){
                echo $order_code;
            }else{
                return false;
            }
        }

    }

    public function searchOrder(){

        $request = $this->input->post('search');
        if($request){

            $order_code = $this->productions_model->doSearch($request);
            if($order_code > 0){

                redirect('admin/productions/details/'.$order_code);

            }else{

                $this->session->set_flashdata('nofound_msg','<span>Error No Results</span>');
                redirect('admin/productions/inproduction');
            }
        }

    }



    public function status($order_code,$order_status){

       $this->productions_model->statusChange($order_code,$order_status);

       $session_data =  $this->session->all_userdata();
        $data = array(
            'employee_id' => $session_data['empolyee_code'],
            'audit_name' => 'orderstatus',
            'description' => 'orderstatus='.$order_status.',ordercode='.$order_code,
        );

       if($order_code){
           $this->productions_model->insertAuditLog($data);
       }

        echo $this->productions_model->currentProductionStatus($order_status);
        //redirect('admin/productions/details/'.$order_code);

    }

    public function sorting(){

        $this->servings_model->sortingList();
        echo $this->lang->line('update_msg');

    }




}