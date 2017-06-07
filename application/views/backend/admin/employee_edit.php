
<?php 
	$update	=	$this->db->get_where('employee' , array(
					'employee_id' => $param2
				))->result_array();
	foreach ($update as $row):
?>

<?php 
    echo form_open(base_url() . 'index.php?admin/employee/edit/' . $row['employee_id'] , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<img style="height: 50% ; width: 50%;" src="<?php echo $this->crud_model->get_image_url('employee' , $row['employee_id']);?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('employee_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('employee_name');?>" value="<?php echo $row['name'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('email');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="email" name="email" required
				placeholder="<?php echo translate('employee_email');?>" value="<?php echo $row['email'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('type');?>
		</label>
		<div class="col-md-6 col-sm-6">
		    <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-white" name="type" required>
                <option value="" selected><?php echo translate('select_employee_type');?></option>
                <option value="1" <?php if ($row['type'] == 1) echo 'selected';?>><?php echo translate('sales_staff');?></option>
                <option value="2" <?php if ($row['type'] == 2) echo 'selected';?>><?php echo translate('purchase_staff');?></option>
            </select>
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('phone');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="phone"
				placeholder="<?php echo translate('employee_phone_number');?>" value="<?php echo $row['phone'];?>" />
		</div>
	</div>

    <div class="form-group">
        <label class="control-label col-md-4 col-sm-4">
        	<?php echo translate('address');?>
        </label>
        <div class="col-md-6 col-sm-6">
            <textarea class="form-control" name="address" placeholder="<?php echo translate('employee_address');?>" rows="3"><?php echo $row['address'];?></textarea>
        </div>
    </div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="file" name="userfile"
				placeholder="<?php echo translate('employee_image');?>" />
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