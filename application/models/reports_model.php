<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Reports_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getReportCategory($data=array()){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);
        $query="SELECT
                COUNT(orders.cake_id) AS ordered,
                COALESCE(cakes.title,'Custom cake') AS cake_name,
                COALESCE(categories.title,'Custom cake') AS cake_category_name
            FROM orders LEFT OUTER JOIN cakes ON orders.cake_id = cakes.cake_id
                 LEFT JOIN categories ON cakes.category_id = categories.category_id
            WHERE (order_date >= '$startdate' && order_date <= '$enddate' && order_status !=300)
            GROUP BY orders.cake_id ORDER BY orders.cake_id ASC";

        $sql=$this->db->query($query);
        if($sql ->num_rows() > 0){
            return $result = $sql->result();
        }else{
            return false;
        }


    }

    function getReportCategoryCSV($data=array()){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);
        $query="SELECT COALESCE(cakes.title,'Custom cake') AS cake_name,
                COALESCE(categories.title,'Custom cake') AS category_name,COUNT(orders.cake_id) AS ordered
                FROM orders LEFT OUTER JOIN cakes ON orders.cake_id = cakes.cake_id
                LEFT JOIN categories ON cakes.category_id = categories.category_id
                WHERE (order_date >= '$startdate' && order_date <= '$enddate' && order_status !=300)
                GROUP BY orders.cake_id ORDER BY orders.cake_id ASC";

        $result=$this->db->query($query);

        $array = array(
            array($start_date.'To'.$end_date),
            array('Cake Name', 'Category Name', 'Ordered'),

        );
        foreach ($result->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        return $array;

    }
    function getReportCustomer($data=array()){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);
        $query="SELECT
	CONCAT(customers.last_name,customers.first_name) AS customer_name,
	customers.phone_number,
	customers.address_1,
	customers.city,
	customers.province,
	customers.postal_code,
	COUNT(orders.customer_id) AS ordered,
	SUM(orders.total_price) AS totalPrice
FROM customers INNER JOIN orders ON customers.customer_id = orders.customer_id
WHERE (order_date >= '1380720468' && order_date <= '1381429376' && order_status !=300)
GROUP BY customers.customer_id
ORDER BY customers.first_name ASC";

        $sql=$this->db->query($query);
        if($sql ->num_rows() > 0){
            return $result = $sql->result();
        }else{
            return false;
        }


    }

    function getReportCustomerCSV($data=array()){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);
        $query="SELECT
	CONCAT(customers.last_name,customers.first_name) AS customer_name,
	customers.phone_number,
	customers.address_1,
	customers.city,
	customers.postal_code,
	customers.province,
	COUNT(orders.customer_id) AS ordered,
	SUM(orders.total_price) AS totalPrice
FROM customers INNER JOIN orders ON customers.customer_id = orders.customer_id
WHERE (order_date >= '1380720468' && order_date <= '1381429376' && order_status !=300)
GROUP BY customers.customer_id
ORDER BY customers.first_name ASC";

        $result=$this->db->query($query);

        $array = array(
            array($start_date.'To'.$end_date),
            array('Name','Phone','Address', 'City ', 'Postal code ','Province','# of orders','Total sales of orders'),

        );
        foreach ($result->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        return $array;

    }

    private function  totalServings($flavour_id,$serving_id){

        $query = "SELECT count(orders.serving_id) AS servings
                  FROM orders
                  WHERE orders.flavour_id = $flavour_id && orders.serving_id = $serving_id";

        $result=$this->db->query($query);
        if($result -> num_rows() > 0){
            $row = $result->row();
            return  $row->servings;
        }else{
            return false;
        }


    }

    function getReportProducts(){

        $data="";
            $query='SELECT servings.title,servings.serving_id FROM servings';
            $result=$this->db->query($query);
            $serings = $result->result();

            $query='SELECT flavours.title,flavours.flavour_id FROM flavours';
            $result=$this->db->query($query);
            $flavours = $result->result();
            $data .='<table class="table table-bordered table-primary table-striped" >';

            $data .="<thead><tr><th>Flavour Name</th>";
            foreach($serings as $serv){
            $data .="<th>".$serv->title."</th>";

            }
            $data .="</tr></thead><tbody>";
            foreach($flavours as $flav){
                $data .="<tr>";
                $data .="<td>".$flav->title."</td>";
                foreach($serings as $serv ){
                    $data .="<td>".$this->totalServings($flav->flavour_id,$serv->serving_id)."</td>";

                }
                $data .="</tr>";
            }

        $data .='</tbody></table>';

        return $data;

    }

    function getReportProductsCSV(){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);

        $data="";
        $query='SELECT servings.title,servings.serving_id FROM servings';
        $serv_result=$this->db->query($query);
        $serings = $serv_result->result();

        $query='SELECT flavours.title,flavours.flavour_id FROM flavours';
        $result=$this->db->query($query);
        $flavours = $result->result();


        $array =array();

        foreach ($serv_result->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }

        foreach ($flavours as $flav)
        {
            $line = array();
            foreach($serings as $serv ){

                $line[] = $this->totalServings($flav->flavour_id,$serv->serving_id);
            }
            $array[] = $line;
        }

        return $array;


    }
    function getReportProductsCSVTable(){

        $firstDay = date('d-m-Y', mktime(0, 0, 0, date("m", strtotime("-1 month")), 1, date("Y",strtotime("-1 month"))));
        $lastDay = date('d-m-Y', mktime(-1, 0, 0, date("m"), 1, date("Y")));

        $start_date= isset($data['start_date']) ? ($data['start_date']):($firstDay);
        $end_date= isset($data['end_date']) ? ($data['end_date']):($lastDay);
        $startdate  = strtotime($start_date);
        $enddate    = strtotime($end_date);

        $data="";
        $query='SELECT servings.title,servings.serving_id FROM servings';
        $serv_result=$this->db->query($query);
        $serings = $serv_result->result();

        $query='SELECT flavours.title,flavours.flavour_id FROM flavours';
        $result=$this->db->query($query);
        $flavours = $result->result();
        $data .='<table>';
        $data .="<tr>";
        foreach($serings as $serv){
            $data .="<td>".$serv->title." , </td>";

        }
        $data .="</tr>";
        foreach($flavours as $flav){
            $data .="<tr>";
            $data .="<td>".$flav->title." , </td>";
            foreach($serings as $serv ){
                $data .="<td>".$this->totalServings($flav->flavour_id,$serv->serving_id)." , </td>";

            }
            $data .="</tr>";
        }

        $data .='</table>';
        return $data;

    }

}