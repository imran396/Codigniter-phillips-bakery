<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Locations_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('locations','location_id');


    }

    public function create($data)
    {
        $this->insert($data);
    }

    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function deleteDataExistingx($data=0){

        $count=$this->db->select('location_id')->where(array('location_id'=>$data))->get('price_matrix')->num_rows();
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
                ->where('location_id',$id)
                ->get('locations')->result();
                return $dbcatid[0]->title;

        }

    }

    public function getLocations($location_id)
    {

        return $this->db->select('*')->where(array('location_id'=>$location_id))->get('locations')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('locations')->result();

    }
    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('location_id'=>$item));
            $this->db->update('locations');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getLocations($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('location_id'=>$id))->set(array('status'=>$status))->update('locations');

    }

    public function checkLocations($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){


            $count=$this->db->select('location_id')->where(array( strtolower('title') => strtolower($title) ))->get('locations')->num_rows();
            if($count > 0 )
            {
                $this->form_validation->set_message('checkTitle', $title.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }



}