<?php
/*
 * Template Name: Third Party Products Template
 */

 ?>
 <?php get_header(); ?>

<main role="main">
    <div class="posts-sec-outer" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
        <div class="container">
            <div class="posts-sec">
                <h3><?php the_title(); ?></h3>
                <?php    $args = array(
                                    'post_type' => 'products',
                                    'orderby'   => 'meta_value',
                                    'order' => 'ASC',
                                    'meta_key' => '_custom_post_order',
                                    'product_type' => 'third-party-products',
                                    );
            

                                $query1 = new WP_query ( $args );
                                if ( $query1->have_posts() ) :
                                    while ($query1->have_posts() ) :
                                    $query1->the_post();
                                    global $post; ?>

                                                <div class="row cpt-outer">
                    
                                                    <div class="post-title col-xs-12">
                                                        <h5><?php the_title(); ?></h5>
                                                    </div>

                                                    <div class="feat-img col-md-5 col-xs-12">
                                                    <?php the_post_thumbnail( ); ?>
                                                    </div>
                                                    
                                                    <?php the_content(); ?>

                                                    <?php $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);  if ( $repeatable_fields ) : ?>
                                                    <div class="meta-fields col-xs-12">
                                                        <ul class="carousel-inner" role="listbox">
                                                            <?php foreach ( $repeatable_fields as $field ) { ?>
                                                            <li>
                                                            <div>
                                                                <?php if($field['name'] != '') echo '<span class="name">'. esc_attr( $field['name'] ) . '</span>'; ?>
                                                            </div>
                                                            </li>
                                                            <?php }  ?> 
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                                </div>


                    <?php endwhile; // End looping through custom sorted posts
                    endif; // End loop 1  

                ?>
            </div>
            <!-- /posts-sec -->
        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>