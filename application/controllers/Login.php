<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	/*	
	   *	Developed by: DBCinfotech
       *	Date	: 20 November, 2015
       *	Bizpro Stock Manager ERP
       *	http://codecanyon.net/user/dbcinfotech
    */

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	// DECLARATION: DEFAULT FUNCTION REDIRECTS TO LOGIN PAGE IF NO USER IS LOGGED IN
	public function index()
	{
		if ($this->session->userdata('login_type') == 'admin')
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
		if ($this->session->userdata('login_type') == 'customer')
			redirect(base_url() . 'index.php?customer/dashboard', 'refresh');
		if ($this->session->userdata('login_type') == 'employee')
			redirect(base_url() . 'index.php?employee/dashboard', 'refresh');
		$this->load->view('backend/login');
	}

	// DECLARATION: PERFORMS LOGIN
	function do_login()
	{
		$email    = $this->input->post('email');
		$password = sha1($this->input->post('password'));
		// AUTHENTICATE ADMIN LOGIN
		$query    = $this->db->get_where('admin', array(
			'email' => $email,
			'password' => $password
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('admin_login', '1');
			$this->session->set_userdata('login_type', 'admin');
			$this->session->set_userdata('user_id', $row->admin_id);
			$this->session->set_userdata('name', $row->name);
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
		}
		// AUTHENTICATE CUSTOMER LOGIN
		$query = $this->db->get_where('customer', array(
			'email' => $email,
			'password' => $password
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('customer_login', '1');
			$this->session->set_userdata('login_type', 'customer');
			$this->session->set_userdata('user_id', $row->customer_id);
			$this->session->set_userdata('name', $row->name);
			redirect(base_url() . 'index.php?customer/dashboard', 'refresh');
		}
		// AUTHENTICATE EMPLOYEE LOGIN
		$query = $this->db->get_where('employee', array(
			'email' => $email,
			'password' => $password
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$this->session->set_userdata('employee_login', '1');
			$this->session->set_userdata('login_type', 'employee');
			$this->session->set_userdata('user_id', $row->employee_id);
			$this->session->set_userdata('name', $row->name);
			redirect(base_url() . 'index.php?employee/dashboard', 'refresh');
		} else {
			$this->session->set_flashdata('flash_message', 'Incorrect email or password');
			redirect(base_url() . 'index.php?login', 'refresh');
		}
	}

	// DECLARATION: LOADS THE VIEW FOR FORGOT PASSWORD PAGE
	function forgot_password()
	{
		$this->load->view('backend/forgot_password');
	}

	// DECLARATION: RESETS PASSWORD
	function reset_password()
	{
		$email                  = $this->input->post('email');
		$reset_account_type     = '';
		// RESETTING THE PASSWORD
		$new_password           = substr(md5(rand(100000000, 20000000000)), 0, 7);
		$new_password_encrypted = sha1($new_password);
		// CHECKING CREDENTIALS FOR ADMIN
		$query_admin            = $this->db->get_where('admin', array(
			'email' => $email
		));
		if ($query_admin->num_rows() > 0) {
			$reset_account_type = 'admin';
			$this->db->where('email', $email);
			$this->db->update('admin', array(
				'password' => $new_password_encrypted
			));
			$this->session->set_flashdata('flash_message', 'New password sent to your email');
			// SENDING MAIL TO ADMIN WITH NEW PASSWORD
			$email_to     = $email;
			$new_password = $new_password;
			$this->email_model->reset_password_email($new_password, $email_to);
			redirect(base_url() . 'index.php?login');
		}
		// CHECKING CREDENTIALS FOR CUSTOMERS
		$query_customer = $this->db->get_where('customer', array(
			'email' => $email
		));
		if ($query_customer->num_rows() > 0) {
			$reset_account_type = 'customer';
			$this->db->where('email', $email);
			$this->db->update('customer', array(
				'password' => $new_password_encrypted
			));
			$this->session->set_flashdata('flash_message', 'New password sent to your email');
			// SENDING MAIL TO CUSTOMER WITH NEW PASSWORD
			$email_to     = $email;
			$new_password = $new_password;
			$this->email_model->reset_password_email($new_password, $email_to);
			redirect(base_url() . 'index.php?login');
		}
		// CHECKING CREDENTIALS FOR EMPLOYEES
		$query_employee = $this->db->get_where('employee', array(
			'email' => $email
		));
		if ($query_employee->num_rows() > 0) {
			$reset_account_type = 'employee';
			$this->db->where('email', $email);
			$this->db->update('employee', array(
				'password' => $new_password_encrypted
			));
			$this->session->set_flashdata('flash_message', 'New password sent to your email');
			// SENDING MAIL TO EMPLOYEE WITH NEW PASSWORD
			$email_to     = $email;
			$new_password = $new_password;
			$this->email_model->reset_password_email($new_password, $email_to);
			redirect(base_url() . 'index.php?login');
		} else {
			$this->session->set_flashdata('flash_message', 'Incorrect email !!!');
			redirect(base_url() . 'index.php?login/forgot_password', 'refresh');
		}
	}

	// DECLARATION: LOGS OUT THE CURRENT LOGGED IN USER
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url() . 'index.php?login', 'refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
