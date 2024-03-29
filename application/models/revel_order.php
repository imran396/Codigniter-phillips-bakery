<?php

class Revel_Order extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('OrderAllInOne');
    }

    public function create($data, $catalog = false)
    {
        $created = date('Y-m-d') . 'T' . date('H:i:s');

        $revelData = array(
            "items"     => array(array(
                "updated_date"           => $created,
                "modifier_amount"        => 0.0,
                "weight"                 => 0,
                "cost"                   => 0,
                "special_request"         => "",
                "initial_price"          => $data['subtotal'],
                "on_hold"                => 0,
                "discount_reason"        => "",
                "uuid"                   => $this->generateUUID(),
                "temp_sort"              => time(),
                "created_by"             => ($data['revel_user_id'] > 0 ) ? "/enterprise/User/".$data['revel_user_id']."/" : "/enterprise/User/1/",
                "station"                => ($data['revel_location_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_id']."/" : "resources/PosStation/1/",
                "course_number"          => 0,
                "shared"                 => 0,
                "voided_by"              => null,
                "catering_delivery_date" => null,
                "voided_date"            => null,
                "split_with_seat"        => 0,
                "discount_taxed"         => null,
                "exchanged"              => 0,
                "product"                => ($data['revel_product_id'] > 0 ) ? "/resources/Product/".$data['revel_product_id']."/" : "/resources/Product/".$data['revel_product_id']."/",
                "combo_used"             => null,
                "updated_by"             => ($data['revel_user_id'] > 0 ) ? "/enterprise/User/".$data['revel_user_id']."/" : "/enterprise/User/1/",
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
                "created_date"           => $created,
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
                "table"                => NULL,
                "discount_reason"      => "",
                "points_redeemed"      => 0,
                "call_number"          => 0,
                "uuid"                 => $this->generateUUID(),
                "gratuity"             => 0,
                "orderhistory"         => array(),
                "created_by"           => ($data['revel_user_id'] > 0 ) ? "/enterprise/User/".$data['revel_user_id']."/" : "/enterprise/User/1/",
                "closed"               => 0,
                "tax_country"          => "",
                "surcharge"            => 0,
                "establishment"        => ($data['revel_establishment_id'] > 0 ) ? "/enterprise/Establishment/".$data['revel_establishment_id']."/" : "/enterprise/Establishment/".$data['revel_establishment_id']."/",
                "discount_taxed"       => null,
                "updated_date"         => $created,
                "prevailing_tax"       => 0.0,
                "prevailing_surcharge" => 0,
                "updated_by"           => ($data['revel_user_id'] > 0 ) ? "/enterprise/User/".$data['revel_user_id']."/" : "/enterprise/User/1/",
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
                "created_at"           => ($data['revel_location_create_id'] > 0 ) ? "/resources/PosStation/".$data['revel_location_create_id']."/": "/resources/PosStation/1/",
                "delivery_clock_in"    => null,
                "local_id"             => 57189,
                "remaining_due"        => $data['subtotal'],
                "created_date"         => $created ,
                "rounding_delta"       => 0,
                "web_order"            => true
            ),
            "history"   => array(
                array(
                    "order_closed_by" => null,
                    "opened"          => $created,
                    "order_opened_by" => $this->revel['user'],
                    "order_opened_at" => ($data['revel_location_id'] > 0) ? "/resources/PosStation/".$data['revel_location_id']."/": "/resources/PosStation/1/",
                    "closed"          => null,
                    "order"           => null,
                    "uuid"            => $this->generateUUID())
            )
        );

        $message = $this->postResource('OrderAllInOne', $revelData, true);
        $empolyee_code = $this->logs_model->getEmployeeCode((int)$data['employee_id']);
        $log = array(
            'employee_id' => $empolyee_code,
            'audit_name' => 'Order Revel Create',
            'description' => $message
        );

        $this->logs_model->insertAuditLog($log);

        return basename($this->headers['location']) ;
    }

    public function update($data)
    {
        $revelData = array(
            "auto_grat_pct"           => null,
            "bills_info"              => "",
            "call_name"               => null,
            "call_number"             => 0,
            "closed"                  => null,
            "created_at"              => ($data['revel_location_id'] > 0) ? "/resources/PosStation/" . $data['revel_location_id'] . "/" : "resources/PosStation/1/",
            "created_by"              => "/enterprise/User/1/",
            "customer"                => ($data['revel_customer_id'] > 0) ? "/resources/Customer/" . $data['revel_customer_id'] . "/" : "/resources/Customer/1/",
            "delivery_clock_in"       => null,
            "delivery_clock_out"      => null,
            "delivery_employee"       => null,
            "dining_option"           => 1,
            "discount"                => null,
            "discount_amount"         => $data['discount'],
            "discount_reason"         => "",
            "discount_rule_amount"    => null,
            "discount_rule_type"      => null,
            "discount_tax_amount"     => null,
            "discount_taxed"          => null,
            "establishment"           => "/enterprise/Establishment/1/",
            "exchange_discount"       => null,
            "exchanged"               => null,
            "external_sync"           => null,
            "final_total"             => $data['subtotal'],
            "gratuity"                => 0,
            "gratuity_type"           => 0,
            "has_delivery_info"       => 0,
            "local_id"                => "57189",
            "notification_email_sent" => 0,
            "notification_text_sent"  => 0,
            "number_of_people"        => 1,
            "orderhistory"            => array(null),
            "points_added"            => 0,
            "points_redeemed"         => 0,
            "pos_mode"                => "T",
            "prevailing_surcharge"    => 0,
            "prevailing_tax"          => 0,
            "printed"                 => false,
            "remaining_due"           => 10,
            "resource_uri"            => "/resources/Order/286/",
            "rounding_delta"          => 0,
            "service_charge"          => 0,
            "subtotal"                => $data['subtotal'],
            "surcharge"               => 0,
            "table"                   => NULL,
            "table_owner"             => null,
            "tax"                     => 0,
            "tax_country"             => "",
            "tax_rebate"              => null,
            "updated_by"              => "/enterprise/User/1/",
            "uuid"                    => $this->generateUUID(),
            "web_order"               => true
        );

        $message = $this->putResource('Order', $revelData, $data['revel_order_id'], true);

        $empolyee_code = $this->logs_model->getEmployeeCode((int)$data['employee_id']);
        $log = array(
            'employee_id' => $empolyee_code,
            'audit_name' => 'Order Revel Update',
            'description' => $message
        );

        $this->logs_model->insertAuditLog($log);
        return $message;

    }

    public function delete($revel_order_id){

        return $this->deleteResource('Order', $revel_order_id, true);

    }

    public function getEstablishmentID($location_id){

        $row = $this->db->select('revel_establishment_id')->where(array('location_id'=>$location_id))->get('locations');
        if ($row->num_rows() > 0) {
            $res = $row->row();

            return $res->revel_establishment_id;

        } else {

            return null;
        }
    }

    public function getEstablishmentProductID($revel_establishment_id,$is_custom=0){

        if($is_custom ==1){
            $row = $this->db->select('revel_product_id')->where(array('revel_establishment_id'=>$revel_establishment_id,'is_custom_product'=>$is_custom))->get('establishments');
        }else{
            $row = $this->db->select('revel_product_id')->where(array('revel_establishment_id'=>$revel_establishment_id,'is_custom_product !='=>1))->get('establishments');
        }

        if ($row->num_rows() > 0) {

            $res = $row->row();
            return $res->revel_product_id;
        } else {
            return null;
        }

    }

    public function getRevelID($table, $id)
    {
        if ($table == 'cakes') {
            $rid       = 'revel_product_id';
            $condition = array('cake_id' => $id);
        } elseif ($table == 'customers') {
            $rid       = 'revel_customer_id';
            $condition = array('customer_id' => $id);
        } elseif ($table == 'locations') {
            $rid       = 'revel_location_id';
            $condition = array('location_id' => $id);
        } elseif ($table == 'orders') {
            $rid       = 'revel_order_id';
            $condition = array('order_id' => $id);
        } elseif ($table == 'meta') {
            $rid       = 'revel_user_id';
            $condition = array('user_id' => $id);
        }

        $row = $this->db->select($rid)->where($condition)->get($table);

        if ($row->num_rows() > 0) {
            $res = $row->row();

            return $res->$rid;
        } else {
            return null;
        }
    }

    public function getById($orderId)
    {
        return json_decode($this->getResource('OrderAllInOne/' . $orderId . '/'), true);
    }

    public function updateOrderUser($orderId)
    {
        $order = $this->getById($orderId);
        $payment = $this->getPayment($orderId);

        if ($payment) {
            $order['created_by'] = $payment['created_by'];
            $this->putResource('Order', $order, $orderId);

        }
    }

    public function getPayment($orderId)
    {
        $params = array('format' => 'json', 'order' => $orderId);
        $resource = 'Payment';

        $client = \Httpful\Request::get($this->revel['endpoint'] . '/resources/' . $resource . '/?' . http_build_query($params));

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $response = $client->send();

        $this->code     = $response->code;
        $this->response = $response->body;
        $this->headers  = $response->headers;

        if ($response->code == 200) {
            $result = json_decode($response->raw_body, true);
            return $result['objects'][0];
        }

        return false;
    }
}