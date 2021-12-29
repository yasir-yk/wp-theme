<?php
/*
 * The front page template file
 * If the user has selected a static page for their homepage, this is what will appear.
 * Template Name: Front Page
 */
get_header(); ?>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-interval="5000" data-bs-ride="carousel">
	<?php if( have_rows('slider') ): $count = 1; ?>
		<div class="carousel-indicators d-none d-lg-flex">
			<?php while( have_rows('slider') ): the_row(); ?>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			<?php $count++; endwhile; ?>
		</div>
		<div class="carousel-inner">
			<?php while( have_rows('slider') ): the_row(); 
				$image = get_sub_field('slide_image');
				$text = get_sub_field('slide_text');
				?>
				<div class="carousel-item <?php if($count==1){echo 'active';}?>">
					<img src="<?php echo $image['url']; ?>" class="d-block w-100" alt="Image 1">
					<div class="caption container">
						<h1><?php echo $text; ?></h1>
					</div>
				</div>
				<?php $count++; endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
	<main id="main">
	</main>
	<?php get_footer(); ?>