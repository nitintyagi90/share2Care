<footer class="footer text-right">2018 © Share2care.</footer>
</div>
</div>
<!-- END wrapper -->
<script>var resizefunc = []; </script>
<!-- jQuery  -->
<script src="<?php echo base_url();?>admin/assets/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/detect.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/fastclick.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/waves.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/jquery.slimscroll.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/switchery/switchery.min.js"></script>
<!-- jQuery  -->
<script src="<?php echo base_url();?>admin/plugins/waypoints/jquery.waypoints.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/counterup/jquery.counterup.min.js"></script>
<!-- App js -->
<script src="<?php echo base_url();?>admin/assets/js/jquery.core.js"></script>
<script src="<?php echo base_url();?>admin/assets/js/jquery.app.js"></script>
<!-- init -->
<script src="<?php echo base_url();?>admin/assets/pages/jquery.datatables.init.js"></script>
<script>
$(document).ready(function () {
$('#datatable').dataTable();
$('#datatable-keytable').DataTable({keys: true});
$('#datatable-responsive').DataTable();
$('#datatable-colvid').DataTable({
"dom": 'C<"clear">lfrtip',
"colVis": {
"buttonText": "Change columns"
}
});
$('#datatable-scroller').DataTable({
ajax: "../plugins/datatables/json/scroller-demo.json",
deferRender: true,
scrollY: 380,
scrollCollapse: true,
scroller: true
});
var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
var table = $('#datatable-fixed-col').DataTable({
scrollY: "300px",
scrollX: true,
scrollCollapse: true,
paging: false,
fixedColumns: {
leftColumns: 1,
rightColumns: 1
}
});
});
TableManageButtons.init();
</script>
<script src="<?php echo base_url();?>admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>admin/plugins/datatables/responsive.bootstrap.min.js"></script>
<!-- init -->
<script src="<?php echo base_url();?>admin/assets/pages/jquery.datatables.init.js"></script>
</body>
</html>