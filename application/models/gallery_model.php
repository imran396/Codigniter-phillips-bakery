<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Gallery_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }

    public function create($data)
    {
        $this -> save($data);
    }

    public function save($data)
    {

        foreach ($data as $key => $value) {

           if(strpos($key,'tmpname')){

                $cake_id=$this->input->post('cake_id');
                $image="assets/uploads/gallery/".nl2br(htmlentities(stripslashes($value)));
                $this->db->set(array('cake_id'=>$cake_id,'image'=>$image))->insert('cake_gallery');

           }

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
            $filePath="/assets/uploads/cakes/".$file_name;
            $this->db->where(array('cake_id'=>$id))->set(array('image'=>$filePath))->update('cakes');


    }


    function galleryDelete($id)
    {
        $rows = $this->getGallery($id);
        if (file_exists($rows->image))
        {
            unlink($_SERVER['DOCUMENT_ROOT'].$rows->image);
        }
        $this->db->where(array('gallery_id'=>$id,'feature_image !='=>1))->delete('cake_gallery');
    }


    public function imageDelete($id)
    {

        $rows=$this->db->where(array('gallery_id'=>$id,'feature_image !='=>1))->get('cake_gallery')->row();
        if($rows->image){
            if (file_exists($rows->image))
            {
                unlink($_SERVER['DOCUMENT_ROOT'].$rows->image);
            }
            $this->db->where(array('gallery_id'=>$id,'feature_image !='=>1))->delete('cake_gallery');
            $this->session->set_flashdata('delete_msg',$this->lang->line('delete_msg'));
        }else{
            $this->session->set_flashdata('wrinn_msg',$this->lang->line('delete_msg'));
        }
    }


    public function statusChange($id){

        $row=$this->getGallery($id);
        if($row[0]->status == 1 ){
            $status=0;
        }else{
            $status=1;
        }
        $this->db->where(array('gallery_id'=>$id))->set(array('status'=>$status))->update('cake_gallery');

    }


    public function getCakeList()
    {

        return $this->db->select('*')->where('status',1)->get('cakes')->result();

    }

    public function getCakeGallery($start)
    {


        $per_page = 12;
        $page     = intval($start);
        if ($page <= 0) $page = 1;
        $limit      = ($page - 1) * $per_page;
        $base_url   = site_url('admin/gallery/listing');
        $paging = $this->db->select('cakes.cake_id,cakes.title ,cakes.image')
                ->from('cake_gallery')
                ->join('cakes','cakes.cake_id = cake_gallery.cake_id')
                ->group_by('cake_gallery.cake_id')
                ->get();
        $total_rows =$paging->num_rows();
        $paging     = paginate($base_url, $total_rows, $start, $per_page);

        $query = $this->db

            ->select('cakes.cake_id,cakes.title ,cakes.image')
            ->from('cake_gallery')
            ->join('cakes','cakes.cake_id = cake_gallery.cake_id')
            ->group_by('cake_gallery.cake_id')
            ->limit($per_page, $limit)
            ->get()
            ->result();

        return array($query, $paging, $total_rows, $limit);

    }

    public function getGallery($cake_id)
    {


        $result = $this->db->select('*')->where(array('cake_id'=>$cake_id))->order_by('feature_image','desc')->get('cake_gallery');
        if($result ->num_rows() > 0){
            return $result->result();
        }else{
            return false;
        }

    }

    public function getListing(){

        return $this->db->select('cake_gallery.*,cakes.title')
            ->from('cake_gallery')
            ->join('cakes','cakes.cake_id = cake_gallery.cake_id', 'left')
            ->get()
            ->result();

    }




}