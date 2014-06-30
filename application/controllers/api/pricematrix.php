<?php

include_once __DIR__ . '/API_Controller.php';

class Pricematrix extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('price_matrix_model');
    }

    public function index()
    {

        $location=isset($_REQUEST['location_id']) ? $_REQUEST['location_id']:0;
        if(!empty($location)){
            $data = $this->price_matrix_model->getAll($location);
            $this->sendOutput($data);
        }

    }
}