<?php

class Revel_Employee extends Revel_Model
{
    public function __construct()
    {
        parent::__construct('User');
    }


    function  getUserEnterprise(){

        $resources =array();

        $params = array('offset' => 0, 'limit' => 1000, 'format' => 'json');
        $client = \Httpful\Request::get($this->revel['endpoint'] . '/enterprise/User/?' . http_build_query($params));

        $client->addHeaders(array('API-AUTHENTICATION' => $this->revel['api_key'] . ':' . $this->revel['api_secret']));
        $response = $client->send();

        $this->code     = $response->code;
        $this->response = $response->body;
        $this->headers  = $response->headers;

        $new = $response->raw_body;

        if ($data = json_decode($new)) {
            foreach ($data->objects as $object) {
                $resources[] = $object;
            }
        }

        return $resources;

    }



    public function create($data)
    {
        $employeeData = array(
            'created_by'         => '/enterprise/User/2/',
            'created_date'       => date("c"),
            'email'              => $data['email'],
            'employee_card'      => '',
            'employee_end'       => null,
            'employee_start'     => '2013-01-01T12:00:00',
            'employee_lastlogin' => null,
            'exempt'             => false,
            'first_name'         => $data['first_name'],
            'last_name'          => $data['last_name'],
            'pin'                => '1919',
            'roles'              => array("/resources/Role/3/"),
            'updated_by'         => '/enterprise/User/2/',
            'updated_date'       => date("c"),
            'user'               => '/enterprise/User/2/',
            'active'             => true,
            'external_id'        => time(),
            'picture'            => null,
            'establishment'      => '/enterprise/Establishment/1/',

        );

        return $this->postResource('Employee',$employeeData, true);
    }

    public function delete($id)
    {
        return $this->deleteResource('Employee', $id, true);
    }
}