<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage AIMS URGENT CARE
 */
// if(is_cart()){
//  wp_redirect( $woocommerce->cart->get_checkout_url(), 302 );
// }
get_header(); ?>
<div class="banner">
    <img src="images/banner-1.jpg" class="img-fluid" alt="">
    <div class="caption container">
        <h1><?php echo the_title(); ?></h1>
    </div>
</div>
<main id="main">
    <section class="block bg-block">
        <div class="container">
        </div>
    </section>
</main>
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3115.181916503258!2d-121.32905328446414!3d38.667687068056345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x809adee6b5702efd%3A0x2ed8fb49d752fbac!2sAIMS%20Clinic!5e0!3m2!1sen!2s!4v1637152882719!5m2!1sen!2s" width="100%" height="390" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>
<?php get_footer(); ?>