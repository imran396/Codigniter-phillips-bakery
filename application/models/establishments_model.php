<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Establishments_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('establishments','establishment_id');


    }

    public function create($data)
    {
        unset($data['establishment_id']);
        $this->insert($data);
    }

    public function save($data, $id)
    {

        $data['is_custom_product']=isset($data['is_custom_product'])? 1 : 0 ;
        $this->update($data, $id);
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
                ->where('establishment_id',$id)
                ->get('establishments')->result();
                return $dbcatid[0]->title;

        }

    }

    public function getEstablishments($establishment_id)
    {

        return $this->db->select('*')->where(array('establishment_id'=>$establishment_id))->get('establishments')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('establishments')->result();

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('establishment_id'=>$item));
            $this->db->update('establishments');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getestablishments($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('establishment_id'=>$id))->set(array('status'=>$status))->update('establishments');

    }

    public function checkestablishments($id,$title)
    {
        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $count=$this->db->select('establishment_id')->where(array( strtolower('title') => strtolower($title) ))->get('establishments')->num_rows();
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
        $data = $this->db->select('establishment_id,title')->order_by('ordering','asc')->get('establishments')->result_array();

        foreach($data as $key => $val){
            $data[$key]['establishment_id'] = (int) $data[$key]['establishment_id'];
        }
        return $data;
    }






}