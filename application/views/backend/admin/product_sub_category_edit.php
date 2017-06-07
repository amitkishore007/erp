
<?php 
	$update	=	$this->db->get_where('sub_category' , array(
					'sub_category_id' => $param2
				))->result_array();
	foreach ($update as $row):
?>

<?php 
    echo form_open(base_url() . 'index.php?admin/product_sub_category/edit/' . $row['sub_category_id'] , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('name');?>" value="<?php echo $row['name'];?>" />
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
                	foreach ($categories as $row2):
                ?>
                	<option value="<?php echo $row2['category_id'];?>"
                		<?php if ($row['category_id'] == $row2['category_id'])
                			echo 'selected';?>>
                				<?php echo $row2['name'];?>
                	</option>
            	<?php endforeach;?>
            </select>
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('description');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="description" placeholder="<?php echo translate('sub_category_description');?>" rows="3"><?php echo $row['description'];?></textarea>
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