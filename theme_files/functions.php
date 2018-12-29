<?php
/**
 * 0. Theme variables
 * 1. Register and enqueue script and styles
 * 2. Register our sidebars and widgetized areas.
 * 3. Set post featured image as background.
 * 4. Set post position order
 * 5. Add posts features
 * 6. Allow html in post excerpt
 * 7. Add custom css to admin area
 * 8. Add custom metaboxes to posts
 * 9. Add custom post types
 * 10. Add custom logo
 * 11. Post generator
 * 12. Products repeatable metaboxes
 * 13. Create taxonomy
 * 14. Redirect unwanted pages to home
 * 15. Get post thumbnail outside loop
 * 16. Show page/post id in admin
 * 17. Products + services template post generator
 * 18. Increment number
 * 19. Get youtube video title
 * 20. Post to facebook
 * 21. Utf contect decode
 * 22. Admin restrictions
 * 23. Lazy load img src
 */


 /**
  * 0. Theme variables
  */

  // Site prefix
$site_prfx = 'armanage';


// Front page sections Id incrementor
function genId($arg1) {
    static $idInc = 0;
    $idInc++;
    echo "$arg1-fp-sec-$idInc";
}

/**
 * 1. Register and enqueue script and styles
 *
 */
    // De-register HTML5 Blank styles
    function armanage_styles_make_child_active()
    {
    wp_deregister_style('armanage'); // Enqueue it!
    }
    add_action('wp_enqueue_scripts', 'armanage_styles_make_child_active', 100); // Add Theme Child Stylesheet

    // Load HTML5 Blank Child styles
    function armanage_styles_child()
    {
    // Register Child Styles
    wp_register_style('child-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_register_style('armanage-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('child-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_register_style('owlcarousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_register_style('child-all', get_stylesheet_directory_uri() . '/css/all.css', array(), '1.0', 'all');

    // Enqueue Child Styles
    wp_enqueue_style('child-bootstrap'); 
    wp_enqueue_style('child-fontawesome'); 
    wp_enqueue_style('owlcarousel-style'); 
    wp_enqueue_style('armanage-child'); 
    wp_enqueue_style('child-all');

    //Register Child Scripts
    wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
    wp_register_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ) );
    wp_register_script( 'armanage-lazyload', get_stylesheet_directory_uri() . '/js/armanage-lazyload.js', array('jquery'), '', true);
    
    // Enqueue Child Scripts
    wp_enqueue_script( 'bootstrap' ); 
    wp_enqueue_script( 'theme-script' );   
    wp_enqueue_script( 'owlcarousel' );
    wp_enqueue_script( 'armanage-lazyload');   

}
    add_action('wp_enqueue_scripts', 'armanage_styles_child', 20); // Add Theme Child Stylesheet
    

/**
 * 2. Register our sidebars and widgetized areas.
 *
 */
function armanage_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home CTA',
		'id'            => 'home_cta',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'armanage_widgets_init' );


/**
 * 3. Set post featured image as background.
 */
$thumb = get_the_post_thumbnail_url();



/**
* 4. Set post position order
*/
/* Create custom meta data box to the post edit screen */
function armanage_custom_post_sort( $post ){

    $post_types = array('post','products','numbers','services','payments');
    foreach($post_types as $post_type) {
        add_meta_box( 
            'custom_post_sort_box', 
            'Position in List of Posts', 
            'armanage_custom_post_order', 
            $post_type ,
            'side'
            );
    }
  }
  add_action( 'add_meta_boxes', 'armanage_custom_post_sort' );

  /* Add a field to the metabox */
function armanage_custom_post_order( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'armanage_custom_post_order_nonce' );
    $current_pos = get_post_meta( $post->ID, '_custom_post_order', true); ?>
    <p>Enter the position at which you would like the post to appear. For exampe, post "1" will appear first, post "2" second, and so forth.</p>
    <p><input type="number" name="pos" value="<?php echo $current_pos; ?>" /></p>
    <?php
  }

  /* Save the input to post_meta_data */
function armanage_save_custom_post_order( $post_id ){
    if ( !isset( $_POST['armanage_custom_post_order_nonce'] ) || !wp_verify_nonce( $_POST['armanage_custom_post_order_nonce'], basename( __FILE__ ) ) ){
      return;
    } 
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
      return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ){
      return;
    }
    if ( isset( $_REQUEST['pos'] ) ) {
      update_post_meta( $post_id, '_custom_post_order', sanitize_text_field( $_POST['pos'] ) );
    }
  }
  add_action( 'save_post', 'armanage_save_custom_post_order' );

  /* Add custom post order column to post list */
