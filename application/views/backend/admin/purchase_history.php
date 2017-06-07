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
				<?php echo translate('new_purchase');?>
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
                                    <th><?php echo translate('supplier');?></th>
                                    <th><?php echo translate('date');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	foreach ($purchases as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['purchase_code'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('supplier' , array('supplier_id' => $row['supplier_id']))->row()->name;?>
                                    </td>
                                    <td><?php echo date('dS M, Y' , $row['timestamp']);?></td>
                                    <td>
                                        <a href="<?php echo base_url();?>index.php?admin/purchase_invoice_view/<?php echo $row['purchase_id'];?>" 
                                        	class="btn btn-success btn-xs">
                                        		<i class="fa fa-eye"></i>
                                        			<?php echo translate('view_purchase_invoice');?>
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