<?php

include_once __DIR__ . '/API_Controller.php';

class Locations extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            array(
                'id'          => 1,
                'name'        => "Woodbridge",
                'address1'    => "5100 Rutherford Road",
                'address2'    => "",
                'city'        => "Woodbridge",
                'province'    => "ON",
                'postal_code' => "L4H 2J2",
                'country'     => "Canada",
                'pos_api'     => "",
                'surcharge'   => 10.00
            ),
            array(
                'id'          => 2,
                'name'        => "Maple",
                'address1'    => "2563 Major Mackenzie Drive",
                'address2'    => "",
                'city'        => "Maple",
                'province'    => "ON",
                'postal_code' => "L6A 2E8",
                'country'     => "Canada",
                'pos_api'     => "",
                'surcharge'   => 15.00
            )
        );

        $this->sendOutput($data);
    }
}