function armanage_add_custom_post_order_column( $columns ){
    return array_merge ( $columns,
      array( 'pos' => 'Position', ));
  }
  add_filter('manage_posts_columns' , 'armanage_add_custom_post_order_column');

  /* Display custom post order in the post list */
function armanage_custom_post_order_value( $column, $post_id ){
    if ($column == 'pos' ){
      echo '<p>' . get_post_meta( $post_id, '_custom_post_order', true) . '</p>';
    }
  }
  add_action( 'manage_posts_custom_column' , 'armanage_custom_post_order_value' , 10 , 2 );


  /**
   * 5. Add posts features
   */

  


  /**
   * 6. Allow html in post excerpt
   */
  function armanage_allowedtags() {
    // Add custom tags to this string
        return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
    }

if ( ! function_exists( 'armanage_custom_wp_trim_excerpt' ) ) : 

    function armanage_custom_wp_trim_excerpt($armanage_excerpt) {
    global $post;
    $raw_excerpt = $armanage_excerpt;
        if ( '' == $armanage_excerpt ) {

            $armanage_excerpt = get_the_content('');
            $armanage_excerpt = strip_shortcodes( $armanage_excerpt );
            $armanage_excerpt = apply_filters('the_content', $armanage_excerpt);
            $armanage_excerpt = str_replace(']]>', ']]>', $armanage_excerpt);
            $armanage_excerpt = strip_tags($armanage_excerpt, armanage_allowedtags()); /*IF you need to allow just certain tags. Delete if all tags are allowed */

            //Set the excerpt word count and only break after sentence is complete.
                $excerpt_word_count = 75;
                $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count);
                $tokens = array();
                $excerptOutput = '';
                $count = 0;

                // Divide the string into tokens; HTML tags, or words, followed by any whitespace
                preg_match_all('/(<[^>]+>|[^<>\s]+)\s*/u', $armanage_excerpt, $tokens);

                foreach ($tokens[0] as $token) { 

                    if ($count >= $excerpt_word_count && preg_match('/[\,\;\?\.\!]\s*$/uS', $token)) {
                    // Limit reached, continue until , ; ? . or ! occur at the end
                        $excerptOutput .= trim($token);
                        break;
                    }

                    // Add words to complete sentence
                    $count++;

                    // Append what's left of the token
                    $excerptOutput .= $token;
                }

            $armanage_excerpt = trim(force_balance_tags($excerptOutput));

                $excerpt_end = ' <a href="'. esc_url( get_permalink() ) . '">' . '&nbsp;&raquo;&nbsp;' . sprintf(__( 'Read more about: %s &nbsp;&raquo;', 'armanage' ), get_the_title()) . '</a>';
                $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end); 

                //$pos = strrpos($armanage_excerpt, '</');
                //if ($pos !== false)
                // Inside last HTML tag
                //$armanage_excerpt = substr_replace($armanage_excerpt, $excerpt_end, $pos, 0); /* Add read more next to last word */
                //else
                // After the content
                $armanage_excerpt .= $excerpt_end; /*Add read more in new paragraph */

            return $armanage_excerpt;   

        }
        return apply_filters('armanage_custom_wp_trim_excerpt', $armanage_excerpt, $raw_excerpt);
    }

endif; 

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'armanage_custom_wp_trim_excerpt');


/**
 * 7. Add custom css to admin area
 */
add_action( 'admin_enqueue_scripts', 'armanage_custom_admin_css' );
add_action( 'login_enqueue_scripts', 'armanage_custom_admin_css' );
function armanage_custom_admin_css() {
	wp_enqueue_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
}


/**
 * 
 * 8. Add custom metaboxes to posts
 */

 // Adds a meta box to the post editing screen

function armanage_custom_meta() {
    add_meta_box( 'armanage_meta', __( 'Number', 'armanage-number' ), 'armanage_meta_callback', 'numbers' );
}
add_action( 'add_meta_boxes', 'armanage_custom_meta' );


 // Outputs the content of the meta box

function armanage_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'armanage_nonce' );
    $armanage_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <label for="number" class="armanage-row-title"><?php _e( 'Number', 'armanage-number' )?></label>
        <input type="text" name="number" id="number" value="<?php if ( isset ( $armanage_stored_meta['number'] ) ) echo $armanage_stored_meta['number'][0]; ?>" /><br>
    </p>
 
    <?php
}



 // Saves the custom meta input

