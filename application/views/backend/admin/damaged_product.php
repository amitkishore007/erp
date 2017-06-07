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
			<a href="<?php echo base_url();?>index.php?admin/damaged_product">
				<?php echo translate('damaged_product');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<!-- new damaged_product addition link -->
	<div class="row" style="margin-left: 1px;">
		<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/damaged_product_add');"
			class="btn btn-success m-r-5">
			<i class="fa fa-plus"></i> <?php echo translate('add_damaged_product');?>
		</button>
	</div>

	<br>
	<!-- new damaged_product addition link -->

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
                    <h4 class="panel-title"><?php echo translate('all_damaged_products');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('code');?></th>
                                    <th><?php echo translate('name');?></th>
                                    <th><?php echo translate('category');?></th>
                                    <th><?php echo translate('purchase_price');?></th>
                                    <th><?php echo translate('quantity');?></th>
                                    <th><?php echo translate('notes');?></th>
                                    <th><?php echo translate('date');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	foreach ($damaged_products as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td>
                                        <?php 
                                            if ($row['product_id'] > 0)
                                                echo $this->db->get_where('product' , array(
                                                        'product_id' => $row['product_id']
                                                    ))->row()->serial_number;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row['product_id'] > 0)
                                                echo $this->db->get_where('product' , array(
                                                        'product_id' => $row['product_id']
                                                    ))->row()->name;
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row['product_id'] > 0) {
                                                $product_category_id = $this->db->get_where('product' , array(
                                                        'product_id' => $row['product_id']
                                                    ))->row()->category_id;

                                                echo $this->db->get_where('category' , array(
                                                        'category_id' => $product_category_id
                                                    ))->row()->name;
                                            }
                                        ?> 
                                    </td>
                                    <td>
                                        <?php 
                                            if ($row['product_id'] > 0)
                                                echo $currency . ' ' . $this->db->get_where('product' , array(
                                                        'product_id' => $row['product_id']
                                                    ))->row()->purchase_price;
                                        ?>
                                    </td>
                                    <td><?php echo $row['quantity'];?></td>
                                    <td><?php echo $row['note'];?></td>
                                    <td><?php echo date('d/m/Y' , $row['timestamp']);?></td>
                                    <td>
                                        <button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/damaged_product_edit/<?php echo $row['damaged_product_id']; ?>');" 
                                            class="btn btn-success btn-icon btn-circle btn-sm">
                                                <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="showDeleteModal('<?php echo base_url();?>index.php?admin/damaged_product/delete/<?php echo $row['damaged_product_id']; ?>');" 
                                            class="btn btn-danger btn-icon btn-circle btn-sm">
                                                <i class="fa fa-trash"></i>
                                        </button>
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