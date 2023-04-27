<?php
/**
 * Template name: All-products
 */
get_header(); ?>

    <div id="myModal" class="modal">
        <span class="close_cursor">&times;</span>
        <div class="modal-content">
            <div class="row_price">
            <h5><?php _e('Ціна'); ?>&nbsp;<span id="price_out"></span></h5>
                </div>
            <img id="image-modal" src="#" alt="" style="width:100%">
            <div class="caption-container">
                <p id="caption"></p>
            </div>
        </div>
    </div>


<div class="products" id="row_append">
	<?php
		$args = array(
			'post_type' => 'product',
            'posts_per_page' => 3,
            'paged' => 1
			);
		$loop = new WP_Query( $args );
		if ( $loop->have_posts() ) {
			while ( $loop->have_posts() ) : $loop->the_post(); ?>

                    <?php
				wc_get_template_part( 'content', 'product' );
			endwhile; ?>

            </div>
            <?php

            // текущая страница
            $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
// максимум страниц
            $max_pages = $loop->max_num_pages;

// если текущая страница меньше, чем максимум страниц, то выводим кнопку
            if( $paged < $max_pages ) {
                echo '<div id="loadmore" style="text-align:center;">
		<a href="#" data-max_pages="' . $max_pages . '" data-paged="' . $paged . '" class="button">Загрузить ещё</a>
	</div>';
            }



		} else {
			echo __( 'No products found' );
		}
	?>

<?php





wp_reset_postdata();
get_footer();