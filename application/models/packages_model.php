<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Packages_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function getAll($location=0){


        $sql = ("SELECT price_matrix.price_matrix_id,price_matrix.price,servings.title AS servings_title , servings.printing_surcharge , servings.size,flavours.*
            FROM price_matrix
            LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
            LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id WHERE location_id=$location"
        );

        $data = $this->db->query($sql)->result_array();
        $flavours = array();
        $output = array();
        foreach ($data as $key => $val) {
            $flavour_id = $val['flavour_id'];
            $price = (float) $val['price'];
            $printing_surcharge = (float) $val['printing_surcharge'];

            if (!isset($flavours[$flavour_id])) {
                $flavours[$flavour_id] = count($flavours);
            }
            if($price){
                $output[$flavours[$flavour_id]]['flavour_id'] = (int) $flavour_id;
                $output[$flavours[$flavour_id]]['flavour_title'] = $val['title'];
                $output[$flavours[$flavour_id]]['fondant'] = (int) $val['fondant'];
                $count = isset($output[$flavours[$flavour_id]]["servings"]) ? count($output[$flavours[$flavour_id]]["servings"]) : 0;
                $output[$flavours[$flavour_id]]["servings"][$count]['price_matrix_id'] = (int) $val['price_matrix_id'];
                $output[$flavours[$flavour_id]]["servings"][$count]['title'] = $val['servings_title'];
                $output[$flavours[$flavour_id]]["servings"][$count]['size'] = $val['size'];
                $output[$flavours[$flavour_id]]["servings"][$count]['printing_surcharge'] = $printing_surcharge;
                $output[$flavours[$flavour_id]]["servings"][$count]['price'] = $price;
            }



        }

         return $output;


    }


}
