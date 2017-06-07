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
<?php
    echo form_open(base_url() . 'index.php?employee/sale_add/do_add/' , array(
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
								<li>Check and recheck before creating the sale. The sale once made can not be altered.</li>
								<li>You can add product either by barcode scan or by selecting product category.</li>
								<li>You can enter discount percentage and also can edit the provided VAT percentage in the payments section.</li>
								<li>Enter the payment amount that the customer gives and see the change amount and net payable amount.</li>
								<li>The number in parenthesis in product selector represents the present stock quantity of the product.</li>
							</ul>
						</div>
                    </div>
                    <div class="col-md-6">

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('invoice_code');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" name="invoice_code" data-parsley-required="true"
                                    value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10);?>" readonly />
                            </div>
                        </div>

                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('customer');?>
							</label>
							<div class="col-md-9 col-sm-9">
							    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white"
							    	data-parsley-required="true" name="customer_id"
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
                                <input type="text" class="form-control" id="datepicker-autoClose" name="timestamp"
                                	value="<?php echo date('m/d/Y');?>" />
                            </div>
                        </div>

					</div>
                </div>
            </div>
	        <!-- end panel -->
		</div>
	</div>
	<div id="sale_info">
	<div class="row">
		<div class="col-md-3">
			<!-- begin panel -->
	        <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('select_product_by_barcode');?></h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <input type="text" placeholder="<?php echo translate('click_here_to_scan_barcode');?>" class="form-control" name="" autofocus
                            id="barcode" onKeyPress="return barcode_input(event , this.value)" autocomplete="off">
                        </div>
                    </div>

				</div>
            </div>
	        <!-- end panel -->

	        <!-- begin panel -->
	        <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('select_product_by_category');?></h4>
                </div>
                <div class="panel-body">

                    <div class="form-group">
						<div class="col-md-12 col-sm-12">
						    <select onchange="get_product('category' , this.value)" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="category_id">
				                <option value="" selected><?php echo translate('select_a_category');?></option>
				                <?php
				                	$categories	=	$this->db->get('category')->result_array();
				                	foreach ($categories as $row):
				                ?>
				                	<option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option>

				            	<?php endforeach;?>
				            </select>
						</div>
					</div>

					<div id="sub_category_holder">

					</div>

				</div>
            </div>
	        <!-- end panel -->

	        <!-- begin panel -->
	        <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('select_products_to_sale');?></h4>
                </div>
                <div class="panel-body">
	                <div id="product_list_holder">

	                </div>
				</div>
            </div>
	        <!-- end panel -->

		</div>

		<div class="col-md-9">
        	<!-- begin panel -->
	        <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('select_products_to_sale');?></h4>
                </div>
                <div class="panel-body">
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
							<tbody id="invoice_entry_holder">

							</tbody>
						</table>
					</div>
				</div>
            </div>
	        <!-- end panel -->
	        <div class="col-md-5"></div>
	        <div class="col-md-7">
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
										<td><?php echo translate('tax');?></td>
										<td>
												<select onchange="calculate_grand_total()" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white"
													data-parsley-required="true" id="tax_percentage">
													<option value="0" selected><?php echo translate('none');?></option>
								                <?php
								                	$taxes	=	$this->db->get('tax')->result_array();
								                	foreach ($taxes as $row):
								                ?>
								                	<option value="<?php echo $row['percentage'];?>"><?php echo $row['name'];?> [<?php echo $row['tax_code'];?>] - <?php echo $row['percentage'];?> %</option>

								            	<?php endforeach;?>
								            </select>
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
											<select class="form-control" name="method">
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
								<button type="submit" class="btn btn-success"><?php echo translate('create_new_sale');?></button>
							</div>
						</div>
	                </div>
	            </div>
	            <!-- end panel -->
	        </div>
        </div>

	</div>
</div>
<?php echo form_close();?>
</div>

<script type="text/javascript">
	window.onload = function() {
		order_info_div = document.getElementById('sale_info');
		order_info_div.style.visibility = 'hidden';
	}
</script>

<script type="text/javascript">

    total_number = 0;
    function add_product(product_id) {
        //if (total_number != 0)
          //  total_number = 0;

        total_number++;

        // get the product detail
        $.ajax({
            url: '<?php echo base_url();?>index.php?employee/get_selected_product/mouse/' +  product_id + '/' + total_number,
            success: function(response)
            {
                jQuery('#invoice_entry_holder').append(response);
                calculate_grand_total();
                calculate_change_amount();
            }
        });
    }


	function barcode_input(e , serial_number) {
        var key;

        if(window.event)
            key = window.event.keyCode;     //IE
        else
            key = e.which;     //firefox

        // confirm barcode input and add product to list
        if(key == 13) {

            //alert(serial_number);
            total_number++;

            // get the product detail
            $.ajax({
                url: '<?php echo base_url();?>index.php?employee/get_selected_product/barcode/' +  serial_number + '/' + total_number,
                success: function(response)
                {
                    jQuery('#invoice_entry_holder').append(response);
                    calculate_grand_total();
                    $("#barcode").val("");
                }
            });
            //$("#barcode_input").val() = '';
            //$("#barcode_input").focus();
          return false;
        }
         else
            return true;
    }

    function calculate_single_entry_total(entry_number) {

        quantity        = $("#single_entry_quantity_"+entry_number).val();
        selling_price   = $("#single_entry_selling_price_"+entry_number).val();

        single_entry_total = quantity * selling_price;
        $("#single_entry_total_"+entry_number).html( single_entry_total );

        // on change each single entry, update the grand total area also
        calculate_grand_total();
        calculate_change_amount();
    }

    // calculate the grand total area
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
        tax         =   Number( $("#tax_percentage").val() );

        sub_total              =   sub_total - (sub_total * (discount_percentage / 100));
        grand_total            =   sub_total + (sub_total * (tax / 100));

        grand_total            =    grand_total.toFixed(2);
        $("#grand_total").attr("value" , grand_total);
        calculate_change_amount();
    }

    function get_product( type , category_id ) {
        // get the product list
        $.ajax({
            url: '<?php echo base_url();?>index.php?employee/get_sale_product_list/' + type + '/' + category_id,
            success: function(response)
            {
                jQuery('#product_list_holder').html(response);
            }
        });


        // get the sub-category list
        if (type == 'category')
        {
            $.ajax({
                url: '<?php echo base_url();?>index.php?employee/get_sub_category_list/' + category_id,
                success: function(response)
                {
                    jQuery('#sub_category_holder').html(response);
                }
            });
        }
    }

    function get_customer_discount(customer_id) {

			document.getElementById('sale_info').style.visibility = 'visible';

    	$.ajax({
            url: '<?php echo base_url();?>index.php?employee/get_customer_discount_percentage/' + customer_id ,
            success: function(response)
            {
                jQuery('#customer_discount_holder').html(response);
            }
        });

    }

    function remove_row(entry_number) {

        //alert (total_number);
        $('#entry_row_'+entry_number).remove();

        for (var i = entry_number ; i < total_number ; i++)
        {
            $("#single_entry_total_"            + (i + 1) ).attr("id" , "single_entry_total_" + i);

            $("#serial_number_"                 + (i + 1) ).attr("id" , "serial_number_" + i);
            $("#serial_number_"                 + (i ) ).html(i);

            $("#single_entry_quantity_"         + (i + 1) ).attr("id" , "single_entry_quantity_" + i);
            $("#single_entry_quantity_"         + (i ) ).attr({onkeyup: "calculate_single_entry_total(" + i + ")" , onclick: "calculate_single_entry_total(" + i + ")"});

            $("#single_entry_selling_price_"    + (i + 1) ).attr("id" , "single_entry_selling_price_" + i);
            $("#single_entry_selling_price_"    + (i ) ).attr({onkeyup: "calculate_single_entry_total(" + i + ")" , onclick: "calculate_single_entry_total(" + i + ")"});

            $("#delete_button_"                 + (i + 1) ).attr("id" , "delete_button_" + i);
            $("#delete_button_"                 + (i ) ).attr("onclick" , "remove_row(" + i + ")");

            $("#entry_row_"                     + (i + 1) ).attr("id" , "entry_row_" + i);

            console.log(i);
        }

        total_number--;
        // on deletion each single entry, update the grand total area also
        calculate_grand_total();
        calculate_change_amount();
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
