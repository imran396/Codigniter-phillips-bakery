<?php

class Revel_Employee extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Employee');
    }

    public function create($data)
    {
        return $this->postResource('Employee', $data);
    }
}