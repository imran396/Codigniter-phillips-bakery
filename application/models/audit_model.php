<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Audit_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('groups','id');


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

        $sql="SELECT COUNT(id) AS countValue FROM users  WHERE (group_id = '$data' )";
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

    public function  checkUniquename($id){

        if(!empty($id)){
            return $dbcatid = $this->db->select('name')
                ->where('id',$id)
                ->get('groups')->result()[0]->name;

        }

    }

    public function getroles($id)
    {

        return $this->db->select('*')->where(array('id'=>$id))->get('groups')->result();

    }

    public function getListing($start)
    {

        $per_page = 10;
        $page     = intval($start);
        if ($page <= 0) $page = 1;


        $limit      = ($page - 1) * $per_page;
        $base_url   = site_url('admin/auditlog/listing');
        $total_rows = $this->db->count_all_results('auditlog');
        $paging     = paginate($base_url, $total_rows, $start, $per_page);

        $this->db->select('*');
        $this->db->from('auditlog');
        $this->db->limit($per_page, $limit);
        $this->db->order_by("auditlog.created_time", "desc");
        $query = $this->db->get();

        return array($query, $paging, $total_rows, $limit);
    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('id'=>$item));
            $this->db->update('groups');

        endforeach;
    }


    public function statusChange($id){

        $row=$this->getroles($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('id'=>$id))->set(array('status'=>$status))->update('groups');
    }

    public function checkRoles($id,$name)
    {


        $dbname = $this->checkUniquename($id);
        if($name != $dbname ){

            $sql=sprintf("SELECT COUNT(id) AS countValue FROM groups WHERE (LOWER(name) = LOWER('{$name}'))");
            $count=$this->db->query($sql)->result();
            if($count[0]->countValue > 0 )
            {
                $this->form_validation->set_message('checkname', $name.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }



}