<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

    /*  
       *    Developed by: DBCinfotech
       *    Date    : 20 November, 2015
       *    Bizpro Stock Manager ERP
       *    http://codecanyon.net/user/dbcinfotech
    */

class Email_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // DECLARATION: NEW ACCOUNT OPENING EMAIL 
    function account_opening_email($account_type, $email_to, $password_unhashed)
    {
        $system_url = base_url();
        $email_sub  = "New Account Opening";
        $email_to   = $email_to;
        $email_msg  = "Congratulations! Your account has been created.<br \>";
        $email_msg .= "Your password for new account is " . $password_unhashed . "<br \>";
        $email_msg .= "Login here " . $system_url . " to continue. <br \>";
        $email_msg .= "You can change your password after logging in from your profile settings.";
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: NEW ORDER CREATING EMAIL TO CUSTOMER BY ADMIN
    function order_creating_email_by_admin($order_status, $order_number, $email_to)
    {
        $system_url = base_url();
        $email_sub  = "New Order Created";
        $email_to   = $email_to;
        $email_msg  = "A new order for you has been created.<br \>";
        $email_msg .= "Order Number: " . $order_number . "<br \>";
        $email_msg .= "Order status: " . $order_status . "<br \>";
        $email_msg .= "Check the details of the order " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }
    // DECLARATION: NEW ORDER CREATING EMAIL TO ADMIN BY CUSTOMER
    function order_creating_email_by_customer($email_from , $customer_name, $order_number, $order_status)
    {
        $system_url = base_url();
        $email_sub  = "New Order Created";
        $email_from = $email_from;
        $email_to   = $this->db->get_where('admin', array(
            'admin_id' => '1'
        ))->row()->email;
        $email_msg  = "A new order has been created by " . $customer_name . ".<br \>";
        $email_msg .= "Order Number: " . $order_number . "<br \>";
        $email_msg .= "Order status: " . $order_status . "<br \>";
        $email_msg .= "Check the details of the order " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to, $email_from);
    }

    // DECLARATION: ORDER STATUS CHANGE EMAIL TO CUSTOMER FROM ADMIN
    function order_status_change_email($order_status, $order_number, $email_to)
    {
        $system_url = base_url();
        $email_sub  = "Order Update";
        $email_to   = $email_to;
        $email_msg  = "Your order " . $order_number . " is " . $order_status . ".<br \>";
        $email_msg .= "Check the details of the order " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: NEW PURCHASE EMAIL TO ADMIN 
    function purchase_notification_email_to_admin()
    {
        $system_url = base_url();
        $email_sub  = "New Purchase";
        $email_to   = $this->db->get_where('admin', array(
            'admin_id' => 1
        ))->row()->email;
        $email_msg  = "A new purchase has been made.<br \>";
        $email_msg .= "Please check the purchase " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: NEW SALE EMAIL TO ADMIN
    function sale_notification_email_to_admin()
    {
        $system_url = base_url();
        $email_sub  = "New Purchase";
        $email_to   = $this->db->get_where('admin', array(
            'admin_id' => 1
        ))->row()->email;
        $email_msg  = "A new sale has been made.<br \>";
        $email_msg .= "Please check the sale " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: NEW SALE EMAIL TO CUSTOMER
    function sale_notification_email_to_customer($email_to)
    {
        $system_url  = base_url();
        $system_name = $this->db->get_where('settings', array(
            'type' => 'company_name'
        ))->row()->description;
        $email_sub   = "New Purchase";
        $email_to    = $email_to;
        $email_msg   = "Thanks for purchasing from " . $system_name . ".<br \>";
        $email_msg .= "Check the purchase informations " . $system_url;
    }

    // DECLARATION: MESSAGE NOTIFICATION EMAIL FROM ADMIN TO USERS
    function message_notification_email_sender_admin($email_to)
    {
        $system_url = base_url();
        $email_sub  = "New Message";
        $email_to   = $email_to;
        $email_msg  = "You have a new message from admin.<br \>";
        $email_msg .= "Check the message at " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: MESSAGE NOTIFICATION EMAIL FROM USERS TO ADMIN
    function message_notification_email_sender_user($sender_account_type, $email_from)
    {
        $system_url          = base_url();
        $sender_account_type = $sender_account_type;
        $email_from          = $email_from;
        $email_to            = $this->db->get_where('admin', array(
            'admin_id' => 1
        ))->row()->email;
        $email_sub           = "New Message";
        $email_msg           = "You have a new message from " . $sender_account_type . ".<br \>";
        $email_msg .= "Check the message at " . $system_url;
        $this->do_email($email_msg, $email_sub, $email_to, $email_from);
    }

    // DECLARATION: PASSWORD RESET EMAIL
    function reset_password_email($new_password, $email_to)
    {
        $system_url   = base_url();
        $email_to     = $email_to;
        $new_password = $new_password;
        $email_sub    = "New Password for your Account";
        $email_msg    = "Your request for password reset is successful.<br \>";
        $email_msg .= "Your new password is: " . $new_password . "<br \>";
        $email_msg .= "Please log in here " . $system_url . " with your email and new password.<br \>";
        $email_msg .= "You can change the password after logging in from your profile settings.";
        $this->do_email($email_msg, $email_sub, $email_to);
    }

    // DECLARATION: CUSTOM EMAIL SENDER
    function do_email($msg = NULL, $sub = NULL, $to = NULL, $from = NULL, $attachment_url = NULL)
    {
        $config              = array();
        $config['useragent'] = "CodeIgniter";
        $config['mailpath']  = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']  = "smtp";
        $config['smtp_host'] = "localhost";
        $config['smtp_port'] = "25";
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $config['wordwrap']  = TRUE;
        $this->load->library('email');
        $this->email->initialize($config);
        $system_name = $this->db->get_where('settings', array(
            'type' => 'company_name'
        ))->row()->description;
        if ($from == NULL)
            $from = $this->db->get_where('settings', array(
                'type' => 'company_email'
            ))->row()->description;
        // attachment
        if ($attachment_url != NULL)
            $this->email->attach($attachment_url);
        $this->email->from($from, $system_name);
        $this->email->from($from, $system_name);
        $this->email->to($to);
        $this->email->subject($sub);
        $this->email->message($msg);
        $this->email->send();
        //echo $this->email->print_debugger();
    }
}

/* End of file Email_model.php */
/* Location: ./application/models/Email_model.php */