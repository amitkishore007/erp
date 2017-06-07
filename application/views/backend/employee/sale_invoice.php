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
		<!-- begin col-12 -->
	    <div class="col-md-12">
	        <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('sale_invoices');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('code');?></th>
                                    <th><?php echo translate('customer');?></th>
                                    <th><?php echo translate('date');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	foreach ($invoices as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['invoice_code'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->name;?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row['timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?employee/sale_invoice_view/<?php echo $row['invoice_code'];?>" 
                                        	class="btn btn-success btn-xs">
                                        		<i class="fa fa-eye"></i>
                                        			<?php echo translate('view_sale_invoice');?>
                                        </a>
                                        <?php if ($row['due'] != 0):?>
                                            <a href="<?php echo base_url();?>index.php?employee/take_sale_payment/<?php echo $row['invoice_code'];?>" 
                                                class="btn btn-info btn-xs">
                                                    <i class="fa fa-money"></i>
                                                        <?php echo translate('take_payment');?>
                                            </a>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
	</div>


</div>