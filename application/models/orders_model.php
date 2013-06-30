<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Orders_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function order_insert($data){

        $this->db->set($data)->insert('orders');
        return $this->db->insert_id();

    }


    public function notes_insert($order_notes,$order_id){

        $order_notes['order_id']=$order_id;
        $this->db->set($order_notes)->insert('order_notes');


    }

    public function instructional_insert($order_notes,$order_id){

        $order_notes['order_id']=$order_id;
        $this->db->set($order_notes)->insert('order_notes');


    }


}
