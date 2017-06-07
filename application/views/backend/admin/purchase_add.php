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
			<a href="<?php echo base_url();?>index.php?admin/purchase_add">
				<?php echo translate('new_purchsae');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/purchase_history">
				<?php echo translate('purchase_history');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
<?php
    echo form_open(base_url() . 'index.php?admin/purchase_add/create/' , array(
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
								<li>Check and recheck the informations you have given before creating the purchase. The purchase once made can not be altered.</li>
								<li>You can add multiple products of any amount during the purchase.</li>
								<li>The number in parenthesis in product selector represents the present stock quantity of the product.</li>
							</ul>
						</div>
                    </div>
                    <div class="col-md-6">

						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('purchase_code');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" name="purchase_code" data-parsley-required="true"
                                    value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10);?>" readonly />
                            </div>
                        </div>

                        <div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('supplier');?>
							</label>
							<div class="col-md-9 col-sm-9">
							    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" data-parsley-required="true" name="supplier_id">
					                <option value="" selected><?php echo translate('select_supplier');?></option>
					                <?php
					                	$suppliers	=	$this->db->get('supplier')->result_array();
					                	foreach ($suppliers as $row):
					                ?>
					                	<option value="<?php echo $row['supplier_id'];?>">
					                		<?php echo $row['name'];?> - [ <?php echo $row['company'];?> ]
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
							    <select onchange="return add_product_for_purchase(this.value)" class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-success" name="product_id">
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
								<tbody id="purchase_entry_holder">

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
		<div class="col-md-7"></div>
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
									<td><?php echo translate('grand_total');?></td>
									<td class="text-right" id="grand_total"></td>
								</tr>
								<tr>
									<td><?php echo translate('payment');?></td>
									<td>
										<input class="form-control" type="text" name="amount" id="" value="" placeholder="<?php echo translate('enter_payment_amount');?>"
											data-parsley-required="true">
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
							<button type="submit" class="btn btn-success"><?php echo translate('create_new_purchase');?></button>
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
	function add_product_for_purchase(product_id) {

		total_number++;

		$.ajax({
            url: '<?php echo base_url();?>index.php?admin/get_product_for_purchase/' +  product_id + '/' + total_number,
            success: function(response)
            {
                jQuery('#purchase_entry_holder').append(response);
                calculate_grand_total_for_purchase();
            }
        });
	}

	function calculate_single_entry_sum(entry_number) {

		quantity 			=   $("#single_entry_quantity_"+entry_number).val();
		purchase_price      =   $("#single_entry_purchase_price_"+entry_number).val();
		single_entry_total	=	quantity * purchase_price;
		$("#single_entry_total_"+entry_number).html(single_entry_total);
		calculate_grand_total_for_purchase();

	}

	function delete_row(entry_number) {

		$("#entry_row_"+entry_number).remove();

		for (var i = entry_number ; i < total_number ; i++) {

			$("#serial_" + (i + 1)).attr("id" , "serial_" + i);
			$("#serial_" + (i)).html(i);

			$("#single_entry_quantity_" + (i + 1)).attr("id" , "single_entry_quantity_" + i);
			$("#single_entry_quantity_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

			$("#single_entry_purchase_price_" + (i + 1)).attr("id" , "single_entry_purchase_price_" + i);
			$("#single_entry_purchase_price_" + (i)).attr({onkeyup: "calculate_single_entry_sum(" + i + ")" , onclick: "calculate_single_entry_sum(" + i + ")"});

			$("#delete_button_" + (i + 1)).attr("id" , "delete_button_" + i);
			$("#delete_button_" + (i)).attr("onclick" , "delete_row(" + i + ")");

			$("#entry_row_" + (i + 1)).attr("id" , "entry_row_" + i);
		}

		total_number--;
		calculate_grand_total_for_purchase();
	}

	function calculate_grand_total_for_purchase() {

        grand_total = 0;
        for (var i = 1 ; i <= total_number ; i++)
        {
            grand_total   +=   Number( $("#single_entry_total_"+ i).html() );

        }

        $("#grand_total").html( grand_total );
    }

</script>
