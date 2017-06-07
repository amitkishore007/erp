
<?php 
	$update	=	$this->db->get_where('damaged_product' , array(
					'damaged_product_id' => $param2
				))->result_array();
	foreach ($update as $row):
?>

<?php 
    echo form_open(base_url() . 'index.php?admin/damaged_product/edit/' . $row['damaged_product_id'] , array(
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
                	foreach ($products as $row2):
                ?>
                	<option value="<?php echo $row2['product_id'];?>"
                		<?php if ($row['product_id'] == $row2['product_id'])
                			echo 'selected';?>>
                				<?php echo $row2['name'];?>
                	</option>
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
				placeholder="<?php echo translate('damaged_product_quantity');?>" value="<?php echo $row['quantity'];?>" />
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('notes');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="note" rows="3"><?php echo $row['note'];?></textarea>
        </div>
    </div>

    <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('decrease_from_stock');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="checkbox" name="check" value="" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('update');?></button>
		</div>
	</div>

<?php echo form_close();?>
<?php endforeach;?>


<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>