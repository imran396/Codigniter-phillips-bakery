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
            $this->db->where('user_id', $user_id);
            $meta_row = $this->db->get()->row();
            return $meta_row->employee_id;
    }

    public function insertAuditLog($data)
    {
            $this->db->insert('auditlog', $data);
    }
}