function armanage_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'armanage_nonce' ] ) && wp_verify_nonce( $_POST[ 'armanage_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'number' ] ) ) {
        update_post_meta( $post_id, 'number', sanitize_text_field( $_POST[ 'number' ] ) );
    }
 
}
add_action( 'save_post', 'armanage_meta_save' );

/**
 * 9. Add custom post types
 */
function armanage_post_types() {
    register_post_type( 'blog',
      array(
        'labels' => array(
          'name' => __( 'Blog' ),
          'singular_name' => __( 'Blog' )
        ),
        'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable' => true,  // you should be able to query it
        'show_ui' => true,  // you should be able to edit it in wp-admin
        'exclude_from_search' => true,  // you should exclude it from search results
        'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
        'has_archive' => false,  // it shouldn't have archive page
        'rewrite' => false,  // it shouldn't have rewrite rules
        'taxonomies'  => array( 'blog_placement' ),
        'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
      )
    );
    register_post_type( 'numbers',
    array(
      'labels' => array(
        'name' => __( 'Numbers' ),
        'singular_name' => __( 'Numbers' ),
      ),
      'public' => true,
      'has_archive' => true,
      'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
      'capability_type' => 'post',
      'capabilities' => array(
          'edit_post'          => 'manage_options',
          'read_post'          => 'manage_options',
          'delete_post'        => 'manage_options',
          'edit_posts'         => 'manage_options',
          'edit_others_posts'  => 'manage_options',
          'delete_posts'       => 'manage_options',
          'publish_posts'      => 'manage_options',
          'read_private_posts' => 'manage_options'
      ),
    )
  );
  register_post_type( 'products',
  array(
    'labels' => array(
      'name' => __( 'Products' ),
      'singular_name' => __( 'Products' ),
    ),
    'public' => true,
    'has_archive' => true,
    'taxonomies'  => array( 'product_type' ),
    'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
    'capability_type' => 'post',
    'capabilities' => array(
        'edit_post'          => 'manage_options',
        'read_post'          => 'manage_options',
        'delete_post'        => 'manage_options',
        'edit_posts'         => 'manage_options',
        'edit_others_posts'  => 'manage_options',
        'delete_posts'       => 'manage_options',
        'publish_posts'      => 'manage_options',
        'read_private_posts' => 'manage_options'
    ),
  )
);
register_post_type( 'services',
array(
  'labels' => array(
    'name' => __( 'Services' ),
    'singular_name' => __( 'Services' ),
  ),
  'public' => true,
  'has_archive' => true,
  'taxonomies'  => array( 'services_placement' ),
  'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
  'capability_type' => 'post',
  'capabilities' => array(
      'edit_post'          => 'manage_options',
      'read_post'          => 'manage_options',
      'delete_post'        => 'manage_options',
      'edit_posts'         => 'manage_options',
      'edit_others_posts'  => 'manage_options',
      'delete_posts'       => 'manage_options',
      'publish_posts'      => 'manage_options',
      'read_private_posts' => 'manage_options'
  ),
)
);
register_post_type( 'payments',
array(
  'labels' => array(
    'name' => __( 'Payment Gateways' ),
    'singular_name' => __( 'Gateways' ),
  ),
  'public' => true,
  'has_archive' => true,
  'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt' ),
  'capability_type' => 'post',
  'capabilities' => array(
      'edit_post'          => 'manage_options',
      'read_post'          => 'manage_options',
      'delete_post'        => 'manage_options',
      'edit_posts'         => 'manage_options',
      'edit_others_posts'  => 'manage_options',
      'delete_posts'       => 'manage_options',
      'publish_posts'      => 'manage_options',
      'read_private_posts' => 'manage_options'
  ),
)
);
  }
  add_action( 'init', 'armanage_post_types' );

  /**
   * 10. Add custom logo
   */
  function armanage_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
	) );

}
function armanage_get_logo_url() {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    echo $image[0];
}
add_action( 'after_setup_theme', 'armanage_setup' );

