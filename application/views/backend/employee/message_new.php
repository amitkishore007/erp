<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?employee/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?employee/message_new">
				<?php echo translate('compose_message');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<div class="row">
		<div class="col-md-4 col-sm-4">
			<a href="<?php echo base_url();?>index.php?employee/message_new" class="btn btn-success p-l-40 p-r-40">
				<?php echo translate('compose_new_message');?>
			</a>
			<br><br>
            <ul class="nav nav-pills nav-stacked nav-sm">
            <?php
                $current_user   =   $this->session->userdata('login_type') . '-' . $this->session->userdata('user_id');
                
                $this->db->where('sender' , $current_user);
                $this->db->or_where('receiver' , $current_user);
                $message_threads    =   $this->db->get('message_thread')->result_array();
                foreach ($message_threads as $row):
                // defining the user to show
                if ($row['sender'] == $current_user)
                    $user_to_show   =   explode('-' , $row['receiver']);
                if ($row['receiver'] == $current_user)
                    $user_to_show   =   explode('-' , $row['sender']);

                $user_to_show_type      =   $user_to_show[0];
                $user_to_show_id        =   $user_to_show[1];
                $message_thread_code    =   $row['message_thread_code'];

            ?>
                <li>
                	<a href="<?php echo base_url();?>index.php?employee/message_read/<?php echo $message_thread_code;?>">
                		<i class="fa fa-fw m-r-5 fa-circle text-success"></i>
                		<?php echo $this->db->get_where($user_to_show_type , array($user_to_show_type.'_id' => $user_to_show_id))->row()->name;?>
                		<span class="label label-default f-s-10" style="margin-left: 15px;">
                			<?php echo $user_to_show_type;?>
                		</span>
                	</a>
                </li>
            <?php endforeach;?>
            </ul>
		</div>
		<div class="col-md-8 col-sm-8">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('compose_a_message');?></h4>
                </div>
                <div class="panel-body">
                	<?php 
					    echo form_open(base_url() . 'index.php?employee/message_new/send_new_message/' , array(
					        'class' => 'form-horizontal' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
					    ));
					?>

						<div class="form-group">
							<div class="col-md-12 col-sm-12">
							    <select class="form-control" data-size="10" name="receiver" readonly>
					                <option value="admin-1" selected>
					                	<?php echo $this->db->get_where('admin' , array(
					                		'admin_id' => 1
					                	))->row()->name;?>
					                </option>
					            </select>
							</div>
						</div>

						<div class="form-group">
					        <div class="col-md-12 col-sm-12">
					            <textarea class="textarea form-control" id="wysihtml5" name="message_body" rows="15" required></textarea>
					        </div>
					    </div>


						<div class="form-group">
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-success"><?php echo translate('send');?></button>
							</div>
						</div>

					<?php echo form_close();?>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>

</div>