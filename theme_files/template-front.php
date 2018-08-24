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

					<?php armanage_generate_posts('numbers' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , '' , 'item' ); ?>

				</div>
			</div>
		</div>
	</section>
	<section id="products" class="row">
		<h2 class="title">Products</h2>    
		<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , 'our-products' , 'product item' ); ?>
		<div class="sec-icon">
			<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/package-1.png" alt="package icon" />
		</div>
		<?php armanage_generate_posts('products' , 'meta_value' , 'ASC' , '_custom_post_order' , '' , 'third-party-products' , 'product' ); ?>
		<!--
		<section id="live-betting-grid" class="home-prods row">
			<div class="container">
				<div class="col-md-6 left">
					<h3>Live Betting Grid</h3>
				</div>
				<div class="col-md-6 right">
					<p>A simple and intuitive interface bring to your clients our Live Betting function! Available on both Desktop and Mobile devices.</p>
				</div>
			</div>
		</section>
		<section id="mobile-betting" class="home-prods row">
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
	<section id="third-parties" class="row">
		<h2 class="title">Third Party Products</h2>
		<div class="container">
			<div class="row">
				<div class="col-md-6 left">
					<div class="tp-prod-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/slot-machine.png" alt="slot machine image" />
						</div>
						<h3>Casino</h3>
						<p>Video Slots, Table games and Video Poker of the best casinos. We provide you the most popular casinos on the market. We are integrated with leading manufacturers of casino games.</p>
					</div>
				</div>
				<div class="col-md-6 right">
					<div class="tp-prod-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/casino-chip.png" alt="casino chip image" />
						</div>
						<h3>Casino Live</h3>
						<p>Choose from a selection of different game modes including Live Casino, Live Roulette, Live Blackjack, Live Baccarat, Live Punto Banco and DBG Live Casino.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 left">
					<div class="tp-prod-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/running-dog-silhouette.png" alt="racing dog image" />
						</div>
						<h3>Virtual Games</h3>
						<p>The Virtual Games that we have made available through our software are 100% regulated and tested to ensure safety for both the user and the provider.</p>
					</div>
				</div>
				<div class="col-md-6 right">
					<div class="tp-prod-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/poker-playing-cards.png" alt="poker cards image" />
						</div>
						<h3>Poker</h3>
						<p>Experience our realistic online poker. One can play in more than one poker room using a single account: Poker, DBG Poker, 2D DBG Poker and 3d DBG Poker 3D Live.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="services" class="row">
		<h2 class="title">Services</h2>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="serv-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/fraud-icon.png" alt="slot machine image" />
						</div>
						<h3>FRAUD DEPARTMENT</h3>
						<p>No one should gamble against rigged odds. Fraudsters ruin the experience for your customers. We help you to increase your profit and your customers satisfaction.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="serv-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/risk-icon.png" alt="casino chip image" />
						</div>
						<h3>RISK MANAGEMENT</h3>
						<p>With deep understanding of players and patterns of play, Risk Managers use their insight and extensive experience to set parameters on the various sports, whilst also adjusting like player limits, market limits and overseeing the bet acceptance.</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="serv-outer">
						<div class="tp-img-outer">
							<img src="http://localhost/ARsite/app/wp-content/uploads/2018/08/payment-icon.png" alt="racing dog image" />
						</div>
						<h3>PAYMENT SOLUTIONS</h3>
						<p>AR Management only uses the most secure, safe and most reliable payment gateways with several options to choose from such as Skrill (formerly Moneybookers), Neteller and bank wire.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
-->
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