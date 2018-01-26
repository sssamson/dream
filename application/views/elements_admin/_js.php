<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/tether/dist/js/tether.min.js"></script>
<script src="/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/assets/vendor/pace/pace.min.js"></script>
<script src="/assets/vendor/formvalidator/jquery.form-validator.min.js"></script>
<script src="/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/assets/vendor/datatables/DataTables-1.10.15/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/DataTables-1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="/assets/vendor/datatables/Responsive-2.1.1/js/dataTables.responsive.min.js"></script>
<script src="/assets/vendor/datatables/Responsive-2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="/assets/vendor/bootstrap-select/bootstrap-select.min.js"></script>
<script src="/assets/vendor/select2/js/select2.min.js"></script>
<script src="/assets/vendor/moment/moment.min.js"></script>
<script src="/assets/vendor/summernote/summernote.js"></script>
<script src="/assets/back/js/global.js"></script>

<?php
if (!empty($page['js'])) {
	echo output_java_script($page['js']);
}
?>
