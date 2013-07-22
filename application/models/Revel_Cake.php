<?php

class Revel_Cake extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Product');
    }

    public function create($data)
    {
        $post_data = array(
            'name'          => $data['title'],
            'sku'          => $data['cake_id'],
            'image '          => $data['image'],
            'created_date'          => $data['created_date'],
            'establishment' => $this->revel['establishment'],
            'active'        => true,
            'uuid'          => $this->generateUUID()
        );

        return $this->postResource('Product', $post_data);
    }
}