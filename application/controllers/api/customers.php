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
            $employee['employee_id'] = $data['employee_id'];
            unset($data['employee_id']);
            $data['status']=1;
            $customer_id = $this->customers_model->create($data);

            $data = array(
                array(
                    'customer_id' => $customer_id
                ),
            );

            if($customer_id) {

                $empolyee_code = $this->logs_model->getEmployeeCode($employee['employee_id']);
                 if(!empty($empolyee_code)){
                    $log = array(
                        'employee_id' => $empolyee_code,
                        'audit_name' => 'customer created',
                        'description' =>  'customer_id='. $customer_id
                    );
                    $this->logs_model->insertAuditLog($log);
                }
            }

           $this->sendOutput($data);

    }

    public function update(){

            $data = $this->input->post();
            $employee['employee_id'] = $data['employee_id'];
            unset($data['employee_id']);
            $this->customers_model->save($data, $data['customer_id']);
            if($data['customer_id']) {

                $empolyee_code = $this->logs_model->getEmployeeCode($employee['employee_id']);
                if(!empty($empolyee_code)){
                    $log = array(
                        'employee_id' => $empolyee_code,
                        'audit_name' => 'customer created',
                        'description' =>  'customer_id='. $data['customer_id']
                    );
                    $this->logs_model->insertAuditLog($log);
                }
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