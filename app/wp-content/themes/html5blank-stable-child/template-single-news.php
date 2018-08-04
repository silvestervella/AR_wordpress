<?php 
/*
 * Template Name: News Page - Single
 * Template Post Type: news_post
 */
get_header(); 
?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<!-- Get post featured image url -->
<?php $thumb = get_the_post_thumbnail_url(); ?>

<section class="post-head">
	<div  style="background-image: url('<?php echo $thumb; ?>')" class="feat-img"></div>
	<h1>
		News
	</h1>
</section>
</header>
<!-- /header -->

	<main role="main">

		<div class="main-wrap">
			<!-- section -->
			<section class=" post-outer">
				<h1>
					<?php the_title(); ?>
				</h1>

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

			</section>
			<!-- /post-outer -->

		</div>
		<!-- /main-wrap -->
	</main>

<?php get_footer(); ?>
