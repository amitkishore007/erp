
<?php 
    echo form_open(base_url() . 'index.php?admin/customer/create/' , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('customer_code');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="customer_code" required
				placeholder="" value="<?php echo substr(md5(rand(100000000, 200000000)), 0, 10);?>" readonly />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('customer_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('customer_name');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('email');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="email" name="email" required
				placeholder="<?php echo translate('customer_email');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('password');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="password" name="password" required
				placeholder="<?php echo translate('customer_password');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('gender');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="gender">
                <option value="" selected><?php echo translate('select_gender');?></option>
                <option value="1"><?php echo translate('male');?></option>
                <option value="2"><?php echo translate('female');?></option>
            </select>
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('address');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="address" placeholder="<?php echo translate('customer_address');?>" rows="3"></textarea>
        </div>
    </div>

    <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('phone');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="phone"
				placeholder="<?php echo translate('customer_phone_number');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('discount');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="discount_percentage" required
				placeholder="<?php echo translate('customer_discount_percentage');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="file" name="userfile"
				placeholder="<?php echo translate('customer_image');?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4"></label>
		<div class="col-md-6 col-sm-6">
			<button type="submit" class="btn btn-success"><?php echo translate('save_customer');?></button>
		</div>
	</div>

<?php echo form_close();?>

<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>