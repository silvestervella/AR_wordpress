<?php 
/*
 * Template Name: News Page - Index
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
<!-- section -->
</header>
<!-- /header -->

	<main role="main">

		<div class="main-wrap">
			<section class="post-outer">

				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<section id="all-news">
					<?php
				/*  
				*  First Loop 
				*  Returns posts with a custom post order value
				*/
				// First, determine if on the first page of posts
				// If on first page, run query to display posts with custom sort first
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				if(1 == $paged) :
				$args1 = array(
					'post_type' => 'news_post',
					'meta_key' => '_custom_post_order',
					'orderby' => 'meta_value',
					'order' => 'ASC',
					'posts_per_page' => 3,
					'mid_size' => 2,
					'prev_next' => true,
					'prev_text'          => __('« Previous'),
					'next_text'          => __('Next »'),
				);

				$query1 = new WP_query ( $args1 );
				if ( $query1->have_posts() ) :
					while ($wp_query->have_posts() ) :
						$wp_query->the_post();
						// Skip posts with custom sort value
						if ( !empty(get_post_meta( $post->ID, '_custom_post_order', true )) ) { continue; }
						// Display the standard sorted posts ?>
						<section class="news-outer">
							<h4 class="newspage-newstitle">
								<?php the_title() ?>
							</h4>
							<div class="newspage-news">
								<?php the_content() ?>
								<div class="read-more">
									<a href="<?php  the_permalink(); ?>">READ MORE</a>
								</div>
							</div>
						</section> 
						
					<?php
						endwhile; // End looping through standard sorted posts
					endif; // End loop 1
					wp_reset_postdata(); // Set up post data for next loop
					endif; // End checking for first page

					/*  
					*  Second Loop 
					*  Returns all posts except those in the list above
					*/
					$args2 = array(
					'post_type' => 'news_post',
					'orderby' => 'date',
					'order' => 'DESC',
					'paged' => $paged,
					'posts_per_page' => 3,
					'mid_size' => 2,
					'prev_next' => true,
					'prev_text'          => __('« Previous'),
					'next_text'          => __('Next »'),
					);

					// For pagination to work, must make temporary use of global $wp_query variable
					$temp = $wp_query;
					$wp_query = null;
					$wp_query = new WP_query ( $args2 );
					if ( $wp_query->have_posts() ) :
					while ($wp_query->have_posts() ) :
						$wp_query->the_post();
						// Skip posts with custom sort value
						if ( !empty(get_post_meta( $post->ID, '_custom_post_order', true )) ) { continue; }
						// Display the standard sorted posts ?>
						<section class="news-outer">
							<h4 class="newspage-newstitle">
								<?php the_title() ?>
							</h4>
							<div class="newspage-news">
								<?php the_content() ?>
								<div class="read-more">
									<a href="<?php  the_permalink(); ?>">READ MORE</a>
								</div>
							</div>
						</section> 
						
					<?php
						endwhile; // End looping through standard sorted posts
						endif; // End loop 2
						wp_reset_postdata();
						// Pagination functions would go here
						// Reset global $wp_query variable to its original state
						$wp_query = null;
						$wp_query = $temp;
					?>
					
					</section>
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
