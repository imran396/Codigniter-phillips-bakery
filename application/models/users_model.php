<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Users_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('users','id');


    }


    public function update($data, $id)
    {
        $array = array('first_name'=>$data['first_name'],'last_name'=>$data['last_name'],'revel_user_id'=>$data['revel_user_id']);
        $this->db->set($array)->where(array('id'=>$id))->update('meta');
        $array = array('email'=>$data['email'],'group_id'=>$data['group_id']);
        $this->db->set($array)->where(array('id'=>$id))->update('users');

    }

    public function deleteDataExisting($data=0){


        $employee_id=$this->db->select('employee_id')->where(array('employee_id'=>$data))->get('orders')->num_rows();
        $manager_id=$this->db->select('manager_id')->where(array('manager_id'=>$data))->get('orders')->num_rows();

        if($employee_id > 0){
            return $count = $employee_id;
        }else if($manager_id > 0){
            return $count = $manager_id;
        }
    }

    public function delete($id)
    {

        if(!$this->deleteDataExisting($id) > 0){

            $this->db->where('id',$id)->delete(array('users','meta'));
            $this->session->set_flashdata('delete_msg',"Employee has been deleted successfully");
        }else{

            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        }

    }


    public function getGroup()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by("ordering", "asc")->get('groups')->result();

    }

    public function getListing($start)
    {
        $per_page=10;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/users/listing');
        $total_rows = $this->db->count_all_results('users');
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('users.*,meta.first_name,meta.last_name,groups.description,meta.employee_id');
        $this->db->from('users');
        $this->db->join('meta','users.id =meta.user_id');
        $this->db->join('groups','users.group_id =groups.id');
        $this->db->limit($per_page,$limit);
        $this->db->order_by("users.id", "desc");
        $query =$this->db->get();
        return array($query,$paging,$total_rows,$limit);


    }

    public function getusers($username)
    {

        return $this->db
            ->select('users.*,meta.*')
            ->join('meta','users.id =meta.user_id')
            ->join('groups','users.group_id =groups.id')
            ->where(array('username'=>$username))->get('users')->result();

    }

    function searching($search,$start){

        $search=strtolower($search);
        $query="SELECT users.*,meta.first_name,meta.last_name,groups.description,meta.employee_id
                FROM `users`
                LEFT JOIN meta ON (meta.user_id = users.id)
                LEFT JOIN groups ON (groups.id = users.id)
                WHERE(`user_id` > 0 AND  LOWER(meta.first_name) LIKE '%$search%')
                || ( `user_id` > 0 AND LOWER(meta.last_name) LIKE '%$search%')
                || ( users.id > 0 AND LOWER(users.username) LIKE '%$search%')
                || (`user_id` > 0 AND LOWER(meta.employee_id) = '$search')";

        $per_page=10;
        $page   = intval($start);
        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;
        $base_url = site_url('admin/users/search/'.$search);
        $num = $this->db->query($query);
        $total_rows = $num->num_rows();
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $limit = "LIMIT $limit , $per_page";
        $pagequery=$query.$limit;
        $query = $this->db->query($pagequery);
        return array($query,$paging,$total_rows,$limit);

    }

    public function getLocations()
    {

        return $this->db->select('*')->where('status',1)->order_by("ordering", "asc")->get('locations')->result();

    }

    public function statusChange($username){

        $row=$this->getusers($username);
        if($row[0]->active == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('username'=>$username))->set(array('active'=>$status))->update('users');

    }



    public function getAll(){

        $this->db->select('users.id,meta.employee_id,meta.first_name,meta.last_name,groups.name as role,users.active');
        $this->db->from('users');
        $this->db->join('groups', ' groups.id = users.group_id');
        $this->db->join('meta', 'meta.user_id = users.id');
        $data = $this->db->get()->result_array();
        foreach($data as $key => $val){
            $data[$key]['id'] = (int)  $data[$key]['id'];
            $data[$key]['active'] = (int)  $data[$key]['active'];
        }
        return $data;
    }



}