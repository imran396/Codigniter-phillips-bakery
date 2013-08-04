<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->layout->setLayout('layout_admin');
        $this->load->model(array('orders_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
       // $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));


    }

    public function index()
    {

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }

        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->orders_model->getListing($starts=0);
        $this->layout->view('admin/orders/listing_view', $this->data);

    }

    function theme(){

        $this->data['active']='Admin Theme';
        $this->layout->view('admin/theme_html', $this->data);

    }


}