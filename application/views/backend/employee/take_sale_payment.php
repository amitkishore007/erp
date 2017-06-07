<?php 
	$payment_for_invoice	=	$this->db->get_where('invoice' , array(
		'invoice_code' => $invoice_code
	))->result_array();
	foreach ($payment_for_invoice as $row):
?>

<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?employee/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?employee/sale_add">
				<?php echo translate('new_sale');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?employee/sale_invoice">
				<?php echo translate('sale_invoices');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('invoice_code') . ': ' . $row['invoice_code'];?></h4>
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
                    			$products =	json_decode($row['invoice_entries']);
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
                    				<td><?php echo $product->total_number;?></td>
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
		<div class="col-md-6">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('take_payment');?></h4>
                </div>
                <div class="panel-body">
                    <?php 
					    echo form_open(base_url() . 'index.php?employee/sale_payment/take_payment/' . $row['invoice_id'] , array(
					        'class' => 'form-horizontal' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
					    ));
					?>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                            	<?php echo translate('payment');?>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" name="amount" data-parsley-required="true"
                                	placeholder="<?php echo translate('enter_payment_amount');?>" />
                            </div>
                        </div>

                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('method');?>
							</label>
							<div class="col-md-6 col-sm-6">
							    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" name="method">
					                <option value="" selected><?php echo translate('select_payment_method');?></option>
					                <option value="1"><?php echo translate('cash');?></option>
					                <option value="2"><?php echo translate('check');?></option>
					                <option value="3"><?php echo translate('card');?></option>
					            </select>
							</div>
						</div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                            	<?php echo translate('date');?>
                            </label>
                            <div class="col-md-6 col-sm-6">
                                <input type="text" class="form-control" id="datepicker-autoClose" name="timestamp" data-parsley-required="true"
                                	placeholder="<?php echo translate('select_date');?>" />
                            </div>
                        </div>

                        <input type="hidden" name="customer_id" value="<?php echo $row['customer_id'];?>">
                        <input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3"></label>
                            <div class="col-md-6 col-sm-6">
                            	<button type="submit" class="btn btn-success"><?php echo translate('take_payment');?></button>
                            </div>
                        </div>

					<?php echo form_close();?>
                </div>
            </div>
            <!-- end panel -->
		</div>
		<div class="col-md-6">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('amounts');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                    	<table class="table table-bordered table-striped">
                    		<tbody>
                    			<tr>
                    				<td>VAT</td>
                    				<td><?php echo $row['vat_percentage'];?> %</td>
                    			</tr>
                    			<tr>
                    				<td><?php echo translate('discount');?></td>
                    				<td><?php echo $row['discount_percentage'];?> %</td>
                    			</tr>
                    			<tr>
                    				<td><?php echo translate('grand_total');?></td>
                    				<td><?php echo $currency . ' ' . $row['grand_total'];?></td>
                    			</tr>
                    			<tr>
                    				<td><?php echo translate('due');?></td>
                    				<td><?php echo $currency . ' ' . round($row['due'] , 2);?></td>
                    			</tr>
                    		</tbody>
                    	</table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>

</div>

<?php endforeach;?>