<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Access_control_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function save($group_id)
    {



        $this->remove($group_id);
        $control = ($this->input->post('control_id'));
        $i=0;
        foreach ($control as $control_id):
            $this->db->set(array('group_id'=>$group_id,'control_id'=> $control_id,'controller'=>$this->input->post('controller_'.$control_id) ,'listing'=> $this->input->post('listing_'.$control_id),'save'=> $this->input->post('save_'.$control_id),'edit'=> $this->input->post('edit_'.$control_id),'delete'=> $this->input->post('delete_'.$control_id),'view'=> $this->input->post('view_'.$control_id),'status'=> $this->input->post('status_'.$control_id),'others'=> $this->input->post('others_'.$control_id)))->insert('access_control');
        $i++;
        endforeach;


    }

    private function remove($group_id){

        $this->db->where(array('group_id'=>$group_id))->delete('access_control');

    }

    public function getCheck($group_id,$control_id)
    {
        return $rows= $this->db
            ->select('*')
            ->where(array('control_id'=>$control_id,'group_id'=>$group_id))
            ->get('access_control')->result();
    }



    public function getControllers()
    {

       return $this->db->select('*')->where('active',1)->order_by("controller_name", "asc")->get('user_control')->result();

    }

    public function getGroups()
    {

        return $this->db->select('*')->where('status',1)->order_by("description", "asc")->get('groups')->result();

    }




}