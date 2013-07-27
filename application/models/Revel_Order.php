<?php

class Revel_Order extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('OrderAllInOne');
    }

    public function create($data)
    {
        $data = array(
            'establishment' => $this->revel['establishment'],
            'uuid'          => $this->generateUUID(),
        );

        return $this->postResource('OrderAllInOne', $data, true);
    }
}