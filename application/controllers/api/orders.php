<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));
include_once __DIR__ . '/API_Controller.php';

class Orders extends API_Controller
{


    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';
        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();
        $this->load->config('app');
        $this->load->helper(array('uploader','dompdf','idgenerator'));
        $this->load->model(array('orders_model','productions_model','gallery_model','locations_model'));
        $this->load->library('email');

    }

    public function index()
    {
        $lastdate=$this->input->get('lastupdate');

        if(empty($lastdate)){
            $data = $this->orders_model->getAll();
        }else{
            $data = $this->orders_model->getLastUpdateAll($lastdate);
        }
        $this->sendOutput($data);
    }

    public function vaughanOrder(){

        $lastdate=$this->input->get('lastupdate');
        $data = $this->orders_model->getVaughanOrder($lastdate);
        $this->sendOutput($data);

    }

    public function insert()
    {
        //echo returnGenerateID();

        //$file = "assets/uploads/errorlog.txt";
        //file_put_contents($file, json_encode($_REQUEST).PHP_EOL. json_encode($_SERVER).PHP_EOL, FILE_APPEND | LOCK_EX);

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
        $data['delivery_time']=isset($_REQUEST['delivery_time'])? $_REQUEST['delivery_time']:'';
        $data['flavour_id']=isset($_REQUEST['flavour_id'])? $_REQUEST['flavour_id']:'';
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:0;
        $data['price_matrix_id']=isset($_REQUEST['price_matrix_id'])? $_REQUEST['price_matrix_id']:'';
        $data['serving_id']=isset($_REQUEST['serving_id'])? $_REQUEST['serving_id']:'';
        $data['shape_id']=isset($_REQUEST['shape_id'])? $_REQUEST['shape_id']:'';
        if($data['cake_id'] > 0){
            $data['tiers']=0;
        }else{
            $data['tiers']=isset($_REQUEST['tiers'])? $_REQUEST['tiers']:0;
        }
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
        $data['on_cake_image_needed']=isset($_REQUEST['on_cake_image_needed'])? $_REQUEST['on_cake_image_needed']:'';
        $data['cake_email_photo']=isset($_REQUEST['cake_email_photo'])? $_REQUEST['cake_email_photo']:'';
        $data['magic_cake_id']=isset($_REQUEST['magic_cake_id'])? $_REQUEST['magic_cake_id']:'';
        $data['magic_surcharge']=isset($_REQUEST['magic_surcharge'])? $_REQUEST['magic_surcharge']:'';
        $data['inscription']=isset($_REQUEST['inscription'])?$_REQUEST['inscription']:'';
        $data['special_instruction']=isset($_REQUEST['special_instruction'])? $_REQUEST['special_instruction']:'';
        $data['instructional_email_photo']=isset($_REQUEST['instructional_email_photo'])? $_REQUEST['instructional_email_photo']:'';
        $data['vaughan_location']=isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
        $data['order_status']=isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'';
        $data['printed_image_surcharge']=isset($_REQUEST['printed_image_surcharge'])? $_REQUEST['printed_image_surcharge']:'';
        $data['discount_price']=isset($_REQUEST['discount_price'])? $_REQUEST['discount_price']:'';
        $data['total_price']=isset($_REQUEST['total_price'])? $_REQUEST['total_price']:'';
        $data['override_price']=isset($_REQUEST['override_price'])? $_REQUEST['override_price']:'';
        $data['order_status']=isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'';

        $vaughan_location = isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
        if($vaughan_location == 1 ){
            $vaughan_location = $this->orders_model->getVaughanLocation();
            $data['kitchen_location_id'] = $vaughan_location;
        }else{
            $data['kitchen_location_id'] = $data['location_id'];
        }

        $order_delivery['name']=isset($_REQUEST['name']) ? $_REQUEST['name']:'';
        $order_delivery['phone']=isset($_REQUEST['phone']) ? $_REQUEST['phone']:'';
        $order_delivery['address_1']=isset($_REQUEST['address_1'])? $_REQUEST['address_1']:'';
        $order_delivery['address_2']=isset($_REQUEST['address_2'])? $_REQUEST['address_2']:'';
        $order_delivery['postal']=isset($_REQUEST['postal'])? $_REQUEST['postal']:'';
        $order_delivery['city']=isset($_REQUEST['city'])? $_REQUEST['city']:'';
        $order_delivery['province']=isset($_REQUEST['province'])? $_REQUEST['province']:'';
        $order_delivery['delivery_instruction']=isset($_REQUEST['delivery_instruction'])? $_REQUEST['delivery_instruction']:'';

        if(!empty($data)){

            $orders=$this->orders_model->order_insert($data);
            if(strtolower($data['delivery_type']) == 'delivery') {

                $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
            }

            if($orders['order_id']) {

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

            $revel_order_id = $this->revel_order->getRevelID('orders', $orders['order_id']);
            if(empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] != '300' ){

                $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);

                if($orders['pickup_location_id'] > 0 && $orders['delivery_type']=='pickup'){
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['pickup_location_id']);
                    $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['pickup_location_id']);
                    $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

                }else{
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['location_id']);
                    $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['location_id']);
                    $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

                }
                $revel_location_create_id = $this->revel_order->getRevelID('locations',$orders['location_id']);

                $revel_user = $this->revel_order->getRevelID('meta',$orders['employee_id']);

                $RevelOrderData = array(

                    'order_code' => $orders['order_code'],
                    'revel_customer_id' => $revel_customer,
                    'revel_location_id' => $revel_location_id,
                    'revel_location_create_id' => $revel_location_create_id,
                    'revel_establishment_id' => $revel_establishment_id,
                    'revel_product_id' => $revel_product_id,
                    'revel_user_id' => $revel_user,
                    'discount'=> $orders['discount_price'],
                    'subtotal'=> $orders['total_price']
                );

                try{
                    $custom =( $orders['cake_id'] > 0 ) ? $orders['cake_id'] :'';
                    $status_code_revel =  $this->revel_order->create($RevelOrderData,$custom);

                    $orders['revel_order_id']  = $status_code_revel;
                } catch (\Exception $e){
                    $orders['revel_order_id'] = null;
                }


                if($status_code_revel > 0){
                    $orders['order_code'] = $status_code_revel;
                    $orders=$this->orders_model->order_update($orders, $orders['order_id']);
                }

            }


            $result= $this->productions_model->orderPrint($orders['order_id']);
            $rows = $result->row();

            if(isset($_FILES['onCakeImage'])){
                $this->orders_model->doUpload($orders['order_id']);
            }

            if(isset($_FILES['instructionalImages'])){

                $this->orders_model->instructionalImagesUpload($orders['order_id']);
            }

            if($rows -> order_status == '301' ){

                $cake_email_photo = isset($rows->cake_email_photo) ? $rows->cake_email_photo:'';
                if($cake_email_photo == 1 ){

                    $this->mailgunSendMessage($rows,$this->lang->line('mailgun_cakeonimage_email'),$this->lang->line('mailgun_cakeonimage_name'),$this->lang->line('mailgun_cakeonimage_subject'),$this->lang->line('mailgun_cakeonimage_body'));
                }

                $instructional_email_photo = isset($rows->instructional_email_photo) ? $rows->instructional_email_photo :'';
                if($instructional_email_photo == 1){

                    $this->mailgunSendMessage($rows,$this->lang->line('mailgun_instructional_email'),$this->lang->line('mailgun_instructional_name'),$this->lang->line('mailgun_instructional_subject'),$this->lang->line('mailgun_instructional_body'));
                }

            }

            $this->saveBarcodeImage($rows->order_code);
            $this->createPDF($rows->order_code);

            $mailtouser = isset($_REQUEST['mailtouser'])? $_REQUEST['mailtouser']:'';
            $sync = isset($_REQUEST['sync'])? $_REQUEST['sync']:'';
            if($mailtouser ==1 || $sync ==1 ){
                $this->sendEmail($rows->order_code);
            }

            $this->sendOutput(array('order_id'=> $rows -> order_id ,'order_code'=> $rows->order_code,'order_status' =>  $rows -> order_status));
        }
    }

    public function update()
    {


        $array_orders_key =  array(
            'order_id','cake_id','customer_id','employee_id',
            'manager_id','location_id','order_date','delivery_type',
            'pickup_location_id','delivery_zone_id','delivery_zone_surcharge',
            'delivery_date','delivery_time','flavour_id','fondant','tiers','price_matrix_id','serving_id','matrix_price','cake_email_photo','magic_cake_id','magic_surcharge',
            'inscription','special_instruction','instructional_email_photo','vaughan_location','order_status','discount_price','total_price',
            'override_price','printed_image_surcharge','on_cake_image_needed','shape_id'
        );

        $array_delivery_key = array('name','phone','address_1','address_2','postal','city','province','delivery_instruction');



        foreach($_REQUEST as $key => $val ){

            if(in_array($key,$array_orders_key)){
                $data[$key] = $val;
            }

            if(in_array($key,$array_delivery_key)){

                $order_delivery[$key] = $val;
            }
        }

        $row = $this->orders_model->getOrderStatus($data['order_id']);
        if($row->order_status < 303 ){

            /*$vaughan_location = isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
            if($vaughan_location == 1 ){
                $vaughan_location = $this->orders_model->getVaughanLocation();
                $data['kitchen_location_id'] = $vaughan_location;
            }else{
                $data['kitchen_location_id'] = isset($_REQUEST['location_id'])? $_REQUEST['location_id']:'';
            }*/

            $orders=$this->orders_model->order_update($data, $data['order_id']);
            if($orders['order_id']) {

                if(isset($_REQUEST['employee_id'])){

                    $empolyee_code = $this->logs_model->getEmployeeCode($_REQUEST['employee_id']);
                    $log = array(
                        'employee_id' => $empolyee_code,
                        'audit_name' => 'order updated',
                        'description' => 'order_id = '.$orders['order_id'].', customer_id='. $data['customer_id'].',totalprice ='.$data['total_price'].',overrideprice='.$data['override_price'],
                    );

                    $this->logs_model->insertAuditLog($log);
                }
            }

            if(!empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] == '305' ){
                $this->revel_order->delete($revel_order_id);
            }

            if(isset($order_delivery)){
                $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
            }

            if(isset($_REQUEST['removedOnCakeImage'])){

                $image=$_REQUEST['removedOnCakeImage'];
                if(!empty($image)){
                    $this->orders_model->fileDelete($orders['order_id']);
                }
            }

            if(isset($_REQUEST['removedinstructionalImages'])){

                $image=$_REQUEST['removedinstructionalImages'];
                if(!empty($image)){
                    $this->orders_model->instructionalPhotoDelete($image,$orders['order_id']);
                }
            }


            $revel_order_id = $this->revel_order->getRevelID('orders', $orders['order_id']);

            if(empty($revel_order_id) && $orders['order_status'] != '300' ){

                $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);


                if($orders['pickup_location_id'] > 0 && $orders['delivery_type']=='pickup'){
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['pickup_location_id']);
                    $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['pickup_location_id']);
                    $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

                }else{
                    $revel_location_id = $this->revel_order->getRevelID('locations',$orders['location_id']);
                    $revel_establishment_id = $this->revel_order->getEstablishmentID($orders['location_id']);
                    $revel_product_id = $this->revel_order->getEstablishmentProductID($revel_establishment_id , $orders['cake_id']);

                }

                $revel_location_create_id = $this->revel_order->getRevelID('locations',$orders['location_id']);
                $revel_user = $this->revel_order->getRevelID('meta',$orders['employee_id']);

                $RevelOrderData = array(

                    'order_code' => $orders['order_code'],
                    'revel_customer_id' => $revel_customer,
                    'revel_location_id' => $revel_location_id,
                    'revel_location_create_id' => $revel_location_create_id,
                    'revel_establishment_id' => $revel_establishment_id,
                    'revel_product_id' => $revel_product_id,
                    'revel_user_id' => $revel_user,
                    'discount'=> $orders['discount_price'],
                    'subtotal'=> $orders['total_price']
                );

                try{

                    $custom =( $orders['cake_id'] > 0 ) ? $orders['cake_id'] :'';
                    $status_code_revel =  $this->revel_order->create($RevelOrderData,$custom);

                    $orders['revel_order_id']  = $status_code_revel;
                } catch (\Exception $e){
                    $orders['revel_order_id'] = null;
                }


                if($status_code_revel > 0){
                    $orders['order_code'] = $status_code_revel;
                    $orders=$this->orders_model->order_update($orders, $orders['order_id']);
                }

            }else{

                if($revel_order_id){

                    $revel_customer = $this->revel_order->getRevelID('customers',$orders['customer_id']);
                    $revel_location = $this->revel_order->getRevelID('locations',$orders['location_id']);
                    $revel_user = $this->revel_order->getRevelID('meta',$orders['employee_id']);

                    $RevelOrderData = array(
                        'revel_order_id' => $revel_order_id,
                        'order_code' => $orders['order_code'],
                        'revel_customer_id' => $revel_customer,
                        'revel_location_id' => $revel_location,
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
            }

            if(!empty($revel_order_id) && $orders['order_code'] && $orders['order_status'] == '305'){
                $this->revel_order->delete($revel_order_id);
            }

            $result= $this->productions_model->orderPrint($orders['order_id']);
            $rows = $result->row();

            if(isset($_FILES['onCakeImage'])){
                $this->orders_model->doUpload($orders['order_id']);
            }

            if(isset($_FILES['instructionalImages'])){

                $this->orders_model->instructionalImagesUpload($orders['order_id']);
            }

            if($rows -> order_status == '301' ){

                $cake_email_photo = isset($rows->cake_email_photo) ? $rows->cake_email_photo:'';
                if($cake_email_photo == 1 ){

                    $this->mailgunSendMessage($rows,$this->lang->line('mailgun_cakeonimage_email'),$this->lang->line('mailgun_cakeonimage_name'),$this->lang->line('mailgun_cakeonimage_subject'),$this->lang->line('mailgun_cakeonimage_body'));
                }

                $instructional_email_photo = isset($rows->instructional_email_photo) ? $rows->instructional_email_photo :'';
                if($instructional_email_photo == 1){

                    $this->mailgunSendMessage($rows,$this->lang->line('mailgun_instructional_email'),$this->lang->line('mailgun_instructional_name'),$this->lang->line('mailgun_instructional_subject'),$this->lang->line('mailgun_instructional_body'));
                }

            }

            $this->saveBarcodeImage($rows->order_code);
            $this->createPDF($rows->order_code);

            $mailtouser = isset($_REQUEST['mailtouser'])? $_REQUEST['mailtouser']:'';
            if($mailtouser ==1){
                $this->sendEmail($rows->order_code);
            }

            $this->sendOutput(array('order_id'=> $rows->order_id,'order_code'=> $rows->order_code,'order_status' => $rows->order_status));

        }else{
            $this->sendOutput(array('order_id'=> $row->order_id,'order_code'=> $row->order_code,'order_status' => $row->order_status));
        }

    }


    private function mailgunSendMessage($orders, $replyTo,$name,$subject=NULL,$body=NULL){

        $data['rows']=$orders;
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


    public function mailgunInstructionalPhotoReply(){

        $request = $this->input->post();
        $order_array = explode('|',$request['subject']);

        $order_code=  $order_array['1'];

        $row=$this->db->select('order_id')->where(array('order_code'=> $order_code))->get('orders')->row();
        $request['order_id'] = $row->order_id ;

        if($request){
            $this->orders_model->instructionalImagesUploadByemail($request);
        }

    }

    public function mailgunCakeOnImageReply(){
        $request = $this->input->post();
        $order_array = explode('|',$request['subject']);

        $order_code =  $order_array['1'];
        $row=$this->db->select('order_id')->where(array('order_code'=> $order_code))->get('orders')->row();
        $request['order_id'] = $row->order_id ;

        if($request){
            $this->orders_model->cakeOnimage($request);
        }

    }


    public function barcode_gen($order_code) {

        $this->load->library('Zend');
        $this->zend->load('Zend/Barcode/Barcode');
        $barcodeOptions = array('text' => "$order_code",'drawText'=>false);
        $rendererOptions = array();
        Zend\Barcode\Barcode::factory('code39', 'image', $barcodeOptions, $rendererOptions)->render();

    }

    public function saveBarcodeImage($order_code){

        define('YOUR_DIRECTORY',realpath(APPPATH . "../web/assets/uploads/orders/barcode/"));
        $content = file_get_contents(site_url()."/api/orders/barcode_gen/".$order_code);
        file_put_contents(YOUR_DIRECTORY.$order_code.".png",$content);
    }


    function invoice(){

        $data=$_REQUEST;
        $invoice =$data['print'];
        $order_id = $data['order_id'];

        $result= $this->productions_model->orderPrint($order_id);

        if($result ->num_rows() > 0 ){

            $this->data['queryup']=$result->row();

            if($invoice =="thermal"){

                $this->load->view('email/thermal_view', $this->data);
            }else{

                $this->load->view('email/invoice_view', $this->data);
                // $row=$this->data['queryup'];
                //$this->sendEmail($row->order_code);

            }

        }else{

            return false;

        }

    }

    function productionInvoice(){

        $data=$_REQUEST;
        $invoice =$data['print'];
        $order_id = $data['order_id'];

        $result= $this->productions_model->orderPrint($order_id);

        if($result ->num_rows() > 0 ){

            $this->data['queryup']=$result->row();

            if($invoice =="thermal"){

                $this->load->view('email/production_thermal_view', $this->data);

            }elseif($invoice =="kitchen"){

                $this->load->view('email/kitchen_thermal_view', $this->data);

            }else{

                $this->load->view('email/production_invoice_view', $this->data);
            }

        }else{

            return false;

        }

    }


    public function mail_to_user(){

        $order_id = $_REQUEST['order_id'];
        $result= $this->productions_model->orderPrint($order_id);
        if($result ->num_rows() > 0){
            $this->data['queryup']=$result->row();
            $customer_email=$this->data['queryup']->email;
            $order_status=$this->data['queryup']->order_status;

            if($order_status == 301){
                $orderstatus="Order";
            }else{
                $orderstatus = $this->data['queryup']->orderstatus;
            }
            $pdfname ='stpb-'.$this->data['queryup']->order_code;

            if(!empty($customer_email)){

                $body          = $this->load->view('email/invoice_body', $this->data,true);
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

            if(!empty($customer_email)){
                $this->sendOutput(array('status'=>'success','email_id'=>$customer_email));
            }else{
                $this->sendOutput(array('status'=>'no_email','email_id'=>''));
            }
        }else{
            $this->sendOutput(array('status'=>'invalid_order','email_id'=>''));
        }


    }

    public function sendEmail($order_code){


        $result= $this->productions_model->orderDetails($order_code);
        $this->data['queryup']=$result->row();
        $customer_email=$this->data['queryup']->email;
        $order_status=$this->data['queryup']->order_status;
        if($order_status == 301){
            $orderstatus="Order";
        }else{
            $orderstatus = $this->data['queryup']->orderstatus;
        }

        if(!empty($customer_email)){

            $pdfname ='stpb-'.$this->data['queryup']->order_code;
            $body          = $this->load->view('email/invoice_body', $this->data,true);
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

    public function createPDF($order_code){

        $this->load->helper(array('dompdf', 'file'));
        $result= $this->productions_model->orderDetails($order_code);
        if($result ->num_rows() > 0 ){
            $this->data['queryup']=$result->row();
            $pdfname =$this->data['queryup']->order_code;

            $html          =$this->load->view('email/invoice_view', $this->data,true);
            //$invoiceNumber = str_pad('stpb-'.$pdfname,8,0,STR_PAD_LEFT);
            $invoiceNumber = ('stpb-'.$pdfname);
            $pdf           = pdf_create($html, $invoiceNumber, false);
            $filePath      = realpath(APPPATH . "../web/assets/uploads/orders/pdf/"). DIRECTORY_SEPARATOR . $invoiceNumber.".pdf";
            file_put_contents($filePath,$pdf);
            //echo $pdffile_path = $filePath;
        }
    }

    /* public function sendOrderEmail($order_code,$ordertype="Estimate"){

         // $this->load->helper(array('dompdf', 'file'));
         $result= $this->productions_model->orderDetails($order_code);
         $this->data['queryup']=$result->row();
         $this->data['invoice_title']= $ordertype;
         $body          = $this->load->view('email/invoice_body', $this->data,true);
          $html          = $this->load->view('email/invoice_view', $this->data,true);
          $invoiceNumber = str_pad($ordertype.'-'.$order_code,8,0,STR_PAD_LEFT);
          $pdf           = pdf_create($html, $invoiceNumber, false);
          $filePath      = realpath(APPPATH . "../web/assets/uploads/orders/pdf/"). DIRECTORY_SEPARATOR . $invoiceNumber.".pdf";
          file_put_contents($filePath,$pdf);
          $this->sendEmail($body);
     }*/




    public function search(){
        $request = $this->input->get();
        if($request){
            $data = $this->orders_model->doSearch($request);
            $this->sendOutput($data);
        }

    }



    public function notes($order_id){
        $data = $this->orders_model->getAllNotes($order_id);
        $this->sendOutput($data);

    }

    public function notesave(){
        if(!empty($_POST)){
            $this->orders_model->SaveNotes($_POST);
            if($this->db->insert_id()){
                $data = array('message'=>'created successfull','code'=>'201');
                $this->sendOutput($data);
            }
        }
    }

    public function notesearch(){
        $request = $this->input->get();
        if($request){
            $data = $this->orders_model->NotesSearch($request);
            $this->sendOutput($data);
        }

    }
    public function delete(){

        $this->orders_model->cronOrderDelete();

    }

    public function sold(){

        $cronId = rand(111111, 999999);
        $this->checkCron($cronId, "Start cron");
        $revel_order_ids = array();

        header("Content-type=> application/json");
        $result = $this->db->select('revel_order_id')->where('order_status','303')->get('orders')->result();

        foreach($result as $rows){
            $revel_order_id = $rows->revel_order_id;
            $revel = ($this->revel_order->getRevelOrderSold($revel_order_id));
            if(isset($revel->remaining_due) && $revel->remaining_due == 0 ){
                $this->orders_model->cronOrderSold($revel_order_id);
                $this->revel_order->updateOrderUser($revel_order_id);

                $revel_order_ids[] = $revel_order_id;
            }
        }

        $this->checkCron($cronId, "Finish cron. Call revel api for following revel order ids: ".implode(",", $revel_order_ids));
    }

    public function getAllOrder(){
        header("Content-type=> application/json");
        $revel_orders = ($this->revel_order->getAll());
        var_dump($revel_orders);

    }


    public function updateOrder($revel_id=0) {
        if($revel_id > 0 ){
            $this->revel_order->updateOrderUser($revel_id);
        }
        return false;
    }


    public function getOrder($revel_id=0){


        header("Content-type=> application/json");
        if($revel_id > 0 ){
            $revel_order = ($this->revel_order->getById($revel_id));
            $revel_order_payment = ($this->revel_order->getPayment($revel_id));
            var_dump($revel_order);
            var_dump($revel_order_payment);
        }
        return false;

    }

    public function  localCronCheck(){

    }

    public function checkCron($cronId, $message = ""){

        $this->email->set_newline("\r\n");
        $this->email->from($this->lang->line('global_email'), $this->lang->line('global_email_subject'));
        $this->email->to('dan@gsisolutions.ca');
        // $this->email->cc(array('maksud@emicrograph.com','nmkhan@emicrograph.com','dan@gsisolutions.ca','emran@emicrograph.com'));
        $this->email->subject('Check Cron Time');

        $cronText = " = Cron ID: " . $cronId;
        $body = (!empty($message)) ? $cronText . ", Message: " . $message : $cronText;
        $this->email->message(date( "Y-m-d H:i:s") . $body);
        $this->email->send();

    }

}
//0 0 * * * php /var/www/phillips-bakery/web/index.php api/orders delete
//0 * * * * php /var/www/phillips-bakery/web/index.php api/orders sold