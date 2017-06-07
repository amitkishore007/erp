<?php 
	$logged_in_employee_type	=	$this->db->get_where('employee' , array(
		'employee_id' => $logged_in_user_id
	))->row()->type;
?>
<!-- begin #sidebar -->
	<div id="sidebar" class="sidebar">
		<!-- begin sidebar scrollbar -->
		<div data-scrollbar="true" data-height="100%">
			<!-- begin sidebar user -->
			<ul class="nav">
				<li class="nav-profile">
					<div class="image">
						<img src="<?php echo $this->crud_model->get_image_url($logged_in_user_type , $logged_in_user_id);?>">
					</div>
					<div class="info" style="margin-top: 11px;">
						<?php echo $this->session->userdata('name');?>
					</div>
				</li>
			</ul>
			<!-- end sidebar user -->
			<!-- begin sidebar nav -->
			<ul class="nav">

				<!-- DASHBOARD -->
				<li class="<?php if ($page_name == 'dashboard') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?employee/dashboard">
						<i class="fa fa-laptop"></i>
						<span><?php echo translate('dashboard');?></span>
					</a>
				</li>

				<?php if ($logged_in_employee_type == 2):?>
					<!-- MANAGE PURCHASES -->
					<li class="has-sub <?php if ($page_name == 'purchase_add' ||
													$page_name == 'purchase_history' ||
														$page_name == 'purchase_invoice_view')
															echo 'active';?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-money"></i>
						    <span><?php echo translate('manage_purchases');?></span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if ($page_name == 'purchase_add') echo 'active';?>">
						    	<a href="<?php echo base_url();?>index.php?employee/purchase_add"><?php echo translate('new_purchase');?></a>
						    </li>
						    <li class="<?php if ($page_name == 'purchase_history') echo 'active';?>">
						    	<a href="<?php echo base_url();?>index.php?employee/purchase_history"><?php echo translate('purchase_history');?></a>
						    </li>
						</ul>
					</li>
				<?php endif;?>

				<?php if ($logged_in_employee_type == 1):?>
					<!-- MANAGE SALES -->
					<li class="has-sub <?php if ($page_name == 'sale_add' ||
													$page_name == 'sale_invoice' ||
														$page_name == 'sale_invoice_view' ||
															$page_name == 'take_sale_payment')
																echo 'active';?>">
						<a href="javascript:;">
						    <b class="caret pull-right"></b>
						    <i class="fa fa-dollar"></i>
						    <span><?php echo translate('manage_sales');?></span>
					    </a>
						<ul class="sub-menu">
						    <li class="<?php if ($page_name == 'sale_add') echo 'active';?>">
						    	<a href="<?php echo base_url();?>index.php?employee/sale_add"><?php echo translate('new_sale');?></a>
						    </li>
						    <li class="<?php if ($page_name == 'sale_invoice') echo 'active';?>">
						    	<a href="<?php echo base_url();?>index.php?employee/sale_invoice"><?php echo translate('sale_invoices');?></a>
						    </li>
						</ul>
					</li>
				<?php endif;?>

				<!-- PRIVATE MESSAGING -->
				<li class="<?php if ($page_name == 'message' ||
										$page_name == 'message_new' ||
											$page_name == 'message_read')
												echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?employee/message">
						<i class="fa fa-paper-plane"></i>
						<span><?php echo translate('messaging');?></span>
					</a>
				</li>

		        <!-- begin sidebar minify button -->
				<li>
					<a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
						<i class="fa fa-angle-double-left"></i>
					</a>
				</li>
		        <!-- end sidebar minify button -->
			</ul>
			<!-- end sidebar nav -->
		</div>
		<!-- end sidebar scrollbar -->
	</div>
	<div class="sidebar-bg"></div>
	<!-- end #sidebar -->