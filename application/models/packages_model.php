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

        $this->db->select('users.id,meta.employee_id,meta.first_name,meta.last_name,groups.name as role');
        $this->db->from('users');
        $this->db->join('groups', ' groups.id = users.group_id');
        $this->db->join('meta', 'meta.user_id = users.id');
        $data = $this->db->get()->result_array();
        foreach($data as $key => $val){
            $data[$key]['id'] = (int)  $data[$key]['id'];
        }

        $data = $this->db->query($sql)->result_array();
        $output = array();
        foreach($data as $key => $val){
               $flavour_id =  $val['flavour_id'];
               $output[$flavour_id]['flavour_id'] = $flavour_id;
               $output[$flavour_id]['flavour_title']  = $val['title'];
               $output[$flavour_id]['fondant']  = $val['fondant'];
               $count = isset($output[$flavour_id]["servings"]) ? count($output[$flavour_id]["servings"]) : 0;
               $output[$flavour_id]["servings"][$count]['serving_id'] = $val['serving_id'];
               $output[$flavour_id]["servings"][$count]['title'] = $val['title'];
               $output[$flavour_id]["servings"][$count]['size'] = $val['size'];
               $output[$flavour_id]["servings"][$count]['price'] = $val['price'];
         }

         return $output;


    }


}