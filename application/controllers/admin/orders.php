<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));

class Orders extends Crud_Controller
{

    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';
        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();
        $this->layout->setLayout('layout_admin');
        $this->load->library('email');
        $this->load->helper(array('uploader','idgenerator','util'));
        $this->load->model(array('orders_model','productions_model','gallery_model','locations_model','flavours_model','cakes_model','revel_order'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    function index(){

        $this->data['active']=$this->uri->segment(2,0);
        $this->data['catresult'] = $this->orders_model->getCategories();
        $this->data['cakeresult'] = $this->orders_model->getCakes($category=0);
        $this->data['flvresult'] = $this->orders_model->getFlavours($location_id=0);
        $this->data['servresult'] = $this->orders_model->getServings();
        $this->data['zoneresult'] = $this->orders_model->getZones();
        $this->data['shaperesult'] = $this->orders_model->getShapes();
        $this->data['locationresult'] = $this->orders_model->getlocations();
        $this->data['customerresult'] = $this->orders_model->getCustomers();
        $this->data['employeeresult'] = $this->orders_model->getEmployees($group_id=0);
        $this->data['managerresult'] = $this->orders_model->getEmployees($group_id=3);



        $this->layout->view('admin/orders/order_view', $this->data);

    }

    function getCheckBlackout(){

        $delivery_date = $this->input->post('delivery_date');
        $location_id = $this->input->post('location_id');
        $flavour_id = $this->input->post('flavour_id');
        $location_name = $this->productions_model->getLocations($location_id);
        $flavourfield['flavour_id']=$flavour_id;
        $flavour_name = $this->orders_model->getGlobalName('flavours',$flavourfield);
        $blackout=$this->orders_model->checkBlackOut($location_id,$delivery_date);

        if(!empty($blackout)){

            if (in_array($flavour_id, $blackout)) {
                $locationid = $this->orders_model->getVaughanLocation();
                if($location_id == 0){

                    $location_name = "Cake made in Vaughan".$this->productions_model->getLocations($locationid);
                }
                if($delivery_date){
                    $blackout_date = dateFormat($delivery_date);
                }else{
                    $blackout_date = date('d/m/Y');
                }
                echo $flavour_name." is blackout out on ".$blackout_date;
            }else{
              echo "success";
            }
        }else{
            echo "success";
        }

    }

    function getFlavour(){

        $cake_id = $this->input->post('cake_id');
        $location_id = $this->input->post('location_id');
        $kitchen_location_id = $this->input->post('kitchen_location_id');
        $blackout=$this->orders_model->checkBlackOut($kitchen_location_id);

        $row = $this->db->select('flavour_id,shape_id,fondant')->where(array('cake_id' => $cake_id))->get('cakes')->row();
        $flavour_id = unserialize($row->flavour_id);

        if(empty($blackout)){
            $flavours = unserialize($row->flavour_id);
        }else{
            $flavours = array_diff($flavour_id , $blackout);
        }

        $flavour ="";
        $flavour .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($flavours as $flavourid):
            $res = $this->cakes_model->getFlavourName($flavourid);
            $flavour .= "<option value='".$res->flavour_id."'>".$res->title."</option>";
        endforeach;

        $query="SELECT price_matrix.price,price_matrix.serving_id, servings.title AS servings_title , servings.size
                FROM price_matrix
                LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
                WHERE price_matrix.cake_id = $cake_id && price > 0 && location_id= $location_id";
                $matrix = $this->db->query($query)->result();

        $servings ="";
        $servings .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($matrix as $priceserv):

            $servings .= "<option value='".$priceserv->serving_id."'>".$priceserv->servings_title."</option>";

        endforeach;

        $fondant= $row->fondant;
        $fond="";
        if($fondant == 1){
            $fond .= "<input name='fondant' type='hidden' value=1>  Yes";
        }else{
            $fond .= "No";
        }


        $shapes = unserialize($row->shape_id);
        $size ="";
        if(!empty($shapes)){
            $size ="";
            $size .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
            foreach($shapes as $shapeid):
                $shape = $this->orders_model->getShapeName($shapeid);
                $size .= "<option value='".$shape->shape_id."'>".$shape->title."</option>";

            endforeach;
        }else{
            $size .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        }

        echo $flavour."@a&".$servings."@a&".$size."@a&".$fond;
    }

    function getServings(){

        $flavour_id = $this->input->post('flavour_id');
        $cake_id = $this->input->post('cake_id');
        $row = $this->db->select('fondant')->where(array('cake_id' => $cake_id,'fondant'=>1))->get('cakes');

        $query="SELECT fondant FROM flavours WHERE flavour_id = $flavour_id ";
        $fondants = $this->db->query($query)->row();
        $fondant= $fondants->fondant;

        $fond = "";

        if($row->num_rows()== 0 ){

            if($fondant == 1){
                $fond .= "<input name='fondant' id='fondant_id' type='radio' value='1' checked='checked'> Yes";
                $fond .= "<input name='fondant' type='radio' value='0'> No";

            }else{
                $fond .= "No";
            }

        }

        $delivery_date = $this->input->post('delivery_date');
        $location_id = $this->input->post('location_id');
        $flavour_id = $this->input->post('flavour_id');

        $flavourfield['flavour_id']=$flavour_id;
        $flavour_name = $this->orders_model->getGlobalName('flavours',$flavourfield);
        $blackout=$this->orders_model->checkBlackOut($location_id,$delivery_date);

        if(!empty($blackout)){

            if (in_array($flavour_id, $blackout)) {
                if($delivery_date){
                    $blackout_date = dateFormat($delivery_date);
                }else{
                    $blackout_date = date('d/m/Y');
                }
                $blackoutmsg = $flavour_name." is blackout out on ".$blackout_date;
            }else{
                $blackoutmsg = "success";
            }
        }else{
            $blackoutmsg =  "success";
        }

        if($blackoutmsg == 'success'){
            echo $fond;
        }else{
            echo 'error'."@a&".$blackoutmsg;
        }

    }


    public function checkFlavourBlackOut(){

        $delivery_date = $this->input->post('delivery_date');
        $location_id = $this->input->post('location_id');
        $flavour_id = $this->input->post('flavour_id');
        $flavourfield['flavour_id']=$flavour_id;
            $flavour_name = $this->orders_model->getGlobalName('flavours',$flavourfield);
            $blackout=$this->orders_model->checkBlackOut($location_id,$delivery_date);

            if(!empty($blackout)){

            if (in_array($flavour_id, $blackout)) {
            if($delivery_date){
            $blackout_date = dateFormat($delivery_date);
            }else{
                $blackout_date = date('d/m/Y');
            }
            $blackoutmsg = $flavour_name." is blackout out on ".$blackout_date;
            }else{
                $blackoutmsg = "success";
            }
            }else{
                $blackoutmsg =  "success";
            }
            echo 'error'."@a&".$blackoutmsg;

}


    public function getPrice(){

        $serving_id = $this->input->post('serving_id');
        $cake_id = $this->input->post('cake_id');
        $location_id = $this->input->post('location_id');
        if($location_id > 0){
            $locationid = $location_id;
        }else{
            $locationid = $this->orders_model->getVaughanLocation();
        }


        $query="SELECT price_matrix.price,price_matrix.serving_id, servings.title AS servings_title , servings.size,price_matrix.location_id,price_matrix.cake_id
                FROM price_matrix
                LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
                WHERE price_matrix.cake_id = $cake_id && price > 0 && location_id=$locationid";
        $matrix = $this->db->query($query)->result();

        $servings ="";
        foreach($matrix as $priceserv):
            echo $serving_id;
            $selected = ($serving_id == $priceserv->serving_id && $cake_id == $priceserv->cake_id && $locationid == $priceserv->location_id  ) ? "selected='selected'" : "";
            $servings .= "<option ".$selected." value='".$priceserv->serving_id."'>".$priceserv->servings_title."</option>";

        endforeach;

        $s2id_servings="";
        foreach($matrix as $priceserv):

            if($serving_id == $priceserv->serving_id && $cake_id == $priceserv->cake_id && $locationid == $priceserv->location_id ){
                $s2id_servings =$priceserv->servings_title;
            }

        endforeach;

        $size ="";
        foreach($matrix as $pricesize):

            $selected = ($serving_id == $pricesize->serving_id && $cake_id == $pricesize->cake_id && $locationid == $pricesize->location_id) ? "selected='selected'" : "";
            $size .= "<option ".$selected." value='".$pricesize->serving_id."'>".$pricesize->size."</option>";

        endforeach;

        $s2id_size="";
        foreach($matrix as $pricesize):

            if($serving_id == $pricesize->serving_id && $cake_id == $pricesize->cake_id && $locationid == $pricesize->location_id ){
                $s2id_size =$pricesize->size;
            }

        endforeach;

        $matrix_price=0;
        foreach($matrix as $price):

            if ($serving_id == $price->serving_id && $cake_id == $price->cake_id && $locationid == $price->location_id ){

                $matrix_price = $price->price;
            }

        endforeach;

        echo $servings."@a&".$size."@a&".$matrix_price."@a&".$s2id_servings."@a&".$s2id_size;

    }

    function getPrintedImageSurcharge(){

        $price_matrix_id = $this->input->post('price_matrix_id');
        $query="SELECT servings.printing_surcharge FROM price_matrix
        LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
        WHERE price_matrix.price_matrix_id = $price_matrix_id";
        if($this->db->query($query)->num_rows() > 0){

            $matrix = $this->db->query($query)->row();
            echo $matrix->printing_surcharge;
        }


    }

    function getZoneSurcharge(){

        $zone_id = $this->input->post('zone_id');
        $query="SELECT surcharge FROM zones
          WHERE zones.zone_id = $zone_id";
        $zone = $this->db->query($query)->row();

        echo $zone->surcharge;

    }

    public function getTotalPrice(){

        $matrix_price = $this->input->post('matrix_price');
        $printed_image_surcharge = $this->input->post('printed_image_surcharge');
        $magic_surcharge = $this->input->post('magic_surcharge');
        $delivery_zone_surcharge = $this->input->post('delivery_zone_surcharge');
        $discount_price = $this->input->post('discount_price');
        echo $total=((floatval($matrix_price)+floatval($printed_image_surcharge)+floatval($magic_surcharge)+floatval($delivery_zone_surcharge))-floatval($discount_price));


    }



    public function listing($starts=0)
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->orders_model->getListing($starts);
        $this->layout->view('admin/orders/listing_view', $this->data);


    }

    public function edit($order_id){

        $this->data['queryup'] = $this->orders_model->orderEdit($order_id);

        $cake_id =  $this->data['queryup']->cake_id;
        $location_id =  $this->data['queryup']->location_id;


        $query="SELECT price_matrix.serving_id, servings.title AS servings_title
                FROM price_matrix
                LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
                WHERE price_matrix.cake_id = $cake_id && price > 0 && location_id = $location_id";
        $matrix = $this->db->query($query)->result();

        $servings ="";
        foreach($matrix as $priceserv):

            $selected = ($this->data['queryup']->serving_id == $priceserv->serving_id ) ? "selected='selected'" : "";
            $servings .= "<option ". $selected ." value='". $priceserv->serving_id ."'>".$priceserv->servings_title."</option>";

        endforeach;

        $order_fondant=$this->data['queryup']->fondant;

        $fond="";
        if($order_fondant == 1){
            //$selected1 = ($order_fondant == 1 ) ? "checked='checked'" : "";
            //$selected0  = ($order_fondant == 0) ? "checked='checked'" : "";
           // $fond .= "<input name='fondant' ".$selected1." class='radio' type='radio' value='1'>Yes</option>";
           // $fond .= "<input name='fondant' ".$selected0." class='radio' type='radio' value='0'>No</option>";
            $fond .= "Yes";
        }else{
            $fond .= "No";
        }


        /*$size ="";
        foreach($matrix as $pricesize):

            $selected = ($price_matrix_id == $pricesize->price_matrix_id ) ? "selected='selected'" : "";
            $size .= "<option ".$selected." value='".$pricesize->price_matrix_id."'>".$pricesize->size."</option>";

        endforeach;*/

        $shapes = unserialize($this->data['queryup']->cake_shape);
        $size ="";
        if(!empty($shapes)){
            $size ="";
            $size .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
            foreach($shapes as $shapeid):
                $shape = $this->orders_model->getShapeName($shapeid);
                $selected = ($shapeid == $this->data['queryup']->shape_id ) ? "selected='selected'" : "";
                $size .= "<option ". $selected ." value='".$shape->shape_id."'>".$shape->title."</option>";

            endforeach;
        }else{
            $size .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        }




        $this->data['servings']=$servings;
        $this->data['fond']=$fond;
        $this->data['size']=$size;


        $this->data['active']=$this->uri->segment(2,0);
        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['cakeresult'] = $this->orders_model->getCakes($category=0);
        $this->data['flvresult'] = $this->cakes_model->getFlavours();
        $this->data['sapresult'] = $this->cakes_model->getShapes();
        $this->data['zoneresult'] = $this->cakes_model->getZones();
        $this->data['locationresult'] = $this->cakes_model->getlocations();
        $this->data['customerresult'] = $this->cakes_model->getCustomers();
        $this->data['employeeresult'] = $this->cakes_model->getEmployees($group_id=0);
        $this->data['managerresult'] = $this->cakes_model->getEmployees($group_id=3);

        $this->layout->view('admin/orders/edit_view', $this->data);

    }
    public function edit1($order_id){

        $this->data['active']=$this->uri->segment(2,0);
        $this->data['employeeresult'] = $this->cakes_model->getEmployees($group_id=0);
        $result = $this->productions_model->orderPrint($order_id);
        $this->data['queryup']=$result->row();
        $this->layout->view('admin/orders/order_edit_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            if($this->input->post('order_id') > 0){
                $this->saveData();
            }else{
                $this->addValidation();
                if ($this->form_validation->run()) {
                    $this->saveData();
                }
            }

        }
        $this->index();

    }
    private function addValidation()
    {
        $this->form_validation->set_rules('location_id', 'Location name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('flavour_id', 'Flavour name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('serving_id', 'Servings name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('customer_id', 'Customer name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('employee_id', 'Employee name', 'required|trim|xss_clean');
        $this->form_validation->set_rules('delivery_date', 'Delivery date', 'required|trim|xss_clean');
        $this->form_validation->set_rules('delivery_time', 'Delivery time', 'required|trim|xss_clean');
    }


    public function saveData(){


        $data =$this->input->post();
        $orderID = $this->input->post('order_id');
        $data['cake_id']=isset($_REQUEST['cake_id'])? $_REQUEST['cake_id']:'';
        $data['customer_id']=isset($_REQUEST['customer_id'])? $_REQUEST['customer_id']:'';
        $data['employee_id']=isset($_REQUEST['employee_id'])? $_REQUEST['employee_id']:'';
        $data['manager_id']=isset($_REQUEST['manager_id'])? $_REQUEST['manager_id']:'';
        $data['location_id']=isset($_REQUEST['location_id'])? $_REQUEST['location_id']:'';
        $data['order_date']=isset($_REQUEST['order_date'])? $_REQUEST['order_date']:'';
        $data['delivery_type']=isset($_REQUEST['delivery_type'])? $_REQUEST['delivery_type']:'';
        $data['pickup_location_id']=isset($_REQUEST['pickup_location_id'])? $_REQUEST['pickup_location_id']:'';
        $data['delivery_zone_id']=isset($_REQUEST['delivery_zone_id'])? $_REQUEST['delivery_zone_id']:'';
        $data['delivery_zone_surcharge']=isset($_REQUEST['delivery_zone_surcharge'])? $_REQUEST['delivery_zone_surcharge']:'';
        $data['delivery_date']=isset($_REQUEST['delivery_date'])? $_REQUEST['delivery_date']:'';
        $deliverytime=isset($_REQUEST['delivery_time'])? $_REQUEST['delivery_time']:'';
        $data['delivery_time']=($deliverytime !="") ? timeFormatAmPm($deliverytime):'';

        $data['flavour_id']=isset($_REQUEST['flavour_id'])? $_REQUEST['flavour_id']:'';
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:0;
        $data['serving_id']=isset($_REQUEST['serving_id'])? $_REQUEST['serving_id']:'';
        $data['shape_id']=isset($_REQUEST['shape_id'])? $_REQUEST['shape_id']:'';
        $data['tiers']=isset($_REQUEST['tiers'])? $_REQUEST['tiers']:'';
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
        $data['on_cake_image_needed']=isset($_REQUEST['on_cake_image_needed'])? $_REQUEST['on_cake_image_needed']:'';
        $data['cake_email_photo']=isset($_REQUEST['cake_email_photo'])? $_REQUEST['cake_email_photo']:'';
        $data['magic_cake_id']=isset($_REQUEST['magic_cake_id'])? $_REQUEST['magic_cake_id']:'';
        $data['magic_surcharge']=isset($_REQUEST['magic_surcharge'])? $_REQUEST['magic_surcharge']:'';
        $data['inscription']=isset($_REQUEST['inscription'])?$_REQUEST['inscription']:'';
        $data['special_instruction']=isset($_REQUEST['special_instruction'])? $_REQUEST['special_instruction']:'';
        $data['instructional_email_photo']=isset($_REQUEST['instructional_email_photo'])? $_REQUEST['instructional_email_photo']:'';
        $data['vaughan_location']=isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
        $data['printed_image_surcharge']=isset($_REQUEST['printed_image_surcharge'])? $_REQUEST['printed_image_surcharge']:'';
        $data['discount_price']=isset($_REQUEST['discount_price'])? $_REQUEST['discount_price']:'';
        $data['total_price']=isset($_REQUEST['total_price'])? $_REQUEST['total_price']:'';
        $data['override_price']=isset($_REQUEST['override_price'])? $_REQUEST['override_price']:'';
        $pluploadUploader_count=isset($_REQUEST['pluploadUploader_count'])? $_REQUEST['pluploadUploader_count']:'';
        $data['order_status'] = isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'300';
        $data['order_date']=time();



        $vaughan_location = isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';

        if($vaughan_location == 1 ){
            $vaughan_location = $this->orders_model->getVaughanLocation();
            $data['kitchen_location_id'] = $vaughan_location;

        }else{

            $data['kitchen_location_id'] = isset($_REQUEST['location_id'])? $_REQUEST['location_id']:'';
        }

        if($orderID > 0 ){

            $array_orders_key =  array(
                'order_id',
                'cake_id',
                'customer_id',
                'employee_id',
                'manager_id',
                'location_id',
                'order_date',
                'delivery_type',
                'pickup_location_id',
                'delivery_zone_id',
                'delivery_zone_surcharge',
                'delivery_date',
                'delivery_time',
                'flavour_id',
                'fondant',
                'serving_id',
                'shape_id',
                'tiers',
                'matrix_price',
                'on_cake_image_needed',
                'cake_email_photo',
                'magic_cake_id',
                'magic_surcharge',
                'inscription',
                'special_instruction',
                'instructional_email_photo',
                'vaughan_location',
                'order_status',
                'printed_image_surcharge',
                'discount_price',
                'total_price',
                'override_price',
                'order_status',
                'order_date'
            );

            foreach($_REQUEST as $key => $val ){

                if(in_array($key,$array_orders_key)){
                    $order_data[$key] = $val;
                }
            }


            $orders=$this->orders_model->order_update($order_data,$orderID);
            $this->session->set_flashdata('success_msg','Order has been updated successfully');

        }else{

            $orders=$this->orders_model->order_insert($data);
            $this->session->set_flashdata('success_msg','New order has been added successfully');
        }

        $revel_order_id = $this->revel_order->getRevelID('orders', $orders['order_id']);


        if(empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] == '303' ){



            if($orders['pickup_location_id'] > 0 && $orders['delivery_type']=='pickup'){

                $revel_location_id = $this->revel_order->getRevelID('locations',$orders['pickup_location_id']);

                $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['pickup_location_id']);

                $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

            }else{

                $revel_location_id = $this->revel_order->getRevelID('locations',$orders['location_id']);

                $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['location_id']);

                $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

            }
            $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);
            $revel_create_location_id = $this->revel_order->getRevelID('locations',$orders['location_id']);
            $revel_user = $this->revel_order->getRevelID('meta',$orders['employee_id']);

