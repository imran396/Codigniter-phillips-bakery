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
        //$this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function category_reports()
    {
        $this->data['active']=$this->uri->segment(2,0);
        $data = $_REQUEST;
        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? strtotime($data['start_date']):$firstDay;
        $end_date= isset($data['end_date']) ? strtotime($data['end_date']):$lastDay;

        $query="SELECT orders.cake_id,
                orders.order_date,
                COUNT(orders.cake_id),
                COALESCE(cakes.title,'Custom cake') AS cake_name,
                COALESCE(categories.title,'Custom cake') AS cake_category_name
            FROM orders LEFT OUTER JOIN cakes ON orders.cake_id = cakes.cake_id
                 LEFT JOIN categories ON cakes.category_id = categories.category_id
            WHERE (order_date >= '$start_date' && order_date <= '$end_date' && order_status !=300)
            GROUP BY orders.cake_id ORDER BY orders.cake_id ASC";

        $sql=$this->db->query($query);
        if($sql ->num_rows() > 0){
            $this->data['result']=$sql->result();
        }else{
            $this->data['result']="";
        }

        print_r($this->data['result']);

        $this->layout->view('admin/reports/report_category_view', $this->data);
    }

    public function category_orders_csvfile()
    {

        $data = $_REQUEST;
        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? strtotime($data['start_date']):$firstDay;
        $end_date= isset($data['end_date']) ? strtotime($data['end_date']):$lastDay;

        $query="SELECT orders.cake_id,
                orders.order_date,
                COUNT(orders.cake_id) AS ordered,
                COALESCE(cakes.title,'Custom cake') AS cake_name,
                COALESCE(categories.title,'Custom cake') AS cake_category_name
            FROM orders LEFT OUTER JOIN cakes ON orders.cake_id = cakes.cake_id
                 LEFT JOIN categories ON cakes.category_id = categories.category_id
            WHERE (order_date >= '$start_date' && order_date <= '$end_date' && order_status !=300)
            GROUP BY orders.cake_id ORDER BY orders.cake_id ASC";

        $sql=$this->db->query($query);
        $query=$sql->result();
        query_to_csv($query, TRUE, 'category_reports.csv');

    }

    public function customers($start=0)
    {
        $this->data['paging'] = $this->logs_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/auditlog/listing_view', $this->data);
    }

    public function customers_csvfile()
    {

        $query = $this->db->get('auditlog');
        query_to_csv($query, TRUE, 'toto.csv');

    }

}