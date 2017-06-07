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
					<a href="<?php echo base_url();?>index.php?customer/dashboard">
						<i class="fa fa-laptop"></i>
						<span><?php echo translate('dashboard');?></span>
					</a>
				</li>

				<!-- PRODUCTS -->
				<li class="<?php if ($page_name == 'product') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?customer/product">
						<i class="fa fa-shopping-cart"></i>
						<span><?php echo translate('products');?></span>
					</a>
				</li>

				<!-- MANAGE ORDERS -->
				<li class="has-sub <?php if ($page_name == 'order_add' ||
												$page_name == 'order_history' ||
													$page_name == 'order_invoice_view')
														echo 'active';?>">
					<a href="javascript:;">
					    <b class="caret pull-right"></b>
					    <i class="fa fa-bell"></i>
					    <span><?php echo translate('manage_orders');?></span>
				    </a>
					<ul class="sub-menu">
					    <li class="<?php if ($page_name == 'order_add') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?customer/order_add"><?php echo translate('create_new_order');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'order_history') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?customer/order_history"><?php echo translate('order_history');?></a>
					    </li>
					</ul>
				</li>

				<!-- PURCAHSE HISTORY -->
				<li class="<?php if ($page_name == 'purchase_history' ||
										$page_name == 'purchase_invoice_view') 
											echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?customer/purchase_history">
						<i class="fa fa-dollar"></i>
						<span><?php echo translate('purchase_history');?></span>
					</a>
				</li>

				<!-- PRIVATE MESSAGING -->
				<li class="<?php if ($page_name == 'message' ||
										$page_name == 'message_new' ||
											$page_name == 'message_read')
												echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?customer/message">
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