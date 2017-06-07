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
    echo form_open(base_url() . 'index.php?admin/order/create/' , array(
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
                    <h4 class="panel-title"><?php echo translate('basic_informations');?></h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-6" style="border-right: 1px solid #ccc;">
                    	<div class="note note-success">
							<h4>Instructions</h4>
							<ul>
								<li>Check and recheck added products before creating the order. Products added can not be edited later but other informations are editable.</li>
								<li>You can add multiple products in a single order.</li>
								<li>If order status and payment status is not selected, they will be automatically counted as pending order with unpaid payment status.</li>
								<li>The number in parenthesis in product selector represents the present stock quantity of the product.</li>
							</ul>
						</div>
                    </div>
                    <div class="col-md-6">

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('order_code');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" name="order_number" data-parsley-required="true"
                                    value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10);?>" readonly />
                            </div>
                        </div>

                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('customer');?>
							</label>
							<div class="col-md-9 col-sm-9">
							    <select class="form-control selectpicker" data-size="10" data-live-search="true"
							    	data-style="btn-white" data-parsley-required="true" name="customer_id"
							    		onchange="return get_customer_discount(this.value)">
					                <option value="" selected><?php echo translate('select_customer');?></option>
					                <?php
					                	$customers	=	$this->db->get('customer')->result_array();
					                	foreach ($customers as $row):
					                ?>
					                	<option value="<?php echo $row['customer_id'];?>">
					                		<?php echo $row['name'];?> - [ <?php echo $row['customer_code'];?> ]
					                	</option>
					            	<?php endforeach;?>
					            </select>
							</div>
						</div>

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                            	<?php echo translate('date');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input type="text" class="form-control" id="datepicker-autoClose" name="creating_timestamp"
                                	placeholder="<?php echo translate('select_date');?>"
																		value="<?php echo date('m/d/Y');?>"/>
                            </div>
                        </div>

					</div>
                </div>
            </div>
	        <!-- end panel -->
		</div>
	</div>

<div id="order_info">
	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
	        <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('purchase_products');?></h4>
                </div>
                <div class="panel-body">
                    <div class="col-md-3">

                    	<div class="form-group">
							<div class="col-md-12 col-sm-12">
							    <select onchange="return add_product_for_order(this.value)" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-success" name="product_id">
					                <option value="" selected><?php echo translate('add_a_product');?></option>
					                <?php
					                	$products	=	$this->db->get('product')->result_array();
					                	foreach ($products as $row):
					                ?>
					                	<option value="<?php echo $row['product_id'];?>">
					                		<?php echo $row['name'];?>  ( <?php echo $row['stock_quantity'];?> )
					                	</option>
					            	<?php endforeach;?>
					            </select>
							</div>
						</div>

                    </div>

                    <div class="col-md-9">
                    	<div class="table-responsive">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
										<th><?php echo translate('serial');?></th>
										<th><?php echo translate('name');?></th>
										<th><?php echo translate('quantity');?></th>
										<th><?php echo translate('unit_price');?></th>
										<th><?php echo translate('total');?></th>
										<th><i class="fa fa-trash"></i></th>
									</tr>
								</thead>
								<tbody id="order_entry_holder">

								</tbody>
							</table>
						</div>
                    </div>

                </div>
            </div>
	        <!-- end panel -->
		</div>
	</div>

	<div class="row">
		<div class="col-md-7">
			<!-- begin panel -->
            <div class="panel panel-default" data-sortable-id="ui-widget-10">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">
                    	<?php echo translate('other_informations');?>
                    </h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
						<label class="control-label col-md-3 col-sm-3">
							<?php echo translate('order_status');?>
						</label>
						<div class="col-md-9 col-sm-9">
						    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" name="order_status">
				                <option value="" selected><?php echo translate('select_order_status');?></option>
				                <option value="0"><?php echo translate('pending');?></option>
				                <option value="1"><?php echo translate('approved');?></option>
				                <option value="2"><?php echo translate('rejected');?></option>
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
				                <option value="0"><?php echo translate('unpaid');?></option>
				                <option value="1"><?php echo translate('paid');?></option>
				            </select>
						</div>
					</div>

					<div class="form-group">
				        <label class="control-label col-md-3 col-sm-3">
				        	<?php echo translate('address');?>
				        </label>
				        <div class="col-md-9 col-sm-9">
				            <textarea class="form-control" name="shipping_address" placeholder="<?php echo translate('shipping_address');?>" rows="3"></textarea>
				        </div>
				    </div>

				    <div class="form-group">
				        <label class="control-label col-md-3 col-sm-3">
				        	<?php echo translate('note');?>
				        </label>
				        <div class="col-md-9 col-sm-9">
				            <textarea class="form-control" name="note" placeholder="<?php echo translate('notes');?>" rows="3"></textarea>
				        </div>
				    </div>

                </div>
            </div>
            <!-- end panel -->
		</div>
		<div class="col-md-5">
			<!-- begin panel -->
            <div class="panel panel-default" data-sortable-id="ui-widget-10">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">
                    	<?php echo translate('payment');?>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
						<table class="table table-bordered">
							<tbody>
								<tr>
									<td><?php echo translate('sub_total');?></td>
									<td>
										<input type="text" class="form-control text-right" id="sub_total" value="" name="sub_total">
									</td>
								</tr>
								<tr>
									<td><?php echo translate('discount');?></td>
									<td id="customer_discount_holder">

									</td>
								</tr>
								<tr>
									<td>VAT</td>
									<td>
										<input class="form-control text-right" type="text" name="vat_percentage" id="vat_percentage" onkeyup="calculate_grand_total()"
											value="<?php echo $this->db->get_where('settings',array('type'=>'vat_percentage'))->row()->description;?>"
												placeholder="VAT <?php echo translate('percentage');?>"
													data-parsley-required="true">
									</td>
								</tr>
								<tr>
									<td><?php echo translate('grand_total');?></td>
									<td>
										<input type="text" class="form-control text-right" id="grand_total" value="" name="grand_total">
									</td>
								</tr>
								<tr>
									<td><?php echo translate('payment');?></td>
									<td>
										<input class="form-control text-right" type="text" name="" id="payment" value=""
											onkeyup="return calculate_change_amount()"
												placeholder="<?php echo translate('enter_payment_amount');?>"
													data-parsley-required="true">
									</td>
								</tr>
								<tr>
										<td><?php echo translate('change');?></td>
										<td>
											<input type="text" class="form-control text-right" value="" id="change_amount">
										</td>
									</tr>
									<tr>
										<td><?php echo translate('net_payment');?></td>
										<td>
											<input type="text" class="form-control text-right" value="" id="net_payment"
												name="amount">
										</td>
									</tr>
									<tr>
										<td><?php echo translate('due');?></td>
										<td>
											<input type="text" class="form-control text-right" value="" id="due_amount"
												name="due">
										</td>
									</tr>
									<tr>
										<td><?php echo translate('method');?></td>
										<td>
											<select class="form-control" name="method" data-parsley-required="true">
								                <option value="" selected><?php echo translate('select_payment_method');?></option>
								                <option value="1"><?php echo translate('cash');?></option>
								                <option value="2"><?php echo translate('check');?></option>
								                <option value="3"><?php echo translate('card');?></option>
								            </select>
										</td>
									</tr>
							</tbody>
						</table>
						<div class="form-group col-md-10">
							<button type="submit" class="btn btn-success"><?php echo translate('create_new_order');?></button>
						</div>
					</div>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>
</div>

<?php echo form_close();?>
</div>

<script type="text/javascript">
	window.onload = function() {
		order_info_div = document.getElementById('order_info');
		order_info_div.style.visibility = 'hidden';
	}
</script>


<script type="text/javascript">

	var total_number = 0;
	function add_product_for_order(product_id) {

		total_number++;

		$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_product_for_order/' +  product_id + '/' + total_number,
            success: function(response)
            {
                jQuery('#order_entry_holder').append(response);
                calculate_grand_total();
            }
        });
	}

	function calculate_single_entry_sum(entry_number) {

		quantity 			=   $("#single_entry_quantity_"+entry_number).val();
		selling_price       =   $("#single_entry_selling_price_"+entry_number).val();
		single_entry_total	=	quantity * selling_price;
		$("#single_entry_total_"+entry_number).html(single_entry_total);
		calculate_grand_total();
		calculate_change_amount();

	}

	function calculate_grand_total() {

        // calculating subtotal
        sub_total = 0;
        for (var i = 1 ; i <= total_number ; i++)
        {
            sub_total   +=   Number( $("#single_entry_total_"+ i).html() );

        }
        $("#sub_total").attr("value" , sub_total);

        // calculating grand total
        discount_percentage    =   Number( $("#discount_percentage").val() );
        vat_percentage         =   Number( $("#vat_percentage").val() );

        sub_total              =   sub_total - (sub_total * (discount_percentage / 100));
        grand_total            =   sub_total + (sub_total * (vat_percentage / 100));

        grand_total            =    grand_total.toFixed(2);
        $("#grand_total").attr("value" , grand_total);
        calculate_change_amount();
    }

	function delete_row(entry_number) {

		$("#entry_row_"+entry_number).remove();

		for (var i = entry_number ; i < total_number ; i++) {

			$("#serial_" + (i + 1)).attr("id" , "serial_" + i);
			$("#serial_" + (i)).html(i);

			$("#single_entry_quantity_" + (i + 1)).attr("id" , "single_entry_quantity_" + i);
			$("#single_entry_quantity_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

			$("#single_entry_selling_price_" + (i + 1)).attr("id" , "single_entry_selling_price_" + i);
			$("#single_entry_selling_price_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

			$("#delete_button_" + (i + 1)).attr("id" , "delete_button_" + i);
			$("#delete_button_" + (i)).attr("onclick" , "delete_row(" + i + ")");

			$("#entry_row_" + (i + 1)).attr("id" , "entry_row_" + i);
		}

		total_number--;
		calculate_grand_total();
	}

    function get_customer_discount(customer_id) {

			document.getElementById('order_info').style.visibility = 'visible';

    	$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_customer_discount_percentage/' + customer_id ,
            success: function(response)
            {
                jQuery('#customer_discount_holder').html(response);
            }
        });

    }

    function calculate_change_amount() {
		get_grand_total    =	Number( $("#grand_total").val() );
		get_payment_amount =	Number( $("#payment").val() );

		if (get_payment_amount > get_grand_total) {

			change_amount      =	get_payment_amount - get_grand_total;
			change_amount      =	change_amount.toFixed(2);
			$("#change_amount").attr("value" , change_amount);
			get_change_amount  =	Number( $("#change_amount").val() );
			net_payable		   =	get_payment_amount - get_change_amount;
			net_payable		   =	net_payable.toFixed(2);
			$("#net_payment").attr("value" , net_payable);
			$("#due_amount").attr("value" , 0);
		}

		if (get_payment_amount < get_grand_total) {

			$("#change_amount").attr("value" , 0);
			$("#net_payment").attr("value" , get_payment_amount);
			get_due_amount	=	get_grand_total - get_payment_amount;
			get_due_amount	=	get_due_amount.toFixed(2);
			$("#due_amount").attr("value" , get_due_amount);
		}

		if (get_payment_amount == get_grand_total) {

			$("#change_amount").attr("value" , 0);
			$("#net_payment").attr("value" , get_payment_amount);
			$("#due_amount").attr("value" , 0);
		}
    }

</script>
