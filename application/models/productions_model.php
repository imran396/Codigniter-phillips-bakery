<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Productions_model extends Ci_Model
{
    public function __construct()
    {
        parent::__construct();

    }


    public function deleteDataExisting($data=0){


        $id_serialize = '"'.$data.'"';
        $SQL = sprintf("SELECT cake_id FROM cakes  WHERE shape_id LIKE  '%s%s%s'", '%',$id_serialize, '%' );
        $count=$this->db->query($SQL)->num_rows();
        return $count;
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
             $dbcatid = $this->db->select('title')
                ->where('shape_id',$id)
                ->get('shapes')->result();
                return $dbcatid[0]->title;

        }

    }

    public function getshapes($shape_id)
    {

        return $this->db->select('*')->where(array('shape_id'=>$shape_id))->get('shapes')->result();

    }

    public function getListing($start)
    {

        $location_id=1;
        $per_page=3;
        $page   = intval($start);
        if( $page<=0 )  $page  = 1;
        $limit= ( $page-1 ) * $per_page;
        $base_url = site_url('admin/productions/inproduction/');
        $total_rows = $this->db->count_all_results('orders');
        $paging = production_paginate($base_url, $total_rows,$start,$per_page);
        $this->db->select('orders.*,cakes.title AS cake_name ,flavours.title AS flavour_name,customers.first_name,customers.last_name');
        $this->db->from('orders');
        $this->db->join('cakes','cakes.cake_id = orders.cake_id','left');
        $this->db->join('customers','customers.customer_id = orders.customer_id','left');
        $this->db->join('flavours','flavours.flavour_id = orders.flavour_id','left');
        $this->db->limit($per_page,$limit);
        $this->db->where(array("orders.location_id"=> $location_id));
        $this->db->or_where(array("orders.pickup_location_id"=> $location_id));
        $this->db->order_by("orders.order_id", "desc");
        $query =$this->db->get()->result();
        return array($query,$paging);

    }

    function dateFormate($date){

        $cusdate=strtotime($date);
        return date("M j, Y",$cusdate);

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('shape_id'=>$item));
            $this->db->update('shapes');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getshapes($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('shape_id'=>$id))->set(array('status'=>$status))->update('shapes');

    }

    public function checkshapes($id,$title)
    {
        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $count=$this->db->select('shape_id')->where(array( strtolower('title') => strtolower($title) ))->get('shapes')->num_rows();
            if($count > 0 )
            {
                $this->form_validation->set_message('checkTitle', $title.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }

    public function getAll()
    {
        $data = $this->db->select('shape_id,title')->order_by('ordering','asc')->get('shapes')->result_array();

        foreach($data as $key => $val){
            $data[$key]['shape_id'] = (int) $data[$key]['shape_id'];
        }
        return $data;
    }






}