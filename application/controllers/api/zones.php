<?php

include_once __DIR__ . '/API_Controller.php';

class Zones extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('zones_model');
    }

    public function index()
    {
        $data = $this->zones_model->getAll();
       /* $data = array(
            array(
                'zone_id'     => 1,
                'title'       => "Dhanmondi",
                'description' => "Greater dhanmondi area.",
                'surcharge'   => 10.00
            ),
            array(
                'zone_id'     => 2,
                'title'       => "Gulshan",
                'description' => "Greater gulshan area.",
                'surcharge'   => 8.00
            )
        );*/

        $this->sendOutput($data);
    }
}