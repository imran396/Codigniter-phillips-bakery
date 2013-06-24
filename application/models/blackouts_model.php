<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Blackouts_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('user_control','control_id');


    }

    public function insert($data)
    {
        $flavour_id=$this->input->post('flavour_id');
        $dbBlack=$this->getBlackouts($flavour_id);
        if (!$dbBlack[0]->blackout_id > 0 ){

            $this->db->set(array('flavour_id'=>$this->input->post('flavour_id'),'blackout_date'=>$this->input->post('blackout_date')))->insert('blackouts');

        }else{

            $this->update($dbBlack[0]->blackout_id);
        }

    }

    public function update($id)
    {
        $this->db->set(array('controller_name'=>strtolower(trim($this->input->post('controller_name')))))->where(array('control_id'=>$id))->update('user_control');
    }



    public function delete($id)
    {

            $this->remove($id);
            $this->session->set_flashdata('delete_msg',$this->lang->line('delete_msg'));

    }



    public function getBlackouts($flavour_id)
    {

        return $this->db->select('*')->where(array('flavour_id'=>$flavour_id))->get('blackouts')->result();

    }

    public function getFlavours()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by('ordering','asc')->get('flavours')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by('ordering','asc')->get('locations')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('blackout_id','desc')->get('blackouts')->result();

    }



}