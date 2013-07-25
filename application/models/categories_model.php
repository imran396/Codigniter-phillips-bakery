<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Categories_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->loadTable('categories','category_id');
    }

    public function create($data)
    {
        $this->insert($data);
    }

    public function save($data, $id)
    {
        $this->update($data, $id);
    }

    public function deleteDataExisting($data=0)
    {

        $count=$this->db->select('category_id')->where(array('category_id'=>$data))->get('cakes')->num_rows();
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

    public function  checkUniqueTitle($id)
    {

        if(!empty($id)){
             $dbcatid = $this->db->select('title')
                ->where('category_id',$id)
                ->get('categories')->result();
                $title = $dbcatid[0]->title;
                return $title;

        }

    }

    public function getCategories($category_id)
    {

        return $this->db->select('*')->where(array('category_id'=>$category_id))->get('categories')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('title','asc')->get('categories')->result();

    }

    public function statusChange($id)
    {

        $row=$this->getCategories($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('category_id'=>$id))->set(array('status'=>$status))->update('categories');

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('category_id'=>$item));
            $this->db->update('categories');

        endforeach;
    }

    public function checkCategories($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $count=$this->db->select('category_id')->where(array( strtolower('title') => strtolower($title) ))->get('categories')->num_rows();
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
        $data = $this->db->select('category_id,title')->order_by('ordering','asc')->get('categories')->result_array();

        foreach($data as $key=>$val){
            $data[$key]['category_id'] = (int) $data[$key]['category_id'];
        }

        return $data;
    }

    public function getCategoryDropDownArray(){
        $data = $this->getAll();
        foreach($data as $key => $val){
            $dropdown_array[$val['category_id']] = $val['title'];
        }
        return $dropdown_array;
    }



}