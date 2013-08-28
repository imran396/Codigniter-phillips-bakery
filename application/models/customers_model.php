<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Customers_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('customers','customer_id');


    }

    public function create($data)
    {
        $data['insert_date']=time();
        $id = $this->insert($data);
        if(!empty($data['notes'])){
            $this->db->set(array('customer_id'=>$id,'notes'=>$data['notes'],'create_date'=>time()))->insert('customer_notes');
        }
        return $id;
    }

    public function save($data, $id)
    {
        $data['update_date']=time();
        $this->update($data, $id);
        if(!empty($data['notes'])){
        $this->db->set(array('customer_id'=>$id,'notes'=>$data['notes'],'create_date'=>time()))->insert('customer_notes');
        }
    }

    public function deleteDataExisting($data=0){

         return $count=$this->db->where(array('customer_id' => $data))->count_all_results('orders');
    }

    public function delete($id)
    {
        //if(!$this->deleteDataExisting($id) > 0){
            //$this->remove($id);
            $this->db->set(array('is_deleted'=>1,'update_date'=>time()))->where('customer_id',$id)->update('customers');
            $this->session->set_flashdata('delete_msg',"Customer has been deleted successfully");
        //}else{

            //$this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        //}

    }

    public function  checkUniqueTitle($id){

        if(!empty($id)){
             $dbcatid = $this->db->select('phone_number')
                ->where('customer_id',$id)
                ->get('customers')->row();
            return $dbcatid->phone_number;

        }

    }

    public function getcustomers($customer_id)
    {
        return $this->db->select('*')->where(array('customer_id'=>$customer_id))->get('customers')->result();

    }

    function getCustomerNotes($customer_id){
        return $this->db->select('*')->where(array('customer_id'=>$customer_id))->order_by('create_date','desc')->get('customer_notes')->result();
    }

    public function getListing($start)
    {
        $per_page=10;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/customers/listing');
        $total_rows = $this->db->where('is_deleted !=',1)->count_all_results('customers');
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('customers.*');
        $this->db->from('customers');
        $this->db->where('is_deleted !=',1);
        $this->db->limit($per_page,$limit);
        $this->db->order_by("customers.first_name", "asc");
        $query =$this->db->get();
        return array($query,$paging,$total_rows,$limit);

    }

    function orderCount($customer_id,$order_status){

        return $this->db->where(array('customer_id'=>$customer_id,'order_status'=>$order_status))->get('orders')->num_rows();
    }

    public function statusChange($id){

        $row=$this->getcustomers($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('customer_id'=>$id))->set(array('status'=>$status))->update('customers');

    }

    public function checkcustomers($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);

        if($title != $dbtitle ){

            $sql="SELECT COUNT(customer_id) AS countValue FROM customers WHERE phone_number = $title ";
            $count=$this->db->query($sql)->result();
            if($count[0]->countValue > 0 )
            {
                $this->form_validation->set_message('checkTitle', $title.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }

    public function getAll()
    {
        $data = $this->db->where('is_deleted !=',1)->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->order_by('first_name','asc')->get('customers')->result_array();
        foreach($data as $key => $val){
              $data[$key]['customer_id'] = (int) $data[$key]['customer_id'];
        }
        return $data;
    }

    public function search($data){
        $data = $this->getSearchField($data);
        if(isset($data['customer_id'])){
            $customer_id = $data['customer_id'];
            $this->db->where('customer_id', $customer_id);
            unset($data['customer_id']);
        }

        $this->db->where('customer_id >',0);
        $this->db->like($data);
        $res = $this->db->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->get('customers');
        if($res){
            $result =  $res->result_array();
            foreach($result  as $key => $val){
                $result[$key]['customer_id'] = (int) $result[$key]['customer_id'];
            }
           return $result;

        }else{
            return array();
        }
    }

    function getLastUpdateAll($selectdate){


        $lastdate=strtotime($selectdate);
        $inserted = $this->db->where(array('is_deleted !='=>1,'insert_date >'=> $lastdate))->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->order_by('first_name','asc')->get('customers')->result_array();
        foreach($inserted as $key => $val){
            $inserted[$key]['customer_id'] = (int) $inserted[$key]['customer_id'];
        }

        $updated = $this->db->where(array('is_deleted !='=>1,'update_date >'=> $lastdate))->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->order_by('first_name','asc')->get('customers')->result_array();
        foreach($updated as $key => $val){
            $updated[$key]['customer_id'] = (int) $updated[$key]['customer_id'];
        }

        $deleted = $this->db->where(array('is_deleted !='=>1,'insert_date >'=> $lastdate))->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->order_by('first_name','asc')->get('customers')->result_array();
        foreach($deleted as $key => $val){
            $deleted[$key]['customer_id'] = (int) $deleted[$key]['customer_id'];
        }
        return array('inserted'=>$inserted,'updated'=>$updated,'deleted'=>$deleted);

    }

    private function getSearchField($data){
        foreach ($data as $key => $value) {
            if (array_search($key, $this->fields) === false) {
                unset($data[$key]);
            }
        }
        return $data;

    }

    function searching($search,$start){

        $search=strtolower($search);
        $query="SELECT customer_id,first_name,last_name,phone_number,status
                FROM `customers`
                WHERE(is_deleted !=1 AND  LOWER(`first_name`) LIKE '%$search%')
                || (is_deleted !=1 AND LOWER(`last_name`) = '%$search%')
                || (is_deleted !=1 AND `phone_number` = '$search')";

        $per_page=10;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/customers/search/'.$search);
        $num = $this->db->query($query);
        $total_rows = $num->num_rows();
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $limit = "LIMIT $limit , $per_page";
        $pagequery=$query.$limit;
        $query = $this->db->query($pagequery);
        return array($query,$paging,$total_rows,$limit);

    }

    function orderList($customer_id,$order_status){

        $result = $this->db->where(array('customer_id'=>$customer_id,'order_status'=>$order_status,'is_deleted !='=>1))->order_by('delivery_date','desc')->get('orders');
        if($result->num_rows() > 0){
            $data="";
            $data .="<table class='table table-bordered table-primary' >";
            $data .="<thead><tr><th>Order Code</th><th>Delivery Date & Time</th><th>Delivery Type</th></tr></thead>";
            foreach($result->result() as $rows ):
            $data .="<tr><td><a href='/admin/orders/edit/".$rows->order_id."'>".$rows->order_code."</a></td><td>".$rows->delivery_date."</td><td>".$rows->delivery_type."</td></tr>";
            endforeach;
            $data .="</table>";
            return  $data;


        }
    }

}