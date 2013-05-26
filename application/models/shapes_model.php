<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Shapes_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('shapes','shape_id');


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

        $sql=sprintf("SELECT COUNT(shape_id) AS countValue FROM cakes  WHERE (shape_id = '{$data}' )");
        return $count=$this->db->query($sql)->result()[0]->countValue;
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
            return $dbcatid = $this->db->select('title')
                ->where('shape_id',$id)
                ->get('shapes')->result()[0]->title;

        }

    }

    public function getshapes($shape_id)
    {

        return $this->db->select('*')->where(array('shape_id'=>$shape_id))->get('shapes')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->get('shapes')->result();

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

            $sql=sprintf("SELECT COUNT(shape_id) AS countValue FROM shapes WHERE (LOWER(title) = LOWER('{$title}'))");
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