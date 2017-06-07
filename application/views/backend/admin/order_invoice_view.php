<!-- begin #content -->
<div id="content" class="content">
	
	<?php 
        $order_invoice_details   =   $this->db->get_where('order' , array(
                                            'order_id' => $order_id
                                        ))->result_array();
        foreach ($order_invoice_details as $row):
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
                    <strong><?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->name;?></strong><br />
                    <?php echo translate('phone');?>: <?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->phone;?><br />
                    <?php echo translate('email');?>: <?php echo $this->db->get_where('customer' , array('customer_id' => $row['customer_id']))->row()->email;?><br />
                    <?php echo translate('shipping_address');?>: <?php echo $row['shipping_address'];?>
                </address>
            </div>
            <div class="invoice-date">
                <div class="date m-t-5"><?php echo date('dS M, Y' , $row['creating_timestamp']);?></div>
                <div class="invoice-detail">
                    <strong><?php echo translate('order_code');?>: <?php echo $row['order_number'];?></strong><br />
                    <strong>
                        <?php echo translate('order_status');?>: 
                            <?php if ($row['order_status'] == 0) {
                                echo translate('pending');
                            } else if ($row['order_status'] == 1) {
                                echo translate('approved');
                            } else {
                                echo translate('rejected');
                            }

                        ?>
                    </strong><br />
                    <strong>
                        <?php echo translate('payment_status');?>: 
                            <?php if ($row['payment_status'] == 0) {
                                echo translate('unpaid');
                            } else if ($row['payment_status'] == 1) {
                                echo translate('paid');
                            }
                        ?>
                    </strong>
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
                        $products   = json_decode($row['order_entries']);
                        foreach ($products as $product):
                    ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo $this->db->get_where('product' , array('product_id' => $product->product_id))->row()->serial_number;?></td>
                            <td><?php echo $this->db->get_where('product' , array('product_id' => $product->product_id))->row()->name;?></td>
                            <td><?php echo $currency . ' ' . $product->selling_price;?></td>
                            <td><?php echo $product->quantity;?></td>
                            <td><?php echo $currency . ' ' . $product->selling_price * $product->quantity;?></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                    <tbody>
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><?php echo translate('grand_total');?></strong></td>
                        <td class="text-right"><?php echo $currency . ' ' . $row['grand_total'];?></td>
                    </tr>
                    <?php if ($row['due'] != 0):?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong><?php echo translate('due');?></strong></td>
                            <td class="text-right"><?php echo $currency . ' ' . round($row['due'] , 2);?></td>
                        </tr>
                    <?php endif;?>
                    </tbody>
                </table>
            </div>
            <div class="table-responsive">
                <table class="table table-invoice table-bordered">
                    <thead>
                        <tr>
                            <th><?php echo translate('payments');?></th>
                            <th><?php echo translate('date');?></th>
                            <th><?php echo translate('amount');?></th>
                            <th><?php echo translate('payment_method');?></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $count = 1; 
                        $number_of_payments =   $this->db->get_where('payment' , array(
                            'order_id' => $row['order_id']
                        ))->result_array();
                        foreach ($number_of_payments as $row2):
                    ?>
                        <tr>
                            <td><?php echo $count++;?></td>
                            <td><?php echo date('dS M, Y' , $row2['timestamp']);?></td>
                            <td><?php echo $currency . ' ' . $row2['amount'];?></td>
                            <td>
                                <?php 
                                    if ($row2['method'] == 1) { 
                                        echo translate('cash');
                                    }
                                    else if ($row2['method'] == 2) {
                                        echo translate('check');
                                    }
                                    else {
                                        echo translate('card');
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="invoice-price">
                <div class="invoice-price-left">
                    <div class="invoice-price-row">
                        <div class="sub-price">
                            <small><?php echo translate('sub_total');?></small>
                            <?php echo $currency . ' ' . $row['sub_total'];?>
                        </div>
                        <div class="sub-price">
                            <i class="fa fa-plus"></i>
                        </div>
                        <div class="sub-price">
                            <?php echo $row['vat_percentage'];?> % VAT
                        </div>
                        <div class="sub-price">
                            <i class="fa fa-minus"></i>
                        </div>
                        <div class="sub-price">
                            <?php echo $row['discount_percentage'];?> % <?php echo translate('discount');?>
                        </div>
                    </div>
                </div>
                <div class="invoice-price-right">
                    <small><?php echo translate('total_paid');?></small>
                    <?php 
                        $payments = $this->db->get_where('payment' , array(
                            'order_id' => $row['order_id']
                        ))->result_array();
                        $total_payment = 0;
                        foreach ($payments as $payment) {
                            $total_payment += $payment['amount'];
                        }
                        echo $currency . ' ' . $total_payment;
                    ?>
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