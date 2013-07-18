<?php

include_once __DIR__ . '/API_Controller.php';

class Provinces extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('zones_model');
    }

    public function index()
    {

        $data = array("Ontario","Quebec","Nova Scotia", "New Brunswick", "Manitoba","British Columbia","Prince Edward Island","Saskatchewan","Alberta","Newfoundland and Labrador");
        $this->sendOutput($data);
    }
}