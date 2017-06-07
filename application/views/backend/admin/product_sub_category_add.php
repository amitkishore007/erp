

<?php 
    echo form_open(base_url() . 'index.php?admin/product_sub_category/create/' , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('name');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('category');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="category_id" required>
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
        	<?php echo translate('description');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="description" placeholder="<?php echo translate('sub_category_description');?>" rows="3"></textarea>
        </div>
    </div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('save_sub_category');?></button>
		</div>
	</div>

<?php echo form_close();?>


<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>