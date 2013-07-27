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
}