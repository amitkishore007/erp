<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
	
	/*	
	   *	Developed by: DBCinfotech
       *	Date	: 20 November, 2015
       *	Bizpro Stock Manager ERP
       *	http://codecanyon.net/user/dbcinfotech
    */

class Employee extends CI_Controller
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

	// DECLARATION: EMPLOYEE DASHBOARD
	function dashboard()
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = translate('dashboard');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: NEW PURCHASE
	function purchase_add($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 1)
			redirect(base_url() . 'index.php?employee/dashboard');
		if ($param1 == 'create') {
			$purchase_id	=	$this->crud_model->new_purchase();
			$purchase_code  =   $this->db->get_where('purchase' , array(
				'purchase_id' => $purchase_id
			))->row()->purchase_code;
			$this->session->set_flashdata('flash_message', translate('new_purchase_created'));
			redirect(base_url() . 'index.php?employee/purchase_invoice_view/' . $purchase_code , 'refresh');
		}
		$page_data['page_name']  = 'purchase_add';
		$page_data['page_title'] = translate('new_purchase');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: GET THE PRODUCT INFORMATIONS FOR PURCHASE ON AJAX CALL
	function get_product_for_purchase($input_product_id , $total_number)
	{
		$product_info	=	$this->db->get_where('product' , array(
								'product_id' => $input_product_id
							))->row();

		echo '<tr id="entry_row_' . $total_number . '">
				<td id="serial_' . $total_number . '">' . $total_number . '</td>
				<td>' . $product_info->serial_number . '</td>
				<td>' . $product_info->name . ' 
					<input type="hidden" name="product_id[]" value="' . $product_info->product_id . '"
						id="single_entry_product_id_' . $total_number . '">
				</td>
				<td>
					<input type="number" name="quantity[]" value="1" min="1"
						id="single_entry_quantity_' . $total_number . '"
							onkeyup="calculate_single_entry_sum(' . $total_number . ')"
								onclick="calculate_single_entry_sum(' . $total_number . ')">
				</td>
				<td>
					<input type="number" name="purchase_price[]" value="' . $product_info->purchase_price . '" min="1"
						id="single_entry_purchase_price_' . $total_number . '"
							onkeyup="calculate_single_entry_sum(' . $total_number . ')"
								onclick="calculate_single_entry_sum(' . $total_number . ')">
				</td>
				<td id="single_entry_total_' . $total_number . '">' . $product_info->purchase_price . '</td>
				<td>
					<i class="fa fa-trash" onclick="delete_row(' . $total_number . ')"
						id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
				</td>
			</tr>';
	}

	//DECLARATION: PURCHASE INVOICE VIEW
	function purchase_invoice_view($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 1)
			redirect(base_url() . 'index.php?employee/dashboard');
		$page_data['purchase_code'] = $param1;
		$page_data['page_name']     = 'purchase_invoice_view';
		$page_data['page_title']    = translate('purchase_invoice');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: PURCHASE HISTORY 
	function purchase_history()
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 1)
			redirect(base_url() . 'index.php?employee/dashboard');
		$this->db->order_by('purchase_id', 'desc');
		$page_data['purchases']  = $this->db->get('purchase')->result_array();
		$page_data['page_name']  = 'purchase_history';
		$page_data['page_title'] = translate('purchase_history');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SALE PRODUCTS
	function sale_add($param1 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 2)
			redirect(base_url() . 'index.php?employee/dashboard');

		if ($param1 == 'do_add') {
			$invoice_id     = $this->crud_model->add_new_sale();
			$invoice_code	=	$this->db->get_where('invoice' , array(
				'invoice_id' => $invoice_id
			))->row()->invoice_code;
			$this->session->set_flashdata('flash_message', translate('sale_added'));
			redirect(base_url() . 'index.php?employee/sale_invoice_view/' . $invoice_code , 'refresh');
		}
		$page_data['page_name']  = 'sale_add';
		$page_data['page_title'] = translate('create_new_sale');
		$this->load->view('backend/index', $page_data);
	}
	// DECLARATION: VIEW SALE INVOICE 
	function sale_invoice_view($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 2)
			redirect(base_url() . 'index.php?employee/dashboard');
		$page_data['invoice_code'] = $param1;
		$page_data['page_name']    = 'sale_invoice_view';
		$page_data['page_title']   = translate('sale_invoice');
		$this->load->view('backend/index', $page_data);
	}
	// DECLARATION: SALE INVOICES
	function sale_invoice($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 2)
			redirect(base_url() . 'index.php?employee/dashboard');
		$page_data['page_name']  = 'sale_invoice';
		$page_data['page_title'] = translate('sale_invoices');
		$this->db->order_by('invoice_id', 'desc');
		$page_data['invoices'] = $this->db->get('invoice')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	//DECLARATION: TAKE SALE PAYMENT ON DUE
	function take_sale_payment($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 2)
			redirect(base_url() . 'index.php?employee/dashboard');
		$page_data['invoice_code'] = $param1;
		$page_data['page_name']    = 'take_sale_payment';
		$page_data['page_title']   = translate('take_payment');
		$this->load->view('backend/index', $page_data);
	}

	function sale_payment($param1 = '' , $param2 = '' , $param3 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$get_employee_type	=	$this->db->get_where('employee' , array(
			'employee_id' => $this->session->userdata('user_id')
		))->row()->type;
		if ($get_employee_type == 2)
			redirect(base_url() . 'index.php?employee/dashboard');
		if ($param1 == 'take_payment') {
			$data['due']	=	$this->input->post('amount');
			$this->db->where('invoice_id' , $param2);
			$this->db->set('due', 'due - ' . $data['due'], FALSE);
			$this->db->update('invoice');

			$data2['amount']      =		$this->input->post('amount');
			$data2['timestamp']   = 	strtotime($this->input->post('timestamp'));
			$data2['method']      =		$this->input->post('method');
			$data2['customer_id'] =		$this->input->post('customer_id');
			$data2['invoice_id']  =		$this->input->post('invoice_id');
			$data2['type']        =		'income';
			$invoice_code		  =     $this->db->get_where('invoice' , array(
				'invoice_id' => $data2['invoice_id']
			))->row()->invoice_code;
			$this->db->insert('payment' , $data2);
			$this->session->set_flashdata('flash_message', translate('payment_taken'));
			redirect(base_url() . 'index.php?employee/sale_invoice_view/' . $invoice_code , 'refresh');
		}
	}

	// DECLARATION: GET THE PRODUCT LIST 
	function get_sale_product_list($type, $category_id)
	{
		if ($type == 'category')
			$products = $this->db->get_where('product', array(
				'category_id' => $category_id
			))->result_array();
		if ($type == 'sub_category')
			$products = $this->db->get_where('product', array(
				'sub_category_id' => $category_id
			))->result_array();
		foreach ($products as $row) {
			echo '<p onclick="add_product(' . $row['product_id'] . ')" style="cursor: pointer;">
					<span class="fa-stack fa-2x text-success">
						<i class="fa fa-circle-o fa-stack-2x"></i>
						<i class="fa fa-plus fa-stack-1x"></i>
					</span>' . $row['name'] . '' . ' '. '(' . $row['stock_quantity'] . ') 
				</p>';
		}
	}

	// DECLARATION: GET THE SUB CATEGORY LIST OF PRODUCTS
	function get_sub_category_list($category_id)
	{
		echo '<div class="form-group">
				<div class="col-md-12 col-sm-12">
				<select onchange="get_product(\'sub_category\' , this.value)" class="form-control selectpicker"
					name="sub_category_id" data-size="10" data-live-search="true" data-style="btn-default">
					<option value="">' . translate('select_sub_category') . '</option>';

		$sub_categories = $this->db->get_where('sub_category', array(
			'category_id' => $category_id
		))->result_array();
		foreach ($sub_categories as $row):
			echo '<option value="' . $row['sub_category_id'] . '">' . $row['name'] . '</option>';
		endforeach;
		echo '</select></div></div>';
	}

	// DECLARATION: GET SELECTED PRODUCTS TO BE SOLD
	function get_selected_product($input_type, $input_id, $total_number)
	{
		if ($input_type == 'mouse') {
			$product_info = $this->db->get_where('product', array(
				'product_id' => $input_id
			))->row();
		} else if ($input_type == 'barcode') {
			$product_info = $this->db->get_where('product', array(
				'serial_number' => $input_id
			))->row();
		}
		echo '<tr id="entry_row_' . $total_number . '">
				<td id="serial_' . $total_number . '">' . $total_number . '</td>
				<td>' . $product_info->serial_number . '</td>
				<td>' . $product_info->name . ' 
					<input type="hidden" name="product_id[]" value="' . $product_info->product_id . '"
						id="single_entry_product_id_' . $total_number . '">
				</td>
				<td>
					<input type="number" name="total_number[]" value="1" min="1"
						id="single_entry_quantity_' . $total_number . '"
							onkeyup="calculate_single_entry_total(' . $total_number . ')"
								onclick="calculate_single_entry_total(' . $total_number . ')">
				</td>
				<td>
					<input type="number" name="selling_price[]" value="' . $product_info->selling_price . '" min="1"
						id="single_entry_selling_price_' . $total_number . '"
							onkeyup="calculate_single_entry_total(' . $total_number . ')"
								onclick="calculate_single_entry_total(' . $total_number . ')">
				</td>
				<td id="single_entry_total_' . $total_number . '">' . $product_info->selling_price . '</td>
				<td>
					<i class="fa fa-trash" onclick="remove_row(' . $total_number . ')"
						id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
				</td>
			</tr>';
	}

	// DECLARATION: GET SELECTED CUSTOMER DISCOUNT PERCENTAGE
	function get_customer_discount_percentage($customer_id)
	{
		$customer_discount = $this->db->get_where('customer' , array(
			'customer_id' => $customer_id
		))->row()->discount_percentage;
		echo '<input class="form-control text-right" type="text" name="discount_percentage" 
				id="discount_percentage" value="' . $customer_discount . '" onkeyup="calculate_grand_total()"
					data-parsley-required="true">';
	}

	// DECLARATION: PRIVATE MESSAGING
	function message($messgae_thread_code = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']           = 'message';
		$page_data['page_title']          = translate('private_messaging');
		$page_data['message_thread_code'] = $messgae_thread_code;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SEND A NEW MESSAGE TO ADMIN
	function message_new($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
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
			redirect(base_url() . 'index.php?employee/message_read/' . $new_message_thread_code, 'refresh');
		}
		$page_data['page_name']           = 'message_new';
		$page_data['page_title']          = translate('messaging');
		$page_data['message_thread_code'] = $param2;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: READ MESSAGES
	function message_read($message_thread_code)
	{
		if ($this->session->userdata('employee_login') != 1)
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
		redirect(base_url() . 'index.php?employee/message_read/' . $message_thread_code, 'refresh');
	}

	// DECLARATION: employee PROFILE SETTINGS
	function profile_settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('employee_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'update') {
			$data['name']  = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['about'] = $this->input->post('about');
			$this->db->where('employee_id', $this->session->userdata('user_id'));
			$this->db->update('employee', $data);
			// UPLOAD IMAGE FILE
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/employee_image/' . $this->session->userdata('user_id') . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?employee/profile_settings', 'refresh');
		}
		// PASSWORD UPDATE
		if ($param1 == 'change_password') {
			$data['previous_password'] = sha1($this->input->post('previous_password'));
			$data['new_password']      = sha1($this->input->post('new_password'));
			$data['confirm_password']  = sha1($this->input->post('confirm_password'));
			$existing_password         = $this->db->get_where('employee', array(
				'employee_id' => $this->session->userdata('user_id')
			))->row()->password;
			if ($existing_password == $data['previous_password'] && $data['new_password'] == $data['confirm_password']) {
				$this->db->where('employee_id', $this->session->userdata('user_id'));
				$this->db->update('employee', array(
					'password' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', translate('informations_updated'));
			} else {
				$this->session->set_flashdata('flash_message', translate('password_mismatch'));
			}
			redirect(base_url() . 'index.php?employee/profile_settings', 'refresh');
		}
		$page_data['page_name']  = 'profile_settings';
		$page_data['page_title'] = 'Profile';
		$this->load->view('backend/index', $page_data);
	}
}

/* End of file Employee.php */
/* Location: ./application/controllers/Employee.php */
