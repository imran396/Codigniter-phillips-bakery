<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath(APPPATH .'libraries'));

class Orders extends Crud_Controller
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
        $this->layout->setLayout('layout_admin');
        $this->load->helper('uploader');
        $this->load->model(array('orders_model','productions_model','cakes_model'));
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    function index(){

        $this->data['active']=$this->uri->segment(2,0);
        $this->data['catresult'] = $this->cakes_model->getCategories();
        $this->data['cakeresult'] = $this->orders_model->getCakes($category=0);
        $this->data['flvresult'] = $this->cakes_model->getFlavours();
        $this->data['sapresult'] = $this->cakes_model->getShapes();
        $this->data['zoneresult'] = $this->cakes_model->getZones();
        $this->data['locationresult'] = $this->cakes_model->getlocations();
        $this->data['customerresult'] = $this->cakes_model->getCustomers();
        $this->data['employeeresult'] = $this->cakes_model->getEmployees($group_id=2);
        $this->data['managerresult'] = $this->cakes_model->getEmployees($group_id=3);
        $this->layout->view('admin/orders/order_view', $this->data);

    }

    function getFlavour(){

        $cake_id = $this->input->post('cake_id');
        $row = $this->db->select('flavour_id,tiers')->where(array('cake_id' => $cake_id))->get('cakes')->row();
        $flavour_id = unserialize($row->flavour_id);
        $data ="";
        $data .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($flavour_id as $flavourid):
            $res = $this->cakes_model->getFlavourName($flavourid);
            $data .= "<option value='".$res->flavour_id."'>".$res->title."</option>";

        endforeach;

        $tiers ="";
        $tier = unserialize($row->tiers);
        $tiers .= "<option value=''>---".$this->lang->line('select_one')."---</option>";
        foreach($tier as $tie):
            $tiers .= "<option value='".$tie."'>".$tie."</option>";

        endforeach;

        echo $data."@a&".$tiers;
    }

    function getServings(){

        $flavour_id = $this->input->post('flavour_id');
        $query="SELECT price_matrix.price_matrix_id, price_matrix.price, servings.title AS servings_title, servings.printing_surcharge, servings.size, flavours. *
FROM price_matrix
LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
LEFT JOIN flavours ON price_matrix.flavour_id = flavours.flavour_id
WHERE price_matrix.flavour_id = $flavour_id && price >0";
        $matrix = $this->db->query($query)->result();

        $query="SELECT fondant FROM flavours WHERE flavour_id = $flavour_id";
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
            $fond .= "<option value='1'>Yes</option>";
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




        $size ="";
        foreach($matrix as $pricesize):

            $selected = ($price_matrix_id == $pricesize->price_matrix_id ) ? "selected='selected'" : "";
            $size .= "<option ".$selected." value='".$pricesize->price_matrix_id."'>".$pricesize->size."</option>";

        endforeach;


        $cprice ="";
        foreach($matrix as $price):

            $selected = ($price_matrix_id == $price->price_matrix_id ) ? "selected='selected'" : "";
            $cprice .= "<option ".$selected."  value='".$price->price."'>".$price->price."</option>";

        endforeach;

        foreach($matrix as $price):

            if ($price_matrix_id == $price->price_matrix_id ){

                $matrix_price = $price->price;
            }


        endforeach;


        echo $servings."@a&".$size."@a&".$cprice."@a&".$matrix_price;

    }

    function getPrintedImageSurcharge(){

        $price_matrix_id = $this->input->post('price_matrix_id');
        $query="SELECT servings.printing_surcharge FROM price_matrix
        LEFT JOIN servings ON price_matrix.serving_id = servings.serving_id
        WHERE price_matrix.price_matrix_id = $price_matrix_id";
        $matrix = $this->db->query($query)->row();

        echo $matrix->printing_surcharge;

    }

    function getZoneSurcharge(){

        $zone_id = $this->input->post('zone_id');
        $query="SELECT surcharge FROM zones
          WHERE zones.zone_id = $zone_id";
        $zone = $this->db->query($query)->row();

        echo $zone->surcharge;

    }



    public function listing($starts=0)
    {


        $this->data['active']=$this->uri->segment(2,0);
        $this->data['paging']=$this->orders_model->getListing($starts);
        $this->layout->view('admin/orders/listing_view', $this->data);


    }

    public function save(){

        $data =$this->input->post();
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
        $data['matrix_price']=isset($_REQUEST['matrix_price'])? $_REQUEST['matrix_price']:'';
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
        $estimate=isset($_REQUEST['estimate'])? $_REQUEST['estimate']:'';

        if($estimate ==300){
            $data['order_status']=300;
        }else{
            $data['order_status']=301;;
        }

        $data['order_date']=date('m-d-Y');

        $order_delivery['name']=isset($_REQUEST['name']) ? $_REQUEST['name']:'';
        $order_delivery['phone']=isset($_REQUEST['phone']) ? $_REQUEST['phone']:'';
        $order_delivery['address_1']=isset($_REQUEST['address_1'])? $_REQUEST['address_1']:'';
        $order_delivery['address_2']=isset($_REQUEST['address_2'])? $_REQUEST['address_2']:'';
        $order_delivery['postal']=isset($_REQUEST['postal'])? $_REQUEST['postal']:'';
        $order_delivery['city']=isset($_REQUEST['city'])? $_REQUEST['city']:'';
        $order_delivery['province']=isset($_REQUEST['province'])? $_REQUEST['province']:'';
        $order_delivery['delivery_instruction']=isset($_REQUEST['delivery_instruction'])? $_REQUEST['delivery_instruction']:'';



        $orders=$this->orders_model->order_insert($data);

        if(strtolower($data['delivery_type']) == 'delivery') {

            $this->orders_model->delivery_order($order_delivery,$orders['order_id']);
        }


        if(isset($_FILES['onCakeImage'])){
            $this->orders_model->doUpload($orders['order_id']);
        }

       if($pluploadUploader_count > 0){

            $this->orders_model->galleryUpload($data,$orders['order_id']);

       }

        if(isset($data['cake_email_photo'])== 1){
            $this->mailgunSendMessage($orders ,$data,'rony@imran3968.mailgun.org','Rony','St Phillips - Attach your on cake image');
        }

        if(isset($data['instructional_email_photo'])== 1){
            $this->mailgunSendMessage($orders ,$data,'mak@imran3968.mailgun.org','Mak','St Phillips - Attach your instructional images');
        }

        $this->saveBarcodeImage($orders['order_code']);
        $mailtouser = isset($_REQUEST['mailtouser'])? $_REQUEST['mailtouser']:'';
        if($mailtouser =="yes"){
            $this->sendEmail($orders['order_code']);
        }

        if($orders['order_id']) {

            $empolyee_code = $this->logs_model->getEmployeeCode($data['employee_id']);
            $log = array(
                'employee_id' => $empolyee_code,
                'audit_name' => 'order created',
                'description' => 'order_id = '.$orders['order_id'].', customer_id='. $data['customer_id'].',totalprice ='.$data['total_price'].',overrideprice='.$data['override_price'],
            );
            $this->logs_model->insertAuditLog($log);

        }
        $this->session->set_flashdata('success_msg','New order has been added successfully');
        redirect('admin/orders/listing');

    }

    private function mailgunSendMessage($orders, $data, $replyTo,$name,$subject){

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


    function search($urlsearch=NULL,$start=0){


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



    public function remove($id)
    {
        $this->servings_model->delete($id);
        $this->redirectToHome("listing");

    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/servings/'.$redirect);
    }

}