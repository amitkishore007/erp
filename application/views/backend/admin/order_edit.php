<?php 
	$edit_order	=	$this->db->get_where('order' , array(
		'order_id' => $order_id
	))->result_array();
	foreach ($edit_order as $row):
?>

<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?admin/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/order_add">
				<?php echo translate('create_new_order');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/orders">
				<?php echo translate('all_orders');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
<?php 
    echo form_open(base_url() . 'index.php?admin/order/edit/' . $row['order_id'] , array(
        'class' => 'form-horizontal' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('ordered_products');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    	<table class="table table-bordered table-striped">
                    		<thead>
                    			<tr>
	                    			<td>#</td>
	                    			<td><?php echo translate('product_code');?></td>
	                    			<td><?php echo translate('name');?></td>
	                    			<td><?php echo translate('quantity');?></td>
	                    			<td><?php echo translate('unit_price');?></td>
	                    		</tr>
                    		</thead>
                    		<tbody>
                    		<?php 
                    			$count	=	1;
                    			$products =	json_decode($row['order_entries']);
                    			foreach ($products as $product):
                    		?>
                    			<tr>
                    				<td><?php echo $count++;?></td>
                    				<td>
                    					<?php 
                    						echo $this->db->get_where('product' , array(
                    							'product_id' => $product->product_id
                    						))->row()->serial_number;
                    					?>
                    				</td>
                    				<td>
                    					<?php 
                    						echo $this->db->get_where('product' , array(
                    							'product_id' => $product->product_id
                    						))->row()->name;
                    					?>
                    				</td>
                    				<td><?php echo $product->quantity;?></td>
                    				<td><?php echo $currency . ' ' . $product->selling_price;?></td>
                    			</tr>
                    		<?php endforeach;?>
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('status');?></h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
						<label class="control-label col-md-3 col-sm-3">
							<?php echo translate('order_status');?>
						</label>
						<div class="col-md-9 col-sm-9">
						    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" name="order_status">
				                <option value="" selected><?php echo translate('select_order_status');?></option>
				                <option value="0" <?php if ($row['order_status'] == 0) echo 'selected';?>><?php echo translate('pending');?></option>
				                <option value="1" <?php if ($row['order_status'] == 1) echo 'selected';?>><?php echo translate('approved');?></option>
				                <option value="2" <?php if ($row['order_status'] == 2) echo 'selected';?>><?php echo translate('rejected');?></option>
				            </select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3">
							<?php echo translate('payment_status');?>
						</label>
						<div class="col-md-9 col-sm-9">
						    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" name="payment_status">
				                <option value="" selected><?php echo translate('select_payment_status');?></option>
				                <option value="0" <?php if ($row['payment_status'] == 0) echo 'selected';?>><?php echo translate('unpaid');?></option>
				                <option value="1" <?php if ($row['payment_status'] == 1) echo 'selected';?>><?php echo translate('paid');?></option>
				            </select>
						</div>
					</div>

					<div class="form-group">
				        <label class="control-label col-md-3 col-sm-3">
				        	<?php echo translate('address');?>
				        </label>
				        <div class="col-md-9 col-sm-9">
				            <textarea class="form-control" name="shipping_address" placeholder="<?php echo translate('shipping_address');?>" rows="3"><?php echo $row['shipping_address'];?></textarea>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3 col-sm-3">
				        	<?php echo translate('note');?>
				        </label>
				        <div class="col-md-9 col-sm-9">
				            <textarea class="form-control" name="note" placeholder="<?php echo translate('notes');?>" rows="3"><?php echo $row['note'];?></textarea>
				        </div>
				    </div>

				    <div class="form-group">
				    	<label class="control-label col-md-3 col-sm-3"></label>
				    	<div class="col-md-9 col-sm-9">
							<button type="submit" class="btn btn-success"><?php echo translate('update_order');?></button>
						</div>
					</div>

                </div>
            </div>
            <!-- end panel -->
		</div>
		<div class="col-md-5">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('basic_informations');?></h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3">
                            <?php echo translate('order_code');?>
                        </label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="text" name="order_number" data-parsley-required="true"
                                value="<?php echo $row['order_number'];?>" readonly />
                        </div>
                    </div>

                    <div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('customer');?>
							</label>
							<div class="col-md-9 col-sm-9">
							    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" 
							    	data-parsley-required="true" name="customer_id">
					                	<option value="<?php echo $row['customer_id'];?>">
					                		<?php echo $this->db->get_where('customer' , array(
					                			'customer_id' => $row['customer_id']
					                		))->row()->name;?>
					                	</option>
					            </select>
							</div>
						</div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3">
                        	<?php echo translate('date');?>
                        </label>
                        <div class="col-md-9 col-sm-9">
                            <input type="text" class="form-control" id="datepicker-autoClose" name="modifying_timestamp" 
                            	placeholder="<?php echo translate('select_date');?>" value="<?php echo date('dS M, Y' , $row['creating_timestamp']);?>" />
                        </div>
                    </div>

                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>
<?php echo form_close();?>
</div>
<?php endforeach;?>