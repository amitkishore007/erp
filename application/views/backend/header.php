<?php
	$logged_in_user_type	=	$this->session->userdata('login_type');
	$logged_in_user_id		=	$this->session->userdata('user_id'); 
	$logged_in_user_name	=	$this->session->userdata('name');
?>

<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?php echo base_url();?>" class="navbar-brand">
						<span class=""><img src="uploads/logo/logo.png" style="height: 100%;"></span> 
							<?php echo $system_name;?>
					</a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
				<?php if ($logged_in_user_type == 'admin'):?>
					<li>
					<?php 
					    echo form_open(base_url() . 'index.php?' . $logged_in_user_type . '/settings/select_language/' , array(
					        'class' => 'navbar-form full-width' , 'id' => 'language_form' 
					    ));
					?>
						<div class="form-group">
						    <select class="form-control" data-size="10" data-live-search="true" data-style="btn-inverse" name="language"
						    	onchange="return language_form_submit()">
				                <?php 
				                	$fields	=	$this->db->list_fields('language');
				                	foreach ($fields as $field):
				                		if ($field == 'phrase_id' || $field == 'phrase') continue;
				                		$current_language	=	$this->db->get_where('settings' , array('type' => 'language'))->row()->description;
				                ?>
				                <option value="<?php echo $field;?>"
				                	<?php if ($current_language == $field) echo 'selected';?>>
				                		<?php echo $field;?>
				                </option>
				                <?php endforeach;?>
				            </select>
						</div>
					<?php echo form_close();?>
					</li>
				<?php endif;?>
					<li class="dropdown navbar-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
							<img src="<?php echo $this->crud_model->get_image_url($logged_in_user_type , $logged_in_user_id);?>"> 
							<span class="hidden-xs"><?php echo $logged_in_user_name;?></span> <b class="caret"></b>
						</a>
						<ul class="dropdown-menu animated fadeInLeft">
							<li class="arrow"></li>
							<li>
								<a href="<?php echo base_url();?>index.php?<?php echo $logged_in_user_type;?>/profile_settings">
									<?php echo translate('profile');?>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url();?>index.php?<?php echo $logged_in_user_type;?>/message">
									<?php echo translate('messages');?>
								</a>
							</li>
							<?php if ($logged_in_user_type == 'admin'):?>
								<li>
									<a href="<?php echo base_url();?>index.php?admin/settings">
										<?php echo translate('system_settings');?>
									</a>
								</li>
							<?php endif;?>
							<li class="divider"></li>
							<li><a href="<?php echo base_url();?>index.php?login/logout"><?php echo translate('log_out');?></a></li>
						</ul>
					</li>
				</ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>
		<!-- end #header -->

<script type="text/javascript">
	function language_form_submit() {

		$("#language_form").submit();
		
	}
</script>