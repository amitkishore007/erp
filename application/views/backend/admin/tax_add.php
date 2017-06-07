
<?php
    echo form_open(base_url() . 'index.php?admin/tax_settings/create/' , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_code');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="tax_code" required
				value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 7);?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('tax_name');?>" />
		</div>
	</div>

  <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('tax_percentage');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="percentage" required
				placeholder="<?php echo translate('tax_percentage');?>" />
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('notes');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="notes" placeholder="<?php echo translate('notes');?>" rows="3"></textarea>
        </div>
    </div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('save_tax_settings');?></button>
		</div>
	</div>

<?php echo form_close();?>
