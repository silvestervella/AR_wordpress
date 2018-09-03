<?php
/*
 * Template Name: Products Template
 */

 ?>
 <?php get_header(); ?>

<main role="main">
<!-- section -->
<section>

    <?php    $args = array(
                        'post_type' => 'products',
                        'orderby'   => 'meta_value',
                        'order' => 'ASC',
                        'meta_key' => '_custom_post_order',
                        'product_type' => 'our-products',

                    );
                    $query1 = new WP_query ( $args );
                    if ( $query1->have_posts() ) :
                        while ($query1->have_posts() ) :
                        $query1->the_post(); 

                        global $post; ?>
                 
                                    <div class="<?php echo $class; ?>">
                                        <div class="posts-excerpt">
                                            <?php 
                                                if( !empty( $meta_number ) ) { ?>
                                            <div class="excerpt-meta">
                                                <?php echo $meta_number; ?>
                                            </div>

                                            <?php }; ?>

                                            <div class="excerpt-title">
                                            <?php the_title(); ?>
                                            </div>
                                            
                                            <div class="excerpt-text">
                                            <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }; ?>
    <!-- article -->
    <article>

        <h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>

    </article>
    <!-- /article -->

<?php endif; ?>

</section>
<!-- /section -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
