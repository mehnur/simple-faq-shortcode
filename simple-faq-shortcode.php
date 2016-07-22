<?php
/*
Plugin Name: Simple FAQ shortcode
Plugin URI: http://mehnur.org/
Description: simple faq page with custom post type and a simple shortcode
Version: 1.0
Author: Mehnoor Tahir
Author URI: http://mehnur.org/
License: GPL2
*/
function register_cpt_faq() {

    $labels = array( 
        'name' => _x( 'Faq', 'faq' ),
        'singular_name' => _x( 'Faq', 'faq' ),
        'add_new' => _x( 'Add New', 'faq' ),
        'add_new_item' => _x( 'Add New Faq', 'faq' ),
        'edit_item' => _x( 'Edit Faq', 'faq' ),
        'new_item' => _x( 'New Faq', 'faq' ),
        'view_item' => _x( 'View Faq', 'faq' ),
        'search_items' => _x( 'Search Faq', 'faq' ),
        'not_found' => _x( 'No faq found', 'faq' ),
        'not_found_in_trash' => _x( 'No faq found in Trash', 'faq' ),
        'parent_item_colon' => _x( 'Parent Faq:', 'faq' ),
        'menu_name' => _x( 'Faq', 'faq' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Frequently Asked Questions Custom Post Type',
        'supports' => array( 'title', 'editor' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => false,
        'exclude_from_search' => true,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'faq', $args );
}


function faq_shortcode_fnc($atts) {
	if (is_array($atts)) extract($atts);
    if (!isset($order)) $order = 'ASC';

	$args = array('post_type' => 'faq','post_status' => 'publish','order' => $order);
    $the_query = new WP_Query( $args );

	if (!isset($width)) $width = '600px';
	if (!isset($color)) $color = '#EEEEEE';
	echo "<div id=\"accordion\">";
    while ( $the_query->have_posts() ) : $the_query->the_post();
    echo "<div style=\"width:$width;margin-bottom:1px;\">
    <h2 class=\"heading\" style=\"cursor: pointer;margin-bottom:1px;padding:5px;background-color:$color;\">" .  get_the_title() . "</h2>
	<p class=\"content\" style=\"padding: 5px;\">";
    $content = strip_tags(get_the_content()); 
    echo nl2br($content);
    ?>
    </p></div>
	<?php endwhile;
    
    wp_reset_postdata();
	echo "</div>";
}

function my_scripts_method() {
	wp_enqueue_script(
		'faq_script',
		plugins_url('/script.js', __FILE__),
		array('jquery')
	);
}   

function my_corner_method() {
    wp_enqueue_script(
        'corner_script',
        plugins_url('/jquery.corner.js', __FILE__),
        array('jquery')
    );
} 
 


add_action('wp_enqueue_scripts', 'my_corner_method');
add_action('wp_enqueue_scripts', 'my_scripts_method');
add_shortcode('faq','faq_shortcode_fnc');
add_action( 'init', 'register_cpt_faq' );
?>