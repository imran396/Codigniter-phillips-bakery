<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Productions_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();


    }




    public function getListing($start)
    {

        $location_id=1;
        $per_page=10;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;
        $base_url = site_url('admin/productions/inproduction/');
        $total_rows = $this->db->count_all_results('orders');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name,customers.first_name,customers.last_name');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->limit($per_page,$limit);
        $this->db->where(array("orders.location_id"=> $location_id));
        $this->db->or_where(array("orders.pickup_location_id"=> $location_id));
        $this->db->order_by("orders.order_id", "desc");
        $query =$this->db->get()->result();
        return array($query,$paging,$total_rows,$limit);

    }

    public function getFiltering($data,$start){



        $data['order_status'] = (strtolower($data['order_status']) != "status" ) ? strtolower($data['order_status']) :'';
        $data['fondant'] = (strtolower($data['fondant']) != "fondant" ) ? strtolower($data['fondant']) :'';
        $data['flavour_id'] = (strtolower($data['flavour_id']) != "flavour" ) ? strtolower($data['flavour_id']) :'';
        $data['delivery_type'] = (strtolower($data['delivery_type']) != "pickup/delivery" ) ? strtolower($data['delivery_type']) :'';

        $data['orders.fondant'] =  $data['fondant'];
        unset($data['fondant']);
        $data['orders.flavour_id'] =  $data['flavour_id'];
        unset($data['flavour_id']);

        $location_id=1;
        $per_page=10;
        $page   = intval($start);
        if ( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;
        $base_url = site_url('admin/productions/inproduction/');
        $total_rows = $this->db->count_all_results('orders');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name, flavours.fondant AS fondant_name, customers.first_name,customers.last_name');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->limit($per_page,$limit);
        $this->db->where(array("orders.location_id"=> $location_id));
        $this->db->or_where($data);
        $this->db->order_by("orders.order_id", "desc");
        $query =$this->db->get()->result();
        var_dump($query);
        return array($query,$paging,$total_rows,$limit);


    }

    public function dateFormate($date){

        $cusdate=strtotime($date);
        return date("M j, Y",$cusdate);

    }

    public function orderDetails($order_code=22334455){

        $this->db->select('orders.*,cakes.*,flavours.title AS flavour_name ,customers.*,price_matrix.*');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('order_delivery','order_delivery.order_id = orders.order_id','left');
        $this->db->join('price_matrix','price_matrix.price_matrix_id = orders.price_matrix_id','left');
        $this->db->where(array("orders.order_code"=> $order_code));
        return $this->db->get()->row();


    }

    public function getLocations($location_id)
    {

        $row=$this->db->select('title')->where(array('location_id'=>$location_id))->get('locations')->row();
        return $row->title;

    }

    public function getzones($zone_id)
    {

        $row=$this->db->select('title')->where(array('zone_id'=>$zone_id))->get('zones')->row();
        return $row->title;

    }

    public function getOrderStatus()
    {

        return $this->db->select('*')->where(array('status'=>1))->get('order_status')->result();

    }

    public function getFlavours()
    {

        return   $this->db
                ->select('flavours.*')
                ->from('orders')
                ->join('flavours','flavours.flavour_id = orders.flavour_id')
                ->where(array('status'=>1))
                ->group_by('flavour_id')
                ->get()
                ->result();

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('shape_id'=>$item));
            $this->db->update('shapes');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getshapes($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('shape_id'=>$id))->set(array('status'=>$status))->update('shapes');

    }


    public function getAll()
    {
        $data = $this->db->select('shape_id,title')->order_by('ordering','asc')->get('shapes')->result_array();

        foreach($data as $key => $val){
            $data[$key]['shape_id'] = (int) $data[$key]['shape_id'];
        }
        return $data;
    }






}