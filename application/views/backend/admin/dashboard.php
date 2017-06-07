<!-- begin #content -->
<div id="content" class="content">

	<!-- begin breadcrumb -->
	<ol class="breadcrumb pull-right">
		<li>
			<a href="<?php echo base_url();?>index.php?admin/dashboard">
				<?php echo translate('dashboard');?>
			</a>
		</li>
	</ol>
	<!-- end breadcrumb -->

	<!-- begin page-header -->
	<h1 class="page-header"><?php echo $page_title;?></h1>
	<!-- end page-header -->

	<div class="row">
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-green">
				<div class="stats-icon"><i class="fa fa-users"></i></div>
				<div class="stats-info">
					<h4><?php echo translate('total_customers');?></h4>
					<p><?php echo $this->db->count_all('customer');?></p>	
				</div>
				<div class="stats-link">
					<a href="<?php echo base_url();?>index.php?admin/customer">
						<?php echo translate('view_customer_list');?> <i class="fa fa-arrow-circle-o-right"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-blue">
				<div class="stats-icon"><i class="fa fa-bell"></i></div>
				<div class="stats-info">
					<h4><?php echo translate('pending_orders');?></h4>
					<p>
						<?php 
							$this->db->like('order_status' , 0);
							$this->db->from('order');
							echo $this->db->count_all_results();
						?>
					</p>	
				</div>
				<div class="stats-link">
					<a href="<?php echo base_url();?>index.php?admin/orders">
						<?php echo translate('view_all_orders');?> <i class="fa fa-arrow-circle-o-right"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-purple">
				<div class="stats-icon"><i class="fa fa-dollar"></i></div>
				<div class="stats-info">
					<h4><?php echo translate('total_income_amount');?></h4>
					<p>
						<?php 
							$incomes	=	$this->db->get_where('payment' , array(
								'type' => 'income'
							))->result_array();
							$total_income = 0;
							foreach ($incomes as $row) {
								$total_income += $row['amount'];
							}
							echo $total_income;
						?>
					</p>	
				</div>
				<div class="stats-link">
					<a href="<?php echo base_url();?>index.php?admin/sale_invoice">
						<?php echo translate('view_sale_invoices');?> <i class="fa fa-arrow-circle-o-right"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
		<!-- begin col-3 -->
		<div class="col-md-3 col-sm-6">
			<div class="widget widget-stats bg-black">
				<div class="stats-icon"><i class="fa fa-money"></i></div>
				<div class="stats-info">
					<h4><?php echo translate('total_purchase_amount');?></h4>
					<p>
						<?php 
							$expenses	=	$this->db->get_where('payment' , array(
								'type' => 'expense'
							))->result_array();
							$total_expense = 0;
							foreach ($expenses as $row) {
								$total_expense += $row['amount'];
							}
							echo $total_expense;
						?>
					</p>	
				</div>
				<div class="stats-link">
					<a href="<?php echo base_url();?>index.php?admin/purchase_history">
						<?php echo translate('view_purchase_history');?> <i class="fa fa-arrow-circle-o-right"></i>
					</a>
				</div>
			</div>
		</div>
		<!-- end col-3 -->
	</div>

	<div class="row">
		<div class="col-md-12">
	        <div class="widget-chart bg-black">
	            <div class="">
	                <h4 class="chart-title">
	                    <?php echo translate('customer_payments');?>
	                </h4>
	                <div id="customer_bar_diagram" style="height: 400px; width: 100%;"></div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-12">
	        <div class="widget-chart bg-black">
	            <div class="">
	                <h4 class="chart-title">
	                    <?php echo translate('income_expense');?> (<?php echo translate('last_30_days');?>)
	                </h4>
	                <div id="payment_pie_diagram" style="height: 400px; width: 100%;"></div>
	            </div>
	        </div>
	    </div>
	</div>

	<div class="row">
		<div class="col-md-12">
	        <div class="widget-chart bg-black">
	            <div class="">
	                <h4 class="chart-title">
	                    <?php echo translate('products_in_stock');?>
	                </h4>
	                <div id="stock_bar_diagram" style="height: 400px; width: 100%;"></div>
	            </div>
	        </div>
	    </div>
	</div>

</div>
<!-- end #content -->




<script>

var chart = AmCharts.makeChart("customer_bar_diagram", {
    "theme": "dark",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [
	<?php
		$timestamp_start=	strtotime('-29 days', time());
		$timestamp_end	=	strtotime(date("m/d/Y"));
		$this->db->select_sum('amount');
		$this->db->group_by('customer_id'); 
		//$this->db->order_by('timestamp' , 'desc');
		//$this->db->select('timestamp, customer_id');
		
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
                    "buttonColor": '',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "Customer Payment Report",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	}
});
</script>

<script>
var chart = AmCharts.makeChart("payment_pie_diagram",{
	"type"			: "pie",
	"theme"			: "chalk",
	"titleField"	: "payment_type",
	"valueField"	: "amount",
	"innerRadius"	: "20%",
	"colorField"	: "color",
	"angle"			: "0",
	"depth3D"		: 0,
	"pathToImages"	: "<?php echo base_url();?>assets/backend/plugins/amcharts/images/",
	"amExport": {
					"top": 0,
                    "right": 0,
                    "buttonColor": '#EFEFEF',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "Payment Report",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	},
	"dataProvider"	: [
		<?php
		$timestamp_start=	strtotime('-29 days', time());
		$timestamp_end	=	strtotime(date("m/d/Y"));
		$income			=	0;
		$expense		=	0;
		$this->db->order_by('timestamp' , 'desc');
		$this->db->where('timestamp >=' , $timestamp_start);
		$this->db->where('timestamp <=' , $timestamp_end);
		$payments	=	$this->db->get('payment')->result_array();
		foreach ($payments as $row)
		{
			if ($row['type'] == 'income')
				$income		+=	$row['amount'];
			if ($row['type'] == 'expense');
				$expense	+=	$row['amount'];
		}
		?>
		{
			"payment_type": "Income",
			"amount": <?php echo $income;?>,
			"color" : "#1AACAB"
		},
		{
			"payment_type": "Expense",
			"amount": <?php echo $expense;?>,
			"color" : "#348FE2"
		},
	]
});
</script>

<script>

var chart = AmCharts.makeChart("stock_bar_diagram", {
    "theme": "dark",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [
	<?php
		$products	=	$this->db->get('product')->result_array();
		foreach ($products as $row):
			?>
				{
                    "product" : "<?php echo $row['name'];?>",
                    "in_stock": <?php echo $row['stock_quantity'];?>,
                    "color": "#5B6490"
                },
	<?php endforeach;?> 
	],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "in_stock"
    }],
    "depth3D": 20,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "product",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 30
    },
	"pathToImages"	: "<?php echo base_url();?>assets/backend/plugins/amcharts/images/",
	"amExport": {
					"top": 0,
                    "right": 0,
                    "buttonColor": '',
                    "buttonRollOverColor":'#DDDDDD',
					"imageFileName"	: "Products in stock",
                    "exportPNG":true,
                    "exportJPG":true,
                    "exportPDF":true,
                    "exportSVG":true
	}
});
</script>
