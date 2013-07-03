<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Orders_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('orders','order_id');

    }


    public function order_insert($data){

        $data['order_status']="Pending";
        $order_id = $this->insert($data);
        $order_code=(100000+$order_id);

        $this->db->set(array('order_code'=>$order_code))->where('order_id',$order_id)->update('orders');

        $order['order_id']= $order_id;
        $order['order_code']= $order_code;

        return $order;


    }


    public function delivery_insert($delivery_insert,$order_id){

        $delivery_insert['order_id']=$order_id;
        $this->db->set($delivery_insert)->insert('order_delivery');


    }

    public function instructional_insert($order_notes,$order_id){

        $order_notes['order_id']=$order_id;
        $this->db->set($order_notes)->insert('order_notes');


    }


}
