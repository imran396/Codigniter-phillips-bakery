<?php defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! class_exists('Controller'))
{
	class Controller extends CI_Controller {}
}

class Auth extends Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('ion_auth');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('url');

        //$this->output->enable_profiler(TRUE);
	}

	//redirect if needed, otherwise display the user list
	function index()

	{



        if (!$this->ion_auth->logged_in())
		{
			//redirect them to the login page
			redirect('login');
		}
		elseif (!$this->ion_auth->is_admin())
		{

			//redirect them to the home page because they must be an administrator to view this
			redirect($this->config->item('base_url'), 'refresh');
		}
		else
		{
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			$this->data['users'] = $this->ion_auth->get_users_array();

			$this->load->view('auth/index', $this->data);
		}
	}

	//log the user in
	function login()
	{
        $this->data['title'] = "Login";
        $this->data['query'] = $this->db->select('*')->where(array('status'=>1))->order_by('ordering','asc')->get('locations')->result();
		if ($this->ion_auth->logged_in())
		{
			//already logged in so no need to access this page
			redirect($this->config->item('base_url'), 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('username', 'User Name', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required');

       // exit;
		if ($this->form_validation->run() == true)
		{ //check to see if the user is logging in
			//check for "remember me"
			$remember = (bool) $this->input->post('remember');
            //exit;
			if ($this->ion_auth->login($this->input->post('username'), $this->input->post('password'), $remember))
			{ //if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
               $user_id =   $this->session->userdata('user_id');
               $empolyee_code = $this->logs_model->getEmployeeCode($user_id);
               $this->session->set_userdata(array('empolyee_code'=> $empolyee_code));

                $log = array(
                    'employee_id' => $empolyee_code,
                    'audit_name' => 'login',
                    'description' => $this->input->post('username'),
                );
                $this->logs_model->insertAuditLog($log);

                redirect($this->config->item('base_url'), 'refresh');
			}
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->load->view('auth/login', $this->data);
		}
	}

    function qrlogin(){

        $employee_id = $this->input->post('employee_id');
        if($this->ion_auth_model->qr_login($employee_id) == TRUE){
                $user_id =   $this->session->userdata('user_id');
                $empolyee_code = $this->logs_model->getEmployeeCode($user_id);
                $this->session->set_userdata(array('empolyee_code'=> $empolyee_code));

                $log = array(
                    'employee_id' => $empolyee_code,
                    'audit_name' => 'login',
                    'description' => $this->input->post('username'),
                );
                $this->logs_model->insertAuditLog($log);

                redirect($this->config->item('base_url'));

        }else{

            $this->session->set_flashdata('message', "sdfgfgdfgdfgdfgdf");
            redirect('auth'); //use redirects instead of loading views for compatibility with MY_Controller libraries
        }

    }

	//log the user out
	function logout()
	{


        $this->data['title'] = "Logout";
        $session_data =  $this->session->all_userdata();
        $log = array(
            'employee_id' => $session_data['empolyee_code'],
            'audit_name' => 'logout',
            'description' => $session_data['username'],
        );

		//log the user out
		$logout = $this->ion_auth->logout();

        if($logout){
            $this->logs_model->insertAuditLog($log);
        }

		//redirect them back to the page they came from
		redirect('auth', 'refresh');
	}

	//change password
	function change_password()
	{
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
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['old_password'] = array('name' => 'old',
				'id' => 'old',
				'type' => 'password',
			);
			$this->data['new_password'] = array('name' => 'new',
				'id' => 'new',
				'type' => 'password',
			);
			$this->data['new_password_confirm'] = array('name' => 'new_confirm',
				'id' => 'new_confirm',
				'type' => 'password',
			);
			$this->data['user_id'] = array('name' => 'user_id',
				'id' => 'user_id',
				'type' => 'hidden',
				'value' => $user->id,
			);

			//render
			$this->load->view('auth/change_password', $this->data);
		}
		else
		{
			$identity = $this->session->userdata($this->config->item('identity', 'ion_auth'));

			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));

			if ($change)
			{ //if the password was successfully changed
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				$this->logout();
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/change_password', 'refresh');
			}
		}
	}

	//forgot password
	function forgot_password()
	{
		//get the identity type from config and send it when you load the view
		$identity = $this->config->item('identity', 'ion_auth');
		$identity_human = ucwords(str_replace('_', ' ', $identity)); //if someone uses underscores to connect words in the column names
		$this->form_validation->set_rules($identity, $identity_human, 'required');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->data[$identity] = array('name' => $identity,
				'id' => $identity, //changed
			);
			//set any errors and display the form
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->data['identity'] = $identity; $this->data['identity_human'] = $identity_human;
			$this->load->view('auth/forgot_password', $this->data);
		}
		else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post($identity));

			if ($forgotten)
			{ //if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('auth/login', 'refresh'); //we should display a confirmation page here instead of the login page
			}
			else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('auth/forgot_password', 'refresh');
			}
		}
	}

	//reset password - final step for forgotten password
	public function reset_password($code)
	{
		$reset = $this->ion_auth->forgotten_password_complete($code);

		if ($reset)
		{  //if the reset worked then send them to the login page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth/login', 'refresh');
		}
		else
		{ //if the reset didnt work then send them back to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}

	//activate the user
	function activate($id, $code=false)
	{
		if ($code !== false)
			$activation = $this->ion_auth->activate($id, $code);
		else if ($this->ion_auth->is_admin())
			$activation = $this->ion_auth->activate($id);


		if ($activation)
		{
			//redirect them to the auth page
			$this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('auth', 'refresh');
		}
		else
		{
			//redirect them to the forgot password page
			$this->session->set_flashdata('message', $this->ion_auth->errors());
			redirect('auth/forgot_password', 'refresh');
		}
	}

	//deactivate the user
	function deactivate($id = NULL)
	{
		// no funny business, force to integer
		$id = (int) $id;
		
		$this->form_validation->set_rules('confirm', 'confirmation', 'required');
		$this->form_validation->set_rules('id', 'user ID', 'required|is_natural');

		if ($this->form_validation->run() == FALSE)
		{
			// insert csrf check
			$this->data['csrf'] = $this->_get_csrf_nonce();
			$this->data['user'] = $this->ion_auth->get_user_array($id);
			$this->load->view('auth/deactivate_user', $this->data);
		}
		else
		{
			// do we really want to deactivate?
			if ($this->input->post('confirm') == 'yes')
			{
				// do we have a valid request?
				if ($this->_valid_csrf_nonce() === FALSE || $id != $this->input->post('id'))
				{
					show_404();
				}

				// do we have the right userlevel?
				if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin())
				{
					$this->ion_auth->deactivate($id);
				}
			}

			//redirect them back to the auth page
			redirect('auth', 'refresh');
		}
	}

	//create a new user
	function create_user()
	{
		$this->data['title'] = "Create User";

		if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

		//validate form input
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('first_name', 'First Name', 'required|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required');
		$this->form_validation->set_rules('group_id', 'Group ', 'required');
		$this->form_validation->set_rules('status');

		if ($this->form_validation->run() == true)
		{
			$username = strtolower($this->input->post('username'));
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$additional_data = array(
                'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'group_id' => $this->input->post('group_id'),
				'status' => $this->input->post('status')
			);
		}
		if ($this->form_validation->run() == true && $this->ion_auth->register($username, $password, $email, $additional_data))
		{ //check to see if we are creating the user
			//redirect them back to the admin page
            $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
			redirect('admin/users', 'refresh');
		}
		else
		{ //display the create user form
			//set the flash data error message if there is one
			$this->data['success_msg'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['first_name'] = array('name' => 'first_name',
				'id' => 'first_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('first_name'),
			);
			$this->data['last_name'] = array('name' => 'last_name',
				'id' => 'last_name',
				'type' => 'text',
				'value' => $this->form_validation->set_value('last_name'),
			);
			$this->data['email'] = array('name' => 'email',
				'id' => 'email',
				'type' => 'text',
				'value' => $this->form_validation->set_value('email'),
			);
			$this->data['company'] = array('name' => 'company',
				'id' => 'company',
				'type' => 'text',
				'value' => $this->form_validation->set_value('company'),
			);
			$this->data['phone1'] = array('name' => 'phone1',
				'id' => 'phone1',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone1'),
			);
			$this->data['phone2'] = array('name' => 'phone2',
				'id' => 'phone2',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone2'),
			);
			$this->data['phone3'] = array('name' => 'phone3',
				'id' => 'phone3',
				'type' => 'text',
				'value' => $this->form_validation->set_value('phone3'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password'),
			);
			$this->data['password_confirm'] = array('name' => 'password_confirm',
				'id' => 'password_confirm',
				'type' => 'password',
				'value' => $this->form_validation->set_value('password_confirm'),
			);
			//$this->load->view('auth/create_user', $this->data);
           // $this->session->set_flashdata('success_msg',$this->lang->line('insert_msg'));
            redirect('admin/users', 'refresh');
           // $this->layout->view('admin/users/users_view', $this->data);
		}
	}

	function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	function _valid_csrf_nonce()
	{
		if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
				$this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

}
