<?php

include_once __DIR__ . '/API_Controller.php';

class Customers extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
        $this->load->model('revel_customer');
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

            if(isset($data)){
                try{
                    $data['revel_customer_id']= $this->revel_customer->create($data);
                }catch (\Exception $e){
                    $data['revel_customer_id'] = null;
                }

            }

            $customer_id = $this->customers_model->create($data);

            $data = array(
                array(
                    'customer_id' => $customer_id
                ),
            );

            if($customer_id) {

                if(isset($_REQUEST['employee_id'])){
                    $empolyee_code = $this->logs_model->getEmployeeCode($_REQUEST['employee_id']);
                     if(!empty($empolyee_code)){
                        $log = array(
                            'employee_id' => $empolyee_code,
                            'audit_name' => 'customer created',
                            'description' =>  'customer_id='. $customer_id
                        );
                        $this->logs_model->insertAuditLog($log);
                    }
                }
            }

           $this->sendOutput($data);

    }

    public function update(){

            $data = $this->input->post();
            $this->customers_model->save($data, $data['customer_id']);
            $customerUpdatedData = $this->customers_model->getcustomers($data['customer_id']);
            $data['revel_customer_id'] = $customerUpdatedData[0]->revel_customer_id;
            try{
                $this->revel_customer->update($data);
            }catch (\Exception $e){

            }


            if($data['customer_id']) {

                if(isset($_REQUEST['employee_id'])){
                    $empolyee_code = $this->logs_model->getEmployeeCode($_REQUEST['employee_id']);
                    if(!empty( $empolyee_code )){
                        $log = array(
                            'employee_id' => $empolyee_code,
                            'audit_name' => 'customer created',
                            'description' =>  'customer_id='. $data['customer_id']
                        );
                        $this->logs_model->insertAuditLog($log);
                    }
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