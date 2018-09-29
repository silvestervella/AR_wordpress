<?php
/*
 * Template Name: News Template
 */

 ?>
 <?php get_header(); ?>

<main role="main"  style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>)">
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
                        'post_type' =>'blog' , 
                        'orderby'=>'date',
                        'order'=>'ASC',
                        'meta_key'=>'',
                        'product_type'=>'',
                    )); ?>

            </div>
            <!-- /posts-sec -->
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>