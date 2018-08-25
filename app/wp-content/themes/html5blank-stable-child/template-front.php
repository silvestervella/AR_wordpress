<?php
/*
 * Template Name: Main Template
 */

 get_header(); 
 
 ?>
	<section id="top"  class="row">
		<div id="slogan-sec">
			<div class="container">
				<div id="slogan">
					<p>ONLINE AND RETAIL SOLUTIONS<br />FOR BOOKMAKER BUSINESS</p>
					<span>CERTIFIED BY</span>
					<img src="http://localhost/ARsite/app/wp-content/uploads/2018/07/quinel.png" alt="quinel logo" />
				</div>
				<div id="slider-map">
					<img src="http://localhost/ARsite/app/wp-content/uploads/2018/07/intro-map.png" alt="map" />
				</div>
				<div id="home-cta">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("home_cta") ) : ?>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
	<section id="numbers-outer" class="section-slider row">
		<div class="container">
			<div id="numbers" class="carousel slide" data-ride="carousel">
				<div class="slider-controls">
							<a class="carousel-control-prev" href="#numbers" role="button" data-slide="prev">
								<span class="" aria-hidden="true"></span>
								<span class=""><i class="fa fa-angle-left"></i></span>
							</a>
							<a class="carousel-control-next" href="#numbers" role="button" data-slide="next">
								<span class="" aria-hidden="true"></span>
								<span class=""><i class="fa fa-angle-right"></i></span>
							</a>
					</div>
				<div class="carousel-inner" role="listbox">

					<?php armanage_generate_posts('numbers' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , '' , 'item' ); ?>

				</div>
			</div>
		</div>
	</section>
	<section id="products" class="row section">
			<h2 class="title">Products</h2>    
			<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , 'our-products' , '' , 'item' ); ?>
			<div class="sec-icon">
				<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/package-1.png" alt="package icon" />
			</div>
	</section>
	<section id="third-parties" class="section">
			<h2 class="title">Third Party Products</h2>
			<div class="container">
				<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , 'third-party-products' , '' , '' ); ?>
			</div>
	</section>
	<section id="services" class="row section">
		<h2 class="title">Services</h2>
		    <div class="container">
				<?php armanage_generate_posts('services' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , ''  , '' , 'home-service-front-page-listed' , 'home-prods' ); ?>
			</div>
	</section>
	<section id="pay-gateways-outer" class="section-slider row">
		<div class="container">
			<div id="pay-gateways" class="carousel slide" data-ride="carousel">
				<div class="slider-controls">

					</div>
				<div class="carousel-inner" role="listbox">

				</div>
			</div>
		</div>
	</section>


<?php get_footer(); ?>