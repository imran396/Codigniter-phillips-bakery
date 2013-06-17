<?php

include_once __DIR__ . '/API_Controller.php';

class Customers extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    public function index()
    {
        $data = $this->customers_model->getAll();
        /*$data = array(
            array(
                'customer_id'  => 1,
                'first_name'   => "Noor",
                'last_name'    => "Khan",
                'phone_number' => "(647) 694-2587",
                'email'        => "nmkhan@emicrograph.com",
                'address_1'    => "",
                'address_2'    => "",
                'city'         => "Missisauga",
                'province'     => "ON",
                'postal_code'  => "AB 2341",
                'country'      => "Canada"
            ),
            array(
                'customer_id'  => 2,
                'first_name'   => "Emran",
                'last_name'    => "Hasan",
                'phone_number' => "(647) 694-2587",
                'email'        => "emran@emicrograph.com",
                'address_1'    => "",
                'address_2'    => "",
                'city'         => "Missisauga",
                'province'     => "ON",
                'postal_code'  => "AB 2342",
                'country'      => "Canada"
            )
        );*/

        $this->sendOutput($data);
    }
}