<div id="footer">
    <p>Copyright 2013 &copy; <a href="http://me.folarium.com">Fachrur Rois H</a></p>
</div>
</div>

<?php
include 'help.php';
include 'doc.php';
include 'info.php';
?>
<script src="<?= base_url('assets/lib/flot/jquery.flot.js') ?>"></script>
<script type="text/javascript">
    $('.timepicker5').timepicker({
        template: false,
        showInputs: false,
        minuteStep: 5
    });
</script>
<script>window.jQuery || document.write('<script src="<?= base_url('assets/lib/jquery.min.js') ?>"><\/script>')</script> 
<script src="<?= base_url('assets/lib/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/lib/validationengine/js/jquery.validationEngine.js') ?>"></script>	
<script src="<?= base_url('assets/lib/jquery-validation-1.11.1/dist/jquery.validate.min.js') ?>"></script> 
<script src="<?= base_url('assets/lib/switch/static/js/bootstrap-switch.min.js') ?>"></script>
<script>
    $(function() { 
        formValidation(); 
        simTable(); 
        formWizard();
        simSortable();
        formWizard();
        metisChart();
    });
</script>	

<script src="<?= base_url('assets/lib/sparkline/jquery.sparkline.min.js') ?>"></script>
<script src="<?= base_url('assets/lib/flot/jquery.flot.js') ?>"></script>
<script src="<?= base_url('assets/lib/flot/jquery.flot.selection.js') ?>"></script>
<script src="<?= base_url('assets/lib/flot/jquery.flot.resize.js') ?>"></script>     
<!--js untuk tabel sorter -->
<script src="<?= base_url('assets/lib/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?= base_url('assets/lib/datatables/DT_bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/lib/tablesorter/js/jquery.tablesorter.min.js') ?>"></script>

<script src="<?= base_url('assets/js/main.js') ?>"></script> 
<script src="<?= base_url('assets/lib/jasny/js/bootstrap-inputmask.js') ?>"></script> 

</body>
</html>

