<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Orders extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->layout->setLayout('layout_admin');
        $this->load->helper('uploader');
        $this->load->model(array('orders_model','productions_model','gallery_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function listing($starts=0)
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->orders_model->getListing($starts);
        $this->layout->view('admin/orders/listing_view', $this->data);


    }

    public function details($order_code)
    {
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->setLayout('layout_custom');
        $result= $this->productions_model->orderDetails($order_code);
        if($result ->num_rows > 0 ){
            $this->data['queryup']=$result->row();
            $this->layout->view('admin/orders/details_view', $this->data);
        }else{
            redirect('admin/productions/inproduction');

        }
    }


    public function search(){

        $request = $this->input->post('search');
        if($request){

            $order_code = $this->productions_model->doSearch($request);
            if($order_code > 0){
                echo $order_code;
            }else{
                return false;
            }
        }

    }


    public function remove($id)
    {
        $this->servings_model->delete($id);
        $this->redirectToHome("listing");

    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/servings/'.$redirect);
    }

}