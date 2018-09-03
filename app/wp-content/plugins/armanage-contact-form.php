<?php
/*
Plugin Name: AR Management Contact Form Plugin
Description: Simple Contact Form
Version: 1.0
*/

// Output the html
function html_form_code() {
    echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';

    echo 'Your Name (required) <br />';
    echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
    echo 'Your Email (required) <br />';
    echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
    echo 'Phone (required) <br />';
    echo '<input type="number" name="cf-number" pattern="[0-9 ]+" value="' . ( isset( $_POST["cf-number"] ) ? esc_attr( $_POST["cf-number"] ) : '' ) . '" size="40" />';
    echo 'Your Message (required) <br />';
    echo '<textarea rows="10" cols="35" name="cf-message">' . ( isset( $_POST["cf-message"] ) ? esc_attr( $_POST["cf-message"] ) : '' ) . '</textarea>';
    echo '<input type="submit" name="cf-submitted" value="Send"/>';
    echo '</form>';
}


// Sanitize and send
function deliver_mail() {

    // if the submit button is clicked, send the email
    if ( isset( $_POST['cf-submitted'] ) ) {

        // sanitize form values
        $name    = sanitize_text_field( $_POST["cf-name"] );
        $email   = sanitize_email( $_POST["cf-email"] );
        $subject = sanitize_text_field( $_POST["cf-number"] );
        $message = esc_textarea( $_POST["cf-message"] );

        // get the blog administrator's email address
        $to = 'silvestervella@icloud.com';

        $headers = "From: $name <$email>" . "\r\n";

        // If email has been process for sending, display a success message
        if ( wp_mail( $to, $subject, $message, $headers ) ) {
            echo '<div>';
            echo '<p>Thanks for contacting me, expect a response soon.</p>';
            echo '</div>';
        } else {
            echo 'An unexpected error occurred';
        }
    }
}


function cf_shortcode() {
    ob_start();
    deliver_mail();
    html_form_code();

    return ob_get_clean();
}
add_shortcode( 'armanage_contact_form', 'cf_shortcode' );
?>