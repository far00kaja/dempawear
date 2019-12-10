
			
		</div>
	</section>
	<!--================End Feature Product Area =================-->

	<!--================ Subscription Area ================-->

	<!--================ End Subscription Area ================-->

	<!--================ start footer Area  =================-->
	<footer class="footer-area section_gap">
		
			<!-- <div class="row footer-bottom d-flex justify-content-between align-items-center"> -->
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		<!-- </div> -->
	</footer>
	<!--================ End footer Area  =================-->



	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="<?= base_url()?>assets/fashiop/js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/popper.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/bootstrap.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/stellar.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/isotope/isotope-min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/flipclock/timer.js"></script>
	<script src="<?= base_url()?>assets/fashiop/vendors/counter-up/jquery.counterup.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/mail-script.js"></script>
	<script src="<?= base_url()?>assets/fashiop/js/theme.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

	<script>
	
	function deleteConfirm() {
event.preventDefault(); // prevent form submit
var form = event.target.form; // storing the form
        swal({
  title: "Are you sure?",
  text: "You Can't get back this data again.",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Delete it!",
  cancelButtonText: "No, cancel please!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    form.submit();          // submitting the form when user press yes
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
	</script>
	
<script>
	$(document).ready(function() {
    $('#example').DataTable();
} );
	</script>

</body>

</html>
