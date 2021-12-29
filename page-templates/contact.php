<?php
/*
    * Template Name: Contact
    */
get_header(); 
    $email = get_field('email','options');
    $address = get_field('address','options');
    $phone = get_field('phone','options'); 
    $number = preg_replace("/[^0-9]/", "", $phone);
?>
<?php get_template_part( 'inc/page-banner' ); ?>
<main id="main">
    <section class="block contact-info bg-block">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 sideinfo">
                    <div class="inner">
                        <h3>AIMS URGENT CARE</h3>
                        <span class="subtext">The team believes there’s no time to waste <br class="d-none d-xl-inline-block"> when a patient needs to see a doctor.</span>
                        <ul>
                            <li>
                                <i class="icon-location"></i>
                                <div class="text">
                                    <strong class="title d-block">ADDRESS:</strong>
                                    <address class="m-0"><?php echo $address; ?></address></div>
                                </li>
                                <li>
                                    <i class="icon-mail"></i>
                                    <div class="text">
                                        <strong class="title d-block">EMAIL AT:</strong>
                                        <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                    </div>
                                </li>
                                <li>
                                    <i class="icon-phone"></i>
                                    <div class="text">
                                        <strong class="title d-block">CALL AT:</strong>
                                        <a href="tel:<?php echo $number; ?>"><?php echo $phone; ?></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7 contact-form">
                        <div class="inner">
                            <h2>Contact Us!</h2>
                            <p>Complete the form and we will send you a confirmation within 24 hours.</p>
                           <?php echo do_shortcode("[contact-form-7 id='80' title='Contact Us']"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php get_footer(); ?>