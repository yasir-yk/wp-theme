<?php
/*
    * Template Name: About
    */
get_header(); ?>
<?php get_template_part( 'inc/page-banner' ); ?>
<main id="main">
    <section class="block bg-block">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>