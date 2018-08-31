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
 * 14. Add options page to appearance menu
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
    wp_register_style('child-fontawesome', get_stylesheet_directory_uri() . '/css/web-fonts-with-css/css/fontawesome-all.css', array(), '1.0', 'all');
    wp_register_style('armanage-child', get_stylesheet_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_register_style('child-bootstrap', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_register_style('owlcarousel-style', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', array(), '1.0', 'all');
    wp_register_style('child-all', get_stylesheet_directory_uri() . '/css/all.css', array(), '1.0', 'all');

    // Enqueue Child Styles
    wp_enqueue_style('child-fontawesome'); 
    wp_enqueue_style('armanage-child'); 
    wp_enqueue_style('child-bootstrap'); 
    wp_enqueue_style('owlcarousel-style'); 
    wp_enqueue_style('child-all');

    //Register Child Scripts
    wp_register_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ) );
    wp_register_script( 'theme-script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ) );
    wp_register_script( 'owlcarousel', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ) );
    
    // Enqueue Child Scripts
    wp_enqueue_script( 'bootstrap' ); 
    wp_enqueue_script( 'theme-script' );   
    wp_enqueue_script( 'owlcarousel' );   

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
  add_theme_support( 'post-thumbnails', array( 'post', 'page'  ) );

  add_post_type_support( 'products' ,  array( 'excerpt', 'thumbnail' ) );
  add_post_type_support( 'services' ,  array( 'excerpt', 'thumbnail' ) );
  add_post_type_support( 'blog' ,  array( 'excerpt', 'thumbnail' ) );
  add_post_type_support( 'page' ,  'excerpt');
  add_post_type_support( 'payments' ,  'thumbnail');
  


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
        'public' => true,
        'has_archive' => true,
        'taxonomies'  => array( 'blog_placement' ),
      )
    );
    register_post_type( 'numbers',
    array(
      'labels' => array(
        'name' => __( 'Numbers' ),
        'singular_name' => __( 'Numbers' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
  register_post_type( 'products',
  array(
    'labels' => array(
      'name' => __( 'Products' ),
      'singular_name' => __( 'Products' )
    ),
    'public' => true,
    'has_archive' => true,
    'taxonomies'  => array( 'product_type' ),
  )
);
register_post_type( 'services',
array(
  'labels' => array(
    'name' => __( 'Services' ),
    'singular_name' => __( 'Services' )
  ),
  'public' => true,
  'has_archive' => true,
  'taxonomies'  => array( 'services_placement' ),
)
);
register_post_type( 'payments',
array(
  'labels' => array(
    'name' => __( 'Payment Gateways' ),
    'singular_name' => __( 'Gateways' )
  ),
  'public' => true,
  'has_archive' => true,
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
function armanage_generate_posts($p_type , $p_order_by , $p_order , $p_meta_key ,  $p_num_of_posts , $p_meta_box_val , $prod_type , $serv_place ,$blog_type , $class  ) { 
        $args = array(
            'post_type' => $p_type,
            'orderby'   => $p_order_by,
            'order' => $p_order,
            'meta_key' => $p_meta_key,
            'posts_per_page' => $p_num_of_posts,
            'category_name' => $p_meta_box_val,
            'product_type' => $prod_type,
            'service_placement' => $serv_place,
            'blog_type' => $blog_type,
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
                                <?php the_title(); ?>
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
                            <div id="<?php echo $post->post_name; ?>" class="<?php echo $class ?> ">
                                <div class="container">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="col-md-7 col-sm-12 featured-img"><?php the_post_thumbnail( $size, $attr ); ?></div>
                                    <div class="col-md-5 col-sm-12 excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                    <?php /*  if($post->post_name == "white-label-betting-software") {  ?>
                                        
                                                <div id="wl-specs" class="carousel slide col-md-12" data-ride="carousel">
                                                 <?php $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);  if ( $repeatable_fields ) : ?>
                                                    <ul class="carousel-inner" role="listbox">
                                                        <?php foreach ( $repeatable_fields as $field ) { ?>
                                                        <li class="<?php echo $class; ?>">
                                                        <div>
                                                            <?php if($field['name'] != '') echo '<span class="name">'. esc_attr( $field['name'] ) . '</span>'; ?>
                                                        </div>
                                                        </li>
                                                        <?php }  ?> 
                                                    </ul>
                                                </div> 
                                        <?php endif; ?>
                                    <?php  } */ ?>
                                </div>
                            </div>
                    <?php
                        }

                    // Products Section (Our products)
                    if (in_array("third-party-products" , $args)) {					
                        ?>
                                <div id="<?php echo $post->post_name; ?>" class="<?php echo $class ?>">
                                        <div class="col-md-6">
                                            <div class="tp-prod-outer adj-col">
                                                <div class="tp-img-outer">
                                                    <?php the_post_thumbnail( $size, $attr ); ?>
                                                </div>
                                                <h3><?php the_title(); ?></h3>
                                                <div class="excerpt">
                                                    <?php the_excerpt(); ?>
                                                </div>
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
                                                    <div class="tp-img-outer">
                                                        <?php the_post_thumbnail( $size, $attr ); ?>
                                                    </div>
                                                    <h3><?PHP the_title(); ?></h3>
                                                    <div class="excerpt"><?PHP the_excerpt(); ?></div>
                                                </div>
                                            </div>
                        <?php
                            }

                                // Payment gateways section	
                                if (in_array("payments", $args)) {				
                                ?>
                                
                            <div class="<?php echo $class; ?>">
                                <div class="payment-img-outer ">

                                    <?php the_post_thumbnail( $size, $attr ); ?>

                                </div>
                            </div>
                            <?php }; 



                                // Events section
                                if (in_array("blog", $args)) {				
                                    ?>
                                    
                                <div class="<?php echo $class; ?>">
                                <div class="blur-div" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)"></div>
                                <h3><?PHP the_title(); ?></h3>
                                </div>
                                <?php }; 
                        

        endwhile; // End looping through custom sorted posts
        endif; // End loop 1
    }  


/**
 * 12. Products repeatable metaboxes
*/
add_action('admin_init', 'add_meta_boxes', 1);
function add_meta_boxes() {
	add_meta_box( 'repeatable-fields', 'Product specs', 'repeatable_meta_box_display', 'products', 'normal', 'high');
}
function repeatable_meta_box_display() {
	global $post;
	$repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);
	wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
	<script type="text/javascript">
jQuery(document).ready(function($) {
	$('.metabox_submit').click(function(e) {
		e.preventDefault();
		$('#publish').click();
	});
	$('#add-row').on('click', function() {
		var row = $('.empty-row.screen-reader-text').clone(true);
		row.removeClass('empty-row screen-reader-text');
		row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
		return false;
	});
	$('.remove-row').on('click', function() {
		$(this).parents('tr').remove();
		return false;
	});
	$('#repeatable-fieldset-one tbody').sortable({
		opacity: 0.6,
		revert: true,
		cursor: 'move',
		handle: '.sort'
	});
});
    </script>

    <?php 
        $custom = get_post_custom($post->ID);
        $field_id = $custom["field_id"][0];
    ?>

	<table id="repeatable-fieldset-one" width="100%">
	<thead>
		<tr>
			<th width="2%"></th>
			<th width="30%">Name</th>
			<th width="60%">Description</th>
			<th width="2%"></th>
		</tr>
	</thead>
	<tbody>
	<?php
    if ( $repeatable_fields ) :
        
		foreach ( $repeatable_fields as $field ) {
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="name[]" value="<?php if($field['name'] != '') echo esc_attr( $field['name'] ); ?>" /></td>

		<td><input type="text" class="widefat" name="url[]" value="<?php if ($field['url'] != '') echo esc_attr( $field['url'] ); else echo 'Details..'; ?>" /></td>
		<td><a class="sort">|||</a></td>
		
	</tr>
	<?php
		}
	else :
		// show a blank one
?>
	<tr>
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="name[]" /></td>


		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	<?php endif; ?>

	<!-- empty hidden one for jQuery -->
	<tr class="empty-row screen-reader-text">
		<td><a class="button remove-row" href="#">-</a></td>
		<td><input type="text" class="widefat" name="name[]" /></td>


		<td><input type="text" class="widefat" name="url[]" value="http://" /></td>
<td><a class="sort">|||</a></td>
		
	</tr>
	</tbody>
	</table>

	<p><a id="add-row" class="button" href="#">Add another</a>
	<input type="submit" class="metabox_submit" value="Save" />
	</p>
	
	<?php
}
add_action('save_post', 'repeatable_meta_box_save');
function repeatable_meta_box_save($post_id) {
	if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
		! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
		return;
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return;
	if (!current_user_can('edit_post', $post_id))
		return;
	$old = get_post_meta($post_id, 'repeatable_fields', true);
	$new = array();
	$names = $_POST['name'];
    $urls = $_POST['url'];
	$count = count( $names );
	for ( $i = 0; $i < $count; $i++ ) {
		if ( $names[$i] != '' ) :
			$new[$i]['name'] = stripslashes( strip_tags( $names[$i] ) );
		if ( $urls[$i] == 'Details..' )
			$new[$i]['url'] = '';
		else
			$new[$i]['url'] = stripslashes( $urls[$i] ); // and however you want to sanitize
		endif;
	}
	if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'repeatable_fields', $new );
	elseif ( empty($new) && $old )
		delete_post_meta( $post_id, 'repeatable_fields', $old );
}

/**
 * 13. Create taxonomy
 */
function atominktheme_custom_taxonomy() {
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
}
add_action( 'init', 'atominktheme_custom_taxonomy' );





/**
 * 14. Add options page to appearance menu
 */

?>