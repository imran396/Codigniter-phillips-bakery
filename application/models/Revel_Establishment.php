<?php

class Revel_Establishment extends Revel_Model
{
    public function getAll()
    {
        return $this->getResource('Establishment');
    }
}