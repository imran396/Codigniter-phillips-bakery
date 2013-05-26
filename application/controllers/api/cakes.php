<?php

class Cakes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cakes_model');
    }

    public function index()
    {
        $cakes = $this->cakes_model->getAll();

        header("Content-type: application/json");
        echo json_encode($cakes);
    }
}