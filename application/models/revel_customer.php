<?php

class Revel_Customer extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('Customer');
    }
    public function create($data)
    {
        $created = date('Y-m-d') . 'T' . date('H:i:s');

        $customerData = array(
            "active"                => true,
            "address"               => "",
            "addresses"             => array(
                array(
                    "active"                => true,
                    "city"                  => isset($data['city']) ? $data['city'] : null,
                    "country"               => "CA",
                    "email"                 => isset($data['email']) ? $data['email'] : null,
                    "name"                  => isset($data['first_name']) ? $data['first_name'] : null,
                    "phone_number"          => isset($data['phone_number']) ? $data['phone_number']:null,
                    "primary_billing"       => true,
                    "primary_shipping"      => false,
                    "state"                 => "CA",
                    "street_1"              => isset($data['address_1']) ? $data['address_1'] : null,
                    "street_2"              => isset($data['address_2']) ? $data['address_2'] : null,
                    "uuid"                  => $this->generateUUID(),
                    "zipcode"               => isset($data['postal_code']) ? $data['postal_code'] : null
                )
            ),
            "birth_date"            => null,
            "cc_exp"                => null,
            "cc_first_name"         => null,
            "cc_last_4_digits"      => null,
            "cc_last_name"          => null,
            "cc_number"             => null,
            "city"                  => isset($data['city']) ? $data['city'] : null,
            "created_by"            => "/enterprise/User/1/",
            "created_date"          => $created,
            "customer_groups"       => array(),
            "email"                 => isset($data['email']) ? $data['email'] : null,
            "exp_date"              => $created,
            "first_name"            => isset($data['first_name']) ? $data['first_name'] : null,
            "is_visitor"            => false,
            "last_name"             => isset($data['last_name']) ? $data['last_name'] : null,
            "lic_number"            => null,
            "notes"                 => "test",
            "phone_number"          => isset($data['phone_number']) ? $data['phone_number']:null,
            "picture"               => "",
            "ref_number"            => "",
            "state"                 => null,
            "total_purchases"       => 0,
            "total_visits"          => 0,
            "updated_by"            => "/enterprise/User/1/",
            "updated_date"          => $created,
            "uuid"                  => $this->generateUUID(),
            "zipcode"               => isset($data['postal_code']) ? $data['postal_code'] : null

        );
        $this->postResource('Customer', $customerData, true);
        return basename($this->headers['location']);
    }



    public function update($data)
    {
        $customerData = array(

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

                    'city'             => isset($data['city']) ? $data['city'] : null,
                    'email'            => isset($data['email']) ? $data['email'] : null,
                    'phone_number'     => isset($data['phone_number']) ? $data['phone_number'] : null,
                    'state'          => null,
                    'street_1' => isset($data['address_1']) ? $data['address_1'] : null,
                    'street_2' => isset($data['address_2']) ? $data['address_2'] : null,
                    'zipcode'          => isset($data['postal_code']) ? $data['postal_code'] : null
                )
            ),
            'state'            =>   null,
            'zipcode'          => isset($data['postal_code']) ? $data['postal_code'] : null,
            'country'          => isset($data['country']) ? $data['country'] : null,
        );

        $this->putResource('Customer', $customerData,$data['revel_customer_id'],true);
        return basename($this->headers['location']);
    }

    public function delete($id)
    {
        $this->deleteResource('Customer', $id, true);
    }


}