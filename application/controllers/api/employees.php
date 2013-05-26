<?php

include_once __DIR__ . '/API_Controller.php';

class Employees extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            array(
                'user_id'     => 1,
                'employee_id' => 'SP-10001',
                'first_name'  => "Emran",
                'last_name'   => "Hasan",
                'role'        => "administrator"
            ),
            array(
                'user_id'     => 2,
                'employee_id' => 'SP-10002',
                'first_name'  => "Shafiq",
                'last_name'   => "Hussain",
                'role'        => "manager"
            ),
            array(
                'user_id'     => 3,
                'employee_id' => 'SP-10003',
                'first_name'  => "Imran",
                'last_name'   => "Ahmed",
                'role'        => "employee"
            )
        );

        $this->sendOutput($data);
    }
}