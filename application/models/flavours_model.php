<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class flavours_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->loadTable('flavours','flavour_id');


    }



    public function insert($data)
    {
        //$data['tire_id'] = ($data['tire_id'] !="") ? serialize($data['tire_id']):'';
        $this->db->set($data)->insert('flavours');
    }

    public function update($data, $id)
    {
       // $data['tire_id'] = ($data['tire_id'] !="") ? serialize($data['tire_id']):'';
        $this->db->set($data)->where(array('flavour_id'=>$id))->update('flavours');
    }

    public function deleteDataExisting($data=0){

        $count=$this->db
            ->select('flavours.flavour_id')
            ->from('flavours')
            ->join('cakes', 'cakes.flavour_id = flavours.flavour_id','left')
            ->join('price_matrix', 'price_matrix.flavour_id = flavours.flavour_id','right')
            ->where(array('flavours.flavour_id'=>$data))
            ->group_by('price_matrix.flavour_id')
            ->get()
            ->num_rows();

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
            $dbtitle = $this->db->select('title')
                ->where('flavour_id',$id)
                ->get('flavours')->result();
                $title =  $dbtitle[0]->title;
                return $title;

        }

    }

    public function getflavours($flavour_id)
    {

        return $this->db->select('*')->where(array('flavour_id'=>$flavour_id))->get('flavours')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->order_by('ordering','asc')->get('flavours')->result();

    }

    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('flavour_id'=>$item));
            $this->db->update('flavours');

        endforeach;
    }

    public function statusChange($id){

        $row=$this->getflavours($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('flavour_id'=>$id))->set(array('status'=>$status))->update('flavours');

    }

    public function checkflavours($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $count=$this->db->select('flavour_id')->where(array( strtolower('title') => strtolower($title) ))->get('flavours')->num_rows();
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