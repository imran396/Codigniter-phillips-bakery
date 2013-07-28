<?php

class Revel_Customer extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Customer');
    }

    public function create($data)
    {
        $data = array(
            'uuid'        => $this->generateUUID()
        );

        return $this->postResource('Customer', $data);
    }
}