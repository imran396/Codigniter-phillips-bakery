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
        var_dump($this->revel_establishment->getAll());
    }

    // **************************** LOCATIONS ****************************

    public function locations()
    {
        header("Content-type=> application/json");
        var_dump($this->revel_location->getAll());
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
        var_dump($this->revel_employee->getAll());
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
        var_dump($this->revel_product->getAll());
    }

    // **************************** CUSTOMERS ****************************

    public function customers()
    {
        var_dump($this->revel_customer->getAll());
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
            'product_id'  => 271,
            'subtotal'    => 153,
            'discount'    => 0,
            'order_code'  => rand(100, 500)
        );

        $this->revel_order->create($data);
    }

}