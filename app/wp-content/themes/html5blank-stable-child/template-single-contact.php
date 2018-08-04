<?php 
/*
 * Template Name: Contact Page - Single
 * Template Post Type: page
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
<!-- /post head -->
</header>
<!-- /header -->

	<main role="main">
	
	<div class="main-wrap">

	<!-- section -->
	<section class="post-outer">
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-content">
			<?php the_content(); // Dynamic Content ?>
		</div>

		<?php edit_post_link(); // Always handy to have Edit Post Links available ?>

		</article>
		<!-- /article -->

		<h3>Get in touch</h3>

		<form id="main-form">
			<div class="form-group">
				<label for="exampleInputEmail1">Name</label>
				<input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name..">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Email</label>
				<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email..">
			</div>
			<div class="form-group">
				<label for="exampleTextarea">Example textarea</label>
				<textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message.."></textarea>
			</div>
			<div class="form-group">
				<button type="submit">Submit</button>
			</div>
			</form>

	<?php endwhile; ?>

	<?php else: ?>

		<!-- article -->
		<article>

			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

		</article>
		<!-- /article -->

	<?php endif; ?>

	</section>
	<!-- /post outer -->
			<section class=" post-sidebar">
			<h3>Join our newsletter</h3>
			<form id="newsletter-form">
					<div class="form-group">
						<label for="exampleInputEmail2">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Enter email">
					</div>

					<div class="form-check">
						<label class="form-check-label">Agree</label>
						<input type="checkbox" class="form-check-input">
					</div>
				<button type="submit">Join</button>
			</form>
			</section>
			<!-- /post-outer -->

		</div>
		<!-- /main-wrap -->
	</main>

<?php get_footer(); ?>
