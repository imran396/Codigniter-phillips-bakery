<?php

class Revel_Order extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('OrderAllInOne');
    }

    public function create($data)
    {
        $revelData = array(
            "items"     => array(array(
                "updated_date"           => date("c"),
                "modifier_amount"        => 0.0,
                "weight"                 => 0,
                "cost"                   => 0,
                "special_request"        => "",
                "initial_price"          => 0,
                "on_hold"                => 0,
                "discount_reason"        => "",
                "uuid"                   => $this->generateUUID(),
                "temp_sort"              => time(),
                "created_by"             => "/enterprise/User/1/",
                "station"                => ($data['revel_product_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/" : "resources/PosStation/1/",
                "course_number"          => 0,
                "shared"                 => 0,
                "voided_by"              => null,
                "catering_delivery_date" => null,
                "voided_date"            => null,
                "split_with_seat"        => 0,
                "discount_taxed"         => null,
                "exchanged"              => 0,
                "product"                => ($data['revel_product_id'] > 0 ) ? "/resources/Product/".$data['revel_product_id']."/": "/resources/Product/1/",
                "combo_used"             => null,
                "updated_by"             => "/enterprise/User/1/",
                "product_name_override"  => null,
                "deleted"                => 0,
                "price"                  => $data['subtotal'],
                "dining_option"          => 1,
                "discount"               => null,
                "combo_uuid"             => null,
                "tax_rate"               => 0.0,
                "printed"                => 1,
                "seat_number"            => 1,
                "cup_qty"                => 0,
                "modifieritems"          => array(),
                "split_type"             => 0,
                "discount_amount"        => $data['discount'],
                "tax_amount"             => 0.0,
                "cup_weight"             => 0,
                "kitchen_completed"      => null,
                "devices"                => null,
                "expedited"              => null,
                "date_paid"              => null,
                "taxed_flag"             => 0,
                "created_date"           => date("c"),
                "order"                  => $data['order_code'],
                "quantity"               => 1
            )),
            "payments"  => array(

            ),
            "orderInfo" => array(
                "pos_mode"             => "T",
                "table_owner"          => null,
                "gratuity_type"        => 0,
                "points_added"         => 0,
                "tax"                  => 0.0,
                "bills_info"           => "",
                "table"                => "/resources/Table/1/",
                "discount_reason"      => "",
                "points_redeemed"      => 0,
                "call_number"          => 0,
                "uuid"                 => $this->generateUUID(),
                "gratuity"             => 0,
                "orderhistory"         => array(),
                "created_by"           => "/enterprise/User/1/",
                "closed"               => 0,
                "tax_country"          => "",
                "surcharge"            => 0,
                "establishment"        => "/enterprise/Establishment/1/",
                "discount_taxed"       => null,
                "updated_date"         => date("c"),
                "prevailing_tax"       => 0.0,
                "prevailing_surcharge" => 0,
                "updated_by"           => "/enterprise/User/1/",
                "delivery_clock_out"   => null,
                "delivery_employee"    => null,
                "dining_option"        => 1,
                "discount"             => null,
                "call_name"            => null,
                "printed"              => 0,
                "subtotal"             => $data['subtotal'],
                "service_charge"       => 0,
                "discount_amount"      => $data['discount'],
                "customer"             => ($data['revel_customer_id'] > 0 ) ? "/resources/Customer/".$data['revel_customer_id']."/" : "/resources/Customer/1/",
                "final_total"          => $data['subtotal'],
                "number_of_people"     => 1,
                "created_at"           => ($data['revel_location_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/": "/resources/PosStation/1/",
                "delivery_clock_in"    => null,
                "local_id"             => 57189,
                "remaining_due"        => $data['subtotal'],
                "created_date"         => date('c'),
                "rounding_delta"       => 0
            ),
            "history"   => array(
                array(
                    "order_closed_by" => null,
                    "opened"          => date('c'),
                    "order_opened_by" => "/enterprise/User/1/",
                    "order_opened_at" => ($data['revel_location_id'] > 0) ? "/resources/PosStation/".$data['revel_location_id']."/": "/resources/PosStation/1/",
                    "closed"          => null,
                    "order"           => null,
                    "uuid"            => $this->generateUUID()
                )
            )
        );

        $this->postResource('OrderAllInOne', $revelData, true);
        return basename($this->headers['location']);
    }

    public function getRevelID($table, $id){
        if( $table == 'cakes' ) {
            $rid = 'revel_product_id';
            $condition = array('cake_id'=> $id);
        } elseif ( $table == 'customers' ) {
            $rid = 'revel_customer_id';
            $condition = array('customer_id'=> $id);
        } elseif ( $table == 'locations' ) {
            $rid = 'revel_location_id';
            $condition = array('location_id'=> $id);
        }
        elseif ( $table == 'orders' ) {
            $rid = 'revel_order_id';
            $condition = array('order_id'=> $id);
        }
        $row =  $this->db->select($rid)->where($condition)->get($table);

        if( $row->num_rows() > 0 ) {
           $res = $row->row();
           return $res->$rid;
       } else {
           return null;
       }


    }
}