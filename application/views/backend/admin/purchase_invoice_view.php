<!-- begin #content -->
<div id="content" class="content">
	
	<?php 
        $purchase_invoice_details   =   $this->db->get_where('purchase' , array(
                                            'purchase_id' => $purchase_id
                                        ))->result_array();
        foreach ($purchase_invoice_details as $row):
    ?>
	<!-- begin invoice -->
	<div class="invoice">
        <div class="invoice-company">
            <span class="pull-right hidden-print">
            <a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-success m-b-10"><i class="fa fa-print m-r-5"></i> Print</a>
            </span>
            <?php echo $system_name;?>
        </div>
        <div class="invoice-header">
            <div class="invoice-from">
                <small><?php echo translate('from');?></small>
                <address class="m-t-5 m-b-5">
                    <strong><?php echo $system_name;?></strong><br />
                    <?php echo $system_address;?><br />
                    <?php echo translate('phone');?>: <?php echo $system_phone;?><br />
                    <?php echo translate('email');?>: <?php echo $system_email;?>
                </address>
            </div>
            <div class="invoice-to">
                <small><?php echo translate('to');?></small>
                <address class="m-t-5 m-b-5">
                    <strong><?php echo $this->db->get_where('supplier' , array('supplier_id' => $row['supplier_id']))->row()->company;?></strong><br />
                    <?php echo $this->db->get_where('supplier' , array('supplier_id' => $row['supplier_id']))->row()->name;?><br />
                    <?php echo translate('phone');?>: <?php echo $this->db->get_where('supplier' , array('supplier_id' => $row['supplier_id']))->row()->phone;?><br />
                    <?php echo translate('email');?>: <?php echo $this->db->get_where('supplier' , array('supplier_id' => $row['supplier_id']))->row()->email;?>
                </address>
            </div>
            <div class="invoice-date">
                <div class="date m-t-5"><?php echo date('dS M, Y' , $row['timestamp']);?></div>
                <div class="invoice-detail">
                    <strong><?php echo translate('purchase_code');?>: <?php echo $row['purchase_code'];?></strong>
                </div>
            </div>
        </div>
        <div class="invoice-content">
            <div class="table-responsive">
                <table class="table table-invoice table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo translate('serial_no');?></th>
                            <th><?php echo translate('products');?></th>
                            <th><?php echo translate('unit_price');?></th>
                            <th><?php echo translate('quantity');?></th>
                            <th><?php echo translate('total');?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $count      =   1;
                        $products   = json_decode($row['purchase_entries']);
                        foreach ($products as $product):
                    ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $this->db->get_where('product' , array('product_id' => $product->product_id))->row()->serial_number;?></td>
                            <td><?php echo $this->db->get_where('product' , array('product_id' => $product->product_id))->row()->name;?></td>
                            <td><?php echo $currency . ' ' . $product->purchase_price;?></td>
                            <td><?php echo $product->quantity;?></td>
                            <td><?php echo $currency . ' ' . $product->purchase_price * $product->quantity;?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="invoice-price">
                <div class="invoice-price-left">
                </div>
                <div class="invoice-price-right">
                    <small><?php echo translate('total_amount');?></small>
                    <?php echo $currency . ' ' . $this->db->get_where('payment' , array('purchase_id' => $purchase_id))->row()->amount;?>
                </div>
            </div>
        </div>
        <div class="invoice-footer text-muted">
            <p class="text-center m-b-5">
                <?php echo translate('thank_you_for_your_business');?>
            </p>
            <p class="text-center">
                <span class="m-r-10"><i class="fa fa-globe"></i> <?php echo $system_name;?></span>
                <span class="m-r-10"><i class="fa fa-phone"></i> <?php echo $system_phone;?></span>
                <span class="m-r-10"><i class="fa fa-envelope"></i> <?php echo $system_email;?></span>
            </p>
        </div>
    </div>
	<!-- end invoice -->
<?php endforeach;?>
</div>
<!-- end #content -->