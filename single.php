<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Halal Flavors
 */
get_header(); 
$subtitle = get_field('sub_title');
$content_Image = get_field('inner_image');
?>
<?php get_template_part( 'inc/page-banner' ); ?>
<main id="main">
    <section class="block services-detail bg-block">
        <div class="container">
            <?php if($subtitle) {?>
                <h2 class="text-center service-title px-lg-5 mx-lg-5 text-dark mb-5"><?php echo $subtitle; ?></h2>
            <?php } ?>
            <div class="row">
                <div class="text-center text-md-start col-lg-6 col-xl-7 pe-lg-7">
                    <?php
                    /* Start the Loop */
                    while ( have_posts() ) : the_post();
                        the_content();
                        endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="col-lg-6 col-xl-5 d-flex justify-content-center">
                        <div class="image mb-5 mb-lg-0"><span class="care left"><img src="<?php bloginfo('template_url'); ?>/images/care.png" alt=""></span>
                         <?php if($content_Image) {?>
                            <img src="<?php echo $content_Image['url']; ?>" class=" d-block img-fluid" alt="">
                        <?php } else { ?>
                          <img src="https://via.placeholder.com/475x511.png" class=" d-block img-fluid" alt="">
                      <?php } ?>
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>
<?php get_footer(); ?>