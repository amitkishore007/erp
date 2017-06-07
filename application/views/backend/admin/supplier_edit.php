
<?php
	$update	=	$this->db->get_where('supplier' , array(
					'supplier_id' => $param2
				))->result_array();
	foreach ($update as $row):
?>

<?php 
    echo form_open(base_url() . 'index.php?admin/supplier/edit/' . $row['supplier_id'] , array(
        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
    ));
?>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<img style="height: 50% ; width: 50%;" src="<?php echo $this->crud_model->get_image_url('supplier' , $row['supplier_id']);?>">
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('company_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="company"
				placeholder="<?php echo translate('supplier_company');?>" value="<?php echo $row['company'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('supplier_name');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="name" required
				placeholder="<?php echo translate('supplier_name');?>" value="<?php echo $row['name'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('email');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="email" name="email" required
				placeholder="<?php echo translate('supplier_email');?>" value="<?php echo $row['email'];?>" />
		</div>
	</div>

    <div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('phone');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="text" name="phone"
				placeholder="<?php echo translate('supplier_phone_number');?>" value="<?php echo $row['phone'];?>" />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-4 col-sm-4">
			<?php echo translate('image');?>
		</label>
		<div class="col-md-6 col-sm-6">
			<input class="form-control" type="file" name="userfile"
				placeholder="<?php echo translate('supplier_image');?>" />
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
