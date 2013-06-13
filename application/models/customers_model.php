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
        $this->insert($data);
    }

    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function deleteDataExisting($data=0){

        $sql=sprintf("SELECT COUNT(customer_id) AS countValue FROM orders  WHERE (customer_id = '{$data}' )");
        return $count=$this->db->query($sql)->result()[0]->countValue;
    }

    public function delete($id)
    {


        if(!$this->deleteDataExisting($id) > 0){
            $this->remove($id);
            $this->session->set_flashdata('delete_msg',$this->lang->line('delete_msg'));
        }else{

            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        }

    }

    public function  checkUniqueTitle($id){

        if(!empty($id)){
            return $dbcatid = $this->db->select('title')
                ->where('customer_id',$id)
                ->get('customers')->result()[0]->title;

        }

    }

    public function getcustomers($customer_id)
    {
        return $this->db->select('*')->where(array('customer_id'=>$customer_id))->get('customers')->result();

    }

    public function getListing($start)
    {

        $per_page=10;
        $num_link=3;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/users/listing');
        $total_rows = $this->db->count_all_results('users');
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('customers.*');
        $this->db->from('customers');
        $this->db->limit($per_page,$limit);
        $this->db->order_by("customers.customer_id", "desc");
        $query =$this->db->get();
        return array($query,$paging,$total_rows,$limit);

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

            $sql=sprintf("SELECT COUNT(customer_id) AS countValue FROM customers WHERE (LOWER(title) = LOWER('{$title}'))");
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
        $data = $this->db->select('customer_id,first_name,last_name,phone_number,email,address_1,address_2,city,province,postal_code,country')->order_by('customer_id','asc')->get('customers')->result_array();
        foreach($data as $key => $val){
              $data[$key]['customer_id'] = (int) $data[$key]['customer_id'];
        }
        return $data;
    }



}