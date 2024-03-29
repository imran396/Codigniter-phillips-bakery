<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Controls_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('user_control','control_id');


    }

    public function create($data)
    {

        $this->db->set(array('controller_name'=>strtolower(trim($this->input->post('controller_name')))))->insert('user_control');
    }

    public function save($data, $id)
    {
        $this->db->set(array('controller_name'=>strtolower(trim($this->input->post('controller_name')))))->where(array('control_id'=>$id))->update('user_control');
    }

    public function deleteDataExisting($data=0){

       return $count=$this->db->where(array('control_id' => $data))->count_all_results('access_control');
    }

    public function delete($id)
    {


        if(!$this->deleteDataExisting($id) > 0){
            $this->remove($id);
            $this->session->set_flashdata('delete_msg',"Control has been deleted successfully");
        }else{

            $this->session->set_flashdata('warning_msg',$this->lang->line('existing_data_msg'));
        }

    }

    public function  checkUniquecontroller_name($id){

        if(!empty($id)){
            $dbcatid = $this->db->select('controller_name')
                ->where('control_id',$id)
                ->get('user_control')->row();
            return $dbcatid->controller_name;

        }

    }

    public function getcontrols($control_id)
    {

        return $this->db->select('*')->where(array('control_id'=>$control_id))->get('user_control')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('user_control')->result();

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :

            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('control_id'=>$item));
            $this->db->update('user_control');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getcontrols($id);
        if($row[0]->active == 1 ){
            $active=0;
        }else{
            $active=1;
        }
        $this->db->where(array('control_id'=>$id))->set(array('active'=>$active))->update('user_control');

    }

    public function checkcontrols($id,$controller_name)
    {


        $dbcontroller_name = $this->checkUniquecontroller_name($id);
        if($controller_name != $dbcontroller_name ){

            $sql=sprintf("SELECT COUNT(control_id) AS countValue FROM user_control WHERE (LOWER(controller_name) = LOWER('{$controller_name}'))");
            $count=$this->db->query($sql)->result();
            if($count[0]->countValue > 0 )
            {
                $this->form_validation->set_message('checkname', $controller_name.' %s '.$this->lang->line('duplicate_msg'));
                return FALSE;
            }else{
                return TRUE;
            }
        }

    }



}