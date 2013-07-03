<?php

include_once __DIR__ . '/API_Controller.php';

class Customers extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    public function index()
    {
        $data = $this->customers_model->getAll();
        $this->sendOutput($data);
    }


    public function insert()
    {
            $data = $this->input->post();
            $data['status']=1;
            $customer_id = $this->customers_model->create($data);

            $data = array(
                array(
                    'customer_id' => $customer_id
                ),

            );
           $this->sendOutput($data);

    }

    public function update(){

            $data = $this->input->get();
            $this->customers_model->save($data, $data['customer_id']);
    }

    public function search(){
            $request = $this->input->get();
            if($request){
                $data = $this->customers_model->search($request);
                $this->sendOutput($data);
            }

    }

}