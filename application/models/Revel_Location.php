<?php

class Revel_Location extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('PosStation');
    }

    public function create($data)
    {
        $data = array(
            'name'          => $data['name'],
            'establishment' => $this->revel['establishment'],
            'active'        => true,
            'pos_mode'      => 'T',
            'uuid'          => $this->generateUUID()
        );

        return $this->postResource('PosStation', $data);
    }
}