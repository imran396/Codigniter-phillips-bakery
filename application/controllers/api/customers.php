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
            $data_['employee_id'] = $data['employee_id'];
            unset($data['employee_id']);
            $data['status']=1;
            $customer_id = $this->customers_model->create($data);

            $data = array(
                array(
                    'customer_id' => $customer_id
                ),
            );

          if($customer_id) {
            $empolyee_code = $this->orders_model->getEmployeeCode($data_['employee_id']);

           $data_customer = array(
                'employee_id' => $empolyee_code,
                'audit_name' => 'customer created',
                'description' =>  'customer_id='. $data['customer_id'],
            );
            $this->orders_model->insertAuditLog($data_customer);
          }

           $this->sendOutput($data);

    }

    public function update(){

            $data = $this->input->post();
            $data_['employee_id'] = $data['employee_id'];
            unset($data['employee_id']);
            $this->customers_model->save($data, $data['customer_id']);

            if($data['customer_id']) {
            $empolyee_code = $this->orders_model->getEmployeeCode($data_['employee_id']);

            $data_customer = array(
                'employee_id' => $empolyee_code,
                'audit_name' => 'customer created',
                'description' =>  'customer_id='. $data['customer_id'],
            );
            $this->orders_model->insertAuditLog($data_customer);
         }
            $data = array(
            array(
                'customer_id' => $data['customer_id']
            ),

        );
        $this->sendOutput($data);
    }

    public function search(){
            $request = $this->input->get();
            if($request){
                $data = $this->customers_model->search($request);
                $this->sendOutput($data);
            }

    }

}