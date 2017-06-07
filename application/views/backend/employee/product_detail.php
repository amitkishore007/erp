<?php
    $system_currency    =   $this->db->get_where('settings' , array(
        'type' => 'currency'
    ))->row()->description;
    $product_detail     =   $this->db->get_where('product' , array(
                    'product_id' => $param2
                ))->result_array();
    foreach ($product_detail as $row):
?>

<div class="row">
    <div class="col-md-4 col-sm-4">
        <!-- begin panel -->
        <div class="panel panel-success" data-sortable-id="ui-widget-1">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?php echo translate('product_image');?>
                </h4>
            </div>
            <div class="panel-body">
                <img style="height: 100% ; width: 100%;" 
                    src="<?php echo $this->crud_model->get_image_url('product' , $row['product_id']);?>">
                <br><br>
                <p><strong><?php echo $row['name'];?></strong></p>
            </div>
        </div>
        <!-- end panel -->
    </div>

    <div class="col-md-8 col-sm-8">
        <!-- begin panel -->
        <div class="panel panel-success" data-sortable-id="ui-widget-1">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <?php echo translate('informations');?>
                </h4>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered nowrap" width="100%">
                    <tbody>
                        <tr>
                            <td><strong><?php echo translate('code');?></strong></td>
                            <td><?php echo $row['serial_number'];?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo translate('category');?></strong></td>
                            <td>
                                <?php
                                    if ($row['category_id'] > 0)
                                        echo $this->db->get_where('category' , array(
                                                'category_id' => $row['category_id']
                                        ))->row()->name;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php echo translate('sub_category');?></strong></td>
                            <td>
                                <?php
                                    if ($row['sub_category_id'] > 0)
                                        echo $this->db->get_where('sub_category' , array(
                                                'sub_category_id' => $row['sub_category_id']
                                        ))->row()->name;
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><?php echo translate('selling_price');?></strong></td>
                            <td><?php echo $system_currency . ' ' . $row['selling_price'];?></td>
                        </tr>
                        <tr>
                            <td><strong><?php echo translate('notes');?></strong></td>
                            <td><?php echo $row['note'];?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end panel -->
    </div>


</div>


<?php endforeach;?>