/**
 * 11. Post generator
*/
function armanage_front_page_posts($atts , $class) {
    $args = array(
        'post_type' => $atts['post_type'],
        'orderby'   => $atts['orderby'],
        'order' => $atts['order'],
        'meta_key' => $atts['meta_key'],
        'posts_per_page' => $atts['posts_per_page'],
        'category_name' => $atts['category_name'],
        'product_type' => $atts['product_type'],
        'service_placement' => $atts['service_placement'],
        'blog_type' => $atts['blog_type']
        );


    $query1 = new WP_query ( $args );
    if ( $query1->have_posts() ) :
        while ($query1->have_posts() ) :
        $query1->the_post();
        global $post; 

                        // Numbers section	
                            if (in_array("numbers", $args)) {				
                                $meta_number =  get_post_meta(get_the_id(), 'number', true);
                            ?>
                            
                        <div class="<?php echo $class; ?>">
                            <div class="posts-excerpt">
                                <?php 
                                    if( !empty( $meta_number ) ) { ?>
                                <div class="excerpt-meta">
                                    <?php echo $meta_number; ?>
                                </div>

                                <?php }; ?>

                                <div class="excerpt-title">
                                    <h5><?php the_title(); ?></h5>
                                </div>
                                
                                <div class="excerpt-text">
                                <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                        <?php }; 


                    // Products Section (Our products)
                    if (in_array("our-products" , $args)) {					
                    ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#pane<?php incNumber(); ?>">
            <?php the_title(); ?>
            <span><i class="fa fa-caret-down"></i></span>
          </a>
        </h4>
      </div>
      <div id="pane<?php incNumber2(); ?>" class="panel-collapse collapse">
      <div id="<?php echo $post->post_name; ?>" class="<?php echo $class ?> panel-body row">
                                        <div class="col-md-7 col-sm-12 featured-img"><?php the_post_thumbnail(); ?></div>
                                        <div class="col-md-5 col-sm-12 excerpt">
                                            <?php the_excerpt(); ?>
                                        </div>
                            </div>
      </div>
    </div>

                    <?php
                    }




                    // Products Section (Tp products)
                    if (in_array("third-party-products" , $args)) {					
                        ?>
                                <div id="<?php echo $post->post_name; ?>" class="<?php echo $class ?>">
                                        <div class="col-md-6">
                                                <div class="tp-prod-outer adj-col">
                                                    <a class="link-to-page" href="<?php echo esc_url(get_page_link( 203 )) . "#" . get_the_ID() ?>">
                                                        <div class="tp-img-outer">
                                                            <?php the_post_thumbnail(); ?>
                                                        </div>
                                                        <h4><?php the_title(); ?></h4>
                                                        <div class="excerpt">
                                                            <?php the_excerpt(); ?>
                                                        </div>
                                                    </a>
                                                </div>
                                        </div>
                                </div>
                        <?php
                            }

                    // Services
                    if (in_array("home-service-front-page-listed" , $args)) {				
                        ?>
                                                <div class="col-md-4">
                                                    <div class="serv-outer  adj-col">
                                                    <a class="link-to-page" href="<?php echo esc_url(get_page_link( 194 )) . "#" . get_the_ID() ?>">
                                                            <div class="tp-img-outer">
                                                                <?php the_post_thumbnail(); ?>
                                                            </div>
                                                            <h4><?PHP the_title(); ?></h4>
                                                            <div class="excerpt"><?PHP the_excerpt(); ?></div>
                                                        </a>
                                                    </div>
                                                </div>
                        <?php
                            }

                                // Payment gateways section	
                                if (in_array("payments", $args)) {				
                                ?>
                                
                            <div class="<?php echo $class; ?>">
                                <div class="payment-img-outer ">

                                    <?php the_post_thumbnail(); ?>

                                </div>
                            </div>
                            <?php }; 



                                // Events section
                                if (in_array("blog", $args)) {				
                                    ?>
                                    
                                <div class="<?php echo $class; ?>">
                                <div class="event-img"><?php the_post_thumbnail($post->ID, 'thumbnail'); ?></div>
                                <div class="event-text"><?php the_excerpt(); ?></div>
                                <h3><?PHP the_title(); ?></h3>
                                </div>
                                <?php }; 
                        
 endwhile; // End looping through custom sorted posts
endif; // End loop 1  
}



/**
 * 12. Products repeatable metaboxes
*/


/**
 * 13. Create taxonomy
 */
