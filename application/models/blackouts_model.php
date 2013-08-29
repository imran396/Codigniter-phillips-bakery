<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Blackouts_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('blackouts','blackout_id');


    }

    public function insert()
    {

        $curdate=date('m/d/Y');

        $location_id=$this->input->post('location_id');
        $flavour=$this->input->post('flavour_id');

        foreach($flavour as $flavour_id):

            $dbBlack=$this->getBlackouts($location_id,$flavour_id);
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
                $this->db->set(array('location_id'=>$location_id , 'flavour_id'=>$flavour_id,'blackout_date'=>$final_date))->insert('blackouts');

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
                $this->db->set(array('location_id'=>$location_id ,'flavour_id'=>$flavour_id,'blackout_date'=>$final_date))->where('blackout_id',$dbBlack[0]->blackout_id)->update('blackouts');
            }

        endforeach;
    }


    public function delete($id)
    {

            $this->remove($id);
            $this->session->set_flashdata('delete_msg',$this->lang->line('delete_msg'));

    }



    public function getBlackouts($location_id,$flavour_id)
    {

        return $this->db->select('*')->where(array('location_id'=>$location_id,'flavour_id'=>$flavour_id))->get('blackouts')->result();

    }

    public function getFlavours()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by('title','asc')->get('flavours')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where(array('status'=>1))->order_by('title','asc')->get('locations')->result();

    }

    public function getListing($start)
    {

        $per_page=10;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;
        $base_url = site_url('admin/blackouts/listing');


        $total_rows = $this->db->count_all_results('blackouts');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
              $query = $this->db
            ->select('flavours.title,blackouts.location_id,blackouts.blackout_id,blackouts.flavour_id,blackouts.blackout_date')
            ->from('blackouts')
            ->join('flavours','flavours.flavour_id=blackouts.flavour_id','inner')
            ->order_by('blackout_date','desc')
            ->limit($per_page,$limit)
            ->get()->result();

        return array($query,$paging,$total_rows,$limit);

    }

    function dateFormate($date){

        $cusdate=strtotime($date);
        return date("M j, Y",$cusdate);

    }

    public function getAll(){


        $data = $this->db->select('location_id,flavour_id,blackout_date')->order_by('flavour_id','asc')->get('blackouts')->result_array();

        foreach($data as $key=>$val){

            $data[$key]['location_id'] = (int) $data[$key]['location_id'];
            $data[$key]['flavour_id'] = (int) $data[$key]['flavour_id'];
            $data[$key]['blackout_date'] = $data[$key]['blackout_date'];
        }

        return $data;

    }



}