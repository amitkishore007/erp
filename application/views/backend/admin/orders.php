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

	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li class="active">
                    <a href="#nav-pills-tab-1" data-toggle="tab">
                        <i class=" fa fa-spinner"></i> <?php echo translate('pending');?>
                    </a>
                </li>
				<li>
                    <a href="#nav-pills-tab-2" data-toggle="tab">
                        <i class=" fa fa-thumbs-up"></i> <?php echo translate('approved');?>
                    </a>
                </li>
				<li>
                    <a href="#nav-pills-tab-3" data-toggle="tab">
                        <i class=" fa fa-thumbs-down"></i> <?php echo translate('rejected');?>
                    </a>
                </li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade active in" id="nav-pills-tab-1">
				    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('order_code');?></th>
                                    <th><?php echo translate('customer');?></th>
                                    <th><?php echo translate('email');?></th>
                                    <th><?php echo translate('date_created');?></th>
                                    <th><?php echo translate('last_modified');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	$pending_orders	=	$this->db->get_where('order' , array(
                            		'order_status' => 0
                            	))->result_array();
                            	foreach ($pending_orders as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['order_number'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->name;?>
                                    </td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->email;?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row['creating_timestamp']);?></td>
                                    <td><?php if ($row['modifying_timestamp'] != '') echo date('dS M, Y' , $row['modifying_timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?admin/order_edit/<?php echo $row['order_id'];?>" 
                                            class="btn btn-info btn-xs">
                                                <?php echo translate('change_status');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?admin/order_invoice_view/<?php echo $row['order_id'];?>" 
                                            class="btn btn-success btn-xs">
                                                <?php echo translate('view_invoice');?>
                                        </a>
                                        <?php if ($row['due'] != 0):?>
                                        <a href="<?php echo base_url();?>index.php?admin/take_order_payment/<?php echo $row['order_id'];?>" 
                                            class="btn btn-primary btn-xs">
                                            <i class="fa fa-money"></i> <?php echo translate('take_payment');?>
                                        </a>  
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-2">
				    <div class="table-responsive">
                        
                        <table id="data-table2" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('order_code');?></th>
                                    <th><?php echo translate('customer');?></th>
                                    <th><?php echo translate('email');?></th>
                                    <th><?php echo translate('date_created');?></th>
                                    <th><?php echo translate('last_modified');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	$approved_orders	=	$this->db->get_where('order' , array(
                            		'order_status' => 1
                            	))->result_array();
                            	foreach ($approved_orders as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['order_number'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->name;?>
                                    </td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->email;?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row['creating_timestamp']);?></td>
                                    <td><?php if ($row['modifying_timestamp'] != '') echo date('dS M, Y' , $row['modifying_timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?admin/order_edit/<?php echo $row['order_id'];?>" 
                                            class="btn btn-info btn-xs">
                                                <?php echo translate('change_status');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?admin/order_invoice_view/<?php echo $row['order_id'];?>" 
                                            class="btn btn-success btn-xs">
                                                <?php echo translate('view_invoice');?>
                                        </a>
                                        <?php if ($row['due'] != 0):?>
                                        <a href="<?php echo base_url();?>index.php?admin/take_order_payment/<?php echo $row['order_id'];?>" 
                                            class="btn btn-primary btn-xs">
                                            <i class="fa fa-money"></i> <?php echo translate('take_payment');?>
                                        </a>  
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
				</div>
				<div class="tab-pane fade" id="nav-pills-tab-3">
				    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('order_code');?></th>
                                    <th><?php echo translate('customer');?></th>
                                    <th><?php echo translate('email');?></th>
                                    <th><?php echo translate('date_created');?></th>
                                    <th><?php echo translate('last_modified');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	$rejected_orders	=	$this->db->get_where('order' , array(
                            		'order_status' => 2
                            	))->result_array();
                            	foreach ($rejected_orders as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['order_number'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->name;?>
                                    </td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->email;?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row['creating_timestamp']);?></td>
                                    <td><?php if ($row['modifying_timestamp'] != '') echo date('dS M, Y' , $row['modifying_timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?admin/order_edit/<?php echo $row['order_id'];?>" 
                                            class="btn btn-info btn-xs">
                                                <?php echo translate('change_status');?>
                                        </a>
                                        <a href="<?php echo base_url();?>index.php?admin/order_invoice_view/<?php echo $row['order_id'];?>" 
                                            class="btn btn-success btn-xs">
                                                <?php echo translate('view_invoice');?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		</div>
	</div>

</div>