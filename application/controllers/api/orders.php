<?php

include_once __DIR__ . '/API_Controller.php';

class Orders extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('orders_model');
    }

    public function insert()
    {


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
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:'';
        $data['price_matrix_id']=isset($_REQUEST['price_matrix_id'])? $_REQUEST['price_matrix_id']:'';
        $data['tiers']=isset($_REQUEST['tiers'])? $_REQUEST['tiers']:'';
        $data['shape']=isset($_REQUEST['shape'])? $_REQUEST['shape']:'';
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
        $data['cake_email_photo']=isset($_REQUEST['cake_email_photo'])? $_REQUEST['cake_email_photo']:'';
        $data['magic_cake_id']=isset($_REQUEST['magic_cake_id'])? $_REQUEST['magic_cake_id']:'';
        $data['magic_surcharge']=isset($_REQUEST['magic_surcharge'])? $_REQUEST['magic_surcharge']:'';
        $data['custom_cake_image_name']=isset($_REQUEST['custom_cake_image_name'])? $_REQUEST['custom_cake_image_name']:'';
        $data['custom_cake_image']=isset($_REQUEST['custom_cake_image'])? $_REQUEST['custom_cake_image']:'';
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
        $order_delivery['spacial_instruction']=isset($_REQUEST['spacial_instruction'])? $_REQUEST['spacial_instruction']:'';

//print_r($data);


    /*$data=array("cake_id"=> 1,
    "customer_id" => 5,
    "employee_id" => 1,
    "manager_id"=> 1,
    "location_id" => 1,
    "order_date" => '06/20/2013',
    "delivery_type" => "delivery",
    "pickup_location_id"=> 2,
    "delivery_zone_id"=> 1,
    "delivery_zone_surcharge"=> 49.90,
    "delivery_date"=> "07/08/2013",
    "delivery_time"=> "8:30 AM",
    "flavour_id" => 1,
    "fondant" => "yes",
    "price_matrix_id" => 1,
    "tiers" => 4,
    "shape"=> "Round",
    "matrix_price" => 56.90,
    "cake_email_photo" =>'yes',
    "magic_cake_id"=> "#MC12345",
    "magic_surcharge" => 40.00,
    "custom_cake_image_name"=> "../photo.png",
    "custom_cake_image"=> "",
    "inscription" => "The cake is very good",
    "special_instruction" => "Test",
    "instructional_email_photo" =>'yes',
    "vaughan_location"=>'yes',
    "order_status"=> "estimate",
    "discount_price" => 10.80,
    "total_price" => 999.90,
    "override_price"=> 49.90);

    $order_notes = array(
            "name"=>"contact name",
            "phone"=>"1232321",
            "address_1"=>"aaaa",
            "address_2"=>"bbbb",
            "postal"=>"postal code",
            "city"=>"my city",
            "province"=>"my province",
            "spacial_instruction"=>"ddsfd  sdfsd s"
    );*/

//
//        "instructional_photo" : [
//        "base64()",
//        "base64()"
//    ]
//    "instructional_photo_name" : [
//        "instructionalphoto1.png",
//        "instructionalphoto2.png"
//    ]

    $orders=$this->orders_model->order_insert($data);

    if(strtolower($data['delivery_type']) == 'order'){

        $this->orders_model->delivery_insert($order_delivery,$orders['order_id']);
    }

    if(strtolower($data['instructional_email_photo']) == 'yes'){

        $this->orders_model->instructional_photo($order_notes,$orders['order_id']);
    }
    $this->sendOutput($orders);

    }

    public function update(){

        $data = $this->input->get();
        $this->customers_model->save($data, $data['customer_id']);
    }

    public function search(){
        $request = $this->input->get();
        if($request){
            $data = $this->customers_model->search($request);
            $this->sendOutput($data);
        }

    }


}