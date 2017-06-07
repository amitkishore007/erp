<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?customer/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?customer/order_add">
				<?php echo translate('create_new_order');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?customer/order_history">
				<?php echo translate('order_history');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
<?php
    echo form_open(base_url() . 'index.php?customer/order/create/' , array(
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
								<li>Check and recheck added products before creating the order. Products added can not be edited later.</li>
								<li>You can add multiple products in a single order.</li>
								<li>Your order will be sent to admin for approval.</li>
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
                            	<?php echo translate('date');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input onclick="return get_customer_discount()" type="text" class="form-control" id="datepicker-autoClose" name="creating_timestamp"
                                	placeholder="<?php echo date('m/d/Y');?>" />
                            </div>
                        </div>

					</div>
                </div>
            </div>
	        <!-- end panel -->
		</div>
	</div>

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
					                		<?php echo $row['name'];?>  [ <?php echo $row['serial_number'];?> ]
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
										<input type="text" class="form-control text-right" id="sub_total" value="" name="sub_total" readonly>
									</td>
								</tr>
								<tr>
									<td><?php echo translate('discount');?></td>
									<td>
										<input type="text" class="form-control text-right" id="discount_percentage"
											value="<?php echo $this->db->get_where('customer' , array(
												'customer_id' => $this->session->userdata('user_id')
											))->row()->discount_percentage;?>"
												name="discount_percentage" readonly>
									</td>
								</tr>
								<tr>
									<td>VAT</td>
									<td>
										<input class="form-control text-right" type="text" name="vat_percentage" id="vat_percentage" onkeyup="calculate_grand_total()"
											value="<?php echo $this->db->get_where('settings',array('type'=>'vat_percentage'))->row()->description;?>"
												placeholder="VAT <?php echo translate('percentage');?>"
													data-parsley-required="true" readonly>
									</td>
								</tr>
								<tr>
									<td><?php echo translate('grand_total');?></td>
									<td>
										<input type="text" class="form-control text-right" id="grand_total" value="" name="grand_total" readonly>
									</td>
								</tr>
								<tr>
									<td><?php echo translate('due');?></td>
									<td>
										<input type="text" class="form-control text-right" value="" id="due_amount"
											name="due" readonly>
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

<?php echo form_close();?>
</div>


<script type="text/javascript">

	var total_number = 0;
	function add_product_for_order(product_id) {

		total_number++;

		$.ajax({
            url: '<?php echo base_url();?>index.php?customer/get_product_for_order/' +  product_id + '/' + total_number,
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
        $("#due_amount").attr("value" , grand_total);
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

</script>
