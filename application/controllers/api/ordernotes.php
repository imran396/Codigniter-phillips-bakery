<?php

include_once __DIR__ . '/API_Controller.php';

class Ordernotes extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('orders_model');
    }

    public function index(){

        $lastdate=$this->input->get('lastupdate');
        if(empty($lastdate)){
            $data = $this->orders_model->getOtrderAllNotes();
        }else{
            $data = $this->orders_model->getLastUpdateAllNotes($lastdate);
        }
        $this->sendOutput($data);

    }


    public function notes($order_id){

        $data = $this->orders_model->getOrderNotes($order_id);
        $this->sendOutput($data);

    }

    
    public function insert(){
        if(!empty($_POST)){
            $this->orders_model->SaveNotes($_POST);
            if($this->db->insert_id()){
                $data = array('message'=>'created successfull','code'=>'201');
                $this->sendOutput($data);
            }
        }
    }

    public function search(){
        $request = $this->input->get('order_id');
        if($request){
        $data = $this->orders_model->search($request);
        $this->sendOutput($data);
        }

    }

}
