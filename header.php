<?php
get_template_part( 'inc/head' );
?>
<?php
	$logo = get_field('site_logo','options');
	$email = get_field('email','options');
	$address = get_field('address','options');
	$phone = get_field('phone','options'); 
	$number = preg_replace("/[^0-9]/", "", $phone);
?>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<header id="header" class="header">
			<div class="container">
				<nav class="navbar navbar-expand-md flex-column">
					<div class="upper-header d-flex flex-column flex-md-row justify-content-between w-100 align-items-center">
						<div class="topbar order-1 order-md-2">
							<div class="container d-flex justify-content-center justify-content-md-end align-items-center">
								<?php if( have_rows('social_icons','options') ): ?>
								    <ul class="list-inline m-0 social-media">
								    <?php while( have_rows('social_icons','options') ): the_row(); 
								        $name = get_sub_field('name');
								        $url = get_sub_field('url');
								        ?>
								        <li class="list-inline-item <?php echo $name; ?>">
								            <a href="<?php echo $url; ?>"><i class="fa fa-<?php echo $name; ?>"></i></a>
								        </li>
								    <?php endwhile; ?>
								    </ul>
								<?php endif; ?>
								<span class="tag"><a href="mailto:<?php echo $email; ?>" class="m-0 d-flex align-items-center"><i class="fa fa-envelope me-2"></i><span class=""><?php echo $email; ?></span></a></span>
								<span class="tag d-flex"><a href="tel:<?php echo $number; ?>" class="m-0 d-flex align-items-center"><i class="icon-phone me-2" aria-hidden="true"></i><span class=""><?php echo $phone; ?></span></a></span>
							</div>
						</div>
						<div class="inner d-flex justify-content-between order-2 order-md-1 align-items-center">
							<a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo['url']; ?>" class="img-fluid" alt=""></a>
							<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>
						</div>
					</div>
					<div class="collapse navbar-collapse w-100" id="navbarSupportedContent">
						<?php
						echo str_replace( '<li class="', '<li class="',
							wp_nav_menu( array(
								'container'      => false,
								'theme_location' => 'header',
								'items_wrap'     => '<ul class="navbar-nav me-lg-auto mb-2 mb-lg-0">%3$s</ul>',
								'menu_class'     => '',
								'menu_id'     => 'nav'
							) ) );
							?>
							<a href="#" class="btn btn-primary btn-appointment" data-bs-toggle="tooltip" data-bs-placement="left" title="Schedule an Appointment"><span data-bs-toggle="modal" data-bs-target="#modal-appointment">Schedule an Appointment</span></a>
						</div>
					</nav>
				</div>
			</header>
			<div class="sticky-btn d-none d-lg-block"><a href="#"class="btn btn-primary btn-appointment" data-bs-toggle="modal" data-bs-target="#modal-appointment">Schedule an Appointment  </a></div>