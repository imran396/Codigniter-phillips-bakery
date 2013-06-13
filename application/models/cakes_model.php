<?php

class Cakes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('image_lib');
    }

    public function create($data)
    {
        $id = $this->insert($data);

        if (!empty($_FILES["image_name"]["name"])) {
            $this->doUpload($id);
        }
    }

    private function insert($data)
    {
        $data['shape_id'] = serialize($data['shape_id']);
        $this->db->set($data)->insert('cakes');
    }

    public function doUpload($id)
    {
        $config['upload_path']   = 'assets/uploads/cakes/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['remove_spaces'] = true;
        $config['max_size']      = 7000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('image_name')) {

            $upload_data = $this->upload->data();
            $image = $upload_data['full_path'];

            $config['source_image']   = $image;
            $config['maintain_ratio'] = false;
            $config['width']          = 350;
            $config['height']         = 200;

            $this->image_lib->resize();
            $this->fileDelete($id);

        } else {

            $this->session->set_flashdata('warning_msg', $this->upload->display_errors());
        }

        $file_name = $upload_data['file_name'];
        $filePath  = "assets/uploads/cakes/" . $file_name;

        $this->db->where(array('cake_id' => $id))->set(array('image' => $filePath))->update('cakes');
    }

    public function fileDelete($id)
    {
        $row = $this->getCakes($id);

        if (file_exists($row[0]->image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $row[0]->image);
        }
    }

    public function getCakes($cake_id)
    {
        return $this->db->select('*')->where(array('cake_id' => $cake_id))->get('cakes')->result();
    }

    public function save($data, $id)
    {
        $this->update($data, $id);

        if (!empty($_FILES["image_name"]["name"])) {
            $this->doUpload($id);
        }
    }

    private function update($data, $id)
    {
        $this->db->set(array('title' => $data['title'], 'description' => $data['description'], 'start_price' => $data['start_price'], 'end_price' => $data['end_price'], 'category_id' => $data['category_id'], 'flavour_id' => $data['flavour_id'], 'shape_id' => serialize($data['shape_id']), 'meta_tag' => $data['meta_tag'], 'status' => $data['status']))->where(array('cake_id' => $id))->update('cakes');
    }

    public function delete($id)
    {
        if (!$this->deleteDataExisting($id) > 0) {
            $this->remove($id);
            $this->session->set_flashdata('delete_msg', $this->lang->line('delete_msg'));
        } else {
            $this->session->set_flashdata('warning_msg', $this->lang->line('existing_data_msg'));
        }
    }

    public function deleteDataExisting($data = 0)
    {
        $sql = "SELECT COUNT(cake_id) AS countValue
                FROM cakes
                WHERE (cake_id = '{$data}')";

        $query = $this->db->query($sql);
        $count = $query->result()->countValue;

        return $count;
    }

    public function getListing($start)
    {
        $per_page = 10;
        $num_link = 3;
        $page     = intval($start);

        if ($page <= 0) {
            $page = 1;
        }

        $limit      = ($page - 1) * $per_page;
        $base_url   = site_url('admin/cakes/listing');
        $total_rows = $this->db->count_all_results('cakes');
        $paging     = paginate($base_url, $total_rows, $start, $per_page);

        $this->db->select('cakes.* , categories.title AS categories_name , flavours.title AS flavours_name');
        $this->db->from('cakes');
        $this->db->join('categories', 'categories.category_id = cakes.category_id', 'left');
        $this->db->join('flavours', 'flavours.flavour_id = cakes.flavour_id', 'left');
        $this->db->limit($per_page, $limit);
        $this->db->order_by("cakes.ordering", "asc");

        $query = $this->db->get();

        return array($query, $paging, $total_rows, $limit);
    }

    public function getCategories()
    {
        return $this->db->select('*')->where('status', 1)->order_by('ordering','asc')->get('categories')->result();
    }

    public function getFlavours()
    {
        return $this->db->select('*')->where('status', 1)->order_by('ordering','asc')->get('flavours')->result();
    }

    public function getShapes()
    {
        return $this->db->select('*')->where('status', 1)->order_by('ordering','asc')->get('shapes')->result();
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

            $sql   = sprintf("SELECT COUNT(cake_id) AS countValue FROM cakes WHERE (LOWER(title) = LOWER('{$title}'))");
            $count = $this->db->query($sql)->result();

            if ($count[0]->countValue > 0) {
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
            $dbcatid = $this->db->select('title')->where('cake_id', $id)->get('cakes')->result();
            return $dbcatid[0]->title;
        }
    }

    public function getAll()
    {
        return $this->db->select('*')->where('status', 1)->get('cakes')->result_array();
    }

    public function getAll_(){
      $imageurlprefix = base_url().'assets';
      $sql = "SELECT
                C.cake_id,C.category_id,C.flavour_id,C.title,C.description,C.shape_id As shapes ,C.meta_tag,C.image,C.start_price,C.end_price,
              GROUP_CONCAT(G.image ORDER BY G.gallery_id ASC SEPARATOR ',') as gallery_images
              FROM cakes As C
              LEFT JOIN cake_gallery AS G
                ON ( C.cake_id = G.cake_id )
              GROUP BY C.cake_id";

      $data = $this->db->query($sql)->result_array();

      foreach($data as $key=>$row){
          $data[$key]['cake_id'] = (int) $data[$key]['cake_id'];
          $data[$key]['category_id'] = (int) $data[$key]['category_id'];
          $data[$key]['flavour_id'] = (int) $data[$key]['flavour_id'];
          $data[$key]['image'] = !empty($data[$key]['image']) ? base_url().$data[$key]['image'] : "";
          $data[$key]['start_price'] = (float) $data[$key]['start_price'];
          $data[$key]['end_price'] = (float) $data[$key]['end_price'];
          $data[$key]['gallery_images'] = explode(',', $row['gallery_images']);
          $data[$key]['gallery_images'] = str_replace('assets',$imageurlprefix,$data[$key]['gallery_images']);
          $data[$key]['shapes'] =  !empty($row['shapes']) ? unserialize($row['shapes']): "";
      }

       return $data;

    }
}