<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Halal Flavors
 */

get_header(); 
	$places_distance = get_field('places_distance','options');
	$distance = $_GET['distance'];
	$proximity = $_GET['units'];
	$origin = $_GET['s'];
	if(empty($origin)){
		$origin = $_GET['origin'];
	}
	$pickup = $_GET['pickup'];
	if(!empty($pickup)){
		$pickup = 'pickup';
	}
    $delivery = $_GET['delivery'];
    if(!empty($delivery)){
		$delivery = 'delivery';
	}
	$cuisine = $_GET['cuisine'];
	$distancef = $_GET['distancef'];
	if(!empty($distancef)){
		$distance = $distancef;
	}
?>

	<div class="banner d-flex flex-column justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-8 order">
                    <spn class="subtext">Order Your Favourite Meals Online</spn>
                    <div class="txt">From the best restaurants near you</div>
                    <form action="<?php echo get_home_url(); ?>" method="get" class="d-md-flex search-form">
                    	<input name="distance" type="hidden" value="<?php echo $places_distance; ?>">
						<input name="units" type="hidden" value="N">
                        <div class="search d-flex justify-content-between">
                            <input type="search" name="s" placeholder="Search for Restaurants">
                            <button type="submit" class="btn btn-secondary"><i class="icon-search"></i> <span>Search</span></button>
                        </div>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-4"><img src="<?php bloginfo('template_url'); ?>/images/image2.png" alt=""></div>
            </div>
        </div>
    </div>
</div>
<div class="fillter-bar">
    <div class="container d-flex justify-content-center">
        <form action="<?php echo get_home_url(); ?>" method="get" id="filter-form" class="d-lg-flex">
            <div class="d-flex align-items-center justify-content-center mb-3 mb-lg-0">
            	<input name="distance" type="hidden" value="<?php echo $distance; ?>">
				<input name="units" type="hidden" value="N">
				<input name="origin" type="hidden" value="<?php echo $origin; ?>">
				<input name="s" type="search" class="d-none" value="<?php echo $origin; ?>">
                <label>
                    <input type="checkbox" class="checkbox" name="pickup" <?php if(!empty($pickup)){echo 'checked';} ?>>
                    <span class="curadio"></span>
                    <span class="label">Pick Up</span>
                </label>
                <label>
                    <input type="checkbox" class="checkbox" name="delivery" <?php if(!empty($delivery)){echo 'checked';} ?>>
                    <span class="curadio"></span>
                    <span class="label">Delivery</span>
                </label>
            </div>
            <div class="d-flex align-items-center mb-3 mb-lg-0">
                <span class="cuselect" id="select-cuisine">
                    <select class="form-control" name="cuisine">
                        <option class="d-none">select a cuisine</option>
                        <?php
			            	$cuisine_key = "field_60f58df650dd0";
							$cuisine_options = get_field_object($cuisine_key);
							$choices = $cuisine_options['choices'];
							foreach($choices as $choice => $label){ 
								//$label = $cuisine_options[$key]; ?>
								<option value="<?php echo $choice; ?>" <?php if($cuisine == $choice){echo 'selected';} ?>><?php echo $label; ?></option>
							<?php }
						?>
                    </select>
                </span>
                <span class="cuselect" id="select-distance">
                    <select class="form-control" name="distancef">
                        <option class="d-none">distance</option>
                        <option value="1" <?php if($distance == '1'){echo 'selected';} ?>>1 Mile</option>
                        <option value="2" <?php if($distance == '2'){echo 'selected';} ?>>2 Miles</option>
                        <option value="3" <?php if($distance == '3'){echo 'selected';} ?>>3 Miles</option>
                        <option value="4" <?php if($distance == '4'){echo 'selected';} ?>>4 Miles</option>
                        <option value="5" <?php if($distance == '5'){echo 'selected';} ?>>5 Miles</option>
                        <option value="6" <?php if($distance == '6'){echo 'selected';} ?>>6 Miles</option>
                        <option value="7" <?php if($distance == '7'){echo 'selected';} ?>>7 Miles</option>
                        <option value="8" <?php if($distance == '8'){echo 'selected';} ?>>8 Miles</option>
                        <option value="9" <?php if($distance == '9'){echo 'selected';} ?>>9 Miles</option>
                        <option value="10" <?php if($distance == '10'){echo 'selected';} ?>>10 Miles</option>
                        <option value="11" <?php if($distance == '11'){echo 'selected';} ?>>11 Miles</option>
                        <option value="12" <?php if($distance == '12'){echo 'selected';} ?>>12 Miles</option>
                        <option value="13" <?php if($distance == '13'){echo 'selected';} ?>>13 Miles</option>
                        <option value="14" <?php if($distance == '14'){echo 'selected';} ?>>14 Miles</option>
                        <option value="15" <?php if($distance == '15'){echo 'selected';} ?>>15 Miles</option>
                    </select>
                </span>
            </div>
            <input type="search" name="s" class="d-none" placeholder="Search Location">
			<button type="submit" class="btn btn-secondary d-none"><i class="icon-search"></i> <span>Search</span></button>
            <div class="d-flex justify-content-center">
                <button type="reset" id="reset" class="btn btn-outline-light">Reset Fillter</button>
            </div>
        </form>
    </div>
