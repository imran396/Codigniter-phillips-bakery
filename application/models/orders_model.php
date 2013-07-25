<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Orders_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('image_lib');
        $this->loadTable('orders','order_id');

    }

    /*------------Start Admin Panel Oredr */

    function getCakes($category_id=0){

        $this->db->select('cakes.cake_id,cakes.title,');
        $this->db->from('cakes');
        if($category_id > 0){
            $this->db->where('category_id',$category_id);
        }
        $res = $this->db->get();
        return $res->result();
    }

    function getPriceMatrix($flavour_id){
        $matrix =
            $this->db->select('flavour_id')
                ->from('price_matrix')
                ->where(array('flavour_id' => $flavour_id))
                ->get()
                ->result();
    }

    /*------------End Admin Panel Oredr */

    public function order_insert($data){
        $order_id = $this->insert($data);
        $order_code=(100000+$order_id);
        $this->db->set(array('order_code'=>$order_code))->where('order_id',$order_id)->update('orders');
        $dbdata =$this->getOrder($order_id);
        $order['order_id']= $order_id;
        $order['order_code']= $order_code;
        $order['order_status']=  $dbdata->order_status;
        return $order;
    }

    public function order_update($data,$order_id){


        $order_id = $this->update($data,$order_id);
        $dbdata =$this->getOrder($order_id);
        $order['order_id']= $dbdata->order_id;
        $order['order_code']=  $dbdata->order_code;
        $order['order_status']=  $dbdata->order_status;

        return $order;
    }


    public function doUpload($id)
    {

        $filePath  = "assets/uploads/cakes/";
        $file_name=resize_image($_FILES['onCakeImage'],$filePath,700,480);
        $this->fileDelete($id);
        $filePath  = "assets/uploads/cakes/".$file_name;
        $this->fileDelete($id);
        $this->db->set(array('on_cake_image' => $filePath))->where(array('order_id' => $id))->update('orders');

    }

    public function instructionalImagesUpload($order_id){

        $i=0;
        foreach($_FILES['instructionalImages']['name'] as $file_name ){

            $filePath  = "assets/uploads/gallery/";
            $file_name=resize_image($_FILES['instructionalImages'],$filePath,730,480);
            $instructional_photo  = "assets/uploads/gallery/".$file_name;
            $this->db->set(array('instructional_order_id'=>$order_id,'instructional_photo' => $instructional_photo))->insert('instructional_photo');

            $i++;
        }

    }

    public function instructionalImagesUploadByEmail($data){


        $count =  $data['attachment-count'];
        for($i=1;$i<=$count;$i++){
            $attachment = $_FILES["attachment-$i"];
            $filePath  = "assets/uploads/gallery/";
            $file_name=resize_image($attachment,$filePath,730,480);
            $instructional_photo  = "assets/uploads/gallery/".$file_name;

            $this->db->set(array('instructional_order_id'=>$data['order_id'],'instructional_photo' => $instructional_photo))->insert('instructional_photo');
        }

    }


    public function cakeOnimage($data){

        $id = $data['order_id'];
        $attachment = "attachment-1";
        $attachment = $_FILES["$attachment"];
        $filePath = "assets/uploads/cakes/";
        $file_name=resize_image($attachment,$filePath,200,140);
        $on_cake_image  = "assets/uploads/cakes/".$file_name;
        $this->fileDelete($id);
        $this->db->set(array('on_cake_image' => $on_cake_image))->where(array('order_id' => $id))->update('orders');
    }




    public function fileDelete($id)
    {
        $dbdata = $this->getOrder($id);
        if (file_exists($dbdata->on_cake_image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $dbdata->on_cake_image);
        }
    }

    public function instructionalPhotoDelete($image,$order_id)
    {

        foreach($image as $imagePath){

            $returnvalue=parse_url($imagePath, PHP_URL_PATH);
            if (file_exists($returnvalue)) {
                unlink($_SERVER['DOCUMENT_ROOT'].$returnvalue);
            }
            $this->db->where(array('instructional_order_id'=>$order_id,'instructional_photo'=>trim($returnvalue,'/')))->delete('instructional_photo');
       }

    }

    public function delivery_order($order_delivery,$order_id){

        $order_delivery['delivery_order_id'] =  $order_id;
        $dbdata =$this->getOrder($order_id);
        $delivery_order_id = $dbdata->delivery_order_id;

        if($delivery_order_id > 0){
            $this->db->set($order_delivery)->where(array('delivery_order_id'=>$delivery_order_id))->update('order_delivery');
        }else{

            $this->db->set($order_delivery)->insert('order_delivery');
        }

    }

    public function instructional_insert($order_notes,$order_id){

        $order_notes['order_id']=$order_id;
        $this->db->set($order_notes)->insert('order_notes');
    }



    public function getOrder($order_id){

        return $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->where(array('orders.order_id'=>$order_id))
            ->get()->row();
    }

    public function getListing($start)
    {

        $per_page=20;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;


        $base_url = site_url('admin/orders/listing/');
        $total_rows = $this->db->count_all_results('orders');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name,customers.first_name,customers.last_name');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->limit($per_page,$limit);
        //$this->db->where('delivery_date =');
        $this->db->order_by("orders.delivery_date", "desc");
        //$this->db->order_by("orders.order_status", "desc");
        $query =$this->db->get()->result();
        return array($query,$paging,$total_rows,$limit);

    }



    public function getAll(){

        $res = $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->join('instructional_photo','instructional_photo.instructional_order_id = orders.order_id','left')
            ->order_by('order_id','desc')
            ->get();


        if($res){
            $result =  $res->result_array();
            foreach($result  as $key => $val){

                $result[$key]['order_id'] = (int) $result[$key]['order_id'];
                $result[$key]['order_code'] = (int) $result[$key]['order_code'];
                $result[$key]['cake_id'] = (int) $result[$key]['cake_id'];
                $result[$key]['customer_id'] = (int) $result[$key]['customer_id'];
                $result[$key]['employee_id'] = (int) $result[$key]['employee_id'];
                $result[$key]['manager_id'] = (int) $result[$key]['manager_id'];
                $result[$key]['location_id'] = (int) $result[$key]['location_id'];
                $result[$key]['pickup_location_id'] = (int) $result[$key]['pickup_location_id'];
                $result[$key]['delivery_zone_id'] = (int) $result[$key]['delivery_zone_id'];
                $result[$key]['flavour_id'] = (int) $result[$key]['flavour_id'];
                $result[$key]['price_matrix_id'] = (int) $result[$key]['price_matrix_id'];
                $result[$key]['delivery_order_id'] = (int) $result[$key]['delivery_order_id'];

            }
            return $result;

        }else{

            return array();
        }

    }

    public function doSearch($data){

        $imageurlprefix = base_url().'assets';
        $order_id = isset($data['order_id'])?$data['order_id']:'';
        $order_code = isset($data['order_code'])?$data['order_code']:'';
        $customer_id = isset($data['customer_id'])? $data['customer_id']:'';

        $where ="'order_date' != '' ";
        if(!empty($order_id)){

            $where .=" AND `order_id` = ".$order_id;
        }
        if(!empty($order_code)){

            $where .=" AND  `order_code` = ".$order_code;
        }

        if(!empty($customer_id)  ){

            $where .=" AND `customer_id` =". $customer_id;
        }

        $sql = "SELECT
              O.*,G.*,OD.*,
              GROUP_CONCAT(G.instructional_photo ORDER BY G.instructional_order_id ASC SEPARATOR ',') as gallery_images
              FROM orders As O
              LEFT JOIN instructional_photo AS G ON ( O.order_id = G.instructional_order_id)
              LEFT JOIN order_delivery AS OD ON ( O.order_id = OD.delivery_order_id )
              WHERE ($where)
              GROUP BY O.order_id";




        if($sql){
            $result = $this->db->or_like($data)->query($sql)->result_array();
            foreach($result  as $key => $val){

                $result[$key]['order_id'] = (int) $result[$key]['order_id'];
                $result[$key]['order_code'] = (int) $result[$key]['order_code'];
                $result[$key]['cake_id'] = (int) $result[$key]['cake_id'];
                $result[$key]['customer_id'] = (int) $result[$key]['customer_id'];
                $result[$key]['employee_id'] = (int) $result[$key]['employee_id'];
                $result[$key]['manager_id'] = (int) $result[$key]['manager_id'];
                $result[$key]['location_id'] = (int) $result[$key]['location_id'];
                $result[$key]['pickup_location_id'] = (int) $result[$key]['pickup_location_id'];
                $result[$key]['delivery_zone_id'] = (int) $result[$key]['delivery_zone_id'];
                $result[$key]['flavour_id'] = (int) $result[$key]['flavour_id'];
                $result[$key]['price_matrix_id'] = (int) $result[$key]['price_matrix_id'];
                $result[$key]['delivery_order_id'] = (int) $result[$key]['delivery_order_id'];
                $result[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$result[$key]['on_cake_image']);
                if(!empty($result[$key]['gallery_images'])){
                    $result[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$result[$key]['gallery_images']);
                    $result[$key]['instructional_photo'] = explode(',',$result[$key]['instructional_photo']);
                }else{
                    $result[$key]['instructional_photo'] = array();
                }



            }
            return $result;

        }else{

            return array();
        }

    }

    private function getSearchField($data){
        foreach ($data as $key => $value) {
            if (array_search($key, $this->fields) === false) {
                unset($data[$key]);
            }
        }
        return $data;

    }

   public function getAllNotes($order_id){
       $data = $this->db->select('order_id,employee_id,create_date,notes')->where('order_id',$order_id)->order_by('order_id','asc')->get('order_notes')->result_array();
       foreach($data as $key=>$val){
           $data[$key]['order_id'] = (int) $data[$key]['order_id'];
           $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
           $data[$key]['create_date'] = (string) $data[$key]['create_date'];
           $data[$key]['notes'] =  $data[$key]['notes'];
       }

       return $data;
   }

    public function SaveNotes($data){
        $this->db->set($data)->insert('order_notes');
    }


    public function search($order_id){

        $this->db->where('order_id',$order_id);
        $data = $this->db->select('order_id,employee_id,create_date,notes')->order_by('order_id','asc')->get('order_notes')->result_array();

        foreach($data as $key=>$val){
            $data[$key]['order_id'] = (int) $data[$key]['order_id'];
            $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
            $data[$key]['create_date'] = (string) $data[$key]['create_date'];
            $data[$key]['notes'] =  $data[$key]['notes'];
        }

        return $data;

    }

    public function getCustomerData($id){
        $this->db->where('customer_id', $id);
        $res = $this->db->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->get('customers');
        $result =  $res->row();
        return $result;

    }

    function dateFormat($date=NULL){

        $mdate =strtotime($date);
        $udate =date("d/m/Y",$mdate);
        return $udate;
    }

    function phoneNoFormat($phone){
        return  $to = sprintf("%s-%s-%s",
            substr($phone, 0, 3),
            substr($phone, 3, 3),
            substr($phone, 6, 8));
    }

    function timeFormat($time){

        $date=date('d-m-y');
        $dateTime=strtotime($date.' '.$time);
        return date("H:i",$dateTime);
    }

    function fileName($fileName){
        $filename=explode("/",$fileName);
        return end($filename);

    }

}
