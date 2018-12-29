<?php
/*
* Plugin Name: Armanage Lazy Loading
*/

add_filter( 'wp_get_attachment_image_attributes', function ( $attr ) {
 
    $attr['class'] .= ' ' . 'lazyload-img';

    if ( isset( $attr['src'] ) ) {
        $attr['data-src'] = $attr['src'];
        unset($attr['src']);
    }
    if ( isset( $attr['srcset'] ) ) {
        $attr['data-srcset'] = $attr['srcset'];
        unset($attr['srcset']);
    }
 
    return $attr;
} );

?>