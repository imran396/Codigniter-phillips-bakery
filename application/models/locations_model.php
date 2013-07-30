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

       $vaughan_location = (!empty($data['vaughan_location'])) ? $data['vaughan_location'] :'';
       $this->checkVaughan($vaughan_location);
       if($this->checkVaughan($vaughan_location) > 0){
         $data['vaughan_location']='';
       }
       $this->insert($data);
    }

    public function save($data, $id)
    {

        if($this->checkVaughan() > 0){
            $data['vaughan_location']=0;
         }
        $this->update($data, $id);
    }

    private function  checkVaughan(){

            return $dbcatid = $this->db->select('vaughan_location')->where('vaughan_location',1)->get('locations')->num_rows();
    }

    public function deleteDataExisting($data=0){


            $price_matrix=$this->db->select('location_id')->where(array('location_id'=>$data))->get('price_matrix')->num_rows();
            $blackouts=$this->db->select('location_id')->where(array('location_id'=>$data))->get('blackouts')->num_rows();
            $orders=$this->db->select('location_id')->where(array('location_id'=>$data))->get('orders')->num_rows();
            $ickup_location=$this->db->select('pickup_location_id 	')->where(array('pickup_location_id'=>$data))->get('orders')->num_rows();

        if($price_matrix > 0){
            return $count = $price_matrix;
        }else if($blackouts > 0){
            return $count = $price_matrix;
        }else if($orders > 0){
            return $count = $price_matrix;
        }else if($ickup_location > 0){
            return $count = $ickup_location;
        }

    }

    public function delete($id)
    {

        if(!$this->deleteDataExisting($id) > 0){
            $this->remove($id);
            $this->session->set_flashdata('delete_msg',"Location has been deleted successfully");
        }else{

            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
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

    private function  checkUniqueTitle($id){

        if(!empty($id)){
            $dbcatid = $this->db->select('title')
                ->where('location_id',$id)
                ->get('locations')->row();
                return $dbcatid->title;

        }

    }



    private function  checkUniqueVaughan($id){

        if(!empty($id)){
            $dbcatid = $this->db->select('vaughan_location')
                ->where('location_id',$id)
                ->get('locations')->row();
            return $dbcatid->vaughan_location;

        }

    }


    public function checkLocations($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle){


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


    public function vaughanLocation($id,$VaughanLocation)
    {


        $dbVaughan = $this->checkUniqueVaughan($id);

        if($VaughanLocation != $dbVaughan ){


            $count=$this->db->select('vaughan_location')->where(array( 'vaughan_location' => $VaughanLocation ))->get('locations')->num_rows();
            if($count > 0 )
            {
                $this->form_validation->set_message('checkVaughanLocation',$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }

    public function getAll()
    {
        $data = $this->db->select('location_id as id ,title,address1,address2,city,province,postal_code,country,pos_api,surcharge,store_print_ip,kitchen_print_ip')->order_by('location_id','DSC')->get('locations')->result_array();

        foreach($data as $key => $val){
            $data[$key]['id'] = (int) $data[$key]['id'];
            $data[$key]['surcharge'] = (float) $data[$key]['surcharge'];
        }
        return $data;
    }



}