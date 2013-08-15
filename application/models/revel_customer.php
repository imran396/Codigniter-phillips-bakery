<?php

class Revel_Customer extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('customer');
    }

    public function create($data)
    {
        $customedrata = array(
            'first_name' => isset($data['first_name']) ? $data['first_name'] : null,
            'last_name' => isset($data['last_name']) ? $data['last_name'] : null,
            'total_purchases' => 0.0,
            'exp_date' => '2010-11-10T03:07:43',
            'uuid' => $this->generateUUID(),
            'cc_exp' => null,
            'cc_number' => 'hello world',
            'is_visitor' => 1,
            'cc_first_name' => 'test',
            'picture' => null,
            'lic_number' => '12344',
            'ref_number' => 'tst',
            'notes' => 'hello',
            'cc_last_4_digits' => '4567',
            'total_visits' => 34,
            'birth_date' => '010-11-10T03:07:43',
            'cc_last_name' => 'test',
            'phone_number' => isset($data['phone_number']) ? $data['phone_number'] : null,
            'email' => isset($data['email']) ? $data['email'] : null,
            'city' => isset($data['city']) ? $data['city'] : null,
            'address' => isset($data['address_1']) ? $data['address_1'] : null,
            'state' => isset($data['province']) ? $data['province'] : null,
            'zipcode' => isset($data['postal_code']) ? $data['postal_code'] : null,
            'country' => isset($data['country']) ? $data['country'] : null,
            'created_by' => '/enterprise/User/1/',
            'updated_date' => date("Y-m-dTH:i:s"),
            'updated_by' => '/enterprise/User/19/',
            'created_date' => date("Y-m-dTH:i:s"),
        );
        $this->postResource('customer', $customedrata);
        return basename($this->headers['location']);
    }
}