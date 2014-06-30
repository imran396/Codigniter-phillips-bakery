<?php
include_once __DIR__ . '/API_Controller.php';

class Mailgun extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function save(){

        $data = $this->input->post();
        $this->db->set(array('subject'=>$data['subject']))->insert('order_emails');
        $this->sendOutput($data);
        print_r($data);

    }


}