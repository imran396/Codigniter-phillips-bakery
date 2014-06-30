<?php

include_once __DIR__ . '/API_Controller.php';

class Servings extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('servings_model');
    }

    public function index()
    {

    $data = $this->servings_model->getAll();

    $this->sendOutput($data);
    }
}