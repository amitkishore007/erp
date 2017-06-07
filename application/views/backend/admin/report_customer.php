<script>

var chart = AmCharts.makeChart("chartdiv", {
    "theme": "dark",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [
	<?php
		$this->db->select_sum('amount');
		$this->db->group_by('customer_id'); 
		$this->db->order_by('timestamp' , 'desc');
		$this->db->select('timestamp, customer_id, method, type');
		
		$this->db->where('timestamp >=' , $timestamp_start);
		$this->db->where('timestamp <=' , $timestamp_end);
		$this->db->where('customer_id !=' , 0);
		$payments	=	$this->db->get('payment')->result_array();
		foreach ($payments as $row):
			?>
				{
                    "customer": "<?php echo $this->db->get_where('customer',
										array('customer_id' => $row['customer_id']))->row()->name ;?>",
                    "amount": <?php echo $row['amount'];?>,
                    "color": "#00ACAC"
                },
	<?php endforeach;?> 
	],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "amount"
    }],
    "depth3D": 20,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "customer",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 30
    },
	"pathToImages"	: "<?php echo base_url();?>assets/backend/plugins/amcharts/images/",
	"amExport": {
					"top": 0,
                    "right": 0,
                    "buttonColor": '#EFEFEF',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "customer payment comparison",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	}
});
</script>

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
			<a href="<?php echo base_url();?>index.php?admin/report/payment">
				<?php echo translate('payments');?>
			</a>
		</li>
		<li>
			<a href="<?php echo base_url();?>index.php?admin/report/customer">
				<?php echo translate('customer_payments');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->
	<br>

	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<!-- begin panel -->
	        <div class="panel panel-inverse" data-sortable-id="ui-widget-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">
                    	<?php echo translate('select_date_range');?>
                    </h4>
                </div>
                <div class="panel-body">
                    <?php 
					    echo form_open(base_url() . 'index.php?admin/report/' . $report_type , array(
					        'class' => 'form-horizontal form-bordered' , 'data-parsley-validate' => 'true' , 'enctype' => 'multipart/form-data'
					    ));
					?>

						<div class="form-group">
						    <label class="col-md-3"><?php echo translate('date_range');?></label>
						    <div class="col-md-8">
						        <div class="input-group input-daterange">
						            <input type="text" class="form-control" name="start"
						            	value="<?php echo date('m/d/Y' , $timestamp_start);?>" />
						            <span class="input-group-addon"><?php echo translate('to');?></span>
						            <input type="text" class="form-control" name="end"
						            	value="<?php echo date('m/d/Y' , $timestamp_end);?>" />
						        </div>
						    </div>
						</div>

						<div class="form-group">
							<label class="col-md-3 col-sm-3"></label>
							<div class="col-md-8 col-sm-8">
								<button type="submit" class="btn btn-success"><?php echo translate('go');?></button>
							</div>
						</div>

					<?php echo form_close();?>
                </div>
            </div>
	        <!-- end panel -->
		</div>
		<div class="col-md-3">
			<div class="alert alert-info fade in m-b-15">
				<strong>
					<?php echo date("d M, Y" , $timestamp_start) . " - " . date("d M, Y" , $timestamp_end);?>
				</strong>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
	        <div class="widget-chart bg-black">
	            <div class="">
	                <h4 class="chart-title">
	                    
	                </h4>
	                <div id="chartdiv" style="height: 500px; width: 100%;"></div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<!-- begin panel -->
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title"><?php echo translate('customer_payments');?></h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        
                        <table id="data-table" class="table table-striped table-bordered nowrap display" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo translate('date');?></th>
                                    <th><?php echo translate('amount');?></th>
                                    <th><?php echo translate('customer');?></th>
                                    <th><?php echo translate('type');?></th>
                                    <th><?php echo translate('method');?></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            	$count	=	1;
                            	foreach ($payments as $row):
                            ?>
                                <tr>
                                    <td><?php echo $count++;?></td>
                                    <td><?php echo date("d F, Y" , $row['timestamp']);?></td>
                                    <td><?php echo $currency . ' ' . $row['amount'];?></td>
                                    <td>
                                    	<?php echo $this->db->get_where('customer' , array(
                                    		'customer_id' => $row['customer_id']
                                    	))->row()->name;?>
                                    </td>
                                    <td>
                                    	<?php if ($row['type'] == 'income') {
                                    		echo translate('income');
                                    	} else {
                                    		echo translate('expense');
                                    	}?>
                                    </td>
                                    <td>
                                    	<?php if ($row['method'] == 1) {
                                    		echo translate('cash');
                                    	} else if ($row['method'] == 2) {
                                    		echo translate('check');
                                    	} else {
                                    		echo translate('card');
                                    	}?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
		</div>
	</div>

</div>
























