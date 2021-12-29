<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage AIMS URGENT CARE
 */
get_header(); ?>
<div class="banner">
    <img src="<?php bloginfo('template_url'); ?>/images/banner-1.jpg" class="img-fluid" alt="">
</div>
<main id="main">
    <section class="block">
        <div class="container text-center">
            <h2 class="text-center"><span>Page not found....</span></h2>
            <div class="txt">
                <a href="<?php echo get_home_url(); ?>" class="btn btn-primary">Back to Home</a>
            </div>
        </div>
    </section>
</main>
<?php get_footer();