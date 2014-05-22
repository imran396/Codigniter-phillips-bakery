<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));

class Productions extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';
        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();
        $this->layout->setLayout('layout_custom');
        $this->load->helper(array('sentence_case','uploader','idgenerator','util'));
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

    public function saveBarcodeImage($order_code)
    {

        define('YOUR_DIRECTORY',realpath(APPPATH . "../web/assets/uploads/orders/barcode/"));
        $content = file_get_contents(site_url()."/api/orders/barcode_gen/".$order_code);
        file_put_contents(YOUR_DIRECTORY.$order_code.".png",$content);
    }


    public function barcode_gen($order_code)
    {

        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode/Barcode');
        $barcodeOptions = array('text' => "$order_code",'drawText'=>false);
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

        $result= $this->productions_model->orderDetails($order_code);
        $row = $result->row();
        $revel_order_id =$row->revel_order_id;

        if(!empty($revel_order_id) && $order_code && $order_status == '305' ){
            $this->revel_order->delete($revel_order_id);
        }

        if(empty($revel_order_id) && $order_code && $order_status == '303' ){
            $order_status = $this->insertRevelOrder($row);
        }

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

    function insertRevelOrder($orders = NULL){

        $revel_order_id = $this->revel_order->getRevelID('orders', $orders->order_id);

        if(empty($revel_order_id) && $orders->order_code && $orders->order_status == '303' ){



            if($orders->pickup_location_id > 0 && $orders->delivery_type =='pickup'){

                $revel_location_id = $this->revel_order->getRevelID('locations',$orders->pickup_location_id);

                $revel_establishment_id = $this->revel_order->getEstablishmentID($orders->pickup_location_id);

                $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders->cake_id);

            }else{

                $revel_location_id = $this->revel_order->getRevelID('locations',$orders->location_id);

                $revel_establishment_id = $this->revel_order->getEstablishmentID($orders->location_id);

                $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders->cake_id);

            }
            $revel_customer = $this->revel_order->getRevelID('customers',$orders->customer_id);
            $revel_create_location_id = $this->revel_order->getRevelID('locations',$orders->location_id);
            $revel_user = $this->revel_order->getRevelID('meta',$orders->employee_id);

            $RevelOrderData = array(

                'order_code' => $orders->order_code,
                'employee_id' => $orders->employee_id,
                'revel_customer_id' => $revel_customer,
                'revel_location_id' => $revel_location_id,
                'revel_location_create_id' => $revel_create_location_id,
                'revel_establishment_id' => $revel_establishment_id,
                'revel_product_id' => $revel_product_id,
                'revel_user_id' => $revel_user,
                'discount'=> $orders->discount_price,
                'subtotal'=> $orders->total_price
            );


            try{

                $custom =( $orders->cake_id > 0 ) ? $orders->cake_id :'';

                $revel_order_id =  $this->revel_order->create($RevelOrderData,$custom);

            }catch (\Exception $e){

                $orders['revel_order_id']  = null;

            }

            if($revel_order_id > 0){

                $vaughan_location = $this->orders_model->getVaughanLocation();
                $revel['revel_order_id']  = $revel_order_id;
                $revel['kitchen_location_id']  = $vaughan_location;
                $revel['vaughan_location']  = 1;
                $revel['vaughan_print']  = 1;

                $this->orders_model->order_update($revel, $orders->order_id);
                $this->saveBarcodeImage($revel_order_id);
                //$this->createPDF($orders->order_code);
                return 303;

            }else{
                $revel['order_status']  = 301;
                $this->orders_model->order_update($revel, $orders->order_id);
                return 301;

            }

        }

    }

    public function sorting(){

        $this->servings_model->sortingList();
        echo $this->lang->line('update_msg');

    }




}