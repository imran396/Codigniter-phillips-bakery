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

    public function getCategories()
    {
        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('categories')->result();
    }


    public function getServings()
    {
        return $this->db->select('*')->where('status', 1)->order_by('ordering','asc')->get('servings')->result();
    }

    public function getZones()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('zones')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('locations')->result();

    }
    public function getCustomers()
    {

        return $this->db->select('customer_id,first_name,last_name')->where(array('status'=> 1,'is_deleted !='=>1))->order_by('first_name','asc')->get('customers')->result();

    }

    public function getShapes()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('shapes')->result();

    }

    public function getShapeName($shapeid){
        return $res=$this->db->select('shape_id,title')->where('shape_id',$shapeid)->get('shapes')->row();

    }

    public function getFlavourName($flavourid){

        return $res=$this->db->select('flavour_id,title')->where('flavour_id',$flavourid)->get('flavours')->row();

    }


    public function getEmployees($group_id=0)
    {

        $this->db
            ->select('users.id,users.group_id,users.username,users.email,meta.first_name,meta.last_name,meta.location_id, users.active');
        $this->db->join('meta','users.id =meta.user_id');
        $this->db->join('groups','users.group_id =groups.id');
        if($group_id > 0){
            return $this->db->where(array('users.group_id'=>$group_id,'active'=>1))->order_by('first_name','asc')->get('users')->result();
        }else{
            return $this->db->where(array('active'=>1))->order_by('first_name','asc')->get('users')->result();
        }


    }


    public function getOrderStatus($order_id){

        return $row = $this->db->select('order_id,order_code,order_status,')->where('order_id',$order_id)->get('orders')->row();
    }

    function getCakes($category_id=0){

        $this->db->select('cakes.cake_id,cakes.title,');
        $this->db->from('cakes');
        if($category_id > 0){
            $this->db->where('category_id',$category_id);
        }
        $this->db->where(array('status'=>1,'is_deleted !='=>1));
        $this->db->order_by('title','asc');
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

    public function checkBlackOut($location_id=0,$delivery_date=NULL){

        if($location_id > 0){
            $locationid=$location_id;
        }else{
            $locationid = $this->orders_model->getVaughanLocation();
        }

        $farr=array();
        if($delivery_date){
            $curdate = $delivery_date;
        }else{
            $curdate = date('m/d/Y');
        }

        $sql= "SELECT flavour_id FROM  `blackouts` WHERE  `location_id` = $locationid AND  `blackout_date` LIKE  '%$curdate%'";
        $res = $this->db->query($sql)->result();
        foreach($res as $rows){

            $farr[]= $rows->flavour_id;
        }

        return $farr;
    }

    public function getFlavours($location_id){

        $blackout=$this->checkBlackOut($location_id);
        if(empty($blackout)){
            return $res=$this->db
                ->select('flavour_id,title')
                ->where('status',1)
                ->order_by('title','asc')
                ->get('flavours')
                ->result();
        }else{
            return $res=$this->db
                ->select('flavour_id,title')
                ->where('status',1)
                ->where_not_in('flavour_id',$blackout)
                ->order_by('title','asc')
                ->get('flavours')
                ->result();
        }
    }

    public function orderEdit($order_id){

        $this->db->select('

        orders.*
        ,orders.flavour_id AS orders_flavour_id
        ,orders.tiers AS orders_tiers
        ,orders.shape_id AS orders_shape
        ,orders.fondant AS orders_fondant
        ,orders.location_id AS locationid
        ,order_location.title AS location_name
        ,pickup_location.title as pickup_location_name
        ,orders.tiers AS orderTiers
        ,cakes.*
        ,flavours.title AS flavour_name
        ,customers.*
        ,price_matrix.*
        ,servings.title AS serving_title
        ,zones.title AS zone_title
        ,zones.title AS zone_title
        ,zones.description AS zone_description
        ,order_status.description AS orderstatus
        ,meta.first_name AS employee_first_name
        ,meta.last_name AS employee_last_name
        ,order_delivery.*

        ');

        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('meta','meta.user_id = orders.employee_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('price_matrix','price_matrix.price_matrix_id = orders.price_matrix_id','left');
        $this->db->join('servings','servings.serving_id = orders.serving_id','left');
        $this->db->join('zones','zones.zone_id = orders.delivery_zone_id','left');
        $this->db->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left');
        $this->db->join('locations AS order_location','order_location.location_id = orders.location_id','left');
        $this->db->join('locations AS pickup_location','pickup_location.location_id = orders.pickup_location_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->where(array("orders.order_id"=> $order_id));
        return $this->db->get()->row();
    }


    /*------------End Admin Panel Oredr */

    public function order_insert($data){

        $order_date = $data['order_date'] = (int)$data['order_date'];
        $customer_id = $data['customer_id'];

        $data['delivery_time']=timeFormatAmPm($data['delivery_time']);
        $orderDbID = $this->checkDuplicateInsert($customer_id , $order_date);
        if($orderDbID > 0){
            $data['update_date']=time();
            $order_id = $this->update($data,$orderDbID);
        }else{
            $data['insert_date']=time();
            $data['update_date']=time();
            if($data['override_price'] > 0 ){
                $data['total_price'] =  $data['override_price'];
            }

            $order_id = $this->insert($data);

            $order_code=(100000+$order_id);
            $this->db->set(array('order_code'=>$order_code))->where('order_id',$order_id)->update('orders');

        }
        $dbdata =$this->getOrder($order_id);
        $order['order_id']= $order_id;
        $order['order_code']= $dbdata->order_code;
        $order['order_status']=  $dbdata->order_status;
        $order['discount_price']=  $dbdata->discount_price;
        $order['override_price']=  $dbdata->override_price;
        $order['total_price']=  $dbdata->total_price;
        $order['cake_id']=  $dbdata->cake_id;
        $order['customer_id']=  $dbdata->customer_id;
        $order['delivery_type']=  $dbdata->delivery_type;
        $order['pickup_location_id']=  $dbdata->pickup_location_id;
        $order['location_id']=  $dbdata->location_id;
        $order['employee_id']=  $dbdata->employee_id;
        $order['on_cake_image_needed']=  $dbdata->on_cake_image_needed;
        $order['cake_email_photo']=  $dbdata->cake_email_photo;
        $order['instructional_email_photo']=  $dbdata->instructional_email_photo;
        $order['order_date']=  $dbdata->order_date;
        return $order;
    }

    public function order_update($data,$order_id){

        //print_r($data);
        //exit;

        $data['update_date']=time();
        $order_id = $this->update($data,$order_id);
            $dbdata =$this->getOrder($order_id);
            $order['order_id']= $dbdata->order_id;
            $order['order_code']=  $dbdata->order_code;
            $order['order_status']=  $dbdata->order_status;
            $order['cake_id']=  $dbdata->cake_id;
            $order['customer_id']=  $dbdata->customer_id;
            $order['delivery_type']=  $dbdata->delivery_type;
            $order['pickup_location_id']=  $dbdata->pickup_location_id;
            $order['location_id']=  $dbdata->location_id;
            $order['employee_id']=  $dbdata->employee_id;
            $order['on_cake_image_needed']=  $dbdata->on_cake_image_needed;
            $order['cake_email_photo']=  $dbdata->cake_email_photo;
            $order['instructional_email_photo']=  $dbdata->instructional_email_photo;
            $order['discount_price']=  $dbdata->discount_price;
            $order['override_price']=  $dbdata->override_price;
            $order['total_price']=  $dbdata->total_price;

        return $order;
    }

    private function checkDuplicateInsert($customer_id , $order_date){

        $order_date = (int)$order_date;
        $row = $this->db->select('order_id')->where(array('customer_id'=>$customer_id , 'order_date'=>$order_date))->get('orders');
        if($row->num_rows() > 0  ){

            $res =$row->row();
            return $res->order_id;
        }

    }

    public function galleryUpload($data,$order_id){

        foreach ($data as $key => $value) {

            if(strpos($key,'tmpname')){

                $image="assets/uploads/gallery/".nl2br(htmlentities(stripslashes($value)));
                $this->db->set(array('instructional_order_id'=>$order_id,'instructional_photo'=>$image))->insert('instructional_photo');

            }

        }
    }


    public function doUpload($id)
    {

        $filePath  = "assets/uploads/cakes/";
        $file_name=resize_image($_FILES['onCakeImage'],$filePath,1024,1024);
        $this->fileDelete($id);
        $filePath  = "assets/uploads/cakes/".$file_name;
        $this->fileDelete($id);
        $this->db->set(array('on_cake_image' => $filePath))->where(array('order_id' => $id))->update('orders');

    }

    public function instructionalImagesUpload($order_id){


        $filePath  = "assets/uploads/gallery/";
        $i=0;
        foreach($_FILES['instructionalImages']['name'] as $key => $file_name ){

            $imgarr[$i]['name'] = $_FILES['instructionalImages']['name'][$key];
            $imgarr[$i]['type'] = $_FILES['instructionalImages']['type'][$key];
            $imgarr[$i]['size'] = $_FILES['instructionalImages']['size'][$key];
            $imgarr[$i]['tmp_name'] = $_FILES['instructionalImages']['tmp_name'][$key];
            $imgarr[$i]['error'] = $_FILES['instructionalImages']['error'][$key];
            $file_name = resize_image($imgarr[$i],$filePath,730,480);
            $instructional_photo  = $filePath.$file_name;
            $this->db->set(array('instructional_order_id'=>$order_id,'instructional_photo' => $instructional_photo))->insert('instructional_photo');
            $i++;
        }

    }

    public function instructionalImagesUploadByEmail($data){


        $count =  $data['attachment-count'];
        for($i=1;$i<=$count;$i++){
            $attachment = $_FILES["attachment-$i"];
            $filePath  = "assets/uploads/gallery/";
            $file_name=resize_image($attachment,$filePath,1024,1024);
            $instructional_photo  = "assets/uploads/gallery/".$file_name;

            $this->db->set(array('instructional_order_id'=>$data['order_id'],'instructional_photo' => $instructional_photo))->insert('instructional_photo');
        }

    }


    public function cakeOnimage($data){

        $id = $data['order_id'];
        $attachment = "attachment-1";
        $attachment = $_FILES["$attachment"];
        $filePath = "assets/uploads/cakes/";
        $file_name=resize_image($attachment,$filePath,730,480);
        $on_cake_image  = "assets/uploads/cakes/".$file_name;
        $this->fileDelete($id);
        $this->db->set(array('on_cake_image' => $on_cake_image))->where(array('order_id' => $id))->update('orders');
    }




    public function fileDelete($id)
    {
        $dbdata = $this->getOrder($id);
        if (file_exists($dbdata->on_cake_image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] .'/'.$dbdata->on_cake_image);
        }
        $this->db->set(array('on_cake_image' => ''))->where(array('order_id' => $id))->update('orders');
    }

    public function instructionalPhotoDelete($image,$order_id)
    {

        foreach($image as $imagePath){

            $returnvalue=parse_url($imagePath, PHP_URL_PATH);
            if (file_exists($returnvalue)) {
                unlink($_SERVER['DOCUMENT_ROOT'] .'/'.$returnvalue);
            }
            $this->db->where(array('instructional_order_id'=>$order_id,'instructional_photo'=>trim($returnvalue,'/')))->delete('instructional_photo');
       }

    }

    public function instructionalGalleryDelete($order_id,$image)
    {

            if (file_exists($image)) {
                unlink($_SERVER['DOCUMENT_ROOT'].'/'.$image);
            }
            $this->db->where(array('instructional_order_id'=>$order_id,'instructional_photo'=>trim($image)))->delete('instructional_photo');

    }



    public function delivery_order($order_delivery,$order_id){

        $order_delivery['delivery_order_id'] =  $order_id;
        $order_delivery['email'] =  '';
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


    public function fileInstructionalDelete($order_id)
    {
        $row = $this->db->where('instructional_order_id',$order_id)->get('instructional_photo');
        if($row->num_rows() > 0 ){
           foreach($row->result() as $image ):
            if (file_exists($image->instructional_photo)) {
                unlink($_SERVER['DOCUMENT_ROOT'].'/'.$image->instructional_photo);
            }
            $this->db->where(array('instructional_order_id'=>$order_id,'instructional_photo'=>$image->instructional_photo_id))->delete('instructional_photo');
           endforeach;
        }
    }

    function delete($order_id){

        $count = $this->db->where(array('order_status'=>305,'order_id'=>$order_id))->get('orders')->num_rows();
        if($count > 0){
        //$this->fileDelete($order_id);
        //$this->fileInstructionalDelete($order_id);

        $this->db->set(array('is_deleted'=>1,'update_date'=>time()))->where('order_id',$order_id)->update('orders');
        //$this->db->where('order_id',$order_id)->delete('order_notes');
            $this->session->set_flashdata('delete_msg',"Orders has been deleted successfully");
        }else{
            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        }


    }

    function cronOrderDelete(){
        $days= strtotime('-30 days');
        $this->db->where(array('order_status'=>300,'order_date <=' =>$days ))->set(array('order_status'=>305,'is_deleted'=>1,'update_date'=>time()))->update('orders');
    }

    function cronOrderSold($revel_order_id){
        if($this->getCronOrderStatus($revel_order_id) > 0){
            $this->db->where(array('revel_order_id'=>$revel_order_id))->set(array('order_status'=>304,'update_date'=>time()))->update('orders');
        }

    }

    private function getCronOrderStatus($revelid){

        $count = $this->db->select('revel_order_id')->where(array('revel_order_id'=>$revelid,'order_status'=>303))->get('orders');
        return $count->num_rows();
    }



    public function getOrder($order_id){

        return $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->where(array('orders.order_id'=>$order_id))
            ->get()->row();
    }

    public function getAdminOrder($order_id){

        return $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->where(array('orders.order_id'=>$order_id))
            ->get()->result();
    }

    public function getGlobalName($table_name,$field){

        $var = $this->db
            ->select('title')
            ->from($table_name)
            ->where($field)
            ->get();
        if($var ->num_rows() > 0){
            $row = $var->row();
            return $row->title;
        }
        return false;
    }



    function getCustomerName($table_name,$field){

        $customer = $this->db
            ->select('first_name,last_name')
            ->from($table_name)
            ->where($field)
            ->get();
        if($customer->num_rows() > 0){
            $row = $customer->row();
            return $row->first_name.' '.$row->last_name;
        }
        return false;

    }


    function getEmployeeName($user_id){

        $customer = $this->db
            ->select('first_name,last_name')
            ->from('meta')
            ->where($user_id)
            ->get();
        if($customer->num_rows() > 0){
            $row = $customer->row();
            return $row->first_name.' '.$row->last_name;
        }
        return false;

    }

    public function getVaughanLocation(){

        $row = $this->db->select('location_id')->where('vaughan_location',1)->get('locations')->row();
        if(!empty( $row->location_id)){
            return $vaughan_location = $row->location_id;
        }
        return false;

    }


    public function sortingList($order_id)
    {

        $i=1;
        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$i);
            $this->db->set($array);
            $this->db->where(array('instructional_photo_id 	'=>$item,'instructional_order_id'=>$order_id));
            $this->db->update('instructional_photo');
        $i++;
        endforeach;
    }

    public function getListing($start)
    {

        $curdate =date('m/d/Y');
        $per_page=20;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;


        $base_url = site_url('admin/orders/listing/');

        $total_rows = $this->db->where('orders.is_deleted !=',1)->count_all_results('orders');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name,customers.first_name,customers.last_name,order_status.description AS orderstatus');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->join('order_status','order_status.production_status_code = orders.order_status','left');
        $this->db->limit($per_page,$limit);
        $this->db->where('orders.is_deleted !=',1);
        //$this->db->where('delivery_date >=',$curdate);
        $this->db->order_by("orders.order_date", "desc");
        //$this->db->order_by("orders.order_status", "desc");
        $query =$this->db->get()->result();
        return array($query,$paging,$total_rows,$limit);

    }

    function searching($search,$start){

        $search=strtolower($search);
        $query="SELECT orders.*,customers.first_name,customers.last_name,order_status.description AS orderstatus
                FROM `orders`
                LEFT JOIN customers ON (customers.customer_id = orders.customer_id)
                LEFT JOIN order_status ON (order_status.production_status_code = orders.order_status)
                WHERE(orders.is_deleted != 1 AND  `order_code` = '$search')
                || (orders.is_deleted != 1 AND  `order_id` = '$search')
                || (orders.is_deleted != 1 AND  LOWER(customers.first_name) LIKE '%$search')
                || (orders.is_deleted != 1 AND LOWER(customers.last_name) LIKE '%$search')
                || (orders.is_deleted != 1 AND LOWER(order_status.description) = '$search')
                || (orders.is_deleted != 1 AND customers.phone_number = '$search') ORDER BY orders.order_code DESC ";

        // || (`order_id` > 0 AND LOWER(`delivery_date`) >= '$search')
        $per_page=10;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/orders/search/'.$search);
        $num = $this->db->query($query);
        $total_rows = $num->num_rows();
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $limit = "LIMIT $limit , $per_page";
        $pagequery=$query.$limit;
        $query = $this->db->query($pagequery)->result();
        return array($query,$paging,$total_rows,$limit);

    }



    public function getAll(){

        $imageurlprefix = base_url().'assets';
        $res = "SELECT
              O.*,
              OD.*,
              GROUP_CONCAT(I.instructional_photo ORDER BY I.instructional_photo_id 	 ASC SEPARATOR ',') as instructional_photo
              FROM orders As O
              LEFT JOIN instructional_photo AS I
                ON ( I.instructional_order_id = O.order_id )
              LEFT JOIN order_delivery AS OD
                ON ( OD.delivery_order_id = O.order_id ) WHERE O.is_deleted != 1
              GROUP BY O.order_id";


        if($res){
            $result = $this->db->query($res)->result_array();

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
                $result[$key]['serving_id'] = (int) $result[$key]['serving_id'];
                $result[$key]['shape_id'] = (int) $result[$key]['shape_id'];
                $result[$key]['delivery_order_id'] = (int) $result[$key]['delivery_order_id'];
                $result[$key]['order_date'] = (int) $result[$key]['order_date'];
                $result[$key]['on_cake_image'] = $val['on_cake_image'];
                $result[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$result[$key]['on_cake_image']);
                if(!empty($result[$key]['instructional_photo'])){
                    $result[$key]['instructional_photo'] = explode(',', $val['instructional_photo']);
                    $result[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$result[$key]['instructional_photo']);
                }else{
                    $result[$key]['instructional_photo'] = array();
                }

            }
            return $result;

        }else{

            return array();
        }

    }

    function getLastUpdateAll($lastdate){


        $imageurlprefix = base_url().'assets';

        $insert = "SELECT
              O.*,
              OD.*,
              GROUP_CONCAT(I.instructional_photo ORDER BY I.instructional_photo_id 	 ASC SEPARATOR ',') as instructional_photo
              FROM orders As O
              LEFT JOIN instructional_photo AS I
                ON ( I.instructional_order_id = O.order_id )
              LEFT JOIN order_delivery AS OD
                ON ( OD.delivery_order_id = O.order_id ) WHERE O.is_deleted != 1 && O.insert_date > $lastdate
              GROUP BY O.order_id";


        if($insert){
            $inserted = $this->db->query($insert)->result_array();

            foreach($inserted  as $key => $val){

                $inserted[$key]['order_id'] = (int) $inserted[$key]['order_id'];
                $inserted[$key]['order_code'] = (int) $inserted[$key]['order_code'];
                $inserted[$key]['cake_id'] = (int) $inserted[$key]['cake_id'];
                $inserted[$key]['customer_id'] = (int) $inserted[$key]['customer_id'];
                $inserted[$key]['employee_id'] = (int) $inserted[$key]['employee_id'];
                $inserted[$key]['manager_id'] = (int) $inserted[$key]['manager_id'];
                $inserted[$key]['location_id'] = (int) $inserted[$key]['location_id'];
                $inserted[$key]['pickup_location_id'] = (int) $inserted[$key]['pickup_location_id'];
                $inserted[$key]['delivery_zone_id'] = (int) $inserted[$key]['delivery_zone_id'];
                $inserted[$key]['flavour_id'] = (int) $inserted[$key]['flavour_id'];
                $inserted[$key]['serving_id'] = (int) $inserted[$key]['serving_id'];
                $inserted[$key]['delivery_order_id'] = (int) $inserted[$key]['delivery_order_id'];
                $inserted[$key]['order_date'] = (int) $inserted[$key]['order_date'];
                $inserted[$key]['on_cake_image'] = $val['on_cake_image'];
                $inserted[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$inserted[$key]['on_cake_image']);
                if(!empty($inserted[$key]['instructional_photo'])){
                    $inserted[$key]['instructional_photo'] = explode(',', $val['instructional_photo']);
                    $inserted[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$inserted[$key]['instructional_photo']);
                }else{
                    $inserted[$key]['instructional_photo'] = array();
                }

            }


        }


        $update = "SELECT
              O.*,
              OD.*,
              GROUP_CONCAT(I.instructional_photo ORDER BY I.instructional_photo_id 	 ASC SEPARATOR ',') as instructional_photo
              FROM orders As O
              LEFT JOIN instructional_photo AS I
                ON ( I.instructional_order_id = O.order_id )
              LEFT JOIN order_delivery AS OD
                ON ( OD.delivery_order_id = O.order_id ) WHERE O.is_deleted != 1 && O.insert_date < $lastdate && O.update_date > $lastdate
              GROUP BY O.order_id";


        if($update){
            $updated = $this->db->query($update)->result_array();

            foreach($updated  as $key => $val){

                $updated[$key]['order_id'] = (int) $updated[$key]['order_id'];
                $updated[$key]['order_code'] = (int) $updated[$key]['order_code'];
                $updated[$key]['cake_id'] = (int) $updated[$key]['cake_id'];
                $updated[$key]['customer_id'] = (int) $updated[$key]['customer_id'];
                $updated[$key]['employee_id'] = (int) $updated[$key]['employee_id'];
                $updated[$key]['manager_id'] = (int) $updated[$key]['manager_id'];
                $updated[$key]['location_id'] = (int) $updated[$key]['location_id'];
                $updated[$key]['pickup_location_id'] = (int) $updated[$key]['pickup_location_id'];
                $updated[$key]['delivery_zone_id'] = (int) $updated[$key]['delivery_zone_id'];
                $updated[$key]['flavour_id'] = (int) $updated[$key]['flavour_id'];
                $updated[$key]['serving_id'] = (int) $updated[$key]['serving_id'];
                $updated[$key]['delivery_order_id'] = (int) $updated[$key]['delivery_order_id'];
                $updated[$key]['order_date'] = (int) $updated[$key]['order_date'];
                $updated[$key]['on_cake_image'] = $val['on_cake_image'];
                $updated[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$updated[$key]['on_cake_image']);
                if(!empty($updated[$key]['instructional_photo'])){
                    $updated[$key]['instructional_photo'] = explode(',', $val['instructional_photo']);
                    $updated[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$updated[$key]['instructional_photo']);
                }else{
                    $updated[$key]['instructional_photo'] = array();
                }

            }
        }


        $deleted = $this->db->where(array('is_deleted'=> 1,'insert_date <'=> $lastdate ,'update_date >'=> $lastdate))->select('order_id')->order_by('order_id','asc')->get('orders')->result();
        foreach($deleted as  $val){
            $delete[] =  (int)$val->order_id;
        }
        $delete = isset($delete) ? $delete:array();

        return array('inserted'=>$inserted,'updated'=>$updated,'deleted'=>$delete);
    }

    public function getVaughanOrder($lastdate){

        $vaughan_location = $this->orders_model->getVaughanLocation();
        $imageurlprefix = base_url().'assets';

        $insert = "SELECT
              O.*,
              OD.*,
              GROUP_CONCAT(I.instructional_photo ORDER BY I.instructional_photo_id 	 ASC SEPARATOR ',') as instructional_photo
              FROM orders As O
              LEFT JOIN instructional_photo AS I
                ON ( I.instructional_order_id = O.order_id )
              LEFT JOIN order_delivery AS OD
                ON ( OD.delivery_order_id = O.order_id ) WHERE O.is_deleted != 1 && kitchen_location_id = $vaughan_location && vaughan_location = 1  && order_status != 300 && vaughan_print !=1
              GROUP BY O.order_id ORDER BY O.update_date ASC LIMIT 0,10 ";


        if($insert){
            $inserted = $this->db->query($insert)->result_array();

            foreach($inserted  as $key => $val){

                $this->db->set(array('vaughan_print'=>1))->where(array('order_id'=>$inserted[$key]['order_id']))->update('orders');

                $inserted[$key]['order_id'] = (int) $inserted[$key]['order_id'];
                $inserted[$key]['order_code'] = (int) $inserted[$key]['order_code'];
                $inserted[$key]['cake_id'] = (int) $inserted[$key]['cake_id'];
                $inserted[$key]['customer_id'] = (int) $inserted[$key]['customer_id'];
                $inserted[$key]['employee_id'] = (int) $inserted[$key]['employee_id'];
                $inserted[$key]['manager_id'] = (int) $inserted[$key]['manager_id'];
                $inserted[$key]['location_id'] = (int) $inserted[$key]['location_id'];
                $inserted[$key]['pickup_location_id'] = (int) $inserted[$key]['pickup_location_id'];
                $inserted[$key]['delivery_zone_id'] = (int) $inserted[$key]['delivery_zone_id'];
                $inserted[$key]['flavour_id'] = (int) $inserted[$key]['flavour_id'];
                $inserted[$key]['serving_id'] = (int) $inserted[$key]['serving_id'];
                $inserted[$key]['delivery_order_id'] = (int) $inserted[$key]['delivery_order_id'];
                $inserted[$key]['order_date'] = (int) $inserted[$key]['order_date'];
                $inserted[$key]['on_cake_image'] = $val['on_cake_image'];
                $inserted[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$inserted[$key]['on_cake_image']);
                if(!empty($inserted[$key]['instructional_photo'])){
                    $inserted[$key]['instructional_photo'] = explode(',', $val['instructional_photo']);
                    $inserted[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$inserted[$key]['instructional_photo']);
                }else{
                    $inserted[$key]['instructional_photo'] = array();
                }


            }


        }

        return $inserted;


    }

    public function doSearch($data){

        $imageurlprefix = base_url().'assets';
        $order_id = isset($data['order_id'])?$data['order_id']:'';
        $order_code = isset($data['order_code'])?$data['order_code']:'';
        $customer_id = isset($data['customer_id'])? $data['customer_id']:'';

        $where ="'is_deleted' != 1";
        if(!empty($order_id)){

            $where .=" AND `order_id` = ".$order_id;
        }
        if(!empty($order_code)){

            $where .=" AND  `order_code` = ".$order_code;
        }

        if(!empty($customer_id)  ){

            $where .=" AND `customer_id` =". $customer_id;
        }

        $res = "SELECT
              O.*,
              OD.*,
              GROUP_CONCAT(I.instructional_photo ORDER BY I.instructional_photo_id 	 ASC SEPARATOR ',') as instructional_photo
              FROM orders As O
              LEFT JOIN instructional_photo AS I
                ON ( I.instructional_order_id = O.order_id )

              LEFT JOIN order_delivery AS OD
                ON ( OD.delivery_order_id = O.order_id )
               WHERE ($where)
              GROUP BY O.order_id ORDER BY O.delivery_date DESC";


        if($res){
            $result = $this->db->query($res)->result_array();

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
                $result[$key]['order_date'] = (int) $result[$key]['order_date'];
                if(!empty($result[$key]['instructional_photo'])){
                    $result[$key]['instructional_photo'] = explode(',', $val['instructional_photo']);
                    $result[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$result[$key]['instructional_photo']);
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

   public function getOtrderAllNotes(){
        $data = $this->db->select('order_id,employee_id,create_date,notes')->where(array('is_deleted !='=>1))->order_by('order_id','asc')->get('order_notes')->result_array();
        foreach($data as $key=>$val){
            $data[$key]['order_id'] = (int) $data[$key]['order_id'];
            $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
            $data[$key]['create_date'] = (string) $data[$key]['create_date'];
            $data[$key]['notes'] =  $data[$key]['notes'];
        }

        return $data;
    }
    public function getLastUpdateAllNotes($lastdate){

        $data = $this->db->select('order_id,employee_id,create_date,notes')->where(array('is_deleted !='=>1,'create_date >'=>$lastdate))->order_by('create_date','desc')->get('order_notes')->result_array();
        foreach($data as $key=>$val){
            $data[$key]['order_id'] = (int) $data[$key]['order_id'];
            $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
            $data[$key]['create_date'] = (string) $data[$key]['create_date'];
            $data[$key]['notes'] =  $data[$key]['notes'];
        }

        $delete = $this->db->select('order_id,employee_id,create_date,notes')->where(array('is_deleted '=>1,'create_date >'=>$lastdate))->order_by('create_date','desc')->get('order_notes')->result_array();
        foreach($delete as $key=>$val){
            $delete[$key]['order_id'] = (int) $delete[$key]['order_id'];
            $delete[$key]['employee_id'] = (int) $delete[$key]['employee_id'];
            $delete[$key]['create_date'] = (string) $delete[$key]['create_date'];
            $delete[$key]['notes'] =  $delete[$key]['notes'];
        }

        $updated = array();
        $delete = isset($delete) ? $delete:array();
        return array('inserted'=>$data,'updated'=>$updated,'deleted'=>$delete);
    }

    public function getOrderNotes($order_id){

       $data = $this->db->select('order_id,employee_id,create_date,notes')->where(array('is_deleted !='=>1,'order_id'=>$order_id))->order_by('order_id','asc')->get('order_notes')->result_array();
       foreach($data as $key=>$val){
           $data[$key]['order_id'] = (int) $data[$key]['order_id'];
           $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
           $data[$key]['create_date'] = (string) $data[$key]['create_date'];
           $data[$key]['notes'] =  $data[$key]['notes'];
       }

       return $data;
   }

    public function search($order_id)
    {

        $data = $this->db->select('order_id,employee_id,create_date,notes')->where(array('is_deleted !='=>1,'order_id'=>$order_id))->order_by('order_id','asc')->get('order_notes')->result_array();
        foreach($data as $key=>$val){
            $data[$key]['order_id'] = (int) $data[$key]['order_id'];
            $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
            $data[$key]['create_date'] = (string) $data[$key]['create_date'];
            $data[$key]['notes'] =  $data[$key]['notes'];
        }

        return $data;

    }
    public function SaveNotes($data)
    {
        $data['insert_date']=time();
        $data['update_date']=time();
        $this->db->set($data)->insert('order_notes');
    }

    public function orderNotesRemove($order_notes_id)
    {
        $this->db->where(array('order_notes_id'=>$order_notes_id))->set(array('is_deleted '=>1,'update_date'=>time()))->update('order_notes');
    }


    
    public function getCustomerData($id)
    {
        $this->db->where('customer_id', $id);
        $res = $this->db->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->get('customers');
        $result =  $res->row();
        return $result;

    }

    function getDateFormat($date=NULL)
    {

        $mdate =strtotime($date);
        $udate =date("m/d/Y",$mdate);
        return $udate;
    }

    function dateFormat($date=NULL)
    {

        $mdate =strtotime($date);
        $udate =date("m/d/Y",$mdate);
        return $udate;
    }

    function phoneNoFormat($phone)
    {
        return  $to = sprintf("%s-%s-%s",
            substr($phone, 0, 3),
            substr($phone, 3, 3),
            substr($phone, 6, 8));
    }

    function timeFormat($time)
    {

        $date=date('d-m-y');
        $dateTime=strtotime($date.' '.$time);
        return date("H:i",$dateTime);
    }

    function fileName($fileName)
    {
        $filename=explode("/",$fileName);
        return end($filename);

    }

}
