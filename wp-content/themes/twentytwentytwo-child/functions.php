<?php

/**
 * Enqueue scripts and styles.
 */
    function webbook_scripts() {
    wp_enqueue_style( 'lightbox.css', '/wp-content/themes/twentytwentytwo-child/inc/css/lightbox.css');
    wp_enqueue_script('lightbox.js', get_stylesheet_directory_uri() . '/inc/js/lightbox.js', array(), '', true);
}
    add_action( 'wp_enqueue_scripts', 'webbook_scripts' );


    add_action( 'wp_enqueue_scripts', 'max_loadmore_scripts' );
    function max_loadmore_scripts() {
    wp_enqueue_script( 'jquery' ); // в TwentyTwentyOne он не подключен по умолчанию
    wp_enqueue_script('max_loadmore', get_stylesheet_directory_uri() . '/inc/js/loadmore.js', array( 'jquery' ),'',true);
    wp_localize_script('max_loadmore', 'max', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
}

    add_action( 'wp_ajax_loadmore', 'max_loadmore' );
    add_action( 'wp_ajax_nopriv_loadmore', 'max_loadmore' );
    function max_loadmore(){
    $paged = $_POST['paged'];
    $paged++;
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'paged' => $paged,
        'post_status' => 'publish'
    );
            query_posts( $args );
        $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                <div class="article">
            <?php
            wc_get_template_part( 'content', 'product' ); ?>
                </div>
         <?php endwhile;
        die;
        }
    }


