<?php 
/*
 * Template Name: Games Page - Single
 * Template Post Type: post
 */
get_header(); 
?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<!-- Get post featured image url -->
<?php $thumb = get_the_post_thumbnail_url(); ?>

<section class="post-head">
	<div  style="background-image: url('<?php echo $thumb; ?>')" class="feat-img"></div>
	<h1>
		<?php the_title(); ?>
	</h1>
</section>
</header>
<!-- /header -->

<main role="main">
	<div class="main-wrap">
		<div class="mob-filter"><span>op1</span><span>op2</span><span>op3</span></div>
		<section class="post-sidebar">
			<div id="filter">
				<span>Filter</span>
				<select>
					<option value="volvo">op1</option>
					<option value="saab">op2</option>
					<option value="mercedes">op3</option>
					<option value="audi">op4</option>
				</select>
				<button>Select</button>
			</div>
			<div id="latest-games">
				<span>LATEST GAMES</span>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
						<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
					<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
					<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
					<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
					<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="fl-game ">
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">
					<div class="game-title-outer"><h4 class="game-title">game title</h4></div>
						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
			</div>
		</section>

		
		<!-- section -->
		<section class=" post-outer">

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<!-- post title -->

				<!-- /post title -->

				<div class="post-content">
					<?php the_content(); // Dynamic Content ?>
				</div>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

			</article>
			<!-- /article -->

		<?php endif; ?>

			<div id="games">
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
				<div class="game-single  ">
					<h4 class="game-title">game title</h4>
					<div class="game-img"><img src="http://eternagames.com/wp-content/uploads/2018/05/netent-main-hero-e1527516899862.jpg" alt="" /></div>
					<div class="game-info">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus luctus erat ut felis feugiat porta.

						<div class="game-actions">
							<div class="game-demo" ><a href="">DEMO</a></div>
							<div class="game-media"><a href="">MEDIA Pack</a><a href="">GAME SHEET</a></div>
						</div>
					</div>
				</div>
			</div>

			</section>
			<!-- /post-outer -->

		</div>
		<!-- /main-wrap -->
	</main>

<?php get_footer(); ?>
