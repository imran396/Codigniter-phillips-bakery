<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Customers extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $this->load->model('customers_model');

    }

    public function index()
    {
        $group = $this->session->userdata('group');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif (!$this->ion_auth->is_group($group))
        {
            redirect('/admin', 'refresh');
        }
        else
        {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            $this->data['users'] = $this->ion_auth->get_users_array();
        }

        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/customers/customers_view', $this->data);

    }

    public function listing($start=0){

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
                    $this->redirectToHome();
                }


            }
        }
        $this->index();

    }


    public function edit($id)
    {

        $this->data['queryup'] = $this->customers_model->getcustomers($id);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/customers/customers_view', $this->data);
    }

    private function addValidation()
    {
        $this->form_validation->set_rules('first_name');
        $this->form_validation->set_rules('last_name');
        $this->form_validation->set_rules('email');
        $this->form_validation->set_rules('phone_number', 'Phone Number Title','required|trim|xss_clean');
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
        if (empty($data['customer_id'])) {

            $this->customers_model->create($data);

            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
        } else {
            $this->customers_model->save($data, $data['customer_id']);

            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
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


    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/customers/'.$redirect);
    }

}