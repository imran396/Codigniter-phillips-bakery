<?php

include_once __DIR__ . '/API_Controller.php';

class Orders extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->model('orders_model');
    }

    public function index()
    {
        $data = $this->orders_model->getAll();
        $this->sendOutput($data);
    }

    public function insert()
    {
        $data['cake_id']=isset($_REQUEST['cake_id'])? $_REQUEST['cake_id']:'';
        $data['customer_id']=isset($_REQUEST['customer_id'])? $_REQUEST['customer_id']:'';
        $data['employee_id']=isset($_REQUEST['employee_id'])? $_REQUEST['employee_id']:'';
        $data['manager_id']=isset($_REQUEST['manager_id'])? $_REQUEST['manager_id']:'';
        $data['location_id']=isset($_REQUEST['location_id'])? $_REQUEST['location_id']:'';
        $data['order_date']=isset($_REQUEST['order_date'])? $_REQUEST['order_date']:'';
        $data['delivery_type']=isset($_REQUEST['delivery_type'])? $_REQUEST['delivery_type']:'';
        $data['pickup_location_id']=isset($_REQUEST['pickup_location_id'])? $_REQUEST['pickup_location_id']:'';
        $data['delivery_zone_id']=isset($_REQUEST['delivery_zone_id'])? $_REQUEST['delivery_zone_id']:'';
        $data['delivery_zone_surcharge']=isset($_REQUEST['delivery_zone_surcharge'])? $_REQUEST['delivery_zone_surcharge']:'';
        $data['delivery_date']=isset($_REQUEST['delivery_date'])? $_REQUEST['delivery_date']:'';
        $data['delivery_time']=isset($_REQUEST['delivery_time'])? $_REQUEST['delivery_time']:'';
        $data['flavour_id']=isset($_REQUEST['flavour_id'])? $_REQUEST['flavour_id']:'';
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:'No';
        $data['price_matrix_id']=isset($_REQUEST['price_matrix_id'])? $_REQUEST['price_matrix_id']:'';
        $data['tiers']=isset($_REQUEST['tiers'])? $_REQUEST['tiers']:'';
        $data['shape']=isset($_REQUEST['shape'])? $_REQUEST['shape']:'';
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
        $data['cake_email_photo']=isset($_REQUEST['cake_email_photo'])? $_REQUEST['cake_email_photo']:'';
        $data['magic_cake_id']=isset($_REQUEST['magic_cake_id'])? $_REQUEST['magic_cake_id']:'';
        $data['magic_surcharge']=isset($_REQUEST['magic_surcharge'])? $_REQUEST['magic_surcharge']:'';
        $data['inscription']=isset($_REQUEST['inscription'])?$_REQUEST['inscription']:'';
        $data['special_instruction']=isset($_REQUEST['special_instruction'])? $_REQUEST['special_instruction']:'';
        $data['instructional_email_photo']=isset($_REQUEST['instructional_email_photo'])? $_REQUEST['instructional_email_photo']:'';
        $data['vaughan_location']=isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
        $data['order_status']=isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'';
        $data['discount_price']=isset($_REQUEST['discount_price'])? $_REQUEST['discount_price']:'';
        $data['total_price']=isset($_REQUEST['total_price'])? $_REQUEST['total_price']:'';
        $data['override_price']=isset($_REQUEST['override_price'])? $_REQUEST['override_price']:'';


        $order_delivery['name']=isset($_REQUEST['name']) ? $_REQUEST['name']:'';
        $order_delivery['phone']=isset($_REQUEST['phone']) ? $_REQUEST['phone']:'';
        $order_delivery['address_1']=isset($_REQUEST['address_1'])? $_REQUEST['address_1']:'';
        $order_delivery['address_2']=isset($_REQUEST['address_2'])? $_REQUEST['address_2']:'';
        $order_delivery['postal']=isset($_REQUEST['postal'])? $_REQUEST['postal']:'';
        $order_delivery['city']=isset($_REQUEST['city'])? $_REQUEST['city']:'';
        $order_delivery['province']=isset($_REQUEST['province'])? $_REQUEST['province']:'';
        $order_delivery['delivery_instruction']=isset($_REQUEST['delivery_instruction'])? $_REQUEST['delivery_instruction']:'';


        $orders=$this->orders_model->order_insert($data);

        if(strtolower($data['delivery_type']) == 'delivery'){

            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }


        if(isset($_FILES['onCakeImage'])){

            $this->orders_model->doUpload($orders['order_id']);
        }

        if(isset($_FILES['instructionalImages'])){

            $this->orders_model->instructionalImagesUpload($orders['order_id']);

        }


        if(strtolower($data['order_status']) == 'order'){
            $this->sendOutput($orders);
        }else{
            $this->sendOutput(array('order_id'=> $orders['order_id']));
        }

    }

    public function update(){


        $array_orders_key =  array(
            'order_id','cake_id','customer_id','employee_id',
            'manager_id','location_id','order_date','delivery_type',
            'pickup_location_id','delivery_zone_id','delivery_zone_surcharge',
            'delivery_date','delivery_time','flavour_id','fondant','tiers','price_matrix_id','shape','matrix_price','cake_email_photo','magic_cake_id','magic_surcharge',
            'inscription','special_instruction','instructional_email_photo','vaughan_location','order_status','discount_price','total_price',
            'override_price'
        );

        $array_delivery_key = array('name','phone','address_1','address_2','postal','city','province','delivery_instruction');

        foreach($_REQUEST as $key => $val ){
            if(in_array($key,$array_orders_key)){
                $data[$key] = $val;
            }

            if(in_array($key,$array_delivery_key)){

                $order_delivery[$key] = $val;
            }

        }

        $orders=$this->orders_model->order_update($data, $data['order_id']);

        if(isset($order_delivery)){
            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }


        if(isset($_FILES['onCakeImage'])){
            $this->orders_model->doUpload($orders['order_id']);
        }

        if(isset($_FILES['instructionalImages'])){

            $this->orders_model->instructionalImagesUpload($orders['order_id']);

        }

        if($orders['order_status'] == 'order'){
            $this->sendOutput(array('order_id'=> $orders['order_id'],'order_code'=> $orders['order_code']));
        }else{
            $this->sendOutput(array('order_id'=> $orders['order_id']));
        }



    }


    public function search(){
        $request = $this->input->get();
        if($request){
            $data = $this->orders_model->doSearch($request);
            $this->sendOutput($data);
        }

    }


    public function notes($order_id){
        $data = $this->orders_model->getAllNotes($order_id);
        $this->sendOutput($data);

    }

    public function notesave(){
        if(!empty($_POST)){
            $this->orders_model->SaveNotes($_POST);
            if($this->db->insert_id()){
                $data = array('message'=>'created successfull','code'=>'201');
                $this->sendOutput($data);
            }
        }
    }

    public function notesearch(){
        $request = $this->input->get();
        if($request){
        $data = $this->orders_model->NotesSearch($request);
        $this->sendOutput($data);
        }

    }

}