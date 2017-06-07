<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?customer/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<div class="row">
		<div class="col-md-6">
			<!-- begin col-3 -->
			<div class="col-md-8">
				<a href="<?php echo base_url();?>index.php?customer/product">
					<div class="widget widget-stats bg-green">
						<div class="stats-info">
							 <h4><?php echo translate('browse_products');?></h4>	<i class="fa fa-shopping-cart fa-2x"></i>
						</div>
					</div>
				</a>
			</div>
			<!-- end col-3 -->
			<!-- begin col-3 -->
			<div class="col-md-8">
				<a href="<?php echo base_url();?>index.php?customer/order_add">
					<div class="widget widget-stats bg-blue">
						<div class="stats-info">
							 <h4><?php echo translate('create_a_new_order');?></h4>	<i class="fa fa-bell fa-2x"></i>
						</div>
					</div>
				</a>
			</div>
			<!-- end col-3 -->
			<!-- begin col-3 -->
			<div class="col-md-8">
				<a href="<?php echo base_url();?>index.php?customer/order_history">
					<div class="widget widget-stats bg-purple">
						<div class="stats-info">
							 <h4><?php echo translate('view_all_orders');?></h4>	<i class="fa fa-bullseye fa-2x"></i>
						</div>
					</div>
				</a>
			</div>
			<!-- end col-3 -->
			<!-- begin col-3 -->
			<div class="col-md-8">
				<a href="<?php echo base_url();?>index.php?customer/purchase_history">
					<div class="widget widget-stats bg-black">
						<div class="stats-info">
							 <h4><?php echo translate('purchase_history');?></h4>	<i class="fa fa-money fa-2x"></i>
						</div>
					</div>
				</a>
			</div>
			<!-- end col-3 -->
		</div>
		<div class="col-md-6" style="text-align: center;">
		<h2 style="font-weight:100;">
    		<a href="<?php echo base_url();?>index.php?customer/profile_settings">
    			<?php echo $this->session->userdata('name');?>
    		</a>
    	</h2>
			<img src="<?php echo  $this->crud_model->get_image_url($logged_in_user_type , $this->session->userdata('user_id'));?>"
				style="height: 200px;" class="rounded-corner">
		</div>
		
	</div>

</div>
<!-- end #content -->