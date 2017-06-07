<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?customer/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?customer/message">
				<?php echo translate('messaging');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<div class="row">
		<div class="col-md-4 col-sm-4">
			<a href="<?php echo base_url();?>index.php?customer/message_new" class="btn btn-success p-l-40 p-r-40 btn-sm">
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
                	<a href="<?php echo base_url();?>index.php?customer/message_read/<?php echo $message_thread_code;?>">
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
			<blockquote>
			  	<p>
			  		<?php echo translate('please_select_a_message_to_read');?>
			  	</p>
			</blockquote>
			<img style="width: 90%; height: 90%;" src="assets/backend/message.jpg">
		</div>
	</div>

</div>