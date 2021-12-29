<div class="banner">
	<?php 
	$bannerimg = get_field('banner_image'); 
	$page_title = get_field('page_title'); 
	?>
	<?php if($bannerimg){ ?>
		<img src="<?php echo $bannerimg['url']; ?>" class="img-fluid" alt="">
	<?php } else {?>
		<img src="https://via.placeholder.com/1920x400.png" class="img-fluid" alt="">
	<?php }?>
	<div class="caption container">
		<?php if($page_title) {?>
			<h1><?php echo $page_title; ?></h1>
		<?php } else{ ?>
			<h1><?php echo the_title(); ?></h1>
		<?php }?>
	</div>
</div>