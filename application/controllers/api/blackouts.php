<?php

include_once __DIR__ . '/API_Controller.php';

class Blackouts extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            array(
                'blackout_id' => 1,
                'servings_id' => 2,
                'location_id' => 2,
                'start_date'  => "2013-05-25",
                'end_date'    => "2013-06-15"
            ),
            array(
                'blackout_id' => 2,
                'servings_id' => 1,
                'location_id' => 1,
                'start_date'  => "2013-05-25",
                'end_date'    => "2013-06-01"
            )
        );

        $this->sendOutput($data);
    }
}