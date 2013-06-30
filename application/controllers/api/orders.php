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
//        $data['customer_id']=isset($_POST['customer_id'])? $_POST['customer_id']:'';
//        $data['employee_id']=isset($_POST['employee_id'])? $_POST['employee_id']:'';
//        $data['manager_id ']=isset($_POST['manager_id '])? $_POST['manager_id ']:'';
//        $data['location_id']=isset($_POST['location_id'])? $_POST['location_id']:'';
//        $data['order_date ']=isset($_POST['order_date '])? $_POST['order_date ']:'';
//        $data['delivery_type ']=isset($_POST['delivery_type'])? $_POST['delivery_type']:'';
//        $data['pickup_location_id ']=isset($_POST['pickup_location_id'])? $_POST['pickup_location_id']:'';
//        $data['delivery_zone_id ']=isset($_POST['delivery_zone_id'])? $_POST['delivery_zone_id']:'';
//        $data['delivery_zone_surcharge ']=isset($_POST['delivery_zone_surcharge '])? $_POST['delivery_zone_surcharge']:'';
//        $data['delivery_date ']=isset($_POST['delivery_date '])? $_POST['delivery_date ']:'';
//        $data['delivery_time ']=isset($_POST['delivery_time'])? $_POST['delivery_time']:'';
//        $data['flavour_id ']=isset($_POST['flavour_id'])? $_POST['flavour_id']:'';
//        $data['fondant ']=isset($_POST['fondant'])? $_POST['fondant']:'';
//        $data['price_matrix_id ']=isset($_POST['price_matrix_id'])? $_POST['price_matrix_id']:'';
//        $data['tiers ']=isset($_POST['tiers'])? $_POST['tiers']:'';
//        $data['shape']=isset($_POST['shape_id'])? $_POST['shape']:'';
//        $data['matrix_price ']=isset($_POST['flavour_price'])? $_POST['flavour_price']:'';
//        $data['cake_email_photo ']=isset($_POST['cake_email_photo'])? $_POST['cake_email_photo']:'';
//        $data['magic_cake_id ']=isset($_POST['magic_cake_id'])? $_POST['magic_cake_id']:'';
//        $data['magic_surcharge ']=isset($_POST['magic_surcharge'])? $_POST['magic_surcharge']:'';
//        $data['custom_cake_image_name ']=isset($_POST['custom_cake_image_name'])? $_POST['custom_cake_image_name']:'';
//        $data['custom_cake_image ']=isset($_POST['custom_cake_image'])? $_POST['custom_cake_image']:'';
//        $data['inscription ']=isset($_POST['inscription'])?$_POST['inscription']:'';
//        $data['special_instruction ']=isset($_POST['special_instruction'])? $_POST['special_instruction']:'';
//        $data['instructional_email_photo ']=isset($_POST['instructional_email_photo'])? $_POST['instructional_email_photo']:'';
//        $data['vaughan_location ']=isset($_POST['vaughan_location'])? $_POST['vaughan_location']:'';
//        $data['order_status ']=isset($_POST['order_status'])? $_POST['order_status']:'';
//        $data['payment_status ']=isset($_POST['payment_status'])? $_POST['payment_status']:'';
//        $data['discount_price ']=isset($_POST['discount_price'])? $_POST['discount_price']:'';
//        $data['total_price ']=isset($_POST['total_price'])? $_POST['total_price']:'';
//        $data['override_price ']=isset($_POST['override_price'])? $_POST['override_price']:'';

    $data=array("cake_id"=> 1,
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
    );

//
//        "instructional_photo" : [
//        "base64()",
//        "base64()"
//    ]
//    "instructional_photo_name" : [
//        "instructionalphoto1.png",
//        "instructionalphoto2.png"
//    ]

    $order_id=$this->orders_model->order_insert($data,$order_notes);
    $this->orders_model->notes_insert($order_notes,$order_id);


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