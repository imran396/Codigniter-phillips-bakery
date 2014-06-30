<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Reports extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->load->helper('csv');
        $this->load->model(array('reports_model'));

    }

    public function category_reports()
    {
        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $this->data['result']=$this->reports_model->getReportCategory($data);
        $this->layout->view('admin/reports/report_category_view', $this->data);
    }

    public function category_report_csvfile()
    {
        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $array =$this->reports_model->getReportCategoryCSV($data);
        if(!empty($array)){
            array_to_csv($array,'category report.csv');
        }else{
            $this->layout->view('admin/reports/report_category_view', $this->data);
        }

    }

    public function customer_reports(){
        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $this->data['result']=$this->reports_model->getReportCustomer($data);
        $this->layout->view('admin/reports/report_customer_view', $this->data);
    }

    public function customer_reports_csvfile()
    {

        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $array =$this->reports_model->getReportCustomerCSV($data);
        if(!empty($array)){
            array_to_csv($array,'customer report.csv');
        }else{
            $this->layout->view('admin/reports/report_customer_view', $this->data);
        }

    }

    public function product_reports()
    {
        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $this->data['result']=$this->reports_model->getReportProducts($data);
        $this->layout->view('admin/reports/report_product_view', $this->data);
    }

    public function product_reports_csvfile()
    {
        $this->data['active']=$this->uri->segment(3,0);
        $data = $_REQUEST;
        $table=$this->reports_model->getReportProductsCSV($data);
        array_to_csv($table,'product report.csv');

    }



}