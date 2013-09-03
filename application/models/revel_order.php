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
            "items"     => array(
                array(
                    "catering_delivery_date" => null,
                    "combo_used"             => null,
                    "combo_uuid"             => null,
                    "cost"                   => 0,
                    "created_by"             => "/enterprise/User/1/",
                    "created_date"           => date("c"),
                    "course_number"          => 0,
                    "cup_qty"                => 0,
                    "crv_value"=> null,
                    "cup_weight"             => 0,
                    "date_paid"              => null,
                    "deleted"                => 0,
                    "discount"               => null,
                    "discount_amount"        => $data['discount'],
                    "dining_option"          => 1,
                    "discount_taxed"         => null,
                    "discount_rule_amount" => null,
                    "discount_rule_type" => null,
                    "discount_reason"        => "",
                    "exchange_discount"=> null,
                    "exchanged"              => 0,
                    "expedited"              => null,
                    "initial_price"          => 0,
                    "is_cold"                => false,
                    "kitchen_completed"      => null,
                    "modifier_amount"        => 0.0,
                    "modifier_cost"          => null,
                    "modifieritems"          => array(),
                    "on_hold"                => 0,
                    "order"                  => $data['order_code'],
                    "order_local_id"         => "",
                    "price"                  => $data['subtotal'],
                    "printed"                => 1,
                    "product"                => ($data['revel_product_id'] > 0 ) ? "/resources/Product/".$data['revel_product_id']."/": "/resources/Product/1/",
                    "product_name_override"  => null,
                    "quantity"               => 1,
                    "seat_number"            => 1,
                    "shared"                 => 0,
                    "special_request"        => "",
                    "split_type"             => 0,
                    "split_with_seat"        => 0,
                    "station"                => ($data['revel_location_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/" : "resources/PosStation/1/",
                    "tax_amount"             => 0.0,
                    "taxed_flag"             => 0,
                    "tax_rate"               => 0.0,
                    "tax_rebate"             => null,
                    "temp_sort"              => time(),
                    "updated_date"           =>  date("c"),
                    "updated_by"             => "/enterprise/User/1/",
                    "uuid"                   => $this->generateUUID(),
                    "voided_by"              => null,
                    "voided_date"            => null,
                    "voided_reason"          => "",
                    "weight"                 => 0
                )
            ),


            "payments"  => array(

            ),

            "orderInfo" => array(

                "auto_grat_pct" => null,
                "bills_info" => "",
                "call_name" => null,
                "call_number" => 0,
                "closed" => null,
                "created_at" => ($data['revel_location_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/" : "resources/PosStation/1/" ,
                "created_by" => "/enterprise/User/1/",
                "customer" => ($data['revel_customer_id'] > 0 ) ? "/resources/Customer/".$data['revel_customer_id']."/" : "/resources/Customer/1/",
                "delivery_clock_in" => null,
                "delivery_clock_out"=> null,
                "delivery_employee" =>  null,
                "dining_option" => 1,
                "discount" => null,
                "discount_amount" => $data['discount'],
                "discount_reason" => "",
                "discount_rule_amount"=> null,
                "discount_rule_type"=> null,
                "discount_tax_amount"=> null,
                "discount_taxed" => null,
                "establishment" => "/enterprise/Establishment/1/",
                "exchange_discount"=> null,
                "exchanged" => null,
                "external_sync" => null,
                "final_total" => $data['subtotal'],
                "gratuity" => 0,
                "gratuity_type" => 0,
                "has_delivery_info"=> 0,
                "local_id" => "57189",
                "notification_email_sent" => 0,
                "notification_text_sent" => 0,
                "number_of_people" => 1,
                "orderhistory" =>array(null),
                "points_added" => 0,
                "points_redeemed" => 0,
                "pos_mode" => "T",
                "prevailing_surcharge" => 0,
                "prevailing_tax" => 0,
                "printed" => false,
                "remaining_due" => 10,
                "resource_uri" => "/resources/Order/286/",
                "rounding_delta" => 0,
                "service_charge" => 0,
                "subtotal" =>  $data['subtotal'],
                "surcharge" => 0,
                "table" => "/resources/Table/1/",
                "table_owner" => null,
                "tax" => 0,
                "tax_country" =>  "",
                "tax_rebate"=> null,
                "updated_by" => "/enterprise/User/1/",
                "uuid" => $this->generateUUID(),
                "web_order"=> false

            ),

            "history"   => array(
                array(
                    "closed"          => null,
                    "opened"          => date('c'),
                    "order"           => null,
                    "order_closed_by" => null,
                    "order_closed_at"=> null,
                    "order_opened_by" => "/enterprise/User/1/",
                    "order_opened_at" => ($data['revel_location_id'] > 0) ? "/resources/PosStation/".$data['revel_location_id']."/": "/resources/PosStation/1/",
                    "uuid"            => $this->generateUUID(),

                )
            )
        );

        $this->postResource('OrderAllInOne', $revelData, true);
        return basename($this->headers['location']) ;
    }

    public function update($data)
    {

        $revelData = array(
            "auto_grat_pct" => null,
            "bills_info" => "",
            "call_name" => null,
            "call_number" => 0,
            "closed" => null,
            "created_at" => ($data['revel_location_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/" : "resources/PosStation/1/" ,
            "created_by" => "/enterprise/User/1/",
            "customer" => ($data['revel_customer_id'] > 0 ) ? "/resources/Customer/".$data['revel_customer_id']."/" : "/resources/Customer/1/",
            "delivery_clock_in" => null,
            "delivery_clock_out"=> null,
            "delivery_employee" =>  null,
            "dining_option" => 1,
            "discount" => null,
            "discount_amount" => $data['discount'],
            "discount_reason" => "",
            "discount_rule_amount"=> null,
            "discount_rule_type"=> null,
            "discount_tax_amount"=> null,
            "discount_taxed" => null,
            "establishment" => "/enterprise/Establishment/1/",
            "exchange_discount"=> null,
            "exchanged" => null,
            "external_sync" => null,
            "final_total" => $data['subtotal'],
            "gratuity" => 0,
            "gratuity_type" => 0,
            "has_delivery_info"=> 0,
            "local_id" => "57189",
            "notification_email_sent" => 0,
            "notification_text_sent" => 0,
            "number_of_people" => 1,
            "orderhistory" =>array(null),
            "points_added" => 0,
            "points_redeemed" => 0,
            "pos_mode" => "T",
            "prevailing_surcharge" => 0,
            "prevailing_tax" => 0,
            "printed" => false,
            "remaining_due" => 10,
            "resource_uri" => "/resources/Order/286/",
            "rounding_delta" => 0,
            "service_charge" => 0,
            "subtotal" =>  $data['subtotal'],
            "surcharge" => 0,
            "table" => "/resources/Table/1/",
            "table_owner" => null,
            "tax" => 0,
            "tax_country" =>  "",
            "tax_rebate"=> null,
            "updated_by" => "/enterprise/User/1/",
            "uuid" => $this->generateUUID(),
            "web_order"=> false
        );

        $this->putResource('Order', $revelData, $data['revel_order_id'], true);


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
        } elseif ( $table == 'orders' ) {
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