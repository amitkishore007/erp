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
            <a href="<?php echo base_url();?>index.php?admin/product">
                <?php echo translate('product');?>
            </a>
        </li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/product_category">
				<?php echo translate('category');?>
			</a>
		</li>
        <li>
            <a href="<?php echo base_url();?>index.php?admin/product_sub_category">
                <?php echo translate('sub_category');?>
            </a>
        </li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<!-- new product_sub_category addition link -->
	<div class="row" style="margin-left: 1px;">
		<button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/product_sub_category_add');"
			class="btn btn-success m-r-5">
			<i class="fa fa-plus"></i> <?php echo translate('add_new_sub_category');?>
		</button>
	</div>

	<br>
	<!-- new product_sub_category addition link -->

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
                    <h4 class="panel-title"><?php echo translate('product_sub_categories');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('name');?></th>
                                    <th><?php echo translate('category');?></th>
                                    <th><?php echo translate('description');?></th>
                                    <th><?php echo translate('options');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	foreach ($sub_categories as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo $row['name'];?></td>
                                    <td>
                                        <?php 
                                            if ($row['category_id'] > 0)
                                                echo $this->db->get_where('sub_category' , array(
                                                        'sub_category_id' => $row['sub_category_id']
                                                ))->row()->name;
                                        ?>
                                    </td>
                                    <td><?php echo $row['description'];?></td>
                                    <td>
                                        <button onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/product_sub_category_edit/<?php echo $row['sub_category_id']; ?>');" 
                                            class="btn btn-success btn-icon btn-circle btn-sm">
                                                <i class="fa fa-edit"></i>
                                        </button>
                                        <button onclick="showDeleteModal('<?php echo base_url();?>index.php?admin/product_sub_category/delete/<?php echo $row['sub_category_id']; ?>');" 
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