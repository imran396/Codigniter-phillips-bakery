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

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('shapes')->result();

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



}