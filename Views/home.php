<?php 
	headerTienda($data);
	$arrSlider = $data['slider'];
	$arrBanner = $data['banner'];
	$arrProductos = $data['productos'];

	$contentPage = "";
	if(!empty($data['page'])){
		$contentPage = $data['page']['contenido'];
	}

 ?>
	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/slider1.png'?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/slider2.png'?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/slider3.png'?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	
	<!--Vultan  Assets/vultan/inicio/img1.png-->
	<div class="row" style="padding:5vw 5vw 0 5vw;">
	<div class="col-xs-6 col-md-6" style="background-color:black;"><img src="<?= base_url().'/Assets/vultan/inicio/icono_Play.png'?>" alt=""></div>
	<div class="col-xs-6 col-md-6"><p class="parrafoCarbn">SOMOS Carbon Audio, una marca 100% Mexicana que fabrica con estándares internacionales, diseñada para todos los amantes del Car Audio que buscan equipos de calidad y altas prestaciones a precios accesibles.</p><br/>
							<p class="parrafoCarbn">Todos nuestros equipos cuentan con factura, garantía y soporte técnico, lo que nos convierte en una compañía seria como pocas en México.</p><br/>
						<p class="parrafoCarbn">Actualmente Carbon Audio es una de las marcas con mayor crecimiento en Latinoamérica, teniendo presencia desde inicios del 2023 en México, Colombia, Uruguay, República Dominicana, Guatemala, El Salvador y Honduras.</p></div>
	</div>
	<div class="banerhome">
	<img src="<?= base_url().'/Assets/cba/barra.png'?>" alt="" class="imgBaner">
	</div>
	
	<div class="row" style="padding:5vw 5vw 2vw 5vw;">
	<div class="col-xs-6 col-md-6" style=""><img src="<?= base_url().'/Assets/cba/FACHADA.jpg'?>" alt="" style="width:100%;"></div>
	<div class="col-xs-6 col-md-6"><p class="parrafoCarbn">Bienvenidos al mundo Carbon Audio, Somos una marca apasionada y comprometida con la excelencia en el car audio. Con años de experiencia en la fabricación, satisfacción y distribución de equipos de alta calidad integrando la última tecnología y conectividad.</p><br/>
							<p class="parrafoCarbn">Lo que distingue a Carbon Audio es nuestros anhelos por la innovación y la calidad insuperable. Cada uno de nuestros productos está diseñado con los más altos estándares de fabricación. Trabajamos incansablemente para ofrecerte productos que superen tus expectativas y te permitan disfrutar de un sonido puro y poderoso en cada trayecto.</p><br/>
						</div>
	</div>


	<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/banners_01.jpg'?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/banners_03.jpg'?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?= base_url().'/Assets/cba/banners_04.jpg'?>" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	

	<!--Fin Vultan-->
	
<?php 
	footerTienda($data);
 ?>

