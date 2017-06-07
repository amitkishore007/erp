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
					<a href="<?php echo base_url();?>index.php?admin/dashboard">
						<i class="fa fa-laptop"></i>
						<span><?php echo translate('dashboard');?></span>
					</a>
				</li>

				<!-- CUSTOMERS -->
				<li class="<?php if ($page_name == 'customer') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/customer">
						<i class="fa fa-users"></i>
						<span><?php echo translate('customer');?></span>
					</a>
				</li>

				<!-- SUPPLIERS -->
				<li class="<?php if ($page_name == 'supplier') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/supplier">
						<i class="fa fa-truck"></i>
						<span><?php echo translate('supplier');?></span>
					</a>
				</li>

				<!-- EMPLOYEES -->
				<li class="<?php if ($page_name == 'employee') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/employee">
						<i class="fa fa-users"></i>
						<span><?php echo translate('employee');?></span>
					</a>
				</li>

				<!-- MANAGE PRODUCTS -->
				<li class="has-sub <?php if ($page_name == 'product' ||
												$page_name == 'product_barcode' ||
													$page_name == 'product_category' ||
														$page_name == 'product_sub_category' ||
															$page_name == 'damaged_product')
																echo 'active';?>">
					<a href="javascript:;">
					    <b class="caret pull-right"></b>
					    <i class="fa fa-shopping-cart"></i>
					    <span><?php echo translate('manage_products');?></span>
				    </a>
					<ul class="sub-menu">
					    <li class="<?php if ($page_name == 'product') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/product"><?php echo translate('product');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'product_barcode') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/product_barcode"><?php echo translate('prodcut_barcode');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'product_category') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/product_category"><?php echo translate('category');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'product_sub_category') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/product_sub_category"><?php echo translate('sub_category');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'damaged_product') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/damaged_product"><?php echo translate('damaged_product');?></a>
					    </li>
					</ul>
				</li>

				<!-- MANAGE ORDERS -->
				<li class="has-sub <?php if ($page_name == 'order_add' ||
												$page_name == 'order_edit' ||
													$page_name == 'order_invoice_view' ||
														$page_name == 'take_order_payment' ||
															$page_name == 'orders')
																echo 'active';?>">
					<a href="javascript:;">
					    <b class="caret pull-right"></b>
					    <i class="fa fa-bell"></i>
					    <span><?php echo translate('manage_orders');?></span>
				    </a>
					<ul class="sub-menu">
					    <li class="<?php if ($page_name == 'order_add') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/order_add"><?php echo translate('create_new_order');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'orders') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/orders"><?php echo translate('all_orders');?></a>
					    </li>
					</ul>
				</li>

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
					    	<a href="<?php echo base_url();?>index.php?admin/purchase_add"><?php echo translate('new_purchase');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'purchase_history') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/purchase_history"><?php echo translate('purchase_history');?></a>
					    </li>
					</ul>
				</li>

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
					    	<a href="<?php echo base_url();?>index.php?admin/sale_add"><?php echo translate('new_sale');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'sale_invoice') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/sale_invoice"><?php echo translate('sale_invoices');?></a>
					    </li>
					</ul>
				</li>

				<!-- MANAGE REPORTS -->
				<li class="has-sub <?php if ($page_name == 'report_payment' ||
												$page_name == 'report_customer' ||
													$page_name == 'report_product' ||
														$page_name == 'take_sale_payment')
															echo 'active';?>">
					<a href="javascript:;">
					    <b class="caret pull-right"></b>
					    <i class="fa fa-bar-chart-o"></i>
					    <span><?php echo translate('reports');?></span>
				    </a>
					<ul class="sub-menu">
					    <li class="<?php if ($page_name == 'report_payment') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/report/payment"><?php echo translate('payments');?></a>
					    </li>
					    <li class="<?php if ($page_name == 'report_customer') echo 'active';?>">
					    	<a href="<?php echo base_url();?>index.php?admin/report/customer"><?php echo translate('customer_payments');?></a>
					    </li>
					</ul>
				</li>

				<!-- PRIVATE MESSAGING -->
				<li class="<?php if ($page_name == 'message' ||
										$page_name == 'message_new' ||
											$page_name == 'message_read')
												echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/message">
						<i class="fa fa-paper-plane"></i>
						<span><?php echo translate('messaging');?></span>
					</a>
				</li>

				<!-- TAX SETTINGS -->
				<li class="<?php if ($page_name == 'tax_settings') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/tax_settings">
						<i class="fa fa-cog"></i>
						<span><?php echo translate('tax_settings');?></span>
					</a>
				</li>

				<!-- SETTINGS -->
				<li class="<?php if ($page_name == 'settings') echo 'active';?>">
					<a href="<?php echo base_url();?>index.php?admin/settings">
						<i class="fa fa-cogs"></i>
						<span><?php echo translate('system_settings');?></span>
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
