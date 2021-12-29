<?php
/*
    * Template Name: Services
    */
get_header(); ?>
<?php get_template_part( 'inc/page-banner' ); ?>
<main id="main">
	<section class="block services-block pb-5">
		<div class="container">
			<h2 class="text-white text-center py-3 py-lg-5" title="Services">Our Services</h2>
			<div class="row my-md-5 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 justify-content-center">
				<?php
				$posts = array(
					'post_type' => 'services',
					'post_status' => 'publish',
					'posts_per_page' => '-1',
					'order'=>'DESC',			
				);
				$the_query = new WP_Query( $posts );
				if( $the_query->have_posts() ):
					while( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col">
							<a href="<?php echo the_permalink();?>">
								<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="img-fluid mx-auto mb-3" alt="Urgent Care">
								<h3><?php the_title();?></h3>
							</a>
						</div>
					<?php endwhile;
				endif; 
				wp_reset_query(); 
				?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>