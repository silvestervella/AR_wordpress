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

					<?php armanage_generate_posts('numbers' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , 'item' ); ?>

				</div>
			</div>
		</div>
	</section>
	<section id="products">
		<h2>Products</h2>    
		<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , '' , 'product item' ); ?>
		<div class="sec-icon">
			<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/package.png" alt="package icon" />
		</div>
		<section id="live-betting-grid" class="home-prods">
			<div class="container">
				<div class="col-md-6 left">
					<h3>Live Betting Grid</h3>
				</div>
				<div class="col-md-6 right">
					<p>A simple and intuitive interface bring to your clients our Live Betting function! Available on both Desktop and Mobile devices.</p>
				</div>
			</div>
		</section>
		<section id="mobile-betting" class="home-prods">
			<div class="container">
				<div class="col-md-6 left">
					<p>Always and everywhere. As the number of uses by mobile devices is growing exponentially, our betting websites are now a must-have for your portfolio of products.</p>
				</div>
				<div class="col-md-6 right">
				<h3>Mobile Betting</h3>
				</div>
			</div>
		</section>
	</section>

<?php get_footer(); ?>