            $RevelOrderData = array(

                'order_code' => $orders['order_code'],
                'employee_id' => $orders['employee_id'],
                'revel_customer_id' => $revel_customer,
                'revel_location_id' => $revel_location_id,
                'revel_location_create_id' => $revel_create_location_id,
                'revel_establishment_id' => $revel_establishment_id,
                'revel_product_id' => $revel_product_id,
                'revel_user_id' => $revel_user,
                'discount'=> $orders['discount_price'],
                'subtotal'=> $orders['total_price']
            );


            try{

                $custom =( $orders['cake_id'] > 0 ) ? $orders['cake_id'] :'';

                $revel_order_id =  $this->revel_order->create($RevelOrderData,$custom);

            }catch (\Exception $e){

                $orders['revel_order_id']  = null;
            }

            if($revel_order_id > 0){

                $revel['revel_order_id']  = $revel_order_id;
                $orders=$this->orders_model->order_update($revel, $orders['order_id']);

            }


        }

        if(!empty($revel_order_id)){

                if($orders['pickup_location_id'] > 0 && $orders['delivery_type']=='pickup'){
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['pickup_location_id']);
                }else{
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['location_id']);
                }
                $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);
                $revel_user = $this->revel_order->getRevelID('meta',$orders['employee_id']);


                $RevelOrderData = array(
                    'revel_order_id' => $revel_order_id,
                    'employee_id' => $orders['employee_id'],
                    'order_code' => $orders['order_code'],
                    'revel_customer_id' => $revel_customer,
                    'revel_location_id' => $revel_location_id,
                    'revel_user_id' => $revel_user,
                    'discount'=> $orders['discount_price'],
                    'subtotal'=> $orders['total_price'],
                );

                $this->revel_order->update($RevelOrderData);
                try{
                    $this->revel_order->update($RevelOrderData);
                } catch (\Exception $e){
                    echo $e->getMessage();

                    die;
                }
        }

        if(!empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] == '305' ){

            $this->revel_order->delete($revel_order_id);
        }

        $order_delivery['name']=isset($_REQUEST['name']) ? $_REQUEST['name']:'';
        $order_delivery['phone']=isset($_REQUEST['phone']) ? $_REQUEST['phone']:'';
        $order_delivery['address_1']=isset($_REQUEST['address_1'])? $_REQUEST['address_1']:'';
        $order_delivery['address_2']=isset($_REQUEST['address_2'])? $_REQUEST['address_2']:'';
        $order_delivery['postal']=isset($_REQUEST['postal'])? $_REQUEST['postal']:'';
        $order_delivery['city']=isset($_REQUEST['city'])? $_REQUEST['city']:'';
        $order_delivery['province']=isset($_REQUEST['province'])? $_REQUEST['province']:'';
        $order_delivery['delivery_instruction']=isset($_REQUEST['delivery_instruction'])? $_REQUEST['delivery_instruction']:'';


        if(strtolower($data['delivery_type']) == 'delivery') {

            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }
        if($_FILES['onCakeImage']['name'] !=""){
            $this->orders_model->doUpload($orders['order_id']);
        }

        if($pluploadUploader_count > 0){

            $this->orders_model->galleryUpload($data,$orders['order_id']);

        }

        if($orders['order_status'] != 300 &&  $data['on_cake_image_needed'] == 1 ){

            $cake_email_photo = isset($_REQUEST['cake_email_photo']) ? $_REQUEST['cake_email_photo']:'';
            if($cake_email_photo == 1 ){

               $this->mailgunSendMessage($orders,$this->lang->line('mailgun_cakeonimage_email'),$this->lang->line('mailgun_cakeonimage_name'),$this->lang->line('mailgun_cakeonimage_subject'),$this->lang->line('mailgun_cakeonimage_body'));
            }
            $instructional_email_photo = isset($_REQUEST['instructional_email_photo']) ? $_REQUEST['instructional_email_photo']:'';
            if($instructional_email_photo == 1){

               $this->mailgunSendMessage($orders,$this->lang->line('mailgun_instructional_email'),$this->lang->line('mailgun_instructional_name'),$this->lang->line('mailgun_instructional_subject'),$this->lang->line('mailgun_instructional_body'));
            }
        }

       // $this->saveBarcodeImage($orders['order_code']);
       // $this->createPDF($orders['order_code']);

        $mailtouser = isset($_REQUEST['mailtouser']) ? $_REQUEST['mailtouser']:'';
        if($mailtouser == 1){

            $this->sendEmail($orders['order_code']);
        }

        $notes = isset($_REQUEST['notes']) ? $_REQUEST['notes']:'';

        if(!empty($notes)){

            $notes_data['notes']=isset($_REQUEST['notes']) ? $_REQUEST['notes']:'';
            $notes_data['employee_id']=isset($_REQUEST['notes_employee_id']) ? $_REQUEST['notes_employee_id']:'';
            $notes_data['create_date']=time();
            $notes_data['order_id']=$orders['order_id'];
            $this->orders_model->SaveNotes($notes_data);
        }

        if($orderID > 0 ){

            if(isset($orders['employee_id'])){

                    $empolyee_code = $this->logs_model->getEmployeeCode($orders['employee_id']);
                    $log = array(
                        'employee_id' => $empolyee_code,
                        'audit_name' => 'order updated',
                        'description' => 'order_id = '.$orders['order_id'].', order_code='. $orders['order_code'].', customer_id='. $data['customer_id'].',totalprice ='.$data['total_price'].',overrideprice='.$data['override_price'],
                    );
                    $this->logs_model->insertAuditLog($log);
            }
            $this->session->set_flashdata('success_msg','New order has been updated successfully');

        }else{

            if(isset($orders['employee_id'])){
                $empolyee_code = $this->logs_model->getEmployeeCode($orders['employee_id']);
                $log = array(
                    'employee_id' => $empolyee_code,
                    'audit_name' => 'order created',
                    'description' => 'order_id = '.$orders['order_id'].', customer_id='. $data['customer_id'].',totalprice ='.$data['total_price'].',overrideprice='.$data['override_price'],
                );
                $this->logs_model->insertAuditLog($log);
            }

        }

        redirect('admin/orders/edit/'.$orders['order_id']);


    }

    public function sendEmail($order_code)
    {


        $result= $this->productions_model->orderDetails($order_code);
        $this->data['queryup']=$result->row();
        $customer_email=$this->data['queryup']->email;
        $pdfname ='stpb-'.$this->data['queryup']->order_code;
        $order_status=$this->data['queryup']->order_status;
        if($order_status == 301){
            $orderstatus="Order";
        }else{
            $orderstatus = $this->data['queryup']->orderstatus;
        }
        if(!empty($customer_email)){

            $body = $this->load->view('email/invoice_body', $this->data,true);
            $this->email->set_newline("\r\n");
            $this->email->from($this->lang->line('global_email'), $this->lang->line('global_email_subject'));
            $this->email->to($customer_email);
            $this->email->subject($this->lang->line('global_email_subject').' - Cake '.$orderstatus);
            $this->email->message(nl2br($body));
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/assets/uploads/orders/pdf/'.$pdfname.'.pdf')) {
                $this->email->attach($_SERVER['DOCUMENT_ROOT'].'/assets/uploads/orders/pdf/'.$pdfname.'.pdf');
            }
            $this->email->send();

        }


    }

    public function sendCustomerEmail($order_code)
    {


        $result= $this->productions_model->orderDetails($order_code);
        $this->data['queryup']=$result->row();
        $customer_email=$this->data['queryup']->email;
        $pdfname ='stpb-'.$this->data['queryup']->order_code;
        $order_status=$this->data['queryup']->order_status;
        if($order_status == 301){
            $orderstatus="Order";
        }else{
            $orderstatus = $this->data['queryup']->orderstatus;
        }
        if(!empty($customer_email)){

            $body = $this->load->view('email/invoice_body', $this->data,true);
            $this->email->set_newline("\r\n");
            $this->email->from($this->lang->line('global_email'), $this->lang->line('global_email_subject'));
            $this->email->to($customer_email);
            $this->email->subject($this->lang->line('global_email_subject').' - Cake '.$orderstatus);
            $this->email->message(nl2br($body));
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/assets/uploads/orders/pdf/'.$pdfname.'.pdf')) {
                $this->email->attach($_SERVER['DOCUMENT_ROOT'].'/assets/uploads/orders/pdf/'.$pdfname.'.pdf');
            }
            $this->email->send();

        }
        $this->session->set_flashdata('success_msg','Email has been added successfully');
        redirect('admin/orders/edit/'.$this->data['queryup']->order_id);



    }



    private function mailgunSendMessage($orders, $replyTo,$name,$subject=NULL,$body=NULL)
    {

        $order_id = $orders['order_id'];
        $result= $this->productions_model->orderPrint($order_id);
        $data['rows']=$result->row();
        if(!empty($data ['rows']->email)){
            $data['email_subject']=$subject;
            $data['body']=$body;
            $body = $this->load->view('email/instructional_photo_view', $data,true);
            $this->email->set_newline("\r\n");
            $this->email->from($this->lang->line('global_email'), $this->lang->line('global_email_subject'));
            $this->email->reply_to($replyTo, $name);
            $this->email->to($data ['rows']->email);
            $this->email->subject($subject.'|'. $data['rows']->order_code);
            $this->email->message(nl2br($body));
            $this->email->send();
        }

    }

    public function barcode_gen($order_code)
    {

        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode/Barcode');
        $barcodeOptions = array('text' => "$order_code",'drawText'=>false);
        $rendererOptions = array();
        Zend\Barcode\Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();

    }

    public function saveBarcodeImage($order_code)
    {

        define('YOUR_DIRECTORY',realpath(APPPATH . "../web/assets/uploads/orders/barcode/"));
        $content = file_get_contents(site_url()."/api/orders/barcode_gen/".$order_code);
        file_put_contents(YOUR_DIRECTORY.$order_code.".png",$content);
    }

    public function createPDF($order_code)
    {

        $this->load->helper(array('dompdf', 'file'));
        $result= $this->productions_model->orderDetails($order_code);
        if($result ->num_rows() > 0 ){
            $this->data['queryup']=$result->row();
            $pdfname =$this->data['queryup']->order_code;

            $html          =$this->load->view('email/invoice_view', $this->data,true);
            //$invoiceNumber = str_pad($pdfname,8,0,STR_PAD_LEFT);
            $invoiceNumber = ('stpb-'.$pdfname);
            $pdf           = pdf_create($html, $invoiceNumber, false);
            $filePath      = realpath(APPPATH . "../web/assets/uploads/orders/pdf/"). DIRECTORY_SEPARATOR . $invoiceNumber.".pdf";
            file_put_contents($filePath,$pdf);
            //echo $pdffile_path = $filePath;
        }
    }



    function search($urlsearch=NULL,$start=0)
    {


        $getsearch = $this->input->get('search');

        if($getsearch){
            $search = $getsearch;
        }else{
            $search = $urlsearch;
        }

        if(!empty($search)){

            $this->data['paging'] = $this->orders_model->searching($search,$start);
            $this->data['active']=$this->uri->segment(2,0);
            $this->layout->view('admin/orders/listing_view', $this->data);

        }else{

            $this->session->set_flashdata('warnings_msg',$this->lang->line('update_msg'));
            $this->redirectToHome("listing");
        }


    }

    public function sorting($order_id=0)
    {


        $this->orders_model->sortingList($order_id);
        echo $this->lang->line('update_msg');

    }

    public function instructional_gallery_delete($order_id)
    {

        $path = $this->input->post('path');
        $this->orders_model->instructionalGalleryDelete($order_id,$path);
        echo "success";
    }

    public function remove($id)
    {
        $this->orders_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function notes_remove()
    {

        $order_notes_id = $this->input->post('order_notes_id');
        if($order_notes_id > 0)
        {
            $this->orders_model->orderNotesRemove($order_notes_id);
            echo 'success';
        }

    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/orders/'.$redirect);
    }

    public function revel()
    {
        $data = $this->revel_order->getAll();
        var_dump($data);
    }

}