</div>
<?php
	$origin = $_GET['origin'];
	$proximity = $distance;
	if(empty($origin)){
    	$origin = isset($_GET['s']) ? $_GET['s'] : null;
    }
    $unit = isset($_GET['units']) ? $_GET['units'] : null;
?>
<main id="main">
    <section class="block restaurants-block">
        <div class="container">
            <h2 class="text-center"><?php echo $origin; ?></h2>
            <?php
	            $results = (array) null;
	            // only run this query if a user has made a search
	            if($origin){
	            	$meta_query = array( 'relation' => 'AND' );
	            	if(!empty($pickup)){
		            	$meta_query[] = array(
					        'key'     => 'order_type',
					        'value'     => 'pickup',
					        'compare'   => 'Like'
					    );
		            }
		            if(!empty($delivery)){
		            	$meta_query[] = array(
					        'key'     => 'order_type',
					        'value'     => 'delivery',
					        'compare'   => 'Like'
					    );
		            }
		            if(!empty($cuisine) && $cuisine != 'select a cuisine'){
    					$meta_query[] = array(
					        'key'     => 'cuisine',
					        'value'     => $cuisine,
					        'compare'   => 'Like'
					    );
    				}
	                $search_query = get_terms( 
	                    array(
	                        'taxonomy' => 'product_cat',
	                        'hide_empty' => false,
	                        'meta_query'  => $meta_query,
	                    ) 
	                );
	                foreach($search_query as $res){
	                    $address = get_field('address',$res);
	                    if($address){
	                        $distance = YOUR_THEME_NAME_get_distance($origin, $address['lat'], $address['lng'], $unit);
	                        if ((float)$distance <= (float)$proximity){
	                        	// echo (float)$distance.'--'.(float)$proximity;
	                        	// echo '<br>';
	                            array_push($results, $res->term_id);
	                        }
	                    }
	                }
	            }
	            //print("<pre>");print_r($results);print("</pre>");
	            if($results && $proximity) {
	                $results_args = get_terms( 
	                    array(
	                        'taxonomy' => 'product_cat',
	                        'include' => $results,
	                        'hide_empty' => false,
	                    ) 
	                );
	            } else if (!$results && $proximity) {
	                $results_args = array();
	            }
	            if(!empty($results_args)){ ?>
	            	<div class="row">
		                <?php foreach($results_args as $res1){
		                    $address = get_field('address',$res1);
		                    $distance = YOUR_THEME_NAME_get_distance($origin, $address['lat'], $address['lng'], $unit);
		                    $order_type = get_field('order_type', $res1);
							$term_link = get_term_link( $res1 );
							$thumb_id = get_woocommerce_term_meta( $res1->term_id, 'thumbnail_id', true );
							$term_img = wp_get_attachment_url(  $thumb_id ); ?>
		                    <div class="col-xl-4 col-lg-6 col-md-6 col-12">
								<div class="inner">
									<div class="image"><img src="<?php echo $term_img; ?>" class="img-fluid" alt=""></div>
									<h3><?php echo $res1->name; ?></h3>
									<div class="links d-flex justify-content-center mb-3">
										<a href="#">Sandwiches</a>
										<a href="#">Others</a>
									</div>
									<address><?php echo $address['address']; ?></address>
									<div class="d-flex align-items-center justify-content-between">
										<div class="switchBtn">
											<div class="links d-flex justify-content-center mb-3">
												<a href="#" <?php if($order_type == 'delivery'){echo 'class="disabled"';} ?>>Pick Up</a>
												<a href="#" <?php if($order_type == 'pickup'){echo 'class="disabled"';} ?>>Delivery</a>
											</div>
										</div>
										<a href="<?php echo $term_link; ?>" class="btn btn-primary py-2">Order Now</a>
									</div>
								</div>
							</div>
		                <?php } ?>
		            </div>
		        <?php } else {
		            echo '<p class="text-center"><strong>No Restaurant found</strong></p>';
		        }
		       	wp_reset_postdata();
		   	?>
        </div>
    </section>
</main>

<?php get_footer();
