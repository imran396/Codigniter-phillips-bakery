<?php

class Test extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->config('app');

        $this->load->model('revel_model');
        $this->load->model('revel_product');
        $this->load->model('revel_location');
        $this->load->model('revel_employee');
        $this->load->model('revel_customer');
        $this->load->model('revel_order');
        $this->load->model('revel_establishment');
    }

    public function establishment()
    {
        header("Content-type=> application/json");
        echo $this->revel_establishment->getAll();
    }

    // **************************** LOCATIONS ****************************

    public function locations()
    {
        header("Content-type=> application/json");
        echo $this->revel_location->getAll();
    }

    public function createLocation()
    {
        $this->revel_location->create(array(
            'name' => 'Kallaynpur POS',

        ));
    }

    // **************************** EMPLOYEES ****************************

    public function employees()
    {
        header("Content-type=> application/json");
        echo $this->revel_employee->getAll();
    }

    public function createEmployee()
    {
        $this->revel_employee->create(array(
            'created_by' => '/enterprise/User/19/',
            'created_date' => date("Y-m-dTH=>i=>s"),
            'email' => 'emran@emicrograph.com',
            'employee_card' => '',
            'employee_end' => null,
            'employee_start' => '2010-01-01T12=>00=>00',
            'employee_lastlogin' => null,
            'exempt' => false,
            'first_name' => 'Emran',
            'last_name' => 'Hasan',
            'pin' => '1234',
            'roles' => array("/resources/Role/1/"),
            'updated_by' => '/enterprise/User/19/',
            'updated_date' => date("Y-m-dTH=>i=>s"),
            'user' => '/enterprise/User/21/',
            'active' => true,
            'external_id' => 200,
            'picture' => null,
            'establishment' => '/enterprise/Establishment/1/',
        ));
    }

    public function deleteEmployee($id)
    {
        $this->revel_employee->delete($id);
    }

    public function clearEmployees()
    {
        for ($i = 2; $i < 50; $i++) {
            $this->revel_employee->delete($i);
        }
    }

    // **************************** CAKES ****************************

    public function products()
    {
        echo $this->revel_product->getAll();
    }

    // **************************** CUSTOMERS ****************************

    public function customers()
    {
        echo $this->revel_customer->getAll();
    }

    public function createCustomers()
    {

        $this->revel_customer->create(array(
            'first_name' => 'imran',
            'last_name' => 'rahman',
            'phone_number' => '01912109075',
            'email' => 'imran@emicrograph.com',
            'city' => 'Dhaka',
            'address' => 'Kallaynpur',
            'state' => 'Dhaka',
            'zipcode' => '099888',
            'country' => 'Bangladesh',
            'created_by' => '/enterprise/User/19/',
            'is_visitor' => 1,
            'updated_date' => '2010-11-10T03=>07=>43',
            'updated_by' => '/enterprise/User/19/',
            'created_date' => '2010-11-10T03=>07=>43',
        ));
    }

    // **************************** CUSTOMERS ****************************

    public function createOrders()
    {
        $data = array(
            "items" => array(
                array(
                    "updated_date" => "2013-04-17T11:14:26",
                    "modifier_amount" => "0.5",
                    "weight" => 0,
                    "cost" => 7,
                    "special_request" => "",
                    "initial_price" => 7,
                    "on_hold" => 0,
                    "discount_reason" => "",
                    "uuid" => "0E9E2E8C-25FB-4E7A-A1FC-7F3D6FD29FA4",
                    "temp_sort" => 1366186472,
                    "created_by" => "/enterprise/User/102/",
                    "station" => "/resources/PosStation/647/",
                    "course_number" => 0,
                    "shared" => 0,
                    "voided_by" => null,
                    "catering_delivery_date" => null,
                    "voided_date" => null,
                    "split_with_seat" => 0,
                    "discount_taxed" => null,
                    "exchanged" => 0,
                    "product" => "/resources/Product/148753/",
                    "combo_used" => "/resources/Product/148756/",
                    "updated_by" => "/enterprise/User/102/",
                    "product_name_override" => "Grilled	Chicken	Club",
                    "deleted" => 0,
                    "price" => 7,
                    "dining_option" => 0,
                    "discount" => null,
                    "combo_uuid" => "24B67D95-9A36-45D3-AB15-2E4C44688A77",
                    "tax_rate" => "8.25",
                    "printed" => 1,
                    "seat_number" => 1,
                    "cup_qty" => 0,
                    "modifieritems" => array(),
                    "split_type" => 0,
                    "discount_amount" => null,
                    "tax_amount" => "0.62",
                    "cup_weight" => 0,
                    "kitchen_completed" => null,
                    "devices" => null,
                    "expedited" => null,
                    "date_paid" => null,
                    "taxed_flag" => 1,
                    "created_date" => "2013-04-17T11:14:26",
                    "order" => "/resources/Order/57189/",
                    "quantity" => 1
                )
            ),
            "payments" => array(),
            "orderInfo" => array(
                "pos_mode" => "T",
                "table_owner" => null,
                "gratuity_type" => 0,
                "points_added" => 0,
                "tax" => "0.85",
                "bills_info" => "",
                "table" => "/resources/Table/521/",
                "discount_reason" => "",
                "points_redeemed" => 0,
                "call_number" => 2,
                "uuid" => "2DAA8304-B6AD-4476-BACD-F9AC384E61D0",
                "gratuity" => 0,
                "orderhistory" => [],
                "created_by" => "/enterprise/User/102/",
                "closed" => 0,
                "tax_country" => "usa",
                "surcharge" => 0,
                "establishment" => "/enterprise/Establishment/1/",
                "discount_taxed" => null,
                "updated_date" => "2013-04-17T11:14:26",
                "prevailing_tax" => "8.25",
                "prevailing_surcharge" => 0,
                "updated_by" => "/enterprise/User/102/",
                "delivery_clock_out" => null,
                "delivery_employee" => null,
                "dining_option" => 0,
                "discount" => null,
                "call_name" => null,
                "printed" => 0,
                "subtotal" => "10.25",
                "service_charge" => 0,
                "discount_amount" => null,
                "customer" => null,
                "final_total" => "11.1",
                "number_of_people" => 0,
                "created_at" => "/resources/PosStation/647/",
                "delivery_clock_in" => null,
                "local_id" => 57189,
                "remaining_due" => "11.1",
                "created_date" => "2013-04-17T11:14:26",
                "rounding_delta" => 0
            ),
            "history" => array(
                array(
                    "order_closed_by"=>	null,	
                    "opened"=>	"2013-04-17T11:14:26",
                    "order_opened_by"=>	"/enterprise/User/102/",	
                    "order_opened_at"=>	"/resources/PosStation/647/",	
                    "closed"=>	null,	
                    "order"=>	"/resources/Order/57189/",	
                    "uuid"=>	"94b3ff42-ea99-4bdf-8a0b-9e69dd57e4e5"
                )
            )
        );

        $this->revel_order->create($data);
    }

}