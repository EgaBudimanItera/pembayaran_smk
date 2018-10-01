   
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy;SMK Gajah Mada Bandar Lampung.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('.datatable').DataTable()    
  });
  
  function cekKoneksi() {
	$("#btnTes").prop('disabled',true);
	$.ajax({
		url: '<?=base_url()?>settingmodem/koneksi',
		type: 'get',
		success: function(res) {
			alert(res);
			$("#btnTes").prop('disabled',false);
		},
		error: function(err) {
			alert(err);
			$("#btnTes").prop('disabled',false);
		}
	});
	
  }
  
</script>
</body>
</html>