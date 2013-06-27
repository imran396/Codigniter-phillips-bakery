<?php

include_once __DIR__ . '/API_Controller.php';

class Orders extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('orders_model');
    }

    public function index()
    {

        $data['customer_id']=isset($_POST['customer_id'])?$_POST['customer_id']:'';
        $data['employee_id']=isset($_POST['employee_id'])?$_POST['employee_id']:'';
        $data['manager_id ']=isset($_POST['manager_id '])?$_POST['manager_id ']:'';
        $data['location_date ']=isset($_POST['location_date '])?$_POST['location_date ']:'';
        $data['order_date ']=isset($_POST['order_date '])?$_POST['order_date ']:'';
        $data['delivery_type ']=isset($_POST['delivery_type'])?$_POST['delivery_type']:'';
        $data['pickup_location_id ']=isset($_POST['pickup_location_id'])?$_POST['pickup_location_id']:'';
        $data['delivery_zone_id ']=isset($_POST['delivery_zone_id'])?$_POST['delivery_zone_id']:'';
        $data['delivery_zone_surcharge ']=isset($_POST['delivery_zone_surcharge '])?$_POST['delivery_zone_surcharge']:'';
        $data['delivery_date ']=isset($_POST['delivery_date '])?$_POST['delivery_date ']:'';
        $data['delivery_time ']=isset($_POST['delivery_time'])?$_POST['delivery_time']:'';
        $data['flavour_id ']=isset($_POST['flavour_id'])?$_POST['flavour_id']:'';
        $data['fondant ']=isset($_POST['fondant'])?$_POST['fondant']:'';
        $data['price_matrix_id ']=isset($_POST['price_matrix_id'])?$_POST['price_matrix_id']:'';
        $data['tiers ']=isset($_POST['tiers'])? $_POST['tiers']:'';
        $data['shape']=isset($_POST['shape_id'])? $_POST['shape']:'';
        $data['matrix_price ']=isset($_POST['flavour_price'])?$_POST['flavour_price']:'';
        $data['cake_email_photo ']=isset($_POST['cake_email_photo'])?$_POST['cake_email_photo']:'';
        $data['magic_cake_id ']=isset($_POST['magic_cake_id'])? $_POST['magic_cake_id']:'';
        $data['magic_surcharge ']=isset($_POST['magic_surcharge'])? $_POST['magic_surcharge']:'';
        $data['custom_cake_image_name ']=isset($_POST['custom_cake_image_name'])?$_POST['custom_cake_image_name']:'';
        $data['custom_cake_image ']=isset($_POST['custom_cake_image'])? $_POST['custom_cake_image']:'';
        $data['inscription ']=isset($_POST['inscription'])?$_POST['inscription']:'';
        $data['special_instruction ']=isset($_POST['special_instruction'])? $_POST['special_instruction']:'';
        $data['instructional_email_photo ']=isset($_POST['instructional_email_photo'])? $_POST['instructional_email_photo']:'';
        $data['vaughan_location ']=isset($_POST['vaughan_location'])? $_POST['vaughan_location']:'';
        $data['order_status ']=isset($_POST['order_status'])? $_POST['order_status']:'';
        $data['payment_status ']=isset($_POST['payment_status'])? $_POST['payment_status']:'';
        $data['discount_price ']=isset($_POST['discount_price'])? $_POST['discount_price']:'';
        $data['HST ']=isset($_POST['HST'])? $_POST['HST']:'';
        $data['total_price ']=isset($_POST['total_price'])? $_POST['total_price']:'';
        $data['override_price ']=isset($_POST['override_price'])? $_POST['override_price']:'';
        $data['instructional_photo ']=isset($_POST['instructional_photo'])? $_POST['instructional_photo']:'';
        $data['instructional_photo_name ']=isset($_POST['instructional_photo_name'])? $_POST['instructional_photo_name']:'';



        if(!empty($location)){
            $data = $this->packages_model->getAll($location);

        }

    }
}