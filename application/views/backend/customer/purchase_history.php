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
			<a href="<?php echo base_url();?>index.php?customer/purchase_history">
				<?php echo translate('purchase_history');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>

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
                    <h4 class="panel-title"><?php echo translate('purchase_history');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('code');?></th>
                                    <th><?php echo translate('date');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                                $invoices = $this->db->get_where('invoice' , array(
                                    'customer_id' => $this->session->userdata('user_id')
                                ))->result_array();
                            	foreach ($invoices as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['invoice_code'];?></td>
                                    <td><?php echo date('dS M, Y' , $row['timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?customer/purchase_invoice_view/<?php echo $row['invoice_code'];?>" 
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
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
	</div>

</div>
<!-- end #content -->