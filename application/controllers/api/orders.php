<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));
include_once __DIR__ . '/API_Controller.php';

class Orders extends API_Controller
{

    public $config = array(
        'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'imran@emicrograph.com',
        'smtp_pass' => 'i1m2r3a4n',
        'charset'   => 'iso-8859-1',
        'mailtype' => 'html'
    );

    public function __construct()
    {
        parent::__construct();

        require_once 'Zend/Loader/StandardAutoloader.php';
        $loader = new Zend\Loader\StandardAutoloader(array('autoregister_zf' => true));
        $loader->register();
        $this->load->helper('uploader');
        $this->load->model(array('orders_model','productions_model','gallery_model','locations_model'));
        $this->load->helper('dompdf');
        $this->load->library('email',$this->config);
        $this->load->model('orders_model');
    }



    public function index()
    {
        $data = $this->orders_model->getAll();
        $this->sendOutput($data);
    }

    public function insert()
    {
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
        $data['fondant']=isset($_REQUEST['fondant'])? $_REQUEST['fondant']:'No';
        $data['price_matrix_id']=isset($_REQUEST['price_matrix_id'])? $_REQUEST['price_matrix_id']:'';
        $data['tiers']=isset($_REQUEST['tiers'])? $_REQUEST['tiers']:'';
        $data['shape']=isset($_REQUEST['shape'])? $_REQUEST['shape']:'';
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
        $data['cake_email_photo']=isset($_REQUEST['cake_email_photo'])? $_REQUEST['cake_email_photo']:'';
        $data['magic_cake_id']=isset($_REQUEST['magic_cake_id'])? $_REQUEST['magic_cake_id']:'';
        $data['magic_surcharge']=isset($_REQUEST['magic_surcharge'])? $_REQUEST['magic_surcharge']:'';
        $data['inscription']=isset($_REQUEST['inscription'])?$_REQUEST['inscription']:'';
        $data['special_instruction']=isset($_REQUEST['special_instruction'])? $_REQUEST['special_instruction']:'';
        $data['instructional_email_photo']=isset($_REQUEST['instructional_email_photo'])? $_REQUEST['instructional_email_photo']:'';
        $data['vaughan_location']=isset($_REQUEST['vaughan_location'])? $_REQUEST['vaughan_location']:'';
        $data['order_status']=isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'';
        $data['printed_imag_surcharge']=isset($_REQUEST['printed_imag_surcharge'])? $_REQUEST['printed_imag_surcharge']:'';
        $data['discount_price']=isset($_REQUEST['discount_price'])? $_REQUEST['discount_price']:'';
        $data['total_price']=isset($_REQUEST['total_price'])? $_REQUEST['total_price']:'';
        $data['override_price']=isset($_REQUEST['override_price'])? $_REQUEST['override_price']:'';


        $order_status=isset($_REQUEST['order_status'])? $_REQUEST['order_status']:'';
        if($order_status =='order'){
            $data['production_status']='in-production';
        }else{
            $data['production_status']='estimate';
        }

        $order_delivery['name']=isset($_REQUEST['name']) ? $_REQUEST['name']:'';
        $order_delivery['phone']=isset($_REQUEST['phone']) ? $_REQUEST['phone']:'';
        $order_delivery['address_1']=isset($_REQUEST['address_1'])? $_REQUEST['address_1']:'';
        $order_delivery['address_2']=isset($_REQUEST['address_2'])? $_REQUEST['address_2']:'';
        $order_delivery['postal']=isset($_REQUEST['postal'])? $_REQUEST['postal']:'';
        $order_delivery['city']=isset($_REQUEST['city'])? $_REQUEST['city']:'';
        $order_delivery['province']=isset($_REQUEST['province'])? $_REQUEST['province']:'';
        $order_delivery['delivery_instruction']=isset($_REQUEST['delivery_instruction'])? $_REQUEST['delivery_instruction']:'';


        $orders=$this->orders_model->order_insert($data);

        if(strtolower($data['delivery_type']) == 'delivery'){

            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }


        if(isset($_FILES['onCakeImage'])){

            $this->orders_model->doUpload($orders['order_id']);
        }

        if(isset($_FILES['instructionalImages'])){

            $this->orders_model->instructionalImagesUpload($orders['order_id']);
        }

        if($data['cake_email_photo']== 'yes'){
            $this->mailgunSendMessage($orders ,$data,'rony@imran3968.mailgun.org','Rony');
        }

        if($data['instructional_email_photo']== 'yes'){
            $this->mailgunSendMessage($orders ,$data,'mak@imran3968.mailgun.org','Mak');
        }

        $this->saveBarcodeImage($orders['order_code']);
        $mailtouser = isset($_REQUEST['mailtouser'])? $_REQUEST['mailtouser']:'';
        if($mailtouser =="yes"){
            $this->sendEmail($orders['order_code']);
        }

        if(strtolower($data['order_status']) == 'order'){

            $this->sendOutput(array('order_id'=> $orders['order_id'],'order_code'=> $orders['order_code'],'production_status' =>  $orders['production_status']));
        }else{
            $this->sendOutput(array('order_id'=> $orders['order_id'],'production_status' =>  $orders['production_status']));
        }

    }




