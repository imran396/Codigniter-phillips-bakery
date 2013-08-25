<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Customers extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $this->load->model('customers_model');
        $this->load->model('revel_customer');
        //$this->output->enable_profiler(TRUE);
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/customers/customers_view', $this->data);

    }

    public function listing($start=0)
    {

        $this->data['paging'] = $this->customers_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/customers/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {
            $this->addValidation();
            if ($this->form_validation->run()) {
                $this->saveData();
                $id =$this->input->post('customer_id');
                if(!empty($id)) {
                    $this->redirectToHome('edit/'.$id);
                }else{
                    $this->redirectToHome('listing');
                }


            }
        }
        $this->index();

    }


    public function edit($id)
    {

        $this->data['queryup'] = $this->customers_model->getcustomers($id);

        $this->data['customernotes'] = $this->customers_model->getCustomerNotes($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/customers/customers_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('first_name');
        $this->form_validation->set_rules('last_name');
        $this->form_validation->set_rules('email');
        $this->form_validation->set_rules('phone_number', 'Phone Number','required|trim|xss_clean|callback_checkTitle');
        $this->form_validation->set_rules('customer_id');
        $this->form_validation->set_rules('address1');
        $this->form_validation->set_rules('address2');
        $this->form_validation->set_rules('city');
        $this->form_validation->set_rules('province');
        $this->form_validation->set_rules('postal_code');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('status');

    }


    private function saveData()
    {

        $data = $this->input->post();
        if (empty($data['customer_id'])){

            if(isset($data)){

                try{
                    $data['revel_customer_id']= $this->revel_customer->create($data);
                }catch (\Exception $e){

                    $data['revel_customer_id'] = null;
                }

                $this->customers_model->create($data);
            }
          $this->session->set_flashdata('success_msg',"New customer has been added successfully");
        } else {
            $customerUpdatedData = $this->customers_model->getcustomers($data['customer_id']);
            $data['revel_customer_id'] = $customerUpdatedData[0]->revel_customer_id;

            try{
                $this->revel_customer->update($data);
            } catch (\Exception $e){

            }


            $this->customers_model->save($data, $data['customer_id']);
            $this->session->set_flashdata('success_msg',"Customer has been updated successfully");
        }

    }

    public function status($id){

        $this->data['category'] = $this->customers_model->statusChange($id);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->data['category'] = $this->customers_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkTitle($title){

        $data = $this->input->post();
        return  $this->customers_model->checkcustomers($data['customer_id'],$title);
    }

    public function order_list(){
        $customer_id = $this->input->post('customer_id');
        $order_status = $this->input->post('order_status');
        echo $this->customers_model->orderList($customer_id,$order_status);
    }

    function search($urlsearch=NULL,$start=0){


        $getsearch = $this->input->get('search');

        if($getsearch){
            $search = $getsearch;
        }else{
            $search = $urlsearch;
        }

        if(!empty($search)){

            $this->data['paging'] = $this->customers_model->searching($search,$start);
            $this->data['active']=$this->uri->segment(2,0);
            $this->layout->view('admin/customers/listing_view', $this->data);


        }else{

            $this->session->set_flashdata('warnings_msg',$this->lang->line('update_msg'));
            $this->redirectToHome("listing");
        }


    }



    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/customers/'.$redirect);
    }

}