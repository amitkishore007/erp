<?php
	// basic system informations
	$system_name	=	$this->db->get_where('settings' , array('type' => 'company_name'))->row()->description;
	$system_address	=	$this->db->get_where('settings' , array('type' => 'address'))->row()->description;
	$system_phone	=	$this->db->get_where('settings' , array('type' => 'phone'))->row()->description;
	$system_email	=	$this->db->get_where('settings' , array('type' => 'company_email'))->row()->description;
	$currency		=	$this->db->get_where('settings' , array('type' => 'currency'))->row()->description;
	// logged in user informations
	$user_type		=	$this->session->userdata('login_type');
?>
<?php
	// side effect : loads all css styles and plugins
	include 'includes_top.php';
?>

<?php
	// side effect : loads header for every page
	include 'header.php';
?>

<?php
	// side effect : loads the navigation menu for every page
	include $user_type . '/navigation.php';
?>

<?php
	// side effect : loads the main content for every page
	include $user_type . '/' . $page_name . '.php';
?>

<?php
	// side effect : loads the footer for every page
	include 'footer.php';
?>

<?php
	// side effect : loads the navigation menu for every page
	include 'includes_bottom.php';
?>

<?php
	// side effect : loads the modal for every page
	include 'modal.php';
?>