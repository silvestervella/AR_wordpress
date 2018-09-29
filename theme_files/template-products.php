<?php
/*
 * Template Name: Products Template
 */

 ?>
 <?php get_header(); ?>

<main role="main" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>)">
    <div class="posts-sec-outer">
        <div class="container">
        <h3><?php the_title(); ?></h3>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php if (!empty(get_the_content())) { ?>
                    <div class="page-text"><?php the_content(); ?></div>
                <?php } ?>
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
            <div id="tp-overlay">
            <div id="tp-view"><i class="fa fa-arrow-right"></i>View Our Third Party Products</div>
            </div>
                <div class="tp-thumbs"><img src="<?php echo armanage_get_post_page_thumb_url('149') ?>" alt=""/>Casino</div>
                <div class="tp-thumbs"><img src="<?php echo armanage_get_post_page_thumb_url('150') ?>" alt=""/>Live Casino</div>
                <div class="tp-thumbs" id="tp-link"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Third Party Products' ) ) ); ?>">Read More..</a></div>
                <div class="tp-thumbs"><img src="<?php echo armanage_get_post_page_thumb_url('151') ?>" alt=""/>Virtual</div>
                <div class="tp-thumbs"><img src="<?php echo armanage_get_post_page_thumb_url('152') ?>" alt=""/>Poker</div>
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>