<?php
$update = $this->db->get_where('tax', array('tax_id' => $param2))->result_array();
foreach($update as $row):
?>

<?php
    echo form_open(base_url() . 'index.php?admin/tax_settings/edit/'. $param2 , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_code');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="tax_code" required
        value="<?php echo $row['tax_code'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				value="<?php echo $row['name'];?>" />
		</div>
	</div>

  <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_percentage');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="percentage" required
				value="<?php echo $row['percentage'];?>" />
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('notes');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="notes" rows="3"><?php echo $row['notes'];?></textarea>
        </div>
    </div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('update_tax_settings');?></button>
		</div>
	</div>

<?php echo form_close();?>

<?php endforeach; ?>
