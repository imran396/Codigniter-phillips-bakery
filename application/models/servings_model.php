<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Servings_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('servings','serving_id');


    }

    public function create($data)
    {
        $this->insert($data);
    }

    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function deleteDataExisting($data=0){


        $count=$this->db->select('serving_id')->where(array('serving_id'=>$data))->get('price_matrix')->num_rows();
        return $count;
    }

    public function delete($id)
    {

        if(!$this->deleteDataExisting($id) > 0){
            $this->remove($id);
            $this->session->set_flashdata('delete_msg',"Serving has been deleted successfully");
        }else{

            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        }


    }

    public function  checkUniqueTitle($id){

        if(!empty($id)){
            $dbcatid = $this->db->select('title')
                ->where('serving_id',$id)
                ->get('servings')->result();
                return $dbcatid [0]->title;

        }

    }

    public function getservings($serving_id)
    {

        return $this->db->select('*')->where(array('serving_id'=>$serving_id))->get('servings')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('servings')->result();

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('serving_id'=>$item));
            $this->db->update('servings');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getservings($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('serving_id'=>$id))->set(array('status'=>$status))->update('servings');

    }

    public function checkservings($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){


            $count=$this->db->select('serving_id')->where(array( strtolower('title') => strtolower($title) ))->get('servings')->num_rows();
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
        $data = $this->db->select('serving_id,title as serving_title ,size,printing_surcharge ')->order_by('title','asc')->get('servings')->result_array();

        foreach($data as $key => $val){
            $data[$key]['serving_id'] = (int) $data[$key]['serving_id'];
        }
        return $data;
    }




}