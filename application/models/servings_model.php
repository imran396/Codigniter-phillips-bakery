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

        $sql=sprintf("SELECT COUNT(serving_id) AS countValue FROM cakes  WHERE (serving_id = '{$data}' )");
        return $count=$this->db->query($sql)->result()[0]->countValue;
    }

    public function delete($id)
    {

            $this->remove($id);
            $this->session->set_flashdata('delete_msg',$this->lang->line('delete_msg'));

    }

    public function  checkUniqueTitle($id){

        if(!empty($id)){
            return $dbcatid = $this->db->select('title')
                ->where('serving_id',$id)
                ->get('servings')->result()[0]->title;

        }

    }

    public function getservings($serving_id)
    {

        return $this->db->select('*')->where(array('serving_id'=>$serving_id))->get('servings')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->get('servings')->result();

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

            $sql=sprintf("SELECT COUNT(serving_id) AS countValue FROM servings WHERE (LOWER(title) = LOWER('{$title}'))");
            $count=$this->db->query($sql)->result();
            if($count[0]->countValue > 0 )
            {
                $this->form_validation->set_message('checkTitle', $title.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }



}