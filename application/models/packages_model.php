<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Packages_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function getAll(){

        $sql = ("SELECT *
            FROM price_matrix
            LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
            LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id"
        );

        $data = $this->db->order_by('price_matrix_id','asc')->query($sql)->result_array();
        $output = array();
        foreach($data as $key => $val){
               $flavour_id =  $val['flavour_id'];
               $output[$flavour_id]['flavour_id'] = (int) $flavour_id;
               $output[$flavour_id]['flavour_title']  = $val['title'];
               $output[$flavour_id]['fondant']  = $val['fondant'];
               $count = isset($output[$flavour_id]["servings"]) ? count($output[$flavour_id]["servings"]) : 0;
               $output[$flavour_id]["servings"][$count]['serving_id'] = (int) $val['price_matrix_id'];
               $output[$flavour_id]["servings"][$count]['title'] = $val['title'];
               $output[$flavour_id]["servings"][$count]['size'] = $val['size'];
               $output[$flavour_id]["servings"][$count]['price'] = (float) $val['price'];
         }

         return $output;


    }


}