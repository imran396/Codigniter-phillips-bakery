<?php

include_once __DIR__ . '/API_Controller.php';

class Flavours extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('flavours_model');
    }

    public function index()
    {
        $data = $this->flavours_model->getAll();
        $this->sendOutput($data);
    }
}