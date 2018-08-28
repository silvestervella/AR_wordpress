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
	<section id="numbers-outer" class="section-slider row adj-col-outer">
		<div class="container">
			<div id="numbers" class="owl-carousel">
				<?php armanage_generate_posts('numbers' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , '' , 'thumbnail item adj-col' ); ?>
			</div>
		</div>
	</section>
	<section id="products" class="row section ">
			<h2 class="title">Products</h2>    
			<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , 'our-products' , '' , 'item' ); ?>
			<div class="sec-icon">
				<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/package-1.png" alt="package icon" />
			</div>
	</section>
	<section id="third-parties" class="row section adj-col-outer">
			<h2 class="title">Third Party Products</h2>
			<div class="container">
				<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , 'third-party-products' , '' , '' ); ?>
			</div>
	</section>
	<section id="services" class="row section adj-col-outer">
		<h2 class="title">Services</h2>
		    <div class="container">
				<?php armanage_generate_posts('services' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , ''  , '' , 'home-service-front-page-listed' , 'home-prods' ); ?>
			</div>
	</section>
	<section id="pay-gateways-outer" class="section-slider row adj-col-outer">
		<h2 class="title">Payment Gateways</h2>
			<div class="container">
				<div id="pay-gateways" class="owl-carousel " >
					<?php armanage_generate_posts('payments' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , '' , 'thumbnail item adj-col' ); ?>
				</div>
			</div>
	</section>


<?php get_footer(); ?>