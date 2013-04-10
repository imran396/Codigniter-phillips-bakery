<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/BaseModel.php';

class Product extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('products');
    }

    public function getAll()
    {
        return $this->findAll();
    }
}