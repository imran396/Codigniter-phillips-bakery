<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Users_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('shapes','shape_id');


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

        $sql=sprintf("SELECT COUNT(shape_id) AS countValue FROM cakes  WHERE (shape_id = '{$data}' )");
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
                ->where('shape_id',$id)
                ->get('shapes')->result()[0]->title;

        }

    }

    public function getGroup()
    {

        return $this->db->select('*')->where(array('status'=>1))->get('groups')->result();

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
        $this->db->select('users.*,meta.first_name,meta.last_name,groups.description');
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
            ->select('users.username,users.email,meta.first_name,meta.last_name')
            ->join('meta','users.id =meta.user_id')
            ->join('groups','users.group_id =groups.id')
            ->where(array('username'=>$username))->get('users')->result();

    }

    public function statusChange($id){

        $row=$this->getusers($id);
        if($row[0]->active == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('id'=>$id))->set(array('active'=>$status))->update('users');

    }

    public function checkshapes($id,$title)
    {
        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $sql=sprintf("SELECT COUNT(shape_id) AS countValue FROM shapes WHERE (LOWER(title) = LOWER('{$title}'))");
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

    public function getAll(){
        $this->db->select('users.id,users.user_code,users.first_name,users.last_name,groups.name');
        $this->db->from('users');
        $this->db->join('groups', 'users.group_id = groups.id');
        $data = $this->db->get()->result_array();
        foreach($data as $key => $val){
            $data[$key]['id'] = (int)  $data[$key]['id'];
        }
        return $data;
    }



}