	<?php 
		$catFotter = getCatFooter();
	 ?>
	<!-- Footer -->
	<footer class="bg3 p-t-0 p-b-0">
	<img src="<?= base_url().'/Assets/cba/logo1.png'?>" class="imgLogo" width="250px" height="100px" alt=""  >
		<div class="footer-container">
		
            <div class="contact-section">
				<div class="contact-row">
				<a href="https://api.whatsapp.com/send?phone=4271791640" class="redes"><i class="fab fa-whatsapp"></i></a>
					<h2 class="contact-phone">(427) 179 1640</h2>
				</div>
				<div class="contact-row">
				<a href="" class="redes"><i class="fas fa-map-marker location-icon"></i></a>
					<h2 class="contact-phone">San Juan del Río, Querétaro</h2>
				</div>
				<div class="contact-row">
				<a href="" class="redes"><i class="fas fa-envelope message-icon"></i></a>
					<h2 class="contact-phone">ventas1@carbonaudio.com.mx</h2>
				</div>
                
            </div>
            <div class="separator"></div>
            <div class="social-icons-section">
			<div class="container">
				<div class="row">
					<div class="col-sm">
											
					<div class="social-column">
					<div class="contact-row">
					
					</div>
						<ul class="social-icons">
							<li><a href="#" class="redes"><i class="fab fa-facebook"></i></a></li>
							<li><a href="#" class="redes"><i class="fab fa-youtube"></i></a></li>
							<li><a href="#" class="redes"><i class="fab fa-tiktok"></i></a></li>
							
						</ul>
					</div>
					</div>
					<div class="col-sm">
					<div class="qr-column">
						<img src="<?= base_url().'/Assets/cba/QR.png'?>" class="imgQr" width="150px" height="150px" alt=""  >
					</div>
					</div>
					
				</div>
				</div>
				
				
			</div>

        </div>
	</footer>
	<div id="whatsapp-button" class="whatsapp-button">
        <a href="https://api.whatsapp.com/send?phone=4271791640">
            <i class="fab fa-whatsapp"></i>
        </a>
    </div>

	<div class="aviso">
	<div class="">
		<div class="avisoFooter">
		 <p>Terminos y condiciones Aviso de privacidad</p>	
		 <p>Carbon-Audio y su logotipo son marcas registradas. Contenido sujeto a derechos de autor.</p>	
		</div>
		</div>
	</div>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<script>
	    const base_url = "<?= base_url(); ?>";
		const smony = "<?= SMONEY; ?>";
	</script>
<!--===============================================================================================-->	
	<script src="<?= media() ?>/tienda/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/bootstrap/js/popper.js"></script>
	<script src="<?= media() ?>/tienda/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?= media() ?>/tienda/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/slick/slick.min.js"></script>
	<script src="<?= media() ?>/tienda/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/parallax100/parallax100.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/sweetalert/sweetalert.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media() ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<!--===============================================================================================-->
	<script src="<?= media();?>/js/fontawesome.js"></script>
	<script src="<?= media() ?>/tienda/js/main.js"></script>
	<script src="<?= media();?>/js/functions_admin.js"></script>
	<script src="<?= media() ?>/js/functions_login.js"></script>
	<script src="<?= media() ?>/tienda/js/functions.js"></script>

</body>
</html>