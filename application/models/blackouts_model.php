<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Blackouts_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('blackouts','blackout_id');


    }

    public function insert($data)
    {

        $curdate=date('m/d/Y');

        $flavour_id=$this->input->post('flavour_id');
        $dbBlack=$this->getBlackouts($flavour_id);
        $dbblackout = isset($dbBlack[0]->blackout_id)? $dbBlack[0]->blackout_id :0;
        if (!$dbblackout > 0 ){

            $blackout_date      = explode(',',$this->input->post('blackout_date'));
            $final          = array();

            foreach($blackout_date as $date){

                if($date >= $curdate){

                    $final[]=$date;
                }
            }
            $final_date=implode(',',$final);
            $this->db->set(array('flavour_id'=>$this->input->post('flavour_id'),'blackout_date'=>$final_date))->insert('blackouts');

        }else{


            $blackout_date  = explode(',',$dbBlack[0]->blackout_date) ;
            $beginning      = explode(',',$this->input->post('blackout_date'));
            $merge          = array_merge((array)$beginning, (array)$blackout_date);
            $unique         = array_unique($merge);
            $final          = array();

            foreach($unique as $date){

                if($date >= $curdate){

                    $final[]=$date;
                }
            }
            $final_date=implode(',',$final);
            $this->db->set(array('flavour_id'=>$this->input->post('flavour_id'),'blackout_date'=>$final_date))->where('blackout_id',$dbBlack[0]->blackout_id)->update('blackouts');
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

        return $this->db
            ->select('flavours.title,blackouts.blackout_id,blackouts.flavour_id,blackouts.blackout_date')
            ->from('blackouts')
            ->join('flavours','flavours.flavour_id=blackouts.flavour_id','inner')
            ->order_by('blackout_id','desc')
            ->get()->result();

    }

    function dateFormate($date){

        $cusdate=strtotime($date);
        return date("M j, Y",$cusdate);

    }

    public function getAll(){


        $data = $this->db->select('flavour_id,blackout_date ')->order_by('flavour_id','asc')->get('blackouts')->result_array();

        foreach($data as $key=>$val){
            $data[$key]['flavour_id'] = (int) $data[$key]['flavour_id'];
            $data[$key]['blackout_date'] = $data[$key]['blackout_date'];
        }

        return $data;

    }



}