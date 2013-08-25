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
        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['cakeresult'] = $this->orders_model->getCakes($category=0);
        $this->data['flvresult'] = $this->orders_model->getFlavours($location_id=0);
        $this->data['sapresult'] = $this->cakes_model->getShapes();
        $this->data['zoneresult'] = $this->cakes_model->getZones();
        $this->data['locationresult'] = $this->cakes_model->getlocations();
        $this->data['customerresult'] = $this->cakes_model->getCustomers();
        $this->data['employeeresult'] = $this->cakes_model->getEmployees($group_id=0);
        $this->data['managerresult'] = $this->cakes_model->getEmployees($group_id=3);



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


              echo "Blacked Out ".$flavour_name." is not available for this date in this ". $location_name." location ";
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
        $blackout=$this->orders_model->checkBlackOut($location_id);

        $row = $this->db->select('flavour_id,tiers')->where(array('cake_id' => $cake_id))->get('cakes')->row();
        $flavour_id = unserialize($row->flavour_id);

        if(empty($blackout)){
            $flavour = unserialize($row->flavour_id);
        }else{
            $flavour = array_diff($flavour_id , $blackout);
        }

        $data ="";
        $data .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($flavour as $flavourid):
            $res = $this->cakes_model->getFlavourName($flavourid);
            $data .= "<option value='".$res->flavour_id."'>".$res->title."</option>";

        endforeach;

        $tiers ="";
       /* $tier = unserialize($row->tiers);
        $tiers .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($tier as $tie):
            $tiers .= "<option value='".$tie."'>".$tie."</option>";

        endforeach;*/

        echo $data."@a&".$tiers;
    }

    function getServings(){

        $flavour_id = $this->input->post('flavour_id');
        $location_id = $this->input->post('location_id');
        $query="SELECT price_matrix.price_matrix_id, price_matrix.price, servings.title AS servings_title, servings.printing_surcharge, servings.size, flavours. *
FROM price_matrix
LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id
WHERE price_matrix.flavour_id = $flavour_id && price > 0 && location_id=$location_id ";
        $matrix = $this->db->query($query)->result();

        $query="SELECT fondant FROM flavours WHERE flavour_id = $flavour_id ";
        $fondants = $this->db->query($query)->row();

        $servings ="";
        $servings .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($matrix as $priceserv):

            $servings .= "<option value='".$priceserv->price_matrix_id."'>".$priceserv->servings_title."</option>";

        endforeach;


        $size ="";
        $size .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($matrix as $pricesize):

            $size .= "<option value='".$pricesize->price_matrix_id."'>".$pricesize->size."</option>";

        endforeach;

        $fondant= $fondants->fondant;
        $fond="";
        if($fondant == 1){
            $fond .= "<option value='1' selected='selected'>Yes</option>";
            $fond .= "<option value='0'>No</option>";
        }else{
            $fond .= "<option value='0'>No</option>";
        }

        /*$cprice ="";
        foreach($matrix as $price):

            $cprice .= "<option  value='".$price->price_matrix_id."'>".$price->price."</option>";

        endforeach;*/


        echo $servings."@a&".$size."@a&".$fond;


    }


    public function getPrice(){

        $price_matrix_id = $this->input->post('price_matrix_id');
        $flavour_id = $this->input->post('flavour_id');

        $flavour_id = $this->input->post('flavour_id');
        $query="SELECT price_matrix.price_matrix_id, price_matrix.price, servings.title AS servings_title, servings.printing_surcharge, servings.size, flavours. *
FROM price_matrix
LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id
WHERE price_matrix.flavour_id = $flavour_id && price >0";
        $matrix = $this->db->query($query)->result();
        $servings ="";
        foreach($matrix as $priceserv):

            $selected = ($price_matrix_id == $priceserv->price_matrix_id ) ? "selected='selected'" : "";
            $servings .= "<option ".$selected." value='".$priceserv->price_matrix_id."'>".$priceserv->servings_title."</option>";

        endforeach;

        foreach($matrix as $priceserv):

            if($price_matrix_id == $priceserv->price_matrix_id ){
            $s2id_servings =$priceserv->servings_title;
            }

        endforeach;


        $size ="";
        foreach($matrix as $pricesize):

            $selected = ($price_matrix_id == $pricesize->price_matrix_id ) ? "selected='selected'" : "";
            $size .= "<option ".$selected." value='".$pricesize->price_matrix_id."'>".$pricesize->size."</option>";

        endforeach;

        foreach($matrix as $pricesize):

            if($price_matrix_id == $pricesize->price_matrix_id ){
                $s2id_size =$pricesize->size;
            }
        endforeach;

        foreach($matrix as $price):

            if ($price_matrix_id == $price->price_matrix_id ){

                $matrix_price = $price->price;
            }


        endforeach;


        echo $servings."@a&".$size."@a&".$matrix_price."@a&".$matrix_price."@a&".$s2id_servings."@a&".$s2id_size;

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

    public function edit_data($order_id){

        $this->data['queryup'] = $this->orders_model->getAdminOrder($order_id);


        //print_r($this->data['queryup'][0]->customer_id);
        //exit;

        $flavour_id =  $this->data['queryup'][0]->flavour_id;
        $price_matrix_id =  $this->data['queryup'][0]->price_matrix_id;

        $query="SELECT price_matrix.price_matrix_id, price_matrix.price, servings.title AS servings_title, servings.printing_surcharge, servings.size, flavours. *
FROM price_matrix
LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id
WHERE price_matrix.flavour_id = $flavour_id && price >0";
        $matrix = $this->db->query($query)->result();

        $query="SELECT fondant FROM flavours WHERE flavour_id = $flavour_id";
        $fondants = $this->db->query($query)->row();

        $servings ="";
        foreach($matrix as $priceserv):

            $selected = ($price_matrix_id == $priceserv->price_matrix_id ) ? "selected='selected'" : "";
            $servings .= "<option ".$selected." value='".$priceserv->price_matrix_id."'>".$priceserv->servings_title."</option>";

        endforeach;


        $order_fondant=$this->data['queryup'][0]->fondant;
        $fondant= $fondants->fondant;
        $fond="";
        if($fondant == 1){
            if($order_fondant ==1){
                $fond .= "<option value='1'>Yes</option>";
                $fond .= "<option value='0'>No</option>";
            }else{
                $fond .= "<option value='0'>No</option>";
                $fond .= "<option value='1'>Yes</option>";
            }

        }else{
            $fond .= "<option value='0'>No</option>";
        }


        $size ="";
        foreach($matrix as $pricesize):

            $selected = ($price_matrix_id == $pricesize->price_matrix_id ) ? "selected='selected'" : "";
            $size .= "<option ".$selected." value='".$pricesize->price_matrix_id."'>".$pricesize->size."</option>";

        endforeach;


        $matrix_price="";
        foreach($matrix as $price):

            if ($price_matrix_id == $price->price_matrix_id ){

                $matrix_price = $price->price;
            }
        endforeach;

        $this->data['servings']=$servings;
        $this->data['fond']=$fond;
        $this->data['size']=$size;
        $this->data['cprice']=$matrix_price;
        $this->data['matrix_price']=$matrix_price;

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



        $result = $this->productions_model->orderPrint($order_id);
        $data['queryup']=$result->row();
        $this->layout->view('admin/orders/order_edit_view', $this->data);

    }
    public function edit($order_id){
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
        $this->form_validation->set_rules('price_matrix_id', 'Servings name', 'required|trim|xss_clean');
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
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:'No';
        $data['price_matrix_id']=isset($_REQUEST['price_matrix_id'])? $_REQUEST['price_matrix_id']:'';
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

            $order_data = array(
                'delivery_instruction' => $data['delivery_instruction'],
                'inscription' => $data['inscription'],
                'special_instruction' => $data['special_instruction'],
                'order_status' => $data['order_status']
            );
            $orders=$this->orders_model->order_update($order_data,$orderID);
            $this->session->set_flashdata('success_msg','Order has been updated successfully');

        }else{

            $orders=$this->orders_model->order_insert($data);
            $this->session->set_flashdata('success_msg','New order has been added successfully');
        }

        $revel_order_id = $this->revel_order->getRevelID('orders', $orders['order_id']);
        if(empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] != '300' ){

            $revel_product = $this->revel_order->getRevelID('cakes',$orders['cake_id']);
            $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);
            $revel_location = $this->revel_order->getRevelID('locations',$orders['location_id']);

            $RevelOrderData = array(
                'order_code' => $orders['order_code'],
                'revel_product_id' =>  $revel_product,
                'revel_customer_id' => $revel_customer,
                'revel_location_id' => $revel_location,
                'discount'=> $orders['discount_price'],
                'subtotal'=> $orders['total_price'],
            );
            try{
                $status_code_revel =  $this->revel_order->create($RevelOrderData);
                $orders['revel_order_id']  = $status_code_revel;
            }catch (\Exception $e){
                $orders['revel_order_id']  = null;
            }


            if($status_code_revel > 0){
                $orders['order_code'] = $status_code_revel;
                $orders=$this->orders_model->order_update($orders, $orders['order_id']);
            }


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

        if($orders['order_status'] == 301 &&  $data['on_cake_image_needed'] ==1 ){

            $cake_email_photo = isset($_REQUEST['cake_email_photo']) ? $_REQUEST['cake_email_photo']:'';
            if($cake_email_photo == 1 ){

                $this->mailgunSendMessage($orders,$this->lang->line('mailgun_cakeonimage_email'),$this->lang->line('mailgun_cakeonimage_name'),$this->lang->line('mailgun_cakeonimage_subject'),$this->lang->line('mailgun_cakeonimage_body'));
            }
            $instructional_email_photo = isset($_REQUEST['instructional_email_photo']) ? $_REQUEST['instructional_email_photo']:'';
            if($instructional_email_photo == 1){

                $this->mailgunSendMessage($orders,$this->lang->line('mailgun_instructional_email'),$this->lang->line('mailgun_instructional_name'),$this->lang->line('mailgun_instructional_subject'),$this->lang->line('mailgun_instructional_body'));
            }
        }

        $this->saveBarcodeImage($orders['order_code']);
        $this->createPDF($orders['order_code']);

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

            if(isset($_REQUEST['employee_id'])){

                    $empolyee_code = $this->logs_model->getEmployeeCode($_REQUEST['employee_id']);
                    $log = array(
                        'employee_id' => $empolyee_code,
                        'audit_name' => 'order updated',
                        'description' => 'order_id = '.$orders['order_id'].', customer_id='. $data['customer_id'].',totalprice ='.$data['total_price'].',overrideprice='.$data['override_price'],
                    );
                    $this->logs_model->insertAuditLog($log);
            }
            $this->session->set_flashdata('success_msg','New order has been updated successfully');

        }else{

            if(isset($_REQUEST['employee_id'])){
                $empolyee_code = $this->logs_model->getEmployeeCode($_REQUEST['employee_id']);
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