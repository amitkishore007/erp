

<?php
	$update	=	$this->db->get_where('customer' , array(
					'customer_id' => $param2
				))->result_array();
	foreach ($update as $row):
?>

<?php 
    echo form_open(base_url() . 'index.php?admin/customer/edit/' . $row['customer_id'] , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<img style="height: 50% ; width: 50%;" src="<?php echo $this->crud_model->get_image_url('customer' , $row['customer_id']);?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('customer_code');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="customer_code" required
				placeholder="" value="<?php echo $row['customer_code'];?>" readonly />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('customer_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('customer_name');?>" value="<?php echo $row['name'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('email');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="email" name="email" required
				placeholder="<?php echo translate('customer_email');?>" value="<?php echo $row['email'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('gender');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="gender">
                <option value="" selected><?php echo translate('select_gender');?></option>
                <option value="1" <?php if ($row['gender'] == 1) echo 'selected';?>>
                	<?php echo translate('male');?>
                </option>
                <option value="2" <?php if ($row['gender'] == 2) echo 'selected';?>>
                	<?php echo translate('female');?>
                </option>
            </select>
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('address');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="address" placeholder="<?php echo translate('customer_address');?>" rows="3"><?php echo $row['address'];?></textarea>
        </div>
    </div>

    <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('phone');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="phone"
				placeholder="<?php echo translate('customer_phone_number');?>" value="<?php echo $row['phone'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('discount');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="discount_percentage" required value="<?php echo $row['discount_percentage'];?>"
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
			<button type="submit" class="btn btn-success"><?php echo translate('update');?></button>
		</div>
	</div>

<?php echo form_close();?>
<?php endforeach;?>

<script type="text/javascript">
	$(".selectpicker").selectpicker();
</script>