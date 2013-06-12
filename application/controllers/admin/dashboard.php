<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard extends Crud_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth');
        $this->layout->setLayout('layout_admin');


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
        $identity = $this->config->item('identity', 'ion_auth');

        $this->session->userdata('id');

//print_r($this->ion_auth->get_users_array());
        /*

        This code use for test another domain path return data function.

        //$this->data['api'] = file_get_contents('http://api.phillips.local/home');
        $post = array('username' => 'shafiq', 'password' => '123456', 'email' => 'shafiq@rightbrainsolution.com');
        $ch = curl_init('http://api.phillips.local/home');
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $this->data['api'] = curl_exec($ch);*/

        //var_dump($this->data['api']); die;
        $this->data['active']='dashboard';
        $this->layout->view('admin/dashboard', $this->data);

    }

    function theme(){

        $this->data['active']='Admin Theme';
        $this->layout->view('admin/theme_html', $this->data);

    }


}