<?php

include_once __DIR__ . '/API_Controller.php';

class Categories extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('categories_model');
    }

    public function index()
    {
        //$data = $this->categories_model->getAll();

        $data = array(
            array(
                'category_id' => 1,
                'title'       => "Birthday"
            ),
            array(
                'category_id' => 2,
                'title'       => "Sports"
            )
        );

        $this->sendOutput($data);
    }
}