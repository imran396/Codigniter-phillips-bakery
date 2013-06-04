<?php

include_once __DIR__ . '/API_Controller.php';

class Cakes extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cakes_model');
    }

    public function index()
    {

    $data = $this->cakes_model->getApiCakes();



      /*  $data1 = array(
            array(
                'cake_id'        => 1,
                'category_id'    => 1,
                'flavour_id'     => 1,
                'title'          => "Ferrari Theme",
                'description'    => "3 layers of Chocolate Cake lightly soaked in Kirsch liqueur syrup <br /> 2 layers fresh cream <br />1 layer of Chocolate Mousse and cherry filling <br />Covered in fresh dairy cream and chocolate shavings",
                'shapes'         => array('Round', 'Square', 'Rectangle'),
                'meta_tag'       => "birthday, celebration, chocolate",
                'image'          => "https://www.stphillipsbakery.com/image/data/birthday/Ferrari%20Theme.jpg",
                'start_price'    => 40,
                'end_price'      => 120,
                'gallery_images' => array(
                    "https://www.stphillipsbakery.com/image/data/birthday/Ferrari%20Theme.jpg",
                    "https://www.stphillipsbakery.com/image/data/birthday/Ferrari%20Scenery%20Theme.jpg"
                )
            ),


            array(
                'cake_id'        => 1,
                'category_id'    => 2,
                'flavour_id'     => 2,
                'title'          => "Guitar",
                'description'    => "3 Layers of Chocolate Cake lightly soaked with Brandy syrup. <br /> 2 layers light Chocolate Mousse. <br />1 layer of Truffle chocolate <br />Covered in a Belgian chocolate glaze.",
                'shapes'         => array('Round', 'Rectangle'),
                'meta_tag'       => "guidar, celebration, chocolate",
                'image'          => "https://www.stphillipsbakery.com/image/data/birthday/Guitar.jpg",
                'start_price'    => 45,
                'end_price'      => 100,
                'gallery_images' => array(
                    "https://www.stphillipsbakery.com/image/data/birthday/Guitar.jpg",
                    "https://www.stphillipsbakery.com/image/data/birthday/Hand.jpg"
                )
            )
        );*/

        $this->sendOutput($data);
    }
}