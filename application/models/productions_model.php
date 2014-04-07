<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Productions_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();


    }

    public function getListing($start)
    {

        $curdate =date('m/d/Y');
        $vaughan_location = $this->orders_model->getVaughanLocation();
        $location_id = $this->session->userdata('locationid');
        if($location_id > 0 ){
            $location_id = $this->session->userdata('locationid');
        }else{
            $newdata = array(
                'locationid'  =>$vaughan_location
            );
            $this->session->set_userdata($newdata);
            $location_id = $this->session->userdata('locationid');
        }

        $per_page=10;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;
        $base_url = site_url('admin/productions/inproduction/');

        $this->db->from('orders');
        $this->db->where(array("orders.kitchen_location_id"=> $location_id,'order_status !='=>300));
        //$this->db->where('delivery_date >=',$curdate);
        //$this->db->where(array('order_status'=>'order'));
        $total_rows = $this->db->count_all_results();

        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name,customers.first_name,customers.last_name,order_status.description AS orderstatus');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->limit($per_page,$limit);
        $this->db->where(array("orders.kitchen_location_id"=> $location_id,'order_status !='=>300));
        //$this->db->order_by("orders.delivery_date", "desc");
        //$this->db->where('delivery_date >=',$curdate);
        $this->db->order_by("orders.delivery_date", "asc");
        $query =$this->db->get()->result();

        return array($query,$paging,$total_rows,$limit);

    }

    public function getFiltering($data){

        $location_id = $this->session->userdata('locationid');

        $order_status = (strtolower($data['order_status']) != "status" ) ? strtolower($data['order_status']) :'';
        $fondant = (strtolower($data['fondant']) != "fondant" ) ? strtolower($data['fondant']) :'';
        $flavour_id = (strtolower($data['flavour_id']) != "flavour" ) ? strtolower($data['flavour_id']) :'';
        $delivery_type = (strtolower($data['delivery_type']) != "pickup/delivery" ) ? strtolower($data['delivery_type']) :'';
        $start_date= $data['start_date'];
        $end_date= $data['end_date'];
        $start_time= $data['delivery_start_time'];
        $end_time= $data['delivery_end_time'];


        $data['orders.fondant'] =  $data['fondant'];
        unset($data['fondant']);
        $data['orders.flavour_id'] =  $data['flavour_id'];
        unset($data['flavour_id']);

        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name, flavours.fondant AS fondant_name, customers.first_name,customers.last_name,order_status.description AS orderstatus');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->where(array("orders.kitchen_location_id"=> $location_id,'order_status !='=>300));
        if($order_status){
            $this->db->where(array("orders.order_status"=> $order_status));
        }
        if($fondant){
            $this->db->where(array("orders.fondant"=> $fondant));
        }
        if($flavour_id){
            $this->db->where(array("orders.flavour_id"=> $flavour_id));
        }

        if($delivery_type){
            $this->db->where(array("orders.delivery_type"=> $delivery_type));
        }

        if($start_date && $end_date){
            $this->db->where(array("orders.delivery_date >="=> $start_date));
            $this->db->where(array("orders.delivery_date <="=> $end_date));
        }
        if($start_time && $end_time){
            $this->db->where(array("orders.delivery_time >="=> $start_time));
            $this->db->where(array("orders.delivery_time <="=> $end_time));
        }

        $this->db->order_by("orders.delivery_date", "desc");
        $query =$this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function getPrinting($data){

        $location_id = $this->session->userdata('locationid');

        $order_status = (strtolower($data['order_status']) != "status" ) ? strtolower($data['order_status']) :'';
        $fondant = (strtolower($data['fondant']) != "fondant" ) ? strtolower($data['fondant']) :'';
        $flavour_id = (strtolower($data['flavour_id']) != "flavour" ) ? strtolower($data['flavour_id']) :'';
        $delivery_type = (strtolower($data['delivery_type']) != "pickup/delivery" ) ? strtolower($data['delivery_type']) :'';
        $start_date= $data['start_date'];
        $end_date= $data['end_date'];
        $start_time= $data['delivery_start_time'];
        $end_time= $data['delivery_end_time'];

        if (isset($data['fondant']) && $data['fondant'] !=""){
            $data['orders.fondant'] =  $data['fondant'];
            unset($data['fondant']);
        }
        if (isset($data['flavour_id']) && $data['flavour_id'] !=""){
            $data['orders.flavour_id'] =  $data['flavour_id'];
            unset($data['flavour_id']);

        }

        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name, flavours.fondant AS fondant_name, customers.first_name,customers.last_name,order_status.description AS orderstatus');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->where(array("orders.kitchen_location_id"=> $location_id,'order_status !='=>300));
        if($order_status){
            $this->db->where(array("orders.order_status"=> $order_status));
        }
        if($fondant){
            $this->db->where(array("orders.fondant"=> $fondant));
        }
        if($flavour_id){
            $this->db->where(array("orders.flavour_id"=> $flavour_id));
        }

        if($delivery_type){
            $this->db->where(array("orders.delivery_type"=> $delivery_type));
        }

        if($start_date && $end_date){
            $this->db->where(array("orders.delivery_date >="=> $start_date));
            $this->db->where(array("orders.delivery_date <="=> $end_date));
        }
        if($start_time && $end_time){
            $this->db->where(array("orders.delivery_time >="=> $start_time));
            $this->db->where(array("orders.delivery_time <="=> $end_time));
        }

        $this->db->order_by("orders.delivery_date", "desc");
        $query =$this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function dateFormate($date){

        $cusdate=strtotime($date);
        return date("M j, Y",$cusdate);

    }

    public function orderDetails($order_code){

        $this->db->select('orders.* , orders.location_id AS locationid , orders.tiers AS orderTiers  ,cakes.*,flavours.title AS flavour_name ,customers.*,price_matrix.*,servings.title AS serving_title, shapes.title AS serving_size, zones.title AS zone_title, zones.title AS zone_title, zones.description AS zone_description,order_status.description AS orderstatus');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('price_matrix','price_matrix.price_matrix_id = orders.price_matrix_id','left');
        $this->db->join('servings','servings.serving_id = orders.serving_id','left');
        $this->db->join('zones','zones.zone_id = orders.delivery_zone_id','left');
        $this->db->join('shapes','shapes.shape_id = orders.shape_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->where(array("orders.order_code"=> $order_code));
        return $this->db->get();


    }
     public function orderPrint($order_id){

        $this->db->select('orders.* ,orders.flavour_id AS orders_flavour_id ,orders.tiers AS orders_tiers , orders.fondant AS orders_fondant ,  orders.location_id AS locationid ,order_location.title AS location_name , pickup_location.title as pickup_location_name, orders.tiers AS orderTiers  ,cakes.*,flavours.title AS flavour_name ,customers.*,price_matrix.*,servings.title AS serving_title, shapes.title AS serving_size, zones.title AS zone_title, zones.title AS zone_title, zones.description AS zone_description,order_status.description AS orderstatus,meta.first_name AS employee_first_name,meta.last_name AS employee_last_name');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('meta','meta.user_id = orders.employee_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('price_matrix','price_matrix.price_matrix_id = orders.price_matrix_id','left');
        $this->db->join('servings','servings.serving_id = orders.serving_id','left');
        $this->db->join('zones','zones.zone_id = orders.delivery_zone_id','left');
        $this->db->join('shapes','shapes.shape_id = orders.shape_id','left');
        $this->db->join('locations AS order_location','order_location.location_id = orders.location_id','left');
        $this->db->join('locations AS pickup_location','pickup_location.location_id = orders.pickup_location_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->where(array("orders.order_id"=> $order_id));
        return $this->db->get();
     }


    public function deliveryInfo($order_id=0){

        $result =$this->db
            ->where(array('delivery_order_id'=>$order_id))
            ->get('order_delivery');
        if($result->num_rows() > 0){
            return $result->row();
        }else{
            return false;
        }


    }

    public function orderNotes($order_id=0){

        $result =$this->db
            ->select('order_notes.*,meta.first_name,meta.last_name')
            ->join('meta',' meta.id =  order_notes.employee_id','left')
            ->where(array('is_deleted !='=>1,'order_notes.order_id'=>$order_id))
            ->order_by('create_date','desc')
            ->get('order_notes');
        if($result->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }

    }



    public function photoGallery($order_id){

        return $this->db->where(array('instructional_order_id'=>$order_id))->order_by('ordering','asc')->get('instructional_photo')->result();

    }

    public function getLocations($location_id)
    {

        $res=$this->db->select('title')->where(array('location_id'=>$location_id))->get('locations');
        if($res ->num_rows() > 0 ){
            $row = $res->row();
            return $row->title;
        } else{
            return false;

        }

    }

    public function getEmployee($user_id)
    {
        $res=$this->db->select('first_name,last_name,employee_id')->where(array('user_id'=>$user_id))->get('meta');
        if($res ->num_rows() > 0 ){
            $row = $res->row();
            //return $row->first_name.' '.$row->last_name.'('.$row->employee_id.')';
            return $row->first_name.' '.$row->last_name;
        } else{
            return false;

        }
    }

    public function getAllLocations()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('locations')->result();

    }

    public function getzones($zone_id)
    {


        $res=$this->db->select('title')->where(array('zone_id'=>$zone_id))->get('zones');
        if($res ->num_rows() > 0 ){
            $row = $res->row();
            return $row->title;
        } else{
            return false;

        }

    }

    public function getOrderStatus()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by('production_status_code','asc')->get('order_status')->result();

    }

    public function getFlavours()
    {

        return   $this->db
            ->select('flavours.*')
            ->from('orders')
            ->join('flavours','flavours.flavour_id = orders.flavour_id')
            ->where(array('status'=>1))
            ->group_by('flavour_id')
            ->order_by('title','asc')
            ->get()
            ->result();

    }

    public function currentProductionStatus($production_status_code){

        $res =$this->db->select('description')->where(array('production_status_code'=>$production_status_code))->get('order_status');
        if($res->num_rows > 0){
            $row =$res->row();

            return $row->description;

        }else{
            return false;
        }

    }

    public function statusChange($order_code,$production_status){

          $this->db->where(array('order_code'=>$order_code))->set(array('order_status'=>$production_status))->update('orders');

    }



    public function doSearch($search){


        if($this->checkSearch("order_code",$search) > 0){
            $order_code = $this->checkSearch("order_code",$search);
            return $order_code;
        }else if($this->checkSearch("first_name",$search) > 0){
            $order_code = $this->checkSearch("first_name",$search);
            return $order_code;
        }else if($this->checkSearch("last_name",$search) > 0){
            $order_code = $this->checkSearch("last_name",$search);
            return $order_code;
        }else{
            return false;

        }
    }

    private function checkSearch($field_name,$value){


        $this->db->select('orders.order_code');
        $this->db->from('orders');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->where(strtolower($field_name),strtolower($value));
        $result =$this->db->get();
        if($result ->num_rows() >0 ){
            $res = $result ->row();
            return $res->order_code;
        }else{
            return false;
        }
        //echo $this->db->last_query();

    }

}