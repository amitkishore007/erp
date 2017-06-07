<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	/*
	   *	Developed by: DBCinfotech
       *	Date	: 20 November, 2015
       *	Bizpro Stock Manager ERP
       *	http://codecanyon.net/user/dbcinfotech
    */

class Admin extends CI_Controller
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

	// DECLARATION: ADMIN DASHBOARD
	function dashboard()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'dashboard';
		$page_data['page_title'] = translate('dashboard');
		$this->load->view('backend/index', $page_data);
	}


	// DECLARATION: MANAGE CUSTOMER
	function customer($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['customer_code']       = $this->input->post('customer_code');
			$data['name']                = $this->input->post('name');
			$data['email']               = $this->input->post('email');
			$data['password']            = sha1($this->input->post('password'));
			$data['phone']               = $this->input->post('phone');
			$data['address']             = $this->input->post('address');
			$data['gender']              = $this->input->post('gender');
			$data['discount_percentage'] = $this->input->post('discount_percentage');
			$this->db->insert('customer', $data);
			// UPLOAD IMAGE FILE
			$customer_id       = $this->db->insert_id();
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/customer_image/' . $customer_id . '.jpg');
			// MAIL SENDING TO CUSTOMER
			$password_unhashed = $this->input->post('password');
			$email_to          = $data['email'];
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			$this->email_model->account_opening_email('customer', $email_to, $password_unhashed);
			redirect(base_url() . 'index.php?admin/customer', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']                = $this->input->post('name');
			$data['email']               = $this->input->post('email');
			$data['phone']               = $this->input->post('phone');
			$data['address']             = $this->input->post('address');
			$data['gender']              = $this->input->post('gender');
			$data['discount_percentage'] = $this->input->post('discount_percentage');
			$this->db->where('customer_id', $param2);
			$this->db->update('customer', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/customer_image/' . $param2 . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/customer', 'refresh');
		}
		if ($param1 == 'delete') {
			if (file_exists("uploads/customer_image/" . $param2 . ".jpg")) {
				unlink("uploads/customer_image/" . $param2 . ".jpg");
			}
			$this->db->where('customer_id', $param2);
			$this->db->delete('customer');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/customer', 'refresh');
		}
		$page_data['page_name']  = 'customer';
		$page_data['page_title'] = translate('customers');
		$page_data['customers']  = $this->db->get('customer')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE SUPPLIER
	function supplier($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['name']    = $this->input->post('name');
			$data['company'] = $this->input->post('company');
			$data['email']   = $this->input->post('email');
			$data['phone']   = $this->input->post('phone');
			$this->db->insert('supplier', $data);
			// UPLOAD IMAGE FILE
			$supplier_id = $this->db->insert_id();
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/supplier_image/' . $supplier_id . '.jpg');
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/supplier', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']    = $this->input->post('name');
			$data['company'] = $this->input->post('company');
			$data['email']   = $this->input->post('email');
			$data['phone']   = $this->input->post('phone');
			$this->db->where('supplier_id', $param2);
			$this->db->update('supplier', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/supplier_image/' . $param2 . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/supplier', 'refresh');
		}
		if ($param1 == 'delete') {
			if (file_exists("uploads/supplier_image/" . $param2 . ".jpg")) {
				unlink("uploads/supplier_image/ " . $param2 . ".jpg");
			}
			$this->db->where('supplier_id', $param2);
			$this->db->delete('supplier');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/supplier', 'refresh');
		}
		$page_data['page_name']  = 'supplier';
		$page_data['page_title'] = translate('suppliers');
		$page_data['suppliers']  = $this->db->get('supplier')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE PRODUCT CATEGORY
	function product_category($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$this->db->insert('category', $data);
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/product_category', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$this->db->where('category_id', $param2);
			$this->db->update('category', $data);
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/product_category', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('category_id', $param2);
			$this->db->delete('category');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/product_category', 'refresh');
		}
		$page_data['page_name']  = 'product_category';
		$page_data['page_title'] =  translate('product_categories');
		$page_data['categories'] = $this->db->get('category')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE PRODUCT SUB CATEGORY
	function product_sub_category($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$data['category_id'] = $this->input->post('category_id');
			$this->db->insert('sub_category', $data);
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/product_sub_category', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']        = $this->input->post('name');
			$data['description'] = $this->input->post('description');
			$data['category_id'] = $this->input->post('category_id');
			$this->db->where('sub_category_id', $param2);
			$this->db->update('sub_category', $data);
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/product_sub_category', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('sub_category_id', $param2);
			$this->db->delete('sub_category');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/product_sub_category', 'refresh');
		}
		$page_data['page_name']      = 'product_sub_category';
		$page_data['page_title']     =  translate('product_sub_categories');
		$page_data['sub_categories'] = $this->db->get('sub_category')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE PRODUCTS
	function product($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['serial_number']   = $this->input->post('serial_number');
			$data['category_id']     = $this->input->post('category_id');
			$data['sub_category_id'] = $this->input->post('sub_category_id');
			$data['name']            = $this->input->post('name');
			$data['purchase_price']  = $this->input->post('purchase_price');
			$data['selling_price']   = $this->input->post('selling_price');
			$data['note']            = $this->input->post('note');
			$this->db->insert('product', $data);
			// UPLOAD IMAGE FILE
			$product_id = $this->db->insert_id();
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product_image/' . $product_id . '.jpg');
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/product', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['serial_number']   = $this->input->post('serial_number');
			$data['category_id']     = $this->input->post('category_id');
			$data['sub_category_id'] = $this->input->post('sub_category_id');
			$data['name']            = $this->input->post('name');
			$data['purchase_price']  = $this->input->post('purchase_price');
			$data['selling_price']   = $this->input->post('selling_price');
			$data['note']            = $this->input->post('note');
			$this->db->where('product_id', $param2);
			$this->db->update('product', $data);
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/product_image/' . $param2 . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/product', 'refresh');
		}
		if ($param1 == 'delete') {
			if (file_exists("uploads/product_image/" . $param2 . ".jpg")) {
				unlink("uploads/product_image/" . $param2 . ".jpg");
			}
			$this->db->where('product_id', $param2);
			$this->db->delete('product');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/product', 'refresh');
		}
		$page_data['page_name']  = 'product';
		$page_data['page_title'] = translate('products');
		$page_data['products']   = $this->db->get('product')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: CREATE PRODUCT BARCODE
	function product_barcode($param1 = '', $serial_number = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create_barcode') {
			$this->barcode_model->create_barcode($serial_number);
		}
		$page_data['page_name']  = 'product_barcode';
		$page_data['page_title'] = translate('product_barcodes');
		$page_data['products']   = $this->db->get('product')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE DAMAGED PRODUCTS
	function damaged_product($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['product_id'] = $this->input->post('product_id');
			$data['quantity']   = $this->input->post('quantity');
			$data['note']       = $this->input->post('note');
			$data['timestamp']  = strtotime(date("Y-m-d H:i:s"));
			$check 				= $this->input->post('check');
			if ($check == 1) {
				$this->db->where('product_id' , $this->input->post('product_id'));
				$this->db->set('stock_quantity', 'stock_quantity - ' . $data['quantity'], FALSE);
				$this->db->update('product');
			}
			$this->db->insert('damaged_product', $data);
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/damaged_product', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['product_id'] = $this->input->post('product_id');
			$data['quantity']   = $this->input->post('quantity');
			$data['note']       = $this->input->post('note');
			$check 				= $this->input->post('check');
			if ($check == 1) {
				$this->db->where('product_id' , $this->input->post('product_id'));
				$this->db->set('stock_quantity', 'stock_quantity - ' . $data['quantity'], FALSE);
				$this->db->update('product');
			}
			$this->db->where('damaged_product_id', $param2);
			$this->db->update('damaged_product', $data);
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/damaged_product', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('damaged_product_id', $param2);
			$this->db->delete('damaged_product');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/damaged_product', 'refresh');
		}
		$page_data['page_name']        = 'damaged_product';
		$page_data['page_title']       = translate('damaged_products');
		$page_data['damaged_products'] = $this->db->get('damaged_product')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE ORDERS
	function order($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');

		if ($param1 == 'create') {
			$order_id = $this->crud_model->new_order();
			$order_status =	$this->db->get_where('order' , array(
				'order_id' => $order_id
			))->row()->order_status;
			$order_number =	$this->db->get_where('order' , array(
				'order_id' => $order_id
			))->row()->order_number;
			$customer     = $this->db->get_where('order' , array(
				'order_id' => $order_id
			))->row()->customer_id;
			$email_to     =	$this->db->get_where('customer' , array(
				'customer_id' => $customer
			))->row()->email;
			if ($order_status == 0) {
				$this->session->set_flashdata('flash_message', translate('order_added_to_pending'));
				$this->email_model->order_creating_email_by_admin('Pending', $order_number, $email_to);
			} else if ($order_status == 1) {
				$this->session->set_flashdata('flash_message', translate('order_added_to_approved'));
				$this->email_model->order_creating_email_by_admin('Approved', $order_number, $email_to);
			} else {
				$this->session->set_flashdata('flash_message', translate('order_added_to_rejected'));
				$this->email_model->order_creating_email_by_admin('Rejected', $order_number, $email_to);
			}
			redirect(base_url() . 'index.php?admin/order_invoice_view/' . $order_id , 'refresh');
		}

		if ($param1 == 'edit') {
			$data['order_number']        = $this->input->post('order_number');
			$data['customer_id']         = $this->input->post('customer_id');
			$data['modifying_timestamp'] = strtotime($this->input->post('modifying_timestamp'));
			$data['order_status']        = $this->input->post('order_status');
			$data['payment_status']      = $this->input->post('payment_status');
			$data['shipping_address']    = $this->input->post('shipping_address');
			$data['note']                = $this->input->post('note');
            // DECREASE PRODUCT QUANTITY ON APPROVING THE ORDER
            $current_order_status	=	$this->db->get_where('order' , array(
            	'order_number' => $data['order_number']
            ))->row()->order_status;
            if ($data['order_status'] == 1 && $current_order_status != 1) {
	            $get_ordered_products	=	$this->db->get_where('order' , array(
	            	'order_number' => $data['order_number']
	            ))->row()->order_entries;
	            $ordered_products	=	json_decode($get_ordered_products);
	            foreach ($ordered_products as $ordered_product) {
	            	$this->db->where('product_id' , $ordered_product->product_id);
	            	$this->db->set('stock_quantity' , 'stock_quantity -' . $ordered_product->quantity , FALSE);
	            	$this->db->update('product');
	            }
        	}
        	$this->db->where('order_id' , $param2);
            $this->db->update('order' , $data);
            // MAIL SENDING TO CUSTOMER
            $order_number = $data['order_number'];
            $order_status = $data['order_status'];
            $email_to     = $this->db->get_where('customer', array(
                'customer_id' => $data['customer_id']
            ))->row()->email;
            $updated_order_id	=	$this->db->get_where('order' , array(
            	'order_number' => $order_number
            ))->row()->order_id;
            if ($order_status == 0) {
                $this->session->set_flashdata('flash_message', translate('informations_updated'));
                $this->email_model->order_status_change_email('Pending', $order_number, $email_to);
            } elseif ($order_status == 1) {
                $this->session->set_flashdata('flash_message', translate('informations_updated'));
                $this->email_model->order_status_change_email('Approved', $order_number, $email_to);
            } else {
                $this->session->set_flashdata('flash_message', translate('informations_updated'));
                $this->email_model->order_status_change_email('Rejected', $order_number, $email_to);
            }
            redirect(base_url() . 'index.php?admin/orders/' , 'refresh');
		}
	}

	// DECLARATION: ALLS ORDERS
	function orders()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'orders';
		$page_data['page_title'] = translate('all_orders');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: NEW ORDER
	function order_add($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
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
					<input type="number" name="selling_price[]" value="' . $info->selling_price . '" min="1"
						id="single_entry_selling_price_' . $total_number . '"
							onkeyup="calculate_single_entry_sum(' . $total_number . ')"
								onclick="calculate_single_entry_sum(' . $total_number . ')">
				</td>
				<td id="single_entry_total_' . $total_number . '">' . $info->selling_price . '</td>
				<td>
					<i class="fa fa-trash" onclick="delete_row(' . $total_number . ')"
						id="delete_button_' . $total_number . '" style="cursor: pointer;"></i>
				</td>
			</tr>';
	}

	// DECLARATION: EDIT ORDERS
	function order_edit($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'order_edit';
		$page_data['order_id']   =	$param1;
		$page_data['page_title'] =  translate('edit_order');
		$this->load->view('backend/index', $page_data);
	}

	//DECLARATION: TAKE ORDER PAYMENT ON DUE
	function take_order_payment($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['order_id']   = $param1;
		$page_data['page_name']  = 'take_order_payment';
		$page_data['page_title'] = translate('take_payment');
		$this->load->view('backend/index', $page_data);
	}

	function order_payment($param1 = '' , $param2 = '' , $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'take_payment') {
			$data['due']                 =	$this->input->post('amount');
			$data['modifying_timestamp'] =	strtotime($this->input->post('modifying_timestamp'));
			$this->db->where('order_id' , $param2);
			$this->db->set('due', 'due - ' . $data['due'], FALSE);
			$this->db->set('modifying_timestamp' , $data['modifying_timestamp']);
			$this->db->update('order');

			$data2['amount']      =		$this->input->post('amount');
			$data2['timestamp']   = 	strtotime($this->input->post('modifying_timestamp'));
			$data2['method']      =		$this->input->post('method');
			$data2['customer_id'] =		$this->input->post('customer_id');
			$data2['order_id']    =		$this->input->post('order_id');
			$data2['type']        =		'income';
			$this->db->insert('payment' , $data2);
			$this->session->set_flashdata('flash_message', translate('payment_taken'));
			redirect(base_url() . 'index.php?admin/order_invoice_view/' . $data2['order_id']);
		}
	}

	// DECLARATION: VIEW ORDER INVOICE
	function order_invoice_view($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'order_invoice_view';
		$page_data['order_id']   =	$param1;
		$page_data['page_title'] =  translate('order_invoice');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: NEW PURCHASE
	function purchase_add($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$purchase_id	=	$this->crud_model->new_purchase();
			$this->session->set_flashdata('flash_message', translate('new_purchase_created'));
			redirect(base_url() . 'index.php?admin/purchase_invoice_view/' . $purchase_id , 'refresh');
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
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['purchase_id'] = $param1;
		$page_data['page_name']   = 'purchase_invoice_view';
		$page_data['page_title']  = translate('purchase_invoice');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: PURCHASE HISTORY
	function purchase_history()
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$this->db->order_by('purchase_id', 'desc');
		$page_data['purchases']  = $this->db->get('purchase')->result_array();
		$page_data['page_name']  = 'purchase_history';
		$page_data['page_title'] = translate('purchase_history');
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SALE PRODUCTS
	function sale_add($param1 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'do_add') {
			$invoice_id = $this->crud_model->add_new_sale();
			$this->session->set_flashdata('flash_message', translate('sale_added'));
			redirect(base_url() . 'index.php?admin/sale_invoice_view/' . $invoice_id);
		}
		$page_data['page_name']  = 'sale_add';
		$page_data['page_title'] = translate('create_new_sale');
		$this->load->view('backend/index', $page_data);
	}
	// DECLARATION: VIEW SALE INVOICE
	function sale_invoice_view($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['invoice_id'] = $param1;
		$page_data['page_name']  = 'sale_invoice_view';
		$page_data['page_title'] = translate('sale_invoice');
		$this->load->view('backend/index', $page_data);
	}
	// DECLARATION: SALE INVOICES
	function sale_invoice($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']  = 'sale_invoice';
		$page_data['page_title'] = translate('sale_invoices');
		$this->db->order_by('invoice_id', 'desc');
		$page_data['invoices'] = $this->db->get('invoice')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	//DECLARATION: TAKE SALE PAYMENT ON DUE
	function take_sale_payment($param1 = '' , $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['invoice_id'] = $param1;
		$page_data['page_name']  = 'take_sale_payment';
		$page_data['page_title'] = translate('take_payment');
		$this->load->view('backend/index', $page_data);
	}

	function sale_payment($param1 = '' , $param2 = '' , $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
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
			$this->db->insert('payment' , $data2);
			$this->session->set_flashdata('flash_message', translate('payment_taken'));
			redirect(base_url() . 'index.php?admin/sale_invoice_view/' . $data2['invoice_id']);
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

	// DECLARATION: MANAGE EMPLOYEES
	function employee($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['name']     = $this->input->post('name');
			$data['email']    = $this->input->post('email');
			$data['password'] = sha1($this->input->post('password'));
			$data['type']     = $this->input->post('type');
			$data['phone']    = $this->input->post('phone');
			$data['address']  = $this->input->post('address');
			$this->db->insert('employee', $data);
			// UPLOAD IMAGE FILE
			$employee_id       = $this->db->insert_id();
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/employee_image/' . $employee_id . '.jpg');
			// MAIL SENDING TO EMPLOYEE
			$email_to          = $data['email'];
			$password_unhashed = $this->input->post('password');
			$this->email_model->account_opening_email('employee', $email_to, $password_unhashed);
			$this->session->set_flashdata('flash_message', translate('data_added_successfully'));
			redirect(base_url() . 'index.php?admin/employee', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']    = $this->input->post('name');
			$data['email']   = $this->input->post('email');
			$data['type']    = $this->input->post('type');
			$data['phone']   = $this->input->post('phone');
			$data['address'] = $this->input->post('address');
			$this->db->where('employee_id', $param2);
			$this->db->update('employee', $data);
			// UPLOAD IMAGE FILE
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/employee_image/' . $param2 . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/employee', 'refresh');
		}
		if ($param1 == 'delete') {
			if (file_exists("uploads/employee_image/" . $param2 . ".jpg")) {
				unlink("uploads/employee_image/" . $param2 . ".jpg");
			}
			$this->db->where('employee_id', $param2);
			$this->db->delete('employee');
			$this->session->set_flashdata('flash_message', translate('data_deleted'));
			redirect(base_url() . 'index.php?admin/employee', 'refresh');
		}
		$page_data['page_name']  = 'employee';
		$page_data['page_title'] = 'Employees';
		$page_data['employees']  = $this->db->get('employee')->result_array();
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: MANAGE REPORTS
	function report($report_type = 'payment')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($this->input->post('start') != "") {
			$page_data['timestamp_start'] = strtotime($this->input->post('start'));
			$page_data['timestamp_end']   = strtotime($this->input->post('end'));
		} else {
			$page_data['timestamp_start'] = strtotime('-29 days', time());
			$page_data['timestamp_end']   = strtotime(date("m/d/Y"));
		}
		$page_data['report_type'] = $report_type;
		$page_data['page_name']   = 'report_' . $report_type;
		$page_data['page_title']  =  translate('report_of') . ' ' .  $report_type;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: PRIVATE MESSAGING
	function message($messgae_thread_code = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		$page_data['page_name']           = 'message';
		$page_data['page_title']          = translate('private_messaging');
		$page_data['message_thread_code'] = $messgae_thread_code;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SEND NEW MESSAGE
	function message_new($param1 = '', $param2 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'send_new_message') {
			$new_message_thread_code = $this->crud_model->send_new_message();
			$this->session->set_flashdata('flash_message', translate('message_sent'));
			$get_receiver       = $this->db->get_where('message_thread', array(
				'message_thread_code' => $new_message_thread_code
			))->row()->receiver;
			$receiver           = explode('-', $get_receiver);
			$user_to_email_type = $receiver[0];
			$user_to_email_id   = $receiver[1];
			$email_to           = $this->db->get_where($user_to_email_type, array(
				$user_to_email_type . '_id' => $user_to_email_id
			))->row()->email;
			// MAIL SENDING TO RECEIVER
			$this->email_model->message_notification_email_sender_admin($email_to);
			redirect(base_url() . 'index.php?admin/message_read/' . $new_message_thread_code, 'refresh');
		}
		$page_data['page_name']			= 'message_new';
		$page_data['page_title']    	= 'Messaging';
		$page_data['customers']     	= $this->db->get('customer')->result_array();
		$page_data['sales_staff']   	= $this->db->get_where('employee', array(
			'type' => 1
		))->result_array();
		$page_data['purchase_staff']    = $this->db->get_where('employee', array(
			'type' => 2
		))->result_array();
		$page_data['message_thread_code'] = $param2;
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: READ MESSAGES
	function message_read($message_thread_code)
	{
		if ($this->session->userdata('admin_login') != 1)
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
		$get_receiver       = $this->db->get_where('message_thread', array(
			'message_thread_code' => $message_thread_code
		))->row()->receiver;
		$receiver           = explode('-', $get_receiver);
		$user_to_email_type = $receiver[0];
		$user_to_email_id   = $receiver[1];
		$email_to           = $this->db->get_where($user_to_email_type, array(
			$user_to_email_type . '_id' => $user_to_email_id
		))->row()->email;
		// MAIL SENDING TO RECEIVER
		$this->email_model->message_notification_email_sender_admin($email_to);
		redirect(base_url() . 'index.php?admin/message_read/' . $message_thread_code, 'refresh');
	}

	// DECLARATION: ADMIN PROFILE SETTINGS
	function profile_settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'update') {
			$data['name']  = $this->input->post('name');
			$data['email'] = $this->input->post('email');
			$data['about'] = $this->input->post('about');
			$this->db->where('admin_id', $this->session->userdata('user_id'));
			$this->db->update('admin', $data);
			// UPLOAD IMAGE FILE
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('user_id') . '.jpg');
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/profile_settings', 'refresh');
		}
		// PASSWORD UPDATE
		if ($param1 == 'change_password') {
			$data['previous_password'] = sha1($this->input->post('previous_password'));
			$data['new_password']      = sha1($this->input->post('new_password'));
			$data['confirm_password']  = sha1($this->input->post('confirm_password'));
			$existing_password         = $this->db->get_where('admin', array(
				'admin_id' => $this->session->userdata('user_id')
			))->row()->password;
			if ($existing_password == $data['previous_password'] && $data['new_password'] == $data['confirm_password']) {
				$this->db->where('admin_id', $this->session->userdata('user_id'));
				$this->db->update('admin', array(
					'password' => $data['new_password']
				));
				$this->session->set_flashdata('flash_message', translate('informations_updated'));
			} else {
				$this->session->set_flashdata('flash_message', translate('password_mismatch'));
			}
			redirect(base_url() . 'index.php?admin/profile_settings', 'refresh');
		}
		$page_data['page_name']  = 'profile_settings';
		$page_data['page_title'] = 'Profile';
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: TAX SETTINGS
	function tax_settings($param1 = '', $param2 = '') {
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'create') {
			$data['name']				=	$this->input->post('name');
			$data['tax_code']		=	$this->input->post('tax_code');
			$data['percentage']	=	$this->input->post('percentage');
			$data['notes']			=	$this->input->post('notes');
			$this->db->insert('tax', $data);
			$this->session->set_flashdata('flash_message', translate('tax_settings_added'));
			redirect(base_url() . 'index.php?admin/tax_settings', 'refresh');
		}
		if ($param1 == 'edit') {
			$data['name']				=	$this->input->post('name');
			$data['tax_code']		=	$this->input->post('tax_code');
			$data['percentage']	=	$this->input->post('percentage');
			$data['notes']			=	$this->input->post('notes');
			$this->db->where('tax_id', $param2);
			$this->db->update('tax', $data);
			$this->session->set_flashdata('flash_message', translate('tax_settings_updated'));
			redirect(base_url() . 'index.php?admin/tax_settings', 'refresh');
		}
		if ($param1 == 'delete') {
			$this->db->where('tax_id', $param2);
			$this->db->delete('tax');
			$this->session->set_flashdata('flash_message', translate('tax_deleted'));
			redirect(base_url() . 'index.php?admin/tax_settings', 'refresh');
		}
		$page_data['page_name']  = 'tax_settings';
		$page_data['page_title'] = 'Tax Settings';
		$this->load->view('backend/index', $page_data);
	}

	// DECLARATION: SYSTEM SETTINGS
	function settings($param1 = '', $param2 = '', $param3 = '')
	{
		if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'index.php?login');
		if ($param1 == 'update') {
			$data['description'] = $this->input->post('company_name');
			$this->db->where('type', 'company_name');
			$this->db->update('settings', $data);
			$data['description'] = $this->input->post('address');
			$this->db->where('type', 'address');
			$this->db->update('settings', $data);
			$data['description'] = $this->input->post('phone');
			$this->db->where('type', 'phone');
			$this->db->update('settings', $data);
			$data['description'] = $this->input->post('company_email');
			$this->db->where('type', 'company_email');
			$this->db->update('settings', $data);
			$data['description'] = $this->input->post('currency');
			$this->db->where('type', 'currency');
			$this->db->update('settings', $data);
			$data['description'] = $this->input->post('discount_percentage');
			$this->db->where('type', 'discount_percentage');
			$this->db->update('settings', $data);
			$this->session->set_flashdata('flash_message', translate('informations_updated'));
			redirect(base_url() . 'index.php?admin/settings', 'refresh');
		}
		if ($param1 == 'select_language') {
			$data['description'] = $this->input->post('language');
	        $this->db->where('type', 'language');
	        $this->db->update('settings', $data);
	        $this->session->set_flashdata('flash_message', translate('language_selected'));
			redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
		}
		if ($param1 == 'upload_logo') {
			move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo/logo.png');
			$this->session->set_flashdata('flash_message', translate('logo_uploaded'));
			redirect(base_url() . 'index.php?admin/settings' , 'refresh');
		}
		$page_data['page_name']  = 'settings';
		$page_data['page_title'] = translate('system_settings');
		$this->load->view('backend/index', $page_data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/Admin.php */
