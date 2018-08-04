<?php
/*
 * Template Name: Main Template
 */

 get_header(); 
 
 ?>
	<section id="top">
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
	<section id="numbers-outer" class="section-slider">
		<div class="container">
			<div id="numbers" class="carousel slide w-100" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					
					<?php armanage_generate_posts('numbers' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , 'carousel-item' ); ?>

				</div>
				<div class="slider-controls">
						<a class="carousel-control-prev" href="#numbers" role="button" data-slide="prev">
							<span class="" aria-hidden="true"></span>
							<span class="">Previous</span>
						</a>
						<a class="carousel-control-next" href="#numbers" role="button" data-slide="next">
							<span class="" aria-hidden="true"></span>
							<span class="">Next</span>
						</a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>