    public function update(){


        $array_orders_key =  array(
            'order_id','cake_id','customer_id','employee_id',
            'manager_id','location_id','order_date','delivery_type',
            'pickup_location_id','delivery_zone_id','delivery_zone_surcharge',
            'delivery_date','delivery_time','flavour_id','fondant','tiers','price_matrix_id','shape','matrix_price','cake_email_photo','magic_cake_id','magic_surcharge',
            'inscription','special_instruction','instructional_email_photo','vaughan_location','order_status','discount_price','total_price',
            'override_price','printed_imag_surcharge'
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

        print_r($data);
        exit;

        $orders=$this->orders_model->order_update($data, $data['order_id']);

        if(isset($order_delivery)){
            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }


        if(isset($_FILES['onCakeImage'])){
            $this->orders_model->doUpload($orders['order_id']);
        }

        if(isset($_FILES['instructionalImages'])){

            $this->orders_model->instructionalImagesUpload($orders['order_id']);

        }
        if(isset($data['cake_email_photo'])== 'yes'){
            $this->mailgunSendMessage($orders ,$data,'rony@imran3968.mailgun.org','Rony');
        }

        if(isset($data['instructional_email_photo'])== 'yes'){
            $this->mailgunSendMessage($orders ,$data,'mak@imran3968.mailgun.org','Mak');
        }

        if(isset($_REQUEST['removedinstructionalImages'])){

            $image=$_REQUEST['removedinstructionalImages'];
            if(!empty($image)){
                $this->orders_model->instructionalPhotoDelete($image,$orders['order_id']);
            }
        }

        $mailtouser = isset($_REQUEST['mailtouser'])? $_REQUEST['mailtouser']:'';
        if($mailtouser =="yes"){
            $this->sendEmail($orders['order_code']);
        }
        if(strtolower($data['order_status']) == 'order'){

            $this->sendOutput(array('order_id'=> $orders['order_id'],'order_code'=> $orders['order_code'],'production_status' =>  $orders['production_status']));
        }else{
            $this->sendOutput(array('order_id'=> $orders['order_id'],'production_status' =>  $orders['production_status']));
        }

    }


    private function mailgunSendMessage($orders, $data, $replyTo,$name){

        $data['order_code'] = $orders['order_code'];
        $data ['rows'] = $this->orders_model->getCustomerData($data['customer_id']);
        $body = $this->load->view('email/instructional_photo_view', $data,true);
        $this->email->set_newline("\r\n");
        $this->email->from('imran@emicrograph.com', 'St Phillip\'s Bakery');
        $this->email->reply_to($replyTo, $name);
        $this->email->to($data ['rows']->email);
        $this->email->subject('St Phillip\'s - Attach your images'.'|'.$data['order_code']);
        $this->email->message(nl2br($body));
        $this->email->send();

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



    public function sendEmail($order_code){


        $result= $this->productions_model->orderDetails($order_code);
        $this->data['queryup']=$result->row();
        $customer_email=$this->data['queryup']->email;
           if($this->data['queryup']->order_status =="order"){
               $order_status="Invoice";
           }else{
               $order_status=ucfirst($this->data['queryup']->order_status);
           }
        if(!empty($customer_email)){

            $body          = $this->load->view('email/invoice_body', $this->data,true);
            //$to      = 'shafiq@emicrograph.com';
            // $subject ="Estimate";
            $this->email->set_newline("\r\n");
            $this->email->from('shafiq@emicrograph.com', 'St Phillip\'s Bakery');
            $this->email->to($customer_email);
            $this->email->subject('St Phillip\'s Bakery :'.$order_status);
            $this->email->message(nl2br($body));
            $this->email->send();
        }


    }

    public function sendOrderEmail($order_code,$ordertype="Estimate"){

        // $this->load->helper(array('dompdf', 'file'));
        $result= $this->productions_model->orderDetails($order_code);
        $this->data['queryup']=$result->row();
        $this->data['invoice_title']= $ordertype;
        $body          = $this->load->view('email/invoice_body', $this->data,true);
        /* $html          = $this->load->view('email/invoice_view', $this->data,true);
         $invoiceNumber = str_pad($ordertype.'-'.$order_code,8,0,STR_PAD_LEFT);
         $pdf           = pdf_create($html, $invoiceNumber, false);
         $filePath      = realpath(APPPATH . "../web/assets/uploads/orders/pdf/"). DIRECTORY_SEPARATOR . $invoiceNumber.".pdf";
         file_put_contents($filePath,$pdf);*/
        // $this->sendEmail($body);
    }




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

}