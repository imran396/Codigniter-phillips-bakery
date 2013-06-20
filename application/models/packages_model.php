<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Packages_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function getAll(){

        $sql = ("SELECT price_matrix.price_matrix_id,price_matrix.price,servings.title AS servings_title , servings.size,flavours.*
            FROM price_matrix
            LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
            LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id"
        );


        $data = $this->db->query($sql)->result_array();
        $flavours = array();
        $output = array();
        foreach ($data as $key => $val) {
            $flavour_id = $val['flavour_id'];

            if (!isset($flavours[$flavour_id])) {
                $flavours[$flavour_id] = count($flavours);
            }

            $output[$flavours[$flavour_id]]['flavour_id'] = (int) $flavour_id;
            $output[$flavours[$flavour_id]]['flavour_title'] = $val['title'];
            $output[$flavours[$flavour_id]]['fondant'] = (int) $val['fondant'];
            $count = isset($output[$flavours[$flavour_id]]["servings"]) ? count($output[$flavours[$flavour_id]]["servings"]) : 0;
            $output[$flavours[$flavour_id]]["servings"][$count]['serving_id'] = (int) $val['price_matrix_id'];
            $output[$flavours[$flavour_id]]["servings"][$count]['servings_title'] = $val['servings_title'];
            $output[$flavours[$flavour_id]]["servings"][$count]['size'] = $val['size'];
            $output[$flavours[$flavour_id]]["servings"][$count]['price'] =(float) $val['price'];
        }

         return $output;


    }


}
