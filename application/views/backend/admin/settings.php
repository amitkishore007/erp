<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?admin/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/settings">
				<?php echo translate('system_settings');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
	<br><br>

	<div class="row">
		<div class="col-md-8">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('general_informations');?></h4>
                </div>
                <div class="panel-body">
                   <?php
					    echo form_open(base_url() . 'index.php?admin/settings/update/' , array(
					        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
					    ));
					?>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('company_name');?>
							</label>
							<div class="col-md-9 col-sm-9">
								<input class="form-control" type="text" name="company_name" data-parsley-required="true"
									placeholder="<?php echo translate('company_name');?>"
										value="<?php echo $this->db->get_where('settings' , array('type' => 'company_name'))->row()->description;?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('company_email');?>
							</label>
							<div class="col-md-9 col-sm-9">
								<input class="form-control" type="text" name="company_email" data-parsley-required="true"
									placeholder="<?php echo translate('company_email');?>"
										value="<?php echo $this->db->get_where('settings' , array('type' => 'company_email'))->row()->description;?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('address');?>
							</label>
							<div class="col-md-9 col-sm-9">
								<input class="form-control" type="text" name="address" placeholder="<?php echo translate('address');?>"
									value="<?php echo $this->db->get_where('settings' , array('type' => 'address'))->row()->description;?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('phone');?>
							</label>
							<div class="col-md-9 col-sm-9">
								<input class="form-control" type="text" name="phone" placeholder="<?php echo translate('phone');?>"
									value="<?php echo $this->db->get_where('settings' , array('type' => 'phone'))->row()->description;?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">
								<?php echo translate('currency');?>
							</label>
							<div class="col-md-9 col-sm-9">
								<input class="form-control" type="text" name="currency" placeholder="<?php echo translate('currency');?>"
									value="<?php echo $this->db->get_where('settings' , array('type' => 'currency'))->row()->description;?>" />
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3"></label>
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-success"><?php echo translate('update');?></button>
							</div>
						</div>

					<?php echo form_close();?>
                </div>
            </div>
            <!-- end panel -->
		</div>
		<div class="col-md-4">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('update_logo');?></h4>
                </div>
                <div class="panel-body">
                    <?php
					    echo form_open(base_url() . 'index.php?admin/settings/upload_logo/' , array(
					        'class' => 'form-horizontal ' , 'enctype' => 'multipart/form-data'
					    ));
					?>

						<div class="form-group">
							<div class="col-md-12 col-sm-12">
								<img style="height: 50% ; width: 50%;" src="<?php echo base_url();?>uploads/logo/logo.png">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-12 col-sm-12">
								<input class="form-control" type="file" name="userfile"
									placeholder="<?php echo translate('system_logo');?>" />
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-success"><?php echo translate('update');?></button>
							</div>
						</div>

					<?php echo form_close();?>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>
</div>
