<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once __DIR__ . '/../base.php';

class Products extends Base
{
	public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
    }

    public function index()
	{
		$this->load->model('product');

        $this->data['products'] = $this->product->getAll();

        $this->layout->view('admin/products/index', $this->data);
	}
}