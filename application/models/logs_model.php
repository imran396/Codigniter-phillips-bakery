<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Logs_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('auditlog','id');


    }

    public function getEmployeeCode($user_id){

            $this->db->select('employee_id');
            $this->db->from('meta');
            $this->db->where(array('user_id'=> $user_id));
            $meta_row = $this->db->get();
            if($meta_row->num_rows() > 0 ){
                $row =$meta_row->row();
                return $row->employee_id;
            }
            return false;


    }

    public function insertAuditLog($data)
    {
            $this->db->insert('auditlog', $data);
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


}