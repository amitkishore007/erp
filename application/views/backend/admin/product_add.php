

<?php 
    echo form_open(base_url() . 'index.php?admin/product/create/' , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('product_code');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="serial_number" required
				placeholder="" value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10);?>" readonly />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('product_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('product_name');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('category');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="category_id">
                <option value="" selected><?php echo translate('select_product_category');?></option>
                <?php 
                	$categories	=	$this->db->get('category')->result_array();
                	foreach ($categories as $row):
                ?>
                	<option value="<?php echo $row['category_id'];?>"><?php echo $row['name'];?></option>
            	<?php endforeach;?>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('sub_category');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="sub_category_id">
                <option value="" selected><?php echo translate('select_product_sub_category');?></option>
                <?php 
                	$sub_categories	=	$this->db->get('sub_category')->result_array();
                	foreach ($sub_categories as $row):
                ?>
                	<option value="<?php echo $row['sub_category_id'];?>"><?php echo $row['name'];?></option>
            	<?php endforeach;?>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('purchase_price');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="purchase_price" required
				placeholder="<?php echo translate('product_purchase_price');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('selling_price');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="selling_price" required
				placeholder="<?php echo translate('product_selling_price');?>" />
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('notes');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="note" rows="3"></textarea>
        </div>
    </div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="file" name="userfile"
				placeholder="<?php echo translate('product_image');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('save_product');?></button>
		</div>
	</div>

<?php echo form_close();?>

<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>