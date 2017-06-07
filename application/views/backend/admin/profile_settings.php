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
			<a href="<?php echo base_url();?>index.php?admin/profile_settings">
				<?php echo translate('profile_settings');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
	<div class="row">
		<div class="col-md-6">
			<!-- begin panel -->
	        <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">
                        <?php echo translate('basic_informations');?>
                    </h4>
                </div>
                <div class="panel-body">
                    <?php 
                        echo form_open(base_url() . 'index.php?admin/profile_settings/update/' , array(
                            'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
                        ));
                    ?>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('image');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <img style="height: 50% ; width: 50%;" src="<?php echo $this->crud_model->get_image_url($logged_in_user_type , $logged_in_user_id);?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('name');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" name="name" data-parsley-required="true"
                                    placeholder="<?php echo translate('your_name');?>"
                                        value="<?php echo $logged_in_user_name;?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('email');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="text" name="email" data-parsley-required="true"
                                    placeholder="<?php echo translate('your_email');?>"
                                        value="<?php echo $this->db->get_where($logged_in_user_type , array(
                                                            $logged_in_user_type . '_id' => $logged_in_user_id
                                                    ))->row()->email;?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3">
                                <?php echo translate('image');?>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" type="file" name="userfile"
                                    placeholder="<?php echo translate('admin_image');?>" />
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
		<div class="col-md-6">
            <!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">
                        <?php echo translate('change_password');?>
                    </h4>
                </div>
                <div class="panel-body">
                    <?php 
                        echo form_open(base_url() . 'index.php?admin/profile_settings/change_password/' , array(
                            'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
                        ));
                    ?>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5">
                                <?php echo translate('current_password');?>
                            </label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" type="password" name="previous_password" data-parsley-required="true"
                                    placeholder="<?php echo translate('your_present_password');?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5">
                                <?php echo translate('new_password');?>
                            </label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" type="password" name="new_password" data-parsley-required="true"
                                    placeholder="<?php echo translate('your_new_password');?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5">
                                <?php echo translate('confirm_new_password');?>
                            </label>
                            <div class="col-md-7 col-sm-7">
                                <input class="form-control" type="password" name="confirm_password" data-parsley-required="true"
                                    placeholder="<?php echo translate('confirm_new_password');?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5"></label>
                            <div class="col-md-7 col-sm-7">
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
	</div>
</div>