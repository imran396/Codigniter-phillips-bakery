<?php

include_once __DIR__ . '/API_Controller.php';

class Provinces extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('zones_model');
    }

    public function index()
    {

        $data = array(
             array(

                 'province'       => "Ontario"

             ),
            array(

                'province'       => "Quebec"

            ),
            array(

                'province'       => "Nova Scotia"

            ),
            array(

                'province'       => "New Brunswick"

            ),
            array(

                'province'       => "Manitoba"

            ),
            array(

                'province'       => "British Columbia"

            ),
            array(

                'province'       => "Prince Edward Island"

            ),
            array(

                'province'       => "Saskatchewan"

            ),
            array(

                'province'       => "Alberta"

            ),
            array(

                'province'       => "Newfoundland and Labrador"

            )

         );

        $this->sendOutput($data);
    }
}