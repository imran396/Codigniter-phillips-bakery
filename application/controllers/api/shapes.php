<?php

include_once __DIR__ . '/API_Controller.php';

class Shapes extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('shapes_model');
    }

    public function index()
    {

    $data = $this->shapes_model->getAll();

    $this->sendOutput($data);
    }
}