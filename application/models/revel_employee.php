<?php

class Revel_Employee extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('Employee');
    }

    public function create($data)
    {
        $employeeData = array(
            'created_by'         => '/enterprise/User/1/',
            'created_date'       => date("c"),
            'email'              => $data['email'],
            'employee_card'      => '',
            'employee_end'       => null,
            'employee_start'     => '2013-01-01T12:00:00',
            'employee_lastlogin' => null,
            'exempt'             => false,
            'first_name'         => $data['first_name'],
            'last_name'          => $data['last_name'],
            'pin'                => '1234',
            'roles'              => array("/resources/Role/1/"),
            'updated_by'         => '/enterprise/User/1/',
            'updated_date'       => date("c"),
            'user'               => '/enterprise/User/1/',
            'active'             => true,
            'external_id'        => time(),
            'picture'            => null,
            'establishment'      => '/enterprise/Establishment/1/',
        );

        return $this->postResource('Employee', $employeeData, true);
    }

    public function delete($id)
    {
        return $this->deleteResource('Employee', $id, true);
    }
}