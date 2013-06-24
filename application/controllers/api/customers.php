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


   public function add()
    {
        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
            }

        }
    }

    public function update($id = NULL)
    {
        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
            }

        }
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('first_name');
        $this->form_validation->set_rules('last_name');
        $this->form_validation->set_rules('email');
        $this->form_validation->set_rules('phone_number', 'Phone Number Title','required|trim|xss_clean');
        $this->form_validation->set_rules('customer_id');
        $this->form_validation->set_rules('address1');
        $this->form_validation->set_rules('address2');
        $this->form_validation->set_rules('city');
        $this->form_validation->set_rules('province');
        $this->form_validation->set_rules('postal_code');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('status');

    }

    private function saveData()
    {
            $data = $this->input->post();
            $this->customers_model->create($data);

    }

    private function UpdateData($id = NUll){
        $this->customers_model->save($data, $data['customer_id']);
    }


}