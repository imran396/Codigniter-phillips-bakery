<?php
include_once __DIR__ . '/API_Controller.php';

class Ordernotes extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index(){

        $data=$this->input->post();
        $this->set($data)->insert('order_emails');
        print_r($data);

    }


}