<?php 
/*
 * Template Name: About Page - Single
 * Template Post Type: post
 */
get_header(); 
?>
</header>
<!-- /header -->

	<main role="main">
<?php
	echo '<?xml version="1.0" encoding="utf-8"?>';
?>
<!-- Generator: Adobe Illustrator 22.0.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 662.9 227.4" style="enable-background:new 0 0 662.9 227.4;" xml:space="preserve">
<style type="text/css">
	.st0{fill:none;}
	.st1{fill:#EDEDED;}
	.st2{fill:#FFFFFF;}
	.st3{fill:#E6E6E6;}
	.st4{fill:#808080;}
	.st5{fill:url(#striped-box_1_);}
</style>
<pattern  x="284" y="-46.6" width="168" height="41" patternUnits="userSpaceOnUse" id="New_Pattern_Swatch_1" viewBox="0 -41 168 41" style="overflow:visible;">
	<g>
		<rect y="-41" class="st0" width="168" height="41"/>
		<rect x="0" y="-41" class="st1" width="168" height="20.5"/>
		<rect x="0" y="-20.5" class="st2" width="168" height="20.5"/>
	</g>
</pattern>
<ellipse id="circle" class="st3" cx="574.3" cy="146.4" rx="55.6" ry="55.1"/>
<polygon id="right-box" class="st4" points="463.4,146.4 503.7,146.4 503.7,34.4 304.3,34.4 304.3,201.5 463.4,201.5 "/>
<pattern  id="striped-box_1_" xlink:href="#New_Pattern_Swatch_1" patternTransform="matrix(0.7124 -0.7071 0.7124 0.7071 2923.1121 -7989.0317)">
</pattern>
<polygon id="striped-box" class="st5" points="503.7,146.4 463.4,146.4 463.4,201.5 503.7,201.5 610.1,201.5 662.9,201.5 
	662.9,146.4 "/>
<g id="left-box">
	<polygon class="st3" points="0,112.4 0,201.6 52.8,201.5 109.9,201.5 142.4,201.5 169.3,201.5 169.3,112.4 	"/>
</g>
<g id="imgs">
	
		<image style="overflow:visible;" width="500" height="1017" id="girl" xlink:href="http://eternagames.com/wp-content/uploads/2018/05/AIW_char2.png"  transform="matrix(0.196 0 0 0.1945 144.9116 21.3734)">
	</image>
	
		<image style="overflow:visible;" width="670" height="740" id="bird" xlink:href="http://eternagames.com/wp-content/uploads/2018/05/LB_03.png"  transform="matrix(0.3123 0 0 0.31 180.3351 -0.314)">
	</image>
</g>
</svg>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<div class="main-wrap">

			<!-- section -->
			<section class=" post-outer">
				<h1>
					<?php the_title(); ?>
				</h1>
				<!-- article -->
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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