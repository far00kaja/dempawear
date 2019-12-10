<!-- JS select2 -->
<!-- <link href="path/to/select2.min.css" rel="stylesheet" /> -->
<!-- <script src="<?//= base_url()?>assets/plugins/select2/js/select2.min.js"></script> -->
<!-- jQuery -->

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?php// echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?php //echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?php //echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->

<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?php //echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php //echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- Ekko Lightbox -->
<!-- <script src="<?php// echo base_url();?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script> -->
				<!-- Filterizr-->
<!-- <script src="<?php// echo base_url();?>assets/plugins/filterizr/jquery.filterizr.min.js"></script> -->
<!-- Page specific script -->
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- <script src="path/to/select2.min.js"></script> -->
<script src="<?php echo base_url()?>assets/select2/dist/js/select2.min.js"></script>

<script>
  // $(function () {
  //   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
  //     event.preventDefault();
  //     $(this).ekkoLightbox({
  //       alwaysShowClose: true
  //     });
  //   });

  //   $('.filter-container').filterizr({gutterPixels: 3});
  //   $('.btn[data-filter]').on('click', function() {
  //     $('.btn[data-filter]').removeClass('active');
  //     $(this).addClass('active');
  //   });
  // })

function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}

function cetakConfirm(url){
	$('#btn-cetak').attr('action', url);
	$('#cetakModal').modal();
}
$(function() {
   $('#datetimepicker1').datetimepicker();
 });


$(document).ready(function(){

$('#nama').autocomplete({
				source: "<?php echo site_url('transaksi/get_autocomplete');?>",

				select: function (event, ui) {
						$(this).val(ui.item.label);
						$("#form_search").submit(); 
				}
		});

});



$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
</script>
<script>

 //Timepicker
 $('#timepicker').datetimepicker({
      format: 'LT'
    })
    
//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
</script>	

