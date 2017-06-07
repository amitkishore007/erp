<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets/backend/plugins/jquery/jquery-1.9.1.min.js"></script>
	<script src="assets/backend/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
	<script src="assets/backend/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
	<script src="assets/backend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
		<script src="assets/backend/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/backend/crossbrowserjs/respond.min.js"></script>
		<script src="assets/backend/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="assets/backend/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/backend/plugins/jquery-cookie/jquery.cookie.js"></script>
	<!-- ================== END BASE JS ================== -->

	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="assets/backend/plugins/DataTables/js/jquery.dataTables.js"></script>
	<script src="assets/backend/plugins/DataTables/js/dataTables.tableTools.js"></script>
	<script src="assets/backend/js/table-manage-tabletools.demo.min.js"></script>
	<script src="assets/backend/plugins/parsley/dist/parsley.js"></script>
	<script src="assets/backend/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="assets/backend/js/ui-modal-notification.demo.min.js"></script>
	<script src="assets/backend/plugins/ionRangeSlider/js/ion-rangeSlider/ion.rangeSlider.min.js"></script>
	<script src="assets/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
	<script src="assets/backend/plugins/masked-input/masked-input.min.js"></script>
	<script src="assets/backend/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="assets/backend/plugins/password-indicator/js/password-indicator.js"></script>
	<script src="assets/backend/plugins/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="assets/backend/plugins/bootstrap-select/bootstrap-select.min.js"></script>
	<script src="assets/backend/js/form-plugins.demo.min.js"></script>
	<script src="assets/backend/plugins/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
	<script src="assets/backend/plugins/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
	<script src="assets/backend/js/form-wysiwyg.demo.min.js"></script>
	<script src="assets/backend/js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	
	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageTableTools.init();
			Notification.init();
			FormWysihtml5.init();
			FormPlugins.init();
		});
	</script>

	<!-- Show notifications -->
    <?php if ($this->session->flashdata('flash_message') != ""): ?>

        <script type="text/javascript">


            $.gritter.add({
                title: '<?php echo $this->session->flashdata("flash_message");?>',
                text: '',
                time: 5000
            });

        </script>

    <?php endif;?>

</body>
</html>