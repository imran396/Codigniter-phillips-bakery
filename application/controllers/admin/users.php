<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class users extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout_admin');
        $this->load->model('users_model');
        $log_status = $this->ion_auth->logged_in();
        $this->access_model->logged_status($log_status);
        $this->access_model->access_permission($this->uri->segment(2,NULL),$this->uri->segment(3,NULL));

    }

    public function index()
    {


        $this->data['groupresult'] = $this->users_model->getGroup();
        $this->data['locresult'] = $this->users_model->getLocations();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/users_view', $this->data);

    }

    public function listing($start=0){

        $this->data['groupresult'] = $this->users_model->getGroup();
        $this->data['locresult'] = $this->users_model->getLocations();
        $this->data['paging'] = $this->users_model->getListing($start);
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/listing_view', $this->data);

    }

    public function save()
    {

        if (!empty($_POST)) {

            $this->addValidation();

            if ($this->form_validation->run()) {


                $username = strtolower($this->input->post('username'));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $row=$this->db->select('id')->order_by('id','desc')->limit(1)->get('meta')->row();
                $last_id = $row->id;
                $employee_id = "SP-1000".$last_id;

                $additional_data = array(
                    'first_name' => $this->input->post('first_name'),
                    'last_name' => $this->input->post('last_name'),
                    'group_id' => $this->input->post('group_id'),
                    'location_id' => $this->input->post('location_id'),
                    'employee_id' => $employee_id,
                    'status' => 1
                );
                //print_r($additional_data);
               // exit;
            }

            if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
            { //check to see if we are creating the user
                //redirect them back to the admin page
                $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
                redirect('admin/users/listing', 'refresh');
            }else{

                $this->data['groupresult'] = $this->users_model->getGroup();
                $this->data['locresult'] = $this->users_model->getLocations();
                $this->data['success_msg'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
                $this->layout->view('admin/users/users_view', $this->data);

            }
        }

        //$this->index();

    }


    public function edit($username)
    {

        $this->data['queryup'] = $this->users_model->getusers($username);
        $this->data['groupresult'] = $this->users_model->getGroup();
        $this->data['locresult'] = $this->users_model->getLocations();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/edit_user_view', $this->data);
    }

    public function profile()
    {

        $this->access_model->access_permission($this->uri->segment(2,NULL),'others');
        $username=  $this->session->userdata('username');
        $this->data['queryup'] = $this->users_model->getusers($username);
        $this->data['groupresult'] = $this->users_model->getGroup();
        $this->data['locresult'] = $this->users_model->getLocations();
        $this->data['active']=$this->uri->segment(2,0);
        $this->layout->view('admin/users/edit_user_view', $this->data);
    }

    private function addValidation()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
        $this->form_validation->set_rules('first_name', 'First Name', 'xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
        $this->form_validation->set_rules('email', 'E-mail', 'valid_email');
        $this->form_validation->set_rules('group_id', 'Group ', 'required');
        $this->form_validation->set_rules('location_id');

    }

    function change_password()
    {

        $username=$this->input->post('username');
        $this->form_validation->set_rules('old', 'Old password', 'required');
        $this->form_validation->set_rules('new', 'New Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[new_confirm]');
        $this->form_validation->set_rules('new_confirm', 'Confirm New Password', 'required');

        if (!$this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        $user = $this->ion_auth->get_user($this->session->userdata('user_id'));

        if ($this->form_validation->run() == false)
        { //display the form
            //set the flash data error message if there is one
            $this->data['error_msg'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
            //render
            if($this->session->userdata('username') == $username ){

                redirect('admin/users/profile');

            }else{

                redirect('admin/users/edit/'.$username, $this->data);

            }

        }
        else
        {
            $identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

            $change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

            if ($change)
            { //if the password was successfully changed
                $this->session->set_flashdata('success_msg', $this->ion_auth->messages());
                $this->auth_model->logout();
            }
            else
            {
                $this->session->set_flashdata('error_msg', $this->ion_auth->errors());
               // redirect('auth/change_password', 'refresh');

                if($this->session->userdata('username') == $username ){

                    redirect('admin/users/profile');

                }else{

                    redirect('admin/users/edit/'.$username, $this->data);

                }
            }
        }
    }

    function update(){

        $username=$this->input->post('username');
        $this->form_validation->set_rules('first_name', 'First name', 'required');
        $this->form_validation->set_rules('last_name', 'Last name', 'required');
        $this->form_validation->set_rules('location_id', 'Location name', 'required');

        if ($this->form_validation->run() == false)
        {
            if($this->session->userdata('username') == $username ){
                $this->profile();
            }else{
                $this->edit($username);
            }

        }else{

            $this->saveData();
            $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
            if($this->session->userdata('username') == $username ){
                redirect('admin/users/profile');
            }else{
                redirect('admin/users/edit/'.$username);
            }

        }

    }

    private function saveData()
    {

        $data = $this->input->post();
        if (!empty($data['username'])) {
            $this->users_model->update($data, $data['id']);
        }

    }

    public function status($username)
    {

        $this->users_model->statusChange($username);
        $this->session->set_flashdata('success_msg',$this->lang->line('update_msg'));
        $this->redirectToHome("listing");

    }


    public function remove($id)
    {
        $this->data['category'] = $this->users_model->delete($id);
        $this->redirectToHome("listing");

    }

    public function checkUserName($title){


        $data = $this->input->post();
        return  $this->users_model->checkusers($data['id'],$title);


    }


    private function redirectToHome($redirect = NULL)
    {
        redirect('admin/users/'.$redirect);
    }

}