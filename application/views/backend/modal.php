<?php
    $currency_code   =   $this->db->get_where('settings' , array(
                        'type' => 'currency'
                ))->row()->description;
?>

<!-- SIMPLE AJAX MODAL -->
<script type="text/javascript">
    function showAjaxModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        //jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal-dialog').modal('show', {backdrop: 'true'});
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal-dialog .modal-body').html(response);
            }
        });
    }
    </script>


<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <?php echo $this->db->get_where('settings' , array('type' => 'company_name'))->row()->description;?>
                </h4>
            </div>
            <div class="modal-body">
                <!-- ajax content to be loaded here -->
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>


<!-- LARGE AJAX MODAL -->
<script type="text/javascript">
    function showMessageModal(url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        //jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal-message').modal('show', {backdrop: 'true'});
        
        // SHOW AJAX RESPONSE ON REQUEST SUCCESS
        $.ajax({
            url: url,
            success: function(response)
            {
                jQuery('#modal-message .modal-body').html(response);
            }
        });
    }
</script>

<!-- #modal-message -->
<div class="modal modal-message fade" id="modal-message">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    <?php echo $this->db->get_where('settings' , array('type' => 'company_name'))->row()->description;?>
                </h4>
            </div>
            <div class="modal-body">
                <!-- ajax content goes here -->
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<!---- DELETE MODAL -->
<script type="text/javascript">
    function showDeleteModal(delete_url)
    {
        // SHOWING AJAX PRELOADER IMAGE
        //jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="assets/images/preloader.gif" /></div>');
        
        // LOADING THE AJAX MODAL
        jQuery('#modal_delete').modal('show', {backdrop: 'true'});
        $("#delete_link").attr("href", delete_url);
        
    }
</script>

<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Are you sure to delete the information?</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger m-b-0">
                    <h4><i class="fa fa-info-circle"></i> Informations deleted can't be restored !!!</h4>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                <a href="#" id="delete_link" class="btn btn-sm btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>




