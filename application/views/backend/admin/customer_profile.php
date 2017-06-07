

<?php
	$customer_profile	=	$this->db->get_where('customer' , array(
					'customer_id' => $param2
				))->result_array();
	foreach ($customer_profile as $row):
?>

<div class="row">
	<div class="col-md-4 col-sm-4">
		<!-- begin panel -->
        <div class="panel panel-success" data-sortable-id="ui-widget-1">
            <div class="panel-heading">
                <h4 class="panel-title">
                	<?php echo translate('basic_informations');?>
                </h4>
            </div>
            <div class="panel-body">
                <img style="height: 100% ; width: 100%;" 
                	src="<?php echo $this->crud_model->get_image_url('customer' , $row['customer_id']);?>">
                <br><br>
                <p><strong><?php echo $row['name'];?></strong></p>
                <p>
                	<i class="fa fa-paper-plane"></i>  <?php echo $row['email'];?> <br>
                	<i class="fa fa-map-marker"></i>  <?php echo $row['address'];?> <br>
                	<i class="fa fa-phone"></i>  <?php echo $row['phone'];?> <br>
                    <?php echo translate('discount_percentage');?> : <?php echo $row['discount_percentage'];?>
                </p>
            </div>
        </div>
        <!-- end panel -->
	</div>

	<div class="col-md-8 col-sm-8">
		<!-- begin panel -->
        <div class="panel panel-default panel-with-tabs" data-sortable-id="ui-widget-9">
            <div class="panel-heading">
                <ul id="myTab" class="nav nav-tabs pull-right">
                    <li class="active">
                    	<a href="#home" data-toggle="tab">
                    		<span class="hidden-xs"><?php echo translate('order_history');?></span>
                    	</a>
                    </li>
                    <li>
                    	<a href="#profile" data-toggle="tab">
                    		<span class="hidden-xs"><?php echo translate('purchase_history');?></span>
                    	</a>
                    </li>
                </ul>
                <h4 class="panel-title"><?php echo translate('history');?></h4>
            </div>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td><?php echo translate('order_number');?></td>
                                    <td><?php echo translate('order_status');?></td>
                                    <td><?php echo translate('payment_status');?></td>
                                    <td><?php echo translate('date_created');?></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $count  =   1;
                                $orders_from_customer   =   $this->db->get_where('order' , array(
                                    'customer_id' => $row['customer_id']
                                ))->result_array();
                                foreach ($orders_from_customer as $row2):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row2['order_number'];?></td>
                                    <td>
                                        <?php 
                                            if ($row2['order_status'] == 0) {
                                                echo translate('pending');
                                            } else if ($row2['order_status'] == 1) {
                                                echo translate('approved');
                                            } else {
                                                echo translate('rejected');
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row2['payment_status'] == 0) {
                                                echo translate('unpaid');
                                            } else {
                                                echo translate('paid');
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row2['creating_timestamp']);?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td><?php echo translate('invoice_code');?></td>
                                    <td><?php echo translate('payment_method');?></td>
                                    <td><?php echo translate('total_amount');?></td>
                                    <td><?php echo translate('date');?></td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $count  =   1;
                                $sales_to_customer   =   $this->db->get_where('invoice' , array(
                                    'customer_id' => $row['customer_id']
                                ))->result_array();
                                foreach ($sales_to_customer as $row3):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row3['invoice_code'];?></td>
                                    <td>
                                        <?php 
                                            $payment_method =   $this->db->get_where('payment' , array(
                                                'invoice_id' => $row3['invoice_id']
                                            ))->row()->method;
                                            if ($payment_method == 1)
                                                echo translate('cash');
                                            else if ($payment_method == 2)
                                                echo translate('check');
                                            else echo translate('card');
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $system_currency = $this->db->get_where('settings' , array(
                                                'type' => 'currency'
                                            ))->row()->description; 
                                            $payments_from_customer = $this->db->get_where('payment' ,array(
                                                'invoice_id' => $row3['invoice_id']
                                            ))->result_array();
                                            $total = 0;
                                            foreach ($payments_from_customer as $row4) {
                                                $total += $row4['amount'];
                                            }
                                            echo $system_currency . ' ' . $total;
                                        ?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row3['timestamp']);?></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end panel -->
	</div>


</div>


<?php endforeach;?>
