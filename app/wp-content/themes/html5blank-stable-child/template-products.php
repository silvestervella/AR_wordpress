<?php
/*
 * Template Name: Products Template
 */

 ?>
 <?php get_header(); ?>

<main role="main">
    <div class="posts-sec-outer" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>)">
        <div class="container">
        <h3><?php the_title(); ?></h3>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <div class="page-text"><?php the_content(); ?></div>
                <?php endwhile; else: ?>
                    <p>Sorry, no posts matched your criteria.</p>
                <?php endif; ?>

                <div class="posts-sec">

                <?php armanage_prod_serv_temp_post_gen(array(
                        'post_type' =>'products' , 
                        'orderby'=>'meta_value',
                        'order'=>'ASC',
                        'meta_key'=>'_custom_post_order',
                        'product_type'=>'our-products',
                    )); ?>

            </div>
            <!-- /posts-sec -->
            <div id="prod-page-tp">
                <a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Third Party Products' ) ) ); ?>">See Our Third Party Products</a>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>