<?php

include_once __DIR__ . '/API_Controller.php';

class Cakes extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cakes_model');
    }

    public function index()
    {
        $lastdate=$this->input->get('lastupdate');

        if(empty($lastdate)){
            $data = $this->cakes_model->getAllCakes();
        }else{

            $data = $this->cakes_model->getLastUpdateAll($lastdate);
        }
        $this->sendOutput($data);
    }
}