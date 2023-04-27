<?php

global $product; ?>
    <div class="article"  <?php wc_product_class( '', $product ); ?>>
        <h5><?php the_title(); ?></h5>
            <?php the_excerpt();
            $image = get_field('custom_image',get_the_ID());
            $product=wc_get_product(get_the_ID());
            $price=$product->get_price();
            if( !empty($image) ): ?>
            <div class="custom_image img-wrap" id='<?php echo $image['url']; ?>' data-price='<?php echo $price; ?>'>
                <img src="<?php echo $image['url']; ?>"  alt="<?php echo $image['alt']; ?>" />
                <input class="price" type="hidden" id="<?php echo $price; ?>">
            </div>
            <?php
                else: echo get_the_post_thumbnail();
            endif;
        ?>
    </div>


