<?php

class Test extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->config('app');

        $this->load->model('revel_model');
        $this->load->model('revel_location');
        $this->load->model('revel_employee');
    }

    public function locations()
    {
        $locations = $this->revel_location->getAll();

        header("Content-type: application/json");
        echo $locations;
    }

    public function createLocation()
    {
        $this->revel_location->create(array(
            'name' => 'Dhanmondi'
        ));
    }

    public function createEmployee()
    {
        $this->revel_employee->create(array(
            'created_by'            => '/enterprise/User/2/',
            'email'                 => 'emran@rightbrainsolution.com',
            'employee_card'         => '',
            'employee_end'          => null,
            'employee_start'        => '2010-01-01T12:00:00',
            'employee_lastlogin'    => null,
            'exempt'                => false,
            'first_name'            => 'Emran',
            'last_name'             => 'Hasan',
            'pin'                   => '12345',
            'roles'                 => array("/resources/Role/1/"),
            'updated_by'            => '/enterprise/User/2/',
            'user'                  => '/enterprise/User/2/',
            'active'                => true,
            'external_id'           => 100,
            'picture'               => null,
            'EmployeeEstablishment' => '/enterprise/Establishment/1/',
        ));
    }
}