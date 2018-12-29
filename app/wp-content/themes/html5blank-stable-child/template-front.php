<?php
/*
 * Template Name: Main Template
 */

 get_header(); 

 ?>
	<section id="top"  class="row" style="background-image: url(<?php echo armanage_get_post_page_thumb_url(8); ?>)">
		<div id="slogan-sec">
			<div class="container">
				<div id="slogan">
					<h1>ONLINE AND RETAIL SOLUTIONS<br /> FOR BOOKMAKER BUSINESS</h1>
					<h3>CERTIFIED BY</h3>
					<img src="http://localhost/ARsite/app/wp-content/uploads/2018/07/quinel.png" alt="quinel logo" />
				</div>
				<div id="slider-map">
					<img src="http://localhost/ARsite/app/wp-content/uploads/2018/07/intro-map.png" alt="map" />
				</div>
				<!--<div id="home-cta">
					<?php // if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("home_cta") ) : ?>
					<?php // endif;?>
				</div>-->
			</div>
		</div>
	</section>

		<section id="numbers-outer" class="section-slider row adj-col-outer">
		<h2 class="title">Why choose us?</h2>
		<div class="container">
			<div id="numbers" class="owl-carousel">
				<?php 
					armanage_front_page_posts(array(
						'post_type' =>'numbers' , 
						'orderby'=>'meta_value',
						'order'=>'ASC',
						'meta_key'=>'_custom_post_order',
						'posts_per_page'=>'',
						'category_name'=>'',
						'product_type'=>'',
						'service_placement'=>'',
						'blog_type'=>'',
					), 'thumbnail item adj-col');
				?>
			</div>
		</div>
	</section>

		<section id="events-outer" class="section-slider row" style="background-image: url(<?php echo armanage_get_post_page_thumb_url(208); ?>)">
		<h2 class="title">Events</h2>
			<div class="container">
				<div id="events" class="owl-carousel " >
					<?php 
					armanage_front_page_posts(array(
						'post_type' =>'blog' , 
						'orderby'=>'date',
						'order'=>'DESC',
						'meta_key'=>'',
						'posts_per_page'=>'3',
						'category_name'=>'',
						'product_type'=>'',
						'service_placement'=>'',
						'blog_type'=>'events',
					), 'thumbnail item');
				?>
				</div>
			</div>
			<div class="sec-read-more container">
				<a href="<?php echo esc_url( get_page_link( 208 ) ); ?>">View More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
	</section>

	<section id="products" class="row section" style="background-image: url(<?php echo armanage_get_post_page_thumb_url(191); ?>)">
			<h2 class="title">Products</h2>
			<h3>PREMIUM BETTING SOFTWARE FOR BOOKMAKERS</h3>
			<div class="container">
				<!--
				<ul class="nav nav-tabs">
					<li class="active"><h4><a data-toggle="tab" href="#1">White Label Betting Software</a></h4></li>
					<li><h4><a data-toggle="tab" href="#2"> Live Betting Grid</a></h4></li>
					<li><h4><a data-toggle="tab" href="#3">Mobile Betting</a></h4></li>
				</ul> -->
				<div class="panel-group" id="accordion"> 
				<?php 
						armanage_front_page_posts(array(
							'post_type' =>'products' , 
							'orderby'=>'meta_value',
							'order'=>'ASC',
							'meta_key'=>'_custom_post_order',
							'posts_per_page'=>'',
							'category_name'=>'',
							'product_type'=>'our-products',
							'service_placement'=>'',
							'blog_type'=>'',
						), 'item');
					 ?>
				</div>







				<div class="sec-read-more container">
					<a href="<?php echo esc_url(  get_page_link( 191 ) ); ?>">View More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</div>
			</div>
	</section>

	<section id="third-parties" class="row section adj-col-outer " style="background-image: url(<?php echo armanage_get_post_page_thumb_url(203); ?>)">
			<h2 class="title">Third Party Products</h2>
			<div class="container">
				<?php 
					armanage_front_page_posts(array(
						'post_type' =>'products' , 
						'orderby'=>'meta_value',
						'order'=>'ASC',
						'meta_key'=>'_custom_post_order',
						'posts_per_page'=>'',
						'category_name'=>'',
						'product_type'=>'third-party-products',
						'service_placement'=>'',
						'blog_type'=>'',
					), '');
				?>
			</div>
			<div class="sec-read-more container">
				<a href="<?php echo esc_url( get_page_link( 203 ) ); ?>">View More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
	</section>

	<section id="pay-gateways-outer" class="section-slider row adj-col-outer" >
		<h2 class="title">Payment Gateways</h2>
			<div class="container">
				<div id="pay-gateways" class="owl-carousel " >
					<?php 
					armanage_front_page_posts(array(
						'post_type' =>'payments' , 
						'orderby'=>'meta_value',
						'order'=>'ASC',
						'meta_key'=>'_custom_post_order',
						'posts_per_page'=>'',
						'category_name'=>'',
						'product_type'=>'',
						'service_placement'=>'',
						'blog_type'=>'',
					), 'thumbnail item adj-col');
				?>
				</div>
			</div>
	</section>

	<section id="services" class="row section adj-col-outer" style="background-image: url(<?php echo armanage_get_post_page_thumb_url(194); ?>)">
		<h2 class="title">Services</h2>
		    <div class="container">
				<?php 
					armanage_front_page_posts(array(
						'post_type' =>'services' , 
						'orderby'=>'meta_value',
						'order'=>'ASC',
						'meta_key'=>'_custom_post_order',
						'posts_per_page'=>'',
						'category_name'=>'',
						'product_type'=>'',
						'service_placement'=>'home-service-front-page-listed',
						'blog_type'=>'',
					), 'home-prods');
				?>
			</div>
			<div class="sec-read-more container">
				<a href="<?php echo esc_url(get_page_link( 194 ) ); ?>">View More <i class="fa fa-angle-right" aria-hidden="true"></i></a>
			</div>
	</section>
	
	<section id="facebook" class="row section">
		<h2 class="title">Find us on facebook</h2>
		<div class="container">
			<?php //include_once __DIR__ . '/facebook.php';	?>
		</div>
	</section>
	
<?php get_footer(); ?>