function armanage_custom_taxonomy() {
    // create a new taxonomy
    register_taxonomy(
        'product_type',
        'products',
        array(
            'label' => __( 'Type' ),
            'rewrite' => array( 'slug' => 'product_type' ),
            'hierarchical' => true,
        )
    );
        register_taxonomy(
        'service_placement',
        'services',
        array(
            'label' => __( 'Placement' ),
            'rewrite' => array( 'slug' => 'service_placement' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'blog_type',
        'blog',
        array(
            'label' => __( 'Type' ),
            'rewrite' => array( 'slug' => 'blog_type' ),
            'hierarchical' => true,
        )
    );
    register_taxonomy(
        'post_placement',
        'post',
        array(
            'label' => __( 'Placement' ),
            'rewrite' => array( 'slug' => 'post_placement' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'armanage_custom_taxonomy' );




/**
 * 14. Redirect unwanted pages to home
 */

/* Register template redirect action callback */
add_action('template_redirect', 'meks_remove_wp_archives');
 
/* Remove archives */
function meks_remove_wp_archives(){
  //If we are on category or tag or date or author archive
  if( is_category() || is_tag() || is_date() || is_author() || is_archive() ) {
    global $wp_query;
    $wp_query->set_404(); //set to 404 not found page
  }
}



/**
 * 15. Get post thumbnail outside loop
 */
function armanage_get_post_page_thumb_url($id) {

    $post = get_post($id);
    $featured_img_url = get_the_post_thumbnail_url($post->ID, 'full'); 

    return $featured_img_url;
}



/**
 * 16. Show page/post id in admin
 */
add_filter( 'manage_posts_columns', 'armanage_revealid_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'armanage_revealid_id_column_content', 5, 2 );
add_filter( 'manage_pages_columns', 'armanage_revealid_add_id_column', 5 );
add_action( 'manage_pages_custom_column', 'armanage_revealid_id_column_content', 5, 2 );

function armanage_revealid_add_id_column( $columns ) {
   $columns['revealid_id'] = 'ID';
   return $columns;
}

function armanage_revealid_id_column_content( $column, $id ) {
  if( 'revealid_id' == $column ) {
    echo $id;
  }
}






/**
 * 17. Products + services template post generator
 */
function armanage_prod_serv_temp_post_gen($atts) {
                    $args = array(
                        'post_type' => $atts['post_type'],
                        'orderby'   => $atts['orderby'],
                        'order' => $atts['order'],
                        'meta_key' => $atts['meta_key'],
                        'product_type' => $atts['product_type'],
                        'blog_type' => $atts['blog_type'],
                        'posts_per_page' => $atts['posts_per_page'],
                        'nopaging'=>  $atts['nopaging']
                        );


                    $query1 = new WP_query ( $args );
                    if ( $query1->have_posts() ) :
                        while ($query1->have_posts() ) :
                        $query1->the_post();
                        global $post; ?>

                                    <div class="row cpt-outer" id="<?php echo get_the_ID(); ?>">
                                        <div class="cpt-background"   style="background-image: url(<?php echo esc_url( get_post_meta( get_the_ID(), 'background-image', true ) ); ?>)"></div>
                                        <div class="cpt-inner">
                                            <div class="post-title col-xs-12">
                                                <h5><?php the_title(); ?></h5>
                                            </div>

                                            <div class="feat-img col-md-5 col-xs-12">
                                            <?php the_post_thumbnail( ); ?>
                                            </div>
                                            
                                            <div class="post-content col-md-7 col-xs-12">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    </div>

        <?php endwhile; // End looping through custom sorted posts
        endif; // End loop 1  
}



/**
 * 18. Increment number
 */
function incNumber() {
    static $counter = 0;
    $counter++;

    echo "$counter";
}
function incNumber2() {
    static $counter = 0;
    $counter++;

    echo "$counter";
}
function incNumber3() {
    static $counter = 0;
    $counter++;

    echo "$counter";
}



/**
 * 19. Get youtube video title
 */
function armanage_getYoutubeInfo($vid_url) {

    $api_key = 'AIzaSyAM6qBIGfTLBJRfXY05hh8uon4r-s3owEo';

        foreach($vid_url as $vid_url) {

            $tmp = explode('/', $vid_url);
            $param = end($tmp);
            
            $api_url = 'https://www.googleapis.com/youtube/v3/videos?id='.$param.'&key='.$api_key.'&part=snippet';

            $data = json_decode(file_get_contents($api_url));

            if(strlen($param)>0){
                $thumbImg = '<img src="'.$data->items[0]->snippet->thumbnails->medium->url.'" width="150" />';

            }
            echo '<div class="vid-item thumbnail item" data-value="'.$vid_url.'">';
            echo $thumbImg;
            echo '<h5>'.$data->items[0]->snippet->title.'</h5>';
            echo '</div>';
        } 

}




/**
 * 20. Post to facebook
 */
add_action('auto-draft_to_publish', 'armanage_facebook_autopost', 10, 1);
add_action('draft_to_publish', 'armanage_facebook_autopost', 10, 1);
add_action('future_to_publish', 'armanage_facebook_autopost', 10, 1);
add_action('new_to_publish', 'armanage_facebook_autopost', 10, 1);
add_action('pending_to_publish', 'armanage_facebook_autopost', 10, 1);

function armanage_facebook_autopost() {
require __DIR__ . '/includes/facebook/src/Facebook/autoload.php';
    // Get ID of the published post:
    $post_id = get_the_ID();

    // Check to see if this has already been Tweeted
    $posted = get_post_meta($post_id, 'social_twitter_posted', true);
    $post_type = get_post_type();

    $terms = get_terms( array( 
        'taxonomy' => 'blog_type'
    ) );

    if (($posted != 'true') && ($post_type == 'blog') &&  (has_term( 'facebook', 'blog_type' )) )  {

        $appId = '333817067380493';
        $appSecret = '40aa30c097211288d0bdc7af91c67c38';
        $pageId = '564993593940832';
        $userAccessToken = 'EAAEvmte4nw0BAJu3sG372toXhpRKMJ5eioKEPWjpOT1eKk9kbiF8SOkSK8IEfsMLEF6QvZAZBdOtMchGkFQbsDipmchwD9wWX2i1TQHKb4cK2uHE2bCdXNt5Sn4SklnUZCnLpo0qAQ57i4DIxPpkxiK0QnnEcDY55lgGZAS1nh5yOWFnk6I64vVK6zlG6nLeYgNz4YZBBPQZDZD';

        $fb = new Facebook\Facebook([
            'app_id' => $appId,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v3.1'
        ]);
        
        $longLivedToken = $fb->getOAuth2Client()->getLongLivedAccessToken($userAccessToken);

        $fb->setDefaultAccessToken($longLivedToken);
        
        $response = $fb->sendRequest('GET', $pageId, ['fields' => 'access_token'])
            ->getDecodedBody();
        
        $foreverPageAccessToken = $response['access_token'];


            // Get data from the published post:
            $post_title = get_the_title($post_id);
            $post_image = get_the_post_thumbnail_url($post_id);
            $post_content = get_post($post_id);
            $post_content = $post_content->post_content;
            $post_link = the_permalink();
            $content = utf8_decode($post_content);
              
              try {
                // Returns a `Facebook\FacebookResponse` object
                $fb->setDefaultAccessToken($foreverPageAccessToken);

                if (has_post_thumbnail()) {
                    $fb->sendRequest('POST', "$pageId/photos", [
                        'source' => $fb->fileToUpload($post_image),
                        'message' => $post_content,
                        'link' => $post_link,
                    ]);
                } else {
                    $fb->sendRequest('POST', "$pageId/feed", [
                        'message' => $post_content,
                        'link' => $post_link,
                    ]);
                }


              } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo $post_image ;
                echo 'Graph returned an error: ' . $e->getMessage();
               
                exit;
              } catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo $post_image ;
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
   
                exit;
              }

    }
}





/**
 * 21. Utf contect decode
 */
function decode_content($content) {

    $content = utf8_decode($content);

    return $content;
}






/**
 * 22. Admin restrictions
 */
add_action( 'admin_menu', 'armanage_remove_admin_menus', 999 );
function armanage_remove_admin_menus() {

    $user = wp_get_current_user();
    if ( in_array( 'editor', (array) $user->roles ) ) {

        remove_menu_page( 'upload.php' );
        remove_menu_page( 'edit.php' );
        remove_menu_page( 'tools.php' );
        remove_menu_page( 'edit-comments.php' );
        remove_menu_page( 'edit.php?post_type=page' );
        remove_menu_page( 'edit.php?post_type=numbers' );
        remove_menu_page( 'edit.php?post_type=products' );
        remove_menu_page( 'edit.php?post_type=services' );
        remove_menu_page( 'edit.php?post_type=payments' );
        remove_menu_page( 'edit.php?post_type=html5-blank' );
        remove_menu_page( 'wpcf7' );
        remove_menu_page( 'upload.php' );

    }
}

?>