<?php

class Revel_Customer extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Customer');
    }

    public function create($data)
    {
        $post_data = array(
            'first_name'=> $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $data['phone_number'],
            'email'=> $data['email'],
            'city' => $data['city'],
            'address' => $data['address_1'],
            'state' => $data['state'],
            'zipcode' => $data['postal_code'],
            'country' => $data['country'],
            'uuid'          => $this->generateUUID()

        );
        return $this->postResource('Customer', $post_data);
    }
}