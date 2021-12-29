<!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php if ( get_field( 'meta_title' ) ): ?>
            <?php $meta_title = get_field( 'meta_title' ); else: $meta_title = ''; ?>
        <?php endif; ?>
        <title><?php echo $meta_title ?></title>
        <?php if ( get_field( 'meta_description' ) ): ?>
            <?php $meta_description = get_field( 'meta_description' ); else: $meta_description = ''; ?>
        <?php endif; ?>
        <meta name="description" content="<?php echo $meta_description ?>">
        <?php if ( get_field( 'meta_keyword' ) ): ?>
            <?php $meta_keyword = get_field( 'meta_keyword' ); else: $meta_keyword = '' ?>
        <?php endif; ?>
        <meta name="keywords" content="<?php echo $meta_keyword; ?>">
        <?php if ( get_field( 'meta_box' ) ): ?>
            <?php the_field( 'meta_box' ); ?>
        <?php endif; ?>
        <?php if ( get_field( 'meta_open_graphs' ) ): ?>
            <?php the_field( 'meta_open_graphs' ); ?> 
        <?php endif; ?>
        <title><?php echo get_bloginfo( 'name' ); ?></title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700;800&family=Roboto&family=Zilla+Slab&display=swap" rel="stylesheet"> 
        <link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url'); ?>/images/favicon-32x32.png">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
        <?php if(is_home()){?>
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/home.css">
        <?php } else {?>
            <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/all.css">
        <?php } ?>
        <?php wp_head(); ?>
    </head>