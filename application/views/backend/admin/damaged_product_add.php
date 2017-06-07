
<?php 
    echo form_open(base_url() . 'index.php?admin/damaged_product/create/' , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('category');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="product_id">
                <option value="" selected><?php echo translate('select_product');?></option>
                <?php 
                	$products	=	$this->db->get('product')->result_array();
                	foreach ($products as $row):
                ?>
                	<option value="<?php echo $row['product_id'];?>"><?php echo $row['name'];?></option>
            	<?php endforeach;?>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('damaged_quantity');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="number" name="quantity" required
				placeholder="<?php echo translate('damaged_product_quantity');?>" />
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
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="check">
                <option value="" selected><?php echo translate('decrease_from_stock');?> ? </option>
                	<option value="1"><?php echo translate('yes');?></option>
                	<option value="0"><?php echo translate('no');?></option>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('save_damaged_product');?></button>
		</div>
	</div>

<?php echo form_close();?>

<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>