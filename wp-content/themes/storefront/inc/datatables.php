<?php
function datatables_scripts_in_head(){
    wp_enqueue_script('datatables', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js', array('jquery') );
    wp_localize_script( 'datatables', 'datatablesajax', array('url' => admin_url('admin-ajax.php')) );
    wp_enqueue_style('datatables', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css' );
    wp_enqueue_script('datatables_my_script', get_template_directory_uri() . '/inc/datatables.js', array(), '', true);
}
add_action('wp_enqueue_scripts', 'datatables_scripts_in_head');

add_action( 'wp_ajax_getpostsfordatatables', 'my_ajax_getpostsfordatatables' );
add_action( 'wp_ajax_nopriv_getpostsfordatatables', 'my_ajax_getpostsfordatatables' );
function my_ajax_getpostsfordatatables() {
    global $wpdb;
    //some basic query arguments
    $posts_per_page = 100;
    $page = 1;
    $args = array(
        'post_type'             => 'product',
        'posts_per_page'        => $posts_per_page,
        'paged'                 => $page
    );
    //query
    $postsQ = new WP_Query( $args );

    //create empty array and loop through results, populating array
    $return_json = array();
    while($postsQ->have_posts()) {
        $postsQ->the_post();
        $row = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'author' => get_the_author(),
            'date' => get_the_date('Y-m-d'),
            'excerpt' => strip_tags(get_the_excerpt()),
            'link' => get_permalink()
        );
        $return_json[] = $row;
    }
    //return the result to the ajax request and die
    echo json_encode(array('data' => $return_json));
    wp_die();
}