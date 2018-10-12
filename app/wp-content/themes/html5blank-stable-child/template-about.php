<?php
/*
 * Template Name: About Template
 */

 get_header(); ?>

<main role="main"  style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'full'); ?>)">
    <div class="posts-sec-outer">
        <div class="container">        
        <?php if (have_posts()): while (have_posts()) : the_post(); 

            $url = get_post_meta($post->ID, "about-vids", false);

            if ($url[0]=="") { ?>

            <!-- If there are no custom fields, show nothing -->

           <?php } else { ?>
                <h3><?php the_title(); ?></h3>
                <div class="row">
                    <div class="col-md-6">

                        <div id="frame-outer">
                            <iframe id="vid-frame" src="" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen=""></iframe>                        
                        </div>              
                        <div id="about-vids" class="video-outer owl-carousel">        
                            <?php armanage_getYoutubeInfo($url); ?>
                        </div>

                    </div>
                    <!-- /col-md -->

                    <div class="col-md-6">
                        <div><?php the_content(); ?></div>
                        <div class="aboutus-contact-sec">
                            <ul class="contact-list">
                                <li><i class="fa fa-envelope" aria-hidden="true"></i><script>document.write('<'+'a'+' '+'h'+'r'+'e'+'f'+'='+"'"+'m'+'a'+'i'+'&'+'#'+'1'+'0'+'8'+';'+'&'+'#'+'1'+'1'+'6'+';'+'o'+
                                    '&'+'#'+'5'+'8'+';'+'%'+'6'+'9'+'&'+'#'+'3'+'7'+';'+'6'+'E'+'f'+'%'+'&'+'#'+'5'+'4'+';'+'F'+'&'+'#'+
                                    '3'+'7'+';'+'4'+'&'+'#'+'4'+'8'+';'+'a'+'&'+'#'+'1'+'1'+'4'+';'+'%'+'&'+'#'+'5'+'4'+';'+'D'+'%'+'&'+
                                    '#'+'5'+'4'+';'+'1'+'%'+'6'+'E'+'&'+'#'+'9'+'7'+';'+'g'+'e'+'%'+'&'+'#'+'5'+'4'+';'+'&'+'#'+'6'+'8'+
                                    ';'+'&'+'#'+'1'+'0'+'1'+';'+'&'+'#'+'1'+'1'+'0'+';'+'t'+'&'+'#'+'4'+'6'+';'+'n'+'&'+'#'+'1'+'0'+'1'+
                                    ';'+'t'+"'"+'>'+'i'+'n'+'f'+'o'+'&'+'#'+'6'+'4'+';'+'a'+'r'+'m'+'a'+'n'+'a'+'g'+'&'+'#'+'1'+'0'+'1'+
                                    ';'+'m'+'e'+'n'+'t'+'&'+'#'+'4'+'6'+';'+'n'+'&'+'#'+'1'+'0'+'1'+';'+'t'+'<'+'/'+'a'+'>');</script><noscript>[Turn on JavaScript to see the email address]</noscript></li>
                                <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:+35699345762">+356 9934 5762</a></li>
                                <li class="skype"><i class="fa fa-skype" aria-hidden="true"></i><a href="skype:bookmakerfuture?chat">Skype</a></li>
                                <li><i class="fa fa-linkedin-square" aria-hidden="true"></i><a href="https://www.linkedin.com/company/ar-management/">LinkedIn</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- /row -->

                <div class="row map">
                    <div class="col-md-6 left">
                        <h5>Visit Us!</h5>
                    </div>
                    <div class="col-md-6 right">
                        <iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ2b1FoDxFDhMReTkScHZV2fg&key=AIzaSyAM6qBIGfTLBJRfXY05hh8uon4r-s3owEo" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- /row -->
                
                    <?php } ?>

                    <?php endwhile; ?>

                    <?php else: ?>

                    <!-- article -->
                    <article>

                        <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                    </article>
                    <!-- /article -->

                    <?php endif; 

                    ?>

        </div>
        <!-- /container -->
    </div>
    <!-- /posts-sec-outer -->
</main>

<?php // get_sidebar(); ?>

<?php get_footer();?>