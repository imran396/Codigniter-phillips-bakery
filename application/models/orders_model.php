<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Orders_model extends Crud_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('image_lib');
        $this->loadTable('orders','order_id');

    }


    public function order_insert($data){

        $data['order_status']="Pending";
        $order_id = $this->insert($data);
        $order_code=(100000+$order_id);

        $this->db->set(array('order_code'=>$order_code))->where('order_id',$order_id)->update('orders');

        $order['order_id']= $order_id;
        $order['order_code']= $order_code;

        return $order;
    }

    public function order_update($data,$order_id){

        $data['order_status']="Pending";
        $order_id = $this->update($data,$order_id);

        $dbdata =$this->getOrder($order_id);
        $order_id = $dbdata->order_id;
        $order_code = $dbdata->order_code;
        $order['order_id']= $order_id;
        $order['order_code']= $order_code;

        return $order;
    }


    public function doUpload($id)
    {
        $config['upload_path']   = 'assets/uploads/cakes/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['remove_spaces'] = true;
        $config['max_size']      = 7000;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload('onCakeImage')) {

            $upload_data = $this->upload->data();
            $image = $upload_data['full_path'];

            $config['source_image']   = $image;
            $config['maintain_ratio'] = false;
            $config['width']          = 200;
            $config['height']         = 125;

            $this->image_lib->resize();
            $this->fileDelete($id);

        }

        $file_name = $upload_data['file_name'];
        $filePath  = "assets/uploads/cakes/" . $file_name;

        $this->db->set(array('on_cake_image' => $filePath))->where(array('order_id' => $id))->update('orders');
    }

    public function instructionalImagesUpload($order_id){

        $i=0;
        foreach($_FILES['instructionalImages']['name'] as $file_name ){

            $n = rand(10e16, 10e20);
            $rand = base_convert($n, 10, 36);
            $name = $rand.'-'.$file_name;
            $temp_name=$_FILES['instructionalImages']['tmp_name'][$i];
            $target_path = "assets/uploads/gallery/";
            $target_path = $target_path . basename($name);
            move_uploaded_file($temp_name, $target_path);
            $instructional_photo = $target_path;
            $this->db->set(array('instructional_order_id'=>$order_id,'instructional_photo' => $instructional_photo))->insert('instructional_photo');

            $i++;
        }

    }


    public function fileDelete($id)
    {
        $dbdata = $this->getOrder($id);
        if (file_exists($dbdata->on_cake_image)) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $dbdata->on_cake_image);
        }
    }

    public function delivery_order($data_delivery,$order_id){

        $data_delivery['delivery_order_id'] = $order_id;
        $dbdata =$this->getOrder($order_id);
        $delivery_order_id = $dbdata->delivery_order_id;
        if($delivery_order_id > 0){
            $this->db->set($data_delivery)->where(array('delivery_order_id'=>$delivery_order_id))->update('order_delivery');
        }else{
            $this->db->set($data_delivery)->insert('order_delivery');
        }

    }

    public function instructional_insert($order_notes,$order_id){

        $order_notes['order_id']=$order_id;
        $this->db->set($order_notes)->insert('order_notes');
    }



    public function getOrder($order_id){

        return $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->where(array('orders.order_id'=>$order_id))
            ->get()->row();
    }

    public function getAll(){

        $res = $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->join('instructional_photo','instructional_photo.instructional_order_id = orders.order_id','left')
            ->order_by('order_id','desc')
            ->get();


        if($res){
            $result =  $res->result_array();
            foreach($result  as $key => $val){

                $result[$key]['order_id'] = (int) $result[$key]['order_id'];
                $result[$key]['order_code'] = (int) $result[$key]['order_code'];
                $result[$key]['cake_id'] = (int) $result[$key]['cake_id'];
                $result[$key]['customer_id'] = (int) $result[$key]['customer_id'];
                $result[$key]['employee_id'] = (int) $result[$key]['employee_id'];
                $result[$key]['manager_id'] = (int) $result[$key]['manager_id'];
                $result[$key]['location_id'] = (int) $result[$key]['location_id'];
                $result[$key]['pickup_location_id'] = (int) $result[$key]['pickup_location_id'];
                $result[$key]['delivery_zone_id'] = (int) $result[$key]['delivery_zone_id'];
                $result[$key]['flavour_id'] = (int) $result[$key]['flavour_id'];
                $result[$key]['price_matrix_id'] = (int) $result[$key]['price_matrix_id'];
                $result[$key]['delivery_order_id'] = (int) $result[$key]['delivery_order_id'];

            }
            return $result;

        }else{

            return array();
        }

    }

    public function doSearch($data){


       /* $data = $this->getSearchField($data);
        $res = $this->db
            ->select('orders.*,order_delivery.*')
            ->from('orders')
            ->join('order_delivery','order_delivery.delivery_order_id = orders.order_id','left')
            ->join('instructional_photo','instructional_photo.instructional_order_id = orders.order_id','left')
            ->or_like($data)
            ->get();*/


        $imageurlprefix = base_url().'assets';
        $order_id = isset($data['order_id'])?$data['order_id']:'';
        $order_code = isset($data['order_code'])?$data['order_code']:'';
        $customer_id = isset($data['customer_id'])? $data['customer_id']:'';

        $where ="'order_date' != '' ";
        if(!empty($order_id)){

            $where .=" AND `order_id` = ".$order_id;
        }
        if(!empty($order_code)){

            $where .=" AND  `order_code` = ".$order_code;
        }

        if(!empty($customer_id)  ){

            $where .=" AND `customer_id` =". $customer_id;
        }

        $sql = "SELECT
              O.*,G.*,OD.*,
              GROUP_CONCAT(G.instructional_photo ORDER BY G.instructional_order_id ASC SEPARATOR ',') as gallery_images
              FROM orders As O
              LEFT JOIN instructional_photo AS G ON ( O.order_id = G.instructional_order_id)
              LEFT JOIN order_delivery AS OD ON ( O.order_id = OD.delivery_order_id )
              WHERE ($where)
              GROUP BY O.order_id";




        if($sql){
            $result = $this->db->or_like($data)->query($sql)->result_array();
            foreach($result  as $key => $val){

                $result[$key]['order_id'] = (int) $result[$key]['order_id'];
                $result[$key]['order_code'] = (int) $result[$key]['order_code'];
                $result[$key]['cake_id'] = (int) $result[$key]['cake_id'];
                $result[$key]['customer_id'] = (int) $result[$key]['customer_id'];
                $result[$key]['employee_id'] = (int) $result[$key]['employee_id'];
                $result[$key]['manager_id'] = (int) $result[$key]['manager_id'];
                $result[$key]['location_id'] = (int) $result[$key]['location_id'];
                $result[$key]['pickup_location_id'] = (int) $result[$key]['pickup_location_id'];
                $result[$key]['delivery_zone_id'] = (int) $result[$key]['delivery_zone_id'];
                $result[$key]['flavour_id'] = (int) $result[$key]['flavour_id'];
                $result[$key]['price_matrix_id'] = (int) $result[$key]['price_matrix_id'];
                $result[$key]['delivery_order_id'] = (int) $result[$key]['delivery_order_id'];
                $result[$key]['on_cake_image'] = str_replace('assets',$imageurlprefix,$result[$key]['on_cake_image']);

                $result[$key]['instructional_photo'] = str_replace('assets',$imageurlprefix,$result[$key]['gallery_images']);
                $result[$key]['instructional_photo'] = explode(',',$result[$key]['instructional_photo']);


            }
            return $result;

        }else{

            return array();
        }

    }

    private function getSearchField($data){
        foreach ($data as $key => $value) {
            if (array_search($key, $this->fields) === false) {
                unset($data[$key]);
            }
        }
        return $data;

    }

   public function getAllNotes($order_id){
       $data = $this->db->select('order_id,employee_id,create_date,notes')->where('order_id',$order_id)->order_by('order_id','asc')->get('order_notes')->result_array();
       foreach($data as $key=>$val){
           $data[$key]['order_id'] = (int) $data[$key]['order_id'];
           $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
           $data[$key]['create_date'] = (string) $data[$key]['create_date'];
           $data[$key]['notes'] =  $data[$key]['notes'];
       }

       return $data;
   }

    public function SaveNotes($data){
        $this->db->set($data)->insert('order_notes');
    }


    public function NotesSearch($data){
        $data = $this->getSearchField($data);
        $this->db->where('order_id', $data['order_id']);
        $data = $this->db->select('order_id,employee_id,create_date,notes')->order_by('order_id','asc')->get('order_notes')->result_array();

        foreach($data as $key=>$val){
            $data[$key]['order_id'] = (int) $data[$key]['order_id'];
            $data[$key]['employee_id'] = (int) $data[$key]['employee_id'];
            $data[$key]['create_date'] = (string) $data[$key]['create_date'];
            $data[$key]['notes'] =  $data[$key]['notes'];
        }

        return $data;

     }

}
