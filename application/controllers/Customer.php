<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
	/*	
	   *	Developed by: DBCinfotech
       *	Date	: 20 November, 2015
       *	Bizpro Stock Manager ERP
       *	http://codecanyon.net/user/dbcinfotech
    */

class Customer extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		/*cache control*/
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}

	// DECLARATION: DEFAULT FUNCTION
	public function index()
	{
		$this->load->view('backend/index');
	}

	// DECLARATION: CUSTOMER DASHBOARD
	function dashboard()
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = translate('dashboard');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE PRODUCTS
	function product($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'product';
		$page_data['page_title'] = translate('products');
		$page_data['products']   = $this->db->get('product')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE ORDERS
	function order($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');

		if ($param1 == 'create') {
			$order_id = $this->crud_model->new_order_from_customer();
			// send mail to admin on creatinjg the order
			$get_customer_id	=	$this->db->get_where('order' , array(
				'order_id' => $order_id
			))->row()->customer_id;
			$customer_name	=	$this->db->get_where('customer' , array(
				'customer_id' => $get_customer_id
			))->row()->name;
			$order_number	=	$this->db->get_where('order' , array(
				'order_id' => $order_id
			))->row()->order_number;
			$email_from	=	$this->db->get_where('customer' , array(
				'customer_id' => $get_customer_id
			))->row()->email;
			$this->email_model->order_creating_email_by_customer($email_from, $customer_name, $order_number, 'Pending');
			redirect(base_url() . 'index.php?customer/order_invoice_view/' . $order_number , 'refresh');
		}
	}

	// DECLARATION: NEW ORDER
	function order_add($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'order_add';
		$page_data['page_title'] = translate('create_new_order');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: GET THE PRODUCT INFORMATIONS FOR ORDER ON AJAX CALL
	function get_product_for_order($input_id , $total_number)
	{
		$info	=	$this->db->get_where('product' , array(
								'product_id' => $input_id
							))->row();

		echo '<tr id="entry_row_' . $total_number . '">
				<td id="serial_' . $total_number . '">' . $total_number . '</td>
				<td>' . $info->serial_number . '</td>
				<td>' . $info->name . ' 
					<input type="hidden" name="product_id[]" value="' . $info->product_id . '"
						id="single_entry_product_id_' . $total_number . '">
				</td>
				<td>
					<input type="number" name="quantity[]" value="1" min="1"
						id="single_entry_quantity_' . $total_number . '"
							onkeyup="calculate_single_entry_sum(' . $total_number . ')"
								onclick="calculate_single_entry_sum(' . $total_number . ')">
				</td>
				<td>
					<input type="number" name="selling_price[]" value="' . $info->selling_price . '"
						id="single_entry_selling_price_' . $total_number . '" readonly>
				</td>
				<td id="single_entry_total_' . $total_number . '">' . $info->selling_price . '</td>
				<td>
					<i class="fa fa-trash" onclick="delete_row(' . $total_number . ')"
						id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
				</td>
			</tr>';
	}

	// DECLARATION: VIEW ORDER INVOICE
	function order_invoice_view($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']    = 'order_invoice_view';
		$page_data['order_number'] =	$param1;
		$page_data['page_title']   =  translate('order_invoice');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: ORDER HISTORY OF CUSTOMER
	function order_history()
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'order_history';
		$page_data['page_title'] =  translate('order_history');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: PURCHASE HISTORY OF CUSTOMER
	function purchase_history()
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'purchase_history';
		$page_data['page_title'] =  translate('purchase_history');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: PURCHASE INVOICE VIEW
	function purchase_invoice_view($param1 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']    = 'purchase_invoice_view';
		$page_data['invoice_code'] =	$param1;
		$page_data['page_title']   =  translate('purchase_invoice');
		$this->load->view('backend/index', $page_data);
	}	

	// DECLARATION: PRIVATE MESSAGING
	function message($messgae_thread_code = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']           = 'message';
		$page_data['page_title']          = translate('private_messaging');
		$page_data['message_thread_code'] = $messgae_thread_code;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SEND A NEW MESSAGE TO ADMIN
	function message_new($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'send_new_message') {
			$new_message_thread_code = $this->crud_model->send_new_message();
			$this->session->set_flashdata('flash_message', translate('message_sent'));
			// MAIL SENDING TO ADMIN
			$sender_account_type = $this->session->userdata('login_type');
			$sender_id           = $this->session->userdata('user_id');
			$email_from          = $this->db->get_where($sender_account_type, array(
				$sender_account_type . '_id' => $sender_id
			))->row()->email;
			$this->email_model->message_notification_email_sender_user($sender_account_type, $email_from);
			redirect(base_url() . 'index.php?customer/message_read/' . $new_message_thread_code, 'refresh');
		}
		$page_data['page_name']           = 'message_new';
		$page_data['page_title']          = translate('messaging');
		$page_data['message_thread_code'] = $param2;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: READ MESSAGES
	function message_read($message_thread_code)
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']           = 'message_read';
		$page_data['page_title']          = translate('read_messages');
		$page_data['message_thread_code'] = $message_thread_code;
		$this->load->view('backend/index', $page_data);
	}

	//DECLARATION: REPLY A MESSAGE
	function message_reply($message_thread_code)
	{
		$this->crud_model->send_reply_message($message_thread_code);
		$this->session->set_flashdata('flash_message', translate('message_sent'));
		// MAIL SENDING TO ADMIN
		$sender_account_type = $this->session->userdata('login_type');
		$sender_id           = $this->session->userdata('user_id');
		$email_from          = $this->db->get_where($sender_account_type, array(
			$sender_account_type . '_id' => $sender_id
		))->row()->email;
		$this->email_model->message_notification_email_sender_user($sender_account_type, $email_from);
		redirect(base_url() . 'index.php?customer/message_read/' . $message_thread_code, 'refresh');
	}

	// DECLARATION: customer PROFILE SETTINGS
	function profile_settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('customer_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'update') {
			$data['name']  = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['about'] = $this->input->post('about');
			$this->db->where('customer_id', $this->session->userdata('user_id'));
			$this->db->update('customer', $data);
			// UPLOAD IMAGE FILE
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/customer_image/' . $this->session->userdata('user_id') . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?customer/profile_settings', 'refresh');
		}
		// PASSWORD UPDATE
		if ($param1 == 'change_password') {
			$data['previous_password'] = sha1($this->input->post('previous_password'));
			$data['new_password']      = sha1($this->input->post('new_password'));
			$data['confirm_password']  = sha1($this->input->post('confirm_password'));
			$existing_password         = $this->db->get_where('customer', array(
				'customer_id' => $this->session->userdata('user_id')
			))->row()->password;
			if ($existing_password == $data['previous_password'] && $data['new_password'] == $data['confirm_password']) {
				$this->db->where('customer_id', $this->session->userdata('user_id'));
				$this->db->update('customer', array(
					'password' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', translate('informations_updated'));
			} else {
				$this->session->set_flashdata('flash_message', translate('password_mismatch'));
			}
			redirect(base_url() . 'index.php?customer/profile_settings', 'refresh');
		}
		$page_data['page_name']  = 'profile_settings';
		$page_data['page_title'] = 'Profile';
		$this->load->view('backend/index', $page_data);
	}
}

/* End of file Customer.php */
/* Location: ./application/controllers/Customer.php */
