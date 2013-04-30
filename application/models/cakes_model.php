<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Cakes_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
        $this->load->library('upload');
        $this->loadTable('cakes','cake_id');


    }

    public function create($data)
    {
        $id = $this->insert($data);
        if($this->upload->do_upload()){
        $this->doUpload($id);
        }

    }

    public function save($data, $id)
    {
        $this->update($data, $id);

       if(!$_FILES["image_name"]["name"]){
            $this->doUpload($id);
       }

    }


    public function doUpload($id)
    {

            $config['upload_path'] = 'assets/uploads/cakes/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['remove_spaces'] = TRUE;
            $config['max_size'] = 7000;
            $this->load->library('upload', $config);
            // Alternately you can set preferences by calling the initialize function. Useful if you auto-load the class:

            $this->upload->initialize($config);
            if($this->upload->do_upload('image_name')){
                $upload_data = $this->upload->data();
                $image_dir = $upload_data['file_path'];
                $image = $upload_data['full_path'];
                $config['source_image'] = $image;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 350;
                $config['height'] =200;
                $this->image_lib->resize();
                $this->fileDelete($id);
            }else{
                $this->session->set_flashdata('warning_msg',$this->upload->display_errors());
            }
            $file_name = $upload_data['file_name'];
            $filePath="assets/uploads/cakes/".$file_name;
            $this->db->where(array('cake_id'=>$id))->set(array('image'=>$filePath))->update('cakes');


    }


    function fileDelete($id)
    {
        $row = $this->getCakes($id);
        if (file_exists($row[0]->image))
        {
            unlink($_SERVER['DOCUMENT_ROOT'].$row[0]->image);
        }


    }

    public function deleteDataExisting($data=0){

        $sql=sprintf("SELECT COUNT(cake_id) AS countValue FROM cakes  WHERE (cake_id = '{$data}' )");
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
                ->where('cake_id',$id)
                ->get('cakes')->result()[0]->title;

        }

    }

    public function getCakes($cake_id)
    {

        return $this->db->select('*')->where(array('cake_id'=>$cake_id))->get('cakes')->result();

    }

    public function getListing()
    {

        return $this->db->select('*')->get('cakes')->result();

    }
    public function getCategories()
    {

        return $this->db->select('*')->where('status',1)->get('categories')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where('status',1)->get('locations')->result();

    }

    public function statusChange($id){

        $row=$this->getcakes($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('cake_id'=>$id))->set(array('status'=>$status))->update('cakes');

    }

    public function checkcakes($id,$title)
    {


        $dbtitle = $this->checkUniqueTitle($id);
        if($title != $dbtitle ){

            $sql=sprintf("SELECT COUNT(cake_id) AS countValue FROM cakes WHERE (LOWER(title) = LOWER('{$title}'))");
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