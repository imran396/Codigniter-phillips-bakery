<?php

include_once __DIR__ . '/API_Controller.php';

class Packages extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('packages_model');
    }

    public function index()
    {

        $data = $this->packages_model->getAll();

        /*$data = array(
            array(
                'flavour_id'    => 1,
                'flavour_title' => "Banana Chocolate",
                'fondant'       => 1,
                'servings'      => array(
                    array('serving_id' => 1, 'title' => '6-8', 'size' => '6" round', 'price' => 22.00),
                    array('serving_id' => 2, 'title' => '12-15', 'size' => '9" round', 'price' => 40.00)
                )
            ),
            array(
                'flavour_id'    => 2,
                'flavour_title' => "Black Forest",
                'fondant'       => 0,
                'servings'      => array(
                    array('serving_id' => 3, 'title' => '10-12', 'size' => '8" round', 'price' => 30.00),
                    array('serving_id' => 4, 'title' => '12-15', 'size' => '9" round', 'price' => 40.00),
                    array('serving_id' => 5, 'title' => '15-20', 'size' => '10" round', 'price' => 46.00),
                    array('serving_id' => 6, 'title' => '20-30', 'size' => '1/4 slab', 'price' => 60.00),
                    array('serving_id' => 7, 'title' => '40-50', 'size' => '1/2 slab', 'price' => 96.00),
                    array('serving_id' => 8, 'title' => '60-80', 'size' => 'Full slab', 'price' => 160.00),
                )
            )
        );*/

        $this->sendOutput($data);
    }
}