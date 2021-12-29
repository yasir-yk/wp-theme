
<div class="slideshow">
    <div class="slideset">
        <?php
            if( have_rows('slider',7) ):
                while( have_rows('slider',7) ) : the_row(); ?>
                    <div class="slide">
                        <img src="<?php the_sub_field('slide_image',7); ?>" class="img-fluid" alt="Image Here">
                        <div class="caption container">
                            <?php the_sub_field('slide_caption',7); ?>
                        </div>
                    </div>
                <?php endwhile;
            endif; 
        ?>
    </div>
</div>
