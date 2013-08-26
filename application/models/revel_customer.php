<?php

class Revel_Customer extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('Customer');
    }

    public function create($data)
    {
        $customerData = array(
            'first_name'       => isset($data['first_name']) ? $data['first_name'] : null,
            'last_name'        => isset($data['last_name']) ? $data['last_name'] : null,
            'total_purchases'  => 0.0,
            'exp_date'         => '2015-11-10T03:07:43',
            'uuid'             => $this->generateUUID(),
            'cc_exp'           => null,
            'cc_number'        => null,
            'is_visitor'       => false,
            'cc_first_name'    => null,
            'picture'          => 'Test',
            'lic_number'       => null,
            'ref_number'       => null,
            'notes'            => 'Test',
            'cc_last_4_digits' => null,
            'total_visits'     => 1,
            'cc_last_name'     => null,
            'phone_number'     => isset($data['phone_number']) ? $data['phone_number'] : null,
            'email'            => isset($data['email']) ? $data['email'] : null,
            'city'             => isset($data['city']) ? $data['city'] : null,
            'address'          => isset($data['address_1']) ? $data['address_1'] : null,
            'addresses'        => array(
                array(
                    "street_1" => isset($data['address_1']) ? $data['address_1'] : null,
                    "street_2" => isset($data['address_2']) ? $data['address_2'] : null,
                )
            ),
            'state'            => null,
            'zipcode'          => isset($data['postal_code']) ? $data['postal_code'] : null,
            'country'          => isset($data['country']) ? $data['country'] : null,
            'created_by'       => '/enterprise/User/1/',
            'updated_date'     => date("Y-m-dTH:i:s"),
            'updated_by'       => '/enterprise/User/1/',
            'created_date'     => date("Y-m-dTH:i:s"),
        );

        $this->postResource('Customer', $customerData, true);
        return basename($this->headers['location']);
    }

    public function update($data)
    {
        $customerData = array(
            'revel_id'      => isset($data['revel_customer_id']) ? $data['revel_customer_id'] : null,
            'cc_exp'           => null,
            'cc_number'        => null,
            'is_visitor'       => false,
            'cc_first_name'    => null,
            'picture'          => 'Test',
            'lic_number'       => null,
            'ref_number'       => null,
            'notes'            => 'Test',
            'cc_last_4_digits' => null,
            'total_visits'     => 1,
            'cc_last_name'     => null,
            'phone_number'     => isset($data['phone_number']) ? $data['phone_number'] : null,
            'email'            => isset($data['email']) ? $data['email'] : null,
            'city'             => isset($data['city']) ? $data['city'] : null,
            'address'          => isset($data['address_1']) ? $data['address_1'] : null,
            'state'            => isset($data['province']) ? $data['province'] : null,
            'zipcode'          => isset($data['postal_code']) ? $data['postal_code'] : null,
            'country'          => isset($data['country']) ? $data['country'] : null,
        );

        $this->putResource('Customer', $customerData, true);
        return basename($this->headers['location']);
    }
}