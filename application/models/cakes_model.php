<?php

class Cakes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($data)
    {
        $id = $this->insert($data);
        $this->galleryUpload($data,$id);
//        if (!empty($_FILES["image_name"]["name"])) {
//            //$this->doUpload($id);
//        }
    }

    private function galleryUpload($data,$cake_id){

        foreach ($data as $key => $value) {

            if(strpos($key,'tmpname')){

                $image="assets/uploads/gallery/".nl2br(htmlentities(stripslashes($value)));
                $this->db->set(array('cake_id'=>$cake_id,'image'=>$image))->insert('cake_gallery');

            }

        }
    }

    private function insert($data)
    {
        $flavour_id = (!empty($data['flavour_id'])) ? $data['flavour_id'] :'';

        $insert['title'] = ($data['title'] !="") ? $data['title'] :'';
        $insert['revel_product_id'] = ($data['revel_product_id'] !="") ? $data['revel_product_id'] :'';
        $insert['description'] = ($data['description'] !="") ? $data['description'] :'';
        $insert['category_id'] = ($data['category_id'] !="") ? $data['category_id'] :'';
        $insert['flavour_id'] = ($data['flavour_id'] !="") ? $data['flavour_id'] :'';
        $insert['meta_tag'] = ($data['meta_tag'] !="") ? $data['meta_tag'] :'';
        $insert['revel_product_id'] = ($data['revel_product_id'] !="") ? $data['revel_product_id'] :'';
        $insert['flavour_id'] =($flavour_id !="") ? serialize($flavour_id):'';
        $shape_id = (!empty($data['shape_id'])) ? $data['shape_id'] :'';
        $insert['shape_id'] =($shape_id !="") ? serialize($shape_id):'';
        $insert['fondant'] = ($data['fondant'] !="") ? $data['fondant'] :0;
        $insert['status'] = ($data['status'] !="") ? $data['status'] :'';
        $insert['insert_date']=time();
        $insert['update_date']=time();
        $this->db->set($insert)->insert('cakes');
        return $this->db->insert_id();
    }
    public function save($data, $id)
    {


        $this->update($data, $id);
        $this->galleryUpload($data,$id);
        /* if (!empty($_FILES["image_name"]["name"])) {
             $this->doUpload($id);
         }*/
    }

    private function update($data, $id)
    {

        $flavour_id = (!empty($data['flavour_id'])) ? $data['flavour_id'] :'';
        $insert['title'] = ($data['title'] !="") ? $data['title'] :'';
        //$insert['revel_product_id'] = ($data['revel_product_id'] !="") ? $data['revel_product_id'] :'';
        $insert['description'] = ($data['description'] !="") ? $data['description'] :'';
        $insert['category_id'] = ($data['category_id'] !="") ? $data['category_id'] :'';
        $insert['flavour_id'] =($flavour_id !="") ? serialize($flavour_id):'';
        $shape_id = (!empty($data['shape_id'])) ? $data['shape_id'] :'';
        $insert['shape_id'] =($shape_id !="") ? serialize($shape_id):'';
        $insert['meta_tag'] = ($data['meta_tag'] !="") ? $data['meta_tag'] :'';
        $insert['fondant'] = ($data['fondant'] !="") ? $data['fondant'] :0;
        $insert['status'] = ($data['status'] !="") ? $data['status'] :'';
        $insert['update_date']=time();
        $this->db->set($insert)->where(array('cake_id' => $id))->update('cakes');
    }
    public function doUpload($id)
    {

        $filePath  = "assets/uploads/cakes/";
        $file_name=resize_image($_FILES['image_name'],$filePath,200,140);
        $this->fileDelete($id);
        $filePath  = $filePath.$file_name;
        $this->db->where(array('cake_id' => $id))->set(array('image' => $filePath))->update('cakes');


        $filePath  = "assets/uploads/gallery/";
        $file_name=resize_image($_FILES['image_name'],$filePath,730,480);
        $gallery_photo  = $filePath.$file_name;

        $GalleryImage = $this->getGalleryImage($id);

        if(empty($GalleryImage)){
            $this->db->set(array('cake_id'=>$id,'feature_image'=>1,'image' => $gallery_photo))->insert('cake_gallery');
        }else{
            $this->galleryImageDelete($id);
            $this->db->set(array('image' => $gallery_photo))->where(array('cake_id'=>$id,'feature_image'=>1))->update('cake_gallery');
        }

    }

    private function getGalleryImage($id){

        $result = $this->db->where(array('cake_id'=>$id,'feature_image'=>1))->get('cake_gallery');
        if($result-> num_rows() > 0){

            return $row = $result->row();

        }
        return false;
    }

    private function galleryImageDelete($id){
        $GalleryImage = $this->getGalleryImage($id);
        if(empty($GalleryImage)){
            if (file_exists($GalleryImage->image)) {
                unlink($_SERVER['DOCUMENT_ROOT'] . $GalleryImage->image);
            }
        }
    }

    public function fileDelete($id)
    {
        $row = $this->getCakes($id);


        if (file_exists($row[0]->image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] .'/'. $row[0]->image);
        }
    }

    public function getCakes($cake_id)
    {
        return $this->db->select('*')->where(array('cake_id' => $cake_id))->get('cakes')->result();
    }

    public function getSerializeFlavour($cake_id){

        $row = $this->db->select('flavour_id')->where(array('cake_id' => $cake_id))->get('cakes')->row();
        $flavour_id = unserialize($row->flavour_id);
        $count = count($flavour_id);
        $i=1;
        foreach($flavour_id as $flavourid):

            $res = $this->getFlavourName($flavourid);
            if($count == $i ){
                echo  $res->title;
            }else{
                echo  $res->title.',';
            }
            $i++;

        endforeach;
    }

    public function getFlavourName($flavourid){

        return $res=$this->db->select('flavour_id,title')->where('flavour_id',$flavourid)->get('flavours')->row();

    }



    public function delete($id)
    {
        //if (!$this->deleteDataExisting($id) > 0) {

        //$this->fileDelete($id);
        $this->db->set(array('is_deleted'=>1,'update_date'=>time()))->where('cake_id',$id)->update('cakes');
        $this->db->set(array('is_deleted'=>1,'update_date'=>time()))->where('cake_id',$id)->update('price_matrix');
        $this->session->set_flashdata('delete_msg', "Cake has been deleted successfully");
        //} else {
        //$this->session->set_flashdata('warning_msg', $this->lang->line('existing_data_msg'));
        //}
    }

    public function deleteDataExisting($data = 0)
    {

        $count = $this->db->select('cake_id')->where(array('cake_id'=>$data))->get('orders')->num_rows();;
        return $count;
    }

    public function getListing($start)
    {
        $per_page = 10;
        $page     = intval($start);
        if ($page <= 0) $page = 1;


        $limit      = ($page - 1) * $per_page;
        $base_url   = site_url('admin/cakes/listing');
        $total_rows = $this->db->where('is_deleted !=',1)->count_all_results('cakes');
        $paging     = paginate($base_url, $total_rows, $start, $per_page);

        $this->db->select('cakes.* , categories.title AS categories_name , flavours.title AS flavours_name');
        $this->db->from('cakes');
        $this->db->join('categories', 'categories.category_id = cakes.category_id', 'left');
        $this->db->join('flavours', 'flavours.flavour_id = cakes.flavour_id', 'left');
        $this->db->limit($per_page, $limit);
        $this->db->where('is_deleted !=',1);
        $this->db->order_by("cakes.title", "asc");

        $query = $this->db->get();

        return array($query, $paging, $total_rows, $limit);
    }

    public function getCategories()
    {
        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('categories')->result();
    }

    public function getFlavours()
    {
        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('flavours')->result();
    }

    public function getShapes()
    {
        return $this->db->select('*')->where('status', 1)->order_by('ordering','asc')->get('shapes')->result();
    }

    public function getZones()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('zones')->result();

    }
    public function getLocations()
    {

        return $this->db->select('*')->where('status', 1)->order_by('title','asc')->get('locations')->result();

    }
    public function getCustomers()
    {

        return $this->db->select('customer_id,first_name,last_name')->where(array('status'=> 1,'is_deleted !='=>1))->order_by('first_name','asc')->get('customers')->result();

    }
    public function getEmployees($group_id=0)
    {


        $this->db
            ->select('users.id,users.group_id,users.username,users.email,meta.first_name,meta.last_name,meta.location_id, users.active');
        $this->db->join('meta','users.id =meta.user_id');
        $this->db->join('groups','users.group_id =groups.id');
        if($group_id > 0){
            return $this->db->where(array('users.group_id'=>$group_id,'active'=>1))->order_by('first_name','asc')->get('users')->result();
        }else{
            return $this->db->where(array('active'=>1))->order_by('first_name','asc')->get('users')->result();
        }


    }


    public function sortingList()
    {

        foreach ($_POST['listItem'] as $position => $item) :
            $array=array('ordering'=>$position);
            $this->db->set($array);
            $this->db->where(array('cake_id'=>$item));
            $this->db->update('cakes');

        endforeach;
    }

    function searching($search,$start){

        $search=urldecode(strtolower($search));
        $query="SELECT cakes.* , categories.title AS categories_name , flavours.title AS flavours_name
                FROM `cakes`
                LEFT JOIN categories ON (categories.category_id = cakes.category_id)
                LEFT JOIN flavours ON (flavours.flavour_id = cakes.flavour_id)
                WHERE (is_deleted != 1 AND  LOWER(cakes.title) LIKE '%$search%')
                || (is_deleted != 1 AND LOWER(meta_tag) LIKE '%$search%')";

        $per_page=10    ;
        $page   = intval($start);

        if($page<=0)  $page  = 1;
        $limit=($page-1)*$per_page;

        $base_url   = site_url('admin/cakes/search/'.$search);
        $num = $this->db->query($query);

        $total_rows = $num->num_rows();
        $paging = paginate($base_url, $total_rows,$start,$per_page);
        $limit = " LIMIT $limit , $per_page";

        $pagequery=$query.$limit;
        $query = $this->db->query($pagequery);
        return array($query,$paging,$total_rows,$limit);

    }

    public function statusChange($id)
    {
        $row = $this->getcakes($id);

        if ($row[0]->status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $this->db->where(array('cake_id' => $id))->set(array('status' => $status))->update('cakes');
    }

    public function checkcakes($id, $title)
    {
        $dbtitle = $this->checkUniqueTitle($id);

        if ($title != $dbtitle) {

            $count=$this->db->select('cake_id')->where(array( strtolower('title') => strtolower($title) ))->get('cakes')->num_rows();
            if ($count > 0) {
                $this->form_validation->set_message('checkTitle', $title . ' %s ' . $this->lang->line('duplicate_msg'));
                return false;
            } else {
                return true;
            }
        }

    }


    public function checkUniqueTitle($id)
    {
        if (!empty($id)) {
            $dbtitle = $this->db->select('title')->where('cake_id', $id)->get('cakes')->result();
            return $dbtitle[0]->title;
        }
    }


    public function getAll()
    {
        return $this->db->select('*')->where(array('status'=>1,'is_deleted !=' => 1))->order_by('ordering','asc')->get('cakes')->result_array();
    }



    public function getAllCakes(){
        $imageurlprefix = base_url().'assets';
        $sql = "SELECT
                C.cake_id,C.title,C.category_id,C.flavour_id,C.shape_id,C.tiers,C.fondant,C.meta_tag,C.description,C.image,
              GROUP_CONCAT(G.image ORDER BY G.ordering ASC SEPARATOR ',') as gallery_images
              FROM cakes As C
              LEFT JOIN cake_gallery AS G
                ON ( C.cake_id = G.cake_id )
              WHERE C.status =1 && is_deleted != 1
              GROUP BY C.title";

        $data = $this->db->query($sql)->result_array();

        foreach($data as $key=>$row){
            $data[$key]['cake_id'] = (int) $data[$key]['cake_id'];
            $data[$key]['category_id'] = (int) $data[$key]['category_id'];
            $data[$key]['flavour_id'] =  !empty($row['flavour_id']) ? unserialize($row['flavour_id']):array();
            $data[$key]['shape_id'] =  !empty($row['shape_id']) ? unserialize($row['shape_id']):array();
            $data[$key]['fondant'] = (int) $data[$key]['fondant'];
            $data[$key]['image'] = !empty($data[$key]['image']) ? base_url().$data[$key]['image'] : "";
            //$data[$key]['tiers'] = (int) $data[$key]['tiers'];
            $data[$key]['tiers'] = array('1');

            $data[$key]['gallery_images'] = explode(',', $row['gallery_images']);
            $data[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$data[$key]['gallery_images']);

            if(!empty($result[$key]['gallery_images'])){
                $data[$key]['gallery_images'] = explode(',', $row['gallery_images']);
                $data[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$data[$key]['gallery_images']);
            }else{
                $result[$key]['gallery_images'] = array();
            }

        }

        return $data;

    }

    function getLastUpdateAll($lastdate){


        $imageurlprefix = base_url().'assets';

        $sql = "SELECT
                C.cake_id,C.title,C.category_id,C.flavour_id,C.shape_id,C.tiers,C.fondant,C.meta_tag,C.description,C.image,
                GROUP_CONCAT(G.image ORDER BY G.ordering ASC SEPARATOR ',') as gallery_images
                FROM cakes As C
                LEFT JOIN cake_gallery AS G
                ON ( C.cake_id = G.cake_id )
                WHERE C.status =1 && is_deleted != 1 && insert_date > $lastdate
                GROUP BY C.title";

        $inserted = $this->db->query($sql)->result_array();

        foreach($inserted as $key=>$row){
            $inserted[$key]['cake_id'] = (int) $inserted[$key]['cake_id'];
            $inserted[$key]['category_id'] = (int) $inserted[$key]['category_id'];
            $inserted[$key]['flavour_id'] =  !empty($row['flavour_id']) ? unserialize($row['flavour_id']):array();
            $inserted[$key]['shape_id'] =  !empty($row['shape_id']) ? unserialize($row['shape_id']):array();
            $inserted[$key]['fondant'] = (int) $inserted[$key]['fondant'];
            $inserted[$key]['image'] = !empty($inserted[$key]['image']) ? base_url().$inserted[$key]['image'] : "";
            $inserted[$key]['tiers'] = array('1');
            $inserted[$key]['gallery_images'] = explode(',', $row['gallery_images']);
            $inserted[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$inserted[$key]['gallery_images']);

            if(!empty($result[$key]['gallery_images'])){
                $inserted[$key]['gallery_images'] = explode(',', $row['gallery_images']);
                $inserted[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$inserted[$key]['gallery_images']);
            }else{
                $result[$key]['gallery_images'] = array();
            }

        }

        $update = "SELECT
                C.cake_id,C.title,C.category_id,C.flavour_id,C.shape_id,C.tiers,C.fondant,C.meta_tag,C.description,C.image,
                GROUP_CONCAT(G.image ORDER BY G.ordering ASC SEPARATOR ',') as gallery_images
                FROM cakes As C
                LEFT JOIN cake_gallery AS G
                ON ( C.cake_id = G.cake_id )
                WHERE C.status =1 && is_deleted != 1  && insert_date < $lastdate && update_date > $lastdate
                GROUP BY C.title";

        $updated = $this->db->query($update)->result_array();

        foreach($updated as $key=>$row){
            $updated[$key]['cake_id'] =  (int) $updated[$key]['cake_id'];
            $updated[$key]['category_id'] = (int) $updated[$key]['category_id'];
            $updated[$key]['flavour_id'] =  !empty($row['flavour_id']) ? unserialize($row['flavour_id']):array();
            $updated[$key]['shape_id'] =  !empty($row['shape_id']) ? unserialize($row['shape_id']):array();
            $updated[$key]['fondant'] = (int) $updated[$key]['fondant'];
            $updated[$key]['image'] = !empty($updated[$key]['image']) ? base_url().$updated[$key]['image'] : "";
            $updated[$key]['tiers'] = array('1');

            $updated[$key]['gallery_images'] = explode(',', $row['gallery_images']);
            $updated[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$updated[$key]['gallery_images']);

            if(!empty($result[$key]['gallery_images'])){
                $updated[$key]['gallery_images'] = explode(',', $row['gallery_images']);
                $updated[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$updated[$key]['gallery_images']);
            }else{
                $result[$key]['gallery_images'] = array();
            }

        }

        $deleted = $this->db->where(array('is_deleted'=> 1,'insert_date <'=> $lastdate ,'update_date >'=> $lastdate))->select('cake_id')->order_by('cake_id','asc')->get('cakes')->result();
        foreach($deleted as  $val){
            $delete[] =  (int)$val->cake_id;
        }
        $delete = isset($delete) ? $delete:array();
        return array('inserted'=>$inserted,'updated'=>$updated,'deleted'=>$delete);

    }


    public function findAll()
    {
        return $this->db->select('*')->get('cakes')->result_array();
    }

    public function updateRevelId($cakeId, $revelProductId)
    {
        $this->db->where(array('cake_id' => $cakeId))->set(array('revel_product_id' => $revelProductId))->update('cakes');
    }
}