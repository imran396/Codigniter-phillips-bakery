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
        $this->db->set($data)->insert('flavours');
    }

    public function update($data, $id)
    {
        $this->db->set($data)->where(array('flavour_id'=>$id))->update('flavours');
    }
    function checkSerialize($id_serialize){
       $s = strlen((string)$id_serialize);
       return $id_serialize = ';s:'.$s.':"'.$id_serialize.'";';
    }

    public function deleteDataExisting($data=0){

        $id_serialize = $this->checkSerialize($data);
        $req =  ("SELECT cake_id FROM cakes WHERE flavour_id LIKE  '%" . $id_serialize . "%'");
        $count = $this->db->query($req)->num_rows();

        $order_count=$this->db
            ->select('orders.flavour_id')
            ->from('orders')
            ->where(array('orders.flavour_id'=>$data))
            ->get()->num_rows();

        $blackout_count=$this->db
            ->select('blackouts.flavour_id')
            ->from('blackouts')
            ->where(array('blackouts.flavour_id'=>$data))
            ->get()->num_rows();

        if($count > 0 ){
            return $count;
        }elseif($order_count > 0){
            return $order_count;
        }elseif($blackout_count > 0){
            return $blackout_count;
        }return false;


    }

    public function delete($id)
    {

        if(!$this->deleteDataExisting($id) > 0){
            $this->remove($id);
            $this->session->set_flashdata('delete_msg',"Flavour has been deleted successfully");
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

    public function getAll()
    {
        $data = $this->db->select('flavour_id,title as flavour_title,fondant')->order_by('title','asc')->get('flavours')->result_array();
        foreach($data as $key => $val){
            $data[$key]['flavour_id'] = (int) $data[$key]['flavour_id'];
            $data[$key]['fondant'] = (int) $data[$key]['fondant'];
        }
        return $data;
    }



}